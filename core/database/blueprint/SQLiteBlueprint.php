<?php

namespace core\database\blueprint;

use App\contracts\BlueprintInterface;

class SQLiteBlueprint extends Blueprint implements BlueprintInterface
{
    public function increment()
    {
        $this->addOptionToAttribute('AUTOINCREMENT');

        return $this;
    }
}