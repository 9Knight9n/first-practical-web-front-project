<?php


//  variables
//    $host = 'localhost';
    $host = 'db';
    $username = 'root';
    $password = 'root';
    $database_name = 'first_practical_web_project';

//  setup connection
    $conn = mysqli_connect($host, $username, $password,$database_name);
    define("conn",$conn);

//  Check connection
    if (!conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

//    echo "Connected successfully","\n";

?>