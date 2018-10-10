<?php


namespace core\database;
use App\File;
use App\Facades\MigrationFactory;

class Migrations
{
    public function Execute()
    {
        File::clear('/var/www/framework/core/database/scripts/sql');

        MigrationFactory::build();
    }
}