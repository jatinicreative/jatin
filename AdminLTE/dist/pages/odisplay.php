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
    include ("ofunction.php");
?>
<html>
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  </head>
  <body>
    <div class="container-fluid">
      <div class="card mb-4">
        <div class="card-header"><h3 class="card-title">User Table</h3></div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Email</th>
                  <th>Profile Image</th>
                  <th>Address</th>
                  <th>Phone No</th>
                  <th>Gender</th>
                  <th>Hobby</th>
                  <th>Country</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              <?php   
                    $fetchdata=new CRUD();
                    $sql=$fetchdata->fetchdata();
                    while($row=mysqli_fetch_array($sql))  {
                ?>
                <tr>
                  <td><?= $row['first_name'] ?></td>
                  <td><?= $row['last_name'] ?></td>
                  <td><?= $row['email'] ?></td>
                  <td><img src="image/<?= htmlspecialchars($row['file']) ?>" width="100" height="100" alt="Profile Image"></td>
                  <td><?= $row['address'] ?></td>
                  <td><?= $row['phone'] ?></td>
                  <td><?= $row['gender'] ?></td>
                  <td><?= $row['hobby'] ?></td>
                  <td><?= $row['country'] ?></td>
                  <td>
                  <a href="oupdateform.php?id=<?= $row['id'] ?>" title="Edit">
                    <i class="fas fa-edit" style="color:ligthblue; font-size: 20px;"></i>
                  </a>
                  
                  <a href="odelete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are You Sure?')" title="Delete">
                    <i class="fas fa-trash" style="color:red; font-size: 20px;"></i>
                  </a>
                  </td>    
                </tr>
                <?php } ?>  
                </tbody>
            </table>
          </div>      
    </div>
    <?php include ("footer.php"); ?>
  </body>
</html>
