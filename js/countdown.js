// Set the date we're counting down to
var countDownDate = new Date("Aug 24, 2020 00:00:00").getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Output the result in an element with id="demo"
  document.getElementById("car1").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s";
  document.getElementById("car2").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s";
  document.getElementById("car3").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s";

  // If the count down is over, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById("car1").innerHTML = "EXPIRED";
    document.getElementById("car2").innerHTML = "EXPIRED";
    document.getElementById("car3").innerHTML = "EXPIRED";
  }
}, 1000);
