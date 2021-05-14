<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{ 

if(isset($_POST['submit']))
  {
$location=$_POST['location'];
$courtbrand=$_POST['courtbrand'];
$courtoverview=$_POST['courtoverview'];
$price=$_POST['price'];
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
$vimage4=$_FILES["img4"]["name"];
$vimage5=$_FILES["img5"]["name"];
$volleyball=$_POST['volleyball'];
$basketball=$_POST['basketball'];
$shuttlecock=$_POST['shuttlecock'];
$net=$_POST['net'];
$washroom=$_POST['washroom'];
$scoreboard=$_POST['scoreboard'];
$water=$_POST['water'];
$bleachers=$_POST['bleachers'];
move_uploaded_file($_FILES["img1"]["tmp_name"],"img/courtimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"img/courtimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"img/courtimages/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"img/courtimages/".$_FILES["img4"]["name"]);
move_uploaded_file($_FILES["img5"]["tmp_name"],"img/courtimages/".$_FILES["img5"]["name"]);

$sql="INSERT INTO tblcourts(Location,CourtBrand,CourtOverview,Price,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,volleyball,basketball,shuttlecock,net,washroom,scoreboard,water,bleachers)
VALUES(:location,:courtbrand,:CourtOverview,:Price,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:volleyball,:basketball,:shuttlecock,:net,:washroom,:scoreboard,:water,:bleachers)";
$query = $dbh->prepare($sql);
$query->bindParam(':location',$location,PDO::PARAM_STR);
$query->bindParam(':courtbrand',$brand,PDO::PARAM_STR);
$query->bindParam(':courtoverview',$courtoverview,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':vimage1',$vimage1,PDO::PARAM_STR);
$query->bindParam(':vimage2',$vimage2,PDO::PARAM_STR);
$query->bindParam(':vimage3',$vimage3,PDO::PARAM_STR);
$query->bindParam(':vimage4',$vimage4,PDO::PARAM_STR);
$query->bindParam(':vimage5',$vimage5,PDO::PARAM_STR);
$query->bindParam(':volleyball',$volleyball,PDO::PARAM_STR);
$query->bindParam(':basketball',$basketball,PDO::PARAM_STR);
$query->bindParam(':shuttlecock',$shuttlecock,PDO::PARAM_STR);
$query->bindParam(':net',$net,PDO::PARAM_STR);
$query->bindParam(':washroom',$washroom,PDO::PARAM_STR);
$query->bindParam(':scoreboard',$scoreboard,PDO::PARAM_STR);
$query->bindParam(':water',$water,PDO::PARAM_STR);
$query->bindParam(':bleachers',$bleachers,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Court posted successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

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
	
	<title>CourtEasy | Admin Post Court</title>

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
					
						<h2 class="page-title">Post A Court</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Court Title<span style="color:red"></span></label>
<div class="col-sm-4">
<input type="text" name="location" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Select Court<span style="color:red"></span></label>
<div class="col-sm-4">
<select class="selectpicker" name="courtbrand" required>
<option value=""> Select </option>
<?php $ret="select id,BrandName from tblbrands";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->BrandName);?></option>
<?php }} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Court Overview<span style="color:red"></span></label>
<div class="col-sm-10">
<textarea class="form-control" name="courtoverview" rows="3" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Hour(in PHP)<span style="color:red"></span></label>
<div class="col-sm-4">
<input type="text" name="price" class="form-control" required>
</div>

<div class="form-group">
<div class="col-sm-12">
<h4><b>Upload Images</b></h4>
</div>
</div>


<div class="form-group">
<div class="col-sm-4">
Image 1 <span style="color:red"></span><input type="file" name="img1" required>
</div>
<div class="col-sm-4">
Image 2<span style="color:red"></span><input type="file" name="img2" required>
</div>
<div class="col-sm-4">
Image 3<span style="color:red"></span><input type="file" name="img3" required>
</div>
</div>

<div class="form-group">
<div class="col-sm-4">
Image 4<span style="color:red"></span><input type="file" name="img4" required>
</div>
<div class="col-sm-4">
Image 5<span style="color:red"></span><input type="file" name="img5" required>
</div>

</div>
<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
							

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Ammenities</div>
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="volleyball" name="volleyball" value="1">
<label for="volleyball">Volleyball</label>
</div>
</div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="basketball" name="basketball" value="1">
<label for="basketball"> Basketball </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="shuttlecock" name="shuttlecock" value="1">
<label for="shuttlecock"> Shuttlecock </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="net" name="net" value="1">
<label for="net"> Net </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="washroom" name="washroom" value="1">
<label for="washroom"> Washroom </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="scoreboard" name="scoreboard" value="1">
<label for="scoreboard"> Scoreboard </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="water" name="water" value="1">
<label for="water"> Water </label>
</div></div>
<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="bleachers" name="bleachers" value="1">
<label for="bleachers"> Bleachers </label>
</div></div>






											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save changes</button>
												</div>
											</div>

										</form>
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
</body>
</html>
<?php } ?>