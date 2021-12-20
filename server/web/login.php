<pre>
<?php
require '../helper/dbconnect.php';


global $conn;

// Define variables and initialize with empty values
$email = $password = "";
$error = '';

session_start();
$_SESSION['error']=null;

//header('location: http://localhost/first-practical-web-front-project/pages/signup.html');

// Validate username
if(empty(trim($_POST["email"]))){
    $error = "Please enter an email.";
    $_SESSION['error']=$error;
//    mysqli_close($conn);
//    session_abort();
//    echo $_SESSION['error'];
    header('location: http://localhost/first-practical-web-front-project/pages/login.php');
}


else{
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $hash_password = md5($password);

    $sql = "SELECT token FROM users where email='".$email."'&& password='".$hash_password."';";

    $result = mysqli_query($conn, $sql);


    var_dump($result);
    echo $sql;
    if (!$result)
    {
        echo("Error description: " . mysqli_error(conn));
    }


    if (mysqli_num_rows($result) == 0) {
        $error = "username or password is wrong";
        $_SESSION['error']=$error;
//        mysqli_close($conn);
//        session_abort();
        header('location: http://localhost/first-practical-web-front-project/pages/login.php');
    }
    else
    {
        $_SESSION['token']=$result;
//        mysqli_close($conn);
//        session_abort();
        header('location: http://localhost/first-practical-web-front-project/index.html');
    }
}




?>
</pre>
