
			<div class="col-sm-12">
				<p class="back-link">Made By JKKim. <a href="http://www.pati.co.kr" target="_blank">WEB</a> &nbsp;&nbsp;/&nbsp;&nbsp; <a href="http://m.pati.co.kr" target="_blank">MOB</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script src="/ad2/js/bootstrap.min.js"></script>
	<script src="/ad2/js/chart.min.js"></script>
	<script src="/ad2/js/chart-data.js"></script>
	<script src="/ad2/js/easypiechart.js"></script>
	<script src="/ad2/js/easypiechart-data.js"></script>
	<script src="/ad2/js/bootstrap-datepicker.js"></script>
	<script src="/ad2/js/custom.js"></script>
	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	});
};
	</script>

</body>
</html>
