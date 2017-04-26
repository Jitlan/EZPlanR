<?php
//Thank-you, Anthony Lagrotta, for being the wonderful man you are.
session_start();

include ('EZPlanR_Model.php');
include ('roster_view.php');





function IsChecked($checkboxname,$value){
    if(!empty($_POST[$checkboxname])){//posted checkboxes, not every checkbox
        foreach($_POST[$checkboxname] as $checkvalue){//loops to see if the POSTED check box is checked
            if($checkvalue == $value){
                return true;//lets figure it out! together :)
            }
        }
    }
    return false;
}

    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <?php
    echo "<br>";
global $connect;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo'<form id = "createRosterForm" name="addRoster" action="finalize_roster.php" method="POST">';

    echo'<div id = "container_selected" class="card-panel hoverable">';
    echo'<table class="highlight responsive-table">';
    echo'<thead>';
    echo'<input type="text" name="RosterName" id="RosterName" placeholder="Please enter a roster name." maxlength="20">

                <tr>                
                    <th>Student ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>';
    echo '</thead>';
       if(!empty($_POST['students'])){
           $i = 1;


           foreach($connect->query("SELECT * FROM user, student WHERE user.User_ID = student.User_ID ")as $megadooty){
               if(IsChecked('students', $megadooty['Student_ID'])){

                   $arraySelected[] = $megadooty['Student_ID'];

                   echo '<div id="selection">';

                   echo '<tr>
                            <td>', $megadooty['Student_ID'], '</td>',
                           '<td>', $megadooty['First_Name'], '</td>',
                           '<td>', $megadooty['Last_Name'], '</td>';
                   echo '</tr>';
                   echo '</div>';
               }
           }
       }
    echo '<button class="btn waves-effect waves-light" name="FinalizeRoster" type="submit" >Finalize Roster</button>';
    print_r(array_values($arraySelected));

    //I HATE MYSELF
    $_SESSION['abusingSessions'] = $arraySelected;


    echo '</table>';
    echo '</div>';
    echo '</form>';
}
//query students and users again, compare that result with $i to see if its selected, and then print that row.
?>

