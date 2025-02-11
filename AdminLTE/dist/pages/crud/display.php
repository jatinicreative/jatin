<?php 

  include ("../header.php");
  include ("../sidebar.php"); 
  include '../db.php'; 
  $result = $conn->query("SELECT * FROM user ORDER BY updated_at DESC");  
?>
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
              <?php    while ($row = $result->fetch_assoc())  {    ?>
                <tr>
                  <td><?= $row['first_name'] ?></td>
                  <td><?= $row['last_name'] ?></td>
                  <td><?= $row['email'] ?></td>
                  <td><img src="images/<?= htmlspecialchars($row['file']) ?>" width="100" height="100" alt="Profile Image"></td>
                  <td><?= $row['address'] ?></td>
                  <td><?= $row['phone'] ?></td>
                  <td><?= $row['gender'] ?></td>
                  <td><?= $row['hobby'] ?></td>
                  <td><?= $row['country'] ?></td>
                  <td>
                  <a href="updateform.php?id=<?= $row['id'] ?>" title="Edit">
                    <i class="fas fa-edit" style="color:ligthblue; font-size: 20px;"></i>
                  </a>
                  
                  <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are You Sure?')" title="Delete">
                    <i class="fas fa-trash" style="color:red; font-size: 20px;"></i>
                  </a>
                  </td>    
                </tr>
                <?php } ?>  
                </tbody>
            </table>
          </div>      
    </div>
    <?php include ("../footer.php"); ?>  
