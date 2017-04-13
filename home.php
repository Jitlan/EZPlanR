<?php
/**
 * Created by PhpStorm.
 * User: paulm
 * Date: 2/21/2017
 * Time: 1:22 PM

 */
include ('session.php');
include ('EZPlanR_Model.php');
include ('home_view.html');
if($_GET["action"] == "logout"){
    logout();
}

//echo $_SESSION['username'];
?>