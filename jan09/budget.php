

<?php
include 'lindex.php';

?>
<div class="row">
  <div class="col-sm-1"></div>
  <div class="col-sm-10">
      
      
<div class="table-responsive">
  <table class="table table-striped">
      <?php

include 'openDB.php';
include 'dquestions.php';

//$GET_BUDGETS="select * from dat_budgets";

$result = mysql_query($GET_BUDGETS) or die ("Getting entries failed" . mysql_error());

  $count=1;
$total_budgeted=0;

while($row = mysql_fetch_array($result)){
    
    if($count==1){
            echo " <thead><tr><th>#</th><th>Activity</th><th>Cost</th><th>Requested By</th><th>Updated On</th></tr></thead>";
        echo "<tr><td>" . $count . "</td><td>" .  $row['activity'] . "</td><td>" .  $row['amt'] . "</td><td>" . $row['requested_by'] . "</td><td>" . $row['last_updated']. "</td></tr>";
        $total_budgeted=$total_budgeted+$row['amt'];
    }else{
        
        echo "<tr><td>" . $count . "</td><td>" .  $row['activity'] . "</td><td>" .  $row['amt'] . "</td><td>" . $row['requested_by'] . "</td><td>" . $row['last_updated']. "</td></tr>";
        $total_budgeted=$total_budgeted+$row['amt'];
    }
    $count++;
    
    //echo "<tr><td colspan=3> Total" . $total_budgeted . "</td></tr>";
    
    
}
echo "</table></div>";


      
    
    
    echo "<div class=\"table-responsive\">";
  echo "<table class=\"table table-striped\">";
      
$carried_over=27000;
$sponsor_vageesh=20000;
echo "<thead><th>Total Costing [A]</th><th>" .$total_budgeted. "</th></thead>" ;
echo "<tr><td>Carried Over from last Year [B]</td><td>". $carried_over. "</td></tr>" ;
$balance=getBalance();
echo "<tr><td>Amt Collected from attendees (Excluding Hotel Charges) [C]</td><td>". $balance . "</td></tr>" ;
echo "<tr><td>Sponsor - Vagesh Hiremath [D]</td><td>". $sponsor_vageesh . "</td></tr>" ;
echo "<tr><td>Deficit [A -(B+C+D)]</td><td>". ($total_budgeted -($carried_over+$balance+$sponsor_vageesh)). "</td></tr>" ;

function getBalance(){
        
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';

    
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

$hotel_adults=850;
$hotel_kids=400;

$to_hotel_adults=0;
$to_hotel_kids=0;


  $count=1;
while($row = mysql_fetch_array($result)){

      
    $count++;
    
    if($row['age']<6){
        $infant=$infant+1;
    }//infant
    
    if($row['age'] >5 && $row['age'] <11){
       $kid_count=$kid_count+1;
        $to_hotel_kids=$to_hotel_kids+$hotel_kids;
        
    }//kids
    
    if($row['age']>10){
        $adult_count=$adult_count+1;
        $to_hotel_adults=$to_hotel_adults+$hotel_adults;
    }//adults
    
   
}//while
//$GET_ALL_PAID_ATTENDEES="SELECT t3.afname,t3.alname,t3.age,t3.price,t1.status,t1.paid_on FROM dat_payments t1,lkp_payments_attendees t2, dat_attendees t3 WHERE t1.id=t2.payment_id_fk AND t3.id=t2.attendee_id_fk and t1.status='Credit'";

$result = mysql_query("select * from dat_payments where status='Credit'") or die ("Getting entries failed" . mysql_error());



$total_paid=0;
$total_commision=0;


while($row = mysql_fetch_array($result)){
 
    $total_paid=$total_paid+$row['amt'];
    $total_commision=$total_commision+$row['insta_ded'];
    
}
    return (($total_paid-$total_commision)- ($to_hotel_adults+$to_hotel_kids) );
}//function
?>
        </table>
    
      </div>
    </div>
      <div class="col-sm-1"></div>
</div>