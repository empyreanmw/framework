<?php


namespace App\contracts;


interface SubjectInterface
{
    public function attach($observers);

    public function fire($observers);
}