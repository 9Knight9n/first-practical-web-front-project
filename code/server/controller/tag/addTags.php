<?php
    session_start();

    require_once "../../models/Tag.php";
    require_once "../../models/TagParent.php";

    require_once '../../helper/utils.php';


    if (empty(trim($_POST['tag'])))
    {
//        echo "isi";
        $_SESSION['addTagError'] = "لطفا نام دسته را وارد کنید";
        $_SESSION['addTagErrorColor'] = "red";
    }
    else
    {
        $result = Tag::getInstance()->where('name',$_POST['tag'],true)->get();
        if (count($result)>0)
        {
            $_SESSION['addTagError'] = "دسته ای به این نام وجود دارد";
            $_SESSION['addTagErrorColor'] = "red";
        }
        else
        {
            $result = Tag::getInstance()->where('name',$_POST['tag'])->addRecord();
            if (!$result)
            {
                $_SESSION['addTagError'] = "در اضافه کردن دسته مشکلی وجود داشت";
                $_SESSION['addTagErrorColor'] = "red";
            }
            else
            {
                if ($_POST['tagParent'] != 0)
                {
                    $last_id = Tag::getInstance()->where('name',$_POST['tag'])->get('id')[0]['id'];
                    $result = TagParent::getInstance()->where('id',$last_id)->where('parent_id',$_POST['tagParent'])->addRecord();
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

?>