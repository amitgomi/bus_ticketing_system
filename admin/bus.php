<?php 
	session_start();
	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["admin_islogin"]=0;
?>
	<div class="container" style="margin-top: 70px; margin-bottom: 40px;">

		<form style="padding-left: 25%;" method="POST">
			<div class="form-group">
			    <label >Name:</label>
			    <br>
			    <input type="text" class="form-control " style=" width: 70%;" id="first_name" placeholder="First name" value="<?php echo $_SESSION["first_name"]?>">
			</div>
			<div class="form-group">
			    <label >Name:</label>
			    <br>
			    <input type="text" class="form-control " style=" width: 70%;" id="first_name" placeholder="First name" value="<?php echo $_SESSION["first_name"]?>">
			</div>
			<div class="form-group">
			    <label >Name:</label>
			    <br>
			    <input type="text" class="form-control " style=" width: 70%;" id="first_name" placeholder="First name" value="<?php echo $_SESSION["first_name"]?>">
			</div>
			<div class="form-group">
			    <label >Name:</label>
			    <br>
			    <input type="text" class="form-control " style=" width: 70%;" id="first_name" placeholder="First name" value="<?php echo $_SESSION["first_name"]?>">
			</div>
			<div class="form-group">
			    <label >Name:</label>
			    <br>
			    <input type="text" class="form-control " style=" width: 70%;" id="first_name" placeholder="First name" value="<?php echo $_SESSION["first_name"]?>">
			</div>
			<div class="form-group">
			    <label >Name:</label>
			    <br>
			    <input type="text" class="form-control " style=" width: 70%;" id="first_name" placeholder="First name" value="<?php echo $_SESSION["first_name"]?>">
			</div>
			<div class="form-group">
			    <label >Name:</label>
			    <br>
			    <input type="text" class="form-control " style=" width: 70%;" id="first_name" placeholder="First name" value="<?php echo $_SESSION["first_name"]?>">
			</div>

			<button type="submit" onclick="update_profile()" class="btn btn-primary">Submit</button>
		</form>

	</div>
<?php include 'includes/footer.php' ?>




<script src="js/bootstrap.min.js" type="text/css"></script>
