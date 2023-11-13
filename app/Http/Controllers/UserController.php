<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required',  'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed',
            'user_type' => 'required'
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create user
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with("message", 'User created');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out');
    }

    public function login()
    {
        return view('users.login');
    }

    public function auth(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required',  'email'],
            'password' => 'required',
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();
            return redirect('/');
        }
        return back()->withErrors(["email" => "Invalid credentials"])->onlyInput('email');
    }

    function editProfile(Request $request)
    {
        $user = auth()->user();
        return view('users.profile.edit')->with(compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $formFields = $request->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
        ]);

        if($request->hasFile('profile_image')) {
            $formFields['profile_image'] = $request->file('profile_image')->store('/profile_image', 'public');
        }

        $user->update($formFields);
        UserDetails::create([
            'created_by'=>$user->id,
            'resume' => 'test'
        ]);

        return back()->with("message", "Profile updated successfully");
    }

    public function about(User $user)
    {
        return view('about')->with(compact('user'));
    }
}
