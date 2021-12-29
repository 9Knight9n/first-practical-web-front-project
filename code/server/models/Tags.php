<?php

require_once "Models.php";

class Tags extends Models
{

//    public function __construct()
//    {
//        parent::__construct("tags");
//    }

    public static function getInstance()
    {
        if (!isset(self::$instance))
            self::$instance = new Tags("tags");
        return self::$instance;
    }

}

//Tags::getInstance()->where("name","دسته دوم");
//var_dump(Tags::getInstance()->find(71,"name"));
//var_dump(Tags::getInstance()->get("name"));

//$dwdw= '';
//var_dump(isset($dwdw));
//echo isset($dwdw);

//var_dump(Tags::selectRows());
//var_dump(Tags::getInstance()->query('name'));