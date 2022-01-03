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

    public function getWithIndent()
    {
        $newResult = array();

        $relations = $this->db->selectRows("tag_parent","*", $this->db->calcSelectWhere($this->where));
        $result = $this->db->selectRows(self::$tableName,"*", $this->db->calcSelectWhere($this->where));
        for ($index = 0;$index < count($result) ; $index++)
        {
            $id = $result[$index]["id"];
            $newResult[$id]= $result[$index];
            $newResult[$id]['indent'] = 0;
        }
        foreach($relations as $relation)
        {
            $newResult[$relation['id']]['parent'] = $relation['parent_id'];
        }

        $out = array();

        foreach ($newResult as $id => $value)
        {
            if (!isset($value['parent']))
            {
                array_push($out,$value);
                $this->addChild($relations,$newResult,$id,$out);
            }
        }

        $this->where = [];
        return $out;
    }

    private function addChild($relations,&$newResult,$parent,&$out)
    {
        $indent = $newResult[$parent]['indent'];
        foreach($relations as $relation)
        {
            if ($relation['parent_id'] == $parent)
            {
                $newResult[$relation['id']]['indent'] = $indent+1;
                array_push($out, $newResult[$relation['id']]);
                $this->addChild($relations,$newResult,$relation['id'],$out);
            }
        }
    }
}

