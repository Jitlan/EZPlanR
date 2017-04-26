<?php
/**
 * Created by PhpStorm.
 * User: paulm
 * Date: 2/7/2017
 * Time: 2:54 PM
 */

include('database_connect.php');

function login($username, $password){

    global $connect;

    $query = "SELECT * FROM USER WHERE Username = '$username' 
                AND Password = '$password'";

    $result = $connect->query($query);
    $row = $result->fetchALL(PDO::FETCH_ASSOC);

    $numResults = count($row);

    if ($numResults == 1) {
        return true;


    } else {
        return false;
        exit;
    }
}

function usernameCheck($username){

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


function addUser($username, $last_name, $first_name, $password, $user_type){
    global $connect;
    /*$link = mysqli_connect("localhost", "root", "root", "EZPlanR_DB");

    //add the user into the database
    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    */
    $UserNameTaken = usernameCheck($username);

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
                break;
            case "Instructor":
                addInstructor(intval($userFound));
                break;
            case "Guardian":
                addGuardian(intval($userFound));
                break;
        }
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

}

function addGuardian($UserID){

    global $connect;

    $query = "INSERT INTO guardian(User_ID) VALUE ('$UserID')";
    $connect->query($query);


}

function addEvent($title, $participants, $reminders, $frequency, $event_type, $description, $start_time, $end_time, $grade){

    global $connect;

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
}

function addGrade($point, $percentage, $assignment_event_id, $student){
    global $connect;
    $query = "INSERT INTO grade (Points, Percentage, Assignment_Event_ID, Student) 
                VALUES ('$point', '$percentage', '$assignment_event_id','$student')";
    $connect->query($query);
}

function editEvent($eventID,$title, $participants, $reminders, $frequency, $event_type, $description, $start_time, $end_time, $grade){

    global $connect;
    //validate the existence of the event
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

    $query = "SELECT * FROM student";
    $student_data = $connect->query($query);

    return $student_data;
}

function addRoster($Roster_Name)
{
    global $connect;
    $insertRoster = "INSERT INTO roster(Roster_Name) VALUE ('$Roster_Name')";
    $connect->query($insertRoster);

function getRoster($roster){

        global $connect;
        $query = "SELECT * FROM student_roster WHERE RosterID = '$roster' ";
        $result = $connect->query($query);
        $row = $result->fetchALL(PDO::FETCH_ASSOC);
        return $row;
    }

function fillRoster($rostername, $student){

    global $connect;

    $findRosterID = "SELECT Roster_ID from roster WHERE Roster_Name = '$rostername'";
    echo "prepared the query";
    $found = $connect->query($findRosterID);
    echo "queried for the rosterID";
    $hereItIs = $found->fetchColumn(0);

    $addToStudentRosterSQL = "INSERT INTO student_roster (StudentID, RosterID) VALUES ('$student','$hereItIs')";
    echo "queried prepared to insert students into rosters";
    $connect->query($addToStudentRosterSQL);
    echo "reached the bottom of fillRoster";

    }
}


function addCourse($courseName, $start_time, $end_time, $roster, $meetingPlace, $instructor){

        global $connect;

        $query = "INSERT INTO course (Name,Meeting_Start_Time,Meeting_End_Time,Roster_ID,Meeting_Place,Instructor) 
            VALUES ('$courseName','$start_time','$end_time','$roster','$meetingPlace','$instructor')";

        $connect->query($query);

}
function getCourse($courseName){

    global $connect;
    $query = "SELECT Course_ID FROM course WHERE Name = '$courseName'";
    $result = $connect->query($query);
    $foundCourse =  $result->fetchColumn(0);

    return $foundCourse;

}


