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

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql ="SELECT id from tblusers ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$regusers=$query->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($regusers);?></div>
													<div class="stat-panel-title text-uppercase">Reg Users</div>
												</div>
											</div>
											<a href="reg-users.php" class="block-anchor panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default-center">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">

<?php 
$sql3 ="SELECT id from tblcourts ";
$query3= $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$courts=$query3->rowCount();
?>												
													<div class="stat-panel-number h1 "><?php echo htmlentities($courts);?></div>
													<div class="stat-panel-title text-uppercase">Listed Courts</div>
												</div>
											</div>
											<a href="manage-court.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
<?php 
$sql3 ="SELECT id from tbllocations ";
$query3= $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$brands=$query3->rowCount();
?>												
													<div class="stat-panel-number h1 "><?php echo htmlentities($brands);?></div>
													<div class="stat-panel-title text-uppercase">Listed Locations</div>
												</div>
											</div>
											<a href="manage-locations.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
	

<div class="row">
					<div class="col-md-12">

						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql4 ="SELECT id from tblsubscribers ";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$subscribers=$query4->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($subscribers);?></div>
													<div class="stat-panel-title text-uppercase">Subscibers</div>
												</div>
											</div>
											<a href="manage-subscribers.php" class="block-anchor panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$sql6 ="SELECT id from tblcontactusquery ";
$query6 = $dbh -> prepare($sql6);;
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$query=$query6->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
													<div class="stat-panel-title text-uppercase">Queries</div>
												</div>
											</div>
											<a href="manage-contactusquery.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php 
$sql5 ="SELECT id from tbltestimonial ";
$query5= $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$testimonial=$query5->rowCount();
?>

													<div class="stat-panel-number h1 "><?php echo htmlentities($testimonial);?></div>
													<div class="stat-panel-title text-uppercase">Testimonials</div>
												</div>
											</div>
											<a href="testimonials.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>


<!---------------------------   ANOTHER LINE --------------->
<div class="row">
					<div class="col-md-12">

						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql2 ="SELECT id from events ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$events=$query2->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($events);?></div>
													<div class="stat-panel-title text-uppercase">Bookings</div>
												</div>
											</div>
											<a href="manage-bookings.php" class="block-anchor panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql2 ="SELECT tblusers.FullName, count(name) as numbook, tblcourts.Price,SUM(HOUR(TIMEDIFF(end,start))) as hour, sum(MINUTE(TIMEDIFF(end,start))) as mins,sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60) as total,sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60)*0.05 as minustotal,sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60) -sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60)*0.05 as finaltotal from events join tblcourts on events.court=tblcourts.id join tblusers on tblcourts.Role=tblusers.EmailId where events.Status='1' AND tblusers.Role='Owner' group by tblusers.FullName";;
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$pay=$query2->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($pay);?></div>
													<div class="stat-panel-title text-uppercase">Court Owner Earnings</div>
												</div>
											</div>
											<a href="paycheck.php" class="block-anchor panel-footer text-center">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php 
$sql5 ="SELECT tbltransachistory.postingdate,tbltransachistory.status,tbltransachistory.id,tbltransachistory.email,tbltransachistory.tfee,tbltransachistory.paytype,tbltransachistory.amount,amount-tfee as total from tbltransachistory  ";

$query5= $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$tran=$query5->rowCount();
?>

													<div class="stat-panel-number h1 "><?php echo htmlentities($tran);?></div>
												<div class="stat-panel-title text-uppercase">Transaction History</div>
												</div>
											</div>
											<a href="transac.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>



<!---------------------------   ANOTHER LINE for earnings--------------->
<div class="row">
					<div class="col-md-12">

						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">


													<div class="stat-panel-number h1 "><?php echo htmlentities($tbl);?></div>
													<br><br><div class="stat-panel-title text-uppercase">Add Transaction</div>
												</div>
											</div>
											<a href="addpaymenttrans.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
												<?php 
$sql1 ="SELECT id from tblpages ";
$query1 = $dbh -> prepare($sql1);;
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$mm=$query6->rowCount();
?>
													<div class="stat-panel-number h1 "><?php echo htmlentities($pages);?></div>
													<br><br><div class="stat-panel-title text-uppercase"> Courts Pages</div>
												</div>
											</div>
											<a href="manage-pages1.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-4">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php 
$sql5 ="SELECT id from tblcontactusquery ";
$query5= $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$mm=$query5->rowCount();
?>

													<div class="stat-panel-number h1 "><?php echo htmlentities($contactinfo);?></div>
													<br><br><div class="stat-panel-title text-uppercase">Court Contact Info</div>
												</div>
											</div>
											<a href="update-contactinfo.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>




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
<?php } ?>