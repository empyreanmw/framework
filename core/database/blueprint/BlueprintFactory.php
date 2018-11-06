<?php


namespace core\database\blueprint;

use App\traits\ConnectionInfo;

class BlueprintFactory
{
    use ConnectionInfo;

    protected $blueprints = [
        'mysql' => MySQLBlueprint::class,
        'sqlite' => SQLiteBlueprint::class,
        'postgres' => PostgresBlueprint::class
    ];

    public function build($connection)
    {
        $this->getConnectionInfo($connection);

        return new $this->blueprints[$this->connectionInfo['driver']];
    }
}