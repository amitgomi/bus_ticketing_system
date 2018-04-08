<?php
	if(!isset($_SESSION["admin_islogin"])){
		$_SESSION["admin_islogin"]=0;
		$_SESSION["admin_user_name"]="";
		$_SESSION["admin_user_id"]="";
		$_SESSION["admin_email_id"]="";
		$_SESSION["admin_phone_no"]=0;
		$_SESSION["admin_first_name"]="";
		$_SESSION["admin_last_name"]="";
		$_SESSION["admin_photo"]="";
		//$_SESSION["admin_connection"]="";
	}

?>