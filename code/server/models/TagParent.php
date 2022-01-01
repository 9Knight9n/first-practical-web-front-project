<?php

require_once "Models.php";

class TagParent extends Models
{

    public static function getInstance()
    {
        if (!isset(self::$instance) || self::$tableName !="tag_parent")
            self::$instance = new Tag("tag_parent");
        return self::$instance;
    }

}