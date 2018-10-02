<?php

namespace App\Auth;

use App\Models\User;

class Auth
{
    public function login($entity)
    {
        $this->checkForRequest($entity);

        $this->authenticate($entity);

        $this->createSession($entity);

        \Redirect::to('home');
    }

    protected function authenticate($entity)
    {
        if(!$entity->userExists()){
            \Redirect::to('login');
        }

        if (!$entity->passwordMatch()) {
            \Redirect::to('login');
        }
    }

    protected function createSession($entity)
    {
        AuthenticatedUser::set($entity);
    }

    public function loggedIn()
    {
        return AuthenticatedUser::exists();
    }

    public function logout()
    {
        AuthenticatedUser::destroy();

        \Redirect::to('login');
    }

    public function checkForRequest(&$entity)
    {
        if ($entity instanceof \Request) {

            $user = new User();

            return $entity = $user->search(request()->input('username'), $user->getIdentifier());
        }
    }

    public function user()
    {
        return AuthenticatedUser::get();
    }
}