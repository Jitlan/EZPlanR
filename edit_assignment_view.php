<?php
/**
 * Created by PhpStorm.
 * User: paulm
 * Date: 4/12/2017
 * Time: 10:40 AM
 */

if (!isset($_SESSION['username'])){
    header('LOCATION: index.php');
}
else {
    $classID = $_SESSION['classID'];
    $assignmentName = $_SESSION['assignmentName'];

    //connect to DB
    //first define database connection parameters
    $host = "localhost";
    $username = "root";
    $password = "root";  //change to your password for the server
    $dbname = "EZPlan_DB";
}

//create connection
$conn = new mysqli($host, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    //die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO users (assignmentName, dateCreated)
					VALUES ('$assignmentName', now())";

//page loaded either because: case 1: you hit the Edit Prifle command
//or case 2: you hit the Update command after you work on the profile form
echo '<h1>Add an Assignment</h1>';

if ($_SERVER['REQUEST_METHOD']=='POST'){  //case 2
    //step 1: validate form data
    $errors = array(); // Initialize an error array.

    if (empty($_POST['assignmentName']))
        $errors[] = 'You forgot to enter the name of the Assignment.';
    else
        $assignmentName = $_POST['assignmentName'];


    //add checks for other fields here
    //Instructor, Room, zipcode, email

    if(!empty($error)){
        foreach ($error as $msg)
            echo $msg.'<br>';
    }
    else{
        //step 2: update record
        //define an update query
        $q = "UPDATE classes SET 
						assignmentName='$assignmentName',
					
						WHERE classID = '$classID'";

        //execute the query
        $result = $conn->query($q);
        if ($result === TRUE)
            echo "Record updated successfully";
        else
            echo "Error updating record: ".$conn->error;
    }
}
else {   //case 1
    //retrieve user info from table
    //define a select query
    $q = "SELECT * FROM classes WHERE uname = '$uname'";

    //execute the query
    $result = $conn->query($q);

    //shoud return only one record
    if ($result->num_rows == 1){
        //one record found. right case.
        $row = $result->fetch_assoc();

        //get column values to fill the form
        $assignmentName = $row['assignmentName'];

    }
    else {
        echo $result->num_rows;
        echo "there is an error in the classes table.";
    }
}
?>

<html xmlns = "http://www.w3.org/1999/xhtml">
<head>
    <title>Edit Assignment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

</head>

<body>
<div id = "container">

    <!-- create a form for modifiable assignment info -->
    <form action = "" method = "post">
        <center><table>
                <tr>
                    <td>Assignment Name:</td>
                    <td><input type="text" name=assignmentName
                               value=<?php echo $assignmentName ?> ></td>
                </tr>
                <tr>
                    <td>Assignment Type: </td>
                    <td><input type="radio" name="assignmentType" value = "Homework">Homework<br>
                        <input type="radio" name="assignmentType" value = "Quiz">Quiz<br>
                        <input type="radio" name="assignmentType" value = "Test">Test<br></td>
                    <input type="radio" name="assignmentType" value = "Paper">Paper<br></td>

                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="Edit Assignment"></td>
            </table></center>
    </form>
</div>
<div id = "footer">
    <p>Copyright 2017 EZ PlanR</p>
</div>

</body>
</html>
