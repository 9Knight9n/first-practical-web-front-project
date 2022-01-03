<?php
if(session_status() !== PHP_SESSION_ACTIVE) session_start();

require_once getenv("BASE_DIR").'server/helper/utils.php';
require_once getenv("BASE_DIR")."server/helper/constants.php";
require_once getenv("BASE_DIR")."server/models/User.php";

if (!isset($_SESSION[getConstConf('sessionKey').'token']) || !(User::getInstance()->auth($_SESSION[getConstConf('sessionKey').'token'])))
    header('location: '.base_url(true).$base_path.'pages/login.php');
