 <!DOCTYPE html>
 <head>
  <meta charset="UTF-8">

</head>
<html>
  <body>
  <script> console.log('Thank you for the Response!!'); </script>
      <?php
        $value = isset($_GET['value']) ? $_GET['value'] : "";
      ?>
      <h1>A User Response</h1>
      <p> <?php echo($value);?></p>

      <textarea id = "Response"></textarea>
  </body>
</html>