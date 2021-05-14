	<nav class="ts-sidebar">
	<ul class="ts-sidebar-menu">
<?php 
$courtid=intval($_GET['courtid']);
$sql = "SELECT tblcourts.*,tbllocations.LocationName,tbllocations.id as bid  from tblcourts join tbllocations on tbllocations.id=tblcourts.CourtLocation where tblcourts.id=18";
$query = $dbh -> prepare($sql);
$query->bindParam(':courtid',$courtid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  
$_SESSION['brndid']=$result->bid;  
?>  

<section class="ts-sidebar">
  <div class="ts-sidebar">
    <div class="ts-sidebar">
      <div class="col-md-1 col-md-push-1">
        <div class="result-sorting-wrapper">
          <div class="sorting-count">
          <div class="sorting-count">


          <H3><span>Summary</span></H3>
		  <div><img src="admin/img/courtimages/<?php echo htmlentities($result->Vimage1);?>" class="img-responsive" alt="image" width="300" height="300"></div>
          </div>
        
      </div>
      <div class="col-md-5">
        <div class="price_info">
		<h2><?php echo htmlentities($result->LocationName);?> , <?php echo htmlentities($result->CourtName);?><div align="text-right"><span class="h3">₱<?php echo htmlentities($result->Price);?> per hour</span></div></h2>
                  
              
            <?php  			
        
         $stmt = $conn->prepare('SELECT *,HOUR(TIMEDIFF(end,start)) as hour,  MINUTE(TIMEDIFF(end,start)) as mins, ROUND(TIMESTAMPDIFF(MINUTE, start, end) * ( 300 / 60 )) as total FROM events ORDER BY ID DESC LIMIT 1');
         $stmt1 = $conn->prepare('SELECT * FROM events ORDER BY ID DESC LIMIT 1');
      
        

          $stmt->execute();
         $stmt1->execute();
        
        
   
         $result = $stmt->fetchObject();
         $result1 = $stmt1->fetchObject();
         

        echo "Renter Name: " .$result->name;   echo "<br>";
        echo "Start Time:  " .$result1->start; echo "<br>";
        echo "End Time:  " .$result1->end; echo "<br>";
        echo "Total Hours:   " .$result-> hour; echo " Hours "; echo $result-> mins; echo " Minutes" ; echo "<br>";
        echo "Total Amount:  ₱" .$result -> total; echo "<br>";
       
       
       ?>


        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
	  


												<div class="form-group">
												<div class="col-sm-0 col-sm-offset-0">
												    <br><div class="form-group"></br></div>
    <div class="section-header" align="center"> <br>
          <a href="calendar/backend_delete.php?id=<?php echo $id['id']; ?>" class="btn">          <span class="angle_arrow">
              <i class="fa fa-angle-left" aria-hidden="true"></i></span> &nbsp; Change Schedule </a>
			  </div>
													<center><a href="payment.php" class="btn">Proceed to Checkout</a></center>&nbsp;</div>
											</div>

										</form>
									</div>
    </div>
    
      </div>
    </div>
    <!--/Similar-Cars--> 
    
</section>
<!--/Listing-detail--> 

<!--Footer -->
<?php include('includes/footerrenter.php');?>
<!-- /Footer--> 

<!--Back to top-->
<div id="back-top" class="back-top"> <a href="#top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
<!--/Back to top--> 


<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/interface.js"></script> 
<script src="assets/switcher/js/switcher.js"></script>
<script src="assets/js/bootstrap-slider.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/owl.carousel.min.js"></script>



</div>
		</nav><?php }} ?>