<?php

session_start();
require_once "../../models/Media.php";

//echo $_POST["mediaId"];

Media::getInstance()->delete((int)$_POST["mediaId"]);


require_once '../../helper/utils.php';
header('location: '.base_url(true).$base_path.'pages/panel/manageMedia.php');