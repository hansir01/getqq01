<?php include("inc_function.php");?>
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
	if(mform.xpws.value!=mform.cxpws.value)
	{
		alert("两次输入的密码不一样！");
		return false;
	}
	else
	{
		return true;
	}
}
</script>
</head>

<body>
<div class="bk" style="width:96%">
    <div class="bk_text">
   <form action="pws_up.php" method="post" enctype="application/x-www-form-urlencoded" name="mform" onsubmit="return yz();">
  <table width="600" border="0" cellspacing="0" cellpadding="0" style="font-size:14px;border:1px solid #ccc">
  <tr bgcolor="#0099CC" class="t">
    <td colspan="3" align="center" valign="middle">基本设置</td>
    </tr>
  <tr>
    <td width="142" height="40" align="right" valign="middle">用户名：</td>
    <td width="15">&nbsp;</td>
    <td width="241"><input name="name" type="text" disabled="disabled" value="<?php echo get_user("user");?>" readonly="readonly" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">原密码：</td>
    <td>&nbsp;</td>
    <td><input name="pws" type="password" value="" style="-webkit-appearance:none;" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">新密码：</td>
    <td>&nbsp;</td>
    <td><input name="xpws" type="password" value="" style="-webkit-appearance:none;" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">重复新密码：</td>
    <td>&nbsp;</td>
    <td><input name="cxpws" type="password" value="" style="-webkit-appearance:none;" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">您的姓名：</td>
    <td>&nbsp;</td>
    <td><input name="tname" type="text" value="<?php echo get_user("name");?>" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">联系电话：</td>
    <td>&nbsp;</td>
    <td><input name="tel" type="text" value="<?php echo get_user("tel");?>" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">联系QQ：</td>
    <td>&nbsp;</td>
    <td><input name="qq" type="text" value="<?php echo get_user("qq");?>" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">已绑定域名：</td>
    <td>&nbsp;</td>
    <td><input name="url" type="text" value="<?php echo get_user("url");?>" />(多个域名请用英文“,”隔开)</td>
    </tr>
    
    <tr>
      <td height="40" colspan="3" align="center" valign="middle"><input type="submit" name="button" id="button" value="保存设置" /></td>
    </tr>
      </table>
	</form>
  </div>
</div>
</body>
</html>
