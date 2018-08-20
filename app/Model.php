<?php


namespace App;

use App\Facades\QueryBuilder;

class Model
{
    protected $table;
    public $attributes;

    /**
     * Model constructor.
     */

    public function create($parameters)
    {
        $qb = QueryBuilder::insert($this->table, $parameters);

        $attributes = QueryBuilder::find($this->table, $qb->lastInsertId());

        $this->setAttributes($attributes);

        return $this;
    }

    protected function setAttributes($attributes)
    {
        $this->attributes = $attributes;
    }

    public function delete()
    {
        QueryBuilder::delete($this->table, $this->attributes);
    }

    public function find($id)
    {
        $this->setAttributes(QueryBuilder::find($this->table, $id));

        return $this;
    }

    public function save()
    {
       QueryBuilder::update($this->table, $this->attributes);

       return $this->find($this->attributes['id']);
    }


    public function update($parameters)
    {
        $parameters['id'] = $this->attributes['id'];
        QueryBuilder::update($this->table, $parameters);

        return $this->find($this->attributes['id']);
    }

    public function all()
    {
        return QueryBuilder::all($this->table);
    }
}