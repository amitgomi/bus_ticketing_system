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
		$min_date = date("Y-m-d");
		$max_date = date('Y-m-d', strtotime($min_date. ' + 29 days'))
		?>

		<form  style=" " class="form-inline" action="pas_list.php" method="POST">
		    <div class="form-group">
		      <label class="control-label col-sm-3" for="bus_id">Busid:</label>
		      <div class="col-sm-10">
		        <input type="text" name="bus_id" class="form-control" id="source" placeholder="bus_id">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3" for="source">Date:</label>
		      <div class="col-sm-10">
		        <input type="date" name="date" class="form-control" id="date" placeholder="dd/mm/yyyy" >
		      </div>
		    </div>

		    <div class="form-group">        
		      <div class="col-sm-offset-2 col-sm-10">
		        <button type="submit" name="submit" class="btn btn-primary">Search</button>
		      </div>
		    </div>
		</form>

		<?php
			if(isset($_POST['submit'])){
				$bus_id=$_POST['bus_id'];
				$date=$_POST['date'];
				// if($_SESSION["islogin"]==0){
				// 	echo "<h1>You must have login first</h1>";
				// }
				
					$query = "SELECT * FROM ticket WHERE bus_id=$bus_id AND date_of_journey = '$date'";

					$res = mysqli_query($connection,$query);
					//echo $bus_id.$date;
					// if($res){
					// 	echo "right";
					// }
					// else
					// 	echo "worng";
				?>


				<h1>Rides on bus <?php echo $bus_id." on ".$date; ?></h1>
				<div class="table-responsive">
				    <table class="table table-hover">
				  		<thead>
				      	<tr>
				        	<th>Ticket id</th>
				        	<th>Name of passenger</th>
				        	<th>Source</th>
				        	<th>Destination</th>
				        	<th>Fare</th>
				        	<th>Time of booking</th>
				        	<th>No of passengers</th>
				        	
				        </tr>
				    </thead>
				  	<?php
				    while($row = mysqli_fetch_assoc($res)){
				    	$ticket_id = $row["ticket_id"];
				    	$user_id = $row["user_id"];
				    	$query = "SELECT * FROM user WHERE user_id=$user_id ";

						$result = mysqli_query($connection,$query);
						$row1 = mysqli_fetch_assoc($result);
						?>
					<tr>
						<td><?php echo $row["ticket_id"]; ?></td>
						<td><?php echo $row1["first_name"]." ".$row1["last_name"]; ?></td>
						<td><?php echo $row["source"]; ?></td>
						<td><?php echo $row["destination"]; ?></td>
						<td><?php echo $row["price"]; ?></td>
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
		?>
	</div>
<?php include 'includes/footer.php' ?>




<script src="js/bootstrap.min.js" type="text/css"></script>
