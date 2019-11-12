<?php include("inc_function.php");if($_SESSION["admin"]!="yes"){header("location:/out_login.php");exit();}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>基本设置</title>
<style type="text/css">
body {
	background:#fff;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: "宋体";
	font-size: 12px;
	color: #333;
}
a{font-family: "宋体";font-size: 12px;color: #333;text-decoration:none;}
a:hover{position:relative;top:1px;}

.bk{float:left;width:46%;height:auto;border:1px solid #CCC;margin-left:10px;margin-top:10px;color:#555; font-size:14px; line-height:26px; padding-bottom:20px;}
 .bk .bk_top{padding-left:6px;height:27px;line-height:27px;background:url(images/admin_tb.jpg) repeat-x;color:#316ab1;font-weight:bolder;}
 	.bk_text{padding-top:6px; padding-left:30px;}
		.bk_text tr.ft{color:#000}
		.bk_text td.x{font-size:12px;}
			.bk_text span{color:red}
			.bk_text span.a{color:#F60}
	.bk_text tr.t{
	margin:auto;
	color: #FFF;
	font-size:14px;
	font-weight:bolder
}
	.bk_text_border{border-bottom:1px dotted #CCC;}
		.bk_gx{color:red;}
.page{text-align:center; height:35px; line-height:35px; font-size:12px; color:#666}
	.page a{color:#000;}
	.page a:hover{color:#F60}
</style>
<script language="javascript">
function yz()
{
	if(mform.user.value=="")
	{
		alert("用户名不能为空！");
	}
	else if(mform.pws.value=="")
	{
		alert("密码不能为空！");
	}
	else if(mform.pws.value!=mform.cpws.value)
	{
		alert("两次输入的密码不一样！");
	}
	else
	{
		return true;
	}
	return false;
}
</script>
</head>

<body>
<div class="bk" style="width:96%">
    <div class="bk_text">
  <form action="adduser_up.php" method="post" enctype="application/x-www-form-urlencoded" name="mform" onsubmit="return yz();">
  <table width="600" border="0" cellspacing="0" cellpadding="0" style="font-size:14px;border:1px solid #ccc">
  <tr bgcolor="#0099CC" class="t">
    <td colspan="3" align="center" valign="middle">增加用户</td>
    </tr>
  <tr>
    <td width="142" height="40" align="right" valign="middle">用户名：</td>
    <td width="15">&nbsp;</td>
    <td width="241"><input name="user" type="text" value="" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">密码：</td>
    <td>&nbsp;</td>
    <td><input name="pws" type="password" value="" style="-webkit-appearance:none;" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">重复密码：</td>
    <td>&nbsp;</td>
    <td><input name="cpws" type="password" value="" style="-webkit-appearance:none;" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">绑定域名</td>
    <td>&nbsp;</td>
    <td><input name="url" type="text" value="" style="-webkit-appearance:none;" /> 
      <span style="font-size:12px">(多个域名用英文&ldquo;,&rdquo;隔开)</span></td>
    </tr>
   <tr>
    <td height="40" align="right" valign="middle">试用天数：</td>
    <td>&nbsp;</td>
    <td><input name="sy" type="text" value="" style="-webkit-appearance:none;width:60px;" />
    (默认试用2天)</td>
    </tr>
    <tr>
      <td height="40" colspan="3" align="center" valign="middle"><input type="submit" name="button" id="button" value="提  交" /></td>
    </tr>
      </table>
	</form>
  </div>
</div>
</body>
</html>
