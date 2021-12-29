<?php

require_once 'ConfigDbInterface.php';
require_once 'QueryInterface.php';

class Mysql implements ConfigDbInterface,QueryInterface {
    private $conn ;
    private static $host = 'db';
    private static $username = 'root';
    private static $password = 'root';
    private static $database_name = 'first_practical_web_project';


    public function getConn()
    {
        return $this->conn;
    }

    public function connect()
    {
        $this->conn = mysqli_connect(self::$host, self::$username, self::$password,self::$database_name);
    }

    public function selectRows($tableName,$columns=null,$conditions=null)
    {
        $sql = "SELECT ".(isset($columns)?$columns:"*")." from ".$tableName.(isset($conditions)?" where ".$conditions.";":'');
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all ($result, MYSQLI_ASSOC);
    }

    public static function calcWhere($where)
    {
        if (!isset($where))
            return null;
        $keys = array_keys($where);
        $str = $keys[0]." = ".(is_string($where[$keys[0]])?("'".$where[$keys[0]]."'"):$where[$keys[0]]);
        for ($index=1;$index < count($where);$index++)
        {
            $str .= " AND ".$keys[$index]." = '".$where[$keys[$index]]."' ";
        }
        return $str;
    }
}
