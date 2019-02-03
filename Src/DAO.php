<?php

namespace Framework;

use PDO;
Use App\Config;

abstract class DAO
{
    protected $table;

    public Function newDbCon($resultAsArray = false)
    {
        //$config = new Config();
        $dsn = Config::DB['driver'];
        $dsn .= ":host=".Config::DB['host'];
        $dsn .= ";dbname=".Config::DB['dbname'];
        $dsn .= ";port=".Config::DB['port'];
        $dsn .= ";charset=".Config::DB['charset'];

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        //by default the result from database will be an object but if specified it can be changed to    an associative array / matrix
        if ($resultAsArray) {
            $options[PDO::ATTR_DEFAULT_FETCH_MODE] = PDO::FETCH_ASSOC;
        }

   try {
       return new PDO($dsn, Config::DB['user'], Config::DB['pass'], $options);
   } catch (\PDOException $e) {
       throw new \PDOException($e->getMessage(), (int)$e->getCode());
   }



    }

    /**
     *Return all data from table
     */
    public Function getAll(): array
    {
        $db = $this->newDbCon();
        $stmt = $db->query("SELECT * from $this->table");

        return $stmt->fetchAll();
    }

    /**
     *Return data with specified id/index
     */
    public function get($id)
    {
        $db = $this->newDbCon();
        $stmt = $db->prepare("SELECT * from $this->table where id=?");
        $stmt->execute([$id]);
        $rez = $stmt->fetch();
        return $rez;
    }

    /**
     * this function will prepare data to be used in sql statement
     * 1. Will extract values from $data
     * 2. Will create the prepared sql string with columns from $data
     */

    protected function prepareDataForStmt(array $data): array
    {
        $i = 1;
        $columns = '';
        $values = [];

        foreach ($data as $key => $value) {
            $values[] = $value;
            $columns .= $key .'=?';

            if($i < (count($data))) {
                $columns .= ", ";
            }

            $i++;
        }

        return [$columns, $values];
    }

    /**
     *Find data with values
     */
    public function find(array $data)
    {
        list($columns, $values) = $this->prepareDataForStmt($data);
        $db = $this->newDbCon();
        $stmt = $db->prepare("SELECT * from $this->table where $columns");
        return $stmt->execute([$values]);
    }

    public function getByParams(array $data){
        list($columns, $values) = $this->prepareDataForStmt($data);
        $db = $this->newDbCon();
        $stmt = $db->prepare("SELECT * from $this->table where $columns");
        $stmt->execute($values);
        $rez = $stmt->fetch();
        return $rez;
    }

    public function getAllByParams(array $data){
        list($columns, $values) = $this->prepareDataForStmt($data);
        $db = $this->newDbCon();
        $stmt = $db->prepare("SELECT * from $this->table where $columns");
        $stmt->execute($values);
        $rez = $stmt->fetchAll();
        return $rez;
    }

    /**
     *Insert new data in table
     */
    public function new(array $data)
    {
        $values = array_values($data);
        $db = $this->newDbCon();
        $params = "?";
        for($i=0;$i<count($data)-1;$i++){
            $params.=",?";
        }
        $col = implode(",",array_keys($data));
        $stmt=$db->prepare("INSERT INTO $this->table($col) VALUES ($params)");
        $stmt->execute($values);
    }

    /**
     *Update data in table
     */
    public function update(array $where, array $data)
    {
        list($columns, $values) = $this->prepareStmt($data);
        //add the value of $where array to the list of $values that will be used in the prepared statement
        //reset($where) it's a trick to extract the value of an associative array with a single element
        $values[] = reset($where);

        $db = $this->newDbCon();
        $stmt = $db->prepare('UPDATE ' . $this->table . ' SET ' . $columns . ' WHERE ' . key($where) . '=?');

        return $stmt->execute($values);
    }

    /**
     *delete data from table
     */
    public function delete($id)
    {
    }

}
