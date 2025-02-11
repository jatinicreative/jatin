<?php

    $server = "localhost";
    $user = "root";
    $password = "admin123";
    $db = "ajax";

    $co = mysqli_connect($server,$user,$password,$db);

    if(mysqli_connect_error())
    {
        die("Connection Failed". mysqli_connect_errno());
    }

    