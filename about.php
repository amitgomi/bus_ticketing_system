<?php 
	session_start();
	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["islogin"]=0;
?>
	<div class="container" style="margin-top: 70px; margin-bottom: 40px;"> 
		<div class="row" >
			<div class="container col-md-12">
				<img class="profile_photo profile_photo1" src="img/amit.png" onmouseover="hover1(this);" onmouseout="unhover1(this);" >
				<h1 style="text-align: center;">Amit Kumar</h1>
			</div>
		</div>
		<div class="row">
			<div class="container col-md-6">
				<img class="profile_photo profile_photo2" src="img/vikash.png" onmouseover="hover2(this);" onmouseout="unhover2(this);">
				<h1 style="text-align: center;">Vikash Tripathi</h1>
			</div>
			<div class="container col-md-6">
				<img class="profile_photo profile_photo3" src="img/shivansh.png" onmouseover="hover3(this);" onmouseout="unhover3(this);">
				<h1 style="text-align: center;">Shivansh Pandey</h1>
			</div>
		</div>
		<div class="row" style="margin-top: 80px;">
			<div class="container col-md-2">
			</div>
			<div class="container col-md-4">
				<img class="profile_photo profile_photo4" src="img/sahil.png" onmouseover="hover4(this);" onmouseout="unhover4(this);">
				<h1 style="text-align: center;">Sahil Garg</h1>
			</div>
			<div class="container col-md-4">
				<img class="profile_photo profile_photo5" src="img/rakshit.png" onmouseover="hover5(this);" onmouseout="unhover5(this);">
				<h1 style="text-align: center;">Rakshit Choudhary</h1>
			</div>
		</div>
	</div>
<?php include 'includes/footer.php' ?>




<script src="js/bootstrap.min.js" type="text/css"></script>
