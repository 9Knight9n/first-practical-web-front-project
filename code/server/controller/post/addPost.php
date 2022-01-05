<?php



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

//var_dump($_POST["content"]);
//echo "<br>";
//var_dump($_POST["title"]);
//echo "<br>";
//
//var_dump($_POST["tags"]);

require_once getenv("BASE_DIR")."server/helper/constants.php";
require_once "../../models/User.php";
$userId = User::getInstance()->where("token",$_SESSION[getConstConf('sessionKey').'token'])->get("id")[0]['id'];
//var_dump($userId);


require_once "../../models/User.php";
$mediaId = Media::getInstance()->where("file_name",$fileName)->get("id")[0]["id"];
//var_dump($mediaId);


require_once "../../models/Post.php";
Post::getInstance()->where("content",trim($_POST["content"]))
    ->where("user_id",(int)$userId)
    ->where("title",trim($_POST["title"]))
    ->where("media_id",(int)$mediaId)->addRecord();


$postId = Post::getInstance()->getLastId();
//var_dump($postId);


//var_dump($_POST["tags"]);
require_once "../../models/PostTag.php";
$postTag = PostTag::getInstance();
foreach ($_POST["tags"] as $tag)
{
    $postTag->where("id",(int)$postId)->where("tag_id",(int)$tag)->addRecord();
}

// Display status message
//echo $Error;
?>
