<style type='text/css'>

	body {
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		margin: 0;
	}
	
	h1 {
		margin: 0 0 1em;
		padding: 0.5em;
	}
	
	p.description {
		font-size: 0.8em;
		padding: 1em;
		position: absolute;
		top: 3.2em;
		margin-right: 400px;
	}
	
	#message {
		font-size: 0.7em;
		position: absolute;
		top: 1em; 
		right: 1em;
		width: 350px;
		display: none;
		padding: 1em;
		background: #ffc;
		border: 1px solid #dda;
	}
	
</style>
    <!--
	<link rel='stylesheet' type='text/css' href='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/themes/base/jquery-ui.css' />
	-->

    <link rel='stylesheet' type='text/css' href='css/smoothness/jquery-ui-1.8.11.custom.css' />


	<link rel='stylesheet' type='text/css' href='css/jquery.weekcalendar.css' />


	   <!--
	<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js'></script>
    <script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js'></script>
    -->

   <script type='text/javascript' src='js/jquery-1.4.4.min.js'></script>
    <script type='text/javascript' src='js/jquery-ui-1.8.11.custom.min.js'></script>
	<script type="text/javascript" src="js/date.js"></script>
	<script type='text/javascript' src='js/jquery.weekcalendar.js'></script>
<script type='text/javascript'>

 
	var year = new Date().getFullYear();
	var month = new Date().getMonth();
	var day = new Date().getDate();

	var eventData = {
		events : [
<?php
mysql_select_db("Oregon_State", $con);

$result = mysql_query("SELECT *
FROM class_information
WHERE (`class_information`.`year` =2012) AND (`class_information`.`term`='Sprin')
AND (`class_information`.`subject`='CS')");

while($row = mysql_fetch_array($result))
  {
  $crn = $row['crn'];
  $year = $row['year'];
  $start_hour = $row['start_time'] % 100;
  $start_minute = $row['start_time'] / 100; 
  $end_hour = $row['end_time'] % 100;
  $end_minute = $row['end_time'] / 100;
  $subject = $row['subject'];
  $course = $row['course_num'];
  
  
  if ($row['days'] == 'MW') {
  	for ($i = 2; i < 30; $i += 2) {
  		if ($i % 7 + 1 >= 2 && $i % 7 + 1 < 5) {
  			echo "{'id':$crn, 'start': new Date($year, april, ";
  			echo $i;
  			echo ", $start_hour, $start_minute), 'end': new Date($year, April, $i, $end_hour, $end_minute),'title':'Lunch with Mike'},";
  		}
  		
  	}
  }
  elseif ($rows['days'] == 'MWF') {
  	for ($i = 2; i < 30; $i += 2) {
  		if ($i % 7 + 1 >= 2) {
  			echo "{'id':$crn, 'start': new Date($year, april, ";
  			echo $i;
  			echo ", $start_hour, $start_minute), 'end': new Date($year, April, $i, $end_hour, $end_minute),'title':'Lunch with Mike'},";
  		}
  		
  	}
  }
  elseif ($rows['days'] == 'TR') {
  	for ($i = 3; i < 30; $i += 2) {
  		if ($i % 7 + 1 >= 3 && $i % 7 + 1 < 6) {
  			echo "{'id':$crn, 'start': new Date($year, april, ";
  			echo $i;
  			echo ", $start_hour, $start_minute), 'end': new Date($year, April, $i, $end_hour, $end_minute),'title':'Lunch with Mike'},";
  		}
  		
  	}
  
  }
?>	
		]
	};

<!--
   {"id":1, "start": new Date(year, month, day, 12), "end": new Date(year, month, day, 13, 35),"title":"Lunch with Mike"},
   {"id":2, "start": new Date(year, month, day, 14), "end": new Date(year, month, day, 14, 45),"title":"Dev Meeting"},
   {"id":3, "start": new Date(year, month, day + 1, 18), "end": new Date(year, month, day + 1, 18, 45),"title":"Hair cut"},
   {"id":4, "start": new Date(year, month, day - 1, 8), "end": new Date(year, month, day - 1, 9, 30),"title":"Team breakfast"},
   {"id":5, "start": new Date(year, month, day + 1, 14), "end": new Date(year, month, day + 1, 16),"title":"Product showcase"},
   {"id":5, "start": new Date(year, month, day + 1, 15), "end": new Date(year, month, day + 1, 17),"title":"Overlay event"}
   -->
	   
	$(document).ready(function() {

		$('#calendar').weekCalendar({
			timeslotsPerHour: 6,
			allowCalEventOverlap: true,
			overlapEventsSeparate: true,
			totalEventsWidthPercentInOneColumn : 95,

			height: function($calendar){
				return $(window).height() - $("h1").outerHeight(true);
			},
			eventRender : function(calEvent, $event) {
				if(calEvent.end.getTime() < new Date().getTime()) {
					$event.css("backgroundColor", "#aaa");
					$event.find(".time").css({"backgroundColor": "#999", "border":"1px solid #888"});
				}
			},
			eventNew : function(calEvent, $event) {
				displayMessage("<strong>Added event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
				alert("You've added a new event. You would capture this event, add the logic for creating a new event with your own fields, data and whatever backend persistence you require.");
			},
			eventDrop : function(calEvent, $event) {
				displayMessage("<strong>Moved Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			eventResize : function(calEvent, $event) {
				displayMessage("<strong>Resized Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			eventClick : function(calEvent, $event) {
				displayMessage("<strong>Clicked Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			eventMouseover : function(calEvent, $event) {
				displayMessage("<strong>Mouseover Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			eventMouseout : function(calEvent, $event) {
				displayMessage("<strong>Mouseout Event</strong><br/>Start: " + calEvent.start + "<br/>End: " + calEvent.end);
			},
			noEvents : function() {
				displayMessage("There are no events for this week");
			},
			data:eventData
		});

		function displayMessage(message) {
			$("#message").html(message).fadeIn();
		}

		$("<div id=\"message\" class=\"ui-corner-all\"></div>").prependTo($("body"));
		
	});

</script>
</head>
<body>
		
	<div id='calendar'></div>
	
</body>
</html>