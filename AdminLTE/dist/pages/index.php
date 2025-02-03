<html>
  <body>
  <?php 
    session_start();  
    
    if (isset($_SESSION['login_in']) ) {
          
    }
    else {
      header('Location: login.php');
      exit();

    }
    include ("header.php"); 
    include ("sidebar.php");
    echo "Welcome ";
    if(isset($_SESSION['first']) && $_SESSION['last'] && $_SESSION['login_in'] && $_SESSION['userid'])
    {
      echo $_SESSION['first'];
      echo ' ';
      echo $_SESSION['last'];
      echo '.......';

    }  
    include ("footer.php"); 
  ?>
  </body>
</html>
 
