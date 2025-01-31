<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $users = User::when($search, function ($query) use ($search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        })->paginate(10);

        return view('dashboard.index', compact('users'));
    }

    public function create(Request $request) {
        return view('dashboard.create');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|max:50|min:4',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:50|confirmed',
            'password_confirmation' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
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

        return redirect()->route('dashboard.index')->with('success', 'New user added successfully!');
    }

    public function delete(string $id)
    {
        $user = User::findOrFail($id);
        Gate::authorize('isOwnerOrAdmin', Auth::user());

        if (Auth::user()->id === $user->id) {
            $user->delete();
            return redirect()->route('user.index')->with('success', 'Admin account deleted successfully!');
        }

        $user->delete();
        return redirect()->route('dashboard.index')->with('success', 'User deleted successfully!');
    }
}
