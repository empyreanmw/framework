<?php


namespace App\Auth;


use Session\Session;

class AuthenticatedUser
{
    public static function get()
    {
        return Session::instance()->get('user');
    }

    public static function set($user)
    {
        Session::instance()->set('user', $user);
    }

    public static function exists()
    {
        $user = self::get();

        return isset($user);
    }

    public static function destroy()
    {
        Session::instance()->delete('user');
    }
}