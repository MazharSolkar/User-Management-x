<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
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
        return view('user.show', ['id' => 1]);
    }

    public function processRegister(Request $request)
    {
        return 'processing registration';
    }

    public function processLogin(Request $request)
    {
        return 'processing login';
    }
}
