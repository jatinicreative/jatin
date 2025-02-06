<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include ("db.php");
    
    if (isset($_POST["update"])) {
        $p_id = $_POST['p_id'];
        $name = $_POST['name'];
        $sku = $_POST['sku'];
        $category = $_POST['category'];
        
        $sql = "UPDATE product set name='$name',sku='$sku',category='$category' where p_id=$p_id";
        mysqli_query($conn, $sql);
        

        $v_ids = $_POST['v_id'];

        $sizes = $_POST['size'];
        $colors = $_POST['color'];
        $quantitys = $_POST['quantity'];
        
        for($i=0;$i<count($sizes);$i++)
        {
            $size = $sizes[$i];
            $color = $colors[$i];
            $quantity = $quantitys[$i];

            if(!empty($size) && !empty($color) && !empty($quantity)){
                if(!empty($v_ids[$i]))
                {
                    $v_id = $v_ids[$i];
                    
                    $sql ="UPDATE variant SET size='$size',color='$color',quantity='$quantity' where p_id=$p_id && v_id=$v_id";
                    mysqli_query($conn, $sql);
                }else{
                
                $variantinsert = "INSERT into variant (p_id,size,color,quantity) Values('$p_id','$size','$color','$quantity')";
                mysqli_query($conn, $variantinsert);
            }
            }
        }        
        
            echo '<script>
                  alert("Successfully Data Updated!");
                  window.location.href="display.php";
                </script>';
        
    
    }