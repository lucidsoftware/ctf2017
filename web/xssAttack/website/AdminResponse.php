 <!DOCTYPE html>
 <head>
  <meta charset="UTF-8">
  <script src="jquery-3.1.1.min.js"></script>
  <script src="results.js"></script>

</head>
<html>
  <body>
      <?php
        $value = isset($_GET['Value']) ? $_GET['Value'] : "";
      ?>
      <h1>A User Response</h1>
      <p> <?php echo $value;?></p>

      <textarea id = "Response">response to response</textarea>>
  </body>
</html>