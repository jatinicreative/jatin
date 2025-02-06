<?php 
    include 'nav.php'; 
    include  'db.php';        
    $sql = "SELECT * from product join variant on product.p_id = variant.p_id";
    $result = mysqli_query($conn, $sql);
?><br>
<html>
    <head>
        <title>Products</title>    
    <style>
        #table{
            height: 60%;
            width: 60%;
            
        }
    </style>
    </head>
    <body>
        <h3>Product details...</h3>
        <table border=1 id="table">
            <tr>
                <th>Product Name</th>
                <th>SKU</th>
                <th>Category</th>
                <th>Size</th>
                <th>Color</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
            <?php while($row = $result->fetch_assoc()) {?>
            <tr>
                <td><?= $row['name']     ?></td>
                <td><?= $row['sku']      ?></td>
                <td><?= $row['category'] ?></td>
                <td><?= $row['size']     ?></td>
                <td><?= $row['color']    ?></td>
                <td><?= $row['quantity'] ?></td>
                <td>
                    <a href="updateform.php?p_id= <?= $row['p_id'] ?>" >Edit</a>
                    <a href="delete.php?p_id= <?= $row['p_id'] ?>" onclick=" return confirm('Are You Sure?')" >Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>