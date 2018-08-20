<?php
namespace core\database;

class Connection
{
    public static function make()
    {
        $database = config('Database');

        try {
                $conn = new \PDO("{$database['connection']};dbname={$database['name']}", $database['username'], $database['password']);
            }
        catch(\PDOException $e)
            {
                 echo "Connection failed";
            }

            return $conn;
    }
}