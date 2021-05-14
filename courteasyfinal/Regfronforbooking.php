<?php
	include "reg.php";
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
</head>

<body>
	<div class="login-page bk-img" style="background-image: url(assets/images/banner-image.jpg);">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-md-offset-4"><br><br>
						<h1 class="text-center text-bold text-light mt-2x">Sign Up</h1>
						<div class="well row pt-12x pb-6x bk-gray">
			<form action="reg.php" method="POST">
                <div class="form-group">
				<center><br><label>Full Name:</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  
              <input type="text" name="fullname" class=""
					"form-control" placeholder="Enter FullName"  required="required">
                </div>
                      
                <div class="form-group">
				<center><label>Contact Number:</label>&nbsp;  
              <input type="text" name="contactno" class=""
					"form-control" placeholder="Enter Mobile No. "  required="required">
                </div>
				<div class="form-group">
				<center><label>Address:</label>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
              <input type="text" name="address" class=""
					"form-control" placeholder="Enter Street Address"  required="required">
                </div>
				                <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				              <input type="text" name="city" placeholder="Enter City"  required="required">
                </div>
				                <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
				              <input type="text" name="country" placeholder="Enter State/Province"  required="required">
                </div>
                <div class="form-group">
				<center><label>Email Address:</label>&nbsp; &nbsp;
				              <input type="text" name="emailid" placeholder="Enter EmailAddress" required="required">
                </div>
                <div class="form-group">
				<center><label>Password: </label>&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
				
              <input type="password" name="password" class=""
					"form-control" placeholder="Password" required="required">
                </div>

				<div class="form-group">
&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<label>Select UserType: </label>
			<select  class=""name="role" id="role" required="required">
				<option class="form-control" value="role" required="required">Select</option>			
				<option class="form-control" value="Renter" required="required">Renter</option>
				<option class="form-control" value="Owner" required="required">Court Owner</option>
			</select>
		</div>
                <div class="form-group checkbox">
                  <input type="checkbox" id="terms_agree" required="required" >
                  <label for="terms_agree">I Agree with <a href="page.php?type=terms"> Terms and Conditions</a></label>
                </div>
				<div class="col-md-10 col-md-offset-4">
					<input type="submit" name="btnSignUp" class="btn btn-primary" value="S i g n U p">
				</div>

              </form>
			  <div class="col-md-10 col-md-offset-1"><br>
			 <center><p>Already got an account? <a href="loginforbooking.php">Login Here</a></p>
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