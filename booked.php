<?php 
	session_start();
	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["islogin"]=0;
?>
	<div class="container" style="margin-top: 70px; margin-bottom: 40px">



<?php 
if(($_SESSION["islogin"]==1) && $_POST && isset($_POST['number'])){
	$number = $_POST["number"];
	//$date = $_POST["date"];
	$fare=$_SESSION["fare"] * $number;
	$bus_id=$_SESSION["bus_id"];
	$date=$_SESSION["date"];
	$user_id=$_SESSION["user_id"];
	$source=$_SESSION["source"] ;
	$destination=$_SESSION["destination"];	
	$time = date("Y-m-d h:i:sa")." GMT";
	$ticket_id = 1;
	//echo $date;

	$query = "INSERT INTO `ticket` (`ticket_id`, `user_id`, `bus_id`, `source`, `destination`, `price`, `time_of_booking`, `no_of_passenger`,`date_of_journey`) VALUES (NULL, '".$user_id."', '".$bus_id."', '".$source."', '".$destination."', '".$fare."', '".$time."', '".$number."','$date')";
	$query1 = "UPDATE  seats
			SET     available_seats	 = GREATEST(0, available_seats - $number)
			WHERE   bus_id = $bus_id and date1 = '$date'";
	
    $result = mysqli_query($connection,$query);
    $result1 = mysqli_query($connection,$query1);


    

    if($result && $result1) {
        
        ?>
        <h1>Ticked booked:</h1>
        <div class="container col-md-6" style="border:solid black 2px; border-radius: 8px;margin: 10px; padding:10px;">
		<h1>Your ride <br> From <b><?php echo $_SESSION["source"]; ?></b> <br>To <b><?php echo $_SESSION["destination"]; ?></b>     <br>Fare = <b><?php echo $_SESSION["fare"]; ?></b> per person
			<br>Arrival time <b><?php echo $_SESSION["arrival_time"]; ?></b>
			<br>Destination time <b><?php echo $_SESSION["destination_time"]; ?></b>
			<br> <span>Total fare: <b>Rs.<?php echo $fare; ?></b></span> </h1>
		</div>
        <?php
    } else {
        echo "Something's not right.  No ticket was booked";
    }
}
?>
	</div>
<?php include 'includes/footer.php' ?>



<script src="js/bootstrap.min.js" type="text/css"></script>
