<?php

require_once "Models.php";

class User extends Models
{

    public static function getInstance()
    {
        if (!isset(self::$instance) || self::$tableName !="users")
            self::$instance = new User("users");
        return self::$instance;
    }

    public function auth($token)
    {
//        var_dump($token);
        $result = self::$instance->where('token',$token)->get();
        return count($result)>0;
    }

}