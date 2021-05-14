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
      <div class="col-md-9 col-sm-28">
        <div class="profile_wrap">
         <center> <h6 class="uppercase underline">MY INCOME</center> 
		 &nbsp;<center><h6><a href="wallet.php">&nbsp;&nbsp;My Income</a> 	</h1></center><br>
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>TOTAL EARNINGS</th>
											<th>Service Fee</th>
											<th>Pinaka Total</th>
											<th>Total of bookings</th>
									
											<th>Status</th>
											
										</tr>
									</thead>									<tbody>


<?php $sql = "SELECT events.Status,sum(minute(TIMEDIFF(end,start)))*9/60 *Price as total, sum(minute(TIMEDIFF(end,start)))*9/60 *Price*0.05 as minustototal1, SUM(minute(TIMEDIFF(end,start)))*9/60 *Price - SUM(minute(TIMEDIFF(end,start)))*9/60 *Price*0.05 AS finaltotal FROM events join tblcourts on events.court=tblcourts.id order by events.Status=2";//<?php $sql = "SELECT tblcourts.id,events.start,events.end,events.etc,events.Status,tblcourts.CourtName,tblusers.FullName FROM events JOIN tblcourts ON events.court=tblcourts.id ;

									//$sql = "SELECT tblcourts.CourtName,events.start,events.name,events.end,events.Status from events join tblcourts on events.court=tblcourts.CourtName";
									//$sql = "SELECT tblcourts.CourtName,events.name,events.start,events.end,events.Status from events join tblcourts on events.court=tblcourts.CourtName";
									
									

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
?>
	<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->total);?></td>
											<td><?php echo htmlentities($result->minustototal1);?></td>
											<td><?php echo htmlentities($result->finaltotal);?></td>
		
											<td><?php echo htmlentities($result->total);?></td>
						
											<td><?php 
if($result->Status==0)
{
echo htmlentities('Not Confirmed yet');
} else if ($result->Status==1) {
echo htmlentities('Confirmed');
}
 else{
 	echo htmlentities('Cancelled');
 }
										?></td>
										</tr>
										<?php $cnt=$cnt+1; }} ?>
										
									</tbody>
								</table>

		

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
<?php } ?>
