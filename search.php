<?php 
	session_start();
	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["islogin"]=0;
?>
	<div class="container" style="margin-top: 40px; margin-bottom: 40px">
		<h1>Book your ride!!</h1>

		<form class="form-inline" action="search.php">
		    <div class="form-group">
		      <label class="control-label col-sm-3" for="source">Source:</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="email" placeholder="Enter source" name="email">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-3" for="pwd">Destination:</label>
		      <div class="col-sm-10">          
		        <input type="text" class="form-control" id="password" placeholder="Enter destination" name="pwd">
		      </div>
		    </div>
		    <div class="form-group">        
		      <div class="col-sm-offset-2 col-sm-10">
		        <button type="submit" class="btn btn-primary">Search</button>
		      </div>
		    </div>
		  </form>

	</div>
<?php include 'includes/footer.php' ?>
