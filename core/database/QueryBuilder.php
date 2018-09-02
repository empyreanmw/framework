<?php
namespace core\database;

use App\App;

class QueryBuilder
{
    protected $db;
    /**
     * QueryBuilder constructor.
     */
    public function __construct()
    {
        $this->db = App::get('db');
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        $statement = $this->db->prepare($sql);

        $statement->execute($parameters);

        return $this->db;

    }

    public function delete($table, $parameters)
    {
        $sql = 'DELETE from '.$table.' WHERE id=:id';
        $statement = $this->db->prepare($sql);
        $statement->bindParam(':id', $parameters['id'], \PDO::PARAM_INT);
        $statement->execute();
    }

    public function find($table, $id)
    {
        $sql = 'select * from ' . $table . ' where id = :id';
        $statement = $this->db->prepare($sql);
        $statement->execute(array(':id' => $id));

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($table, $parameters)
    {
        dump($this->createQuery($parameters));
        $sql = 'UPDATE '.$table.' SET '.$this->createQuery($parameters).' WHERE id=:id';
        $statement = $this->db->prepare($sql);

        unset($parameters['reg_date']);
        return $statement->execute($parameters);
    }

    public function createQuery($parameters)
    {
        $result="";
        unset($parameters['id']);
        unset($parameters['reg_date']);

        foreach (array_keys($parameters) as $parameter)
         {
             $result .= $parameter."=:".$parameter.",";
         }
         return rtrim($result,',');

    }

    public function all($table)
    {
        $sql = "SELECT * from {$table}";
        $statemenet = $this->db->prepare($sql);
        $statemenet->execute();

        return $statemenet->fetch(\PDO::FETCH_ASSOC);
    }

    public function tableExists($table)
    {
        $sql = "SELECT table_name FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'framework' AND TABLE_NAME = '$table'";

        $statement = $this->db->prepare($sql);

        $statement->execute();

        if (!! $statement->rowCount()) {
            return true;
        }

        return false;
    }

    public function dropAllTables()
    {

    }
}