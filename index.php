<?php
	include_once("Course.php");

	$courses = array();
	
	$courses[0] = new Course("mth", 111, "Intro to Algebra", "A fun course", 4, FALSE);
	
	print $courses[0]->name;
 
?>