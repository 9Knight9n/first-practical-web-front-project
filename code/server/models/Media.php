<?php

require_once "Models.php";

class Media extends Models
{

    public static function getInstance()
    {
        if (!isset(self::$instance) || self::$tableName !="media")
            self::$instance = new Media("media");
        return self::$instance;
    }

}