<?php
  ob_start();
  session_start();
  if(!isset($_SESSION["admin"]) || $_SESSION["admin"] !== true){
	  header("Location:login.php");
  }

?>
<!DOCTYPE >
<head>
<meta charset=utf-8">
<title>Statistik</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body>
  <h1>Statisk och grafik för fråga 8</h1>
  <hr>
  <a href="admin.php">Tillbaka till tabellen</a> | <a href="logout.php">Logga ut</a>
  <hr>
  <?php
  //q8a
    require"dbconn.php";
	
	//Räknar antalet rader i tabellen
	$sql = "SELECT COUNT(*) AS nrOfRows FROM webform";
	$result = $dbconn->query($sql);
	$row = $result -> fetch_assoc();
	$nrOfRows = $row['nrOfRows'];
	
	echo"<p>Antalet svar i undersökningen: ".$nrOfRows."</p>";
	
	//Lagar antalet ettor, tvåor...för fråga 8a
	$sql = "SELECT SUM(q8a=1) AS nrq8a1, SUM(q8a=2) AS nrq8a2, SUM(q8a=3) AS nrq8a3, SUM(q8a=4) AS nrq8a4, SUM(q8a=5) AS nrq8a5 FROM webform";
	$result = $dbconn->query($sql);
	$row = $result -> fetch_assoc();
	$q8a1 = $row['nrq8a1'];
	$q8a2 = $row['nrq8a2'];
	$q8a3 = $row['nrq8a3'];
	$q8a4 = $row['nrq8a4'];
	$q8a5 = $row['nrq8a5'];
	
	//Räknar medeltalet för fråga 8a
	$sql = "SELECT AVG(q8a) AS avgq8a FROM webform";
	$result = $dbconn->query($sql);
	$row = $result -> fetch_assoc();
	$avg8a = $row['avgq8a'];
	
	echo"<h4>Fråga 8a - Jag är nöjd med datautrustningen</h4>";
	echo"<p>";
	  echo"Ettor: ".$q8a1."<br>";
	  echo"Tvåor: ".$q8a2."<br>";
	  echo"Treor: ".$q8a3."<br>";
	  echo"Fyror: ".$q8a4."<br>";
	  echo"Femmor: ".$q8a5."<br>";
	  echo"<br>";
	  echo"Medeltal: ".$avg8a;
	echo"</p>"; 
  ?>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	
	function drawChart(){
		var data = google.visualization.arrayToDataTable([
		  ['Alternativ', 'Antal'],
		  ['alternativ 1', <?php echo $q8a1;?>],
		  ['alternativ 2', <?php echo $q8a2;?>],
		  ['alternativ 3', <?php echo $q8a3;?>],
		  ['alternativ 4', <?php echo $q8a4;?>],
		  ['alternativ 5', <?php echo $q8a5;?>]
		]);
		
		var options = {
			title: 'Fördelning fråga 8a',
			width:600,
			height:400
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('question8a'));
		
		chart.draw(data, options);
	}
  </script>
  <div id="question8a"></div>
  <hr>
  
  <?php
  //q8b
  $sql = "SELECT SUM(q8b=1) AS nrq8b1, SUM(q8b=2) AS nrq8b2, SUM(q8b=3) AS nrq8b3, SUM(q8b=4) AS nrq8b4, SUM(q8b=5) AS nrq8b5 FROM webform";
	$result = $dbconn->query($sql);
	$row = $result -> fetch_assoc();
	$q8b1 = $row['nrq8b1'];
	$q8b2 = $row['nrq8b2'];
	$q8b3 = $row['nrq8b3'];
	$q8b4 = $row['nrq8b4'];
	$q8b5 = $row['nrq8b5'];
	
	//Räknar medeltalet för fråga 8b
	$sql = "SELECT AVG(q8b) AS avgq8b FROM webform";
	$result = $dbconn->query($sql);
	$row = $result -> fetch_assoc();
	$avg8a = $row['avgq8b'];
	
	echo"<h4>Fråga 8b - Jag är nöjd med datautrustningen</h4>";
	echo"<p>";
	  echo"Ettor: ".$q8b1."<br>";
	  echo"Tvåor: ".$q8b2."<br>";
	  echo"Treor: ".$q8b3."<br>";
	  echo"Fyror: ".$q8b4."<br>";
	  echo"Femmor: ".$q8b5."<br>";
	  echo"<br>";
	  echo"Medeltal: ".$avg8b;
	echo"</p>"; 
  ?>
  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	
	function drawChart(){
		var data = google.visualization.arrayToDataTable([
		  ['Alternativ', 'Antal'],
		  ['alternativ 1', <?php echo $q8b1;?>],
		  ['alternativ 2', <?php echo $q8b2;?>],
		  ['alternativ 3', <?php echo $q8b3;?>],
		  ['alternativ 4', <?php echo $q8b4;?>],
		  ['alternativ 5', <?php echo $q8b5;?>]
		]);
		
		var options = {
			title: 'Fördelning fråga 8b',
			width:600,
			height:400
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('question8b'));
		
		chart.draw(data, options);
	}
  </script>
  <div id="question8b"></div>
  <hr>
  <?php
  //q8c
  $sql = "SELECT SUM(q8c=1) AS nrq8c1, SUM(q8c=2) AS nrq8c2, SUM(q8c=3) AS nrq8c3, SUM(q8c=4) AS nrq8c4, SUM(q8c=5) AS nrq8c5 FROM webform";
	$result = $dbconn->query($sql);
	$row = $result -> fetch_assoc();
	$q8c1 = $row['nrq8c1'];
	$q8c2 = $row['nrq8c2'];
	$q8c3 = $row['nrq8c3'];
	$q8c4 = $row['nrq8c4'];
	$q8c5 = $row['nrq8c5'];
	
	//Räknar medeltalet för fråga 8c
	$sql = "SELECT AVG(q8c) AS avgq8c FROM webform";
	$result = $dbconn->query($sql);
	$row = $result -> fetch_assoc();
	$avg8a = $row['avgq8c'];
	
	echo"<h4>Fråga 8c - Jag är nöjd med datautrustningen</h4>";
	echo"<p>";
	  echo"Ettor: ".$q8c1."<br>";
	  echo"Tvåor: ".$q8c2."<br>";
	  echo"Treor: ".$q8c3."<br>";
	  echo"Fyror: ".$q8c4."<br>";
	  echo"Femmor: ".$q8c5."<br>";
	  echo"<br>";
	  echo"Medeltal: ".$avg8c;
	echo"</p>"; 
  ?>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	
	function drawChart(){
		var data = google.visualization.arrayToDataTable([
		  ['Alternativ', 'Antal'],
		  ['alternativ 1', <?php echo $q8c1;?>],
		  ['alternativ 2', <?php echo $q8c2;?>],
		  ['alternativ 3', <?php echo $q8c3;?>],
		  ['alternativ 4', <?php echo $q8c4;?>],
		  ['alternativ 5', <?php echo $q8c5;?>]
		]);
		
		var options = {
			title: 'Fördelning fråga 8c',
			width:600,
			height:400
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('question8c'));
		
		chart.draw(data, options);
	}
  </script>
  <div id="question8c"></div>
  <hr>
  <?php
  //q8d
  $sql = "SELECT SUM(q8d=1) AS nrq8d1, SUM(q8d=2) AS nrq8d2, SUM(q8d=3) AS nrq8d3, SUM(q8d=4) AS nrq8d4, SUM(q8d=5) AS nrq8d5 FROM webform";
	$result = $dbconn->query($sql);
	$row = $result -> fetch_assoc();
	$q8d1 = $row['nrq8d1'];
	$q8d2 = $row['nrq8d2'];
	$q8d3 = $row['nrq8d3'];
	$q8d4 = $row['nrq8d4'];
	$q8d5 = $row['nrq8d5'];
	
	//Räknar medeltalet för fråga 8d
	$sql = "SELECT AVG(q8d) AS avgq8d FROM webform";
	$result = $dbconn->query($sql);
	$row = $result -> fetch_assoc();
	$avg8a = $row['avgq8d'];
	
	echo"<h4>Fråga 8d - Jag är nöjd med datautrustningen</h4>";
	echo"<p>";
	  echo"Ettor: ".$q8d1."<br>";
	  echo"Tvåor: ".$q8d2."<br>";
	  echo"Treor: ".$q8d3."<br>";
	  echo"Fyror: ".$q8d4."<br>";
	  echo"Femmor: ".$q8d5."<br>";
	  echo"<br>";
	  echo"Medeltal: ".$avg8d;
	echo"</p>"; 
  ?>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	
	function drawChart(){
		var data = google.visualization.arrayToDataTable([
		  ['Alternativ', 'Antal'],
		  ['alternativ 1', <?php echo $q8d1;?>],
		  ['alternativ 2', <?php echo $q8d2;?>],
		  ['alternativ 3', <?php echo $q8d3;?>],
		  ['alternativ 4', <?php echo $q8d4;?>],
		  ['alternativ 5', <?php echo $q8d5;?>]
		]);
		
		var options = {
			title: 'Fördelning fråga 8d',
			width:600,
			height:400
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('question8d'));
		
		chart.draw(data, options);
	}
  </script>
  <div id="question8d"></div>
  <hr>
  <?php
  //q8e
  $sql = "SELECT SUM(q8e=1) AS nrq8e1, SUM(q8e=2) AS nrq8e2, SUM(q8e=3) AS nrq8e3, SUM(q8e=4) AS nrq8e4, SUM(q8e=5) AS nrq8e5 FROM webform";
	$result = $dbconn->query($sql);
	$row = $result -> fetch_assoc();
	$q8e1 = $row['nrq8e1'];
	$q8e2 = $row['nrq8e2'];
	$q8e3 = $row['nrq8e3'];
	$q8e4 = $row['nrq8e4'];
	$q8e5 = $row['nrq8e5'];
	
	//Räknar medeltalet för fråga 8e
	$sql = "SELECT AVG(q8d) AS avgq8d FROM webform";
	$result = $dbconn->query($sql);
	$row = $result -> fetch_assoc();
	$avg8a = $row['avgq8e'];
	
	echo"<h4>Fråga 8e - Jag är nöjd med datautrustningen</h4>";
	echo"<p>";
	  echo"Ettor: ".$q8e1."<br>";
	  echo"Tvåor: ".$q8e2."<br>";
	  echo"Treor: ".$q8e3."<br>";
	  echo"Fyror: ".$q8e4."<br>";
	  echo"Femmor: ".$q8e5."<br>";
	  echo"<br>";
	  echo"Medeltal: ".$avg8e;
	echo"</p>"; 
  ?>

  <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
	google.charts.setOnLoadCallback(drawChart);
	
	function drawChart(){
		var data = google.visualization.arrayToDataTable([
		  ['Alternativ', 'Antal'],
		  ['alternativ 1', <?php echo $q8e1;?>],
		  ['alternativ 2', <?php echo $q8e2;?>],
		  ['alternativ 3', <?php echo $q8e3;?>],
		  ['alternativ 4', <?php echo $q8e4;?>],
		  ['alternativ 5', <?php echo $q8e5;?>]
		]);
		
		var options = {
			title: 'Fördelning fråga 8e',
			width:600,
			height:400
		};
		
		var chart = new google.visualization.PieChart(document.getElementById('question8e'));
		
		chart.draw(data, options);
	}
  </script>
  
  <div id="question8e"></div>
  <hr>
</body>
</html>







