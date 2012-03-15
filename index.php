<?php
include_once("header.php");
if ($_GET["page"] == "home") {
	include_once("home.php");
} 
elseif ($_GET["page"] == "calendar") {
	include_once("calendar.php");
} 
else {
	include_once("home.php");
}
include_once("footer.php");
?>