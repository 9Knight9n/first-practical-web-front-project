<?php

require_once getenv('BASE_DIR').'server/helper/db/DbProvider.php';
require_once getenv('BASE_DIR').'server/helper/db/config.php';



abstract class Models {

    protected static $lastId;

    protected static $tableName;

    protected static $db;

    protected static $instance;

    protected static $where;

    public function __construct($tableName)
    {
        self::$db = DbProvider::getInstance(getConf()['dbType'])->getConn();
        self::$tableName = $tableName;
    }

    public static function where($key,$value,$reset=null)
    {
        if ($reset)
            self::$where = [];
        self::$where[$key]=$value;
        return self::$instance;
    }

    public static function get($column=null)
    {
        $result = self::$db->selectRows(self::$tableName,$column,self::$db->calcWhere(self::$where));
        self::$where = [];
        return $result;
    }

    public static function find($id,$column=null)
    {
        $tempWhere = self::$where;
        self::where("id",$id);
        $result = self::$db->selectRows(self::$tableName,$column,self::$db->calcWhere(self::$where));
        self::$where = $tempWhere;
        return $result;
    }

    public static function delete()
    {

    }


//    public static function addRecord($values , $keys=null)
//    {
////        return self::$db->addRecord(self::$tableName,$values,$keys);
//    }

}
