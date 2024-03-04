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
