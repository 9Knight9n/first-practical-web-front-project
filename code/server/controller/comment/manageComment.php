<?php
session_start();
require_once "../../models/Comment.php";
require_once '../../helper/utils.php';

if (isset($_POST['accept']))
{
    Comment::getInstance()->where('accepted',1)->update($_POST['accept']);
    header('location: '.base_url(true).$base_path.'pages/panel/viewComments.php');
}

if (isset($_POST['reject']))
{
    Comment::getInstance()->where('accepted',0)->update($_POST['reject']);
    header('location: '.base_url(true).$base_path.'pages/panel/viewComments.php');
}

if (isset($_POST['delete']))
{
    Comment::getInstance()->delete($_POST['delete']);
    header('location: '.base_url(true).$base_path.'pages/panel/viewComments.php');
}

