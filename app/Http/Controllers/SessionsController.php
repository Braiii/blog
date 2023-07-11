<?php

namespace App\Http\Controllers;

use App\Http\Requests\Login;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->only(['create', 'store']);
    }

    public function create()
    {
        return view('sessions.create');
    }

    public function store(Login $request)
    {
        if (! Auth::attempt($request->validated())) {
            throw ValidationException::withMessages(['email' => 'Your provided credentials didn\'t match.']);
        }
        
        session()->regenerate();
        
        return redirect('/')->with('success', 'Welcome Back');
    }

    public function destroy()
    {
        Auth::logout();
        
        return redirect('/login')->with('success', 'Goodbye!');
    }
}
