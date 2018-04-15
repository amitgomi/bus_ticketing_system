<?php 
	session_start();
	include 'includes/vars.php';

	include 'includes/header.php';
	include 'includes/nav_bar.php';
	include 'includes/conn.php';
	//$_SESSION["admin_islogin"]=0;
?>

	<div class="container" style="margin-top: 70px; margin-bottom: 40px;">

		<form name="form1" style="padding-left: 25%;" action="add_bus.php" method="POST" onsubmit="return required()">
			<input type="text" style="display: none;" name="st_num" id="st_num" value="0">
			<div class="form-group">
			    <label >Bus number:</label>
			    <br>
			    <input type="text" class="form-control " name="bus_no" style=" width: 70%;" id="bus_no" placeholder="Bus number" >
			    <small class="form-text text-muted text-danger" id="bus_no_alert" style="display: none;">Bus no can not be empty</small>
			</div>
			<div class="form-group">
			    <label >Driver name</label>
			    <br>
			    <input type="text" class="form-control " style=" width: 70%;" name="driver_name" placeholder="Driver name" >
			    <small class="form-text text-muted text-danger" id="driver_alert" style="display: none;">Driver name can not be empty</small>
			</div>
			<div class="form-group">
			    <label >Total seats in bus:</label>
			    <br>
			    <input type="number" class="form-control " style=" width: 70%;" name="total_seats" placeholder="Total seats"  min="1" max="100" value="30">
			    <small class="form-text text-muted text-danger" id="total_seat_alert" style="display: none;">Total seats can not be empty</small>
			</div>
			<div class="form-group">
			    <label >Source station:</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 22%;" name="st00" placeholder="Station name" >
				<input type="time" class="form-control" name="stt00" style="display: inline-block; margin-left: 20px; width: 22%;" >
				<small class="form-text text-muted text-danger" id="source_alert" style="display: none;">Source station or time can not be empty</small>
			</div>

			<label > Intermediate Stations:</label>
			<div id="int_station" class="form-group">




			<div class="form-group" id="std01"style="display: none;">
			    <label >Intermediate station 1</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 22%;" name="st01" placeholder="Intermediate station 1" >
				<input type="time" class="form-control" name="stt01" style="display: inline-block; margin-left: 20px; width: 22%;" >
				<input type="number" class="form-control" name="stf01" style="display: inline-block; margin-left: 20px; width: 20%;" placeholder="Fare" >
				<small class="form-text text-muted text-danger" id="int01_alert" style="display: none;">Station name, time or fare can not be empty</small>
			</div>
			<div class="form-group" id="std02"style="display: none;">
			    <label >Intermediate station 2</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 22%;" name="st02" placeholder="Intermediate station 2" >
				<input type="time" class="form-control" name="stt02" style="display: inline-block; margin-left: 20px; width: 22%;" >
				<input type="number" class="form-control" name="stf02" style="display: inline-block; margin-left: 20px; width: 20%;" placeholder="Fare" >
				<small class="form-text text-muted text-danger" id="int02_alert" style="display: none;">Station name, time or fare can not be empty</small>
			</div>
			<div class="form-group" id="std03"style="display: none;">
			    <label >Intermediate station 3</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 22%;" name="st03" placeholder="Intermediate station 3" >
				<input type="time" class="form-control" name="stt03" style="display: inline-block; margin-left: 20px; width: 22%;" >
				<input type="number" class="form-control" name="stf03" style="display: inline-block; margin-left: 20px; width: 20%;" placeholder="Fare" >
				<small class="form-text text-muted text-danger" id="int03_alert" style="display: none;">Station name, time or fare can not be empty</small>
			</div>
			<div class="form-group" id="std04"style="display: none;">
			    <label >Intermediate station 4</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 22%;" name="st04" placeholder="Intermediate station 4" >
				<input type="time" class="form-control" name="stt04" style="display: inline-block; margin-left: 20px; width: 22%;" >
				<input type="number" class="form-control" name="stf04" style="display: inline-block; margin-left: 20px; width: 20%;" placeholder="Fare" >
				<small class="form-text text-muted text-danger" id="int04_alert" style="display: none;">Station name, time or fare can not be empty</small>
			</div>
			<div class="form-group" id="std05"style="display: none;">
			    <label >Intermediate station 5</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 22%;" name="st05" placeholder="Intermediate station 5" >
				<input type="time" class="form-control" name="stt05" style="display: inline-block; margin-left: 20px; width: 22%;" >
				<input type="number" class="form-control" name="stf05" style="display: inline-block; margin-left: 20px; width: 20%;" placeholder="Fare" >
				<small class="form-text text-muted text-danger" id="int05_alert" style="display: none;">Station name, time or fare can not be empty</small>
			</div>
			<div class="form-group" id="std06"style="display: none;">
			    <label >Intermediate station 6</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 22%;" name="st06" placeholder="Intermediate station 6" >
				<input type="time" class="form-control" name="stt06" style="display: inline-block; margin-left: 20px; width: 22%;" >
				<input type="number" class="form-control" name="stf06" style="display: inline-block; margin-left: 20px; width: 20%;" placeholder="Fare" >
				<small class="form-text text-muted text-danger" id="int06_alert" style="display: none;">Station name, time or fare can not be empty</small>
			</div>
			<div class="form-group" id="std07"style="display: none;">
			    <label >Intermediate station 7</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 22%;" name="st07" placeholder="Intermediate station 7" >
				<input type="time" class="form-control" name="stt07" style="display: inline-block; margin-left: 20px; width: 22%;" >
				<input type="number" class="form-control" name="stf07" style="display: inline-block; margin-left: 20px; width: 20%;" placeholder="Fare" >
				<small class="form-text text-muted text-danger" id="int07_alert" style="display: none;">Station name, time or fare can not be empty</small>
			</div>
			<div class="form-group" id="std08"style="display: none;">
			    <label >Intermediate station 8</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 22%;" name="st08" placeholder="Intermediate station 8" >
				<input type="time" class="form-control" name="stt08" style="display: inline-block; margin-left: 20px; width: 22%;" >
				<input type="number" class="form-control" name="stf08" style="display: inline-block; margin-left: 20px; width: 20%;" placeholder="Fare" >
				<small class="form-text text-muted text-danger" id="int08_alert" style="display: none;">Station name, time or fare can not be empty</small>
			</div>
			<div class="form-group" id="std09"style="display: none;">
			    <label >Intermediate station 9</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 22%;" name="st09" placeholder="Intermediate station 9" >
				<input type="time" class="form-control" name="stt09" style="display: inline-block; margin-left: 20px; width: 22%;" >
				<input type="number" class="form-control" name="stf09" style="display: inline-block; margin-left: 20px; width: 20%;" placeholder="Fare" >
				<small class="form-text text-muted text-danger" id="int09_alert" style="display: none;">Station name, time or fare can not be empty</small>
			</div>







			</div>
			<br>
			<button type="button"  id="rem_inter" class="btn mybtn" style="border:1px solid #5d5e60; border-radius: 40px; box-shadow: 0 0px 10px #5d5e60; color:#5d5e60;font-size: 25px; font-weight:100;  padding: 0px; padding-left: 10px;padding-right: 10px;" onclick="rem_intermediate()" >-</button>
			<label id="count_intermediate">0</label>
			<button type="button"  id="add_inter" class="btn mybtn" style="border:1px solid #5d5e60; border-radius: 40px; box-shadow: 0 0px 10px #5d5e60; color:#5d5e60;font-size: 25px; font-weight:100;  padding: 0px; padding-left: 10px;padding-right: 10px;" onclick="add_intermediate()" >+</button>

			<div class="form-group">
			    <label >Destination station:</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 22%;" name="st0d" placeholder="Destination name" >
				<input type="time" class="form-control" name="stt0d" style="display: inline-block; margin-left: 20px; width: 22%;" >
				<input type="number" class="form-control" name="stf0d" style="display: inline-block; margin-left: 20px; width: 20%;" placeholder="Fare" >
				<small class="form-text text-muted text-danger" id="int0d_alert" style="display: none;">Station name, time or fare can not be empty</small>
			</div>

			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>

	</div>
<?php include 'includes/footer.php' ?>




<script src="js/bootstrap.min.js" type="text/css"></script>
