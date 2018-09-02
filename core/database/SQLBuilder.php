<?php


namespace core\database;

use App\Facades\File;
use App\Facades\QueryBuilder;
class SQLBuilder
{
    protected $sql;

    public function create(Blueprint $blueprint)
    {
        foreach ($blueprint->attributes as $attribute) {
            foreach ($attribute as $attr) {
               $this->sql .= $attr. ' ';
            }
            $this->sql .= ',';
        }
        $this->sql = trim($this->sql, ',');
        $this->sql = 'create table ' . $blueprint->table . ' (' . $this->sql . ');';

        $this->appendSqlToFile($blueprint);
    }

    protected function appendSqlToFile($blueprint)
    {
        if(! QueryBuilder::tableExists($blueprint->table)){
            File::appendTo('/var/www/framework/core/database/scripts/sql', $this->sql);
        }
    }
}