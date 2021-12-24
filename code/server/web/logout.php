<?php
session_start();
$_SESSION['token']=null;
header('location: http://localhost/first-practical-web-front-project/index.php');