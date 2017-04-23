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
            addRoster($_POST['RosterName']);
            echo "successfully got to run addRoster";
            /*for($i = 1; $i<=$howManyWereSelected; $i++){
                fillRoster("nametest", $arraySelected[$i - 1]);
                echo "successfully added student(s) to the roster";
            }*/
        } else {
            header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/roster_view.php');
            exit;
        }

}



// foreach($connect->query("SELECT Student_ID FROM student WHERE user.User_ID = student.User_ID ") as $addedStudent)
//  addStudentToRoster($rosterName, $addedStudent);
//$RosterName = $_POST['RosterName'];
//header('Location: http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/teacher_base_view.php');
