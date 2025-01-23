<?php
require_once'ofunction.php';
$insertdata=new CRUD();
if(isset($_POST['oadd']))
{
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$pass =$_POST['pass'];
$address =$_POST['address'];
$phone = $_POST['phone'];
$gender = $_POST['gender']; 
$hobby = implode(", ", $_POST['hobby']);
$country = $_POST['country'];

$target_file = basename($_FILES["file"]["name"]);
$upload_path = "images/" . $target_file;

if (move_uploaded_file($_FILES["file"]["tmp_name"], $upload_path)) {
    $sql=$insertdata->insert($first_name,$last_name,$email,$pass,$target_file,$address,$phone,$gender,$hobby,$country);
    if($sql)
    {
    echo "<script>alert('Record inserted successfully');</script>";
    echo "<script>window.location.href='oform.php'</script>";
    }
    else
    {
    echo "<script>alert('Something went wrong. Please try again');</script>";
    echo "<script>window.location.href='index.php'</script>";
    }
    }            
} 


?>