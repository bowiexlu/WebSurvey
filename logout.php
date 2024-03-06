<?php  
// startar sessionen 
session_start();  

// avslutar sessionen om användaren är inloggad  
if (isset($_SESSION["admin"])) {  
    unset($_SESSION["admin"]);  
}  

// öppnar login.php på nytt
header("Location: login.php");  
?> 