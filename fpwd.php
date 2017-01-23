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
  <li> <a href="index.php">UKSL - Family Dayout</a></li>
  <li ><a href="register.php">Sign Up</a></li>
  <li class="active"><a href="login.php">Login</a></li>
<li><a href="olocation.php">Event Location</a></li>    
       <li><a href="ocmembers.php">Organizing Commitee</a></li>    
       <li><a href="oschedule.php">Event Schedule</a></li>    
       
            
</ul><br><br>
        <div class='row'>
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
            <?php
session_start();
if(isset($_SESSION['msg'])){
echo "<div class=\"alert alert-danger\" role=\"alert\">" . $_SESSION['msg']. "</div><br><br>";
unset($_SESSION['msg']);	
}?>
        <ul class="list-group">
  <li class="list-group-item"><h2> Do You Know?</h2></li>
  <li class="list-group-item">A third of people now admit to having grown angry after struggling to remember login details, according to a new survey.
</li>
  <li class="list-group-item">The average person is thought to have to remember at least 19 passwords for logging into computers, email, online banking, social media, internet shopping and work servers.
</li>
              <li class="list-group-item">Respondents to a survey also rated forgetting a password as more annoying than misplacing their keys, and a mobile phone battery dying.

</li>
            
                 <li class="list-group-item">Forgetting a password has become so frustrating that now people boil over with anger, resorting to shouting, crying, swearing and even physical violence against their computer.


</li>
</ul>
        
           <form class="form-horizontal" name="enter" id="enter" action="fpwd_action.php" method="post">
  <div class="form-group">
       <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email registered with us. We will mail you a freshly prepared password :-)" required>
    </div> 
               </div>   
              <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Mail me my Password</button>
        <!--<button type="button" class="btn btn-success" onclick=callReg()>Register</button>-->
    </div>
      
               </form></div>
    <div class="col-sm-2"></div>
</div>
            
            