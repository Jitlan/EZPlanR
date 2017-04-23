<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>EZ-PlanR</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="teacher_base_view_stylesheet.css"
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>

<div id="content" >


    <!--<a href='home.php?action=logout'>Logout</a><br>-->
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
                        <a href='add_assignment.php'>Add Assignment</a>
                        <a href="add_Roster.php">Add Roster</a>
                        <a href="add_course.php">Add Course</a>
                        <a href = "logout.php" value = "Logout" >Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <h2>View Classes</h2>

    <!--<a href="#2" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>-->

    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
    <script>
        (function($) {
            $(function () {
                $(".brand-logo").sideNav();
            });// end of document ready
        })(jQuery); // end of jQuery name space
    </script>

    <?php
    $subject = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $class = $_POST['name'];
    }
    ?>

    <center><table>
            <col width="50">
            <col width="50">

            <tr>
                <th> classes </th>
                <th> grade </th>
            </tr>

            <?php


            $q = "SELECT * FROM course WHERE name = '$class' order by name";
            $r = $connect->query($q);

            while ($row = $r->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$class."</td>";
                echo "<td>".$row['grade']."</td>";
                echo "</tr>";
            }
            ?>
        </table><center>
</div> <!--content -->

<div id="footer">
    <p>Copyright 2017 Monmouth University</p>
</div>
</div> <!--container -->
</body>
</html>