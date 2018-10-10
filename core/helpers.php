<?php
use App\App;
use App\Token;

function config($key)
{
    return App::get('config')->get($key);
}

function redirect()
{
    return App::make('Redirect');
}

function request()
{
    return App::make('Request');
}

function token()
{
    return '<input type="hidden" name="token" value="' . Token::get()  . '">';
}

function app()
{
    return new App(new \App\ServiceProvider());
}

function auth()
{
    return App::make('App\\Auth\\Auth');
}

function session()
{
    return \Session\Session::instance();
}
