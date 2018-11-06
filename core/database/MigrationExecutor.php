<?php


namespace core\database;
use App\File;
use App\Facades\MigrationFactory;

class MigrationExecutor
{
    public function Execute($connection)
    {
        File::clear('/var/www/framework/core/database/scripts/sql');

        MigrationFactory::build($connection);
    }
}