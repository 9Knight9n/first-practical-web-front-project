<?php
session_start();
require '../helper/utils.php';
$_SESSION['token']=null;
header('location: '.base_url(true).$base_path.'index.php');