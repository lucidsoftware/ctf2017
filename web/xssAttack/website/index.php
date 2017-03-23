 <!DOCTYPE html>
 <head>
  <meta charset="UTF-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="results.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<html>
  <body>
  <div class="container">
      <?php
        $name = isset($_GET['name'] ) ? htmlspecialchars($_GET['name']) : "like stuff in general";
        $value = isset($_GET['value']) ? htmlspecialchars($_GET['value']) : "";
      ?>
      <h1>What do you think of <span id ="name"><?php echo($name);?></span> </h1>
      <div class="container">
        <textarea rows=20 id ="UserResponse" > <?php echo($value);?></textarea>
      </div>
        <button id = "submitbtn">Send response to the admin</button>
        <p id="adminthanks"></p>
      </div>
  </body>
</html>