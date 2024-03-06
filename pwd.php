<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$hash = password_hash('!QAZ2wsx', PASSWORD_ARGON2I);
echo $hash;
?>
</body>
</html>