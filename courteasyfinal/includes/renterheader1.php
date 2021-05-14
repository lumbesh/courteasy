
<header>
  <div class="default-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3 col-md-2">
          <div class="logo"> <a href="index.php"><img src="assets/images/logo.jpg" alt="image"/></a> </div>
        </div>
        <div class="col-sm-9 col-md-10">
          <div class="header_info">
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-envelope" aria-hidden="true"></i> </div>
              <p class="uppercase_text">For Support Mail us : </p>
              <a href="Sign in - Google Accounts.html">courteasyph@gmail.com</a> </div>
            <div class="header_widgets">
              <div class="circle_icon"> <i class="fa fa-phone" aria-hidden="true"></i> </div>
              <p class="uppercase_text">Service Helpline Call Us: </p>
              <a href="tel:09264739204">09264739204</a> </div>
            <div class="social-follow">
              
            </div>
   <?php   if(strlen(@$_SESSION['User'])==0)
	{	
?>
 <div class="btn"> <a href="loginindex.php" class="btn btn-xs uppercase">Login/Sign Up </a> </div>
<?php }
else{ 

echo "Renter Account";
 } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Navigation -->
  <nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button id="menu_slide" data-target="#navigation" aria-expanded="false" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div class="header_wrap">
        <div class="user_login">
          <ul>
            <li class="dropdown"> <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle" aria-hidden="true"></i> 
<?php 
$email=@$_SESSION['User'];
$sql ="SELECT FullName FROM tblusers WHERE EmailId=:email ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->FullName); }}?><i class="fa fa-angle-down" aria-hidden="true"></i></a>
              <ul class="dropdown-menu">
           <?php if(@$_SESSION['User']){?>
		    <li><a href="profilerenter.php">Profile Settings</a></li>	
            <li><a href="update-passwordrenter.php">Update Password</a></li>
            <li><a href="post-testimonialrenter.php">Request Feedback</a></li>
            <li><a href="my-testimonialsrenter.php">My Feedback</a></li>
			<li><a href="mybooking.php">My Booking</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
            <li><a href="loginindex.php" >Profile Settings</a></li>
            <li><a href="loginindex.php" >Update Password</a></li>
            <li><a href="loginindex.php" >Post a Testimonial</a></li>
            <li><a href="loginindex.php"  >My Testimonial</a></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>

      </div>
      <div class="collapse navbar-collapse" id="navigation">
        <ul class="nav navbar-nav">
          <li><a href="renterindex.php">Home</a></li>	 
		  <li><a href="court-listing.php">Court Listing</a>       
      <li><a href="courtavai.php">Court Availability</a>       
		  <li><a href="pagerenter.php?type=aboutus">About Us</a></li>
          <li><a href="contactusrenter.php">Contact Us</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Navigation end --> 
  
</header>