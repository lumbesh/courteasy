<?php
	include "kode.php";
	include('includes/config.php');
	error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta name="keywords" content="">
<meta name="description" content="">
<title>CourtEasy</title>
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
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  

<!--Header--> 
<?php include('includes/renterheader.php');?>
<!-- /Header --> 

<!--Page Header-->

<!-- /Page Header--> 

	<div class="login-page bk-img"style="background-image: url(fromadmin/img/courtimages/indooraction.jpg);"><br><br><br>
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="well row pt-2x pb-3x bk-light">
							<br><br><br><div class="col-md-8 col-md-offset-2">
			<form action="kode.php" method="POST">

<?php 
$id=intval($_GET['id']);
$sql ="SELECT tblcourts.*,tbllocations.LocationName,tblcourts.id,tbllocations.id as bid from tblcourts join tbllocations on tbllocations.id=tblcourts.CourtLocation where tblcourts.id=:id";
$query = $dbh -> prepare($sql);
$query-> bindParam(':id', $id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
				<div class="form-group">
					&nbsp;<center><h4>THANK YOU FOR CHOOSING</label>&nbsp; &nbsp; 
        <center><h2><input type="hidden" name="id" class="form-control" value="<?php echo htmlentities($result->id)?>" required></h2>
		       <center><input type="text" name="courtname" class="form-control" value="<?php echo htmlentities($result->CourtName)?>" required></h2>
				</div>

				</div>
				<p class="text" style="color:red">
					<?php echo $message;?>
				</p>
				<div class="form-group">
				<div class="col-md-2 col-md-offset-3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					 <center><input type="submit" name="btnLogin"  class="btn btn-primary" value="BOOK NOW">
				<br><br><br><br><br><br><br><br></div><br><br>
			</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="js.jquery.min.js"></script>
	<script type="text/javascript" src="js.bootstrap.min.js"></script>
	<script type="text/javascript" src="js.popper.min.js"></script>
</body>
</html>

<?php }} ?>