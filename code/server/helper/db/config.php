<?php

require_once "Mysql.php";


function getConf()
{
    return [
        'dbType' => new Mysql(),
    ];
}
