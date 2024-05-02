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
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td height="53" colspan="4" align="center"><h1>Member Login</h1></td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td width="5%" align="center">&nbsp;</td>
    <td align="center" bgcolor="#FFFFFF" valign="top">
   <p style="padding:0px 0px 0px 0px;color:#000000;float:left;width:350px;">
<form action="" method="post" name="form2" enctype="multipart/form-data">
<br />
<h3 style="color:#000000">Register To Log In...</h3><br />
<h3 style="color:#000000">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Regno&nbsp;<input type="text" name="reg_name" placeholder="enter your name" required >&nbsp;&nbsp;Email Id &nbsp;&nbsp;<input type="text" name="reg_email" placeholder="enter your email id" required ></h3>
<br />
<h3 style="color:#000000">User Name&nbsp;<input type="text" name="reg_uname" placeholder="enter user name" required onBlur="checkUname(this.value)">&nbsp;&nbsp;Password&nbsp;<input type="password" name="reg_pwd" placeholder="enter password" required ></h3>
<br />
<div id="unamediv"><input type="submit" name="register" value="Register" class="btn"></div>
</form>
   </p>
  </td>
    <td width="28%" align="center" bgcolor="#FFFFFF">
     <p style="padding:0px 0px 0px 0px;color:#000000;text-align:justify;float:right;width:250px;">
   <br />
 <form action="" method="post" name="form1">    
  <h3 style="color:#000000">USER NAME&nbsp;:<br />
    &nbsp;
    <input name="user_uname" type="text" required /></h3>
  <br />
  <h3 style="color:#000000">PASSWORD&nbsp;:<br />
    &nbsp;&nbsp;
    <input name="user_pwd" type="password" required /></h3>
  <br />
  <input value="LOG IN" name="submit" type="submit" class="btn"/>
    </form>
    <br />

    </p>   </td>
    <td width="5%" align="center">&nbsp;</td>
  </tr>
  <tr>
     <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
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
<script type="text/javascript">
function checkUname(UserName) {
	xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById('unamediv').innerHTML=xmlhttp.responseText;
				}
			}
			xmlhttp.open("GET","ajax.php?UserName="+UserName, true);
			xmlhttp.send(null);
	}
</script>
<?php
if(isset($_REQUEST['submit']))
{
$user_uname=$_REQUEST['user_uname'];
$user_pwd=$_REQUEST['user_pwd'];


$sqlup="Select * from supplier
	where supp_uname='".$user_uname."' AND supp_pwd='".$user_pwd."'";

	$we=mysql_query($sqlup);
	$res=mysql_fetch_object($we);

if($res > 0)
{
$_SESSION['user_id']=$res->supp_id;
$_SESSION['user_uname']=$supp_uname;
$_SESSION['user_name']=$res->supp_name;

	echo "<script type='text/javascript'> alert('Login Successfully');</script>";

	echo "<meta http-equiv='refresh' content='0;url=sup/index.php'>";

}
else{ 	echo "<script type='text/javascript'> alert('Invalid Login');</script>";	}
}
elseif(isset($_REQUEST['register']))
{
$ins="INSERT INTO `supplier` (`supp_name` ,`supp_email` ,`supp_uname` ,`supp_pwd`)
	  VALUES ('".$_REQUEST['reg_name']."', '".$_REQUEST['reg_email']."', '".$_REQUEST['reg_uname']."', '".$_REQUEST['reg_pwd']."')";
mysql_query($ins);
echo "<script type='text/javascript'> alert('Registered Sucessfuly');</script>";
echo "<meta http-equiv='refresh' content='0;url=sup.php'>";
}
?>