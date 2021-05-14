<?php
	include "code2.php";

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

	<div class="login-page bk-img" style="background-image: url(assets/images/banner-image2.jpg)" ;>
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold text-light mt-4x">Sign in</h1>
						<div class="well row pt-3x pb-3x bk-gray">
							<div class="col-md-10 col-md-offset-2">
			<form action="code2.php" method="POST">
				<div class="form-group">
					<label>Email Address</label>&nbsp; &nbsp; 
					<input type="email" name="username" class=""
					"form-control" placeholder="Enter Email">
				</div>
				<div class="form-group">
					<label>Password </label>&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; 
					<input type="password" name="password" class=""
					"form-control" placeholder="Enter pass">
				</div>
				
				</div>
				<p class="text" style="color:red">
					<?php echo $message;?>
				</p>
				<div class="form-group">
				<div class="col-md-10 col-md-offset-4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<input type="submit" name="btnLogin"  class="btn btn-primary" value="L o g i n">
					<a href="renterindex.php" class="btn btn-primary">Back</a>&nbsp;
				</div>
				</div>
								<div class="form-group">
				<div class="col-md-8 col-md-offset-2"><br>
					<li><p>Don't have an account? <a href="regfront.php">&nbsp;&nbsp;Sign Up Here</a><br>
					Forget Password? <a href="forgothtml.php">&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Click Here</a><li></p>
				</div>
				</div>
			</form>
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