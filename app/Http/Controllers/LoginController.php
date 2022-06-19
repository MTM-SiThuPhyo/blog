<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (! $user) {
            throw ValidationException::withMessages([
                'email' => 'The email is not registered'
            ]);
        }

        $credentials = [
            'email' => $user->email,
            'password' => $request->password
        ];

        if (! Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => 'Email or Password is incorrect'
            ]);
        }

        return redirect('posts');
    }

    public function destroy()
    {
        Auth::logout();

        return redirect('login');
    }
}
