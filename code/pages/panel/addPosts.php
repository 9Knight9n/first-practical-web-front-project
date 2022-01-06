<?php
session_start();
require_once "../../server/models/Tag.php";

require_once "../../server/controller/user/authUser.php";
require_once "../../server/models/Media.php";

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Panel</title>
        <link rel="stylesheet" href="../../css/reset.css">
        <link rel="stylesheet" href="../../css/panel/panel.css">
        <link rel="stylesheet" href="../../css/panel/addPosts.css">
        <link rel="stylesheet" href="../../css/common/modal/modal.css">
        <script src="../../js/tinymce.min.js"></script>
        <script>tinymce.init({selector:'textarea'});</script>
    </head>
    <body id="panel">

        <section id="panel-content">
            <form method="POST" action="../../server/controller/post/addPost.php" enctype="multipart/form-data">
                <article class="left">
                    <button >ذخیره</button>

                    <div style="max-height: 80%;overflow-y: auto;margin-bottom: 2rem">
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


                    <div class="modal">
                        <a style="width: fit-content;height: 100%" href="#open-modal">انتخاب پوستر</a>
                        <div id="open-modal" class="modal-window">
                            <div style="height: 80%;width: 80%;border: blue solid 1px">
                                <a href="#" title="Close" class="modal-close">Close</a>
                                <div style=" margin: 1rem 0;align-items: center;display: flex;flex-direction: row-reverse;flex-wrap: wrap;height: 100%;width: 100%;overflow-y: auto">
                                    <?php
                                    $media = Media::getInstance()->get();
                                    //                    var_dump($media);
                                    require_once "../../server/helper/utils.php";


                                    if(count($media) > 0){
                                        foreach ($media as $medium){
                                            echo "<div style='width: 50%;padding: 2rem;position:relative;'>";
                                            echo show_image($medium["file_name"]);
                                            echo "<button type='submit' name='mediaId' value='{$medium["id"]}' 
                                                        style='margin-top: 1rem;position: absolute;height: 100%;width: 100%;background-color: transparent'></button>";
                                            echo "</div>";
                                        }
                                    }else {
                                        echo "<p>No image(s) found...</p>";
                                    }
                                    ?>
                                </div>

                            </div>
                        </div>
                        <?php
                        if (isset($_SESSION["selectedFile"]))
                        {
                            foreach ($media as $medium){
//                            $imageURL = $targetDir . $medium["file_name"];
                                if ($medium["id"]==$_SESSION["selectedFile"])
                                {
                                    echo "<div style='width: 100%;padding: 0 2rem;'>";
                                    echo show_image($medium["file_name"]);
                                    echo "</div>";
                                    echo "<input style='display: none' name='selectedMediaId' value='{$medium["id"]}'>";
                                }
                            }
                            unset($_SESSION["selectedFile"]);
                        }
                        ?>

                    </div>



                </article>
                <article class="right">
                    <label style="display: flex;flex-direction: column;text-align: right;margin-bottom: 3rem">تیتر را وارد کنید
                        <input style="margin-top: 1rem;text-align: right" name="title" type="text"
                               value='<?php if(isset($_POST['title'])) {
                                   echo $_POST['title'];
                               } ?>'>
                    </label>

                    <label style="text-align: right;height: 100%;">
                        <p style="margin-bottom: 1rem;">
                            متن نوشته جدید را وارد کنید
                        </p>
                        <textarea style="text-align: right;" name="content" placeholder="متن خود را در اینجا بنویسید"></textarea>
                    </label>
                </article>
            </form>
        </section>

        <section class="right-sidebar">
            <img src="../../assets/images/Jevelin_logo_dark.png" alt="Company Name">
            <div ><a href="dashboard.php">داشبورد</a></div>
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