<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Ez-PlanR</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>

<div id="content" >
    <h1>View Classes</h1>

    <?php
    include("home.php");

    ?>

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
            //connect to DB
            $conn = mysqli_connect("localhost", "root", "root", "EZPlanR_DB");

            $q = "SELECT * FROM course WHERE name = '$class' order by name";
            $r = $conn->query($q);

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