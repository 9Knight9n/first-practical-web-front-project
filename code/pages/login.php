<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Login</title>

    <!--    ToDo: should load css again?-->
        <link rel="stylesheet" href="../css/reset.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="../css/auth.css">
    </head>
    <body class="auth">
        <section>
            <article style="position: relative">
<!--                ToDo:back button not working -->
                <button style="position: absolute;top: 0;left: 0;margin-left: 1rem" onclick="location.href ='../index.php';"> Back </button>
                <img src="../assets/images/Jevelin_logo_dark.png" alt="Company Logo">
                <small>Lorem ipsum dolor sit amet.</small>
            </article>
            <article>
                <form method="POST" action="../server/web/login.php">
                    <?php
                    session_start();
                    if(isset($_SESSION['error']))
                    {
                        echo '<h6 style="color:white;margin-bottom: 1rem;opacity: 1;top:-50px;background-color: red;border-radius: 5px;padding: 0.3rem 1rem">'.$_SESSION['error'].'</h6> ';
                    }
//                    $_SESSION['error'] = null;
//                    session_abort();
                    ?>
                    <small><label for="login-email">Your email:</label></small>
                    <input type="text" name="email" id="login-email" placeholder="Enter your email">
                    <small><label for="login-pass">Password:</label></small>
                    <input type="password" name="password" id="login-pass" placeholder="Enter your password">
                    <button type="submit">Sign in</button>
                </form>
            </article>
        </section>
    </body>
</html>