<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $users = User::get();
        return view('dashboard.index',compact('users'));
    }

    public function edit() {
        return 'edit page';
    }

    public function update() {
        return 'update page';
    }

    public function delete(string $id) {
        return 'delete page';
    }
}
