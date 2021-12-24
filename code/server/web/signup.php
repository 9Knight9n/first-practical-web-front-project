<pre>
<?php
require '../helper/dbconnect.php';


global $conn;

// Define variables and initialize with empty values
    $email = $password = $confirm_password = "";
    $error = '';

     session_start();

//header('location: http://localhost/first-practical-web-front-project/pages/signup.html');

    // Validate username
    if(empty(trim($_POST["email"]))){
        $error = "Please enter an email.";
    }


    else{
        $email = trim($_POST["email"]);

        $sql = "SELECT * FROM users where email='".$email."';";

        $result = mysqli_query($conn, $sql);


        var_dump($result);

        if (!$result)
        {
            echo("Error description: " . mysqli_error(conn));
        }


        if (mysqli_num_rows($result) > 0) {
                $error = "This username is already taken.";
        }
    }

//     Validate password
    if(empty(trim($_POST["password"]))){
        $error = "Please enter a password.";
    } elseif(strlen(trim($_POST["password"])) < 6){
        $error = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $error = "Please confirm password.";
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $error = "Password did not match.";
        }
    }

    if(empty($error)){

        $token = bin2hex(openssl_random_pseudo_bytes(16));
        $hash_password = md5($password);

        echo "querying to database";
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password, token) VALUES ('".$email."','".$hash_password."','".$token."');";


        $result = mysqli_query($conn, $sql);


        if ($result) {
            $_SESSION['token']=$token;
            mysqli_close($conn);
            header('location: http://localhost/first-practical-web-front-project/index.php');
        } else {
            echo "Some Error happened";
        }
    }
    else
    {
        $_SESSION['error']=$error;
        mysqli_close($conn);
        header('location: http://localhost/first-practical-web-front-project/pages/signup.php');
    }



?>
</pre>
