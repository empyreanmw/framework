<?php


namespace App\controllers;

use App\View;

class HomeController extends Controller
{
    public function index()
    {
        return View::get('home');
    }
}