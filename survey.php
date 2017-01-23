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
      <div class="container-fluid">
    <div class='row'>
        <div class='col-md-2'>
             </div>
        <div class='col-md-8'>
        <form class="form-horizontal" name="enter" id="enter" action="survey_action.php" method="post">
  <div class="form-group">
    

<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';

//$GET_SURVEY_QS="SELECT t1.id, t1.question FROM mas_survey_qs t1";

$result = mysql_query($GET_SURVEY_QS) or die ("Getting entries failed" . mysql_error());

echo "<h2>UKSL Jan 2017 Feedback Survey</h2><br>";
while($row = mysql_fetch_array($result)){
        
    
    echo "<br><label for=\"inputEmail3\" control-label\">". $row['id']. ". " .$row['question']."</label>";
    
// $GET_SURVEY_OPTIONS="select * from mas_survey_options where question_id_fk=";
    $SQL_GET_SURVEY_OPTIONS=$GET_SURVEY_OPTIONS . $row['id'];
    $result2 = mysql_query($SQL_GET_SURVEY_OPTIONS) or die ("Getting options failed" . mysql_error());
      while($row2 = mysql_fetch_array($result2)){
          //echo "id " . $row['id'];
          if($row['id']!=6){
            
          
          echo "<div class=\"radio\"><label><input type=\"radio\" name=". $row['id']." value=". $row['id'] ."-".$row2['id']. ">".$row2['options']."</label></div>";
        
              
          }
        
              
              
      }//options
    
      //echo "id " . $row['id'];
          if($row['id'] == 6){
              //echo "six";
              echo  "<textarea class=\"form-control\" rows=\"5\" id=\"comment\" name=\"comment\" placeholder=\"Your feedback comments here.\"></textarea>";
          }
    
    }//questions
    
?>
      <br><button type="submit" class="btn btn-success">Submit</button></form>
                 </div>
        <div class='col-md-2'>
             </div>
        </div></div></div>