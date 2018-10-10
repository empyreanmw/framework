<?php


namespace App\shell;

use App\Config;
use App\contracts\ShellScriptInterface;

class MySQLScript implements ShellScriptInterface
{
    public function execute($file)
    {
        shell_exec($this->buildCommand() . ' < ' . $file);
    }

    protected function buildCommand()
    {
        $database = Config::grab('database')->get('connections.mysql');

        return 'mysql -u '. $database['username']. ' -p' . $database['password']. ' ' . $database['name'];
    }
}