<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include ("db.php");

$name = $sku = $category ='';
$nameErr = $skuErr = $categoryErr = '';
if(isset($_POST["add"])){

if(empty($_POST['name'])){
    $nameErr = "Product name Required...";
}else{
    $name = $_POST['name'];
}

if(empty($_POST['sku'])){
    $skuErr = "Product SKU Required...";
}else{
    $sku = $_POST['sku'];
}

if(empty($_POST['category'])){
    $categoryErr = "Product Category Required...";
}else{
    $category = $_POST['category'];
}

if(empty($nameErr) && empty($skuErr) && empty($categoryErr)){
$productsql = "INSERT into product (name,sku,category) VALUES ('$name','$sku','$category')";
if(mysqli_query($conn, $productsql)){
    $p_id = mysqli_insert_id($conn);

    if (!empty($_POST['size']) && is_array($_POST['size'])) {
        $sizeArray = $_POST['size'];
        $colorArray = $_POST['color'];
        $quantityArray = $_POST['quantity'];


        for ($i = 0; $i < count($sizeArray); $i++) {
            $size = $sizeArray[$i];
            $color = $colorArray[$i];
            $quantity = intval($quantityArray[$i]);
            
            if (!empty($size) && !empty($color) && $quantity > 0) {
                $variantSql = "INSERT INTO variant (p_id, size, color, quantity) 
                           VALUES('$p_id','$size','$color','$quantity')";
            mysqli_query($conn, $variantSql);
            }
        }
    }
    
    echo '<script language="javascript">';
    echo 'alert("Successfully inserted data"); location.href="display.php"';
    echo '</script>';
}else {
    die('Error'. mysqli_error($conn));
}
 
}

}