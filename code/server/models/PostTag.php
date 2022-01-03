<?php

require_once "Models.php";

class PostTag extends Models
{

    public static function getInstance()
    {
        if (!isset(self::$instance) || self::$tableName !="post_tag")
            self::$instance = new PostTag("post_tag");
        return self::$instance;
    }
}

