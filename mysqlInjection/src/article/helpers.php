<?php
function redirect($relativeUrl){
	/* 
	* Redirect to a different page in the current directory that was requested 
	*/
	$host  = $_SERVER['HTTP_HOST'];
	$uri  = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
	

	header("Location: http://$host$uri/$relativeUrl");
	exit;
}

function getDBConn(){
	$link = mysql_connect('127.0.0.1:3306', 'ctf', 'L2,C)/HcRuB2kV7');
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	mysql_select_db('articles', $link) or die('Could not select database');
	return $link;
}
?>