<html>
  <head>
      
      <h2> Thank you for your inputs, Here is what others have to say...</h2>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
 var data = google.visualization.arrayToDataTable([
     
     
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';

$GET_SURVEY_QS="SELECT t1.id, t1.question FROM mas_survey_qs t1 where id=1";
$question="";
$result = mysql_query($GET_SURVEY_QS) or die ("Getting entries failed" . mysql_error());
$cdata="['Options','Option Count'],";
while($row = mysql_fetch_array($result)){
        
    $question=$row['question'];
    //echo "<br>";
    
// $GET_SURVEY_OPTIONS="select * from mas_survey_options where question_id_fk=";
    $SQL_GET_SURVEY_OPTIONS=$GET_SURVEY_OPTIONS . $row['id'];
    $result2 = mysql_query($SQL_GET_SURVEY_OPTIONS) or die ("Getting options failed" . mysql_error());
    $qcount=mysql_num_rows ($result2);  
    $count=1;
    while($row2 = mysql_fetch_array($result2)){
          //echo "id " . $row['id'];
        if($count==$qcount){
      $cdata=$cdata ."[\"" . $row2['options'] ."\", " . getOptionCount1($row2['id'],1) . "]";    
          //now get response count for each option
        }else{
            $cdata=$cdata ."[\"" . $row2['options'] ."\", " . getOptionCount1($row2['id'],1) . "],";    
        }
        $count++;
              
          }
        
              
              
    
    
      
    
    }//questions
$cdata=$cdata. "]);";
echo $cdata;

function getOptionCount1($optionid,$qid){
    $sql="select * from dat_survey_responses where question_id_fk=". $qid . " and response_id_fk=" . $optionid;
    $result2 = mysql_query($sql);
    return mysql_num_rows ($result2);
    
    
}//function
?>
    
 var options = {
          title: '<?php echo  $question?>',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d1'));
        chart.draw(data, options);
      }
    </script>
      
      
        <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
 var data = google.visualization.arrayToDataTable([
     
     
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';

$GET_SURVEY_QS="SELECT t1.id, t1.question FROM mas_survey_qs t1 where id=2";
$question="";
$result = mysql_query($GET_SURVEY_QS) or die ("Getting entries failed" . mysql_error());
$cdata="['Options','Option Count'],";
while($row = mysql_fetch_array($result)){
        
    $question=$row['question'];
    //echo "<br>";
    
// $GET_SURVEY_OPTIONS="select * from mas_survey_options where question_id_fk=";
    $SQL_GET_SURVEY_OPTIONS=$GET_SURVEY_OPTIONS . $row['id'];
    $result2 = mysql_query($SQL_GET_SURVEY_OPTIONS) or die ("Getting options failed" . mysql_error());
    $qcount=mysql_num_rows ($result2);  
    $count=1;
    while($row2 = mysql_fetch_array($result2)){
          //echo "id " . $row['id'];
        if($count==$qcount){
      $cdata=$cdata ."[\"" . $row2['options'] ."\", " . getOptionCount2($row2['id'],2) . "]";    
          //now get response count for each option
        }else{
            $cdata=$cdata ."[\"" . $row2['options'] ."\", " . getOptionCount2($row2['id'],2) . "],";    
        }
        $count++;
              
          }
        
              
              
    
    
      
    
    }//questions
$cdata=$cdata. "]);";
echo $cdata;

function getOptionCount2($optionid,$qid){
    $sql="select * from dat_survey_responses where question_id_fk=". $qid . " and response_id_fk=" . $optionid;
    $result2 = mysql_query($sql);
    return mysql_num_rows ($result2);
    
    
}//function
?>
    
 var options = {
          title: '<?php echo  $question?>',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d2'));
        chart.draw(data, options);
      }
    </script>
      
        <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
 var data = google.visualization.arrayToDataTable([
     
     
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';

$GET_SURVEY_QS="SELECT t1.id, t1.question FROM mas_survey_qs t1 where id=3";
$question="";
$result = mysql_query($GET_SURVEY_QS) or die ("Getting entries failed" . mysql_error());
$cdata="['Options','Option Count'],";
while($row = mysql_fetch_array($result)){
        
    $question=$row['question'];
    //echo "<br>";
    
// $GET_SURVEY_OPTIONS="select * from mas_survey_options where question_id_fk=";
    $SQL_GET_SURVEY_OPTIONS=$GET_SURVEY_OPTIONS . $row['id'];
    $result2 = mysql_query($SQL_GET_SURVEY_OPTIONS) or die ("Getting options failed" . mysql_error());
    $qcount=mysql_num_rows ($result2);  
    $count=1;
    while($row2 = mysql_fetch_array($result2)){
          //echo "id " . $row['id'];
        if($count==$qcount){
      $cdata=$cdata ."[\"" . $row2['options'] ."\", " . getOptionCount3($row2['id'],3) . "]";    
          //now get response count for each option
        }else{
            $cdata=$cdata ."[\"" . $row2['options'] ."\", " . getOptionCount3($row2['id'],3) . "],";    
        }
        $count++;
              
          }
        
              
              
    
    
      
    
    }//questions
$cdata=$cdata. "]);";
echo $cdata;

function getOptionCount3($optionid,$qid){
    $sql="select * from dat_survey_responses where question_id_fk=". $qid . " and response_id_fk=" . $optionid;
    $result2 = mysql_query($sql);
    return mysql_num_rows ($result2);
    
    
}//function
?>
    
 var options = {
          title: '<?php echo  $question?>',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d3'));
        chart.draw(data, options);
      }
    </script>
      
      
      
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
 var data = google.visualization.arrayToDataTable([
     
     
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';

$GET_SURVEY_QS="SELECT t1.id, t1.question FROM mas_survey_qs t1 where id=4";
$question="";
$result = mysql_query($GET_SURVEY_QS) or die ("Getting entries failed" . mysql_error());
$cdata="['Options','Option Count'],";
while($row = mysql_fetch_array($result)){
        
    $question=$row['question'];
    //echo "<br>";
    
// $GET_SURVEY_OPTIONS="select * from mas_survey_options where question_id_fk=";
    $SQL_GET_SURVEY_OPTIONS=$GET_SURVEY_OPTIONS . $row['id'];
    $result2 = mysql_query($SQL_GET_SURVEY_OPTIONS) or die ("Getting options failed" . mysql_error());
    $qcount=mysql_num_rows ($result2);  
    $count=1;
    while($row2 = mysql_fetch_array($result2)){
          //echo "id " . $row['id'];
        if($count==$qcount){
      $cdata=$cdata ."[\"" . $row2['options'] ."\", " . getOptionCount4($row2['id'],4) . "]";    
          //now get response count for each option
        }else{
            $cdata=$cdata ."[\"" . $row2['options'] ."\", " . getOptionCount4($row2['id'],4) . "],";    
        }
        $count++;
              
          }
        
              
              
    
    
      
    
    }//questions
$cdata=$cdata. "]);";
echo $cdata;

function getOptionCount4($optionid,$qid){
    $sql="select * from dat_survey_responses where question_id_fk=". $qid . " and response_id_fk=" . $optionid;
    $result2 = mysql_query($sql);
    return mysql_num_rows ($result2);
    
    
}//function
?>
    
 var options = {
          title: '<?php echo  $question?>',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d4'));
        chart.draw(data, options);
      }
    </script>
      
      <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
 var data = google.visualization.arrayToDataTable([
     
     
<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';

$GET_SURVEY_QS="SELECT t1.id, t1.question FROM mas_survey_qs t1 where id=5";
$question="";
$result = mysql_query($GET_SURVEY_QS) or die ("Getting entries failed" . mysql_error());
$cdata="['Options','Option Count'],";
while($row = mysql_fetch_array($result)){
        
    $question=$row['question'];
    //echo "<br>";
    
// $GET_SURVEY_OPTIONS="select * from mas_survey_options where question_id_fk=";
    $SQL_GET_SURVEY_OPTIONS=$GET_SURVEY_OPTIONS . $row['id'];
    $result2 = mysql_query($SQL_GET_SURVEY_OPTIONS) or die ("Getting options failed" . mysql_error());
    $qcount=mysql_num_rows ($result2);  
    $count=1;
    while($row2 = mysql_fetch_array($result2)){
          //echo "id " . $row['id'];
        if($count==$qcount){
      $cdata=$cdata ."[\"" . $row2['options'] ."\", " . getOptionCount5($row2['id'],5) . "]";    
          //now get response count for each option
        }else{
            $cdata=$cdata ."[\"" . $row2['options'] ."\", " . getOptionCount5($row2['id'],5) . "],";    
        }
        $count++;
              
          }
        
              
              
    
    
      
    
    }//questions
$cdata=$cdata. "]);";
echo $cdata;

function getOptionCount5($optionid,$qid){
    $sql="select * from dat_survey_responses where question_id_fk=". $qid . " and response_id_fk=" . $optionid;
    $result2 = mysql_query($sql);
    return mysql_num_rows ($result2);
    
    
}//function
?>
    
 var options = {
          title: '<?php echo  $question?>',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d5'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="piechart_3d1" style="width: 600px; height: 400px;"></div>
       <div id="piechart_3d2" style="width: 600px; height: 400px;"></div>
      <div id="piechart_3d3" style="width: 600px; height: 400px;"></div>
      <div id="piechart_3d4" style="width: 600px; height: 400px;"></div>
      <div id="piechart_3d5" style="width: 600px; height: 400px;"></div>
      <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/js/jquery-3.1.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.min.js"></script>
      
      
    
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

//$GET_ALL_PAID_ATTENDEES="SELECT t3.afname,t3.alname,t3.age,t3.price,t1.status,t1.paid_on FROM dat_payments t1,lkp_payments_attendees t2, dat_attendees t3 WHERE t1.id=t2.payment_id_fk AND t3.id=t2.attendee_id_fk and t1.status='Credit'";

$result = mysql_query("select * from dat_survey_responses  where question_id_fk=6") or die ("Getting entries failed" . mysql_error());

  $count=1;
while($row = mysql_fetch_array($result)){

    if($count==1){
    echo " <thead><tr><th>#</th><th>Feedback</th><th>Feedback Date</th></tr></thead>";
    }
    
echo "<tr><td>" . $count ."</td><td>" . $row['feedback']. "</td><td>" . $row['created_on'] . "</td></tr>";
    
    $count++;
    
        
}//while


//$_SESSION['to_hotel_adults']=$to_hotel_adults;
//$_SESSION['to_hotel_kids']=$to_hotel_kids;

  //echo "</table>Current Registered Users (Adults) - ". $adult_count;
//echo "<br>Current Registered Users (Kids) - ". $kid_count  . "</a>";

?>
        
      </div>
      <div class="col-sm-1"></div>
      </div></div>
    
    
