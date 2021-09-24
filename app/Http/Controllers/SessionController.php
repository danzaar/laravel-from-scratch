<?php

namespace App\Http\Controllers;

//use Nette\Schema\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{

    public function create()
    {
        return view ('sessions.create');
    }


    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|exists:users,email',
            'password' => 'required'
        ]);

        // attempt to authenticate and log in the user
        //based on the provided credentials
        if (auth()->attempt($attributes)) {
            // auth failed regular way
//        return back()
//            ->withInput()
//            ->withErrors(['email' => 'Your provided credentials could not be verified.']);

            // with ValidationException
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);

        }
        session()->regenerate();
        // redirect with a success flash message
        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('succes', 'Goodbye!');
    }
}
