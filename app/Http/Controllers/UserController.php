<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Login
    public function login()
    {

        return Inertia::render('Auth/Login');
    }
    //Authorization
    public function auth(Request $request)
    {
        //Form Validation
        $form = $request->validate(
            [
                'email' => ['required', 'email', 'exists:users'],
                'password' => ['required',]
            ],
            [
                'email.exists' => "No account found.",
            ]
        );
        if (Auth::attempt($form)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }
    }
    //Register
    public function register()
    {
        return Inertia::render('Auth/Register');
    }
    //Store User
    public function store(Request $request)
    {
        //Form Validation
        $form = $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => ['required', 'email', 'unique:users'],
            'password' => [
                'required',
                'confirmed',
                'string',
                'min:8',
                'max:20',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/'
            ]

        ], [
            'password.regex' => 'The password needs to have the credentials from above!'
        ]);
        //Password Hash
        $form['password'] = bcrypt($form['password']);
        //Create User
        $user = User::create($form);
        //Login User
        auth()->login($user);

        return redirect()->route('dashboard')->with('message', 'Account created and logged in"');
    }
    //Logout
    public function destroy(Request $request)
    {
        sleep(5);
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
