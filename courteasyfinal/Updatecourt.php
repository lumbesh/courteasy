<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['Owner'])==0)
	{	
header('location:indexowner.php');
}
else{ 

if(isset($_POST['submit']))
  {
$courtname=$_POST['courtname'];
$courtoverview=$_POST['courtoverview'];
$price=$_POST['price'];
$vimage1=$_FILES["img1"]["name"];
$vimage2=$_FILES["img2"]["name"];
$vimage3=$_FILES["img3"]["name"];
$vimage4=$_FILES["img4"]["name"];
$vimage5=$_FILES["img5"]["name"];
$volleyball=$_POST['volleyball'];
$basketball=$_POST['basketball'];
$boxing=$_POST['boxing'];
$shuttlecock=$_POST['shuttlecock'];
$net=$_POST['net'];
$washroom=$_POST['washroom'];
$scoreboard=$_POST['scoreboard'];
$water=$_POST['water'];
$bleachers=$_POST['bleachers'];
$boardgames=$_POST['boardgames'];
$gloves=$_POST['gloves'];

$id=intval($_GET['id']);


$sql="update tblcourts set CourtName=:courtname,CourtOverview=:courtoverview,Price=:price,gloves=:gloves,boxing=:boxing,boardgames=:boardgames,volleyball=:volleyball,basketball=:basketball,shuttlecock=:shuttlecock,net=:net,washroom=:washroom,scoreboard=:scoreboard,water=:water,bleachers=:bleachers where id=:id ";
$query = $dbh->prepare($sql);
$query->bindParam(':courtname',$courtname,PDO::PARAM_STR);
$query->bindParam(':courtoverview',$courtoverview,PDO::PARAM_STR);
$query->bindParam(':price',$price,PDO::PARAM_STR);
$query->bindParam(':boxing',$boxing,PDO::PARAM_STR);
$query->bindParam(':volleyball',$volleyball,PDO::PARAM_STR);
$query->bindParam(':boardgames',$boardgames,PDO::PARAM_STR);
$query->bindParam(':basketball',$basketball,PDO::PARAM_STR);
$query->bindParam(':gloves',$gloves,PDO::PARAM_STR);
$query->bindParam(':shuttlecock',$shuttlecock,PDO::PARAM_STR);
$query->bindParam(':net',$net,PDO::PARAM_STR);
$query->bindParam(':washroom',$washroom,PDO::PARAM_STR);
$query->bindParam(':scoreboard',$scoreboard,PDO::PARAM_STR);
$query->bindParam(':water',$water,PDO::PARAM_STR);
$query->bindParam(':bleachers',$bleachers,PDO::PARAM_STR);

$query->bindParam(':id',$id,PDO::PARAM_STR);
$query->execute();
echo "<script>alert('Data updated successfully'); window.location = './mycourt.php';</script>";

 


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
<title>CourtEasy </title>
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

<!-- SWITCHER -->
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
        
<!-- Fav and touch icons -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon-icon/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon-icon/apple-touch-icon-114-precomposed.html">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon-icon/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="assets/images/favicon-icon/apple-touch-icon-57-precomposed.png">
<link rel="shortcut icon" href="assets/images/favicon-icon/favicon.png">
<!-- Google-Font-->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  
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
	<?php include('includes/headerowner.php');?>
	<div class="ts-main-content">
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					<br>
						<center><h2 class="page-title">Edit Court</h2></center>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<div class="panel-body">
<?php if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>
<?php 
$id=intval($_GET['id']);
$sql ="SELECT tblcourts.*,tblcourts.Vimage1,tblcourts.Vimage2,tblcourts.Vimage3,tblcourts.Vimage4,tblcourts.Vimage5,tblcourts.maps,tblcourts.volleyball,tblcourts.basketball,tblcourts.shuttlecock,tblcourts.net,tblcourts.washroom,tblcourts.scoreboard,tblcourts.water,tblcourts.bleachers,tblcourts.TableTennis,tblcourts.Badminton,tblcourts.Swimming,tblcourts.Boxing,tblcourts.BoardGames,tblcourts.Ball,tblcourts.Ring, tblcourts.Gloves,tbllocations.LocationName,tbllocations.id as bid from tblcourts join tbllocations on tbllocations.id=tblcourts.CourtLocation where tblcourts.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>

<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Court Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="courtname" class="form-control" value="<?php echo htmlentities($result->CourtName)?>" required>
</div>
</div>
											
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Court Overview<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="courtoverview" class="form-control" value="<?php echo htmlentities($result->CourtOverview)?>" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Price Per Hour<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="price" class="form-control" value="<?php echo htmlentities($result->Price);?>" required>
</div>
</div>


<div class="hr-dashed"></div>								
<div class="form-group">
<div class="col-sm-3">
<br><h5>Upload Images</h5>
</div>
</div>
<div class="form-group">
<div class="col-sm-4">
Image 1 <img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage1);?>" width="300" height="200" style="border:solid 1px #000">
<center><a href="changeimagecourt1.php?id=<?php echo htmlentities($result->id)?>">  &nbsp  &nbsp  &nbsp Change Image 1</a></center>
</div>
<div class="col-sm-4">
Image 2 
<img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage2);?>" width="300" height="200" style="border:solid 1px #000">
<center><a href="changeimagecourt2.php?id=<?php echo htmlentities($result->id)?>">  &nbsp  &nbsp  &nbsp Change Image 2</a></center>
</div>
<div class="col-sm-4">
Image 3
<img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage3);?>" width="300" height="200" style="border:solid 1px #000">
<center><a href="changeimagecourt3.php?id=<?php echo htmlentities($result->id)?>">  &nbsp  &nbsp  &nbsp Change Image 3</a></center>
</div>
</div>

<div class="form-group">
<div class="col-sm-4">
Image 4
<img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage4);?>" width="300" height="200" style="border:solid 1px #000">
<center><a href="changeimagecourt4.php?id=<?php echo htmlentities($result->id)?>">  &nbsp  &nbsp  &nbsp Change Image 4</a></center>
</div>
<div class="col-sm-4">
Image 5 
<img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage5);?>" width="300" height="200" style="border:solid 1px #000">
<center><a href="changeimagecourt5.php?id=<?php echo htmlentities($result->id)?>">  &nbsp  &nbsp  &nbsp Change Image 5</a></center>
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
Image
<img src="admin/img/courtimages/<?php echo htmlentities($result->maps);?>" width="300" height="200" style="border:solid 1px #000">
<center><a href="changeimagemaps.php?id=<?php echo htmlentities($result->id)?>">  &nbsp  &nbsp  &nbsp Change Image </a></center>
</div>
<div class="hr-dashed"></div>
</div>
</div>									
</pre>
	
							

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">Ammenities</div>
<div class="panel-body">

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
<div class="panel-heading">SPORTS</div>
<div class="panel-body">


<div class="form-group">
<div class="col-sm-3">
<?php if($result->volleyball==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="volleyball" checked value="1">
<label for="inlineCheckbox1"> Volleyball </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox1" name="volleyball" value="1">
<label for="inlineCheckbox1"> Volleyball </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->basketball==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox2" name="basketball" checked value="1">
<label for="inlineCheckbox2"> basketball </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox2" name="basketball" value="1">
<label for="inlineCheckbox2"> basketball </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->TableTennis==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" name="tabletennis" checked value="1">
<label for="inlineCheckbox3"> tabletennis </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox3" name="tabletennis" value="1">
<label for="inlineCheckbox3"> tabletennis </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->Badminton==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox4" name="badminton" checked value="1">
<label for="inlineCheckbox4"> badminton </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox4" name="badminton" value="1">
<label for="inlineCheckbox4"> badminton </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->Swimming==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox5" name="swimming" checked value="1">
<label for="inlineCheckbox5"> swimming </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox5" name="swimming" value="1">
<label for="inlineCheckbox5"> swimming </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->Boxing==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox6" name="boxing" checked value="1">
<label for="inlineCheckbox6"> boxing </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox6" name="boxing" value="1">
<label for="inlineCheckbox6"> boxing </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->BoardGames==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox7" name="boardgames" checked value="1">
<label for="inlineCheckbox7"> boardgames </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox7" name="boardgames" value="1">
<label for="inlineCheckbox7"> boardgames </label>
</div>
<?php } ?>
</div>
</div></div></div></div></div></div></div></div></div></div>
					<div class="row">
<div class="col-md-16">
<div class="panel panel-default">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<div class="panel-heading">&nbsp;&nbsp;AMENITIES</div>
<div class="panel-body">


<div class="form-group">

<div class="col-sm-3">
<?php if($result->Ball==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox8" name="ball" checked value="1">
<label for="inlineCheckbox8"> ball </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox8" name="ball" value="1">
<label for="inlineCheckbox8"> ball </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->Ring==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox9" name="ring" checked value="1">
<label for="inlineCheckbox9"> ring </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox9" name="ring" value="1">
<label for="inlineCheckbox9"> ring </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->shuttlecock==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox10" name="shuttlecock" checked value="1">
<label for="inlineCheckbox10"> shuttlecock </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox10" name="shuttlecock" value="1">
<label for="inlineCheckbox10">shuttlecock </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->net==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox11" name="net" checked value="1">
<label for="inlineCheckbox11"> volleyball net </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox11" name="net" value="1">
<label for="inlineCheckbox11">volleyball net </label>
</div>
<?php } ?>
</div>


<div class="col-sm-3">
<?php if($result->washroom==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox12" name="washroom" checked value="1">
<label for="inlineCheckbox12"> washroom </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox12" name="washroom" value="1">
<label for="inlineCheckbox12"> washroom </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->scoreboard==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox13" name="scoreboard" checked value="1">
<label for="inlineCheckbox13"> scoreboard </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox13" name="scoreboard" value="1">
<label for="inlineCheckbox13"> scoreboard </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->water==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox14" name="water" checked value="1">
<label for="inlineCheckbox14"> water fountain </label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox14" name="water" value="1">
<label for="inlineCheckbox14"> water fountain </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->bleachers==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox15" name="bleachers" checked value="1">
<label for="inlineCheckbox15"> bleachers</label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox15" name="bleachers" value="1">
<label for="inlineCheckbox15"> bleachers </label>
</div>
<?php } ?>
</div>

<div class="col-sm-3">
<?php if($result->Gloves==1)
{?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox16" name="gloves" checked value="1">
<label for="inlineCheckbox16"> gloves</label>
</div><?php } else { ?>
<div class="checkbox checkbox-inline">
<input type="checkbox" id="inlineCheckbox16" name="gloves" value="1">
<label for="inlineCheckbox16"> gloves </label>
</div>
<?php } ?>
</div>
				</div></div>
<?php }} ?>


											<div class="form-group">
												<div class="col-sm-6 col-sm-offset-5" >
													
													<button class="btn btn-primary" name="submit" type="submit" style="margin-top:4%">Save changes</button>
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
<!--Footer -->
<?php include('includes/footerowner.php');?>
<!-- /Footer--> 
				
<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 
	

	<!-- Loading Scripts -->
	<script src="fromadmin/js/jquery.min.js"></script>
	<script src="fromadmin/js/bootstrap-select.min.js"></script>
	<script src="fromadmin/js/bootstrap.min.js"></script>
	<script src="fromadmin/js/jquery.dataTables.min.js"></script>
	<script src="fromadmin/js/dataTables.bootstrap.min.js"></script>
	<script src="fromadmin/js/Chart.min.js"></script>
	<script src="fromadmin/js/fileinput.js"></script>
	<script src="fromadmin/js/chartData.js"></script>
	<script src="fromadmin/js/main.js"></script>
</body>
</html>
<?php }?>