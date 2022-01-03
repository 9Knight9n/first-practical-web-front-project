<?php

require_once "Models.php";

class Post extends Models
{

    public static function getInstance()
    {
        if (!isset(self::$instance) || self::$tableName !="posts")
            self::$instance = new Post("posts");
        return self::$instance;
    }

}