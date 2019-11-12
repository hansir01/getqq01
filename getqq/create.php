<?php include("inc_function.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>获取代码</title>
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
 	.bk_text{padding-top:15px; padding-left:30px;}
		.bk_text tr.ft{color:#000}
		.bk_text td.x{font-size:12px; padding-top:20px; padding-bottom:10px;}
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
</head>

<body>
<div class="bk" style="width:96%">
    <div class="bk_text">
  <table width="600" border="0" cellspacing="0" cellpadding="0" style="font-size:14px;border:1px solid #ccc">
  <tr bgcolor="#0099CC" class="t">
    <td colspan="3" align="center" valign="middle">获取代码</td>
    </tr>
  <tr>
    <td colspan="3" align="center" valign="middle" class="x">
      <textarea name="textarea" id="textarea" cols="75" rows="10"><SCRIPT id='qq_js' type=text/javascript src='http://<?php echo $_SERVER['HTTP_HOST'];?>/js/getqq.js?<?php echo md5($_SESSION["user"]);?>'></SCRIPT></textarea></td>
  </tr>
  </table>
  </div>
</div>
</body>
</html>
