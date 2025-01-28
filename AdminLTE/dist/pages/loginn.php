<?php
        session_start();
        include('db.php');
if(isset($_POST['login'])){
               
    $email=$_POST['email'];
    $pass=$_POST['pass'];

    $query=mysqli_query($conn,"select * from `user` where email='$email' && pass='$pass'");

    if (mysqli_num_rows($query) == 0){
            $_SESSION['message']="Login Failed. User not Found!";
            header('location:login.php');
    }
    else{
               
            $row=mysqli_fetch_array($query);
            if (isset($_POST['remember'])){
                    
                    setcookie("user", $row['email'], time() + (86400 * 30));
                    setcookie("pass", $row['pass'], time() + (86400 * 30));
            }
            $_SESSION['login_in']=true;     
            $_SESSION['userid']=$row['id'];
            $_SESSION['first']=$row['first_name'];
            $_SESSION['last']=$row['last_name'];
            header('location:index.php');
    }
}
else{
        $_SESSION['login_in']=false;
    header('location:login.php');
    $_SESSION['message']="Please Login!";
}