<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
