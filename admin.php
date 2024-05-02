<?php 
session_start();
include_once "db/db.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php include('title.php') ?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="total">
<table width="100%" border="0" cellpadding="0" cellspacing="0" style="background:url(images/banner.jpg) no-repeat bottom">
  <tr>
    <td height="260" align="center" valign="top"><span class="menu"><?php include('menu.php') ?> </span></td>
  </tr>
</table>
<table width="100%" border="0" style="border-top:#FFFFFF solid 3px;">
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td height="53" colspan="3" align="center"><h1>Admin Log In</h1></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="5%" align="center">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF">
   
   <p style="padding:0px 0px 0px 0px;color:#000000;text-align:justify;float:right;width:250px;">
    <form action="" method="post">    
<br />
<br />
  <h3 style="color:#000000">USER NAME&nbsp;:&nbsp;<input name="user_uname" type="text" required /></h3>
  <br />
  <h3 style="color:#000000">PASSWORD&nbsp;:&nbsp;&nbsp;<input name="user_pwd" type="password" required /></h3>
  <br />
  <input value="LOG IN" name="submit" type="submit" class="btn"/>
    </form> 
    </p>
   </td>
    <td width="5%" align="center">&nbsp;</td>
  </tr>
  <tr>
     <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" class="table2">
  <tr>
    <td height="60" align="center"><?php include('footer.php') ?></td>
  </tr>
</table>
</div>
</body>
</html>
<?php
if(isset($_REQUEST['submit']))
{
$user_uname=$_REQUEST['user_uname'];
$user_pwd=$_REQUEST['user_pwd'];


$sqlup="Select * from admin
    where user_uname='".$user_uname."' AND user_pwd='".$user_pwd."'";

    $we=mysql_query($sqlup);
    $res=mysql_fetch_object($we);

if($res > 0)
{
$_SESSION['user_id'] = $res->user_id;
$_SESSION['user_name'] = $res->user_name;
$_SESSION['user_uname'] = $res->user_uname;

    echo "<script type='text/javascript'> alert('Login Successfully');</script>";

    echo "<meta http-equiv='refresh' content='0;url=admin/index.php'>";

}
else{   echo "<script type='text/javascript'> alert('Invalid Login');</script>";    }
}
?>
