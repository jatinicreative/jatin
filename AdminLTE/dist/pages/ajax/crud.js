// DISPLAY DATA 
$(document).ready(function () {
        getdata();
    });
    function getdata()
    {
        $.ajax({
          url: "get_user.php",
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
                                    <a href="updateform.php?id='+value['id']+'" title="Edit">\
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
                      url: "delete.php",
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


// ADD DATA 
$(document).ready(function () {
    $("#userForm").on("submit", function (e) {
      e.preventDefault();
      var formData = new FormData(this);
      $(".error-message").remove();

      $.ajax({
        url: "add.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        dataType : "json",
        success: function (response) {
          if (response.status === "success") {
            alert(response.message);
            window.location.href = "display.php";
            $("#userForm")[0].reset();
          } else if (response.errors) {

            $.each(response.errors, function (key, message) {
              $(`[name="${key}"]`).after(`<span class="error-message text-danger">${message}</span>`);
            });
          } else {
            alert(response.message);
          }
        },
        error: function (xhr) {
          alert("Error: " + xhr.responseText);
        }
      });
    });
  });




// UPDATE DATA
$(document).ready(function () {
    $('#update').on('submit', function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(".error-message").remove();
        $.ajax({
            url: "update.php",
            type: "POST",
            contentType: false,
            processData: false,
            data: formData,
            dataType: "json",
            success: function (response) {
                if (response.status === 'success') {
                    alert(response.message);
                    window.location.href = "display.php";

                } else if (response.errors) {
                    $.each(response.errors, function (key, message) {
                    $(`[name="${key}"]`).after(`<span class="error-message text-danger">${message}</span>`);
                    });
                    }
                 else {
                    alert(response.message);
                }
            },
            error: function (xhr, status, error) {
                alert("Error: " + xhr.responseText);
            }
        });
    });
});