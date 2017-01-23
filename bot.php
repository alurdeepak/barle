<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
include 'openDB.php';

$SQL_SQL="select * from dat_regs where fname like '" . $_REQUEST['sname'] . "%' limit 1";
$result2 = mysql_query($SQL_SQL) or die ("insert survey a request  failed" . mysql_error());

$row = mysql_fetch_array($result2);

$row_count=mysql_num_rows($result2);

if($row_count==0){
    echo "No records found";
}else{
    echo $row['fname']. " " . $row['lname']. ", Contact Num: " . $row['mobile']. ", email: " . $row['email'];
}
    
    



?>