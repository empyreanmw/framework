<?php


namespace core\database\migrations;


use core\database\Blueprint;
use App\Facades\SQLBuilder;

class create_post_table
{
    protected $blueprint;

    /**
     * create_post_table constructor.
     * @param $blueprint
     */
    public function __construct(Blueprint $blueprint)
    {
        $this->blueprint = $blueprint;
    }


    public function up()
    {
        $this->blueprint->table('posts');
        $this->blueprint->integer('id')->increment()->primary();
        $this->blueprint->string('title');
        SQLBuilder::create($this->blueprint);
    }
}