<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $users = User::get();
        return view('dashboard.index',compact('users'));
    }

    public function delete(string $id) {
        $user = User::findOrFail($id);

        if(Auth::user()->id === $user->id) {
            $user->delete();
            return redirect()->route('user.index')->with('success','Admin account deleted successfully!');
        }

        $user->delete();
        return redirect()->route('dashboard.index')->with('success','User deleted successfully!');
    }
}
