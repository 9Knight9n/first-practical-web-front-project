<?php session_start();?>
<?php
require_once "../../server/models/Tag.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Panel</title>
        <link rel="stylesheet" href="../../css/reset.css">
<!--        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
        <link rel="stylesheet" href="../../css/panel/panel.css">
        <link rel="stylesheet" href="../../css/panel/manageTags.css">
        <link rel="stylesheet" href="../../css/panel/managePosts.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body id="panel" style="height: 100vh;">

        <section id="panel-content">
            <article style="padding: 1rem;height: 20%" class="add-tag">
                <p style="text-align: right;margin-bottom: 1rem">افزودن دسته</p>
                <form method="POST" action="../../server/controller/tag/addTags.php" style="display: flex;flex-direction: row-reverse;justify-content: end;align-items: center">
                    <label style="display: flex;flex-direction: row-reverse;text-align: right;margin-left:3rem">
                        <p style="margin-left: 0.5rem">نام دسته را وارد کنید</p>
                        <input name="tag" type="text">
                    </label>
                    <label style="display: flex;flex-direction: row-reverse;text-align: right;margin-left:3rem">
                        <p style="margin-left: 0.5rem">سر دسته را انتخاب کنید</p>
                        <select name="tagParent" >
                            <option style='text-align: end' value="0" selected>بدون سردسته</option>
                            <?php
//                                $row = Tag::getInstance()->get("id,name,create_time");
                                $row = Tag::getInstance()->getWithIndent();
                                foreach ($row as $tag)
                                {
                                    echo "<option style='text-align: end' value='{$tag["id"]}'>{$tag["name"]}";
                                    for ($index=0;$index<$tag['indent'];$index++)
                                        echo " - ";
                                    echo "</option>";
                                }
                            ?>
                        </select>
                    </label>
                    <button type="submit">ایجاد دسته</button>
                    <?php
                        $color = $_SESSION['addTagErrorColor']?:'red';
                        if (key_exists('addTagError',$_SESSION) && $_SESSION['addTagError'] && !empty(trim($_SESSION['addTagError'])))
                            echo "<p style='color: {$color};margin-right: 1rem'>{$_SESSION['addTagError']}</p>";
                        $_SESSION['addTagErrorColor'] = null;
                        $_SESSION['addTagError'] = null;
                    ?>
                </form>
            </article>
            <hr>
            <article class="table" style="margin: 0;padding: 1rem;height: 80%;overflow-y: scroll">
                <!--                ToDo : fix h1 not working-->
                <div style="display: flex;flex-direction: row-reverse">
                    <h5>مدیریت دسته ها</h5>
                    <?php
                        $color = 'red';
                        echo "<p style='color: {$color};margin-right: 3rem'>{$_SESSION['deleteTagError']}</p>";
                        $_SESSION['deleteTagError'] = null;
                    ?>
                </div>

                <table>
                    <form method='POST' action='../../server/controller/tag/deleteTag.php'>
                    <tr>
<!--                    ToDo: reverse order with css not html -->
                        <th>عملیات</th>
                        <th>تاریخ ساخت</th>
                        <th>نام دسته</th>
                        <th>ردیف</th>
                    </tr>
                    <?php
                        $count=1;
                        foreach ($row as $tag)
                        {
//                            var_dump($tag);
                            echo "
                            <tr>
                                <td>
                                    <div>
                                        <button name='action' value='{$tag["id"]}' type='submit'>
                                            حذف 
                                        </button> 
                                            
                                    </div>
                                </td>
                                <td>{$tag["create_time"]}</td>
                                <td>{$tag["name"]}</td>
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
            <div ><a href="dashboard.html">داشبورد</a></div>
            <div ><a >مدیریت مطالب</a>
<!--                <p><</p>-->
            </div>
            <ul>
                <li ><a href="addPosts.html">افزودن نوشته</a></li>
                <li><a href="managePosts.html">مدیریت نوشته</a></li>
                <li ><a href="recyclePosts.html">زباله دان</a></li>
            </ul>
            <div class="active"><a >مدریت دسته ها</a></div>
            <div><a >مدیریت نظرات</a>
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