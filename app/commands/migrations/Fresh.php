<?php

namespace App\commands\migrations;

use App\Facades\Migrations;
use core\database\Connection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Fresh extends Command
{
    public function configure()
    {
        $this
            ->setName('migrate:fresh')
            ->setDescription('Drops all the tables in the database and creates them from scratch.');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        Connection::instance()->getDriver()->executeSQL('/var/www/framework/core/database/scripts/drop_all_tables');

        Migrations::execute();

        Connection::instance()->getDriver()->executeSQL('/var/www/framework/core/database/scripts/sql');
    }
}
