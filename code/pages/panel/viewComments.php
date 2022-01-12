<?php session_start();?>
<?php
require_once "../../server/models/Comment.php";
require_once "../../server/models/Post.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Panel</title>
        <link rel="stylesheet" href="../../css/reset.css">
<!--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
        <link rel="stylesheet" href="../../css/panel/panel.css">
        <link rel="stylesheet" href="../../css/panel/managePosts.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body id="panel">

    <section id="panel-content">
        <article class="table">
            <!--                ToDo : fix h1 not working-->
            <h5>مشاهده نظرات</h5>
            <table>
                <form method='POST' action='../../server/controller/comment/manageComment.php'>
                <tr>
                    <!--                        ToDo: reverse order with css not html-->
                    <th>عملیات</th>
                    <th>وضعییت</th>
                    <th>تاریخ ثبت</th>
                    <th>متن نظر</th>
                    <th>عنوان نوشته</th>
                    <th>ردیف</th>
                </tr>
                <?php
                $row = Comment::getInstance()->get();
                $count=1;
                foreach ($row as $tag)
                {
                    $post = Post::getInstance()->find((int)$tag["post_id"]);
                    $status = $tag["accepted"]? "تایید شده" : "در انتظار تایید";
                    echo "
                            <tr>
                                <td>
                                    <div>";
                    if ($tag["accepted"] == 0)
                        echo "<button name='accept' value='{$tag["id"]}' type='submit'>
                                            تایید 
                                        </button> ";
                    else
                        echo "<button name='reject' value='{$tag["id"]}' type='submit'>
                                            رد
                                        </button> ";
                    echo "              <button name='delete' value='{$tag["id"]}' type='submit'>
                                            حذف 
                                        </button> 
                                    </div>
                                </td>
                                <td>{$status}</td>
                                <td>{$tag["create_time"]}</td>
                                <td >
                                    {$tag["content"]} 
                                </td>
                                <td >
                                    {$post["title"]}    
                                </td>
                                <td>{$count}</td>
                            </tr>
                            ";
                    $count++;
                }
                ?>
                </form>
            </table>
        </article>
    </section>

        <section class="right-sidebar">
            <img src="../../assets/images/Jevelin_logo_dark.png" alt="Company Name">
            <div ><a href="dashboard.php">داشبورد</a></div>
            <div ><a >مدیریت مطالب</a>
<!--                <p><</p>-->
            </div>
            <ul >
                <li ><a href="addPosts.php">افزودن نوشته</a></li>
                <li><a href="managePosts.php">مدیریت نوشته</a></li>
                <li ><a href="recyclePosts.php">زباله دان</a></li>
            </ul>
            <div><a href="manageTags.php">مدریت دسته ها</a></div>
            <div><a href="manageMedia.php">مدیریت محتوا</a></div>
            <div><a>مدیریت نظرات</a>
<!--                <p><</p>-->
            </div>
            <ul class="active-sub">
                <li class="active-sub">
                    <a>مشاهده نظرات</a>
                </li>
            </ul>
            <div><a href="settings.html">تنظیمات</a></div>
        </section>

    </body>
    <script src="../../js/panel/rightPanel.js"></script>
</html>