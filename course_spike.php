<?php
	include_once("Course.php");

	$courses = array();
	
	$courses[0] = new Course(0x00000001, "mth", 111, "Intro to Algebra", "A fun course", 4, FALSE);
	foreach($courses as $course) {
		print $course->name;		
	}
	
 
?>
