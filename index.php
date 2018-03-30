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
				$_SESSION["source"] =$source;
				$destination=$_POST['destination'];
				$destination = trim($destination);
				$_SESSION["destination"]=$destination;


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
						$available_seats = $row["available_seats"];
						$photo = $row["photo"];

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
				
		<?php	}
		?>
		
	</div>
<?php include 'includes/footer.php' ?>




<script src="js/bootstrap.min.js" type="text/css"></script>
