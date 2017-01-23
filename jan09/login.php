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
  <script>

      function callReg(){
       window.location="/register.php";  
      }

</script>
         <ul class="nav nav-tabs">
  <li class="active"> <a href="index.php">UKSL - Family Dayout</a></li>
  <li ><a href="register.php">Sign Up</a></li>
  <li><a href="login.php">Login</a></li>
<li><a href="olocation.php">Event Location</a></li>    
       <li><a href="ocmembers.php">Organizing Commitee</a></li>    
       <li><a href="oschedule.php">Event Schedule</a></li>    
       
            
</ul><br><br>
        <div class='row'>
        <div class='col-md-5'>
        <?php
session_start();
if(isset($_SESSION['msg'])){
echo "<div class=\"alert alert-danger\" role=\"alert\">" . $_SESSION['msg']. "</div><br><br>";
unset($_SESSION['msg']);	
}

?>
        </div>
        </div>
<div class='row'>
    <div class="col-sm-4"></div>
    <div class="col-sm-4"></div>
    <div class="col-sm-4"></div>
</div>
        <div class='row'>
            <div class="col-sm-4"></div>
        <div class='col-md-4'>
        <form class="form-horizontal" name="enter" id="enter" action="clogin.php" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="code" id="code" placeholder="Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
        <button type="submit" class="btn btn-success" onClick="lp()">Forgot Password</button>
        <script>
        function lp(){
         self.location="fpwd.php";   
        }
            
        </script>
        <!--<button type="button" class="btn btn-success" onclick=callReg()>Register</button>-->
    </div>
      
  </div>
</form>
        </div>
            <div class="col-sm-4"></div>
        </div>
      