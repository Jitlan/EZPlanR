<?php
/**
 * Created by PhpStorm.
 * User: paulm
 * Date: 4/12/2017
 * Time: 10:35 AM
 */

if (!isset($_SESSION['username'])) {
    header('LOCATION: index.php');
}
else
    // $classID = $_SESSION['classID'];
    // $assignmentName = $_SESSION['assignmentName'];

    if ($_SERVER['REQUEST_METHOD']=='POST') {

        //retrieve form data
        $error = array();

        if (!empty($_POST['assignmentName']))
            $assignmentName = $_POST['assignmentName'];
        else
            $error[] = "Please enter a name for the assignment.";
        if (!empty($_POST['start_time']))
            $start_time = $_POST['start_time'];
        else
            $error[] = "Please enter a start time.";
        if (!empty($_POST['end_time'])) {
            $end_time = $_POST['end_time'];
            //if(var_dump($start_time<$end_time)==false) {
            //$error[] = "Invalid end time! Please select an appropriate end time.";
            //  }
        } else
            $error[] = "Please enter an end time.";
        if (!empty($_POST['Description']))
            $description = $_POST['Description'];
    }
if (!empty($error)) {
    foreach ($error as $msg) {
        echo $msg;
        echo '<br>';
    }
}
else {

    include('EZPlanR_Model.php');
    addEvent($assignmentName, null, null , null , null , $description, $start_time, $end_time, null);

}

?>

<html>
<head>
    <!--<header><font size = 32>Add Assignment</font></header>-->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="add_assignment_view_stylesheet.css">
</head>
<body>
<div id = "container" class="card-panel hoverable">
    <h1>Add Assignment</h1>
    <!-- create a form for modifiable assignment info -->
    <form action = "add_assignment.php" method = "post">
        <div>
            <tr>
                <td><input type="text" name=assignmentName placeholder="Assignment Name"></td>
            </tr>
            <tr>
                <!--<td>Assignment Type: </td>
                <td><input type="radio" name="assignmentType" ><br>
                    <input type="radio" name="assignmentType" ><br>
                    <input type="radio" name="assignmentType" ></td>-->
            </tr>
            <tr>
                <div class = time_container>
                    <div class = "start_time">Start Time:
                        <input type = "datetime-local" name = "start_time" placeholder="Start Time">
                    </div>
                    <div class = "end_time">End Time:
                        <input type = "datetime-local" name = "end_time" >
                    </div>
                </div>
            </tr>
            <tr>

                <td><textarea placeholder="Description" class = "materialize-textarea" id="description" name = "description" rows=""
                              cols="" maxlength="300"></textarea></td>
            </tr>
            <tr>
                <td>
                    This is where we will select a "roster" to send this too
                </td>
            </tr>
            <tr>
                <td>
                    <br>
                    <button class="btn waves-effect waves-light" type="submit" >Add Assignment</button>
                    <button class="btn waves-effect grey waves-light" type="submit" id="cancel_button" formaction="/EZPlanR_1.0.2/home.php" >Cancel</button>

                </td>
            </tr>
        </div>
    </form>
</div>
<div id = "footer">
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.5/js/materialize.min.js"></script>
</body>
</html>
