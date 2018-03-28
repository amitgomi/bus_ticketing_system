<?php
	if(!isset($_SESSION["islogin"])){
		$_SESSION["islogin"]=0;
		$_SESSION["user_name"]="";
		$_SESSION["user_id"]="";
	}

?>