<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }

error_reporting(0);
$message="";

if(isset($_POST["CheckAvailability"]))
{
	$courtname=$_POST["courtname"];
	$mema=$_POST["mema"];
	
	$query="SELECT * FROM tblcourts WHERE CourtName='$courtname' AND mema='$mema'";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($row["Role"]=="Renter"){
				$_SESSION['User']=$row["CourtName"];
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar1.php');
			}
			else {
				$_SESSION['Owner']=$row["CourtName"];
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar2.php');
			}
			
		}
	}
	else
	{
		header('Location:courtavai.php');
	}
}
?>