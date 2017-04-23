<?php
/**
 * Created by PhpStorm.
 * User: paulm
 * Date: 2/7/2017
 * Time: 11:47 AM
 */

include ('EZPlanR_Model.php');

if($_SERVER["REQUEST_METHOD"] == "POST") {

    global $connect;

    $username = $_POST['username'];
    $password = $_POST['password'];

    $valid_login = login($username, sha1($password));

    if ($valid_login == true) {
        session_start();
        $_SESSION["Username"] = $username;

        foreach($connect->query("SELECT * FROM user WHERE Username = '$username' ")as $row){

        }

        $_SESSION["User_Type"] = $row['User_Type'];
        $_SESSION["User_ID"] = $row['User_ID'];
        $_SESSION["First_Name"] = $row['First_Name'];
        $_SESSION["Last_Name"] = $row['Last_Name'];

        if ($_SESSION["User_Type"] == "Student") {
            header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/student_base_view.php');
            exit;

        } else if ($_SESSION["User_Type"] == "Instructor"){

            header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/teacher_base.php');
            exit;

        } else if ($_SESSION["User_Type"] == "Guardian") {
            header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/guardian_view.php');
            exit;
        }

    }
}

include ('index_view.html');

exit;

