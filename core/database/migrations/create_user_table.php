<?php
namespace core\database\migrations;

use core\database\Blueprint;
use App\Facades\SQLBuilder;

class create_user_table
{
    protected $blueprint;
    /**
     * create_user_table constructor.
     */
    public function __construct(Blueprint $blueprint)
    {
        $this->blueprint = $blueprint;
    }

    public function up()
    {
        $this->blueprint->table('users');
        $this->blueprint->integer('id')->primary()->increment();
        $this->blueprint->string('firstname');
        $this->blueprint->string('email')->default('test');

        SQLBuilder::create($this->blueprint);
    }
}