<?php
    require_once "config.php";

    if(isset($_POST["loginButton"]) && $_POST["loginButton"] == "Login")
    {
        if(empty($_POST["username"]) || empty($_POST["password"])) 
        {
            echo "Username und Passwort müssen ausgefüllt sein.";
        }
        else
        {
            if(strlen($_POST["username"]) > 32 || strlen($_POST["password"]) > 32) {
                die();
            }

            $user_request = $mysqli -> prepare("SELECT * FROM `userdata` WHERE `username` = ? AND `password` = MD5(?) LIMIT 1");
            $user_request -> bind_param('ss', $_POST["username"], $_POST["password"]);
            $user_request -> execute();

            $result = $user_request -> get_result();
            $result = $result -> fetch_assoc();

            if($result)
            {
                die("Login erfolgreich!");
            }
            else
            {
                echo "Login fehlgeschlagen!";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="/StyleSheet.css" />
    </head>
    <body>
        <p id="title" >
            Login
        </p>
        <form action="/login.php" method="post">
            <input type="text" id="username" placeholder="username" name="username" width="50" maxlength="32" />
            <br />
            <input type="password" id="password" placeholder="password" name="password" width="50" maxlength="32" />
            <input type="submit" value="Login" name="loginButton" />
        </form>
    </body>
</html>
