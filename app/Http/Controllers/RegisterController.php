<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    // This is where we store the user
    public function store()
    {

//        return request()->all();
        $attributes = request()->validate([
           'name' => ['required', 'min:2', 'max:255'],
           'username' => ['required', 'min:3', 'max:255', Rule::unique('users', 'username')],
           'email' => ['required', 'max:255', Rule::unique('users', 'username')],
           'password' => ['required', 'min:7', 'max:255'],
        ]);
//
//      dd('success, validation succeeded');

        $user = User::create($attributes);

        auth()->login($user);

//      flash message through session
//       session()->flash('success', 'Your account has been created.');

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
