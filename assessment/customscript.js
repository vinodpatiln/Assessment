$(document).ready(function ($) {
    
    $('body').on('click', '.edit', function () {
       
        var id = $(this).data('id');
        // ajax
        $.ajax({
            type: "POST",
            url: "edit.php",
            data: { id: id },
            dataType: 'json',
            success: function (res) {
                $('#userModel').html("Edit User");
                $('#user-model').modal('show');
                $('#id').val(res.uid);
                $('#fname').val(res.firstname);
                $('#lname').val(res.lastname);
                $('#email').val(res.email_id);
            }
        });
    });
    $('body').on('click', '.delete', function () {
        if (confirm("Delete Record?") == true) {
            var id = $(this).data('id');
            // ajax
            $.ajax({
                type: "POST",
                url: "delete-userdata.php",
                data: { id: id },
                dataType: 'json',
                success: function (res) {
                    $('#fname').val(res.firstname);
                    $('#lname').val(res.lastname);
                    $('#email').val(res.email_id);
                    window.location.reload();
                }
            });
        }
    });
    
    $('#addNewUser').click(function () {
        $('#userUpdateForm').trigger("reset");
        $('#userModel').html("Add New User");
        $('#user-model').modal('show');
    });
    $('#userUpdateForm').submit(function() {
        // ajax
        $.ajax({
            type:"POST",
            url: "update_userdata.php",
            data: $(this).serialize(), // get all form field value in 
            dataType: 'json',
            success: function(res){
                window.location.reload();
            }
        });
    });
});