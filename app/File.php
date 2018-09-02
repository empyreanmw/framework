<?php


namespace App;


class File
{
    public function appendTo($path, $data)
    {
        file_put_contents($path, $data.PHP_EOL , FILE_APPEND | LOCK_EX);
    }

    public function write($path, $data)
    {
        file_put_contents($path, $data.PHP_EOL , LOCK_EX);
    }

    public function clear($path)
    {
        file_put_contents($path, "", LOCK_EX);
    }


}