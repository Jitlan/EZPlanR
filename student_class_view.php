<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Student Welcome Page</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
</head>

<body>
<nav>
    <div class="nav-wrapper cyan" >

        <a href="#1" data-activates="slide-out" class="brand-logo"><i class="material-icons">menu</i></a>

        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <a href="sass.html">Grades</a>
            </li>
            <li>
                <a href="badges.html">Assignment</a>
            </li>
            <li>
                <a href="collapsible.html">JavaScript</a>
            </li>
        </ul>
        <ul id="slide-out" class="side-nav">
            <li>
                <div class="userView">
                    <a href='add_assignment.php'>View Assignment</a>
                    <a href="add_Roster.php">View Classes</a>
                    <a href='index.php'>Logout Here</a>
                </div>
            </li>
        </ul>
    </div>
</nav>

<!--<a href="#2" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>-->

	<div id="content" >	
		<h1>View assignment</h1>		

		<?php/*
			function menu ($arr, $name, $value) {
				echo '<select name='.$name.'>';
				foreach ($arr as $ar) {
					echo '<option value = "'.$ar.'"';
					if ($ar==$value) echo 'selected="selected"';
						echo '>'.$ar.'</option>';
					}	
				echo '</select>';
			}*/
		?>
			
		<?php/*
			$subject = "";
	
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$username = $_POST['username'];
			}	*/
		?>

		<center><table>
			<col width="50">
			<col width="50">
		
		<tr>
			<th>Assignment</th>
			<th> Grade </th>
		</tr>

		<?php 
			//connect to DB
			include("includes/db_connection.php");

			$q = "SELECT * FROM course";
			$r = $conn->query($q);
			
			while ($row = $r->fetch_assoc()){
				echo "<tr>";
                    echo "<td>".$row['Course_ID']."</td>";
					echo "<td>".$row['Name']."</td>";
					echo "<td>".$row['Meeting_Place']."</td>";
				echo "</tr>";
			}
		?>					
		</table><center> 
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
</body>
</html>