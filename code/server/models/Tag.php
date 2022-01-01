<?php

require_once "Models.php";

class Tag extends Models
{

    public static function getInstance()
    {
        if (!isset(self::$instance) || self::$tableName !="tags")
            self::$instance = new Tag("tags");
        return self::$instance;
    }

}

//Tag::getInstance()->where('name',"دسته چهارم",true)->where('id',100)->addRecord();

//Tag::getInstance()->where("name","دسته دوم");
//var_dump(Tag::getInstance()->find(71,"name"));
//var_dump(Tag::getInstance()->get("name"));

//$dwdw= '';
//var_dump(isset($dwdw));
//echo isset($dwdw);

//var_dump(Tag::selectRows());
//var_dump(Tag::getInstance()->query('name'));