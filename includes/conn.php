<?php
$connection = mysqli_connect("localhost",'root','','mybus');

if(!$connection) {
	die("Unable to connect" . mysqli_error($connection));
}else
$_SESSION["connection"]=$connection;

?>