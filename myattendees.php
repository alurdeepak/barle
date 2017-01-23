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
        <form method=post action="myattendees_action.php">
   
        <h2 class="form-signin-heading">My Family Registration Form</h2>
              
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
      
      
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Add Member</button>
      </form>
        <hr>
        <h2> Enrolled Members</h2>
    <?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include 'openDB.php';
include 'dquestions.php';

//$GET_MY_FAMILY_DETS='select t1.afname, t1.alname, t1.age,t1.gender, t1.created_on, t2.fname,t2.lname, t2.email, t2.mobile, t2.regon from dat_attendees t1,dat_regs t2 where t2.id=t1.parent_id_fk';
//session_start();

$SQL_GET_MY_FAMILY_DETS=$GET_MY_FAMILY_DETS . " and t2.id=" . $_SESSION['userdbid'];
//echo $SQL_GET_MY_FAMILY_DETS;

$result = mysql_query($SQL_GET_MY_FAMILY_DETS) or die ("Getting entries failed" . mysql_error());

//get prices
//$GET_PRICES='select * from mas_prices';
$result3 = mysql_query($GET_PRICES) or die ("Getting prices failed" . mysql_error());
$row3 = mysql_fetch_array($result3);
$price_total=0;

  $count=1;
$payment_mobile=0;
$payment_name="";
$payment_email="";

while($row = mysql_fetch_array($result)){

    if($count==1){
    echo "<br><br> <div class=table-responsive><table class=table table-striped><thead><tr><th>#</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Gender</th><th></th><th>Event Price (INR)</th></tr></thead>";
    }

       
    $payment_mobile=$row['mobile'];
$payment_name=$_SESSION['LOGIN'];
$payment_email=$row['email'];
    
    if($row['afname']==$_SESSION['LOGIN']){
echo "<tr><td>" . $count ."</td><td>" . $row['afname']. "</td><td>" . $row['alname'] . "</td><td>" . $row['age']. "</td><td>" . $row['gender'].   "</td><td>You cannot delete your login :-)</td><td>". $row['price'] ."</td></tr>";
    }else{
        
   echo "<tr><td>" . $count ."</td><td>" . $row['afname']. "</td><td>" . $row['alname'] . "</td><td>" . $row['age']. "</td><td>" . $row['gender'].   "</td><td><a href=del_member.php?mid=" . $row['mid'] . ">Delete</a></td><td>".$row['price']."</td></tr>";  
    }
    
    $price_total=$price_total+$row['price'];
    $count++;
   
}

if($count==1){
    echo "You have not yet registered attendees.";
}else{
 echo "</table>";   
}
//https://imjo.in/829VWV

function getPaymentURL($amt,$payment_mobile,$payment_name,$payment_email){
    
   // echo  "$payment_mobile, $payment_name,$payment_email";
    $ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://www.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:351eb01358b59f9715d73f5704bf48a3","X-Auth-Token:77b966e2edbc3cd3ff9d15b5f1f573f3"));
$payload = Array('purpose' => 'UK- G2G 2017','amount' => $amt,'phone' => $payment_mobile,'buyer_name' => $payment_name,'redirect_url' => 'http://www.barle.in/thanks.php', 'send_email' => false,'webhook' => 'http://www.barle.in/receipt.php', 'send_sms' => false, 'email' => $payment_email,'allow_repeated_payments' => false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
//echo $ch;
curl_close($ch); 

$decoded_json = json_decode($response);
    
 
return $decoded_json->payment_request->longurl; 
    
}//function

//now check if this person has already made the payment
//$GET_PAYMENT_FOR_USER='select * from dat_payments where attendee_id_fk=';
//$GET_PAYMENT_FOR_FAMILY='SELECT t3.afname,t3.alname,t3.age,t3.price,t1.status,t1.paid_on FROM dat_payments t1,lkp_payments_attendees t2, dat_attendees t3 WHERE t1.id=t2.payment_id_fk AND t3.id=t2.attendee_id_fk AND t1.attendee_id_fk=';
$SQL_GET_PAYMENT_FOR_USER=$GET_PAYMENT_FOR_FAMILY . $_SESSION['userdbid'];
$result44 = mysql_query($SQL_GET_PAYMENT_FOR_USER) or die ("Getting payments user failed" . mysql_error());
$pay_count=0;
while($row44 = mysql_fetch_array($result44)){

    if($pay_count==0){
    echo "<br><h2>Payments Made</h2><br> <div class=table-responsive><table class=table table-striped><thead><tr><th>#</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Price (INR)</th><th>Status</th><th>Payment Date</th></tr></thead>";
        $pay_count++;
    }
    echo "<tr><td>".$pay_count."</td><td>". $row44['afname']."</td><td>".$row44['alname']."</td><td>".$row44['age']."</td><td>".$row44['price']." </td><td>". $row44['status']."</td><td>". $row44['paid_on'] ."</td></tr>";
    
    $pay_count++;
}
if($pay_count!=0){
    echo "</table></div>";
}
$SQL_GET_PAYMENTS_TO_BE_MADE=$GET_PAYMENTS_TO_BE_MADE . $_SESSION['userdbid'] .")) AND t1.parent_id_fk=" .$_SESSION['userdbid'];

//echo $SQL_GET_PAYMENTS_TO_BE_MADE;

$result55 = mysql_query($SQL_GET_PAYMENTS_TO_BE_MADE) or die ("Getting diff payments user failed" . mysql_error());
$pay_count55=0;
$total_to_pay=0;

while($row55 = mysql_fetch_array($result55)){

    if($pay_count55==0){
    echo "<br><h2>Payments To Be Made</h2><br> <div class=table-responsive><table class=table table-striped><thead><tr><th>#</th><th>First Name</th><th>Last Name</th><th>Age</th><th>Price (INR)</th></tr></thead>";
        $pay_count55++;
    }
    echo "<tr><td>".$pay_count55."</td><td>". $row55['afname']."</td><td>".$row55['alname']."</td><td>".$row55['age']."</td><td>".$row55['price'] ."</td></tr>";
    $total_to_pay=$total_to_pay+$row55['price'];
    $pay_count55++;
}
if($pay_count55!=0){
    echo "</table></div>";
}

//$purl=getPaymentURL($price_total,$payment_mobile,$payment_name,$payment_email);

?>
        
    <div class="form-group">
    <div class="col-sm-offset-1 col-sm-10">
        
        <?php
    if ($pay_count==0){
    $purl=getPaymentURL($price_total,$payment_mobile,$payment_name,$payment_email);
    ?>
      <button type="button" class="btn btn-success" onclick=callReg()>Make Online Payment(Credit/Debit Card/Netbanking/UPI) Of <?php echo $price_total ?> INR </button><br><br>
        
      
        <div class="alert alert-info">
            Payments made <strong>before Dec 31st 2016</strong> will be 1000/- for Adults and 500 for Children(aged between 6 and 10)</div>
        <div class="alert alert-warning">Registrations <strong>after Dec 31st 2016</strong> will be 1100/- for Adults and 600 for Children(aged between 6 and 10)
            </div>
        <script>
        function callReg(){
         location.href="<?php echo $purl?>";   
        }
        
        </script>
        <?php
}
        ?>
        
        
        
         <?php
    if ($pay_count55!=0 && $pay_count!=0){
    $purl=getPaymentURL($total_to_pay,$payment_mobile,$payment_name,$payment_email);
    ?>
      <button type="button" class="btn btn-success" onclick=callReg()>Make Online Payment(Credit/Debit Card/Netbanking/UPI) Of <?php echo $total_to_pay ?> INR </button><br><br>
        <div class="alert alert-info">
           Payments made <strong>before Dec 31st 2016</strong> will be 1000/- for Adults and 500 for Children(aged between 6 and 10)</div>
        <div class="alert alert-warning">Registrations <strong>after Dec 31st 2016</strong> will be 1100/- for Adults and 600 for Children(aged between 6 and 10)
            </div>
        <script>
        function callReg(){
         location.href="<?php echo $purl?>";   
        }
        
        </script>
        <?php
}
        ?>
        

    </div>
      
  </div> 
    </div>
  <div class="col-sm-2"></div>
  
    