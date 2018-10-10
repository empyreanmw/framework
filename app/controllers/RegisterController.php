<?php

namespace App\controllers;

use App\Models\User;
use App\View;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('Guest');
    }

    public function index()
    {
        View::get('register');
    }

    public function create(User $user, \Request $request)
    {
        $request->validate([
            'email' => 'email|unique:users',
            'password' => 'min:3'
        ]);

        $request->hashPassword();

        $user = $user->create($request->input());

        auth()->login($user);
    }
}