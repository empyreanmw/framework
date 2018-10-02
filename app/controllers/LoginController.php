<?php


namespace App\controllers;


use App\View;

class LoginController extends Controller
{
    public function index()
    {
        return View::get('login');
    }

    public function logout()
    {
        auth()->logout();
    }

    public function login(\Request $request)
    {
        auth()->login($request);
    }
}