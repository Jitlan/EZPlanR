<?php
/**
 * Created by PhpStorm.
 * User: paulm
 * Date: 2/7/2017
 * Time: 11:47 AM
 */

include ('EZPlanR_Model.php');

//session_start();

//$status_message = "Enter Your Username and Password";


if($_SERVER["REQUEST_METHOD"] == "POST") {

    //var_dump($_POST);

    $password = $_POST['password'];
    $username = $_POST['username'];

    $valid_login = login($username, sha1($password)); // function in model

    if ($valid_login) {
        //session_start();  // session setup
        // echo "valid login";
        // header("Location:  http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/home.php");

        echo $_SESSION['username'];
        echo $_SESSION['user_type'];
        exit();
    } else {
        $status_message = "Login Error";
    }

}
header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/index_view.html');
exit;

