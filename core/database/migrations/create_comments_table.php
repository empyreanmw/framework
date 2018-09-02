<?php


namespace core\database\migrations;
use App\Facades\SQLBuilder;
use core\database\Blueprint;

class create_comments_table
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
        $this->blueprint->table('comments');
        $this->blueprint->integer('id')->increment()->primary();
        $this->blueprint->string('text');
        SQLBuilder::create($this->blueprint);
    }

}
