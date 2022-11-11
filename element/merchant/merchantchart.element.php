<script>
window.onload = function () {

var options = {
	animationEnabled: true,
	axisX: {
		valueFormatString: "YYYY-MMM-DD"
	},
	axisY: {
		title: "Sales (in PHP)",
		prefix: "₱",
		includeZero: false
	},
	data: [{
		yValueFormatString: "$#,###",
		xValueFormatString: "MMMM",
		type: "spline",
		dataPoints: [
      <?php
      $merchantId = $_SESSION['m_id'];

      $chartData = new ChartCntrl;
      $chartData->DataCntrl($merchantId);
      ?>

		]
	}]
};
$("#chartContainer").CanvasJSChart(options);

}
</script>
