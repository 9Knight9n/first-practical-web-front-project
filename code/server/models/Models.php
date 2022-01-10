<?php

require_once getenv('BASE_DIR').'server/helper/db/DbProvider.php';
require_once getenv('BASE_DIR').'server/helper/db/config.php';



abstract class Models {


    protected static $tableName;

    protected $db;

    protected static $instance;

    protected $where;

    public function __construct($tableName)
    {
        $this->db = DbProvider::getInstance(getConf()['dbType'])->getConn();
        self::$tableName = $tableName;
    }

    public function where($key,$value,$reset=null)
    {
        if ($reset)
            $this->where = [];
        $this->where[$key]=$value;
        return self::$instance;
    }

    public function get($column=null)
    {
        $result = $this->db->selectRows(self::$tableName,$column, $this->db->calcSelectWhere($this->where));
        $this->where = [];
        return $result;
    }

    public function find($id,$column=null)
    {
        $tempWhere = $this->where;
        $this->where("id",$id);
        $result =  $this->db->selectRows(self::$tableName,$column, $this->db->calcSelectWhere($this->where));
        $this->where = $tempWhere;
        return count($result)>0?$result[0]:false;
    }

    public function delete($id)
    {
        return  $this->db->delete(self::$tableName,$id);
    }

    public function delete2()
    {
        return  $this->db->delete2(self::$tableName,$this->db->calcSelectWhere($this->where));
    }


    public function addRecord()
    {
        if (!isset($this->where) || count($this->where)==0)
            return false;
        $result = $this->db->addRecord(self::$tableName,$this->db->calcInsertWhere($this->where));
        $this->where = [];
        return $result;
    }

    public function update($id)
    {
        if (!isset($this->where) || count($this->where)==0)
            return false;
        $result = $this->db->update(self::$tableName,$id,$this->db->calcUpdateWhere($this->where));
        $this->where = [];
        return $result;
    }

    public function getLastId()
    {
        return $this->db->getLastId();
    }
}
