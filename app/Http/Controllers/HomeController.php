<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\User;

class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('pages.dashboard');
    }

    public function show($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user) {
            toastr()->error('User not found');
            return back();
        }
        return view('pages.user')->with('user', $user);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|max:100',
            'address' => 'required|max:255',
            'registration_number' => 'required|max:100',
        ]);

        // ensure that in the contacts table, the registration_number is unique for the user_id
        $contact = Contact::where('registration_number', $attributes['registration_number'])
            ->where('user_id', $attributes['user_id'])
            ->first();
        if ($contact) {
            toastr()->error('Registration number already exists');
            return back();
        }

        Contact::create($attributes);

        toastr()->success('Contact succesfully added');
        return back();
    }

    public function search(Request $request)
    {
        $attributes = $request->validate([
            'search' => 'required|max:255',
        ]);
        $search = $attributes['search'];
        $contacts = Contact::where('registration_number', 'like', '%' . $attributes['search'] . '%')
            ->where('user_id', auth()->user()->id)
            ->get();
        // highlight the search term in the results
        foreach ($contacts as $contact) {
            $contact->registration_number = str_replace($search, "<span class='text-primary'>$search</span>", $contact->registration_number);
        }

        return view('pages.search')->with(['contacts' => $contacts, 'search' => $search]);
    }
}
