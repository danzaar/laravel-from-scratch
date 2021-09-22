<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter): Redirector|Application|RedirectResponse
    {
        request()->validate(['email' => 'required|email']);

        try{
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list.'
            ]);
        }

//        $response = $mailchimp->lists->getAllLists();

        return redirect('/')->with('success', 'You are now signed up for our newsletter');
    }
}
