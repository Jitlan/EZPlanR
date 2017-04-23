<?php
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 4/11/17
 * Time: 12:44 PM
 */

session_start();

$data = getStudentData();
echo'<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
     <link rel="stylesheet" href="roster_view_stylesheet.css">
';

echo'<body>';
    echo'<div id = "container_select" class="card-panel hoverable">';
        echo'<comment>Please select who will be a part of this new Roster.</comment>';
        echo '<table class="highlight responsive-table">';
            echo '<form id = "CheckBoxForm" name="checkbox" action="add_Roster.php" method="POST">';
                echo '<thead>';
                    echo '<tr><td><button class="btn waves-effect waves-light" name="SelectRoster" type="submit">Add to Roster</button></td>';
                    echo '<td><button class="btn waves-effect grey waves-light" type="submit" id="cancel_button" 
                            formaction="/EZPlanR_1.0.2/teacher_base_view.php" >Back</button></td></tr>';
                    echo '<tr>
                                <th id = checkbox_column>Select</th>
                                <th>Student ID</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                          </tr>';
                echo'</thead>';

            $SelectID = 1;

            foreach($connect->query("SELECT * FROM user, student WHERE user.User_ID = student.User_ID ")as $row){

                echo'<tr name="'.$row['Student_ID'].'">
                        <td>
                            <input value = "'.$row['Student_ID'].'" type="checkbox"  name= "students[]" 
                            id ="'.$row['Student_ID'].'" method="POST"><label for ="'.$row['Student_ID'].'"></label>
                        </td>',
                        '<td>',$row['Student_ID'],'</td>',
                        '<td>',$row['First_Name'],'</td>',
                        '<td>',$row['Last_Name'],'</td>';
                echo'</tr>';

                $SelectID++;

            }

            $SelectID = $row['Student_ID'];


        echo '</form>';
        echo '</table>';
    echo'</div>';
echo'</body>';



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Roster</title>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



</head>
<body>



</body>
</html>
