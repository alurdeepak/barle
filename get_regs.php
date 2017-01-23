<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';



$result = mysql_query($GET_REG_COUNT) or die ("Getting entries failed" . mysql_error());

$adult_count=0;
$kid_count=0;

while($row = mysql_fetch_array($result)){
//echo $row['age'];
    if($row['age']>10){
$adult_count=$adult_count+1;
    }else{
    $kid_count=$kid_count+1;
    }
}
echo "<a href=reg_users.php>Current Registered Users (Adults) - ". $adult_count . "</a>";
echo "<br><a href=reg_users.php>Current Registered Users (Kids) - ". $kid_count  . "</a>";

?>