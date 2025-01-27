<html>
    <head>
        <title>User Details</title>
    </head>
<body>
<?php 
    include 'db.php'; 
    include 'nav.html'; 
    
    echo "<h3>User Details...</h3>";

    $result = $conn->query("SELECT * FROM user"); 
?>

<table border="1">
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

<?php    while ($row = $result->fetch_assoc())  {    ?>
    
    <tr>
        <td><?= $row['first_name'] ?></td>
        <td><?= $row['last_name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><img src="./image/<?= htmlspecialchars($row['file']) ?>" width="100" height="100" alt="Profile Image"></td>
        <td><?= $row['address'] ?></td>
        <td><?= $row['phone'] ?></td>
        <td><?= $row['gender'] ?></td>
        <td><?= $row['hobby'] ?></td>
        <td><?= $row['country'] ?></td>
        <td>
            <a href="updateform.php?id= <?= $row['id'] ?>">EDIT</a>
            <a href="delete.php?id= <?= $row['id'] ?>" onclick=" return confirm('Are You Sure?')">DELETE</a>
        </td>    
    </tr>
<?php } ?>   
</table>
</body>
</html>