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

		
		<form class="form-inline" action="index.php" method="POST">
		    <div class="form-group">
		      <label class="control-label col-sm-3" for="source">Source:</label>
		      <div class="col-sm-10">
		        <input type="text" name="source" class="form-control" id="sorce" placeholder="Enter source" name="email">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-3" for="pwd">Destination:</label>
		      <div class="col-sm-10">          
		        <input type="text" name="destination" class="form-control" id="destination" placeholder="Enter destination" name="pwd">
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
				echo "<h1>Search results:</h1>";
				$source=$_POST['source'];
				$source = trim($source);
				$destination=$_POST['destination'];
				$destination = trim($destination);


				$query = "SELECT * FROM bus WHERE intermediate_station LIKE '%".$source."%".$destination."%'";

				$res = mysqli_query($connection,$query);
				?>
				 <div class="table-responsive">
				  <table class="table table-hover">
				  	<thead>
				      <tr>
				        <th>Bus no.</th>
				        <th>Arival time</th>
				        <th>destination time</th>
				        <th>intermideate stops</th>
				        <th>available seats</th>
				        <th>photo</th>
				      </tr>
				    </thead>
				  	<?php
				    while($row = mysqli_fetch_assoc($res)){
						$bus_no = $row["bus_no"];
						$intermediate_time = $row["intermediate_time"];
						$intermediate_station = $row["intermediate_station"];
						$available_seats = $row["available_seats"];
						$photo = $row["photo"];

						$arival_time="00:00";
						$destination_time="00:00";
						$intermediate_stops="0";
						$i=0;
						$fare = 0;
						$flag = 0;
						$curs = strtok($intermediate_station , ",");
						$curt = strtok($intermediate_time , ",");
						//for($i=0;;$i++){
						//}
					}
					?>
				  </table>
				</div> 
				
		<?php	}
		?>
		
	</div>
<?php include 'includes/footer.php' ?>



<script src="js/bootstrap.min.js" type="text/css"></script>
