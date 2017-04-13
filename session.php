<?php
/**
 * Created by PhpStorm.
 * User: paulm
 * Date: 2/21/2017
 * Time: 1:10 PM
 */
/*
include('database_connect.php');
session_start();

$user_check = $_SESSION['login_user'];

$ses_sql = mysqli_query($db,"select username from USER where username = '$user_check' ");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session = $row['Username'];

if(!isset($_SESSION['login_user'])){
    header("location:home.php");
}
*/