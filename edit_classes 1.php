<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Edit Classes</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">

</head>

<body>
	<div id = "container">
	<?php 

		if (isset($_SESSION['username']))
			$uname=$_SESSION['username'];
		else
			header('LOCATION:index.php');
	?>
	
	<div id="content" >	
		<h1>Edit Classes</h1>		

		<?php 
			function menu ($arr, $name, $value) {
				echo '<select name='.$name.'>';
				foreach ($arr as $ar) {
					echo '<option value = "'.$ar.'"';
					if ($ar==$value) echo 'selected="selected"';
						echo '>'.$ar.'</option>';
					}	
				echo '</select>';
			}
		?>		
			
		<?php
			$subject = "";
	
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$major = $_POST['major'];
			}	
		?>

		<form action="" method="post"> 
			<center><table style="padding: 10px 0px">
				<tr><td>
				<?php 
					//$sub = array("CS", "SE", "EN", "MA", "HS");
					//menu($sub, 'major', $_POST['major']);
				?>
				</td><td>
					<input type="submit" name="search" value="Display">
				</td>
			</table></center>
		</form>


		<center><table>
			<col width="50">
			<col width="50">
			<col width="50">
			<col width="100">
			<col width="80">
			<col width="80">	
			<col width="60">
			<col width="50">
			<col width="50">
		<tr>
			<th> Code </th>
			<th> Section </th>
			<th> Name </th>
			<th> Schedule </th>
			<th> Room </th>
			<th> Instructor </th>
			<th> Edit </th>
			<th> Delete </th>
		</tr>

		<?php 
			//connect to DB
			include("includes/db_connection.php");

			$q = "SELECT * FROM classes WHERE  code = '$code' order by instructor";
			$r = $conn->query($q);
			
			while ($row = $r->fetch_assoc()){
				echo "<tr>";
					echo "<td>".$row['code']."</td>";
					echo "<td>".$row['section']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['schedule']."</td>";
					echo "<td>".$row['room']."</td>";
					echo "<td>".$row['instructor']."</td>";
					echo "<td><a href='edit_class.php?classID=".$row['classID']."'>Edit</td>";
					echo "<td><a href='remove_class.php?classID=".$row['classID']."'>Delete</td>";
				echo "</tr>";
			}
		?>					
		</table><center> 
	</div> <!--content -->

	<div id="footer">
		<p>EZ PlanR</p>
	</div>
	</div> <!--container -->
</body>
</html>