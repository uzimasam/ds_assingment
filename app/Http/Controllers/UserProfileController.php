<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('pages.user-profile');
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'username' => ['required','max:255', 'min:2', Rule::unique('users')->ignore(auth()->user()->id),],
            'firstname' => ['max:100'],
            'lastname' => ['max:100'],
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
            'address' => ['max:100'],
            'mobile_number' => ['max:100'],
            'registration_number' => ['max:100', Rule::unique('users')->ignore(auth()->user()->id),],
        ]);

        auth()->user()->update([
            'username' => $request->get('username'),
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'email' => $request->get('email') ,
            'address' => $request->get('address'),
            'mobile_number' => $request->get('mobile_number'),
            'registration_number' => $request->get('registration_number'),
        ]);

        toastr()->success('Profile succesfully updated');
        return back();
    }
}
