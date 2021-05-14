<?php 
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
  {
$courtname=$_POST['courtname'];
$courtlocation=$_POST['courtlocation'];
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
$tabletennis=$_POST['tabletennis'];
$badminton=$_POST['badminton'];
$swimming=$_POST['swimming'];
$boxing=$_POST['boxing'];
$boardgames=$_POST['boardgames'];
$ball=$_POST['ball'];
$ring=$_POST['ring'];
$gloves=$_POST['gloves'];
$maps=$_FILES["maps"]["name"];
$role=$_SESSION['Owner'];
$vhid=$_GET['vhid'];
move_uploaded_file($_FILES["img1"]["tmp_name"],"admin/img/courtimages/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"admin/img/courtimages/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"admin/img/courtimages/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"admin/img/courtimages/".$_FILES["img4"]["name"]);
move_uploaded_file($_FILES["img5"]["tmp_name"],"admin/img/courtimages/".$_FILES["img5"]["name"]);
move_uploaded_file($_FILES["maps"]["tmp_name"],"admin/img/courtimages/".$_FILES["maps"]["name"]);
$email=@$_SESSION['Owner'];
$sql="INSERT INTO tblcourts(CourtName,CourtLocation,CourtOverview,Price,Vimage1,Vimage2,Vimage3,Vimage4,Vimage5,volleyball,basketball,shuttlecock,net,washroom,scoreboard,water,bleachers,TableTennis,Badminton,Swimming,Boxing,BoardGames,Ball,Ring,Gloves,maps,Role)
VALUES(:courtname,:courtlocation,:courtoverview,:price,:vimage1,:vimage2,:vimage3,:vimage4,:vimage5,:volleyball,:basketball,:shuttlecock,:net,:washroom,:scoreboard,:water,:bleachers,:tabletennis,:badminton,:swimming,:boxing,:boardgames,:ball,:ring,:gloves,:maps,:role)";
$query = $dbh->prepare($sql);
$query->bindParam(':courtname',$courtname,PDO::PARAM_STR);
$query->bindParam(':courtlocation',$courtlocation,PDO::PARAM_STR);
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
$query->bindParam(':badminton',$badminton,PDO::PARAM_STR);
$query->bindParam(':tabletennis',$tabletennis,PDO::PARAM_STR);
$query->bindParam(':swimming',$swimming,PDO::PARAM_STR);
$query->bindParam(':boxing',$boxing,PDO::PARAM_STR);
$query->bindParam(':boardgames',$boardgames,PDO::PARAM_STR);
$query->bindParam(':ball',$ball,PDO::PARAM_STR);
$query->bindParam(':ring',$ring,PDO::PARAM_STR);
$query->bindParam(':gloves',$gloves,PDO::PARAM_STR);
$query->bindParam(':maps',$maps,PDO::PARAM_STR);
$query->bindParam(':role',$role,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Note: All information you listed should be true.

 

Thank you for your interest in using our website!

We have received your form for request for posting. Please note that this is an automated message and is not yet the confirmation of your request.

Our team will directly contact you to settle things and business matters. Hoping for your cooperation to serve our customers a smooth service.

Regards,

The CourtEasy Team ";
header('location: mycourt.php');
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
	
	<title>Add A Court</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="assets/css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="assets/css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="assets/css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="assets/css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="assets/css/style.css">
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
.form-group
{
	font-family:    Arial, Helvetica, sans-serif
	font-size:      80px;
	font-weight:    bold;
}
.page-title
{
	font-family:    Arial, Helvetica, sans-serif
	font-size:      150px;
	font-weight:    bold;
}
.row
{
	font-family:    Arial, Helvetica, sans-serif
	font-size:      150px;
	font-weight:    bold;
}
</style>

</head>
 
<body>
	<?php include('includes/headerowner.php');?>
	<div class="ts-main-content">
						<br><center><div h2 class="page-title">List A Court</div></center></br>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">

<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Court Name<span style="color:red"></span></label>
<div class="col-sm-4">
<input type="text" name="courtname" class="form-control" required>
</div>
<label class="col-sm-2 control-label">CourtName<span style="color:red"></span></label>
<div class="col-sm-4">
<select class="selectpicker" name="courtlocation" id="courtlocation" required>
<option value=""> Select </option>
<?php $ret="select id,LocationName from tbllocations";
$query= $dbh -> prepare($ret);
//$query->bindParam(':id',$id, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
foreach($results as $result)
{
?>
<option value="<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->LocationName);?></option>
<?php }} ?>

</select>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Court Overview<span style="color:red"></span></label>
<div class="col-sm-10">
<textarea class="form-control" name="courtoverview" rows="3" placeholder="Complete Address || Indoor or Outdoor || Other information" required></textarea>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Hour<span style="color:red" ></span></label>
<div class="col-sm-4">
<input type="text" name="price" class="form-control" required>
</div>
<option value=""> </option>

<br>
<br>
<br>
<br>
<br>
<pre>
<div class="col-sm-3">
<br><h5>Upload Images</h5>
</div>
</div>
<div class="form-group">
<div class="col-sm-4">
Image 1 <span style="color:red"></span><input type="file" name="img1" required>
</div>
<div class="col-sm-4">
Image 2 <span style="color:red"></span><input type="file" name="img2" required>
</div>
<div class="col-sm-4">
Image 3 <span style="color:red"></span><input type="file" name="img3" required>
</div>
</div>

<div class="form-group">
<div class="col-sm-4">
Image 4 <span style="color:red"></span><input type="file" name="img4" >
</div>
<div class="col-sm-4">
Image 5 <span style="color:red"></span><input type="file" name="img5" >
</div>

</div>
<div class="hr-dashed"></div>									
</div>
</div>
</div>
</div>
</pre>

<pre>
<div class="form-group">
<div class="col-sm-3">
<h5>Upload Image for Maps</h5>
Image<span style="color:red"></span><input type="file" name="maps" required>
<div class="hr-dashed"></div>
</div>
</div>									
</pre>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">SPORTS</div>
<div class="panel-body">


<div class="form-group">

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="volleyball" name="volleyball" value="1">
<label for="volleyball"> Volleyball </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="basketball" name="basketball" value="1">
<label for="basketball"> Basketball </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="tabletennis" name="tabletennis" value="1">
<label for="tabletennis"> Table Tennis </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="badminton" name="badminton" value="1">
<label for="badminton"> Badminton </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="swimming" name="swimming" value="1">
<label for="swimming"> Swimming </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="boxing" name="boxing" value="1">
<label for="boxing"> Boxing </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="boardgames" name="boardgames" value="1">
<label for="boardgames"> Board Games </label>
</div></div>
</div></div></div></div></div></div></div></div></div></div>
					<div class="row">
<div class="col-md-16">
<div class="panel panel-default">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="panel-heading">&nbsp;&nbsp;AMENITIES</div>
<div class="panel-body">


<div class="form-group">

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="ball" name="ball" value="1">
<label for="ball"> Balls </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="ring" name="ring" value="1">
<label for="ring"> Ring for basketball</label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="shuttlecock" name="shuttlecock" value="1">
<label for="shuttlecock"> Shuttlecock </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="net" name="net" value="1">
<label for="net"> Volleyball Net </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="washroom" name="washroom" value="1">
<label for="washroom"> Wash Room </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="scoreboard" name="scoreboard" value="1">
<label for="scoreboard"> Score Board </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="water" name="water" value="1">
<label for="water"> Water Fountain </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="bleachers" name="bleachers " value="1">
<label for="bleachers"> Bleachers </label>
</div></div>

<div class="col-sm-3">
<div class="checkbox checkbox-inline">
<input type="checkbox" id="gloves" name="gloves " value="1">
<label for="gloves"> Gloves for boxing </label>
</div></div>
				</div></div>

												<div class="col-sm-8 col-sm-offset-5">
												    <br><div class="form-group"></br>
													<a href="indexowner.php" class="btn">Back</a>&nbsp;
													<?php if($_SESSION['Owner'])
	{?>
													<input type="submit" class="btn" name="submit"></button>
													<?php } else { ?>
													<center><a href="loginforbooking.php" class="btn">Login First</a> 
													<?php } ?>
												
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
													<?php   ?>