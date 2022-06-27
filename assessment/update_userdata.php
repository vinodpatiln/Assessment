<?php
if(count($_POST)>0)
{    
include 'config.php';
$name = $_POST['fname'];
$age = $_POST['lname'];
$email = $_POST['email'];
if(empty($_POST['id'])){
    echo "user not exist";
}else{
    $query = "UPDATE users set  firstname='" . $_POST['fname'] . "', lastname='" . $_POST['lname'] . "', email_id='" . $_POST['email'] . "' WHERE uid='" . $_POST['id'] . "'"; 
}
$res = mysqli_query($conn, $query);
if($res) {
    echo json_encode($res);
} else {
    echo "Error: " . $sql . "" . mysqli_error($dbCon);
}
}
?>