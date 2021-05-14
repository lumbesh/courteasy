<?php
//error_reporting(0);
include('includes/config.php');

if(isset($_POST['update']))
  {
$email=$_POST['email'];
$contactno=$_POST['contactno'];
$newpassword=$_POST['newpassword'];
  $sql ="SELECT EmailId FROM tblusers WHERE EmailId=:email and ContactNo=:contactno";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':contactno', $contactno, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update tblusers set Password=:newpassword where EmailId=:email and ContactNo=:contactno";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':contactno', $contactno, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');window.location.href='login.php';</script>";
  
}
else {
echo "<script>alert('Email id or Mobile no is invalid');</script>"; 
}
}


?>
  <script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>