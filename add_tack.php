<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>add_tack.php</title>
</head>

<body>
<?php
	require "dbconn.php";
	
	function dataClean($data){
		$data = strip_tags($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$q1 = dataClean($_POST['q1']);
	$q2 = dataClean($_POST['q2']);
	$q3 = dataClean($_POST['q3']);
	
	if($_POST['q4'] == 'annan'){
		$q4 = dataClean($_POST['annan_kommun']);
	}
	else{
		$q4 = dataClean($_POST['q4']);
	}
	
	if($_POST['q5'] == 'annan'){
		$q5 = dataClean($_POST['annan_bor']);
	}
	else{
		$q5 = dataClean($_POST['q5']);
	}
	
	if($_POST['q6'] == 'annan'){
		$q6 = dataClean($_POST['annan_person']);
	}
	else{
		$q6 = dataClean($_POST['q6']);
	}
	
	if($_POST['q7'] == 'annan'){
		$q7 = dataClean($_POST['annan_orsak']);
	}
	else{
		$q7 = dataClean($_POST['q7']);
	}
	$q8a = dataClean($_POST['q8a']);
	$q8b = dataClean($_POST['q8b']);
	$q8c = dataClean($_POST['q8c']);
	$q8d = dataClean($_POST['q8d']);
	$q8e = dataClean($_POST['q8e']);
	
	$sql = "INSERT INTO webform (q1, q2, q3, q4, q5, q6, q7, q8a, q8b, 
	        q8c, q8d, q8e)
	        VALUES ('$q1','$q2','$q3','$q4','$q5','$q6','$q7',$q8a,
	        $q8b,$q8c,$q8d,$q8e)";
	if($dbconn->query($sql)===TRUE){
	    
	    echo "<h2>Tack för ditt svar!</h2>";
	}
	else{
	    echo"Fel: ".$sql."<br>".$dbconn->error;
	}
	$dbconn->close();
	
?>
</body>
</html>