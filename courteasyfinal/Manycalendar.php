<?php
session_start();
require_once"konek.php";

$message="";

if(isset($_POST["btnLogin"]))
{
	$username=$_POST["username"];
	$password=$_POST["password"];
	
	//<?php 
$vhid=intval($_GET['vhid']);
$sql = "SELECT tblvehicles.*,tblbrands.BrandName,tblbrands.id as bid  from tblvehicles join tblbrands on tblbrands.id=tblvehicles.VehiclesBrand where tblvehicles.id=:vhid";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  

	
	$query="SELECT * FROM tblusers WHERE EmailId='$username' AND Password='$password'";
	$result=mysqli_query($conn,$query);
	if(mysqli_num_rows($result)>0)
	{
		while($row=mysqli_fetch_assoc($result))
		{
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
	else
	{
		header('Location:login.php');
	}
}
?>