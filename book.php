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
		if(($_SESSION["islogin"]==1)){
		$bus_id=$_GET["bus_id"];
		$user_id=$_SESSION["user_id"];
		$source=$_SESSION["source"] ;
		$date=$_SESSION["date"] ;
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

		<?php 
		//$query = "SELECT available_seats FROM bus WHERE   bus_id = $bus_id";
		$query = "SELECT * FROM seats WHERE bus_id = $bus_id and date1 = '$date'";
	
    	$result = mysqli_query($connection,$query);
    	if(!$result)
    		echo "query not working";
    	$row = mysqli_fetch_assoc($result);
    	$max_seat = $row["available_seats"];
		?>
		<form action="booked.php" method="POST" style="display: inline-block;">
		<h3 style="display: inline-block;">Number of passengers :</h3>
		    <input name="number" style="width: 60px;" data-bind="value: qty()" value="1" type="number" max="<?php echo $max_seat;?>" min="1"  maxlength="6"/>
		    <br>

		    <button name="submit" value="submit" >go</button>
		</form>
		<?php
		}
		else
			echo "<h1 style=\"margin-top:40px;\">You are not logged in</h1>";
		?>

		

	</div>
<?php include 'includes/footer.php' ?>



<script src="js/bootstrap.min.js" type="text/css"></script>
