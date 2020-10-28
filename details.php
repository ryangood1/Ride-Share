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

    #preparing coordinates
    // $latitudes=array();
    // $longitudes=array();
    // $coordinates=array();

    // if($conn->connect_error){
    //     die("Connection failed:".$conn->connect_error);

    
    //  $sql="SELECT name,role,party_number, locationLatitude, locationLongitude from users";

    
    $name= "John Smith";
    // $query="SELECT * FROM `users` WHERE name= '$name';
    $query="SELECT * FROM `rides` WHERE driver_name= '$name'";

//  $result=$conn->query($sql);

    $result= mysqli_query($conn,$query);
    while ($row=mysqli_fetch_array($result)){
        echo "".$row["driver_name"]."<br><br>Role:".$row["ride_type"]."<br>Party Number:".$row["party_number"]."<br>"
        ."Time to Leave:".$row["leave_time"]."<br>Starting Place".$row["current_location"]."<br>Contact Number:".$row["contact_number"]."";


        //try:
        $latStart=$row["locationLatitudeStart"];
        $lngStart=$row["locationLongitudeStart"];
        $latEnd=$row["locationLatitudeEnd"];
        $lngEnd=$row["locationLongitudeEnd"];




        //tryend.



        }
    // }
    

    // if($result->num_rows>0){
    //     while ($row=$result->fetch_assoc()){


            
            //$latitudes[]=$row['locationLatitude'];
            //$longitudes[]=$row['locationLongitude'];
            //$coordinates[]="new google.maps.Latlng(" .$row['locationLatitude'].",". $row['locationLongitude']."),";

            

        //     echo "<tr><td>".$row["name"]."</td><td>".$row["role"]."</td><td>".$row["party_number"]."</td></tr>";

        // }
        //remove the comaa ',' from last coordinate
	    // $lastcount = count($coordinates)-1;
	    // $coordinates[$lastcount] = trim($coordinates[$lastcount], ",");	
        // echo"</table>";
    
    // else{
    //     echo "0 results";
    // }
    // $conn->close();
    // }
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
                url: "http://maps.google.com/mapfiles/ms/icons/yellow-dot.png"
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


<script>
    var searchInput ='search_input';

    $(document).ready(function(){
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)),{
            types:['geocode']
        });

        google.maps.event.addListener(autocomplete, 'place_changed',function(){
            var near_place=autocomplete.getPlace();
            document.getElementById('latitude_input').value=near_place.geometry.location.lat();
            document.getElementById('longitude_input').value=near_place.geometry.location.lng();
            
            document.getElementById('latitude_view').innerHTML=near_place.geometry.location.lat();
            document.getElementById('longitude_view').innerHTML=near_place.geometry.location.lng();
        
        
        
        });
    });

    // $(document).on('change', '#'+searchInput, function(){
    //     document.getElementById('latitude_input').value='';
    //     document.getElementById('longitude_input').value='';
    //     document.getElementById('latitude_view').innerHTML='';
    //     document.getElementById('longitude_view').innerHTML='';
        
    // });

</script>


<div class="container">
    <div class="form-group">
        <label>Type your address:</label>
        <input type="text" class="form-control" id="search_input" placeholder="type address..."/>
        <input type="hidden" id="latittude_input"/>
        <input type="hidden" id="longitude_input"/>
    </div>
</div>

<div class="latlong-view">
    <p><b>Latitude:</b><span id="latitude_view"></span></p>
    <p><b>Longitude:</b><span id="longitude_view"></span></p>
</div>



</body>
</html>

