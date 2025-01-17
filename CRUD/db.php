<?php

$server = "localhost";
$user = "root";
$pass = "admin123";
$db = "user";

$conn = mysqli_connect($server,$user,$pass,$db);

if(mysqli_connect_error())
{
    die("Connection Failed". mysqli_connect_errno());
}
