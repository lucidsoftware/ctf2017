<?php 
session_start();
require 'helpers.php';
if(!isset($_SESSION['user_id'])) {
  redirect('index.html');
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
    a.dropdown-toggle {
      cursor: pointer;
    }
    </style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Articles</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">



    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">

  <body>

    <nav class="navbar navbar-light bg-inverse navbar-fixed-top" style="background-color: #f5f5f5;">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Articles</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li>
              <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Hi <?php
                $link = getDBConn();
                $userId = $_SESSION['user_id'];
                $results=mysql_query("SELECT `name` FROM users where `id`=$userId");
                $row = mysql_fetch_array($results);
                echo $row[0];
                mysql_free_result($results);
                mysql_close($link);
              ?><span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="/article/logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container-fluid">

      <div class="starter-template">
      <div>
        <?php
          $link = getDBConn();
          $userId == $_SESSION['user_id'];
          $results = mysql_query("SELECT `title`, `body` from  `articles` WHERE `user_id`=$userId", $link);
          
          if(!mysql_num_rows($results)){
            echo "<h2>No Posts Found</h2>";
          } else {
            while($row=mysql_fetch_array($results)) {
              echo "<div class='panel panel-default'>";
              
              echo "<div class='panel-heading text-left text-uppercase'>".$row[0]." <span class='label label-success'>Key</span></div>";
              echo "<div class='panel-body text-left'><samp>".$row[1]."</samp</div>";
              echo "</div>";
            }
            mysql_free_result($results);
            mysql_close($link);
          }
        ?>

      </div>
        
      </div>

    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>

