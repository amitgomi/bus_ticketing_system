<?php 
session_start();
if($_POST['action'] == 'log_out') {
	$_SESSION["islogin"]=0;
}
if($_POST['action'] == 'update_profile') {
	$_SESSION["user_name"]=$_POST['user_name'];
	$_SESSION["first_name"]=$_POST['first_name'];
	$_SESSION["last_name"]=$_POST['last_name'];
	$_SESSION["email_id"]=$_POST['email_id'];
	$_SESSION["phone_no"]=$_POST['phone_no'];

	$query = "UPDATE user SET first_name = '$_SESSION["first_name"]',last_name = '$_SESSION["last_name"]', phone_no='$_SESSION["phone_no"]' WHERE user_id = $_SESSION["user_id"]";

	$res = mysqli_query($connection,$query);
}

?>