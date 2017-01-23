<?php
include 'lindex.php';

?>

<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
      
      
<div class="table-responsive">
  <table class="table table-striped">
<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';

//$GET_ALL_PAID_ATTENDEES="SELECT t3.afname,t3.alname,t3.age,t3.price,t1.status,t1.paid_on FROM dat_payments t1,lkp_payments_attendees t2, dat_attendees t3 WHERE t1.id=t2.payment_id_fk AND t3.id=t2.attendee_id_fk and t1.status='Credit'";

$result = mysql_query($GET_ALL_PAID_ATTENDEES) or die ("Getting entries failed" . mysql_error());

$infant=0;
$adult_count=0;
$kid_count=0;

$female_adults=0;
$female_kids=0;
$female_infants=0;

$male_adults=0;
$male_kids=0;
$male_infants=0;

  $count=1;
while($row = mysql_fetch_array($result)){

    if($count==1){
    echo " <thead><tr><th>#</th><th>First Name</th><th>Last Name</th><th>Mobile</th><th>Email</th><th>Age</th><th>Gender</th><th>Price</th><th>Paid On</th></tr></thead>";
    }
    
echo "<tr><td>" . $count ."</td><td>" . $row['afname']. "</td><td>" . $row['alname'] . "</td><td>" . $row['mobile']. "</td><td>" . $row['email']. "</td><td>" . $row['age'] ."</td><td>" . $row['gender'] ."</td><td>" . $row['price']. "</td><td>" . $row['paid_on']."</td></tr>";
    
    $count++;
    
    if($row['age']<6){
        $infant=$infant+1;
    }//infant
    
    if($row['age'] >5 && $row['age'] <11){
       $kid_count=$kid_count+1;
    }//infant
    
    if($row['age']>10){
        $adult_count=$adult_count+1;
    }//infant
    
    if($row['gender']=="Female" && $row['age']<6){
        $female_infants=$female_infants+1;
    }
    
    if($row['gender']=="Female" && ($row['age'] >5 && $row['age'] <11)){
        $female_kids=$female_kids+1;
    }
    
    if($row['gender']=="Female" && $row['age']>10){
       $female_adults=$female_adults+1;
    }
    
    
    if($row['gender']=="Male" && $row['age']<6){
        $male_infants=$male_infants+1;
    }
    
    if($row['gender']=="Male" && ($row['age'] >5 && $row['age'] <11)){
        $male_kids=$male_kids+1;
    }
    
    if($row['gender']=="Male" && $row['age']>10){
       $male_adults=$male_adults+1;
    }
    
}//while

  //echo "</table>Current Registered Users (Adults) - ". $adult_count;
//echo "<br>Current Registered Users (Kids) - ". $kid_count  . "</a>";

?>
        
      </div>
      <div class="col-sm-1"></div>
      </div></div>
    
    <div class="row">
  <div class="col-sm-1"></div>
        <div class="col-sm-10">
       <div class="table-responsive">
  <table class="table table-striped">
      <thead><tr><td></td><td></td></tr></thead>
      <tr><td>Female Infants - Age < 5</td><td><?php echo $female_infants ?></td></tr>
<tr><td>Female Kids - Age 6-10</td><td><?php echo $female_kids ?></td></tr>
   <tr><td>Female Adults - Age > 10</td><td><?php echo $female_adults ?></td></tr>   

       <tr><td>Male Infants - Age < 5</td><td><?php echo $male_infants ?></td></tr>
<tr><td>Male Kids - Age 6-10</td><td><?php echo $male_kids ?></td></tr>
   <tr><td>Male Adults - Age > 10</td><td><?php echo $male_adults ?></td></tr>  
      <tr><td>Total Billable Kids (excluding age < 6)</td><td><?php echo  $female_kids+$male_kids; ?></td></tr> 
      <tr><td>Total Billable Adults (age >10)</td><td><?php echo  $female_adults+$male_adults; ?></td></tr> 
      <tr><td>Total Attendees (Infants+Kids+Adults)</td><td><?php echo $female_infants+$female_kids+$female_adults+ $male_infants+$male_kids+$male_adults ?></td></tr>  
        
        </div>
        <div class="col-sm-1"></div>
           <div class="row">
  <div class="col-sm-1"></div>
               <div class="col-sm-10">
               <?php
    
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';

//$GET_ALL_PAID_ATTENDEES="SELECT t3.afname,t3.alname,t3.age,t3.price,t1.status,t1.paid_on FROM dat_payments t1,lkp_payments_attendees t2, dat_attendees t3 WHERE t1.id=t2.payment_id_fk AND t3.id=t2.attendee_id_fk and t1.status='Credit'";

$result = mysql_query("select * from dat_payments where status='Credit'") or die ("Getting entries failed" . mysql_error());



$total_paid=0;
$total_commision=0;
while($row = mysql_fetch_array($result)){
 
    $total_paid=$total_paid+$row['amt'];
    $total_commision=$total_commision+$row['insta_ded'];
    
}
    echo " <div class=table-responsive><table class=table table-striped><thead><tr><th>#</th><th>Total Paid</th><th>Commision Paid To Payment Gateway</th><th>Money in Bank</th></tr></thead>";
    echo " <tr><th></th><th>". $total_paid."</th><th>".$total_commision."</th><th>". ($total_paid-$total_commision)."</th></tr></table></div>";

include 'pattra.php';
    ?>
               
               </div>
               <div class="col-sm-10"></div>
           </div>