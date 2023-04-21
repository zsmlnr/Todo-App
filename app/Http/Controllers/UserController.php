<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    //Profile Page
    public function profile()
    {
        return Inertia::render('User/Profile');
    }
    public function updateEmail(Request $request)
    {
        $form = $request->validate([
            'currentEmail' => 'required',
            'email' => 'required'
        ]);
        $user = Auth::user();
        $user->email = $form['email'];
        $user->save();

        return redirect()->back()->with('mesage', 'E-Mail updated succesful!');
    }
    public function updatePassword(Request $request)
    {
        $user = $request->user();

        $validatedData = $request->validate([
            'currentPassword' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (!Hash::check($validatedData['currentPassword'], $user->password)) {
            return redirect()->back()->withErrors([
                'currentPassword' => 'The current password you entered is incorrect.',
            ]);
        }

        $user->password = Hash::make($validatedData['password']);
        $user->save();

        return redirect()->back()->with('message', 'Password updated successfully.');
    }
    public function updatePicture(Request $request)
    {
        $request->validate([
            'src' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $user = auth()->user();
        if ($request->hasFile('src')) {
            $profilePic = $request->file('src')->store('avatars', 'public');
            $user->profile_pic = $profilePic;
            $user->save();
        }

        return redirect()->back()->with('message', 'Profile picture updated');
    }
}
