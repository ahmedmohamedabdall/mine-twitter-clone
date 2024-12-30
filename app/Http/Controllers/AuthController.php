<?php

namespace App\Http\Controllers;

use App\Http\Requests\createuserRequest;
use App\Mail\WelcomeEmail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;

ini_set('max_execution_time', 120);
class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store(createuserRequest $request)
    {


        $validated = $request->validated();

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password'])
        ]);

       Mail::to($user->email)->send(new WelcomeEmail($user));
        return redirect()->route('dashboard')->with('success', 'registerd');
    }


    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        if (auth()->attempt($validated)) {
            request()->session()->regenerate();
            return redirect()->route('dashboard')->with('success', 'logedin');
        }
        return redirect()->back()->withErrors(['email' => 'no matching email', 'password' => 'wrong password']);
    }


    public function logout()
    {
        auth()->logout();
        request()->session()->regenerateToken();
        return redirect()->route('dashboard')->with('success', 'logedout');
    }
}
