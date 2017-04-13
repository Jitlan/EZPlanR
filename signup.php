<?php
include ('signup_view.html');
//echo 'Beginning of Sign Up';
$get_variables = $_GET;

//echo 'Sign Up beginning';
if ($_SERVER['REQUEST_METHOD']=='POST') {

    //retrieve form data
    $error = array();
        if (!empty($_POST['SelectUserType'])){
            $user_type = $_POST['SelectUserType'];
        //echo $user_type;
        }
        else
            $error[] = "Please choose a user type.";

        if (!empty($_POST['username']))
            $username = $_POST['username'];
        else
            $error[] = "Please enter user name.";

        if (!empty($_POST['password']))
            $password = sha1($_POST['password']);
        else
            $error[] = "Please enter password.";

        if (!empty($_POST['password2']))
            $password2 = sha1($_POST['password2']);
        else
            $error[] = "Please confirm password.";

        if ($password != $password2)
            $error[] = "Passwords do not match.";

        if (!empty($_POST['first_name']))
            $first_name = $_POST['first_name'];
        else
            $error[] = "Please enter first name.";

        if (!empty($_POST['last_name']))
            $last_name = $_POST['last_name'];
        else
            $error[] = "Please enter last name.";

        if (!empty($error)) {
            foreach ($error as $msg) {
                echo $msg;
                echo '<br>';
            }
        }
        else {

            include ('EZPlanR_Model.php');
            addUser($username, $last_name, $first_name, $password, $user_type);

            //$test = " herpaderp";
            //echo $test;
           // header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/index.php');

        }

}

//header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/index.php');
?>

