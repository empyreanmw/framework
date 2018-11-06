<?php
namespace core\database\migrations;

use App\Facades\SQLBuilder;
use core\database\Migration;

class create_user_table extends Migration
{
    public function up($connection)
    {
        $this->blueprintSetUp($connection);

        $this->blueprint->table('users');
        $this->blueprint->integer('id')->primary()->increment();
        $this->blueprint->string('username');
        $this->blueprint->string('password');
        $this->blueprint->string('email')->default('test');

        SQLBuilder::create($this->blueprint);
    }
}