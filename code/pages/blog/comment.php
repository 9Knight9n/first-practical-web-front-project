<?php
if (isset($_GET['commented']))
{
    if ($_GET['commented']==1)
        $result = "نظر شما ثبت شد، منتظر تایید باشید";
    else
        $result = "مشکلی در ثبت نظر شما به وجود آمد دوباره تلاش کنید";
    echo "<p >
            {$result}
        </p>";
}
else
{
    echo "<form class='add-comment' method='POST' action='../../server/controller/comment/addComment.php'>";
        echo "<input type='hidden' name='postId' value='{$_GET['postId']}'>";
        echo "<input type='hidden' name='commentId' value='{$_GET['commentId']}'>";
        echo "<label style='text-align: right;height: 100%;'>
            <p style='margin-bottom: 0;'>
                نظر خود را وارد کنید
            </p>
            <textarea name='content' style='text-align: right;' placeholder=
            'متن خود را در اینجا بنویسید'
            ></textarea>
        </label>
        <button type='submit'>
            ثبت 
        </button>
    </form>";
}
?>