
<?php 

	if(!isset($_SESSION['uname']))
		header('LOCATION: login.php');
	else
		$classID = $_GET['classID'];
	
	include("includes/db_connection.php");
		$q = "DELETEFROM classes WHERE classID = '$classID'"; //deletes a class
	
	$r = $conn->query($q);
	
	if($r===TRUE)
		echo "class".$classID."removed.";
	else
		echo "Something went wrong.";
?>
