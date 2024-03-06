<?php
	ob_start();
	session_start();
	
	if(!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true){
		header("Location: login.php");
	}
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css"  href="styles.css">
<title>Admin</title>

</head>

<body>
	<h1>Admingränssnitt för websökningen</h1>
    <hr>
    <h3>Inlägg i websökningen</h3>
    
    <?php
		require "dbconn.php";
		
		$sql = "SELECT * FROM webform ORDER BY id DESC";
		$result = $dbconn->query($sql);
		
		echo "<p><a href='admin2.php'> Grafisk presentation av frågan 8</a></p>";
		echo "";
		echo "<table cellpadding='0' cellspacing='5'border='1'>";
			echo "<tr>";
				echo "<th>Redigera?</th>";
				echo "<th>Fråga 1</th>";
				echo "<th>Fråga 2</th>";
				echo "<th>Fråga 3</th>";
				echo "<th>Fråga 4</th>";
				echo "<th>Fråga 5</th>";
				echo "<th>Fråga 6</th>";
				echo "<th>Fråga 7</th>";
				echo "<th>Fråga 8A</th>";
				echo "<th>Fråga 8B</th>";
				echo "<th>Fråga 8C</th>";
				echo "<th>Fråga 8D</th>";
				echo "<th>Fråga 8E</th>";
				echo "<th>Ta bort?</th>";			
			echo "</tr>";
			
			while($row=$result->fetch_assoc()){
				
				echo "<tr>";
					echo "<td><a href='admin.php?e=yes&id=".$row['id']."'>Redigera</td>";
					echo "<td>".$row['q1']."</td>";
					echo "<td>".$row['q2']."</td>";
					echo "<td>".$row['q3']."</td>";
					echo "<td>".$row['q4']."</td>";
					echo "<td>".$row['q5']."</td>";
					echo "<td>".$row['q6']."</td>";
					echo "<td>".$row['q7']."</td>";
					echo "<td>".$row['q8a']."</td>";
					echo "<td>".$row['q8b']."</td>";
					echo "<td>".$row['q8c']."</td>";
					echo "<td>".$row['q8d']."</td>";
					echo "<td>".$row['q8e']."</td>";
					echo "<td><a href='admin.php?d=yes&id=".$row['id']."'>Radera</td>";
				echo "</tr>";
			}
		echo "</table>";
		echo "<br>";
		
		$dbconn->close();
		
				
		
		#Ta bort post
		if(isset($_GET['d']) && $_GET['d'] == 'yes'){
			require"dbconn.php";
			
			$sql = "DELETE FROM webform WHERE id = ".$_GET['id'];
			
			$dbconn -> query($sql);
			
			$dbconn -> close();
			
			header("Location: admin.php");
			exit;		
		}
		
		#Redigera post
		if(isset($_GET['e']) && $_GET['e'] == 'yes'){
			
			require"dbconn.php";
			
			$sql = "SELECT * FROM webform WHERE id = ".$_GET['id'];
			
			$result = $dbconn -> query($sql);
			
			$row = $result -> fetch_assoc();
			
			echo "<h3>Redigera inlägg</h3>";
			echo "<form method='post' action='admin.php?u=yes&e=no'>";
				echo "<input type='hidden' name='id' value='".$_GET['id']."'>";
				
				echo "Fråga 1:<br><input type='text' name='q1' value='".$row['q1']."'><br>";
				echo "Fråga 2:<br><input type='text' name='q2' value='".$row['q2']."'><br>";
				echo "Fråga 3:<br><input type='text' name='q3' value='".$row['q3']."'><br>";
				echo "Fråga 4:<br><input type='text' name='q4' value='".$row['q4']."'><br>";
				echo "Fråga 5:<br><input type='text' name='q5' value='".$row['q5']."'><br>";
				echo "Fråga 6:<br><input type='text' name='q6' value='".$row['q6']."'><br>";
				echo "Fråga 7:<br><input type='text' name='q7' value='".$row['q7']."'><br>";
				echo "Fråga 8a:<br><input type='text' name='q8a' value='".$row['q8a']."'><br>";
				echo "Fråga 8b:<br><input type='text' name='q8b' value='".$row['q8b']."'><br>";
				echo "Fråga 8c:<br><input type='text' name='q8c' value='".$row['q8c']."'><br>";
				echo "Fråga 8d:<br><input type='text' name='q8d' value='".$row['q8d']."'><br>";
				echo "Fråga 8e:<br><input type='text' name='q8e' value='".$row['q8e']."'><br>";	
				echo"<br>";
				echo "<input type='submit' value='Uppdatera'>";	
			echo "</form>";
			$dbconn -> close();	
		}
		#Uppdatera post
		if(isset($_GET['u']) && $_GET['u'] == 'yes'){
			require"dbconn.php";
			
			$sql = "UPDATE webform 
			        SET q1 = '".$_POST['q1']."', 
					q2 = '".$_POST['q2']."', 
					q3 = '".$_POST['q3']."',
					q4 = '".$_POST['q4']."',
					q5 = '".$_POST['q5']."',
					q6 = '".$_POST['q6']."',
					q7 = '".$_POST['q7']."',
					q8a = '".$_POST['q8a']."',
					q8b = '".$_POST['q8b']."',
					q8c = '".$_POST['q8c']."',
					q8d = '".$_POST['q8d']."',
					q8e = '".$_POST['q8e']."'
					
					WHERE id = '".$_POST['id']."'";
			
			$update = $dbconn -> query($sql);
			
			$dbconn -> close();
			
			header("Location: admin.php");
			exit;		
		}	
	?>
	<form id="logoutform" method="post" action="logout.php">
		<input type="submit" name="submit" id="submit" value="Logga ut">	
    </form>
    
</body>
</html>