<?php
session_start();
require_once "../../server/models/Media.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Panel</title>
        <link rel="stylesheet" href="../../css/reset.css">
<!--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
        <link rel="stylesheet" href="../../css/panel/panel.css">
        <link rel="stylesheet" href="../../css/panel/addPosts.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body id="panel" style="height: 100vh">

        <section id="panel-content">
            <article class="left" style="height: 100%">
                <form method="POST" enctype="multipart/form-data" action="../../server/controller/media/addMedia.php" style="justify-content:right;width:100%;display: flex;height: 20%;flex-direction: row;align-items: center">
                    <p style="margin-right: 3rem;color: red">
                        <?php
                        if (isset($_SESSION["addMedia"]))
                            echo $_SESSION["addMedia"];
                        unset($_SESSION["addMedia"]);
                        ?>
                    </p>
                    <button type="submit">ذخیره</button>
                    <label style="cursor: pointer;margin: 2rem;text-align: center;padding-bottom: 0.8rem;">
                        <input style="margin-top: 1rem;margin-left: 2rem" type="file" name="poster" id="add-post-image" accept="image/png,image/jpg,image/jpeg">
                        برای انتخاب پوستر کلیک کنید
                    </label>
                </form>
                <form method="POST" action="../../server/controller/media/deleteMedia.php"
                        style="align-items: center;display: flex;flex-direction: row-reverse;flex-wrap: wrap;height: 80%;width: 100%;overflow-y: auto">
                    <?php
                    $media = Media::getInstance()->get();
//                    var_dump($media);
                    require_once "../../server/helper/utils.php";


                    if(count($media) > 0){
                        foreach ($media as $medium){
//                            $imageURL = $targetDir . $medium["file_name"];
                            echo "<div style='width: 50%;padding: 2rem;'>";
                            echo show_image($medium["file_name"]);
                            echo "<button type='submit' name='mediaId' value='{$medium["id"]}' style='margin-top: 1rem'> delete </button>";
                            echo "</div>";
                        }
                    }else {
                        echo "<p>No image(s) found...</p>";
                    }
                    ?>
                </form>
            </article>
        </section>

        <section class="right-sidebar">
            <img src="../../assets/images/Jevelin_logo_dark.png" alt="Company Name">
            <div ><a>داشبورد</a></div>
            <div ><a>مدیریت مطالب</a>
<!--                <p><</p>-->
            </div>
            <ul>
                <li><a href="addPosts.php">افزودن نوشته</a></li>
                <li><a href="managePosts.php">مدیریت نوشته</a></li>
                <li><a href="recyclePosts.html">زباله دان</a></li>
            </ul>
            <div><a href="manageTags.php">مدریت دسته ها</a></div>
            <div class="active" ><a href="manageMedia.php">مدیریت محتوا</a></div>
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