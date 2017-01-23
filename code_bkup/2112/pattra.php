<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
//include 'header1.php';
include 'openDB.php';
include 'dquestions.php';

//session_start();


$add_sql="select paid_by_email,phone from dat_payments where status='Credit'";

//echo $sql;
//$result = mysql_query($add_sql) or die ("Getting entries failed" . mysql_error());

$result44 = mysql_query($add_sql) or die ("Getting payments user failed" . mysql_error());
$aaemails="";
$aaphones="";
while($row44 = mysql_fetch_array($result44)){

    $aaphones=$aaphones . ", " . $row44['phone'];
    $aaemails=$aaemails . "; " . $row44['paid_by_email'];
    
}


?>
<label for="inputEmail" >All Registered Email address</label>
 <textarea class="form-control" rows="5" id="address" name="address" placeholder="All paid members email IDs." required><?php echo $aaemails ?></textarea>
<label for="inputEmail" >All Registered Phone Numbers</label>
<textarea class="form-control" rows="5" id="pcode" name="pcode" placeholder="All paid members email IDs." required><?php echo $aaphones ?></textarea>