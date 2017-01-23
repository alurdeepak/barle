
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
    <link rel="stylesheet" href="/css/flipclock.css">

		<script src="/js/jquery-3.1.1.js"></script>

		<script src="/js/flipclock.js"></script>
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
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        
      
        
         <div class="clock" style="margin:2em;"></div>
		
        
		<script type="text/javascript">
			var clock;

			$(document).ready(function() {

				// Grab the current date
				var currentDate = new Date();

				// Set some date in the future. In this case, it's always Jan 1
				var futureDate  = new Date(2017, 0, 8,8,30);

				// Calculate the difference in seconds between the future and current date
				var diff = futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

				// Instantiate a coutdown FlipClock
				clock = $('.clock').FlipClock(diff, {
					clockFace: 'DailyCounter',
					countdown: true,
				});
			});
		</script>
          <div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="70"
  aria-valuemin="0" aria-valuemax="100" style="width:70%">
   <?php include 'reg_members.php' ?> Confirmed attendees! 
  </div>
</div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
    <li data-target="#myCarousel" data-slide-to="3"></li>
      <li data-target="#myCarousel" data-slide-to="4"></li>
      <li data-target="#myCarousel" data-slide-to="5"></li>
      <li data-target="#myCarousel" data-slide-to="6"></li>
      <li data-target="#myCarousel" data-slide-to="7"></li>
      <li data-target="#myCarousel" data-slide-to="8"></li>
      <li data-target="#myCarousel" data-slide-to="9"></li>
      <li data-target="#myCarousel" data-slide-to="10"></li>
      
      
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="hdesk2.jpg" alt="2016 G2G">
      <div class="carousel-caption">
        <h3>Invitation</h3>
        <p>To participate, click on the Signup link.</p>
      </div>
    </div>
      
      <div class="item">
      <img src="teaser_2812.jpg" alt="Invitation">
      <div class="carousel-caption">
        <h3>Invitation</h3>
        <p>You have come to the right place, click on the Signup link.</p>
      </div>
    </div>

    <div class="item">
      <img src="sponsers.jpg" alt="Chania">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>

       <div class="item">
      <img src="entartain.jpg" alt="Chania">
      <div class="carousel-caption">
        <h3>The most awaited event.</h3>
        <p></p>
      </div>
    </div>
      
      <div class="item">
      <img src="richard.jpg" alt="Chania">
      <div class="carousel-caption">
        <h3></h3>
        <p></p>
      </div>
    </div>
      
       <div class="item">
      <img src="patil.JPG" alt="Chania">
      <div class="carousel-caption">
        <h3>2016 Event</h3>
        <p></p>
      </div>
    </div>
      
      
        
    <div class="item">
      <img src="crowd1.JPG" alt="Flower">
      <div class="carousel-caption">
        <h3>2016 Event</h3>
        
      </div>
    </div>

      
      <div class="item">
      <img src="atlunch.JPG" alt="Flower">
      <div class="carousel-caption">
        <h3>2016 - Lunch Time</h3>
        <p></p>
      </div>
    </div>
      
      
      <div class="item">
      <img src="kidsdance.JPG" alt="Flower">
      <div class="carousel-caption">
        <h3>2016 Event</h3>
        <p>Kids Talents at it best.</p>
      </div>
    </div>
      <div class="item">
      <img src="kidsdance2.JPG" alt="Flower">
      <div class="carousel-caption">
        <h3>2016 Event</h3>
        <p>A platform to showcase talents. </p>
      </div>
    </div>
      <div class="item">
      <img src="kabaddi.JPG" alt="Flower">
      <div class="carousel-caption">
        <h3>2016 Event</h3>
        <p>Kabaddi Kabaddi kabaddi</p>
      </div>
    </div>
      
    <div class="item">
      <img src="songladies.jpg" alt="Flower">
      <div class="carousel-caption">
        <h3>Fashion Show</h3>
        <p>Uttara Karnataka Shyle alle Fashion Show</p>
      </div>
    </div>
      
      <div class="item">
      <img src="org1.jpg" alt="Flower">
      <div class="carousel-caption">
        <h3>Organizing Commitee</h3>
        <p>People behind this event</p>
      </div>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
    <div class="col-sm-2"></div>
      </div>
   
  
    </body></html>
    