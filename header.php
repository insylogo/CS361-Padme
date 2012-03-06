<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.weekcalendar.css" />
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8rc3.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery.weekcalendar.js"></script>
<script type="text/javascript">
$(function() {
 	
	$('#calendar').weekCalendar({
		events:[{"id":10182,
		  "start":"2012-03-05T12:15:00.000+10:00",
		  "end":"2012-03-05T13:15:00.000+10:00",
		  "title":"Lunch with Mike"
		}, {
		  "id":10183,
		  "start":"2012-03-05T14:00:00.000+10:00",
		  "end":"2012-03-08T15:00:00.000+10:00",
		  "title":"Dev Meeting"
		    }]
		});
	  
});
	</script>
</head>

<?php



?>

<body>
<div style="text-align: center;"><h1>Padme's Course Planner</h1></div>