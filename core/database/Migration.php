<?php

namespace core\database;

use core\database\blueprint\BlueprintFactory;

class Migration
{
    protected $blueprint;

    public function blueprintSetUp($connection)
    {
        $this->blueprint = (new BlueprintFactory())->build($connection);
    }
}