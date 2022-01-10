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
    <link rel="stylesheet" href="../../css/blog/postList.css">
</head>
<body>
    <form action="post.php" method="GET" class="post-list">

        <?php
        require_once "../../server/helper/utils.php";
        $posts = Post::getInstance()->where('is_deleted',0)->get();
        $media = Media::getInstance();
        foreach ($posts as $post)
        {
            $image = show_image($media->find((int)$post['media_id'])['file_name']);
            echo "
            <section class='post'>
                <article class='post-text'>
                    <h2 class='post-title'>{$post['title']}</h2>
                    <article class='post-content'>
                        {$post['content']}
                    </article>
                    <div class='post-show-more-container'></div>
                    <button name='postId' type='submit' value='{$post['id']}' class='post-show-more'>
                        نمایش بیشتر
                    </button>
                </article>
                <article class='post-image'>
                    {$image}
                </article>
            </section>
            ";

        }


        ?>



    </form>
</body>
</html>