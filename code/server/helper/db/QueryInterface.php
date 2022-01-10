<?php

interface QueryInterface{
    public function selectRows($tableName,$columns=null,$conditions=null);
    public function calcSelectWhere($where);
    public function calcInsertWhere($where);
    public function delete($tableName,$id);
    public function delete2($tableName,$conditions);
    public function addRecord($tableName,$values);
    public function getLastId();
    public function update($tableName,$id,$values);
}