<?php session_start();?>
<?php
require_once "../../server/models/Post.php";
require_once "../../server/models/Media.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <link rel="stylesheet" href="../../css/blog/post.css">
    <link rel="stylesheet" href="../../css/blog/comment.css">
    <script src="../../js/tinymce.min.js"></script>
    <script>tinymce.init({selector:'textarea'});</script>
</head>
<body>
<!--    <form action="post.php" method="GET" class="post-list">-->

        <?php
        if (isset($_GET['postId']))
        {
            require_once "../../server/helper/utils.php";
            $post = Post::getInstance()->find((int)$_GET['postId']);
            $media = Media::getInstance();
            $image = show_image($media->find((int)$post['media_id'])['file_name']);
            echo "
            <section class='post'>
                <article class='post-text'>
                    <h2 class='post-title'>{$post['title']}</h2>
                    <article class='post-content'>
                        {$post['content']}
                    </article>
                   
                </article>
                <article class='post-image'>
                    {$image}
                </article>
            </section>
            ";


            require "commentList.php";

//            require "comment.php";


        }
        else echo "Page doesn't exist!"


        ?>



<!--    </form>-->
</body>
</html>