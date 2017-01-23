<?php

include 'lindex.php';
//include 'get_regs.php';

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Welcome - UK G2G</title>

    <!-- Bootstrap -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery-3.1.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
    
  </head>
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

//$GET_MY_FAMILY_DETS='select t1.id as mid, t2.id as pid, t1.afname, t1.alname, t1.age,t1.gender, t1.created_on, t1.parent_id_fk,t2.fname,t2.lname, t2.email, t2.mobile, t2.reg_on from dat_attendees t1,dat_regs t2 where t2.id=t1.parent_id_fk';

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

    //if($count==1){
    //echo " <thead><tr><th>#</th><th>First Name</th><th>Last Name</th><th>Mobile</th><th>Email</th><th>Age</th><th>Gender</th><th>Price</th><th>Paid On</th></tr></thead>";
    //}
    
//echo "<tr><td>" . $count ."</td><td>" . $row['afname']. "</td><td>" . $row['alname'] . "</td><td>" . $row['mobile']. "</td><td>" . //$row['email']. "</td><td>" . $row['age'] ."</td><td>" . $row['gender'] ."</td><td>" . $row['price']. "</td><td>" . $row['paid_on']."</td></tr>";
    
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


//$_SESSION['to_hotel_adults']=$to_hotel_adults;
//$_SESSION['to_hotel_kids']=$to_hotel_kids;

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
      <tr><td>Total Attendees (Infants+Kids+Adults)</td><td><?php echo $female_infants+$female_kids+$female_adults+ $male_infants+$male_kids+$male_adults ?></td></tr>  </table>
      </div></div>
        <div class="col-sm-1"></div></div>


