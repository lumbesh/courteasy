<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen(@$_SESSION['Owner'])==0)
  { 
header('location:indexowner.php');
}
else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="2";
$sql = "UPDATE events SET Status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Successfully Cancelled";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE events SET Status=:status WHERE  id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg="Booking Successfully Confirmed";
}
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from  events  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Booking info deleted";

}
 ?>

<!doctype html>
<html lang="en" class="no-js">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
	<title>COURTEASY</title>
<!--Bootstrap -->
<link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
<!--Custome Style -->
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<!--OWL Carousel slider-->
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<!--slick-slider -->
<link href="assets/css/slick.css" rel="stylesheet">
<!--bootstrap-slider -->
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<!--FontAwesome Font Style -->
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}

		</style>

</head>

<body>

<body>
<?php include('includes/headerowner.php');?>
<section class="user_profile inner_pages">
  <div class="container">

  
    <div class="row">
      <div class="col-md-3 col-sm-5">
        <?php include('includes/sidebarowner.php');?>
 
      <div class="col-md-9  col-sm-31">
        <div class="profile_wrap">

         <center> <h6 class="uppercase underline">MY INCOME</center> 
	

							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table  class="display table table-striped table-bordered table-hover" cellspacing="2" width="200%">
								<center>	<thead>
										<center><tr>
									
										<th><b><center>Number of bookings</th></center>
											<th><b><center>Total price of bookings</th></center>
											<th><b><center>Service Fee</th></center>
							
											<th style="background-color:#00FF00;"><center>Total Income</th></center>
									
									
											<center><b><th><b>Status</th></center>
											
										</tr>
									</thead>									<tbody>


<?php
$useremail=$_SESSION['Owner'];
$sql = "SELECT count(name) as numbook, tblcourts.Price,SUM(HOUR(TIMEDIFF(end,start))) as hour, sum(MINUTE(TIMEDIFF(end,start))) as mins,sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60) as total,sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60)*0.05 as minustotal,sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60) -sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60)*0.05 as finaltotal from events join tblcourts on tblcourts.id=events.court where tblcourts.Role=:useremail AND events.Status=1";
$useremail=$_SESSION['Owner'];
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>	<tr>
	<tr>
										
											<center><td><center><?php echo htmlentities($result->numbook);?></td></center>

							<td><center><?php echo "₱" .round($result->total,2);?></td></center>
											<center><td><center><?php echo "₱" .round($result->minustotal,3);?></td></center>

											<center><td style="background-color:#00FF00;"><center><?php echo "₱" .round($result->finaltotal,3);?></td></center>
											
											<td><?php 
if($result->Status==1)
{
echo htmlentities('Not Confirmed yet');
} else if ($result->Status=1) {
echo htmlentities('Confirmed');
}
 else{
 	echo htmlentities('Cancelled');
 }
										?></td>
			
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table><br><br>
								      <center> <h6 class="uppercase underline">Payout Details</center> </h6>
				
								<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
										


<table id="zctb" class="display table table-striped table-hover" cellspacing="2" width="200%">
									<thead>
										<tr>
									
										<th><b><center>Reference Number</th></center>
										<th><b><center>Mode of Payment</th></center>
											<th style="background-color:#FF6347;"><b><center>Total Income - TransactionFee</th></center>
											<th style="background-color:#00FF00;"><b><center>Total Payouts</th></center>
											<th><b><center>Date Sent</th></center>
							
									
									
										</tr>
									</thead>									<tbody>


<?php 
$useremail=$_SESSION['Owner'];
$sql = "SELECT tbltransachistory.ref,tbltransachistory.postingdate,tbltransachistory.id,tbltransachistory.email,tbltransachistory.tfee,tbltransachistory.paytype,tbltransachistory.amount,amount-tfee as bayad from tbltransachistory where tbltransachistory.email=:useremail ";
//"SELECT tbltransachistory.postingdate,tbltransachistory.id,tbltransachistory.email,tbltransachistory.tfee,tbltransachistory.paytype,tbltransachistory.amount,amount-tfee as total,tblusers.FullName from tbltransachistory INNER JOIN tblusers on tbltransachistory.email=tblusers.FullName where tbltransachistory.email=$:useremail";
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>

	<tr>

											<td><center><?php echo htmlentities($result->ref);?></td></center>
											<center><td><center><?php echo  htmlentities($result->paytype);?></td></center>
<td style="background-color:#FF6347;"><center><b><?php echo "₱" .round($result->tfee);?></td></center>
							<td style="background-color:#00FF00;"><center><b><?php echo "₱" .round($result->bayad,2);?></td></center>
																			<center><td><center><?php echo htmlentities($result->postingdate);?></td></center>

		
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
									
								</table>	
								<section>
<div class="col-sm-4 col-sm-offset-8">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-dark "style="background-color:#FFF000;">
												<div class="stat-panel text-center">
<?php 
$useremail=$_SESSION['Owner'];
$sql = "SELECT tbltransachistory.ref,tbltransachistory.postingdate,tbltransachistory.id,tbltransachistory.email,tbltransachistory.tfee,tbltransachistory.paytype,tbltransachistory.amount,sum(amount-tfee) as feefee from tbltransachistory where tbltransachistory.email=:useremail ";
//"SELECT tbltransachistory.postingdate,tbltransachistory.id,tbltransachistory.email,tbltransachistory.tfee,tbltransachistory.paytype,tbltransachistory.amount,amount-tfee as total,tblusers.FullName from tbltransachistory INNER JOIN tblusers on tbltransachistory.email=tblusers.FullName where tbltransachistory.email=$:useremail";
$query = $dbh -> prepare($sql);
$query-> bindParam(':useremail', $useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>
											
													<div class="stat-panel-number h2 ">₱<?php echo   htmlentities($result->feefee);?></div>
													<div class="stat-panel-title text-uppercase">Total payouts</div>
												</div>
											</div>
											
										</div>
									</div>

							</div>
						</div>

					

					</div>
				</div>

			</div>
</section>

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
</body>
</html>
<?php } }}?>
