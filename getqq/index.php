<?php include("inc_function.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>����Ӫ��ƽ̨</title>
<script language="javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/main.js"></script>
<link href="style/css_main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="top">
	<div class="top_left">
    	<div class="top_left_l">
        	<ul>
                <li id="mt1" class="menu_a"><a href="#1">������Ϣ</a></li>
                <li><a href="create.php" target="mif">���ɴ���</a></li>
                <li><a href="base.php" target="mif">ϵͳ����</a></li>
                <?php if($_SESSION["admin"]=="yes"){echo'<li id="mt2" class="menu_a"><a href="#2">�����û�</a></li>';}?>
            </ul>
        </div>
        <div class="top_date">
        	<div class="top_date_t"><a href="index.php">������ҳ</a> ���ڣ�<?php 
			$weekarray=array("��","һ","��","��","��","��","��");
			echo date("Y��m��d��");
			$t=date("w");
			echo " ����".$weekarray[$t];
			?></div>
            <div class="top_date_b">
            <table width="100%" height="66" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="34" height="34">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td height="34" align="left" valign="middle">&nbsp;</td>
                <td align="left" valign="middle">�û���<a href="/"><?php echo $_SESSION["user"];?></a></td>
                <td align="left" valign="middle">&nbsp;</td>
                <td align="left" valign="middle"><a href="out_login.php">�˳�</a></td>
              </tr>
            </table>
            </div>
        </div>
     </div>
</div>

<div class="main">
	<div class="left_main" id="left_main">
        <div class="main_left" id="left_menu">
        </div>
    </div>
    <div class="left_close">
    	<div id="left_close"></div>
    </div>
    <div id="miframe">
    </div>
</div>
<div class="main_foot">
	��Ȩ���У�Ʈ������Ƽ����޹�˾<br />
    ���ߣ�Ʈ�� ��ϵQQ��4781921 ����汾��Pycms V1.0 Release 20130530 [����֧�������]
</div>
</body>
</html>