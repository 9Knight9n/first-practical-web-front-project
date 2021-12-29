<?php

interface QueryInterface{
    public function selectRows($tableName,$columns=null,$conditions=null);
    public static function calcWhere($where);

}