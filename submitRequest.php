<?php
	$servername = "mysql.rideshare.hamwebs.com";
	$username = "waikato";
	$password = "@bGYpRSE5@";
	$dbname = "rideshare_hamwebs";
	$role = $_POST['role'];
	$name = $_SESSION['FULLNAME'];
	if($role == "driver"){
		$driver = $name;
		$passenger = "";
	}
	else if($role == "passenger"){
		$driver = "";
		$passenger = $name;
	}
	else{
		$driver = "";
		$passenger = "";
	}
	$startTime = $_POST['startTime'];
	$endTime = $_POST['endTime'];
	$from = $_POST['from'];
	$to = $_POST['to'];
	$party = $_POST['party'];
	$contact = $_POST['contact'];
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	echo "Connected successfully";
	$sql = "INSERT INTO Rides (driver_name, passenger_name, ride_type, leave_time, pickup_time, current_location, destination, party, contact) VALUES ($driver, $passenger, $role, $startTime, $endTime, $from, $to, $party, $contact)";
	if(mysqli_query($conn, $sql)) {
		echo "New record created successfully";
	}
	else{
		echo "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
	echo "<script>window.location.replace("https://www.rideshare.hamwebs.com/main.php");</script>";
?>
