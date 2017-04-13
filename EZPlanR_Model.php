<?php
/**
 * Created by PhpStorm.
 * User: paulm
 * Date: 2/7/2017
 * Time: 2:54 PM
 */

include('database_connect.php');

function login($username, $password)
{

    $connect = mysqli_connect("localhost", "root", "root", "EZPlanR_DB");

    $query = "SELECT * FROM USER WHERE Username = '" . $username . "'";

    $result = $connect->query($query);


        if ($result->num_rows > 0) {
        if ($result->num_rows == 1) {
            $row = $result->FETCH_ASSOC();
            $usertype= $row['User_Type'];
            if($row['Password']=$password) {

                session_start();
                $_SESSION["username"] = $username;
                $_SESSION['user_type'] = $usertype;

                if ($usertype == "Student") {
                    header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/student_base_view.php');


                } else if ($usertype == "Instructor") {

                    header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/teacher_base_view.php');

                } else if ($usertype == "Guardian") {

                    header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/guardian_view.php');
                }

                return true;

            }
        } else {
            echo "The information that you have entered is not correct";
            return false;
        }
    }
}

function logout(){
    session_destroy();
    header('Location: http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/index.php");
}

function userValidation($username){

    global $connect;

    //Check to see if the username has been used already
    $query = "SELECT User_ID FROM USER WHERE Username = '".$username."'";
    $result = $connect->query($query);
    $row = $result->fetchALL(PDO::FETCH_ASSOC);

    $numResults = count($row);

    if($numResults > 0){
        return true;
        echo "Duplicate User";
        exit;
    }
    else
        return false;
}


function addUser($username, $last_name, $first_name, $password, $user_type)
{
    global $connect;
    $link = mysqli_connect("localhost", "root", "root", "EZPlanR_DB");

    //add the user into the database
    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $UserNameTaken = userValidation($username);

    if($UserNameTaken == false) {
        $SQLAddUser = "INSERT INTO user (Username, Last_Name, First_Name, Password, User_Type)
        VALUES ('$username', '$last_name', '$first_name', '$password','$user_type')";

        $connect->query($SQLAddUser);

        $SQLFindUser = "SELECT User_ID FROM user WHERE Username = '$username'";
        $result =$connect->query($SQLFindUser);
        $userFound = $result->fetchColumn(0);

        switch ($user_type){
            case "Student":
                addStudent(intval($userFound));
                // header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/index.php');
                break;
            case "Instructor":
                addInstructor(intval($userFound));
                //  header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/index.php');
                break;
            case "Guardian":
                addGuardian(intval($userFound));
                //  header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/index.php');
                break;
        }

        /*
        if($user_type == 1){
            addStudent(intval($userFound));
        }
        elseif($user_type == 2){
            addInstructor(intval($userFound));
        }
        elseif ($user_type == 3){
            addGuardian(intval($userFound));

        }*/

        header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/index.php');
        exit();
    }

}

function addStudent($UserID){
    global $connect;

    $query = "INSERT INTO student(User_ID) VALUE ('$UserID')";
    $connect->query($query);


}

function addInstructor($UserID){
    global $connect;

    $query = "INSERT INTO instructor(User_ID) VALUE ('$UserID')";
    $connect->query($query);

    //  header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/index.php');
}

function addGuardian($UserID){
    global $connect;

    $query = "INSERT INTO guardian(User_ID) VALUE ('$UserID')";
    $connect->query($query);


}

function addEvent($title, $participants, $reminders, $frequency, $event_type, $description, $start_time, $end_time, $grade){

    global $connect;
    $link = mysqli_connect("localhost", "root", "root", "EZPlanR_DB");

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $_SESSION['username'];

    $query = "INSERT INTO event (Title, Publisher, Participants, Reminders, Frequency, Event_Type,
                Description, Start_Time, End_Time, Grade)
                VALUES 
                ('$title', NULL ,'$participants','$reminders', '$frequency', '$event_type', '$description', 
                '$start_time', '$end_time', '$grade')";
    $connect->query($query);

    $SQLFindEvent = "SELECT Event_ID FROM event WHERE Title = '$title'";
    $result =$connect->query($SQLFindEvent);
    $eventFound = $result->fetchColumn(0);

    addGrade(null, null, $eventFound, null);

    header('Location:  http://' . $_SERVER['HTTP_HOST'] . '/EZPlanR_1.0.2/home.php');
}

function addGrade($point, $percentage, $assignment_event_id, $student){
    global $connect;
    $query = "INSERT INTO grade (Points, Percentage, Assignment_Event_ID, Student) 
                VALUES ('$point', '$percentage', '$assignment_event_id','$student')";
    $connect->query($query);
}

function editEvent($eventID,$title, $participants, $reminders, $frequency, $event_type, $description, $start_time, $end_time, $grade){

    global $connect;
//validate the existence of the
    $query = "SELECT Event_ID FROM event WHERE Event_ID = '".$eventID."'";
    $result = $connect->query($query);
    $row = $result->fetchALL(PDO::FETCH_ASSOC);

    $update = "UPDATE event SET Title = '$title', Participants = '$participants', Reminders = '$reminders', 
              Frequency = '$frequency', Event_Type = '$event_type', Description = '$description',
              Start_Time = '$start_time', End_Time = '$end_time', Grade = '$grade'";

    $connect->query($update);

}

function getStudentData(){

    global $connect;
    //global $student_data;

    $query = "SELECT Student_ID FROM student WHERE user.User_ID == student.User_ID";

    $student_data = $connect->query($query);

    return $student_data;
}

function listStudents(){

    global $student_data;

    getStudentData();

    return $student_data;
}


