<?php

namespace core\database\blueprint;

use App\contracts\BlueprintInterface;

class PostgresBlueprint extends Blueprint implements BlueprintInterface
{
    public function increment()
    {
        $this->addOptionToAttribute('generated always as identity');

        return $this;
    }
}