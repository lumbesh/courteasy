<?php 
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit']))
  {
$FirstName=$_POST['FirstName'];
$LastName=$_POST['LastName'];
$cardnum=$_POST['cardnum'];
$exdate=$_POST['exdate'];
$ccv=$_POST['ccv'];

$emailid=@$_SESSION['User'];
$vhid=$_GET['vhid'];
$sql="INSERT INTO tblbooking(FirstName,LastName,cardnum,exdate,ccv,emailid) VALUES (:FirstName,:LastName,:cardnum,:exdate,:ccv,:emailid)";
$query = $dbh->prepare($sql);
$query->bindParam(':FirstName',$FirstName,PDO::PARAM_STR);
$query->bindParam(':LastName',$LastName,PDO::PARAM_STR);
$query->bindParam(':cardnum',$cardnum,PDO::PARAM_STR);
$query->bindParam(':exdate',$exdate,PDO::PARAM_STR);
$query->bindParam(':ccv',$ccv,PDO::PARAM_STR);
$query->bindParam(':emailid',$emailid,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
	echo "<script>alert('THANKYOU FOR BOOKING!'); window.location = './mybooking.php';</script>";

}
else 
{
$error="Something went wrong. Please try again";
header('location: summary.php');


}

}
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
 img11{
 height: 200px;
 width: 250px;
 border: 7px ridge blue;
 }
 #left{  
 float: left;
 }
 #right{  
 float: right;
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
//$sql="SELECT tblcourts.Vimage,tblcourts.CourtName,tblcourts.price,tblcourts.id,events.name,events.court from events join tblcourts on tblcourts.id=events.court order by id desc limit 1";
$sql="SELECT events.*,tblcourts.CourtName,tblcourts.Vimage1,tblcourts.Price, tblcourts.id as bid from events join tblcourts on events.court=tblcourts.id order by id desc limit 1";
// $sql = "SELECT tblcourts.*,tbllocations.LocationName,tbllocations.id as bid  from tblcourts join tbllocations on tbllocations.id=tblcourts.CourtLocation order by id desc limit 1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
?>  
<div class="col-md-5 col-md-push-1"><center>
<div class="recent-court-list">
 <h3><center>Booking Summary</center></H3>
		  <div><center><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="300" height="300"></div>

      <div class="col-md-30">
        <div class="price_info"><br><br>
		<h2><center><?php echo htmlentities($result->LocationName);?> <?php echo htmlentities($result->CourtName);?><div align="text-right"><span class="h3">₱<?php echo htmlentities($result->Price);?> per hour</span></div></h2>
<?php ?>                 
              
            <center>
<?php 
//select  DATEDIFF(day,SD.STARTDATE,SD.ENDDATE) AS TotalDays ,amount, DATEDIFF(day,SD.STARTDATE,SD.ENDDATE) * amount) as Result  from staydetails  			
//$sql="'SELECT events.*,HOUR(TIMEDIFF(end,start)) as hour,  MINUTE(TIMEDIFF(end,start)) as mins, ROUND(TIMESTAMPDIFF(MINUTE, start, end) * (6) as total FROM events ORDER BY ID DESC LIMIT 1";
$sql="SELECT events.*,tblcourts.Price,tblusers.FullName, HOUR(TIMEDIFF(end,start)) as hour, MINUTE(TIMEDIFF(end,start)) as mins,ROUND(TIMESTAMPDIFF(MINUTE, start, end))  * Price/60 as total FROM events join tblcourts on events.court=tblcourts.id join tblusers on events.name=tblusers.EmailId ORDER BY ID DESC LIMIT 1";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
{  

//$stmt = $conn->prepare('SELECT *,HOUR(TIMEDIFF(end,start)) as hour,  MINUTE(TIMEDIFF(end,start)) as mins, ROUND(TIMESTAMPDIFF(MINUTE, start, end) * ( 300 / 60 )) as total FROM events1 ORDER BY ID DESC LIMIT 1');
         //$stmt1 = $conn->prepare('SELECT * FROM events1 ORDER BY ID DESC LIMIT 1');
		echo "Renter Name: " .$result->FullName;   echo "<br>";
        echo "Start Time:  " .$result->start; echo "<br>";
        echo "End Time:  " .$result->end; echo "<br>";
         echo "Total Hours:   " .$result-> hour; echo " Hours "; echo $result-> mins; echo " Minutes" ; echo "<br>";
        echo "Total Amount:  ₱" .round($result ->total, 2); echo "<br>";
?>
        </div>
      </div>
	  </div>
    </div>
	</center>
<?php 
$sql = "SELECT type,detail,PageName,refund from tblpages where tblpages.id=3";
$query = $dbh -> prepare($sql);

$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>	
<div class="img11">
<div class="col-md-5 col-md-push-1"><center>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="admin/img/users/<?php echo htmlentities($result->refund);?>" width="400" height="400" id="center">	
</a>
</div>
</div>

<br><br><br><br><br><br><br><br><br><br><br><br>
<section class="img11">
<div class="col-md-5 col-md-push-1"><center>
 <div class="sorting-count">
    <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		PAYMENT METHOD <br>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">

	
	  			<div class="col-md-9 col-md-offset-3">
					<div class="form-group">
					
					<h6><a href="gcash.php">&nbsp;&nbsp;Manual Gcash</a> //
					<a href="paymaya.php">&nbsp;&nbsp;Manual Paymaya</a>
					
					</div> 
					<?php if($_SESSION['User'])
						{?>
		
<br><br><br><br><br><br>
</div>  </div>
</form>
<br><br>

			  </div>


					</div>
	   
</div>
          </div>	
		  			



		</div>
		</div>
		</div>
</section>

 <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>

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
<?php }}}}}}} ?>