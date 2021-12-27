<?php

require_once "models.php";

class Tags extends Models
{

    protected static $instance;

    protected function __construct()
    {
        parent::__construct();
        self::$tableName = "tags";
    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new Tags();
        return self::$instance;
    }

}

var_dump(Tags::getInstance()->get_all('name'));