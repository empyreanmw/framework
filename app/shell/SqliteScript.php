<?php


namespace App\shell;


use App\contracts\ShellScriptInterface;

class SqliteScript implements ShellScriptInterface
{
    public function execute($file)
    {
        shell_exec($this->buildCommand() . ' < ' . $file);
    }

    protected function buildCommand()
    {
        return 'sqlite3 /var/www/framework/storage/test.db';
    }
}