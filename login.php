<?php
	#starta en session
	session_start();
	#buffrar utdata
	ob_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css"  href="styles.css">
<title>Logga in</title>
</head>

<body>
<h2>Admin-sida för undersökning</h2>
<?php

	$user="";
	$pwd="";
	
	#filterubfsfunktion
	function cleanData($data){
		$data = strip_tags($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	if(isset($_POST['username']) && isset($_POST['password'])){
	require "dbconn.php";
	
	$user = cleanData($_POST['username']);
	$pwd = cleanData($_POST['password']);
	
	#Väljer poster där användar är rätt
	$sql = "SELECT * FROM LoginWebForm WHERE uname = '$user'";	
	$result = $dbconn->query($sql) or die($dbconn->error);
	
	$row = $result->fetch_assoc();
	
	#Hämtar lösenordet och url
	$hash = $row['pwd'];
	
	
	
	
	#Stänger uppkopplingen
	$dbconn->close();
	
	#kontroll att vi hittat användare + lösenord
	if(password_verify($pwd, $hash) && $result->num_rows == 1){
		
		#skapar en sessionvariabel
		$_SESSION['admin'] = true;
		
		#går till rätt sida
		header("Location: admin.php");
		exit;
	} else {
		$errormsg= "Användarnamn eller lösenord är felaktigt!";
	}
	if(isset($errormsg)){
		echo "<p class='error'>".$errormsg."</p>";
	}
	
}


echo'
<form id="loginform" method="post" action="">
	<fieldset>
		<legend>Logga in</legend>
		<label for="username">Användarnamn:</label><br>	
		<input type="text" name="username" id="username"><br>
		<label for="password">Lösenord:</label><br>
		<input type="text" name="password" id="password"><br>
		<br>
		<input type="submit" name="submit" id="submit" value="Logga in">	
	</fildset>
</form>
';
?>
</body>
</html>