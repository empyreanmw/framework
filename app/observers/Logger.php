<?php


namespace App\observers;


use App\contracts\ObserverInterface;

class Logger implements ObserverInterface
{
    public function handle()
    {
        dump("observer");
    }
}