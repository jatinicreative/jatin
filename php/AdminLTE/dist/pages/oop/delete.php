<?php 
    include 'function.php';
    if(isset($_GET['id']))
    {
        $rid=$_GET['id'];
        $deletedata=new CRUD();
        $sql=$deletedata->delete($rid);
        if($sql)
        {
            echo "<script>alert('Record deleted successfully');</script>";
            echo "<script>window.location.href='display.php'</script>";
        }
    }
