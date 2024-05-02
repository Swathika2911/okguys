<?php 
ob_start(); 
session_start();
include_once "db/db.php"; 


$sel="select * from customer where cust_uname = '".$_GET['UserName']."'";
$from=mysql_query($sel);
$res=mysql_fetch_object($from);
if($res > 0)
{
echo "<input type='submit' name='register' value='Register' class='btn' disabled><br><font color='#CC0000'>User name already exist</font>";
}else{
echo "<input type='submit' name='register' value='Register' class='btn'>";
}


?>