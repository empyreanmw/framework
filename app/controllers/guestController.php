<?php
namespace App\controllers;

use App\validation\Validator;

class guestController extends Controller
{

    public function __construct()
    {
        $this->middleware(['Test'])->except('delete');
    }

    public function store( Validator $validate, \Request $request, \Redirect $redirect)
    {
        request()->validate(['firstname' => 'min:3|required', 'lastname' => 'min:2']);
    }

    public function delete()
    {

    }
}