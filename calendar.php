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

if (isset($_GET['subject'])) {
	$subj = $_GET['subject'];
}
else {
	$subj = 'CS';
}

mysql_select_db("gibsonro-db", $con);

$result = mysql_query("SELECT *
FROM class_information
WHERE (`class_information`.`year` =2012) AND (`class_information`.`term`='Sprin')
AND (`class_information`.`subject`='$subj')");

$earliest = 0;
$latest = 0;



while($row = mysql_fetch_array($result))
  {
  $crn = $row['crn'];
  $year = $row['year'];
  $start = date_parse($row['start_time']) ;
  $end = date_parse($row['end_time']);
  if ($earliest == 0 || $start['hour'] < $earliest['hour']) {
  	$earliest = $start;	
  
  }
  
  if ($end['hour'] > $latest['hour']) {
  	$latest = $end;
  	
  }
  $starthour = $start['hour'];
  $startminute = $start['minute']; 
  $endhour = $end['hour'];
  $endminute = $end['minute'];
  $subject = $row['subject'];
  $course = $row['course_num'];
  
  if ($starthour != null) {
	  if ($row['days'] === 'MW') {
	  	for ($i = 2; $i < 30; $i = $i + ($i % 7 < 2?1:2)) {
	  		if ($i % 7 >= 2 && $i % 7 < 6) {
	  			$crn++;
	  			echo "{'id':$crn, 'start': new Date($year, 3, ";
	  			echo $i;
	  			echo ", $starthour, $startminute), 'end': new Date($year, 3, $i, $endhour, $endminute),'title':'$subject $course'},\n";
	  		}
	  		
	  	}
	  } 
	  if ($row['days'] === 'MWF') {
	  	for ($i = 2; $i < 30; $i = $i + ($i % 7 < 2?1:2)) {
	  		if ($i % 7 >= 2) {
	  			$crn++;
	  			echo "{'id':$crn, 'start': new Date($year, 3, ";
	  			echo $i;
	  			echo ", $starthour, $startminute), 'end': new Date($year, 3, $i, $endhour, $endminute),'title':'$subject $course'},\n";
	  		}
	  		
	  	}
	  }
	  if ($row['days'] === 'TR') {
	  	for ($i = 3; $i < 30; $i = $i + ($i % 7 < 2?3:2)) {
	  		if ($i % 7 >= 2 && $i % 7 <= 5) {
	  			$crn++;
	  			echo "{'id':$crn, 'start': new Date($year, 3, ";
	  			echo $i;
	  			echo ", $starthour, $startminute), 'end': new Date($year, 3, $i, $endhour, $endminute),'title':'$subject $course'},\n";
	  		}
	  		
  		}
	  		
  	}
	 
  }
}
?>	
		]
	};

/*
   {"id":1, "start": new Date(year, month, day, 12), "end": new Date(year, month, day, 13, 35),"title":"Lunch with Mike"},
   {"id":2, "start": new Date(year, month, day, 14), "end": new Date(year, month, day, 14, 45),"title":"Dev Meeting"},
   {"id":3, "start": new Date(year, month, day + 1, 18), "end": new Date(year, month, day + 1, 18, 45),"title":"Hair cut"},
   {"id":4, "start": new Date(year, month, day - 1, 8), "end": new Date(year, month, day - 1, 9, 30),"title":"Team breakfast"},
   {"id":5, "start": new Date(year, month, day + 1, 14), "end": new Date(year, month, day + 1, 16),"title":"Product showcase"},
   {"id":5, "start": new Date(year, month, day + 1, 15), "end": new Date(year, month, day + 1, 17),"title":"Overlay event"}
   */
	   
	$(document).ready(function() {

		$('#calendar').weekCalendar({
			timeslotsPerHour: 6,
			allowCalEventOverlap: true,
			overlapEventsSeparate: true,
			totalEventsWidthPercentInOneColumn : 95,
			firstDayOfWeek : 1,
      		businessHours :{start: <?php if (isset($earliest)) {
	echo $earliest['hour'];	

}
else {
echo 6;
} ?>, end: <?php echo $latest['hour']; ?>, limitDisplay: true },
      		daysToShow : 5,
			
			height: function($calendar){
				return $(window).height() - $("h1").outerHeight(true) - 40;
			},
			eventRender : function(calEvent, $event) {
				if(calEvent.end.getTime() < new Date().getTime()) {
					$event.css("backgroundColor", "#aaa");
					$event.find(".time").css({"backgroundColor": "#999", "border":"1px solid #888"});
				}
			},
			data:eventData
		});
		$("#calendar").weekCalendar("gotoWeek", new Date("4/2/2012"));
		function displayMessage(message) {
			$("#message").html(message).fadeIn();
		}

		$("<div id=\"message\" class=\"ui-corner-all\"></div>").prependTo($("body"));
		
	});

</script>
</head>
<body>
<div style="text-align: center; vertical-align: top"><h1>Padme's Course Planner</h1></div>
<div id='calendar'></div>