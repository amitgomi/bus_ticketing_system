<?php
	if(!isset($_SESSION["islogin"])){
		$_SESSION["islogin"]=0;
		$_SESSION["user_name"]="";
		$_SESSION["user_id"]="";
		$_SESSION["email_id"]="";
		$_SESSION["phone_no"]=0;
		$_SESSION["first_name"]="";
		$_SESSION["last_name"]="";
		$_SESSION["photo"]="";
		//$_SESSION["connection"]="";
	}

?>