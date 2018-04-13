<?php 
	session_start();
	$_SESSION["cur_page"]="index.php";
	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["admin_islogin"]=0;
?>
	<div class="" style="min-height: 550px; margin-top: 70px; margin-bottom: 40px;">
		<a href="bus.php"><div class="container col-md-3 que_cont">Buses</div></a>
		<a href="user.php"><div class="container col-md-3 que_cont">User</div></a>
		<a href="ticket.php"><div class="container col-md-3 que_cont">Tickets</div></a>
	</div>
<?php include 'includes/footer.php' ?>




<script src="js/bootstrap.min.js" type="text/css"></script>
