<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Login Page </title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<?php
session_start();

require_once "config.php";
/** if session set then redirect to import user page */
if(isset($_SESSION['user_id'])!="") {
    header("Location: uploaddata.php");
}

if (isset($_POST['login'])) { //if user submit login form

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(trim($_POST['username'])=="") {
        $username_error = "Please Enter Valid Username";
    }
    if(strlen($password) < 6) {
        $password_error = "Password must be minimum of 6 characters";
        
    }  
    /** sql query for check username & password */
    $result = mysqli_query($conn, "SELECT * FROM users WHERE user_name = '" . $username. "' and password = '" . md5($password). "'");
    
    $error_message="";
    if(!empty($result) && mysqli_num_rows($result) > 0){
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['user_id'] = $row['uid'];
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['user_email'] = $row['email_id'];
            $_SESSION['firstname'] = $row['firstname'];
            $_SESSION['lastname'] = $row['lastname'];
            header("Location: uploaddata.php");
        } 
    }else {
       $error_message = "Incorrect Username or Password!!!";
    }
}
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mt-3 login-frm">
                
                <!-- Section: Design Block -->
                <section class=" text-center text-lg-start">
                    <div class="card mb-3">
                        <div class="card-body py-5 px-md-5">

                            <h2>LOGIN</h2>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                                <div class="form-group ">
                                    <input type="text" name="username" placeholder="Username" class="form-control" value="" required="" autocomplete="off">
                                    <span class="text-danger"><?php if (isset($username_error)) echo $username_error; ?></span>
                                </div>

                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Password" class="form-control" value=""  required="">
                                    <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                                </div>  
                                
                                <input type="submit" class="btn btn-info btn-lg btn-style" name="login" value="Login">
                                
                                <?php 
                                    if(isset($_POST['login']) && $error_message!=""){
                                        echo  '<p>'.$error_message.'</p>';
                                    }
                                ?>
                                
                            </form>

                        </div>
                    </div>
                </section>
                <!-- Section: Design Block -->
                
            </div>
        </div>     
    </div>
</body>
</html>
