<?php
namespace core\database;


class QueryBuilder
{
    protected $pdo;
    /**
     * QueryBuilder constructor.
     */
    public function __construct()
    {
        $this->pdo = (new Connection())->make();
        $this->pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );

        $statement = $this->pdo->prepare($sql);

        $statement->execute($parameters);

        return $this->pdo;

    }

    public function exists($table, $value, $column)
    {
        $this->pdo->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
       $sql = "select {$column} from {$table} WHERE {$column} = :{$column}";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':' . $column, $value);
        $statement->execute();

        if (!! $statement->rowCount()) {
            return true;
        }

        return false;
    }

    public function search($table, $value, $column)
    {
        $sql = "select * from {$table} WHERE {$column} = :{$column}";
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':' . $column, $value);
        $statement->execute();

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function delete($table, $parameters)
    {
        $sql = 'DELETE from '.$table.' WHERE id=:id';
        $statement = $this->pdo->prepare($sql);
        $statement->bindParam(':id', $parameters['id'], \PDO::PARAM_INT);
        $statement->execute();
    }

    public function find($table, $id)
    {
        $sql = 'select * from ' . $table . ' where id = :id';
        $statement = $this->pdo->prepare($sql);
        $statement->execute(array(':id' => $id));

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function update($table, $parameters)
    {
        $sql = 'UPDATE '.$table.' SET '.$this->createQuery($parameters).' WHERE id=:id';
        $statement = $this->pdo->prepare($sql);

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
        $statemenet = $this->pdo->prepare($sql);
        $statemenet->execute();

        return $statemenet->fetch(\PDO::FETCH_ASSOC);
    }

    public function tableExists($table)
    {
/*        $this->db->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION );
        $sql = "SELECT 1 FROM '$table'";
        $statement = $this->db->prepare($sql);
        $statement->execute();

        if (!! $statement->rowCount()) {
            return true;
        }*/

        return false;
    }
}