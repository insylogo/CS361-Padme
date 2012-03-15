</head>
<body>
<div style="text-align:center;">
<h1>Padme's Course Planner</h1>
<h3 style="margin-top: 100px;">Select a Subject:</h3><br />
<form action="" method="get">
	<input type="hidden" name="page" value="calendar" />
	
	<select name="subject">
<?php
mysql_select_db("gibsonro-db", $con);

$result = mysql_query("SELECT DISTINCT (`subject`)
FROM class_information
WHERE (`class_information`.`year` =2012) AND (`class_information`.`term`='Sprin')");


while($row = mysql_fetch_array($result)) {
	echo "<option value=".$row['subject'].">".$row['subject']."</option>";
	
}
?>
</select>
<div>
	<label style="display:inline;" for="showall">Show all courses:</label> <input style="display:inline;" type="checkbox" id="showall" name="showall" value="true" /> 
</div>
<input type="submit" value="Search"/>


</form>
</div>