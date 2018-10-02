<?php

namespace App\Models;

class User extends Model
{
    protected $table = 'users';
    protected $identifier = 'username';

    public function getIdentifier()
    {
        return $this->identifier;
    }

    public function userExists()
    {
        return $this->exists($this->table, $this->attributes[$this->identifier], $this->identifier);
    }

    public function passwordMatch()
    {
        return $this->exists($this->table, $this->attributes['password'], 'password');
    }

    public function getTable()
    {
       return $this->table;
    }
}
