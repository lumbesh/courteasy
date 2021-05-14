<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['User'])==0)
  { 
header('location:renterindex.php');
}
else{
?><!DOCTYPE HTML>
<html lang="en">
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
<?php include('includes/renterheader.php');?>
<!--Page Header-->
<!-- /Header --> 

<!--Page Header-->
<!-- /Page Header--> 

<?php 
$useremail=$_SESSION['User'];
$sql = "SELECT * from tblusers where EmailId=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<section class="user_profile inner_pages">
  <div class="container">

    <div class="row">
      <div class="col-md-3 col-sm-3">
       <?php include('includes/sidebar.php');?>
   
      <div class="col-md-6 col-sm-8">
        <div class="profile_wrap">
          <h5 class="uppercase underline">My Bookings </h5>	
<?php 
$useremail=$_SESSION['User'];
$sql = "SELECT tblcourts.id,tblcourts.CourtName,tbllocations.LocationName,tblcourts.CourtLocation,tbllocations.id,tblcourts.Vimage1,events.start,events.end,events.Status, HOUR(TIMEDIFF(end,start)) as hour, MINUTE(TIMEDIFF(end,start)) as mins,ROUND(TIMESTAMPDIFF(MINUTE, start, end))  * Price/60 as total from events join tblcourts on events.court=tblcourts.id join tbllocations on tblcourts.CourtLocation=tbllocations.id where name=:useremail ORDER BY start DESC ";
//$ql="Select tblusers. "
//$sql = "SELECT tblcourts.CourtName,tbllocations.LocationName,events.court,events.start,events.end, events.Status,eventsid from events join tblcourts on events.eventsid=tblcourts.id join tbllocations on tbllocations.id=tblcourts.CourtName";
//$sql = "SELECT tblcourts.*,tbllocations.LocationName,tbllocations.id as bid  from tblcourts join tbllocations on tbllocations.id=tblcourts.CourtLocation where tblcourts.id=:courtid";
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


<div class="col-list-2">
<div class="recent-court-list">
                <div><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="5000" height="500"></div>
                <div class="price_info"><br>
                <center><h4><?php echo htmlentities($result->CourtName);?>,<?php echo htmlentities($result->LocationName);?><div align="text-right"></span></div></h2></center>
                  <p><b>From Date:</b> <?php echo htmlentities($result->start);?> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	 Total: ₱<span class="price"> <?php echo "" .round($result->total,2);?> </span> 
				  <br /> <b>To Date:</b> <?php echo htmlentities($result->end);?></p>
                
                <?php if($result->Status==1)
                { ?>
                <center><div class="price_info"> <a class="btn outline btn-xs active-btn">Confirmed</a>
                           <div class="clearfix"></div>
        </div>
		</div>
		

              <?php } else if($result->Status==2) { ?>
 <center><div class="price_info"> <a class="btn outline btn-xs">Cancelled</a>
            <div class="clearfix"></div>
        </div>
             


                <?php } else { ?>
 <center><div class="price_info"> <a class="btn outline btn-xs">Not Confirm yet</a>
            <div class="clearfix"></div>
        </div>
                <?php } ?></div>
</div>

              </li>
                <?php } ?>

   </section>
<!--/my-vehicles--> 
<?php include('includes/footerrenter.php');?>

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
<?php }}}} ?>