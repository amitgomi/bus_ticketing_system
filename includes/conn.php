<?php
session_start();
$connection = mysqli_connect("localhost",'root','','mybus');

if(!$connection) {
	die("Unable to connect" . mysqli_error($connection));
}

?>