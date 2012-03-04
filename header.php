<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.weekcalendar.css" />
	<script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.8rc3.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery.weekcalendar.js"></script>
	<script type="text/javascript">
		$(document).ready(function () { 
			alert("derp");
			 $('#calendar').weekCalendar();
			 
			  $('#calendar').weekCalendar({
			    events:[{"id":10182,
			      "start":"2009-05-03T12:15:00.000+10:00",
			      "end":"2009-05-03T13:15:00.000+10:00",
			      "title":"Lunch with Mike"
			    }, {
			      "id":10182,
			      "start":"2009-05-03T14:00:00.000+10:00",
			      "end":"2009-05-03T15:00:00.000+10:00",
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