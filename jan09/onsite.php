<?php
include 'lindex.php';
?>
<div class="row">
  <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <?php
        session_start();
if (isset($_SESSION['msg'])){
echo "<h3>". $_SESSION['msg'] . "</h3>";
unset($_SESSION['msg']);
}
?>
        <form method=post action="onsite_action.php">
   
        <h2 class="form-signin-heading">Onsite Registration Form</h2>
              
      <label for="fname" >First Name</label>
        <input type="text" name="fname" id="fname" class="form-control" placeholder="First name" required>
      
      <label for="lname" >Last Name</label>
        <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required>
      
      <br>
      <label for="age" >Age</label>
      <input type="text" name="age" id="age" class="form-control" placeholder="Age - Needed for calculating payments:-)" required>
        <label for="gender" >Gender</label>
      <select id="gender" name="gender" class="form-control">
      <option value="Female">Female</option>
          <option value="Male">Male</option>
      </select>
      <label for="lname" >Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Email">
      <label for="lname" >Mobile Num</label>
        <input type="text" name="phnum" id="phnum" class="form-control" placeholder="Mobile Number">
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add Member</button>
      </form>
        <hr>
        <h2> Onsite Enrolled Members</h2>
    <?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include 'openDB.php';
include 'dquestions.php';

//$GET_MY_FAMILY_DETS='select t1.afname, t1.alname, t1.age,t1.gender, t1.created_on, t2.fname,t2.lname, t2.email, t2.mobile, t2.regon from dat_attendees t1,dat_regs t2 where t2.id=t1.parent_id_fk';
//session_start();

//$GET_ONSITE_ATTENDEES="SELECT t1.afname,t1.alname,t1.age,t1.gender,t1.created_on,t1.mobile,t1.email,t1.price, t2.fname AS regUser FROM dat_onsite_attendees t1, dat_regs t2 WHERE t1.parent_id_fk=t2.id";
//echo $SQL_GET_MY_FAMILY_DETS;

$result = mysql_query($GET_ONSITE_ATTENDEES) or die ("Getting entries failed" . mysql_error());

$price_total=0;
$count=1;

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

while($row = mysql_fetch_array($result)){

    if($count==1){
    echo "<br><br> <div class=table-responsive><table class=table table-striped><thead><tr><th>#</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Gender</th><th>Email</th><th>Phone</th><th>Amt (INR)</th><th>Registered By</th></tr></thead>";
    }

       
echo "<tr><td>" . $count ."</td><td>" . $row['afname']. "</td><td>" . $row['alname'] . "</td><td>" . $row['age']. "</td><td>" . $row['gender'].   "</td><td>". $row['email']. "</td><td>". $row['mobile']. "</td><td>". $row['price'] . "</td><td>". $row['regUser']."</td></tr>";
    
    
    $price_total=$price_total+$row['price'];
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
   
}
 echo "</table></div>";   

echo "<h2>Onsite Registrations amount collected is ". $price_total. "</h2>";


?>
        
           
        
         
    </div>
      
 
<div class="col-sm-2"></div></div>
   <div class="row">
  <div class="col-sm-2"></div>
        <div class="col-sm-8">
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
        <div class="col-sm-2"></div></div>
  
    