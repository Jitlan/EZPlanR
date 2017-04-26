<?php
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 4/19/17
 * Time: 12:49 PM
 */

session_start();

include('EZPlanR_Model.php');

$arraySelected = $_SESSION['abusingSessions'];

print_r(array_values($arraySelected));
$howManyWereSelected = count($arraySelected);

//$howManyWereSelected = count($arraySelected);
if($_SERVER['REQUEST_METHOD'] == "POST"){
        if (!empty($_POST['RosterName'])) {
            //doesn't check for already used roster names
            addRoster($_POST['RosterName']);

            $rostername = $_POST['RosterName'];


            global $connect;

            $result = $connect->query("SELECT Roster_ID FROM roster WHERE Roster_Name = '$rostername' ");



            $currentRosterID = $result->fetchColumn(0);
            //echo $currentRosterID;

            $currentCourseID = $_SESSION['Course_ID'];

            $query = "UPDATE course SET Roster_ID = $currentRosterID WHERE Course_ID = $currentCourseID";

            $connect->query($query);

            /*
            foreach($connect->query("SELECT Roster_ID FROM WHERE Roster_Name = $addRosterToCourse ")as $thisIsIt){

            }*/

            for($i = 1; $i<=$howManyWereSelected; $i++){
                fillRoster($_POST['RosterName'], $arraySelected[$i - 1]);
            }

            header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/teacher_base_view.php');
            exit;

        } else {
            header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/roster_view.php');
            exit;
        }

}



// foreach($connect->query("SELECT Student_ID FROM student WHERE user.User_ID = student.User_ID ") as $addedStudent)
//  addStudentToRoster($rosterName, $addedStudent);
//$RosterName = $_POST['RosterName'];
//header('Location: http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/teacher_base_view.php');
