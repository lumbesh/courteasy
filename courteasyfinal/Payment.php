<?php 
session_start();
include('includes/config.php');
error_reporting(0);

?>

<!DOCTYPE HTML>
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
<link rel="stylesheet" href="assets/css/style.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
<link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
<link href="assets/css/slick.css" rel="stylesheet">
<link href="assets/css/bootstrap-slider.min.css" rel="stylesheet">
<link href="assets/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" id="switcher-css" type="text/css" href="assets/switcher/css/switcher.css" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/red.css" title="red" media="all" data-default-color="true" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/orange.css" title="orange" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/blue.css" title="blue" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/pink.css" title="pink" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/green.css" title="green" media="all" />
		<link rel="alternate stylesheet" type="text/css" href="assets/switcher/css/purple.css" title="purple" media="all" />
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
<?php 
$courtid=intval($_GET['courtid']);
$sql = "SELECT tblcourts.*,tbllocations.LocationName,tbllocations.id as bid  from tblcourts join tbllocations on tbllocations.id=tblcourts.CourtLocation where tblcourts.id=18";
$query = $dbh -> prepare($sql);
$query->bindParam(':courtid',$courtid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  

<div class="col-list-3">
<br><div class="recent-court-list"></br>
 <H3><center>Booking Summary</center></H3>
<div class="court-info-box"> <a href="court-details.php?courtid=<?php echo htmlentities($result->id);?>">
<img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image">
</a>

</div>
<div class="court-title-m">
<h6><a href="court-details.php?courtid=
<?php echo htmlentities($result->id);?>">
<?php echo htmlentities($result->CourtName);?></a></h6>
<span class="price">₱<?php echo htmlentities($result->Price);?> /Hour</span> 
</div>
<div class="inventory_info_m">
<p><?php echo substr($result->name,0,70);  echo "<br>";?></p>
</div>
</div>

</div>

<!-- Banners -->
<section class="listing-page">
  <div class="container">
    <div class="row">
      <div class="col-md-9 col-md-push-1">

          <div class="sorting-count">
            <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PAYMENT DETAILS <br>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Paymaya</h3>
     
	  		<div class="col-md-4 col-md-offset-1">
							<div class="form-group">
  	  <label>First Name</label>
  	  <input type="text" name="cardnumber"> </div>
				<div class="form-group">
  	  <label>Card Number</label>
  	  <input type="text" name="cardnumber"> </div>
				<div class="form-group">
  	  <label>Expiry date</label>
  	  <input type="text" name="cv date">
  	</div><br><br><br><br><br><br><br><br><br><br>

	</div>
	
	<div class="col-md-4 col-md-offset-2">
	<div class="form-group">
  	  <label>Last Name</label>
  	  <input type="text" name="cardnumber"> </div><div class="form-group">
  	  <label>CVV</label>
  	  <input type="text" name="cv date">
  	</div>
	  </div>
	  				<br><br><br><br><br><br><br><br><br><br>	<div class="col-md-7 col-md-offset-13">
					<div class="form-group">
					
					<a href="paymaya.php">&nbsp;&nbsp;Manual Paymaya</a> //
					<a href="gcash.php">&nbsp;&nbsp;Manual Gcash</a><br>
					</div> 
          <a href="summary.php" class="btn">        
              <i  aria-hidden="true"></i>&nbsp;PAY NOW </a>
			  </div>
					</div>
	   
</div>
          </div>	
		  			



		</div>
		</div>
		</div>
</section>



<!-- /Banners --> 




<!--Footer -->
<?php include('includes/footerrenter.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 

<!-- Scripts --> 
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<!--Switcher-->
<script src="assets/switcher/js/switcher.js"></script>
<!--bootstrap-slider-JS--> 
<script src="assets/js/bootstrap-slider.min.js"></script> 
<!--Slider-JS--> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>


</body>

<!-- Mirrored from themes.webmasterdriver.net/carforyou/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Jun 2017 07:22:11 GMT -->
</html>
<?php }}?>