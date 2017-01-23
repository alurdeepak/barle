<!DOCTYPE html>

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
  <body>
  <ul class="nav nav-tabs">
  <li class="active"> <a href="index.php">UKSL - Family Dayout</a></li>
  <li ><a href="register.php">Sign Up</a></li>
  <li><a href="login.php">Login</a></li>
<li><a href="olocation.php">Event Location</a></li>    
       <li><a href="ocmembers.php">Organizing Commitee</a></li>    
       <li><a href="oschedule.php">Event Schedule</a></li>    
       
            
</ul>
<div class="row">
  <div class="col-sm-4"><?php


session_start();
if (isset($_SESSION['msg'])){
echo "<h3>". $_SESSION['msg'] . "</h3>";
unset($_SESSION['msg']);
}


//include 'get_regs.php';
?>
</div>
  <div class="col-sm-4"><form method=post action="register_action.php">
   
        <h2 class="form-signin-heading">UK- G2G Registration Form</h2>
        <label for="inputEmail" >Your Email address</label>
        <input type="email" name="inputEmail" id="inputEmail" class="form-control" placeholder="Your Email address" required autofocus>
      
      <label for="inputPassword" >Password</label>
        <input type="password" name="inputPassword" id="inputPassword" class="form-control" placeholder="Choose a Password - You will need this for online payments." required>
      
      <label for="mobnum" >Mobile Number</label>
        <input type="text" name="mobnum" id="mobnum" class="form-control" placeholder="Your 10 digit Mobile Number - We will send notifications to this number." required>
      
      <label for="fname" >First Name</label>
        <input type="text" name="fname" id="fname" class="form-control" placeholder="Your First name" required>
      
      <label for="lname" >Last Name</label>
        <input type="text" name="lname" id="lname" class="form-control" placeholder="Your Last Name">
      
      <br>
      <label for="age" >Age</label>
      <input type="text" name="age" id="age" class="form-control" placeholder="Your age - Needed for calculating payments:-)" required>
        <label for="gender" >Gender</label>
      <select id="gender" name="gender" class="form-control">
      <option value="Female">Female</option>
          <option value="Male">Male</option>
      </select>
      
      <label for="address" >Your Mailing Address</label>
         <textarea class="form-control" rows="5" id="address" name="address" placeholder="On Availability Of Sponser, we will mail you the photos/videos. Enter house number, Bldg name, Street name, City and Landmarks here." required></textarea>
      
      <label for="pcode" >Pin Code</label>
        <input type="text" name="pcode" id="pcode" class="form-control" placeholder="We may suggest car pooling based on your place of stay." required>
      
        <label for="pcode" >Native Place</label>
        <input type="text" name="nplace" id="nplace" class="form-control" placeholder="We intend to connect you to others from same/nearby location." required>
      
        <label for="pcode" >College Attended</label>
        <input type="text" name="college" id="college" class="form-control" placeholder="We intend to connect you to others from same college." >
      
        <label for="pcode" >Year of Passing</label>
        <input type="text" name="yop" id="yop" class="form-control" placeholder="We intend to connect you to others.">
      
        <label for="address" >How would you like to be Introduced</label>
         <textarea class="form-control" rows="5" id="intro" name="intro" placeholder="Ex- I am Wali from Saundatti. I studied in BVB and am settled in Blore. I work for NTT." required></textarea>
      
      <label for="address" >What do you expect out of this event</label>
         <textarea class="form-control" rows="5" id="expect" name="expect" placeholder="Ex - Socializing, Good Lunch, Laughter etc."></textarea>
      
      <label for="address" >How can you contribute to this event/Grp</label>
         <textarea class="form-control" rows="5" id="contri" name="contri" placeholder="Ex - Arranging for sponsership, Event management, Entertainment etc ." ></textarea>
      
        <br>
      <!--  <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>-->
      </form>

        </form></div>
  <div class="col-sm-4"></div>
</div>
<div>


    
        
    
    