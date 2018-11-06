<?php

namespace core\database\blueprint;

use App\contracts\BlueprintInterface;

class MySQLBlueprint extends Blueprint implements BlueprintInterface
{
    public function increment()
    {
        $this->addOptionToAttribute('auto_increment');

        return $this;
    }
}