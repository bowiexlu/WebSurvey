<?php  
// startar sessionen 
session_start();  

// avslutar sessionen om anv�ndaren �r inloggad  
if (isset($_SESSION["admin"])) {  
    unset($_SESSION["admin"]);  
}  

// �ppnar login.php p� nytt
header("Location: login.php");  
?> 