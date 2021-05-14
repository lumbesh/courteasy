<?php
session_start();
require_once"konek.php";

$message="";

if(isset($_POST["btnLogin"]))
{
	$id=$_POST["id"];
	
	$courtid=intval($_GET['courtid']);
	$query="SELECT * FROM tblcourts WHERE id='$id'";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
			if($row["id"]=="2"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar.php');
			}
			elseif($row["id"]=="4"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar1.php');
			}
				elseif($row["id"]=="7"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar2.php');
				}
				elseif($row["id"]=="11"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar3.php');
				}
				elseif($row["id"]=="16"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar4.php');
				}
				elseif($row["id"]=="18"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar5.php');
				}
				elseif($row["id"]=="19"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar6.php');
				}
				elseif($row["id"]=="20"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar7.php');
				}
				elseif($row["id"]=="21"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar8.php');
				}
				elseif($row["id"]=="22"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar9.php');
				}
				elseif($row["id"]=="23"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar10.php');
				}
				elseif($row["id"]=="24"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar11.php');
				}
				elseif($row["id"]=="25"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar12.php');
				}
				elseif($row["id"]=="26"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar13.php');
				}
				elseif($row["id"]=="27"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar14.php');
				}
				elseif($row["id"]=="28"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar15.php');
				}
				elseif($row["id"]=="29"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar16.php');
				}
				elseif($row["id"]=="30"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar17.php');
				}
				elseif($row["id"]=="31"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar18.php');
				}
				elseif($row["id"]=="32"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar19.php');
				}
				elseif($row["id"]=="33"){
				$_SESSION['role']=$row["Role"];
				header('Location:calendar/calendar20.php');
				}


			else {

				header ('Location:mema.php');
			}
			
		}
	}
	else
	{
		echo "<script>alert('Court not Available, CHOOSE OTHER COURT.'); window.location = './court-listing.php';</script>";

	}
}
?>
