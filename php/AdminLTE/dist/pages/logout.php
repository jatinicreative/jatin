<?php
        session_start();

        if (isset($_SESSION["first_name"]) && $_SESSION["last_name"] && $_SESSION["login_in"] && $_SESSION["userid"])
        {
            unset($_SESSION["first_name"]);
            unset($_SESSION["last_name"]);
            unset($_SESSION["login_in"]);
            unset($_SESSION["userid"]);
        }
        session_destroy();
       
        if (isset($_COOKIE["user"]) AND isset($_COOKIE["pass"])){
                setcookie("user", '', time() - (3600));
                setcookie("pass", '', time() - (3600));
        }
 
        header('location: login.php');
 
