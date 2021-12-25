<?php
session_start();
require '../helper/dbconnect.php';
require '../helper/utils.php';


global $conn;

// Define variables and initialize with empty values
    $email = $password = $confirm_password = "";
    $error = '';


    // Validate username
    if(empty(trim($_POST["email"]))){
        $error = "Please enter an email.";
    }


    else{
        $email = trim($_POST["email"]);
        $sql = "SELECT * FROM users where email='".$email."';";
        $result = mysqli_query($conn, $sql);
        if (!$result)
        {
            echo("Error description: " . mysqli_error(conn));
        }
        if (mysqli_num_rows($result) > 0) {
                $error = "This username is already taken.";
        }
    }

//     Validate password
    if(empty($error) && empty(trim($_POST["password"]))){
        $error = "Please enter a password.";
    } elseif(empty($error) && strlen(trim($_POST["password"])) < 6){
        $error = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty($error) && empty(trim($_POST["confirm_password"]))){
        $error = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($error) && ($password != $confirm_password)){
            $error = "Password did not match.";
        }
    }

    if(empty($error)){

        $token = bin2hex(openssl_random_pseudo_bytes(16));
        $hash_password = md5($password);

//        echo "querying to database";
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password, token) VALUES ('".$email."','".$hash_password."','".$token."');";


        $result = mysqli_query($conn, $sql);

//        var_dump($result);

        if ($result) {
            $_SESSION['token']=$token;
            mysqli_close($conn);
            header('location: '.base_url(true).$base_path.'index.php');
        } else {
            echo "Some Error happened";
        }
    }
    else
    {
        $_SESSION['error']=$error;
        mysqli_close($conn);
        header('location: '.base_url(true).$base_path.'pages/signup.php');
    }



?>