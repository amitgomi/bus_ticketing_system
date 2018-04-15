<?php 
	session_start();
	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["admin_islogin"]=0;
?>

	<div class="container" style="margin-top: 70px; margin-bottom: 40px;">
		<?php
		if(isset($_POST["submit"])){
			$bus_no = $_POST["bus_no"];
			$driver_name = $_POST["driver_name"];
			$total_seats = $_POST["total_seats"];
			$intermediate_station = $_POST["st00"];
			$intermediate_price = "0";
			$time = $_POST["stt00"];
			$time = date("g:i a", strtotime($time));
			$intermediate_time = $time;
			$num = $_POST["st_num"];
			for($i = 1;$i<=$num;$i++){
				$intermediate_station = $intermediate_station.",". $_POST["st0".$i];
				$intermediate_price = $intermediate_price.",".$_POST["stf0".$i];
				$time = $_POST["stt0".$i];
				$time = date("g:i a", strtotime($time));
				$intermediate_time = $intermediate_time.",".$time;
			}
			$intermediate_station = $intermediate_station.",". $_POST["st0d"];
			$intermediate_price = $intermediate_price.",".$_POST["stf0d"];
			$time = $_POST["stt0d"];
			$time = date("g:i a", strtotime($time));
			$intermediate_time = $intermediate_time.",".$time;

			$intermediate_station = strtolower($intermediate_station);
			$query = "INSERT INTO bus (bus_no,driver_name,total_seats,intermediate_station,intermediate_time,intermediate_price,photo) VALUES ('$bus_no','$driver_name',$total_seats,'$intermediate_station','$intermediate_time','$intermediate_price','$bus_no')";
			$connection = mysqli_connect("localhost",'root','','mybus');
			if(!$connection) {
				die("Unable to connect" . mysqli_error($connection));
			}
			$res = mysqli_query($connection,$query);
			if($res){
				echo "<h1>Bus added</h1>";
			}
			else{
				echo "<h1>Bus not added</h1>";
			}

		}
		else{
			echo "you should not be here.";
		}
		?>
		<a href="bus.php"><h1>Add more buses</h1></a>
	</div>
<?php include 'includes/footer.php' ?>




<script src="js/bootstrap.min.js" type="text/css"></script>
