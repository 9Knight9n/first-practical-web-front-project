<?php
session_start();

require_once '../../helper/utils.php';

$_SESSION['selectedMediaId']=isset($_POST["selectedMediaId"])?$_POST["selectedMediaId"]:null;
$_SESSION['tags']=isset($_POST["tags"])?$_POST["tags"]:null;
$_SESSION['title']=isset($_POST["title"])?$_POST["title"]:null;
$_SESSION['content']=isset($_POST["content"])?$_POST["content"]:null;



//if (isset($_POST['mediaId']))
//{
//    $_SESSION['selectedFile'] = $_POST['mediaId'];
//    require_once '../../helper/utils.php';
//    unset($_POST['mediaId']);
//    header('location: '.base_url(true).$base_path.'pages/panel/addPosts.php');
//}

if (!isset($_POST["selectedMediaId"]) || empty(trim($_POST["selectedMediaId"])))
{
    $Error = 'لطفا پوستر را انتخاب کنید';
}


if (!isset($_POST["tags"]) || count($_POST["tags"])==0)
{
    $Error = 'لطفا دسته بندی نوشته را مشخص کنین';
}


if (!isset($_POST["title"]) || empty(trim($_POST["title"])))
{
    $Error = 'لطفا تیتر نوشته را مشخص کنین';
}

if (!isset($_POST["content"]) || empty(trim($_POST["content"])))
{
    $Error = 'لطفا نوشته را وارد کنین';
}


if (isset($Error))
{
    $_SESSION["updatePostError"] = $Error;
    $_SESSION["updatePostErrorColor"] = "red";
    header('location: '.base_url(true).$base_path.'pages/panel/updatePosts.php');
    exit();
}
unset($_SESSION['selectedMediaId']);
//unset($_SESSION['id']);
unset($_SESSION['tags']);
//unset($_SESSION['tags2']);
unset($_SESSION['title']);
unset($_SESSION['content']);

//echo ($_POST["selectedMediaId"]) ;
//echo "<br>";
//var_dump($_POST);
//echo "<br>";
//
//var_dump($Error);
//echo "<br>";
//var_dump($_POST["content"]);
//echo "<br>";
//var_dump($_POST["title"]);
//echo "<br>";
//
//var_dump($_POST["tags"]);
//exit();

require_once getenv("BASE_DIR")."server/helper/constants.php";
require_once "../../models/User.php";
$userId = User::getInstance()->where("token",$_SESSION[getConstConf('sessionKey').'token'])->get("id")[0]['id'];
//var_dump($userId);


$mediaId = trim($_POST["selectedMediaId"]);
//var_dump($mediaId);

$postId = (int)$_SESSION['id'];

require_once "../../models/Post.php";
Post::getInstance()->where("content",trim($_POST["content"]))
    ->where("title",trim($_POST["title"]))
    ->where("media_id",(int)$mediaId)->update($postId);

//var_dump($postId);


//var_dump($_POST["tags"]);
require_once "../../models/PostTag.php";
$postTag = PostTag::getInstance();
foreach ($_SESSION['tags2'] as $tag)
{
    $postTag->where("id",$postId)->where("tag_id",(int)$tag)->delete2();
}

foreach ($_POST["tags"] as $tag)
{
    $postTag->where("id",$postId)->where("tag_id",(int)$tag)->addRecord();
}

$_SESSION["updatePostError"] = "نوشته بروزرسانی شد";
$_SESSION["updatePostErrorColor"] = "black";
header('location: '.base_url(true).$base_path.'pages/panel/managePosts.php');

// Display status message
//echo $Error;
?>
