<?php 
require_once'ofunction.php';
if(isset($_GET['id']))
{
$rid=$_GET['id'];
$deletedata=new CRUD();
$sql=$deletedata->delete($rid);
if($sql)
{
echo "<script>alert('Record deleted successfully');</script>";
echo "<script>window.location.href='odisplay.php'</script>";
}
}
