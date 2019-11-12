<?php include("inc_function.php");
if($_POST)
{
	if($_POST["name"]=="")
	{
		echo "<script language='javascript'>alert('用户名不能为空！');history.go(-1);</script>";
		exit();
	}
	elseif($_POST["pws"]=="")
	{
		echo "<script language='javascript'>alert('密码不能为空！');history.go(-1);</script>";
		exit();
	}
	elseif($_POST["code"]=="")
	{
		echo "<script language='javascript'>alert('验证码不能为空！');history.go(-1);</script>";
		exit();
	}
	elseif($_SESSION['randcode']!=$_POST["code"])
	{
		echo "<script language='javascript'>alert('验证码错误！');history.go(-1);</script>";
		exit();
	}
	else
	{
		$name=strip_tags($_POST["name"]);
		$pws=md5(strip_tags($_POST["pws"]));
		$sql=mysql_query("select count(*) as count from admin_user where user='$name' and pws='$pws'");
		$count=mysql_fetch_array($sql);
		if($count["count"]>0)
		{
			$sql=mysql_query("select * from admin_user where user='$name'");
			$count=mysql_fetch_array($sql);
			if($count["admin"]==1)
			{
				$_SESSION["admin"]="yes";
			}
			$_SESSION["user"]=$name;
			echo "<script language='javascript'>alert('登录成功！');location.href='/index.php';</script>";
			exit();
		}
		else
		{
			echo "<script language='javascript'>alert('账号或密码错误！');history.go(-1);</script>";
			exit();
		}
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户登录</title>
<style type="text/css">
body {
	background:url(images/body_b.jpg) repeat-x;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: "宋体";
	font-size: 14px;
	color: #fff;
}
ul,li,dl,dd,dt,p{padding:0px; margin:0px; list-style:none}
a{font-family: "宋体";font-size: 12px;color: #333;text-decoration:none;}
a:hover{position:relative;top:1px;}
.bk{width:447px; height:343px; margin:150px auto 0px auto; background:url(images/logo_b.jpg) center no-repeat;}
	.bk td input.a{width:140px; height:17px; line-height:17px;}
	.bk td input.code{width:60px;height:17px; line-height:17px;}
		.bk dd{float:left;}
		.bk dt{float:left; padding-left:6px;}
</style>
<SCRIPT LANGUAGE="JavaScript">
function reloadcode(){
 var d = new Date();
 document.getElementById('safecode').src="code.php?t="+d.toTimeString()
}
function re()
{
	mform.reset();
	return false;
}
</SCRIPT>
</head>

<body>
<div class="bk">
<form name="mform" method="post" action="">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="36%" height="102">&nbsp;</td>
    <td width="10%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="39%">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="11%">&nbsp;</td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td align="center">用户名</td>
    <td>&nbsp;</td>
    <td>
      <input type="text" name="name" id="name" class="a" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td align="center">密　码</td>
    <td>&nbsp;</td>
    <td><input type="password" name="pws" id="pws" class="a" /></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="30">&nbsp;</td>
    <td align="center">验证码</td>
    <td>&nbsp;</td>
    <td align="left" valign="bottom">
    <dl>
        <dd><input type="text" name="code" id="code" class="code" /></dd>
        <dt><img src='code.php' id="safecode" onclick="reloadcode()" title="看不清楚?点击切换!"></dt>
    </dl>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="80" colspan="6" align="center" valign="middle"><input type="image" src="images/go.jpg" width="82" height="32" />　<input type="image" src="images/re.jpg" width="82" height="32" onclick="return re();" /></td>
    </tr>
</table>
</form>
</div>
</body>
</html>
