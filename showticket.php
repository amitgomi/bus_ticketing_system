<?php 
	session_start();
	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["islogin"]=0;
?>
	<div class="container" style="margin-top: 70px; margin-bottom: 40px;">
		<?php 
		$cur_date = date("Y-m-d");
		if($_SESSION["islogin"]==0){
			echo "<h1>You must have login first</h1>";
		}
		else{
			$query = "SELECT * FROM ticket WHERE user_id=".$_SESSION["user_id"];

			$res = mysqli_query($connection,$query);
			
		?>

		<h1>Past rides</h1>
		<div class="table-responsive">
		    <table class="table table-hover">
		  		<thead>
		      	<tr>
		        	<th>Ticket id</th>
		        	<th>Bus id</th>
		        	<th>Source</th>
		        	<th>Destination</th>
		        	<th>Fare</th>
		        	<th>Date of journey</th>
		        	<th>Time of booking</th>
		        	<th>No of passengers</th>
		        	
		        </tr>
		    </thead>
		  	<?php
		    while($row = mysqli_fetch_assoc($res)){
		    	if($cur_date <= $row["date_of_journey"])
		    		continue;
		    	$ticket_id = $row["ticket_id"];
				?>
			<tr>
				<td><?php echo $row["ticket_id"]; ?></td>
				<td><?php echo $row["bus_id"]; ?></td>
				<td><?php echo $row["source"]; ?></td>
				<td><?php echo $row["destination"]; ?></td>
				<td><?php echo $row["price"]; ?></td>
				<td><?php echo $row["date_of_journey"]; ?></td>
				<td><?php echo $row["time_of_booking"]; ?></td>
				<td><?php echo $row["no_of_passenger"]; ?></td>
				
			</tr>
				<?php
			}
			?>
		  </table>
		</div> 


		<?php 
	}
		$cur_date = date("Y-m-d");
		if($_SESSION["islogin"]==0){
			echo "<h1>You must have login first</h1>";
		}
		else{
			$query = "SELECT * FROM ticket WHERE user_id=".$_SESSION["user_id"];

			$res = mysqli_query($connection,$query);
		?>
		<h1>Upcomming rides</h1>
		<div class="table-responsive">
		    <table class="table table-hover">
		  		<thead>
		      	<tr>
		        	<th>Ticket id</th>
		        	<th>Bus id</th>
		        	<th>Source</th>
		        	<th>Destination</th>
		        	<th>Fare</th>
		        	<th>Date of journey</th>
		        	<th>Time of booking</th>
		        	<th>No of passengers</th>
		        	<th>Cancel</th>
		        </tr>
		    </thead>
		  	<?php
		    while($row = mysqli_fetch_assoc($res)){
		    	if($cur_date > $row["date_of_journey"])
		    		continue;
		    	$ticket_id = $row["ticket_id"];
				?>
			<tr>
				<td><?php echo $row["ticket_id"]; ?></td>
				<td><?php echo $row["bus_id"]; ?></td>
				<td><?php echo $row["source"]; ?></td>
				<td><?php echo $row["destination"]; ?></td>
				<td><?php echo $row["price"]; ?></td>
				<td><?php echo $row["date_of_journey"]; ?></td>
				<td><?php echo $row["time_of_booking"]; ?></td>
				<td><?php echo $row["no_of_passenger"]; ?></td>
				<td><a href="cancel.php?ticket_id=<?php echo $ticket_id;?>">Cancel</a></td>
			</tr>
				<?php
			}
			?>
		  </table>
		</div> 


		<?php 
		}
		?>
	</div>
<?php include 'includes/footer.php' ?>




<script src="js/bootstrap.min.js" type="text/css"></script>
