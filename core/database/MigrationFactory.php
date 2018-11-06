<?php

namespace core\database;

use Symfony\Component\Finder\Finder;

class MigrationFactory
{
    protected $finder;
    protected $migrations = [];
    /**
     * MigrationHandler constructor.
     * @param $finder
     */
    public function __construct(Finder $finder)
    {
        $this->finder = $finder;
        $this->findMigrations();
    }

    public function build($connection)
    {
        foreach ($this->migrations as $migration) {
            $migration = trim($migration, '.php');
            $migration = 'core\\database\\migrations\\'.$migration;

            app()->make($migration)->up($connection);
        }
    }

    public function findMigrations()
    {
        $finder = $this->finder->files()->in('/var/www/framework/core/database/migrations');

        foreach ($finder as $file) {
            $this->migrations[] = $file->getRelativePathname();
        }
    }



}