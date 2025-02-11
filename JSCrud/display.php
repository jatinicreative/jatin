<?php 
    include 'nav.php'; 
    include  'db.php';        

   
    $sql = "SELECT * FROM product";
    $result = mysqli_query($conn, $sql);
?>
<br>
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
                <th>Variants</th>
                <th>Actions</th>
            </tr>
            <?php while($row = $result->fetch_assoc()) { 
                
                $p_id = $row['p_id'];
                $variantSql = "SELECT * FROM variant WHERE p_id = '$p_id'";
                $variantResult = mysqli_query($conn, $variantSql);

                $variants = [];
                
                while($variant = mysqli_fetch_assoc($variantResult)) {
                    $size = $variant['size'];
                    $color = $variant['color'];
                    $quantity = $variant['quantity'];
                    $variants[] = "Size [$size] Color [$color] Quantity [$quantity]";
                }
                
                $variantsString = implode(', ', $variants);
            ?>
            <tr>
                <td><?= $row['name'] ?></td>
                <td><?= $row['sku'] ?></td>
                <td><?= $row['category'] ?></td>
                <td><?= $variantsString ?></td> 
                <td>
                    <a href="updateform.php?p_id= <?= $row['p_id'] ?>" >Edit</a>
                    <a href="delete.php?p_id= <?= $row['p_id'] ?>" onclick=" return confirm('Are You Sure?')" >Delete</a>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>