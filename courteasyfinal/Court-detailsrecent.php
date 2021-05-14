<?php 
session_start();
include('includes/config.php');
error_reporting(0);
require_once"kode.php";


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

<!-- Start Switcher -->
<?php include('includes/colorswitcher.php');?>
<!-- /Switcher -->  
    
<!--Header--> 
<?php include('includes/renterheader.php');?>
<!-- /Header --> 

<!--Page Header-->
<!-- /Page Header--> 

<!--Listing-Image-Slider-->
<?php 
$courtid=intval($_GET['courtid']);
$sql = "SELECT tblcourts.*,tbllocations.LocationName,tbllocations.id as bid  from tblcourts join tbllocations on tbllocations.id=tblcourts.CourtLocation where tblcourts.id=:courtid";
$query = $dbh -> prepare($sql);
$query->bindParam(':courtid',$courtid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['courtid']=$result->bid;  
?>  

<section id="listing_img_slider">
  <div><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage2);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage3);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <div><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage4);?>" class="img-responsive"  alt="image" width="900" height="560"></div>
  <?php if($result->Vimage5=="")
{

} 
else {
  ?>
  <div><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage5);?>" class="img-responsive" alt="image" width="900" height="560"></div>
  <?php } ?>
</section>
<!--/Listing-Image-Slider-->
<!--Listing-detail-->
<section class="listing-detail">
  <div class="container">
    <div class="listing_detail_head row">
      <div class="col-md-9">
        <h2><?php echo htmlentities($result->LocationName);?> , <?php echo htmlentities($result->CourtName);?></h2>
      </div>
      <div class="col-md-3">
        <div class="price_info">
          <p>₱<?php echo htmlentities($result->Price);?> </p>Per Hour
         
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-9">
        <div class="listing_more_info">
          <div class="listing_detail_wrap"> 
            <!-- Nav tabs -->
            <ul class="nav nav-tabs gray-bg" role="tablist">
              <li role="presentation"><a href="#court-overview" aria-controls="court-overview" role="tab" data-toggle="tab">Court Overview </a></li>
				
<li role="presentation"><a href="#ammenities" aria-controls="ammenities" role="tab" data-toggle="tab">Ammenities</a></li>

<li role="presentation"><a href="#maps" aria-controls="maps" role="tab" data-toggle="tab">Maps</a></li>
			</ul>
            
            <!-- Tab panes -->
            <div class="tab-content"> 
              <!-- Court-overview -->
               <div role="tabpanel" class="tab-pane active" id="court-overview">

				<p><?php echo wordwrap($result->CourtOverview,6,"  --  \n");?></p>

              </div>             
              
              <!-- Ammenities -->
              <div role="tabpanel" class="tab-pane" id="ammenities"> 
                <!--Ammenities-->
                <table>
                  <thead>
                    <tr>
                      <th colspan="2">SPORTS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
<td>Volleyball</td>
<?php if($result->volleyball==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>
<tr>
<td>Basketball</td>
<?php if($result->basketball==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>
<tr>
<td>Table Tennis</td>
<?php if($result->tabletennis==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>

<tr>
<td>Badminton</td>
<?php if($result->badminton==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>

<tr>
<td>Swimming</td>
<?php if($result->swimming==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>

<tr>
<td>Boxing</td>
<?php if($result->boxing==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>

<tr>
<td>Board Games</td>
<?php if($result->boardgames==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>


                  </tbody>
<thead>
                    <tr>
                      <th colspan="2">AMENITIES</th>
                    </tr>
                  </thead>
<td>Balls</td>
<?php if($result->ball==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>
<tr>
<td>Shuttlecock</td>
<?php if($result->shuttlecock==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>

<tr>
<td>Net</td>
<?php if($result->net==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>

<tr>
<td>Washroom</td>
<?php if($result->washroom==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>

<tr>
<td>Scoreboard</td>
<?php if($result->scoreboard==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>

<tr>
<td>Water Fountain</td>
<?php if($result->water==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>

<tr>
<td>Bleachers</td>
<?php if($result->bleachers==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>
<tr>
<td>Ring</td>
<?php if($result->ring==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>
<tr>
<td>Gloves</td>
<?php if($result->gloves==1)
{
?>
<td><i class="fa fa-check" aria-hidden="true"></i></td>

<?php } else { ?> 
<td><i class="fa fa-close" aria-hidden="true"></i></td>
<?php } ?> </tr>
                </table>
              </div>
              <!-- maps -->
			  <div role="tabpanel" class="tab-pane" id="maps">
		<div><img src="assets/images/<?php echo htmlentities($result->maps);?>" alt="image" width="800" height="560"></div>
			  </div>
			  </section>
            </div>
          </div>
          
        </div>
<?php }} ?>
								
<div class="col-sm-4 col-sm-offset-3">
<div class="form-group">
<a href="court-listing.php" class="btn">Back</a>&nbsp;
<?php if($_SESSION['User'])
              {?>

 <a href="mema.php?id=<?php echo $result->id;?>"" class="btn"  name="btnLogin" value="Book Now">Check Availability<span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
              
              <?php } else { ?>
<a href="loginforbooking.php" class="btn">Login First</a> 

        									<!--/<a href="calendar/calendar.php" class="btn">Check Availability <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a> </div>-->
												      <?php } ?>	</div></div>
												</div>
												</div>
												</div>
												</div>
											</div>

										</form>
									</div>  
									</div>
    <div class="space-20"></div>
    <div class="divider"></div>

      </div>
    </div>
    <!--/Similar-Cars--> 
    
  </div>
</section>
<!--/Listing-detail--> 

<!--Footer -->
<?php include('includes/footerrenter.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>

</body>
</html>

<?php ?>