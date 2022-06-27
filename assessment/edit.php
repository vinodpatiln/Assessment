<?php
include "config.php";
$id = $_POST['id'];
 $query="SELECT * from users WHERE uid = $id";
$result = mysqli_query($conn,$query);
$cust = mysqli_fetch_array($result);
if($cust) {
echo json_encode($cust);
} else {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
?>