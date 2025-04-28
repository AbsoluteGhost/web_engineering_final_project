<?php
session_start(); 

//destroy
session_unset();  
session_destroy(); 


header("Location: signup.html");  
exit(); 
?>
