<!DOCTYPE html>
<html>
<head>
    <title>Users details</title>
    <style>
        .detailProfile{
            margin-left: auto;
            margin-right: auto;
            text-align:center;
            max-width: 720px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20px;
            border-radius: 6%;
        }
        #map{
            height: 450px;
            width: 650px;
            border-radius: 6%;
            object-fit: cover;
            margin: 0 auto 20px auto;
            display: block;
        }
    </style>
</head>

<body>
    <h1>Detail Page</h1>

    <div class="detailProfile">
    <?php
    $conn=mysqli_connect('mysql.rideshare.hamwebs.com', 'waikato','@bGYpRSE5@', 'rideshare_hamwebs'); 
    $name= "John Smith";
    // $query="SELECT * FROM `users` WHERE name= '$name';
    $query="SELECT * FROM `rides` WHERE driver_name= '$name'";

    $result= mysqli_query($conn,$query);
    while ($row=mysqli_fetch_array($result)){
        echo "".$row["driver_name"]."<br><br>Role: ".$row["ride_type"]."<br>Party Number: ".$row["party_number"]."<br>"
        ."Time to Leave: ".$row["leave_time"]."<br>Starting Place: ".$row["current_location"]."<br>Contact Number: ".$row["contact_number"]."";
        //try:
        $latStart=$row["locationLatitudeStart"];
        $lngStart=$row["locationLongitudeStart"];
        $latEnd=$row["locationLatitudeEnd"];
        $lngEnd=$row["locationLongitudeEnd"];
        }
    ?>
    
    <br><br>

    <div id="map"></div>
    <!-- End of the user detail container -->
    </div>      

<script>
    function initMap(){
        var locationStart = {lat: <?php echo $latStart; ?>, lng: <?php echo $lngStart; ?>};
        var locationEnd = {lat: <?php echo $latEnd; ?>, lng: <?php echo $lngEnd; ?>};


        var map = new google.maps.Map(document.getElementById("map"), {   
            zoom: 13.1, 
            center: locationStart
        });


        var marker1= new google.maps.Marker({
            position: locationStart,
            icon: {
                url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"
            },
            map:map,
            title: "Start",
            label: { color: '#C70E2', fontWeight: 'bold', fontSize: '10px', text: 'Start' },
            animation: google.maps.Animation.BOUNCE,
        });

        var marker2= new google.maps.Marker({
            position: locationEnd,
            icon: {
                url: "http://maps.google.com/mapfiles/ms/icons/red-dot.png"
            },
            title: "End",
            label: { color: '#C70E2', fontWeight: 'bold', fontSize: '10px', text: 'End' },
            animation: google.maps.Animation.BOUNCE,
            map:map
        });


    }
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- The jQuery is used to trigger event handler -->
<!-- <script src="jquery-3.5.1.min.js"></script> -->
<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzhowL429CDpRvkkpJoHdHAXm0PcMSSQc&callback=initMap"></script> -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBzhowL429CDpRvkkpJoHdHAXm0PcMSSQc&callback=initMap"></script>
</body>
</html>

