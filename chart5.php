<html>
  <head>
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
      $cdata=$cdata ."[\"" . $row2['options'] ."\", " . getOptionCount($row2['id'],5) . "]";    
          //now get response count for each option
        }else{
            $cdata=$cdata ."[\"" . $row2['options'] ."\", " . getOptionCount($row2['id'],5) . "],";    
        }
        $count++;
              
          }
        
              
              
    
    
      
    
    }//questions
$cdata=$cdata. "]);";
echo $cdata;

function getOptionCount($optionid,$qid){
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
    <div id="piechart_3d5" style="width: 900px; height: 500px;"></div>
  </body>
</html>