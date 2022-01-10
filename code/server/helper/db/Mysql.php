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

    public function calcSelectWhere($where)
    {
        if (!isset($where) || count($where)==0)
            return null;
        $keys = array_keys($where);
        $str = $keys[0]." = ".(is_string($where[$keys[0]])?("'".$where[$keys[0]]."'"):$where[$keys[0]]);
        for ($index=1;$index < count($where);$index++)
        {
            $str .= " AND ".$keys[$index]." = ".(is_string($where[$keys[$index]])?("'".$where[$keys[$index]]."'"):$where[$keys[$index]])." ";
        }
        return $str;
    }

    public function calcUpdateWhere($where)
    {
        if (!isset($where) || count($where)==0)
            return null;
        $keys = array_keys($where);
        $str = $keys[0]." = ".(is_string($where[$keys[0]])?("'".$where[$keys[0]]."'"):$where[$keys[0]]);
        for ($index=1;$index < count($where);$index++)
        {
            $str .= " , ".$keys[$index]." = ".(is_string($where[$keys[$index]])?("'".$where[$keys[$index]]."'"):$where[$keys[$index]])." ";
        }
        return $str;
    }

    public function calcInsertWhere($where)
    {
        if (!isset($where) || count($where)==0)
            return null;
        $keys = array_keys($where);
        $str1 = " (".$keys[0];
        $str2 = " (".(is_string($where[$keys[0]])?("'".$where[$keys[0]]."'"):$where[$keys[0]]);
        for ($index=1;$index < count($where);$index++)
        {
            $str1 .= ",".$keys[$index];
            $str2 .= ",".(is_string($where[$keys[$index]])?("'".$where[$keys[$index]]."'"):$where[$keys[$index]]);
        }
        $str1 .= ") ";
        $str2 .= ") ";
        $result = array();
        $result[0]=$str1;
        $result[1]=$str2;
        return $result;
    }

    public function delete($tableName,$id)
    {
        $sql = "DELETE FROM ".$tableName." WHERE id={$id};";
        return mysqli_query($this->conn, $sql);
    }

    public function delete2($tableName,$conditions)
    {
        $sql = "DELETE FROM ".$tableName." WHERE ".$conditions.";";
        return mysqli_query($this->conn, $sql);
    }

    public function addRecord($tableName,$values)
    {
        $sql = "INSERT INTO ".$tableName.$values[0]." VALUES ".$values[1].";";
        return mysqli_query($this->conn, $sql);
    }

    public function getLastId()
    {
        return mysqli_insert_id($this->conn);
    }

    public function update($tableName,$id,$values)
    {
        $sql = "UPDATE ".$tableName." SET  ".$values." WHERE id=".$id.";";
        return mysqli_query($this->conn, $sql);
    }
}
