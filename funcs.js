//Gets offers when page loads
document.addEventListener("DOMContentLoaded", getOffers());
//Re-runs getOffers every 30 seconds
setInterval(function(){getOffers()}, 30000)

function confirmHealth() {
  if(document.getElementById("yes").checked) {
    window.location.href = "main.html";
  }
  else {
    var div = document.getElementById("health");
    div.innerHTML = "";
    var reply = document.createElement("p");
    reply.innerHTML = "We're sorry, but you can only use our Ride Sharing if you are healthy enough to do so, for your own and all our users safety and well-being.";
    div.append(reply);
  }
}

function getOffers() {
  var ridesDiv = document.getElementById("ridesContainer");
  if (ridesDiv.innerHTML != "") {
    ridesDiv.innerHTML = "";
  }
  var url = "getOffers.php";
  var data = "";
  ajaxRequest("GET", url, data, displayOffers);
}

//This is the ajaxRequest object that handles requests asynchronously
function ajaxRequest(method, url, data, callback) {

  let request = new XMLHttpRequest();
  request.open(method, url, true);

  if(method == "POST") {
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  }

  request.onreadystatechange = function(){
    if (request.readyState == 4) {
      if(request.status == 200) {
        response = request.responseText;
        callback(response);
      } else {
        alert("Error in Ajax Request");
      }
    }
  };
  request.send(data);
}

function displayOffers(response) {
  var responseArray = JSON.parse(response);
  var ridesContainerDiv = document.getElementById("ridesContainer");

  //Sorts array of ride by lowest leave time
  responseArray.sort(function(a, b) {
      return a.leave_time.localeCompare(b.leave_time);
    }
  );

  for(var i = 0; i < responseArray.length; i++) {
    var specArray = responseArray[i];

    //Gets values from JSON array and puts them into variables
    var driver_name = specArray.driver_name;
    var passenger_name = specArray.passenger_name;
    var ride_type = specArray.ride_type;
    var leave_time = specArray.leave_time;
    var pickup_time = specArray.pickup_time;
    var current_location = specArray.current_location;
    var destination = specArray.destination;

    var rideDiv = document.createElement("div");
    //If ride_type is passenger, give it the class of requestDiv
    if(ride_type == "Passenger") {
      rideDiv.classList = "requestDiv";
    }
    //Else the ride_type is therefore an offer, so give it the class of offerDiv
    else {
      rideDiv.classList = "offerDiv";
    }

    var output1 = document.createElement("p");
    var textNode1 = document.createTextNode("Driver: " + driver_name);
    var output2 = document.createElement("p");
    var textNode2 = document.createTextNode("Passenger: " + passenger_name);
    var output3 = document.createElement("p");
    var textNode3 = document.createTextNode("Ride Type: " + ride_type);
    var output4 = document.createElement("p");
    var textNode4 = document.createTextNode("Leave Time: " + leave_time);
    var output5 = document.createElement("p");
    var textNode5 = document.createTextNode("Pickup Time: " + pickup_time);
    var output6 = document.createElement("p");
    var textNode6 = document.createTextNode("Current Location: " + current_location);
    var output7 = document.createElement("p");
    var textNode7 = document.createTextNode("Destination: " + destination);
    output1.appendChild(textNode1);
    output2.appendChild(textNode2);
    output3.appendChild(textNode3);
    output4.appendChild(textNode4);
    output5.appendChild(textNode5);
    output6.appendChild(textNode6);
    output7.appendChild(textNode7);
    rideDiv.appendChild(output1);
    rideDiv.appendChild(output2);
    rideDiv.appendChild(output3);
    rideDiv.appendChild(output4);
    rideDiv.appendChild(output5);
    rideDiv.appendChild(output6);
    rideDiv.appendChild(output7);

    ridesContainerDiv.appendChild(rideDiv);
  }
}
