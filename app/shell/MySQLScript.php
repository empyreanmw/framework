<?php


namespace App\shell;

use App\contracts\ShellScriptInterface;
use App\traits\ConnectionInfo;

class MySQLScript implements ShellScriptInterface
{
    use ConnectionInfo;

    public function execute($file, $connection)
    {
        shell_exec($this->buildCommand($connection) . ' < ' . $file);
    }

    protected function buildCommand($connection)
    {
        $this->getConnectionInfo($connection);

        return 'mysql -u '. $this->connectionInfo['username']. ' -p' . $this->connectionInfo['password']. ' ' . $this->connectionInfo['name'];
    }
}
