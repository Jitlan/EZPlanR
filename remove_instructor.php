<?php 

	if(!isset($_SESSION['uname']))
		header('LOCATION: login.php');
	else
		$instuctorID = $_GET['instuctorID'];
	
	include("includes/db_connection.php");
		$q = "DELETEFROM classes WHERE instuctorID = '$instuctorID'"; //deletes a student from a class
	
	$r = $conn->query($q);
	
	if($r===TRUE)
		echo "class".$instuctorID."removed.";
	else
		echo "Something went wrong.";
?>