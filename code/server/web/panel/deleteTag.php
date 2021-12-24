<?php
require_once '../../helper/dbconnect.php';
require_once '../../helper/utils.php';
session_start();
echo $_POST['action'];
$sql = "DELETE FROM tags WHERE id={$_POST['action']}";
$result = mysqli_query($conn, $sql);
var_dump($result);
if (!$result)
{
    $_SESSION['deleteTagError'] = "ابتدا باید زیردسته ها را حذف کنید";
}
else
{
    $_SESSION['deleteTagError'] = null;
}
header('location: '.base_url(true).$base_path.'pages/panel/manageTags.php');