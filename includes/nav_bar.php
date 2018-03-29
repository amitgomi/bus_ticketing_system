	<nav class="navbar navbar-inverse navbar-fixed-top" style="padding-left: 50px; padding-right: 50px; background-color: #0c1a1e">
		<div class="container-fluid"></div>
			<div class="navbar-header">
	    	<a class="navbar-brand" style="color:#e82c2c; font-size: 35px;" href="#">MyBus</a>
	    </div>
	    <ul class="nav navbar-nav">
	    	<li class="active"><a href="#">book your ride!!</a></li>
	    	<!-- <li><a href="#">Page 1</a></li> -->
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    	<?php 
	    	//$_SESSION["user_name"]="hello";
	    	if($_SESSION["islogin"] == 0){
	    		$str = "<li onclick=\"document.getElementById('id01').style.display='block'\"><a href=\"#\"><span class=\"glyphicon glyphicon-log-in\"> Login </a></li>
		    	<li><a href=\"#\"><span class=\"glyphicon glyphicon-user\"> Signup</a></li>";
	    		echo $str;
	    	}
	    	else{
	    		$str = "
		    	<li><a href=\"#\"><span class=\"glyphicon glyphicon-user\"> ".$_SESSION["user_name"]."</a></li>";
	    		echo $str;
	    	}
	    	?>
	    </ul>
	</nav>

<?php
	if($_SESSION["islogin"] == 0)
	include 'login.php'; ?>

<script src="js/bootstrap.min.js" type="text/css"></script>
