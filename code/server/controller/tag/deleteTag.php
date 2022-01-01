<?php
session_start();
require_once "../../models/Tag.php";
require_once "../../models/TagParent.php";

$result = TagParent::getInstance()->where("parent_id",$_POST['action'],true)->get();

if (count($result)>0)
    $_SESSION['deleteTagError'] = "ابتدا باید زیردسته ها را حذف کنید";
else
{
    $result = Tag::getInstance()->delete($_POST['action']);
    if ($result)
        $_SESSION['deleteTagError'] = null;
    else
        $_SESSION['deleteTagError'] = "مشکلی در حذف دسته پدید آمد";
}

require_once '../../helper/utils.php';
header('location: '.base_url(true).$base_path.'pages/panel/manageTags.php');