<?php include("inc_function.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>��������</title>
<style type="text/css">
body {
	background:#fff;
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	font-family: "����";
	font-size: 12px;
	color: #333;
}
a{font-family: "����";font-size: 12px;color: #333;text-decoration:none;}
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
function is_email( str ){ 
p = /^([\w\.-]+)@([a-zA-Z0-9-]+)(\.[a-zA-Z\.]+)$/; 
if(str.search(p) == -1){ 
return false; 
}else{ 
return true; 
} 
} 
</script>
</head>

<body>
<div class="bk" style="width:96%">
    <div class="bk_text">
   <form action="base_up.php" method="post" enctype="application/x-www-form-urlencoded" name="mform">
  <table width="600" border="0" cellspacing="0" cellpadding="0" style="font-size:14px;border:1px solid #ccc">
  <tr bgcolor="#0099CC" class="t">
    <td colspan="3" align="center" valign="middle">��������</td>
    </tr>
  <tr>
    <td width="142" height="40" align="right" valign="middle">�����������ַ��</td>
    <td width="15">&nbsp;</td>
    <td width="241"><input name="server" type="text" value="<?php echo get_db("server");?>" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">�����˺ţ�</td>
    <td>&nbsp;</td>
    <td><input name="mname" type="text" value="<?php echo get_db("name");?>" style="-webkit-appearance:none;" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">�������룺</td>
    <td>&nbsp;</td>
    <td><input name="mpws" type="text" value="<?php echo get_db("pws");?>" style="-webkit-appearance:none;" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">�Է���ʾ��Դ���䣺</td>
    <td>&nbsp;</td>
    <td><input name="email" type="text" value="<?php echo get_db("email");?>" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">�ʼ����⣺</td>
    <td>&nbsp;</td>
    <td><input name="title" type="text" style="width:300px;" value="<?php echo get_db("title");?>" /></td>
    </tr>
  <tr>
    <td height="40" align="right" valign="middle">�ʼ�����</td>
    <td>&nbsp;</td>
    <td>
      <textarea name="content" id="textarea" cols="45" rows="5"><?php echo html_entity_decode(get_db("content"));?></textarea></td>
    </tr>
    
    <tr>
    <td height="40" colspan="3" align="center" valign="middle"><label for="textarea">
      <input type="radio" name="t" id="radio" value="1" <?php if(get_db("t")==1){echo 'checked="checked"';}?> />
      ��ʱ����
      <input type="radio" name="t" id="radio2" value="0" <?php if(get_db("t")==0){echo 'checked="checked"';}?> />
      �ֶ�����</label></td>
    </tr>
    
    <tr>
    <td height="40" colspan="3" align="center" valign="middle"><input type="submit" name="button" id="button" value="��������" /></td>
    </tr>
      </table>
	</form>
  </div>
</div>
</body>
</html>
