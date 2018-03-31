<?php
	function Redirect($url, $permanent = false)
	{
	    if (headers_sent() === false)
	    {
	        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
	    }

	    exit();
	}

	session_start();
 	$username = $_POST['username'];
	$password = $_POST['password'];
	$displayname = $_POST['username'];

	if($_SESSION["islogin"]==0){
		$query = "SELECT * FROM user WHERE user_name='$username' AND password='$password'";

		$connection = mysqli_connect("localhost",'root','','mybus');
		if(!$connection) {
			die("Unable to connect" . mysqli_error($connection));
		}

		$result = mysqli_query($connection,$query);
		$count  = mysqli_num_rows($result);
		if($count == 1){
			$row = mysqli_fetch_assoc($result);
			$_SESSION["islogin"]=1;
			$_SESSION["user_name"]= $row["user_name"];
			$_SESSION["user_id"]= $row["user_id"];
			$_SESSION["email_id"]=$row["email_id"];
			$_SESSION["phone_no"]=$row["phone_no"];
			$_SESSION["first_name"]=$row["first_name"];
			$_SESSION["last_name"]=$row["last_name"];
			$_SESSION["photo"]=$row["photo"];
			//Redirect(true);
			Redirect('index.php', false);
		}
		else{
			//echo "fail";
			Redirect('index.php', false);
		}
	}

?>