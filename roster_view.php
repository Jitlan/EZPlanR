<?php
/**
 * Created by PhpStorm.
 * User: jordan
 * Date: 4/11/17
 * Time: 12:44 PM
 */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Roster</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
    <link rel="stylesheet" href="roster_view_stylesheet.css">

</head>
<body>
<div id = "container" class="card-panel hoverable">
    <h1>Roster for $class</h1>
    <!-- create a form for modifiable assignment info -->
    <form action = "add_roster.php" method = "post">
        <div>
            <table class="highlight">
                <thead>
                    <tr>
                        <th>Select</th>
                        <th>Student Name</th>
                    </tr>
                    </thead>
                    <tbody>
                
                
                

               <!--
                <tr>
                    <td><input type="checkbox" id="test6"/>
                        <label for="test6">Test</label></td>
                    <td>Alvin</td>
                </tr>

                <tr>
                    <td><input type="checkbox" id="test7"  />
                        <label for="test7">Test</label></td>
                    <td>Alan</td>
                </tr>

                <tr>
                    <td><input type="checkbox" id="test8" />
                        <label for="test8">Test</label></td>
                    <td>Jonathan</td>
                </tr>-->
                </tbody>

            </table>
            <button class="btn waves-effect waves-light" type="submit" >Select Student</button>
            <button class="btn waves-effect grey waves-light" type="submit" id="cancel_button" formaction="/EZPlanR_1.0.2/home.php" >Go Back</button>
        </div>
    </form>
</div>
</body>
</html>
