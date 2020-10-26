<!DOCTYPE html>
<html>
<head>
    <title>
        Users details
    </title>
    <style>

        #map{
            height: 400px;
            width: 400px;
        }
    </style>
</head>

<body>
    <h1>Detail</h1>
    <table>
        <tr>
            <th>Name:</th>
            <th>Role:</th>
            <th>Party Number:</th>
            <th>Time to Leave:</th>
            <th>Home address</th>          
            <th>E-mail:</th>
            <th>Contact Number:</th>
            <th>Comments:</th>
        </tr>

    <?php
    $conn=mysqli_connect('mysql.rideshare.hamwebs.com', 'waikato','@bGYpRSE5@', 'rideshare_hamwebs');

    #preparing coordinates
    // $latitudes=array();
    // $longitudes=array();
    // $coordinates=array();

    // if($conn->connect_error){
    //     die("Connection failed:".$conn->connect_error);

    
    //  $sql="SELECT name,role,party_number, locationLatitude, locationLongitude from users";
     $query="SELECT * from `users`";
    //  $result=$conn->query($sql);
    $result= mysqli_query($conn,$query);
    while ($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row["name"]."</td><td>".$row["role"]."</td><td>".$row["party_number"]."</td><td>".$row["time_to_leave"]."</td><td>".$row["home_address"]."</td><td>".$row["email"]."</td><td>".$row["contact_number"]."</td><td>".$row["comments"]."</td></tr>";


        //try:
        $lat=$row["locationLatitude"];
        $lng=$row["locationLongitude"];




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
        

    </table>

    <div id="map">      
    </div>
<script>
    function initMap(){
        var location = {lat: <?php echo $lat; ?>, lng: <?php echo $lng; ?>};
        var map = new google.maps.Map(document.getElementById("map"), {
            zoom: 13.5, 
            center: location
        });
        var marker= new google.maps.Marker({
            position: location,
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

