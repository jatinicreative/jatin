<?php 
    session_start();
    if (isset($_SESSION['login_in']) ) {
     
    }
    else {
      header('Location: login.php');
      exit();
  
    }
  include ("header.php");
  include ("sidebar.php"); 

?>
<html>
  <head>
    <title>User Form</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>  
  <body>
    <div class="container-fluid">
      <div class="card mb-4">
        <div class="card-header"><h3 class="card-title">User Table</h3></div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
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
              </thead>
              <tbody class="userdata">
              
              </tbody>
            </table>
          </div>      
    </div>
    <?php include ("footer.php"); ?>  
  <footer>
    <script>
      $(document).ready(function () {
        getdata();
      });
      function getdata()
      {
        $.ajax({
          url: "aget_user.php",
          dataType: "json",
          type: "GET",
          success: function (response){
              $.each(response,function(key,value){
                $('.userdata').append('<tr>'+
                                '<td>'+value['first_name']+'</td>\
                                <td>'+value['last_name']+'</td>\
                                <td>'+value['email']+'</td>\
                                <td>'+value['file']+'</td>\
                                <td>'+value['address']+'</td>\
                                <td>'+value['phone']+'</td>\
                                <td>'+value['gender']+'</td>\
                                <td>'+value['hobby']+'</td>\
                                <td>'+value['country']+'</td>\
                                <td>\
                                    <a href="#" >EDIT</a>\
                                    <a href="#" >DELETE</a>\
                                </td>\
                            </tr>');
                    });
              }
          });                
      }        
    </script>
  </footer>
  </body>
</html>
