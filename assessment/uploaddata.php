<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Info</title>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <?php

    session_start();

    if(isset($_SESSION['user_id']) =="") {
        header("Location: login.php");
    }

    ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 my-3">
                
                    <div class="user-info">
                       <?php if($_SESSION['user_name']!=""){ ?> 
                            <h5 class="user-title">Hello <?php  echo ucfirst($_SESSION['user_name']);?></h5>
                        <?php } ?>
                        <a href="home.php" class="btn btn-info">Back to Home</a>
                        <a href="logout.php" class="btn btn-info">Logout</a>
                    </div>
            </div>
        </div>       
    </div>
    
        <div class="container">
            <div class="row">
                <div class="col-lg-6 import-section text-center">
                    <div class="card p-4">
                        <form class="form-horizontal" action="importdata.php" method="post" name="upload_excel" enctype="multipart/form-data">
                        
                                <!-- Form Name -->
                                <h2>Import Users</h2>
                                <!-- File Button -->
                                <div class="form-group mb-3">
                                    <div class="col-md-12">
                                        <label for="formFileSm" class="form-label">Select File</label>
                                        <input class="form-control form-control-sm file-input" id="formFileSm" type="file" name="file" id="file" accept=".csv,.xls,.xlsx" required>
                                    </div>
                                </div>
                                
                                <!-- Button -->
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" id="Import" name="Import" class="btn btn-info btn-style button-loading" data-loading-text="Loading...">Import</button>
                                    </div>
                                </div>
                        </form>
                        <?php if(isset($_SESSION['fileerror']) && $_SESSION['fileerror']!=""){
                                echo $_SESSION['fileerror'];
                                $_SESSION['fileerror']="";
                            }?>
                    </div>
                </div>
            </div>
        </div>

</body>
</html>
