<?php
require_once "../../models/Post.php";
require_once "../../models/PostTag.php";
require_once '../../helper/utils.php';

session_start();
if (isset($_POST['recycle']))
{
    Post::getInstance()->where('is_deleted',1)->update($_POST['recycle']);
    header('location: '.base_url(true).$base_path.'pages/panel/managePosts.php');
}

if (isset($_POST['delete']))
{
    Post::getInstance()->delete($_POST['delete']);
    header('location: '.base_url(true).$base_path.'pages/panel/recyclePosts.php');
}

if (isset($_POST['restore']))
{
    Post::getInstance()->where('is_deleted',0)->update($_POST['restore']);
    header('location: '.base_url(true).$base_path.'pages/panel/recyclePosts.php');
}

else if (isset($_POST['update']))
{
    $post = Post::getInstance()->find($_POST['update']);
//    var_dump($post);

    $_SESSION['selectedMediaId']=$post['media_id'];
    $_SESSION['id']=$post['id'];
    $_SESSION['title']=$post['title'];
    $_SESSION['content']=$post['content'];
    $tags = PostTag::getInstance()->where("id",$_POST['update'])->get("tag_id");
//    echo "<br>";
//    echo "<br>";
//    echo "<br>";
    $newTags = array();
    foreach ($tags as $tag) {
        array_push($newTags,(int)$tag['tag_id']);
    }
    $newTags = array_values($newTags);
//    var_dump($newTags);
    $_SESSION['tags']=$newTags;
    $_SESSION['tags2']=$newTags;
    header('location: '.base_url(true).$base_path.'pages/panel/updatePosts.php');
}