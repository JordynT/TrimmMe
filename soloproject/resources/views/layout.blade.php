<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>TrimmMe</title>
	<link rel="stylesheet" href="http://necolas.github.io/normalize.css/3.0.2/normalize.css">
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<script src="{{ URL::asset('./bower_components/jquery-knob/js/jquery.knob.js') }}"></script>
	<script src="{{ URL::asset('./js/main.js') }}"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0/handlebars.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>



	 <input type="text" class="dial" data-min="0" data-max="255" data-fgColor="#66CC66" data-angleOffset=-125 data-angleArc=250>	
<script>
$(function() {
// var sendApiRequest = function(v) {
// console.log('foo ' + v);
// $.post("https://api.spark.io/v1/devices/Core3/turnTo", {access_token: "26060875af3c6fb3a8985e25329c5cade8d23505", arg: v}); //Dummy access token
// };
var _timer = null,
lastValue = 0,
minDelta = 10;
var onChange = function(v) {
if (_timer) {
clearTimeout(_timer);
}
if (Math.abs(v - lastValue) > minDelta) {
lastValue = v;
sendApiRequest(v);
return;
}

_timer = setTimeout(function() { 
lastValue = v;
sendApiRequest(v)
}, 50);
};
   	$(".dial").knob(
   	{'change':  onChange
});
});
</script>
	
 
