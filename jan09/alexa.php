<?php
include 'openDB.php';

$SQL_SQL="insert into mas_logins(email) values('" . $_REQUEST['key1']. "')";
$result2 = mysql_query($SQL_SQL) or die ("insert survey a request  failed" . mysql_error());

?>