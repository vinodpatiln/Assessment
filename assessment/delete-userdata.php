<?php
include 'config.php';
$id = $_POST['id'];
$query = "DELETE FROM users WHERE uid=$id";
$res = mysqli_query($conn, $query);
if($res) {
echo json_encode($res);
} else {
echo "Error: " . $sql . "" . mysqli_error($conn);
}
?>