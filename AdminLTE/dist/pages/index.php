<html>
  <body>
  <?php 
    include ("header.php"); 
    include ("sidebar.php");
    session_start();  
    echo "Welcome ";
    if(isset($_SESSION['first']) && $_SESSION['last'])
    {
      echo $_SESSION['first'];
      echo ' ';
      echo $_SESSION['last'];
      echo '.......';
      echo $_SESSION['login_in'];
      echo '.......';
      echo $_SESSION['userid'];
    }  
    include ("footer.php"); 
  ?>
  </body>
</html>
 
