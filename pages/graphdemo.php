<?php

include('../includes/header.php');
?><!DOCTYPE HTML>
<html>
<head>
</head>
<body>
	<div class="container-fluid">
		<div id="chartContainer" style="height: 400px; width: 100%;"></div><br>
		<div id="chartContainer1" style="height: 400px; width: 100%;"></div>
	</div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
<script>
    $('#graph').addClass('active');

	$(document).ready(function(){
		$.ajax({
			url: 'graph_get.php',
            type: 'post',
            dataType: 'json',
			data: {status:'data'},
            success: function(data){
				var chart = new CanvasJS.Chart("chartContainer", {
					theme: "dark2", // "light1", "light2", "dark1", "dark2"
					exportEnabled: true,
					animationEnabled: true,
					title: {
						text: "Desktop Browser Market Share in 2016"
					},
					data: [{
						type: "pie",
						startAngle: 25,
						toolTipContent: "<b>{label}</b>: {y}",
						showInLegend: "true",
						legendText: "{label}",
						indexLabelFontSize: 16,
						indexLabel: "{label} - {y}",
						dataPoints: data
					}]
				});
				chart.render();
            },
			error: function(data){
                console.log(data);
            }
		});
	});
	$(document).ready(function(){
		$.ajax({
			url: 'graph_get.php',
            type: 'post',
            dataType: 'json',
			data: {data:'data'},
            success: function(data){
				var chart = new CanvasJS.Chart("chartContainer1", {
					theme: "dark2", // "light1", "light2", "dark1", "dark2"
					exportEnabled: true,
					animationEnabled: true,
					title: {
						text: "Desktop Browser Market Share in 2016"
					},
					data: [{
						type: "pie",
						startAngle: 25,
						toolTipContent: "<b>{label}</b>: {y}",
						showInLegend: "true",
						legendText: "{label}",
						indexLabelFontSize: 16,
						indexLabel: "{label} - {y}",
						dataPoints: data
					}]
				});
				chart.render();
            },
			error: function(data){
                console.log(data);
            }
		});
	});
	
	// window.onload = function() {

	// 	var chart = new CanvasJS.Chart("chartContainer", {
	// 				theme: "light2", // "light1", "light2", "dark1", "dark2"
	// 				exportEnabled: true,
	// 				animationEnabled: true,
	// 				title: {
	// 					text: "Desktop Browser Market Share in 2016"
	// 				},
	// 				data: [{
	// 					type: "pie",
	// 					startAngle: 25,
	// 					toolTipContent: "<b>{label}</b>: {y}%",
	// 					showInLegend: "true",
	// 					legendText: "{label}",
	// 					indexLabelFontSize: 16,
	// 					indexLabel: "{label} - {y}%",
	// 					dataPoints: [
	// 						{ y: 51.08, label: "Chrome" },
	// 						{ y: 27.34, label: "Internet Explorer" },
	// 						{ y: 10.62, label: "Firefox" },
	// 						{ y: 5.02, label: "Microsoft Edge" },
	// 						{ y: 4.07, label: "Safari" },
	// 						{ y: 1.22, label: "Opera" },
	// 						{ y: 0.44, label: "Others" }
	// 					]
	// 				}]
	// 			});
	// 			chart.render();
	// }
</script>
</body>
</html>

<?php

include('../includes/footer.php');
?>