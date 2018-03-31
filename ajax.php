<?php 
session_start();
if($_POST['action'] == 'log_out') {
	$_SESSION["islogin"]=0;
}
if($_POST['action'] == 'update_profile') {
	$user_id=$_SESSION["user_id"];
	$user_name=$_SESSION["user_name"]=$_POST['user_name'];
	$first_name=$_SESSION["first_name"]=$_POST['first_name'];
	$last_name=$_SESSION["last_name"]=$_POST['last_name'];
	$email_id=$_SESSION["email_id"]=$_POST['email_id'];
	$phone_no=$_SESSION["phone_no"]=$_POST['phone_no'];

	$query = "UPDATE user SET first_name='$first_name', last_name='$last_name', phone_no=".$phone_no."  WHERE user_id = ".$user_id ;

	$connection = mysqli_connect("localhost",'root','','mybus');
		if(!$connection) {
			die("Unable to connect" . mysqli_error($connection));
		}
	$res = mysqli_query($connection,$query);
}

if($_POST['action'] == 'register') {
	//$user_id=$_SESSION["user_id"];
	$user_name=$_SESSION["user_name"]=$_POST['user_name'];
	$first_name=$_SESSION["first_name"]=$_POST['first_name'];
	$last_name=$_SESSION["last_name"]=$_POST['last_name'];
	$email_id=$_SESSION["email_id"]=$_POST['email_id'];
	$phone_no=$_SESSION["phone_no"]=$_POST['phone_no'];
	$password=$_POST['password'];
	$photo=$_SESSION["photo"]=$password.".jpeg";

	$query = "INSERT INTO user (user_id,email_id, password, phone_no, first_name, last_name, user_name, photo) VALUES (NULL,'$email_id','$password',$phone_no,'$first_name','$last_name','$user_name','$photo')";

	$connection = mysqli_connect("localhost",'root','','mybus');
		if(!$connection) {
			die("Unable to connect" . mysqli_error($connection));
		}
	$res = mysqli_query($connection,$query);
	if(!$res){
		$_SESSION["islogin"]=0;
	}
	else{
		$_SESSION["islogin"]=1;
		
	}
}

?>