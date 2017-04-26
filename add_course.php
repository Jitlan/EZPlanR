<?php


include('add_course_view.php');

session_start();
$instructorID = $_SESSION['Instructor_ID'];

	if ($_SERVER['REQUEST_METHOD']=='POST'){

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


			/*echo $courseName;
            echo $meetingPlace;
			echo $start_time;
			echo $end_time;*/

            include ('EZPlanR_Model.php');

            addCourse($courseName, $start_time, $end_time, 0 , $meetingPlace, $instructorID);

            $_SESSION['Course_ID'] = getCourse($courseName);

            header('Location: /EZPlanR_1.0.2/add_Roster.php');
            exit;

		}
	}