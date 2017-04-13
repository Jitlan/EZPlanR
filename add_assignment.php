<?php

/**
 * Created by PhpStorm.
 * User: Harry
 * Date: 3/28/2017
 * Time: 10:44 AM
 */

include ('add_assignment_view.php');

//session variable check, to ensured page can only be accessed after login.
//session_start();
/*
if (!isset($_SESSION['username'])) {
    header('LOCATION: index.php');
}
else
   // $classID = $_SESSION['classID'];
   // $assignmentName = $_SESSION['assignmentName'];

if ($_SERVER['REQUEST_METHOD']=='POST') {

    //retrieve form data
    $error = array();

    if (!empty($_POST['assignmentName']))
        $assignmentName = $_POST['assignmentName'];
    else
        $error[] = "Please enter a name for the assignment.";
    if (!empty($_POST['start_time']))
        $start_time = $_POST['start_time'];
    else
        $error[] = "Please enter a start time.";
    if (!empty($_POST['end_time'])) {
        $end_time = $_POST['end_time'];
            //if(var_dump($start_time<$end_time)==false) {
                //$error[] = "Invalid end time! Please select an appropriate end time.";
          //  }
    } else
        $error[] = "Please enter an end time.";
    if (!empty($_POST['Description']))
        $description = $_POST['Description'];
}
    if (!empty($error)) {
        foreach ($error as $msg) {
            echo $msg;
            echo '<br>';
        }
    }
    else {

        include('EZPlanR_Model.php');
        addEvent($assignmentName, null, null , null , null , $description, $start_time, $end_time, null);

    }

*/

/*we neeeeeeeeeeeeeeeeeeeeeeed to figure out how we're going to handle rosters.
   if (!empty($_POST['username']))
        $username = $_POST['username'];
    else
        $error[] = "Please enter user name."*;

}
*/