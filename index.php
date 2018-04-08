<?php 
	session_start();
	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["islogin"]=0;
?>
	<div class="back_ground"> </div>
	<div class="back_ground_blur"> </div>
	<div class="container" style="margin-top: 50px; margin-bottom: 40px; height: 500px; opacity: 0.9;">
		<h1 style="padding-left:100px; ">Book your ride!!</h1>
		<?php
		$min_date = date("Y-m-d");
		$max_date = date('Y-m-d', strtotime($min_date. ' + 29 days'))
		?>

		<form  style=" " class="form-inline" action="index.php" method="POST">
		    <div class="form-group">
		      <label class="control-label col-sm-3" for="source">Source:</label>
		      <div class="col-sm-10">
		        <input type="text" name="source" class="form-control" id="source" placeholder="Enter source">
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-3" for="pwd">Destination:</label>
		      <div class="col-sm-10">          
		        <input type="text" name="destination" class="form-control" id="destination" placeholder="Enter destination">
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3" for="source">Date:</label>
		      <div class="col-sm-10">
		        <input type="date" min=<?php echo $min_date;?> max=<?php echo $max_date;?> name="date" class="form-control" id="date" placeholder="dd/mm/yyyy" >
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
				$date=$_POST['date'];
				$_SESSION["date"]=$date;
				//echo $date;
				$source = trim($source);
				$_SESSION["source"] =$source;
				$destination=$_POST['destination'];
				$destination = trim($destination);
				$_SESSION["destination"]=$destination;


				$query = "SELECT * FROM bus WHERE intermediate_station LIKE '%".$source."%".$destination."%'";

				$res = mysqli_query($connection,$query);
				if($date == "0000-00-00"){
					echo "<h1>Select date</h1>";
				}
				else if($source ==""){
					echo "<h1>Enter source</h1>";
				}
				else if($destination == ""){
					echo "<h1>Enter destination</h1>";
				}
				else if(mysqli_num_rows($res)==0){
					echo "<h1>No result found</h1>";
				}
				else{
				?>
				<div class="table-responsive" style="background-color: rgba(206, 228, 229,0.8);">
				    <table class="table table-hover">
				  		<thead>
				      	<tr>
				        	<th>Bus no.</th>
				        	<th>Arival time</th>
				        	<th>destination time</th>
				        	<th>intermediate stops</th>
				        	<th>available seats</th>
				        	<th>fare</th>
				        	<th>photo</th>
				        	<th>Book</th>
				        </tr>
				    </thead>
				  	<?php
				    while($row = mysqli_fetch_assoc($res)){
						$bus_no = $row["bus_no"];
						$bus_id = $row["bus_id"];
						$intermediate_time = $row["intermediate_time"];
						$intermediate_price = $row["intermediate_price"];
						$intermediate_station = $row["intermediate_station"];
						$total_seats = $row["total_seats"];
						$photo = $row["photo"];

						////////////////////available seats
						$query = "SELECT * FROM seats WHERE bus_id = $bus_id and date1 = '$date'";
						$res1 = mysqli_query($connection,$query);
						if($row1 = mysqli_fetch_assoc($res1)){
							$available_seats= $row1["available_seats"];
						}
						else{
							$query = "INSERT INTO seats (bus_id,date1,available_seats) VALUES ($bus_id,'$date',$total_seats)";
							$res1 = mysqli_query($connection,$query);
							$available_seats= $total_seats;
						}


						////////////////////

						$arrival_time="00:00";
						$destination_time="00:00";
						$intermediate_stops="";
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
							if($f==0 && strcmp($source,$curs[$i]) ==0){
								$f=1;
								$arrival_time = $curt[$i];
							}
							if($f==1){
								$fare = $fare + $curf[$i];
							}
							if($f==1 && strcmp($destination,$curs[$i]) ==0){
								$destination_time = $curt[$i];
								break;
							}
							if($f==1){
								if($f1==0){
									$f1=1;
									continue;
								}
								if($f1==1){
									$f1=2;
									$intermediate_stops = $curs[$i];
									continue;
								}
								$intermediate_stops = $intermediate_stops ." , ". $curs[$i];
							}
								
						} ?>
					<tr>
						<td><?php echo $bus_no; ?></td>
						<td><?php echo $arrival_time; ?></td>
						<td><?php echo $destination_time; ?></td>
						<td><?php echo $intermediate_stops; ?></td>
						<td><?php echo $available_seats; ?></td>
						<td><?php echo $fare; ?></td>
						<td><?php echo $bus_no; ?></td>
						<td><?php 
						if($available_seats>0){
							?>
							<a href=<?php echo "book.php?bus_id=".$bus_id."&fare=".$fare; ?> >Book now</a>
							<?php
							} 
						else echo "No seats available"; ?></td>
					</tr>
						<?php
					}
					?>
				  </table>
				</div> 
				
		<?php	} }
		?>
		
	</div>
<?php include 'includes/footer.php' ?>




<script src="js/bootstrap.min.js" type="text/css"></script>
