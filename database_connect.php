<?php
/**
 * Created by PhpStorm.
 * User: paulm
 * Date: 2/7/2017
 * Time: 12:16 PM
 */

$user = "root";
$pass = "root";
$hostname = "localhost";
$database = "EZPlanR_DB";


//connection to the database
try{
    $connect = new PDO('mysql:host=localhost;dbname=EZPlanR_DB', $user, $pass);
    $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/index.php');
}
catch(PDOException $e){

    echo "No Database reached!";
}


