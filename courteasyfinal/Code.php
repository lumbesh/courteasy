<?php
session_start();
require_once"konek.php";

$message="";

if(isset($_POST["btnLogin"]))
{
	$username=$_POST["username"];
	$password=$_POST["password"];

	
	$query="SELECT * FROM tblusers WHERE EmailId='$username' AND Password='$password' AND status='0'";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($row["status"]=="0" ) {

			if($row["Role"]=="Renter"){
				$_SESSION['User']=$row["EmailId"];
				$_SESSION['role']=$row["Role"];
				header('Location:renterindex.php');
			}
			else {
				$_SESSION['Owner']=$row["EmailId"];
				$_SESSION['role']=$row["Role"];
				header('Location:indexowner.php');
			}
						 }
		}
	}
	else
	{
		echo "<script>alert('Incorrect email/password, please try again. Reach out to us if you are still experiencing the same problem, your account may be disabled'); window.location = './login.php';</script>";
	}

}
?>