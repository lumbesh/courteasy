<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen(@$_SESSION['Owner'])==0)
  { 
header('location:indexowner.php');
}
else 
{
$error="Something went wrong. Please try again";
}
?>
<!doctype html>
<html lang="en">
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
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/headerowner.php');?>
<!--Page Header-->
<!-- /Header --> 

<!--Page Header-->

<!-- /Page Header--> 
    <div class="row"> 
      <!-- Nav tabs -->
      <!-- Recently Listed New Cars -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resentnewcourt">

<?php $sql = "SELECT tblcourts.*,tbllocations.LocationName,tbllocations.id as bid  from tblcourts join tbllocations on tbllocations.id=tblcourts.CourtLocation";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>  
<section id="listing_img_slider">
  <div><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="550" height="430"></div>
  <div><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" width="450" height="430"></div>
  <div><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" width="550" height="430"></div>
  <div><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive"  alt="image" width="550" height="430"></div>
  <?php if($result->Vimage5=="")
{
} else {
  ?>
  <div><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive" alt="image" width="550" height="430"></div>
  <?php } ?>
</section>
<div class="col-md-20 col-md-push-3">
<div class="recent-court-list">
<div class="court-info-box"> <a href="my-court.php?courtid=<?php echo htmlentities($result->id);?>">
</a>
</div>
<div class="court-title-xl"><center>
<center>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<h6><center><a href="updatecourt.php?id=
<?php echo htmlentities($result->id);?>">
<?php echo htmlentities($result->CourtName);?></a></h6>
<span class="price">₱<?php echo htmlentities($result->Price);?> /Hour</span> 
</div>
<div class="inventory_info_m">
<center><p>Court Overview: <?php echo substr($result->CourtOverview,0,70);?></p>
</div>
</div>
</div>
<?php }}?>
  <div class="container">
    <div class="section-header text-center"><br>
          <div class="banner_content"><br>
            <a href="updatecourt.php?id=<?php echo htmlentities($result->id);?>"class="btn btn-primary">Update Court<i class="fa fa-angleft-center" aria-hidden="true" ></i></a> </div>
        </div>
      </div>
    </div>
  </div>    
      </div>
<!--/my-vehicles--> 
<?php include('includes/footerowner.php');?>

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
</html>