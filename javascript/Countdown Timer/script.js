

var countdownDate = new Date("Apr 20, 2024 00:00:00").getTime();
var x = setInterval(function(){
    var now = new Date().getTime();
    var distance = countdownDate - now;

    var days = Math.floor(distance/(1000*60*60*24));
    var hours = Math.floor((distance % (1000*60*60*24))/(1000*60*60));
    var minutes = Math.floor((distance%(1000*60*60))/(1000*60));
    var seconds = Math.floor((distance%(1000*60))/1000);

    document.getElementById('days').innerHTML = days;
    document.getElementById('hours').innerHTML = hours;
    document.getElementById('mintues').innerHTML = minutes;
    document.getElementById('seconds').innerHTML = seconds;

},1000);