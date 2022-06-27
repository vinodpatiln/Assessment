<?php
ob_start();
session_start();
if(isset($_SESSION['user_id'])) {
	session_destroy();
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	unset($_SESSION['email_id']);
	unset($_SESSION['firstname']);
	unset($_SESSION['lastname']);

	header("Location: login.php");
} else {
	header("Location: login.php");
}
?>