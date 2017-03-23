<?php
  //$body = json_decode(file_get_contents('php://input'),TRUE);
  $userResponse = isset($_POST['value'])? $_POST['value'] : "no Response2";
  
  //loudly sweating
  $command = "phantomjs /home/ubuntu/xssDummy/readerscript.js http://localhost/survey/adminView.php?value=" . escapeshellarg($userResponse);
  echo(shell_exec($command)); //praise the swiss army chainsaw of programming
  exit;
?>