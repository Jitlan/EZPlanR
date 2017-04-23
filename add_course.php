<?php


include ('add_course_view.html');

session_start();
$instructorID = $_SESSION['Instructor_ID'];

	if ($_SERVER['REQUEST_METHOD']=='POST'){		
		//retrieve form data | edit here
		$error = array();

		if (!empty($_POST['courseName']))
			$courseName= ($_POST['courseName']);
		else 
			$error[] = "Please enter a Course Name.";
			
		if (!empty($_POST['start_time']))
			$start_time= date("H:i", strtotime($_POST['start_time']));
		else 
			$error[] = "Please select an start time.";

		if (!empty($_POST['end_time']))
			$end_time= date("H:i", strtotime($_POST['end_time']));
		else
			$error[] = "Please select an end time.";

		if (!empty($_POST['MeetingPlace']))
			$meetingPlace = $_POST['MeetingPlace'];
		else 
			$error[] = "Please enter Meeting Place.";

		if(!empty($error)){
			foreach ($error as $msg){
				echo $msg;
				echo '<br>';
			}

		} else {

			global $connect;

			echo $courseName;
            echo $meetingPlace;
			echo $start_time;
			echo $end_time;
			echo $meetingPlace;

            include ('EZPlanR_Model.php');

            addCourse($courseName, $start_time, $end_time, 1, $meetingPlace, $instructorID);

            header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/teacher_base.php');
		}
	}