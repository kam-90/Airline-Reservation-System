<?php
session_start();
if(isset($_SESSION['user_name'])){
   header("location: home.php");
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" type="text/css" href="css/style1.css" />
  <script type="text/javascript" src="js/Customjs.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="js/validate.js"></script>
</head>
<body class="bg">

<?php
 include("header.php");
?>
 
     <div class="container">    
        <?php

 include("loginbox.php")

    
?>
</div>
</body>
</html>