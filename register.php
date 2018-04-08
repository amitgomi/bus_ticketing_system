<?php 
	session_start();
	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["islogin"]=0;

	
?>
	<div class="container" style="margin-top: 70px; margin-bottom: 40px;">
		<div >
			<h1 style="text-align: center;"></h1>
			<img class="profile_photo" src="img/reg.png">
		</div>
		<form action="index.php" style="padding-left: 25%;" method="POST">
			<div class="form-group">
			    <label >Username:</label>
			    <br>
			    <input type="text" class="form-control " style=" width: 70%;" placeholder="username" id="user_name" >
			</div>
			<div class="form-group">
			    <label >Name:</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 34%;" id="first_name" placeholder="First name" >
			    <input type="text" class="form-control" id="last_name" style="display: inline-block; margin-left: 20px; width: 33%;" placeholder="Last name" >
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Email address:</label>
			    <input type="email" class="form-control" id="email_id" style=" width: 70%;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" >
			    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
			</div>
			<div class="form-group">
			    <label >Phone number:</label>
			    <input type="text" name="num" id="phone_no" data-validation="number" style=" width: 70%;" data-validation-allowing="negative,number" input name="color" data-validation="number" datavalidation-ignore="$" required="required" class="form-control"  placeholder="Phone Number" maxlength="10" minlength="10" pattern="\d*">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Password</label>
			    <input type="password" class="form-control" style=" width: 70%;" id="r_password" placeholder="Password">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">Confirm Password</label>
			    <input type="password" class="form-control" style=" width: 70%;" id="con_password" placeholder="Canfirm Password">
			</div>
			<button type="submit" onclick="register()" class="btn btn-primary">Submit</button>
		</form>
	</div>
<?php include 'includes/footer.php' ?>




<script src="js/bootstrap.min.js" type="text/css"></script>
