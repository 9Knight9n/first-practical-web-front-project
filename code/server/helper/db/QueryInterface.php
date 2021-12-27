<?php

interface QueryInterface{
    public function selectRows($tableName,$columns=null,$conditions=null);
}