<?php

require_once "Mysql.php";


class DbProvider  {

    private static $db;
    private static $instance;

    private function  __construct(ConfigDbInterface $db)
    {
        self::$db = $db;
    }

    public static function getInstance(ConfigDbInterface $db=null)
    {
        if (!isset(self::$instance))
        {
            if (!isset($db))
            {
                echo "Database not instantiated!";
                exit(-1);
            }
            self::$instance = new DbProvider($db);
            self::$db->connect();
        }
        return self::$instance;
    }

    public function getConn()
    {
        return self::$db;
    }

}



//$db = DbProvider::getInstance(new Mysql())->getConn();
//var_dump($db->selectRows('tags'));