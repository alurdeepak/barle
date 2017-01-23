<script src="d3.js"></script>
<?php

include 'openDB.php';
include 'dquestions.php';

date_default_timezone_set ("Asia/Calcutta"); 
$today = date('Y-m-d H:i:s',time());
$sql="insert into dat_survey_responses(question_id_fk,response_id_fk,feedback,created_on) values(";


foreach ($_POST as $key => $value) {
    //do something
   // echo $key . ' has the value of ' . $value . "<br>";
    $resp_array=explode("-",$value);

    if($key != "comment"){
  $SQL_SQL=  $sql . $resp_array[0]. "," . $resp_array[1] . ",'','" . $today . "')";
    //echo $SQL_SQL. "<br>";
        $result2 = mysql_query($SQL_SQL) or die ("insert survey a request  failed" . mysql_error());
        unset($resp_array);
    }//if
    
    
}

if($_REQUEST['comment'] !=""){
        $SQL_SQL=  $sql . "6,0,'" . $_REQUEST['comment'] . "','" . $today . "')";
  //  echo $SQL_SQL;
        $result2 = mysql_query($SQL_SQL) or die ("insert survey a request  failed" . mysql_error());
}
    header("Location: /chart4.php");

?>