<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include ("db.php");

if(isset($_POST["add"])){

$name = $_POST["name"];
$sku = $_POST["sku"];
$category = $_POST["category"];

$productsql = "INSERT into product (name,sku,category) VALUES ('$name','$sku','$category')";

if(mysqli_query($conn, $productsql)){
    $p_id = mysqli_insert_id($conn);

    if (!empty($_POST['size']) && is_array($_POST['size'])) {
        $sizeArray = $_POST['size'];
        $colorArray = $_POST['color'];
        $quantityArray = $_POST['quantity'];

        $variantSqlValues = [];

        for ($i = 0; $i < count($sizeArray); $i++) {
            $size = $sizeArray[$i];
            $color = $colorArray[$i];
            $quantity = intval($quantityArray[$i]);
            
            if (!empty($size) && !empty($color) && $quantity > 0) {
                $variantSqlValues[] = "($p_id, '$size', '$color', $quantity)";
            }
        }
        if (!empty($variantSqlValues)) {
            $variantSql = "INSERT INTO variant (p_id, size, color, quantity) 
                           VALUES " . implode(",", $variantSqlValues);
            mysqli_query($conn, $variantSql);
        }
    }
    echo '<script language="javascript">';
    echo 'alert("Successfully inserted data"); location.href="display.php"';
    echo '</script>';
} else {
    die('Error'. mysqli_error($conn));
}

}