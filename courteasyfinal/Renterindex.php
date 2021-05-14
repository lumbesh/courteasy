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
<style>
.div2212 {
  width: 300px;
  height: 100px;  
  padding: 50px;
  border: 1px solid red;
}
.div2 {
  background: #ffffff none repeat scroll 0 0;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
  margin-top: 50px;
   width: 350px;
  height: 400px;
}

</style>
</head>
<body>

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
        
<!--Header-->
<?php include('includes/renterheader.php');?>
<!-- /Header --> 

<!-- Banners -->
<!-- /Banners --> 


<!-- Resent Cat-->
<section class="section-padding gray-bg">
  <div class="container">
    <div class="section-header text-center">
      <h2>Find the Best <span>CourtForYou</span></h2>
      <p>Choosing the court that satisfies your comfortability is likely producing mental comfort or ease that will help you perform your best when in game. </p>
    </div>
    <div class="row"> 
      <!-- Nav tabs -->
      <div class="recent-tab">
        <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#resentnewcourt" role="tab" data-toggle="tab">Suggested Courts</a></li>
        </ul>
      </div>
      <!-- Recently Listed New Courts -->
      <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="resentnewcourt">

<?php
$tid=1;
 $sql = "SELECT tblcourts.*,tbllocations.LocationName,tbllocations.id as bid  from tblcourts join tbllocations on tbllocations.id=tblcourts.CourtLocation where tblcourts.status=:tid order by id desc limit 6" ;
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>  

<div class="col-list-3">
<br><div class="div2"></br>
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
<p><?php echo substr($result->CourtOverview,0,70);?></p>
</div>
</div>
</div>
<?php }}?>
  <div class="container">
    <div class="section-header text-center"><br>
          <div class="banner_content"><br></div>
		  <p>.</p><br>
            <a href="court-listing.php" class="btn">View More <i class="fa fa-angleft-center" aria-hidden="true"></i></a> </div>
        </div>
      </div>
    </div>
  </div>    
      </div>
    </div>
  </div>
</section>
<!-- /Resent Cat --> 

</section>


<!--Testimonial -->
<section class="section-padding testimonial-section parallex-bg">
  <div class="container div_zindex">
    <div class="section-header white-text text-center">
      <h2>Our Satisfied <span>Customers</span></h2>
    </div>
    <div class="row">
      <div id="testimonial-slider">
<?php 
$tid=1;
$sql = "SELECT tbltestimonial.Testimonial,tblusers.FullName,tblusers.image,tblusers.Role from tbltestimonial join tblusers on tbltestimonial.UserEmail=tblusers.EmailId where tbltestimonial.status=:tid";
$query = $dbh -> prepare($sql);
$query->bindParam(':tid',$tid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>


        <div class="testimonial-m">

          <div class="testimonial-img"> <img src="admin/img/users/<?php echo htmlentities($result->image);?>" style="float:left;width:100%;height:100%;object-fit:cover;" alt="image"/> </div>
          <div class="testimonial-content">
            <div class="testimonial-heading">
              <h5><?php echo htmlentities($result->FullName);?></h5>
            <p><?php echo htmlentities($result->Testimonial);?></p>
			<h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp <span class="price"><?php echo htmlentities($result->Role);?></h5>
          </div>
        </div>
        </div>
        <?php }} ?>
        
       
  
      </div>
    </div>
  </div>
  <!-- Dark Overlay-->
  <div class="dark-overlay"></div>
</section>
<!-- /Testimonial--> 



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