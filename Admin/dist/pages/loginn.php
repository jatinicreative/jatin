<?php
 include('db.php');
 session_start();
if(isset($_POST['login'])){
               
    $username=$_POST['username'];
    $pass=$_POST['pass'];

    $query=mysqli_query($conn,"select * from `register` where username='$username' && pass='$pass'");

    if (mysqli_num_rows($query) == 0){
            $_SESSION['message']="Login Failed. User not Found!";
            header('location:login.php');
    }
    else{
        
            $row=mysqli_fetch_array($query);
            if (isset($_POST['remember'])){
                    //set up cookie
                    setcookie("user", $row['username'], time() + (86400 * 30));
                    setcookie("pass", $row['pass'], time() + (86400 * 30));
            }
           
            $_SESSION['userid']=$row['id'];
            $_SESSION['first']=$row['first_name'];
            $_SESSION['last']=$row['last_name'];
            header('location:index.php');
    }
}
else{
    header('location:login.php');
    $_SESSION['message']="Please Login!";
}
?>