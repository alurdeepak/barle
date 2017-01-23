<?php
include 'lindex.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
?>

<div class="row">
  <div class="col-sm-4">
</div>
  <div class="col-sm-4"><form method=post action="update_profile_action.php">
   <?php
include 'openDB.php';
include 'dquestions.php';
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//session_start();

//$GET_USER_BY_ID='select * from dat_regs where id=';

$SQL_GET_USER_BY_LOGIN=$GET_USER_BY_ID.  $_SESSION['userdbid'];

$result = mysql_query($SQL_GET_USER_BY_LOGIN) or die ("Checking emp data failed" . mysql_error());
$row = mysql_fetch_array($result, MYSQL_ASSOC);

?>
      <?php
       // session_start();
if (isset($_SESSION['msg'])){
echo "<h3>". $_SESSION['msg'] . "</h3>";
unset($_SESSION['msg']);
}
?>
        <h2 class="form-signin-heading">My Profile</h2>
        <label for="inputEmail" >My Email address</label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="My Email address" required autofocus value="<?php echo $row['email']?>">
      
      <label for="inputPassword" >My Password</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Choose a Password - You will need this for online payments." required value="<?php echo $row['pwd']?>">
      
      <label for="mobnum" >My Mobile Number</label>
        <input type="text" name="mobnum" id="mobnum" class="form-control" placeholder="Your 10 digit Mobile Number - We will send notifications to this number." required value="<?php echo $row['mobile']?>">
      
      <label for="fname" >First Name</label>
        <input type="text" name="fname" id="fname" class="form-control" placeholder="Your First name" required value="<?php echo $row['fname']?>">
      
      <label for="lname" >Last Name</label>
        <input type="text" name="lname" id="lname" class="form-control" placeholder="Your Last Name" required value="<?php echo $row['lname']?>">
      <label for="address" >Your Mailing Address</label>
         <textarea class="form-control" rows="5" id="address" name="address" placeholder="On Availability Of Sponser, we will mail you the photos/videos. Enter house number, Bldg name, Street name, City and Landmarks here." required><?php echo $row['address'] ?></textarea>
      
      <label for="pcode" >Pin Code</label>
        <input type="text" name="pcode" id="pcode" class="form-control" placeholder="We may suggest car pooling based on your place of stay." required value="<?php echo $row['pincode']?>">
      <br>
     
      
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Update Profile</button>
      </form>

        </form></div>
  <div class="col-sm-4"></div>
</div>
<div>


    
        
    
    