<?php
include('konek.php');
extract($_REQUEST);
if(isset($btnSignUp))
{

  $sql= mysqli_query($conn,"select * from tblusers where emailid='$emailid' ");
  if(mysqli_num_rows($sql))
  {
$msg= "<h1 style='color:green'>Data Saved Successfully</h1>"; 
     header('location:regfront.php'); 
  }
  else
  {

      $sql="insert into tblusers(FullName,EmailId,Password,ContactNo,Address,City,Country,Role,image) values('$fullname','$emailid','$password','$contactno','$address','$city','$country','$role','$image')";
      if(mysqli_query($conn,$sql))
   {
   $msg= "<h1 style='color:green'>Data Saved Successfully</h1>"; 
   header('location:login.php'); 
   }
  }
}

?>
