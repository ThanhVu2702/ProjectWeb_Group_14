<?php
include('./config/config.php');
?>
<!DOCTYPE html>
<html>
    <head>
 <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">
<!-- CSS Libraries -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="./css/styleAdmin.css" type="text/css">
     <script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	exportEnabled: true,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Thống Kê Đơn Hàng"
	},
	axisY:{
		includeZero: true
	},
	data: [{
		type: "column", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($chart_data, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
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
