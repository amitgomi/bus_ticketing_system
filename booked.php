<?php 
	session_start();
	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["islogin"]=0;
?>
	<div class="container" style="margin-top: 40px; margin-bottom: 40px">


	</div>

<?php 
if(($_SESSION["islogin"]==1) && $_POST && isset($_POST['number'])){
	$number = $_POST["number"];
	//$date = $_POST["date"];
	$fare=$_SESSION["fare"];
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
        echo "Hey!! Thats nice. You booked a ticket with MyBus.";
    } else {
        echo "Something's not right.  No ticket was booked";
    }
}
?>
<?php include 'includes/footer.php' ?>



<script src="js/bootstrap.min.js" type="text/css"></script>
