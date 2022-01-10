<?php session_start();?>
<?php
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
                <h5>مدیریت مطالب</h5>
                <table >
                    <form method='POST' action='../../server/controller/post/managePost.php'>
                    <tr>
<!--                        ToDo: reverse order with css not html-->
                        <th>عملیات</th>
                        <th>تاریخ بروزرسانی</th>
                        <th>تاریخ ثبت</th>
                        <th>خلاصه نوشته</th>
                        <th>عنوان</th>
                        <th>ردیف</th>
                    </tr>
                    <?php
                    $row = Post::getInstance()->where('is_deleted',0)->get();
//                    var_dump($row);
                    $count=1;
                    foreach ($row as $tag)
                    {
//                            var_dump($tag);
                        $id = "row-".$count;
                        echo "
                            <tr>
                                <td>
                                    <div>
                                        <button name='update' value='{$tag["id"]}' type='submit'>
                                            بروزرسانی 
                                        </button> 
                                        <button name='delete' value='{$tag["id"]}' type='submit'>
                                            حذف 
                                        </button> 
                                    </div>
                                </td>
                                <td>{$tag["edit_time"]}</td>
                                <td>{$tag["create_time"]}</td>
                                <td >
                                            <div id='{$id}' style=' text-overflow: ellipsis;
                                            white-space: nowrap;
                                            max-width: 200px;
                                            overflow: hidden;'>
                                            {$tag["content"]}
                                            </div>
                                            
                                </td>
                                <td>{$tag["title"]}</td>
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
            <ul class="active-sub">
                <li ><a href="addPosts.php">افزودن نوشته</a></li>
                <li class="active-sub"><a>مدیریت نوشته</a></li>
                <li><a href="recyclePosts.html">زباله دان</a></li>
            </ul>
            <div><a href="manageTags.php">مدریت دسته ها</a></div>
            <div><a>مدیریت نظرات</a>
<!--                <p><</p>-->
            </div>
            <ul>
                <li>
                    <a href="viewComments.html">مشاهده نظرات</a>
                </li>
            </ul>
            <div><a href="settings.html">تنظیمات</a></div>
        </section>

    </body>
    <script src="../../js/panel/rightPanel.js"></script>

<script>

    let index = 1;
    while (true)
    {
        let divContent = document.getElementById("row-"+index);
        if (!divContent)
            break
        divContent.innerHTML = divContent.textContent;

        index++;
    }

</script>
</html>