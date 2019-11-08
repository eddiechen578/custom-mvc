<?php

namespace Core;

use PDO;

class Model
{
    protected $prefix = null;
    protected $pdo = null;
    protected $select = '*';
    protected $from = null;
    protected $where = null;
    protected $limit = null;
    protected $offset = null;
    protected $join = null;
    protected $orderBy = null;
    protected $groupBy = null;
    protected $having = null;
    protected $grouped = false;
    protected $numRows = 0;
    protected $insertId = null;
    protected $query = null;
    protected $error = null;
    protected $result = [];
    protected $op = ['=', '!=', '<', '>', '<=', '>=', '<>'];
    protected $cache = null;
    protected $cacheDir = null;
    protected $queryCount = 0;
    protected $debug = true;
    protected $transactionCount = 0;


   public function __construct_child()
    {
        $this->setDatabase();
    }

   public function setDatabase()
    {
        $host = (isset(Router::$config['DB']['host'])? Router::$config['DB']['host']: 'localhost');
        $dbname = (isset(Router::$config['DB']['dbname'])? Router::$config['DB']['dbname']: 'udemy');
        $username = (isset(Router::$config['DB']['username'])? Router::$config['DB']['username']: 'eddie');
        $password = (isset(Router::$config['DB']['password'])? Router::$config['DB']['password']: '1111');
        $this->prefix = DB_PREFIX;
        try {
          $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
              $username, $password);

        } catch (\PDOException $e){
            echo $e->getMessage();
        }
    }

    public function select($fileds)
    {
        $select = (is_array($fileds)? implode(', ', $fileds): $fileds);
        $this->select = ($this->select == "*"? $select: $this->select. ', '.$select);
        return $this;
    }

    public function max($field, $name = null)
    {
        $func = 'MAX(' .$field. ')' . (! is_null($name)? ' AS ' . $name : '');
        $this->select = ($this->select == '*'? $func: $this->select . ', ' . $func);
        return $this;
    }

    public function min($field, $name = null)
    {
        $func = 'MIN(' .$field. ')' . (! is_null($name)? ' AS ' . $name : '');
        $this->select = ($this->select == '*'? $func: $this->select . ',' . $func);
        return $this;
    }

    public function sum($field, $name = null)
    {
        $func = 'SUM(' .$field. ')' . (! is_null($name)? ' AS ' . $name : '');
        $this->select = ($this->select == '*'? $func: $this->select . ',' . $func);
        return $this;
    }

    public function count($field, $name = null)
    {
        $func = 'COUNT(' .$field. ')' . (! is_null($name)? ' AS ' . $name : '');
        $this->select = ($this->select == '*'? $func: $this->select . ',' . $func);
        return $this;
    }

    public function avg($field, $name = null)
    {
        $func = 'AVG(' .$field. ')' . (! is_null($name)? ' AS ' . $name : '');
        $this->select = ($this->select == '*'? $func: $this->select . ',' . $func);
        return $this;
    }

    public function join($table, $field1 = null, $op = null, $field2 = null, $type = '')
    {
        $on = $field1;
        $table = $table;

        if(! is_null($op)){
            $on = (! in_array($op, $this->op)? $field1 . '=' . $op: $field1 . ' ' . $op . ' ' . $field2);
        }

        if(is_null($this->join)){
            $this->join = ' ' . $type . 'JOIN' . ' ' . $table . ' ON ' . $on;
        }else{
            $this->join = $this->join . ' ' . $type . 'JOIN' . ' ' . $table . ' ON ' . $on;
        }

        return $this;
    }

    public function innerJoin($table, $field1, $op = '', $field2 = '')
    {
        $this->join($table, $field1, $op , $field2 , 'INNER');

        return $this;
    }

    public function leftJoin($table, $field1, $op = '', $field2 = '')
    {
        $this->join($table, $field1, $op , $field2 , 'LEFT');

        return $this;
    }

    public function rightJoin($table, $field1, $op = '', $field2 = '')
    {
        $this->join($table, $field1, $op, $field2 , 'RIGHT');

        return $this;
    }

    public function fullOuterJoin($table, $field1, $op = '', $field2 = '')
    {
        $this->join($table, $field1, $op , $field2 , 'FULL OUTER');

        return $this;
    }

    public function leftOuterJoin($table, $field1, $op = '', $field2 = '')
    {
        $this->join($table, $field1, $op , $field2 , 'LEFT OUTER');

        return $this;
    }
    /**
     * @return null
     */
    public function getselect()
    {
        return $this;
    }


}