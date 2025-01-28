<?php
include 'ofunction.php';
$updatedata=new CRUD();
if(($_SERVER['REQUEST_METHOD'] === 'POST'))
{

$id=$_POST['id'];
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$email=$_POST['email'];
$address =$_POST['address'];
$phone = $_POST['phone'];
$gender = $_POST['gender']; 
$hobby = implode(", ", $_POST['hobby']);
$country = $_POST['country'];

$filename = $_FILES["file"]["name"];
$tempname = $_FILES['file']['tmp_name'];
$folder = "";

if (!empty($filename)) {
    $folder = "image/". basename($filename);
    if (!move_uploaded_file($tempname, $folder)) {
        echo "<script>alert('Failed to upload file');</script>";
        $folder = ""; 
    }
}

$sql=$updatedata->update($first_name,$last_name,$email,$filename,$address,$phone,$gender,$hobby,$country,$id);
if($sql){
echo "<script>alert('Record Updated successfully');</script>";
echo "<script>window.location.href='odisplay.php'</script>";
}
}
