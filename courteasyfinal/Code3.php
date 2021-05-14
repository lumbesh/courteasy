<?php
session_start();
require_once"konek.php";

$message="";

if(isset($_POST["btnLogin"]))
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	
	$query="SELECT * FROM tblusers WHERE EmailId='$username' AND Password='$password'";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($row["Role"]=="Renter"){
				$_SESSION['User']=$row["EmailId"];
				$_SESSION['role']=$row["Role"];
				header('Location:court-listing.php');
			}
			else {
				$_SESSION['Owner']=$row["EmailId"];
				$_SESSION['role']=$row["Role"];
				header('Location:indexowner.php');
			}
			
		}
	}
	else
	{
		header('Location:login.php');
	}

}
?>