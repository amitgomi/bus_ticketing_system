	<nav class="navbar navbar-inverse navbar-fixed-top" style="padding-left: 50px; padding-right: 50px; background-color: #0c1a1e">
		<div class="container-fluid">

			<div class="navbar-header">
		        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>                        
		        </button>				
		    	<a class="navbar-brand" style="color:#e82c2c; font-size: 35px;" href="index.php">MyBus</a>
		    </div>

		    <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav">
			    	<li class="active"><a href="#">book your ride!!</a></li>
			    	<!-- <li><a href="#">Page 1</a></li> -->
			    </ul>
			    <ul class="nav navbar-nav">
			    	<li ><a href="about.php">About us</a></li>
			    	<!-- <li><a href="#">Page 1</a></li> -->
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			    	<?php 
			    	//$_SESSION["user_name"]="hello";
			    	if($_SESSION["islogin"] == 0){
			    		$str = "<li onclick=\"document.getElementById('id01').style.display='block'\"><a href=\"#\"><span class=\"glyphicon glyphicon-log-in\"> Login </a></li>
				    	<li><a href=\"register.php\"><span class=\"glyphicon glyphicon-user\"> </span>Signup</a></li>";
			    		echo $str;
			    	}
			    	else{ ?>
			    		<li><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><?php echo $_SESSION["user_name"]; ?> </a>
			    			<ul class="dropdown-menu">
				            <li><a href="profile.php">Your profile</a></li>
				            <li><a href="showticket.php">Your tickets</a></li>
				            <li><a href="index.php" onclick="logout()">Logout</a></li>
				          </ul>
			    		</li>
			    	<?php
			    	}
			    	?>
			    </ul>

			</div>
	    </div>
	</nav>

<?php
	if($_SESSION["islogin"] == 0)
	include 'login.php'; ?>

<script src="js/bootstrap.min.js" type="text/css"></script>
