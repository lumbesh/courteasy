
<?php
include('konek.php');
extract($_REQUEST);
if(isset($btnSignUp))
{

  $sql= mysqli_query($conn,"select * from tblusers where emailid='$emailid' ");
  if(mysqli_num_rows($sql))
  {
echo "<script>alert('Email Address already exist!');</script>";

  }
  else
  {

      $sql="insert into tblusers(FullName,EmailId,Password,ContactNo,Address,City,Country,Role) values('$fullname','$emailid','$password','$contactno','$address','$city','$country','$role')";
      if(mysqli_query($conn,$sql))
   {
echo "<script>alert('Registration successfull. Now you can login');window.location.href='login.php';</script>";

   }
  }
}

?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Court | User Login</title>
	<link rel="stylesheet" href="fromadmin/css/font-awesome.min.css">
	<link rel="stylesheet" href="fromadmin/css/bootstrap.min.css">
	<link rel="stylesheet" href="fromadmin/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="fromadmin/css/bootstrap-social.css">
	<link rel="stylesheet" href="fromadmin/css/bootstrap-select.css">
	<link rel="stylesheet" href="fromadmin/css/fileinput.min.css">
	<link rel="stylesheet" href="fromadmin/css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="fromadmin/css/style.css">

<script>
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'emailid='+$("#emailid").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>

<body>
	<div class="login-page bk-img" style="background-image: url(assets/images/banner-image2.jpg)" ;>
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3"><br><br>
						<h1 class="text-center text-bold text-light mt-1x">Sign Up</h1>
						<div class="well row pt-8x pb-7x bk-gray">

			
              <form  method="post" name="btnSignUp" onSubmit="return valid();">
                <div class="form-group">
				<center><br><label>Full Name:</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  
              &nbsp; <input type="text" name="fullname" class=""
					"form-control" placeholder="Enter FullName"  required="required">
                </div>
                      
                <div class="form-group">
				<center><label>Contact Number:</label>&nbsp;  
             &nbsp;  <input type="char" name="contactno" class=""
					"form-control" placeholder="Enter Mobile No. "  maxlength="11" required="required">
                </div>
				<div class="form-group">&nbsp;&nbsp;&nbsp; &nbsp;  		 &nbsp;&nbsp; &nbsp;&nbsp; 		 &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; 
				   	<label>Address:</label>
             &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  <input type="text" name="address" class=""
					"form-control" placeholder="Enter Street Address"  required="required">
<br>
				           &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; <input type="text" name="city" placeholder="Enter City"  required="required"><br>

				           &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;     <input type="text" name="country" placeholder="Enter State/Province"  required="required">
                </div>
                <div class="form-group">
				<center><label>Email Address:</label>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
				          <input type="email" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                
                <div class="form-group">
				<center><label>Password: </label>&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
				
              <input type="password" name="password" class=""
					"form-control" placeholder="Password" required="required">
                </div>


				<div class="form-group">
<label for="role"> Select User Type: </label>
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	<select  name="role" id="role" required>
				&nbsp;&nbsp;&nbsp;&nbsp;	    <option value="">Select</option>
				<option value="Renter" >Renter</option>
				<option  value="Owner" >Court Owner</option>
			</select>
		</div>
                <div class="form-group checkbox">
                 <center> <input type="checkbox" id="terms_agree" required="required" >
                  <label for="terms_agree">I Agree with <a href="homepagerenter.php?type=terms"> Terms and Conditions</a> & <br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="homepagerenter.php?type=privacy"> Privacy and Policy</a> </label>
                </div>
				<div class="col-md-10 col-md-offset-1">
					<input type="submit" name="btnSignUp" class="btn btn-primary" value="S i g n    U p">
				</div>

              </form>
			  <div class="col-md-10 col-md-offset-1"><br>
			 <center><p>Already got an account? <a href="login.php">Login Here</a></p>
				</div>
			  <br><br>
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
</html>