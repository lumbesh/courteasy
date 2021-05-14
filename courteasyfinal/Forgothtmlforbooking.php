<?php
	include "forgot.php";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Court | User Forgot Password</title>
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
					<div class="col-md-4 col-md-offset-4">
						<h1 class="text-center text-bold text-light mt-4x">Password Recovery</h1>
						<div class="well row pt-2x pb-3x bk-gray">

              <form name="chngpwd" method="post" onSubmit="return valid();">
                <div class="form-group"><br>
				<label>Email Address:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
                  <input type="email" name="email" class="" placeholder="Enter Email address" required="">
                </div>
  <div class="form-group">
  <label>Contact Number:</label>&nbsp; &nbsp; &nbsp;
                  <input type="text" name="contactno" class="" placeholder="Enter Registered Mobile" required="">
                </div>
  <div class="form-group">
  <label>New Password:</label>  &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="password" name="newpassword" class="" placeholder="New Password" required="">
                </div>
  <div class="form-group">
  <label>Confirm Password:</label>&nbsp;
                  <input type="password" name="confirmpassword" class="" placeholder="Confirm Password" required="">
                </div>
                <div class="form-group">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input type="submit" value="Reset My Password" name="update" class="btn btn-primary">
                </div>
              </form>
              <div class="text-center"><br>	
                <p><a href="loginforbooking.php"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Back to Login</a></p>
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
	<script type="text/javascript" src="js.popper.min.js"></script>
		
</body>
</html>