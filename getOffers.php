<?php
$servername = "mysql.rideshare.hamwebs.com";
$username = "waikato";
$password = "@bGYpRSE5@";
$dbname = "rideshare_hamwebs";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  //set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$query = "select * from rides";

	$result = $conn->query($query);

  $totalArray = array();

	while($row = $result->fetch()){
			//If table is empty, return -1
			if($row == "") {
				echo -1;
				return;
			}
			else {
				//Return the details of the ride offers
				$offerData = array("driver_name"=>$row['driver_name'], "passenger_name"=>$row['passenger_name'], "ride_type"=>$row['ride_type'], "leave_time"=>$row['leave_time'],
				"pickup_time"=>$row['pickup_time'], "current_location"=>$row['current_location'], "destination"=>$row['destination']);
        array_push($totalArray, $offerData);
			}
	}
  echo json_encode($totalArray);
	return;
}
catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}