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
$sql = "UPDATE tblcourts SET status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Court Successfully Inactive/Not Posted";
}


if(isset($_REQUEST['aeid']))
	{
$aeid=intval($_GET['aeid']);
$status=1;

$sql = "UPDATE tblcourts SET status=:status WHERE  id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg="Court Successfully Active/Posted";
}

if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "delete from  tblcourts  WHERE id=:id";
$query = $dbh->prepare($sql);
$query -> bindParam(':id',$id, PDO::PARAM_STR);
$query -> execute();
$msg="Court info deleted";

}

if(isset($_REQUEST['disid']))
	{
$disid=intval($_GET['disid']);
$status=2;

$sql = "UPDATE tblcourts SET status=:status WHERE  id=:disid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':disid',$disid, PDO::PARAM_STR);
$query -> execute();

$msg="Court Successfully Disabled";
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
	
	<title>CourtEasy Portal |Admin Manage Court   </title>

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
						<h2 class="page-title">Manage Courts</h2>
						<!-- Zero Configuration Table -->
						<div class="panel panel-default">

							<div class="panel-body">
							<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<center><th>Court Name </th></center>
											<center><th>Court Location</th></center>
											<center><th>Price Per day</th></center>
											<center><th>Owner Name</th></center>
											<center><th> Status </th></center>
											<center><th>Action</th></center>
											<center><th>Edit</th></center>
										</tr>
									</thead>
									<tbody>

<?php $sql = "SELECT tblcourts.CourtName,tbllocations.LocationName,tblcourts.Price,tblcourts.Role,tblcourts.status,tblcourts.id,tblusers.FullName from tblcourts join tbllocations on tbllocations.id=tblcourts.CourtLocation join tblusers on tblcourts.Role=tblusers.EmailId";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{				?>	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<center><td><?php echo htmlentities($result->CourtName);?></td></center>
											<center><td><?php echo htmlentities($result->LocationName);?></td></center>
											<center><td><?php echo htmlentities($result->Price);?></td></center>
											<center><td><?php echo htmlentities($result->FullName);?></td></center>
<td><?php if($result->status=="" || $result->status==0)
{
	
	?><a href="manage-court.php?aeid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to Active')"> Active</a>
	<td>
<a href="manage-court.php?del=<?php echo $result->id;?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a> </td>
<td><a href="edit-court.php?id=<?php echo $result->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;</td>
<?php 
} else {?>


<a href="manage-court.php?eid=<?php echo htmlentities($result->id);?>" onclick="return confirm('Disable')"> Pending/Disable</a>

<td>
<a href="manage-court.php?del=<?php echo $result->id;?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a> </td>
<td><a href="edit-court.php?id=<?php echo $result->id;?>"><i class="fa fa-edit"></i></a>&nbsp;&nbsp;</td>
</td>

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
<?php }} ?>
