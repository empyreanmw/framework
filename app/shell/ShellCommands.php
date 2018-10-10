<?php


namespace App\shell;


use App\contracts\ShellScriptInterface;

class ShellCommands
{
    public function execute(ShellScriptInterface $script, $file)
    {
        $script->execute($file);
    }
}