<?php
$query="SELECT code_cart, soluong From tbl_cart_details";
 $result=mysqli_query($mysqli,$query);
 $chart_data=array();
 $count=0;
while($row=mysqli_fetch_array($result)){
	$chart_data[$count]["x"]=$row["code_cart"];
   $chart_data[$count]["y"]=$row["soluong"];
   $count=$count+1;
}
// $result=mysqli_query($mysqli,$query);
// $chart_data='';
// while($row=mysqli_fetch_array($result)){
  
// }
$dataPoints = array(
	array("x"=> 10, "y"=> 41),
	array("x"=> 20, "y"=> 35, "indexLabel"=> "Lowest"),
	array("x"=> 30, "y"=> 50),
	array("x"=> 40, "y"=> 45),
	array("x"=> 50, "y"=> 52),
	array("x"=> 60, "y"=> 68),
	array("x"=> 70, "y"=> 38),
	array("x"=> 80, "y"=> 71, "indexLabel"=> "Highest"),
	array("x"=> 90, "y"=> 52),
	array("x"=> 100, "y"=> 60),
	array("x"=> 110, "y"=> 36),
	array("x"=> 120, "y"=> 49),
	array("x"=> 130, "y"=> 41)
);
?>
<!DOCTYPE html>
<head>
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
<p> Biểu Đồ Thống Kê Theo: </p>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
<footer>

</footer>
</html>