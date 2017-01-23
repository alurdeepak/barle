<?php
include 'openDB.php';

$SQL_SQL="select balance from dat_alexa";
//$result2 = mysql_query($SQL_SQL) or die ("insert survey a request  failed" . mysql_error());

$result = mysql_query($SQL_SQL) or die ("Getting entries failed" . mysql_error());
$row = mysql_fetch_array($result);

echo $row['balance'];    
    
?>