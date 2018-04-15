<?php

	session_start();

	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["islogin"]=0;

	
?>
	<div class="container" style="margin-top: 70px; margin-bottom: 40px;">
		<?php
		if(isset($_POST["submit"])){
/////////////////////////////
	$user_name=$_SESSION["user_name"]=$_POST['user_name'];
	$first_name=$_SESSION["first_name"]=$_POST['first_name'];
	$last_name=$_SESSION["last_name"]=$_POST['last_name'];
	$email_id=$_SESSION["email_id"]=$_POST['email_id'];
	$phone_no=$_SESSION["phone_no"]=$_POST['phone_no'];
	$password=$_POST['password'];
	$con_password=$_POST['con_password'];
	$photo=$_SESSION["photo"]=$user_name.".jpeg";

	$first_name=trim($first_name);
	$last_name=trim($last_name);
	$query = "SELECT * FROM user WHERE user_name = '$user_name'";
//////////////////username check
	$connection = mysqli_connect("localhost",'root','','mybus');
		if(!$connection) {
			die("Unable to connect" . mysqli_error($connection));
		}
	$res = mysqli_query($connection,$query);
	$uf=0;
	$fl = 0;
	$rowcount = mysqli_num_rows($res);
	if($rowcount >0){
		$uf=1;
		$fl=1;
	}
///////////////email check
	$query = "SELECT * FROM user WHERE email_id = '$email_id'";

	$connection = mysqli_connect("localhost",'root','','mybus');
		if(!$connection) {
			die("Unable to connect" . mysqli_error($connection));
		}
	$res = mysqli_query($connection,$query);
	$ef=0;
	$rowcount = mysqli_num_rows($res);
	if($rowcount >0){
		$ef=1;
		$fl=1;
	}
////////////phone no
$query = "SELECT * FROM user WHERE phone_no = $phone_no";

	$connection = mysqli_connect("localhost",'root','','mybus');
		if(!$connection) {
			die("Unable to connect" . mysqli_error($connection));
		}
	$res = mysqli_query($connection,$query);
	$pf=0;
	$rowcount = mysqli_num_rows($res);
	if($rowcount >0){
		$pf=1;
		$fl=1;
	}
/////////////password check
	$psf=0;
	if($password != $con_password){
		$psf=1;
		$fl=1;
	}
	else if(strlen($password) < 6){
		$psf=2;
		$fl=1;
	}

	if($fl==0){
		$query = "INSERT INTO user (user_id,email_id, password, phone_no, first_name, last_name, user_name, photo) VALUES (NULL,'$email_id','$password',$phone_no,'$first_name','$last_name','$user_name','$photo')";

		$connection = mysqli_connect("localhost",'root','','mybus');
			if(!$connection) {
				die("Unable to connect" . mysqli_error($connection));
			}
		$res = mysqli_query($connection,$query);
		if(!$res){
			$_SESSION["islogin"]=0;
			//Redirect('index.php', false);
		}
		else{
			$_SESSION["islogin"]=1;

					$query = "SELECT * FROM user WHERE user_name='$user_name' AND password='$password'";

					$connection = mysqli_connect("localhost",'root','','mybus');
					if(!$connection) {
						die("Unable to connect" . mysqli_error($connection));
					}

					$result = mysqli_query($connection,$query);
					$row = mysqli_fetch_assoc($result);
					$_SESSION["user_id"]= $row["user_id"];
					$_SESSION["photo"]=$row["photo"];
					header ('location: index.php');
		}
	}
	?>
	<div >
		<h1 style="text-align: center;"></h1>
		<img class="profile_photo" src="img/reg.png">
	</div>
	<form action="register.php" style="padding-left: 25%;" method="POST">
		<div class="form-group">
		    <label >Username:</label>
		    <br>
		    <input type="text" class="form-control " style=" width: 70%;" placeholder="username" id="user_name" name="user_name" value="<?php echo $user_name;?>" >
		    <?php
		    if($uf==1){?>
		    <small class="form-text text-muted text-danger" >username already exists</small>
		    <?php }?>
		</div>
		<div class="form-group">
		    <label >Name:</label>
		    <br>
		    <input type="text" class="form-control " style="display: inline-block; width: 34%;" name="first_name" placeholder="First name" value="<?php echo $first_name?>">
		    <input type="text" class="form-control" name="last_name" style="display: inline-block; margin-left: 20px; width: 33%;" placeholder="Last name" value="<?php echo $last_name;?>">
		    <?php
		    echo $first_name." ".$last_name;
		    if(strlen($first_name)+strlen($last_name) <3){?>
		    <br>
		    <small class="form-text text-muted text-danger" >Name can not be too short</small>
		    <?php }?>
		</div>
		<div class="form-group">
		    <label for="exampleInputEmail1">Email address:</label>
		    <input type="email" class="form-control" id="email_id" style=" width: 70%;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email_id" value="<?php echo $email_id;?>">
		    <small id="emailHelp" class="form-text text-muted " >We'll never share your email with anyone else.</small>
		    <?php
		    if($ef==1){?>
		    <small class="form-text text-muted text-danger" >email associated with another acount</small>
		    <?php }?>
		</div>
		<div class="form-group">
		    <label >Phone number:</label>
		    <input type="text" name="phone_no" id="phone_no" data-validation="number" style=" width: 70%;" data-validation-allowing="negative,number" input name="color" data-validation="number" datavalidation-ignore="$" required="required" class="form-control"  placeholder="Phone Number" maxlength="10" minlength="10" pattern="\d*" value="<?php echo $phone_no;?>">
		    <?php
		    if($pf==1){?>
		    <small class="form-text text-muted text-danger" >phone no. associated with another account</small>
		    <?php }?>
		</div>
		<div class="form-group">
		    <label for="exampleInputPassword1">Password</label>
		    <input type="password" class="form-control" style=" width: 70%;" name="password" placeholder="Password">
		    <?php
		    if($psf==1){?>
		    <small class="form-text text-muted text-danger" >password did not match confirm password</small>
		    <?php }?>
		    <?php
		    if($psf==2){?>
		    <small class="form-text text-muted text-danger" >password too sort</small>
		    <?php }?>
		</div>
		<div class="form-group">
		    <label for="exampleInputPassword1">Confirm Password</label>
		    <input type="password" class="form-control" style=" width: 70%;" name="con_password" placeholder="Canfirm Password">
		</div>
		<button type="submit"  name="submit" class="btn btn-primary">Submit</button>
	</form>

	<?php


/////////////////////////


		}
		else
		{ ?>
			<div >
				<h1 style="text-align: center;"></h1>
				<img class="profile_photo" src="img/reg.png">
			</div>
			<form action="register.php" style="padding-left: 25%;" method="POST">
				<div class="form-group">
				    <label >Username:</label>
				    <br>
				    <input type="text" class="form-control " style=" width: 70%;" placeholder="username" id="user_name" name="user_name" >
				</div>
				<div class="form-group">
				    <label >Name:</label>
				    <br>
				    <input type="text" class="form-control " style="display: inline-block; width: 34%;" name="first_name" placeholder="First name" >
				    <input type="text" class="form-control" name="last_name" style="display: inline-block; margin-left: 20px; width: 33%;" placeholder="Last name" >
				</div>
				<div class="form-group">
				    <label for="exampleInputEmail1">Email address:</label>
				    <input type="email" class="form-control" id="email_id" style=" width: 70%;" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email_id" >
				    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
				</div>
				<div class="form-group">
				    <label >Phone number:</label>
				    <input type="text" name="phone_no" id="phone_no" data-validation="number" style=" width: 70%;" data-validation-allowing="negative,number" input name="color" data-validation="number" datavalidation-ignore="$" required="required" class="form-control"  placeholder="Phone Number" maxlength="10" minlength="10" pattern="\d*">
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Password</label>
				    <input type="password" class="form-control" style=" width: 70%;" name="password" placeholder="Password">
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Confirm Password</label>
				    <input type="password" class="form-control" style=" width: 70%;" name="con_password" placeholder="Canfirm Password">
				</div>
				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			</form>
		<?php
		}
		?>
	</div>
<?php include 'includes/footer.php' ?>




<script src="js/bootstrap.min.js" type="text/css"></script>
