<?php 
session_start();
if($_POST['action'] == 'log_out') {
	$_SESSION["islogin"]=0;
}
?>