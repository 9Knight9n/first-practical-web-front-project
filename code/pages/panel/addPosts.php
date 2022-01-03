<?php
session_start();
require_once "../../server/models/Tag.php";

require_once "../../server/controller/user/authUser.php"

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Panel</title>
        <link rel="stylesheet" href="../../css/reset.css">
        <link rel="stylesheet" href="../../css/panel/panel.css">
        <link rel="stylesheet" href="../../css/panel/addPosts.css">
        <script src="../../js/tinymce.min.js"></script>
        <script>tinymce.init({selector:'textarea'});</script>
    </head>
    <body id="panel">

        <section id="panel-content">
            <form method="POST" action="../../server/controller/post/addPost.php" enctype="multipart/form-data">
                <article class="left">
                    <button >ذخیره</button>

                    <div style="height: 80%;overflow-y: auto;">
                        <label>
                            دسته بندی را انتخاب کنید
                        </label>
                        <?php
                            $row = Tag::getInstance()->getWithIndent();
                            foreach ($row as $tag)
                            {
                                echo "<label style='display: flex;flex-direction: row-reverse;text-align:end;padding-right: {$tag['indent']}rem'>
                                        <input name='tags[]' value='{$tag["id"]}' type='checkbox'>
                                        {$tag["name"]}                                    
                                    </label>";
                            }
                        ?>
                    </div>


                    <label style="cursor: pointer;margin: 2rem;text-align: center;">
                        برای انتخاب پوستر کلیک کنید
                        <input style="margin-top: 1rem" type="file" name="poster" id="add-post-image" accept="image/png,image/jpg,image/jpeg">
                    </label>

                </article>
                <article class="right">
                    <label style="display: flex;flex-direction: column;text-align: right;margin-bottom: 3rem">تیتر را وارد کنید
                        <input style="margin-top: 1rem" name="title" type="text">
                    </label>

                    <label style="text-align: right;height: 100%;">
                        <p style="margin-bottom: 1rem">
                            متن نوشته جدید را وارد کنید
                        </p>
                        <textarea name="content" placeholder="متن خود را در اینجا بنویسید"></textarea>
                    </label>
                </article>
            </form>
        </section>

        <section class="right-sidebar">
            <img src="../../assets/images/Jevelin_logo_dark.png" alt="Company Name">
            <div ><a href="dashboard.html">داشبورد</a></div>
            <div ><a >مدیریت مطالب</a>
<!--                <p><</p>-->
            </div>
            <ul class="active-sub">
                <li class="active-sub"><a>افزودن نوشته</a></li>
                <li><a href="managePosts.html">مدیریت نوشته</a></li>
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
</html>