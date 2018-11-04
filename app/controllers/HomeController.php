<?php


namespace App\controllers;

use App\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('Auth');
    }

    public function index()
    {
        return View::get('home');
    }
}