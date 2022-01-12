<?php
require_once "../../models/Comment.php";
//var_dump($_POST);
if ($_POST['commentId']!== '-1'){
    Comment::getInstance()->where("parent_id",(int)$_POST['commentId']);
}
$result = Comment::getInstance()->where("post_id",(int)$_POST['postId'])->where("content",$_POST['content'])->addRecord();
//var_dump($result);
$result = $result?"1":"0";

require_once '../../helper/utils.php';

header('location: '.base_url(true).$base_path.
    "pages/blog/post.php?postId={$_POST['postId']}&commentId={$_POST['commentId']}&commented={$result}");

