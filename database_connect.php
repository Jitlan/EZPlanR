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
}
catch(PDOException $e){

 'failed to connect DB' . $conError->getMessage ();

}


