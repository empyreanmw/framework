<?php


namespace App;


class ShellExec
{

    public static function MySQL($file)
    {
        shell_exec(self::MySQLConnection() . ' < ' . $file);
    }

    protected static function MySQLConnection()
    {
        return 'mysql -u '. config('Database.username'). ' -p' . config('Database.password' ). ' ' . config('Database.name');
    }
}