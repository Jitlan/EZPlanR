<?php
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 4/15/17
 * Time: 2:05 PM
 */

session_start();

global $connect;

//$query = "SELECT Instructor_ID FROM instructor WHERE instructor.User_ID" = $_SESSION["User_ID"] ;
//$instructorID = $connect->query($query);
//$_SESSION["Instructor_ID"] = $instructorID['Instructor_ID'];

header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/teacher_base_view.php');
exit;
