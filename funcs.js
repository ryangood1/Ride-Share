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
