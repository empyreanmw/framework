<?php


namespace core\database\drivers;


class PostgresConnection
{
    public function connect($connectionInfo)
    {
        try {
            $conn = new \PDO("pgsql:host={$connectionInfo['host']};port={$connectionInfo['port']};dbname={$connectionInfo['name']};user={$connectionInfo['username']};password={$connectionInfo['password']}");
            $conn->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        }
        catch(\PDOException $e)
        {
            echo "Connection failed". $e->getMessage();
        }

        return $conn;

    }
}