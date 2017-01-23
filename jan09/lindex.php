<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['LOGIN']) || !isset($_SESSION['userdbid'])){
	$_SESSION['msg']="You have to be logged-in for the requested page. This system tracks illegal access.";
	header("Location: /login.php");
}
 error_reporting(E_ALL ^ (E_NOTICE | E_WARNING | E_DEPRECATED));
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
  <body>
      <nav class="navbar navbar-default">
     <div class="container">
   <ul class="nav navbar-nav">
  <li class="active"> <a href="dashboard.php">UKSL - Family Dayout</a></li>
  <li ><a href="myprofile.php">My Profile</a></li>
  <li><a href="myattendees.php">My Attendees</a></li>
<li><a href="location.php">Event Location</a></li>    
       <li><a href="cmembers.php">Organizing Commitee</a></li>    
       <li><a href="schedule.php">Event Schedule</a></li>    
  <li><a href="logout.php">Logout</a></li>
       
       <li><a href=""><?php session_start(); echo $_SESSION['LOGIN']. ", ";
           ?>Namaskar re pa!</a></li>
      
</ul>
      
          </div></nav>
    </body>
</html>
  