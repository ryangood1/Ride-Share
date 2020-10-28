<?php
	$servername = "mysql.rideshare.hamwebs.com";
	$username = "waikato";
	$password = "@bGYpRSE5@";
	$dbname = "rideshare_hamwebs";
	$role = $_POST['role'];
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	$party = $_POST['party'];
	$contact = $_POST['contact'];
	session_start();
	$con = mysqli_connect($servername, $username, $password, $dbname);
	if(!$con){
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully.";
	$email = $_SESSION['ue'];
	$sql = "SELECT name FROM user_profile where email="$email";
	$result = mysqli_query($con, $sql);
	if ($result->num_rows == 1){
		while($row = $result->fetch_assoc()){
			$name = $row;
		}
	}
	if($role == "Driver"){
		$driver = $name;
		$passenger = "";
	}
	else{
		$driver = "";
		$passenger = $name;
	}
	$sql = "INSERT INTO rides (driver_name, passenger_name, ride_type, leave_time, pickup_time, current_location, destination, party, contact) VALUES ($driver, $passenger, $role, $startTime, $endTime, $from, $to, $party, $contact)";
	if(mysqli_query($con, $sql)) {
		echo "New record created successfully.";
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	mysqli_close($con);
	echo "<script>window.location.replace("https://www.rideshare.hamwebs.com/main.php");</script>";
?>
