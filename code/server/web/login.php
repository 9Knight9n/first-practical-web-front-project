<?php
session_start();
require '../helper/dbconnect.php';
require '../helper/utils.php';

global $conn;

// Define variables and initialize with empty values
$email = $password = "";
$error = '';

$_SESSION['error']=null;

//header('location: http://localhost/first-practical-web-front-project/pages/signup.html');

// Validate username
if(empty(trim($_POST["email"]))){
    $error = "Please enter an email.";
    $_SESSION['error']=$error;
//    mysqli_close($conn);
//    session_abort();
//    echo $_SESSION['error'];
    header('location: '.base_url(true).$base_path.'pages/login.php');
}


else{
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $hash_password = md5($password);

    $sql = "SELECT token FROM users where email='".$email."'&& password='".$hash_password."';";

    $result = mysqli_query($conn, $sql);


//    var_dump($result);
//    echo $sql;
    if (!$result)
    {
        echo("Error description: " . mysqli_error(conn));
    }


    if (mysqli_num_rows($result) == 0) {
        $error = "username or password is wrong";
        $_SESSION['error']=$error;
        mysqli_close($conn);
        header('location: '.base_url(true).$base_path.'pages/login.php');
    }
    else
    {
        $_SESSION['token']=$result;
        mysqli_close($conn);
//        echo $base_path;
//        echo base_url(true);
        header('location: '.base_url(true).$base_path.'index.php');
    }
}




?>
