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
  var healthDiv = document.getElementById("ridesContainer");
  healthDiv.innerHTML = "";
  var url = "getOffers.php";
  ajaxRequest("GET", url, displayOffers);
}

//This is the ajaxRequest object that handles requests asynchronously
function ajaxRequest(method, url, callback) {

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
        alert("Error");
      }
    }
  };
  request.send();
}

function displayOffers(response) {
  //If the response is -1, then the "Rides" database is empty
  var healthDiv = document.getElementById("ridesContainer");
  if(response == -1) {
    var reply = document.createElement("p").innerHTML = "There are not current offers at this time";
    healthDiv.appendChild(reply);
  }
  else {
    var output = document.createElement("p").innerHTML = response;
    healthDiv.appendChild(output);
  }
}
