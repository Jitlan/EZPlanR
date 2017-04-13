<?php 

	if(!isset($_SESSION['uname']))
		header('LOCATION: login.php');
	else
		$studentID = $_GET['studentID'];
	
	include("includes/db_connection.php");
		$q = "DELETEFROM classes WHERE studentID = '$studentID'"; //deletes a student from a class
	
	$r = $conn->query($q);
	
	if($r===TRUE)
		echo "class".$studentID."removed.";
	else
		echo "Something went wrong.";
?>