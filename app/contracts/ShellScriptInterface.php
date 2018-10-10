<?php


namespace App\contracts;


interface ShellScriptInterface
{
    public function execute($file);
}