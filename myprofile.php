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
     <label for="pcode" >Native Place</label>
        <input type="text" name="nplace" id="nplace" class="form-control" placeholder="We intend to connect you to others from same/nearby location." value="<?php echo $row['nativeplace']?>" required>
      
        <label for="pcode" >College Attended</label>
        <input type="text" name="college" id="college" class="form-control" placeholder="We intend to connect you to others from same college." value="<?php echo $row['college']?>">
      
        <label for="pcode" >Year of Passing</label>
        <input type="text" name="yop" id="yop" class="form-control" placeholder="We intend to connect you to others." value="<?php echo $row['yop']?>">
      
        <label for="address" >How would you like to be Introduced</label>
         <textarea class="form-control" rows="5" id="intro" name="intro" placeholder="Ex- I am Wali from Saundatti. I studied in BVB and am settled in Blore. I work for NTT." required><?php echo $row['intro']?></textarea>
      
      <label for="address" >What do you expect out of this event</label>
         <textarea class="form-control" rows="5" id="expect" name="expect" placeholder="Ex - Socializing, Good Lunch, Laughter etc."><?php echo $row['expect']?></textarea>
      
      <label for="address" >How can you contribute to this event/Grp</label>
         <textarea class="form-control" rows="5" id="contri" name="contri" placeholder="Ex - Arranging for sponsership, Event management, Entertainment etc ." ><?php echo $row['contribute']?></textarea>
      
        <br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Update Profile</button>
      </form>

        </form></div>
  <div class="col-sm-4"></div>
</div>
<div>


    
        
    
    