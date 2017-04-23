<?php
if ($_SESSION['User_Type'] !== "Instructor")
    include('logout.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<script type="text/javascript" src="add_assignment_view_stylesheet.css"></script>

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
                <select name = "SelectCourse">
                    <option value="" >Choose a Course for this Assignment</option>

                </select>
            </tr>
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
                <div class = date_container>
                    <div class = "start_date">Start Time:
                        <input type = "date" name = "start_date">
                    </div>
                    <div class = "end_date">End Time:
                        <input type = "date" name = "end_date">
                    </div>
                </div>
            </tr>
            <tr>
                <div class = time_container>
                    <div class = "start_time">
                        <input type = "date" name = "start_time">
                    </div>
                    <div class = "end_time">
                        <input type = "date" name = "end_time">
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
                    <button class="btn waves-effect grey waves-light" type="submit" id="cancel_button" formaction="/EZPlanR_1.0.2/teacher_base_view.php" >Cancel</button>

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
