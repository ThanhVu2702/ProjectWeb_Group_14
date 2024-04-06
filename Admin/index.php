<!DOCTYPE html>
<html>
    <head>
 <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
<!-- CSS Libraries -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<scrip src=""></scrip>
     <link rel="stylesheet" href="./css/styleAdmin.css" type="text/css">
    </head>
    <body>
        <div class="wrapper">
   <?php 
   include("./config/config.php");
   include("./modules/header.php");
   ?> 
   <div class="title">
   <h1 style="text-align: center">Admin Page</h1>
</div> 
<?php
   include("./modules/menu.php");
   include("./modules/main.php");
   include("./modules/footer.php");
   ?>
   </div>
    </body>
</html>