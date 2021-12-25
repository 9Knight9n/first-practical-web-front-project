<?php
    session_start();
    require_once '../../helper/dbconnect.php';
    require_once '../../helper/utils.php';


    if (empty(trim($_POST['tag'])))
    {
        $_SESSION['addTagError'] = "لطفا نام دسته را وارد کنید";
        $_SESSION['addTagErrorColor'] = "red";
    }
    else
    {
        $sql = "SELECT * from tags where name='{$_POST['tag']}';";
//        echo $sql,"\n";
        $result = mysqli_query($conn, $sql);
//        var_dump($result);
        if (mysqli_num_rows($result)>0)
        {
            $_SESSION['addTagError'] = "دسته ای به این نام وجود دارد";
            $_SESSION['addTagErrorColor'] = "red";
        }
        else
        {




            $sql = "INSERT INTO tags (name)
                VALUES ('".$_POST['tag']."'); ";
            $result = mysqli_query($conn, $sql);
            $last_id = mysqli_insert_id($conn);
            if (!$result)
            {
                $_SESSION['addTagError'] = "در اضافه کردن دسته مشکلی وجود داشت";
                $_SESSION['addTagErrorColor'] = "red";
            }
            else
            {
//                echo "\n";
//                echo "\n";
                if ($_POST['tagParent'] != 0)
                {
                    $sql = "INSERT INTO tag_parent
                        VALUES ('".$last_id."','".$_POST['tagParent']."'); ";
//                    echo $sql;
                    $result = mysqli_query($conn, $sql);
                    if (!$result)
                    {
                        $_SESSION['addTagError'] = "در اضافه کردن دسته مشکلی وجود داشت";
                        $_SESSION['addTagErrorColor'] = "red";
                    }
                    else
                    {

                        $_SESSION['addTagError'] = "دسته اضافه شد";
                        $_SESSION['addTagErrorColor'] = "black";
                    }
                }
                else
                {
                    $_SESSION['addTagError'] = "دسته اضافه شد";
                    $_SESSION['addTagErrorColor'] = "black";
                }
            }
        }
    }
    header('location: '.base_url(true).$base_path.'pages/panel/manageTags.php');











     mysqli_close($conn);

?>