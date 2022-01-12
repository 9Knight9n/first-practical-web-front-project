<div class="comment-list">
    <h3> بخش نظرات</h3>
    <?php
    require_once "../../server/models/Comment.php";
    $comments = Comment::getInstance()->getPostComment($_GET['postId']);
//    var_dump($comments);
    echo "<article style='display: none'>";
    for ($index = 0 ; $index < count($comments);$index++)
    {
        if (!isset($comments[$index]['parent_id']))
            echo "</article>";
        echo    "<article>
                <p >{$comments[$index]['content']}</p>
                <div>
                    <button>نظر دادن</button>
                    <small>{$comments[$index]['create_time']}</small>                 
                </div>";
        if (isset($comments[$index]['parent_id']))
            echo "</article>";
    }

    ?>

</div>


<?php
