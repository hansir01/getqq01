<?php include("inc_function.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>网络营销平台</title>
<script language="javascript" src="js/jquery.min.js"></script>
<script language="javascript" src="js/main.js"></script>
<link href="style/css_main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="top">
	<div class="top_left">
    	<div class="top_left_l">
        	<ul>
                <li id="mt1" class="menu_a"><a href="#1">基本信息</a></li>
                <li><a href="create.php" target="mif">生成代码</a></li>
                <li><a href="base.php" target="mif">系统设置</a></li>
                <?php if($_SESSION["admin"]=="yes"){echo'<li id="mt2" class="menu_a"><a href="#2">增加用户</a></li>';}?>
            </ul>
        </div>
        <div class="top_date">
        	<div class="top_date_t"><a href="index.php">返回首页</a> 日期：<?php 
			$weekarray=array("日","一","二","三","四","五","六");
			echo date("Y年m月d日");
			$t=date("w");
			echo " 星期".$weekarray[$t];
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
                <td align="left" valign="middle">用户：<a href="/"><?php echo $_SESSION["user"];?></a></td>
                <td align="left" valign="middle">&nbsp;</td>
                <td align="left" valign="middle"><a href="out_login.php">退出</a></td>
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
	版权所有：飘扬网络科技有限公司<br />
    作者：飘扬 联系QQ：4781921 程序版本：Pycms V1.0 Release 20130530 [技术支持与服务]
</div>
</body>
</html>