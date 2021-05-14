<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>CourtEasy | Admin Dashboard</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
</head>
<style>

</style>
<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<center><h2 class="page-title">Our Earnings</h2>
						
						<div class="row">
							<div class="col-md-19">
								<div class="row">
							
<br><br>
<section>
<div class="col-sm-4 col-sm-offset-4">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-dark "style="background-color:#FFF000;">
												<div class="stat-panel text-center">
												<?php

$sql = "SELECT count(name) as numbook, tblcourts.Price,SUM(HOUR(TIMEDIFF(end,start))) as hour, sum(MINUTE(TIMEDIFF(end,start))) as mins,sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60) as total,sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60)*0.05 as minustotal,sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60) -sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60)*0.05 as finaltotal from events join tblcourts on tblcourts.id=events.court where events.Status=1";

$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>	<tr><br><br><br><br><br><br>
<div class="stat-panel-number h2 ">₱<?php echo   htmlentities (round($result->minustotal,2));?></div>
													<div class="stat-panel-title text-uppercase">Total </div>
												</div>
<br><br><br><br><br><br>
													
													
												</div>
											</div>
													</div>
									</div>
									
						
								
								</div>
							</div>
						</div>
					</div>
				</div>


<!---------------------------   ANOTHER LINE --------------->






			</div>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
	<script>
		
	window.onload = function(){
    
		// Line chart from swirlData for dashReport
		var ctx = document.getElementById("dashReport").getContext("2d");
		window.myLine = new Chart(ctx).Line(swirlData, {
			responsive: true,
			scaleShowVerticalLines: false,
			scaleBeginAtZero : true,
			multiTooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
		}); 
		
		// Pie Chart from doughutData
		var doctx = document.getElementById("chart-area3").getContext("2d");
		window.myDoughnut = new Chart(doctx).Pie(doughnutData, {responsive : true});

		// Dougnut Chart from doughnutData
		var doctx = document.getElementById("chart-area4").getContext("2d");
		window.myDoughnut = new Chart(doctx).Doughnut(doughnutData, {responsive : true});

	}
	</script>
</body>
</html>
<?php }}} ?>