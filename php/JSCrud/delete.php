<?php

include ("db.php");

if (isset($_GET['p_id'])) {

    $p_id = $_GET['p_id'];
    $sql = "DELETE from product where p_id=$p_id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
                  alert("Successfully Deleted Data!");
                  window.location.href="display.php";
                </script>';
    }

}