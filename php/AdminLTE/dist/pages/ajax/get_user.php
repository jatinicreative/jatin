<?php
   include "adb.php";
   header('Content-type: application/json');

   $query = "SELECT * FROM user Order by updated_at DESC";
   $result= mysqli_query($co, $query);
   $result_array = [];

   if(mysqli_num_rows($result) > 0)
   {
      foreach($result as $row)
      {
        array_push($result_array, $row);
      }
      echo json_encode($result_array);
   }
   else
   {
       echo $return = "<h4>No Record Found</h4>";
   }








