<?php

require_once '../db/DbProvider.php';
require_once '../db/config.php';


class Models {

    protected static $tableName;

    protected static $db;

    protected function __construct()
    {
        self::$db = DbProvider::getInstance(getConf()['dbType'])->getConn();
    }

    public static function get_all($column)
    {
        return self::$db->selectRows(self::$tableName,$column);
    }

}