<?php

require_once "Models.php";

class Comment extends Models
{

    public static function getInstance()
    {
        if (!isset(self::$instance) || self::$tableName !="comments")
            self::$instance = new Comment("comments");
        return self::$instance;
    }


    public function getPostComment($id)
    {
        $out = array();
        $results = $this->where('post_id',(int)$id)->where('accepted',0)->get();
//        var_dump($results);
        foreach ($results as $value)
        {
            if (!isset($value['parent_id']))
            {
                array_push($out,$value);
                $this->addChild($out,$results,$value['id']);
            }
        }

        return $out;
    }

    private function addChild(&$out,$results,$parentId)
    {
        foreach ($results as $value)
        {
            if (isset($value['parent_id']) && $value['parent_id']==$parentId)
            {
                array_push($out,$value);
                $this->addChild($out,$results,$value['id']);
            }
        }
    }

}