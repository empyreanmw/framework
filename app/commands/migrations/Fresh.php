<?php

namespace App\commands\migrations;

use App\Facades\Migrations;
use core\database\Connection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\shell\DriverConsoleScriptFactory;

class Fresh extends Command
{
    public function configure()
    {
        $this
            ->setName('migrate:fresh')
            ->setDescription('Drops all the tables in the database and creates them from scratch.')
            ->addArgument('Connection', InputArgument::OPTIONAL, 'Executes command on a specific connection');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $connection = new Connection($input->getArgument('Connection'));

        (new DriverConsoleScriptFactory($connection, '/var/www/framework/core/database/scripts/drop_all_tables'))->build();

         Migrations::execute($connection);

        (new DriverConsoleScriptFactory($connection, '/var/www/framework/core/database/scripts/sql'))->build();
    }
}
