<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function create(): View
    {
        return view('register.create');
    }

    public function store(RegisterUser $request): RedirectResponse
    {
        $user = User::create($request->validated());

        Auth::login($user);

        return back()
            ->with('success', 'Your account has been created.');
    }
}
