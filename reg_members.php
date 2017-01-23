

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

$hotel_adults=850;
$hotel_kids=400;

$to_hotel_adults=0;
$to_hotel_kids=0;


  $count=1;
while($row = mysql_fetch_array($result)){

    if($count==1){
  //  echo " <thead><tr><th>#</th><th>First Name</th><th>Last Name</th><th>Mobile</th><th>Email</th><th>Age</th><th>Gender</th><th>Price</th><th>Paid On</th></tr></thead>";
    }
    
//echo "<tr><td>" . $count ."</td><td>" . $row['afname']. "</td><td>" . $row['alname'] . "</td><td>" . $row['mobile']. "</td><td>" . $row['email']. "</td><td>" . $row['age'] ."</td><td>" . $row['gender'] ."</td><td>" . $row['price']. "</td><td>" . $row['paid_on']."</td></tr>";
    
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

echo $female_infants+$female_kids+$female_adults+ $male_infants+$male_kids+$male_adults;

?>
        
     
              
            