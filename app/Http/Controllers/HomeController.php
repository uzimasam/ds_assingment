<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $user = auth()->user();
        if (!$user->registration_number) {
            toastr()->warning('Please update your profile to continue');
            return redirect()->route('profile');
        }
        $users = User::all();
        return view('pages.dashboard')->with('users', $users);
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
}
