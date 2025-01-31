<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('user.index', compact('users'));
    }

    public function register(Request $request)
    {
        return view('user.register');
    }

    public function login(Request $request)
    {
        return view('user.login');
    }

    public function show(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        return view('user.show', compact('user'));
    }

    public function edit(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function editPassword($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit-password', compact('user'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.login');
    }

    public function processRegister(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:50|min:4',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:50|confirmed',
            'password_confirmation' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image_path = null;

        if ($request->hasFile('image')) {
            $image_path = Storage::disk('public')->put('images', $request->image);
        }

        $user = User::create([
            ...$fields,
            'password' => bcrypt($fields['password']),
            'image' => $image_path,
        ]);

        Auth::login($user);

        return redirect()->route('user.show', $user->id)->with('success', 'User registered successfully!');
    }

    public function processLogin(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:50',
        ]);

        $login = Auth::attempt($fields);
        if ($login) {
            return redirect()->route('user.show', Auth::user()->id)->with('success', 'User logged in successfully!');
        }
        return redirect()->route('user.login')->with('error', 'Invalid credentials!');
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $fields = $request->validate([
            'name' => 'nullable|max:50|min:4',
            'email' => 'nullable|email|max:255|unique:users,email,' . $user->id,
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $image_path = $user->image;
        if ($request->hasFile('image')) {
            if ($image_path != null) {
                Storage::disk('public')->delete($user->image);
            }
            $image_path = Storage::disk('public')->put('images', $request->image);
        }

        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'image' => $image_path
        ]);

        return redirect()->route('user.show', $user->id)->with('success', 'User profile updated successfully!');
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $fields = $request->validate([
            'password' => 'required|max:50',
            'new_password' => 'required|min:5|max:50|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect!');
        }

        $user->update([
            'password' => bcrypt($request->new_password),
        ]);

        return redirect()->route('user.show', $user->id)->with('success', 'Password updated successfully!');
    }
}
