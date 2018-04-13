<?php
	function Redirect($url, $permanent = false)
	{
	    if (headers_sent() === false)
	    {
	        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
	    }

	    exit();
	}

	session_start();

 	$ticket_id = $_GET['ticket_id'];

	if($_SESSION["islogin"]==1){
		$connection = mysqli_connect("localhost",'root','','mybus');
		if(!$connection) {
			die("Unable to connect" . mysqli_error($connection));
		}
		$query = "SELECT * FROM ticket WHERE ticket_id = $ticket_id";
		$result0 = mysqli_query($connection,$query);
		$row = mysqli_fetch_assoc($result0);
		$number = $row["no_of_passenger"];
		$bus_id = $row["bus_id"];
		$user_id = $row["user_id"];
		$date = $row["date_of_journey"];

		
		$query = "DELETE FROM ticket WHERE ticket_id = $ticket_id";
		$query1 = "UPDATE  seats
			SET     available_seats	 =  available_seats + $number
			WHERE   bus_id = $bus_id and date1 = '$date'";

		if($_SESSION["user_id"]==$user_id){
			$result = mysqli_query($connection,$query);
			$result1 = mysqli_query($connection,$query1);
		}
		// if($result0){
		// 	echo "right0";
		// }
		// else{
		// 	echo "wrong0";
		// }
		// if($result1){
		// 	echo "right1";
		// }
		// else{
		// 	echo "wrong1";
		// }
		if($result){
			Redirect('showticket.php', false);
			//echo "right";
		}
		else{
			//echo "wrong";
			//echo "fail";
			Redirect('showticket.php', false);
		}
	}

?>