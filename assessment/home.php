<?php
    require_once "functions.php"; 
    check_login();
                    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

 <!-- boostrap model -->
<div class="modal fade" id="user-model" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="userModel"></h4>
            </div>
            <div class="modal-body">
                <form action="javascript:void(0)" id="userUpdateForm" name="userUpdateForm"
                    class="form-horizontal" method="POST">
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">First Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="fname" name="fname" placeholder="Enter First Name"
                                value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Last Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="lname" name="lname" placeholder="Enter Last Name"
                                value="" maxlength="50" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email"
                                value="" required="">
                        </div>
                    </div>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" id="btn-save" value="addNewUser">Save changes
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<!-- end bootstrap model -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mt-3">
                <div class="card">
                  <div class="card-body">
                    <h1>User List</h1>
                    <?php show_user_list();?>
                    <a href="logout.php" class="btn btn-info">Logout</a>
                    <a href="uploaddata.php" class="btn btn-info">Import New Users</a>
                  </div>
                </div>
            </div>
        </div>       
    </div>
    <script src="customscript.js" type="text/javascript"></script>
</body>
</html>
