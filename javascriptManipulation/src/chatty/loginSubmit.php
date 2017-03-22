<?php
require 'helpers.php';
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$link = getDBConn();
$results = mysql_query("SELECT `id` FROM `users` WHERE name='$username' AND password='$password'", $link);
if(!$results){
	redirect('index.html');
}
$row = mysql_fetch_array($results);
$_SESSION['user_id'] = $row[0];
redirect('chatter.php');
?>
