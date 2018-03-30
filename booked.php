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
if($_POST && isset($_POST['number'])){
	$number = $_POST["number"];
	$fare=$_SESSION["fare"];
	$bus_id=$_SESSION["bus_id"];
	$user_id=$_SESSION["user_id"];
	$source=$_SESSION["source"] ;
	$destination=$_SESSION["destination"];	
	$time = "00:00";
	$ticket_id = 1;

	$query = "INSERT INTO `ticket` (`ticket_id`, `user_id`, `bus_id`, `source`, `destination`, `price`, `time_of_booking`, `no_of_passenger`) VALUES (NULL, '".$user_id."', '".$bus_id."', '".$source."', '".$destination."', '".$fare."', '".$time."', '".$number."')";
	// $query = "INSERT INTO ticket (user_id, bus_id, source, destination, price, time_of_booking, no_of_passenger) VALUES ('$user_id', '$bus_id', '$source', '$destination', '$fare' ,'$time', '$number') ";
	
    $result = mysqli_query($connection,$query);




    if($result) {
        echo "Hey!! Thats nice. You booked a ticket with MyBus.";
    } else {
        echo "Something's not right.  No ticket was booked";
    }
}
?>
<?php include 'includes/footer.php' ?>



<script src="js/bootstrap.min.js" type="text/css"></script>
