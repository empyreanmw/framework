<?php
namespace App\controllers;

use App\View;

class pagesController extends Controller {

    public function about()
    {
        $name = "Zeljko";
        $age = 13;

        View::get('about', compact(['name', 'age']));
    }

    public function index()
    {
        View::get('index');
    }
}