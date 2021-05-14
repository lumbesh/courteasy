<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['eid']))
	{
$eid=intval($_GET['eid']);
$status="0";
$sql = "UPDATE tbltransachistory SET status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Status Change";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE tbltransachistory SET status=:status WHERE  id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg="Successfully Changed";
}

if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from  tbltransachistory WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Info deleted";

}



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
	
	<title>CourtEasy Portal |Admin View Payment Transaction  </title>

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
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
						<h2 class="page-title">Earnings of Court Owner</h2>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">

							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>Court Owner Names</th>
											<th><b><center>Total price of bookings</th></center>
											<th><b><center>Service Fee</th></center>
											
											<th style="background-color:#00FF00;"><center>Total Income</th></center>
										
										
										</tr>
									</thead>
									<tbody>
<br>
<?php $sql ="SELECT tblusers.FullName, count(name) as numbook, tblcourts.Price,SUM(HOUR(TIMEDIFF(end,start))) as hour, sum(MINUTE(TIMEDIFF(end,start))) as mins,sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60) as total,sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60)*0.05 as minustotal,sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60) -sum(ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60)*0.05 as finaltotal from events join tblcourts on events.court=tblcourts.id join tblusers on tblcourts.Role=tblusers.EmailId where events.Status='1' AND tblusers.Role='Owner' group by tblusers.FullName";
//" SELECT tbltransachistory.tfee,tblusers.Role,tblcourts.CourtName,tblcourts.Price,tblusers.FullName,HOUR(TIMEDIFF(end,start)) as hour, MINUTE(TIMEDIFF(end,start)) as mins,ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60 as total,ROUND(TIMESTAMPDIFF(MINUTE, start, end)) * Price/60*0.05 as minustotal,ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60 - ROUND(TIMESTAMPDIFF(MINUTE, start, end)) * Price/60*0.05 as totalincome,ROUND(TIMESTAMPDIFF(MINUTE, start, end))*Price/60 - ROUND(TIMESTAMPDIFF(MINUTE, start, end)) * Price/60*0.05-tfee as pinakatotal from tblusers join tblcourts on tblcourts.Role=tblusers.EmailId join events on tblcourts.id=events.court join tbltransachistory on tblusers.FullName=tbltransachistory.email where tblusers.Role='Owner' group by tblusers.FullName";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($result->FullName);?></td>
		
							<td><center><?php echo "₱" .round($result->total,2);?></td></center>
											<center><td><center><?php echo "₱" .round($result->minustotal,3);?></td></center>
								
																				
											<center><td style="background-color:#00FF00;"><center><?php echo "₱" .round($result->finaltotal,3);?></td></center>
										
									

										</tr>
										<?php $cnt=$cnt+1; }} ?>
										 
									</tbody>
								</table>

						

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
</body>
</html>
<?php } ?>
