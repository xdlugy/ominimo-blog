<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create() {
        return view('auth.login');
    }

    public function store() {
        $validatedAttributes = request()->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        $auth = Auth::attempt($validatedAttributes);

        if(! Auth::attempt($validatedAttributes)) {
            return redirect('/login');
        };

        request()->session()->regenerate();

        return redirect('/');
    }

    public function destroy() {
        Auth::logout();

        return redirect('/');
    }
}
