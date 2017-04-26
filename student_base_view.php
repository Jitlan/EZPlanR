<?php
/**
 * Created by PhpStorm.
 * User: paulm
 * Date: 4/12/2017
 * Time: 9:26 AM
 */
include ('EZPlanR_Model.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>EZ-PlanR</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="teacher_base_view_stylesheet.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>

<div id="content">
    <nav>
        <div class="nav-wrapper cyan" >

            <a href="#1" data-activates="slide-out" class="brand-logo"><img class="responsive-img" width = "65" height = "65" src="EZPlanR_SmallLogo.png" </img></a>


            <ul id="nav-mobile" class="right hide-on-med-and-down"></ul>
            <ul id="slide-out" class="side-nav">
                <li>
                    <div class="userView">
                        <div>
                            <img class = "SideNavLogo" src="EZPlanR_LargeLogo1.png" width="100% " </img>
                        </div>
                <li>
                    <div class="divider"></div>
                </li>
                <li>
                    <div>
                        <a href='#'>View Classes</a>
                        <a href="##">View Grades</a>
                        <a href = "logout.php" value = "Logout" >Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>

<?php
session_start();
echo "<h1> Welcome, " . $_SESSION['username'];
        $First_Name = $_SESSION['First_Name'];
        echo $First_Name, "</h1>";

?>

<div id = "container_selected" class="card-panel">
    <table class="highlight responsive-table">
        <thead>
        <tr>
            <th>Select Course</th>
            <th>Class Name</th>
            <th>Class ID</th>
        </tr>
        </thead>
        <?php

        global $connect;
/*
        $query = "SELECT * FROM course WHERE Name ='$Name' ";
        $result = $connect->query($query);
        $eventFound = $result->fetchColumn(0);


        echo $eventFound;
        echo 'I am after the query and after the fetch';
*/        $SelectID = 1;

        foreach($connect->query("SELECT * FROM course")as $row){

            echo'<tr name="'.$row['Course_ID'].'" onclick="document.location=\'\';">';

           echo '<td>',$row['Name'],'</td>',
            '<td>',$row['Course_ID'],'</td>';

            echo'</tr>';

            $SelectID++;

        }

        $SelectID = $row['Course_ID'];
/*
        foreach($row as $megadooty) {

            // $arraySelected[] = $megadooty['Student_ID'];

            $arraySelected[] = $megadooty['Course_ID'];
            echo '<tr> <td>', $megadooty['Course_ID'], '</td>',
            '<td>', $megadooty['Name'], '</td>';
            echo '</tr>';
        }*/
        /*
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['Roster_ID'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "</tr>";
        */

        ?>

        </table>
</div> <!--content -->

<div id="footer">
    <p>Copyright 2017 Monmouth University</p>
</div>
</div> <!--container -->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
<script>
    (function($) {
        $(function () {
            $(".brand-logo").sideNav();
        });// end of document ready
    })(jQuery); // end of jQuery name space
</script>
<script type="text/javascript" src="materialize/js/materialize.min.js"></script>
</body>
</html>
