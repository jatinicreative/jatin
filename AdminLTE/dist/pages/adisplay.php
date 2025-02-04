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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
              $('.userdata').empty();
              $.each(response,function(key,value){
                $('.userdata').append('<tr>'+
                                '<td>'+value['first_name']+'</td>\
                                <td>'+value['last_name']+'</td>\
                                <td>'+value['email']+'</td>\
                                <td><img src="uploads/'+value['file']+'" width="100" height="100" alt="Profile Image"></td>\
                                <td>'+value['address']+'</td>\
                                <td>'+value['phone']+'</td>\
                                <td>'+value['gender']+'</td>\
                                <td>'+value['hobby']+'</td>\
                                <td>'+value['country']+'</td>\
                                <td>\
                                    <a href="aupdateform.php?id='+value['id']+'" title="Edit">\
                                    <i class="fas fa-edit" style="color:ligthblue; font-size: 20px;"></i>\
                                    </a>\
                                    <a href="#" class="delete-btn" data-id="'+value['id']+'"title="Delete">\
                                    <i class="fas fa-trash" style="color:red; font-size: 20px;"></i>\
                                    </a>\
                                </td>\
                            </tr>');
                    });
              $('.delete-btn').on('click',function(e){
                    e.preventDefault();
                    var id = $(this).data('id');
                    if(confirm('Are you sure you want to delete')){
                    $.ajax({
                      url: "adelete.php",
                      dataType: "json",
                      type: "POST",
                      data: { id: id },
                      success: function(response)
                      {
                        if(response.status==='success')
                        {
                          alert(response.message);
                          getdata();
                        }
                        else
                        {
                          alert(response.message);
                        }
                      },
                      error: function(xhr, status, error) {
                        alert("Error: " + xhr.responseText); }
                    })
                  }
                });  
              }
          });                
        }  
    </script>
  </footer>
  </body>
</html>
