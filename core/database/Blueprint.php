<?php


namespace core\database;


class Blueprint
{
    public $attributes = [];
    public $table;

    public function table($name)
    {
        $this->table = $name;
    }

    public function string($name)
    {
       $this->attributes[] = [$name, 'varchar(60)'];

       return $this;
    }

    public function integer($name)
    {
        $this->attributes[] = [$name, 'INTEGER'];

        return $this;
    }

    public function primary()
    {
        $this->addOptionToAttribute('primary key');

        return $this;
    }

    public function default($value)
    {
        $this->addOptionToAttribute("default '".$value. "'");

        return $this;
    }

    public function increment()
    {
        $this->addOptionToAttribute('generated always as identity');

        return $this;
    }

    protected function findKey()
    {
        return key( array_slice( $this->attributes, -1, 1, TRUE ) );
    }

    protected function addOptionToAttribute($option)
    {
        $last_key = $this->findKey();

        array_push( $this->attributes[$last_key], $option);
    }

}
