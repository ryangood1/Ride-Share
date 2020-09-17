function confirmHealth() {
  if(document.getElementById("yes").checked == true) {
    window.location.href = "main.html";
  }
  else {
    var div = document.getElementById("health");
    var reply = document.createElement("p");
    reply.innerHTML = "We're sorry, but you should only be Ride Sharing if you are healthy enough to do so, for your own and for all our users safety and well-being.";
    div.append(reply);
  }
}
