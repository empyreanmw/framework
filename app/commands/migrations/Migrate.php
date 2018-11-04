<?php


namespace App\commands\migrations;

use App\Facades\Migrations;
use App\ShellCommands;
use core\database\Connection;
use core\database\drivers\DriverFactory;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Migrate extends Command
{
    public function configure()
    {
        $this
            ->setName('migrate')
            ->setDescription('runs migrations')
            ->addArgument('connection', InputArgument::OPTIONAL, 'Executes command on a specific connection');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        Migrations::execute();
        (new DriverFactory(new Connection($input->getArgument('connection')), '/var/www/framework/core/database/scripts/sql'))
        ->build();
    }
}