<?php


namespace App;


class Hash
{
    public function make($password, $algorithm = PASSWORD_DEFAULT, $options = [])
    {
        return password_hash($password, $algorithm, $options);
    }
}