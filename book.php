<?php 
	session_start();
	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["islogin"]=0;
?>
	<div class="container" style="margin-top: 40px; margin-bottom: 40px">
		<?php
		$bus_id=$_GET["bus_id"];
		$user_id=$_SESSION["user_id"];
		$source=$_SESSION["source"] ;
		$destination=$_SESSION["destination"];
		$query = "SELECT * FROM bus WHERE bus_id = ".$_GET['bus_id'];
		$res = mysqli_query($connection,$query);
		$row = mysqli_fetch_assoc($res);

		$intermediate_time = $row["intermediate_time"];
		$intermediate_price = $row["intermediate_price"];
		$intermediate_station = $row["intermediate_station"];

		$i=0;
		$fare = 0;
		$f = 0;
		$f1=0;
		$curs = explode("," , $intermediate_station );
		$curt = explode("," , $intermediate_time );
		$curf = explode("," , $intermediate_price );
		for($i=0;;$i = $i + 1){
			global $i,$f,$fare,$f1;
			$curs[$i]=trim($curs[$i]);
			if($f==0 && strcmp($source,$curs[$i]) ==0)			$f=1;
			if($f==1)		 $fare = $fare + $curf[$i];
			if($f==1 && strcmp($destination,$curs[$i]) ==0)				break;		
		}
		$_SESSION["fare"]=$fare;
		$_SESSION["bus_id"]=$bus_id;
		$_SESSION["user_id"]=$user_id;

				?>
	
		<h1>Voilla!! ride from <?php echo $_SESSION["source"]; ?> to <?php echo $_SESSION["destination"]; ?>     fare = <?php echo $fare; ?></h1>

		<h3 style="display: inline-block;">Number of passengers :</h3>
		<form action="booked.php" method="POST" style="display: inline-block;">
		    <input name="number" style="width: 60px;" data-bind="value: qty()" value="1" type="number" max="6" min="1" name="qty" id="qty" maxlength="6"/>
		    <button name="submit" value="submit" >go</button>
		</form>

		

	</div>
<?php include 'includes/footer.php' ?>



<script src="js/bootstrap.min.js" type="text/css"></script>
