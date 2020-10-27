<?php

$con = mysqli_connect('mysql.rideshare.hamwebs.com','waikato','@bGYpRSE5@','rideshare_hamwebs');

// if($con){
//     echo 'Successfully connected';
// } else {
//     die('Error');
// }

// Check connection

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

?>