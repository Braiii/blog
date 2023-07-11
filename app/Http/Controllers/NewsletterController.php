<?php

namespace App\Http\Controllers;

use App\Services\Newsletter;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['newsletter_email' => ['required', 'email']]); 

        try {
            $newsletter->subscribe(request('newsletter_email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'newsletter_email' => 'Sorry, this email cannot be added to our newsletter list.'
            ]);
        }

        return redirect('/')
            ->with('success', 'You are now signed up for our newsletter!');
    }
}
