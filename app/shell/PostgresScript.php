<?php


namespace App\shell;

use App\contracts\ShellScriptInterface;
use App\traits\ConnectionInfo;

class PostgresScript implements ShellScriptInterface
{
    use ConnectionInfo;

    public function execute($file, $connection)
    {
        shell_exec($this->buildCommand($connection) . $file);
    }

    protected function buildCommand($connection)
    {
        $this->getConnectionInfo($connection);

        return 'psql -d'. $this->connectionInfo['name']. ' -U ' . $this->connectionInfo['username']. ' -a -f ';
    }
}