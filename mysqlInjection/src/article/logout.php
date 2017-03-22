<?php
session_start();
require 'helpers.php';
// remove all session variables
session_unset(); 

// destroy the session 
session_destroy(); 
redirect('index.html');
?>

Daniel' AND '1'='1' OR '1'='0' and password='$pass'