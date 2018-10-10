<?php


namespace App\commands\migrations;

use App\Facades\Migrations;
use App\ShellCommands;
use core\database\Connection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Migrate extends Command
{
    public function configure()
    {
        $this
            ->setName('migrate')
            ->setDescription('runs migrations');
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        Migrations::execute();

        Connection::instance()->getDriver()->executeSQL('/var/www/framework/core/database/scripts/sql');
    }
}