<?php

$server="localhost";
$user= "root";
$pass= "admin123";
$db= "js";

$conn = mysqli_connect($server,$user,$pass,$db);

if(mysqli_connect_errno()){
    die("Connection Failed".mysqli_connect_error());
}