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
            <form method="POST" action="../../server/controller/post/updatePost.php" enctype="multipart/form-data">
                <article class="left">
                    <button >بروزرسانی</button>
                    <?php
                    if (isset($_SESSION["addPostError"]))
                    {
                        echo "<p style='color: {$_SESSION["updatePostErrorColor"]}'>{$_SESSION["updatePostError"]}</p>";
                        unset($_SESSION["addPostError"]);
                    }
                    ?>
                    <div style="max-height: 37%;overflow-y: auto;margin-bottom: 2rem">
                        <label>
                            دسته بندی را انتخاب کنید
                        </label>
                        <?php

                            $row = Tag::getInstance()->getWithIndent();
                            foreach ($row as $tag)
                            {
//                                var_dump(array_values($_SESSION['tags']));
//                                var_dump($tag["id"]);
                                $checked = false;
                                if (isset($_SESSION['tags']))
                                {
                                    $checked = in_array($tag["id"],array_values($_SESSION['tags']));
                                    $checked = $checked?"checked":"";
//                                    var_dump($checked);
                                }
                                echo "<label style='display: flex;flex-direction: row-reverse;text-align:end;padding-right: {$tag['indent']}rem'>
                                        <input name='tags[]' value='{$tag["id"]}' type='checkbox' {$checked}>
                                        {$tag["name"]}                                    
                                    </label>";
                            }
                        ?>
                    </div>


                    <div class="modal" style="padding: 0">
                        <a style="width: fit-content;height: 100%" href="#open-modal">انتخاب پوستر</a>
                        <div id="open-modal" class="modal-window">
                            <div style="height: 80%;width: 80%;border: blue solid 1px">
                                <a href="#" id="selectMediaModalCloseButton" title="Close" class="modal-close">Close</a>
                                <div style=" margin: 1rem 0;align-items: center;display: flex;flex-direction: row-reverse;flex-wrap: wrap;height: 100%;width: 100%;overflow-y: auto">
                                    <?php
                                    $media = Media::getInstance()->get();
                                    require_once "../../server/helper/utils.php";


                                    if(count($media) > 0){
                                        foreach ($media as $medium){
                                            echo "<div style='width: 50%;padding: 2rem;position:relative;'>";
                                            echo show_image($medium["file_name"]);
                                            $address=base_url(true)."server/static/image/".$medium["file_name"];
                                            $id = "addPostMediaId-".$medium["id"];
                                            echo "<button onclick='onMediaSelect(this)' type='button' 
                                                        id='{$id}'
                                                        name='{$address}' value='{$medium["id"]}' 
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

                        <img id='addPostMediaPreview'  style='height: 80px;display: none' src='' />
                        <input id="addPostMediaPreviewValue"
                               value="<?php echo isset($_SESSION['selectedMediaId']) ? $_SESSION['selectedMediaId'] : '' ?>"
                               name="selectedMediaId" style="display: none">

                    </div>



                </article>
                <article class="right">
                    <label style="display: flex;flex-direction: column;text-align: right;margin-bottom: 3rem">تیتر را وارد کنید
                        <input style="margin-top: 1rem;text-align: right" name="title" type="text"
                               value='<?php echo isset($_SESSION['title']) ? $_SESSION['title'] : '' ?>'>
                    </label>

                    <label style="text-align: right;height: 100%;">
                        <p style="margin-bottom: 1rem;">
                            متن نوشته جدید را وارد کنید
                        </p>
                        <textarea style="text-align: right;" name="content" placeholder="متن خود را در اینجا بنویسید">
                            <?php
                                echo isset($_SESSION['content']) ? $_SESSION['content'] : ''
                            ?>
                        </textarea>
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
                <li><a href="addPosts.php">افزودن نوشته</a></li>
                <li><a href="managePosts.php">مدیریت نوشته</a></li>
                <li class="active-sub"><a>بروزرسانی نوشته</a></li>
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
    <script src="../../js/panel/selectMedia.js"></script>
</html>