<?php
include("inc_function.php");

//��ȡQQ����
$toall = query("select count(*) as count from `$sql_db`");

//�����ȡ��
$td=strtotime(date("Y-m-d"));
$today_all = query("select count(*) as count from `$sql_db` where mdate>=$td");

//���ջ�ȡ��
$yd=strtotime(date("Y-m-d",strtotime('-1 day')));
$yesterday_all = query("select count(*) as count from `$sql_db` where mdate>=$yd and mdate<$td");


//�ÿ�����
$toall_ip = query("select count(*) as count from `$user_ip`");

//�ÿͽ����ȡ��
$td=GetMkTime(date("Y-m-d 0:0:0"));
$today_all_ip = query("select count(*) as count from `$user_ip` where get_date>=$td");

//�ÿ����ջ�ȡ��
$day_s = mktime(0,0,0,date("m", strtotime("-1 day")), date("d",strtotime("-1 day")), date("Y",strtotime("-1 day")));
$yd=GetMkTime(date('Y-m-d', $day_s));
$yesterday_all_ip = query("select count(*) as count from `$user_ip` where get_date>=$yd and get_date<$td");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ϵͳ������Ϣ</title>
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

.bk{float:left;width:46%;height:auto;border:1px solid #CCC;margin-left:10px;margin-top:10px;color:#555; font-size:14px; line-height:26px;}
 .bk .bk_top{padding-left:6px;height:27px;line-height:27px;background:url(images/admin_tb.jpg) repeat-x;color:#316ab1;font-weight:bolder;}
 	.bk_text{padding-top:6px;}
		.bk_text span{color:red}
		.bk_text span.a{color:#F60}
	.bk_text table{margin:auto;}
	.bk_text_border{border-bottom:1px dotted #CCC;}
		.bk_gx{color:red;}
</style>
</head>

<body>
<div class="bk" style="width:93%;">
<div class="bk_top">��Ϣͳ��</div>
    <div class="bk_text">
    	<table width="98%" border="0" cellspacing="0" cellpadding="0" style="font-size:14px">
          <tr>
            <td width="84%" height="182" align="left" valign="top" style="padding-left:8px; line-height:22px;">
            <span>�ÿ���ͳ�ơ����գ�<?php echo $today_all_ip?>�����գ�<?php echo $yesterday_all_ip?> �ܹ���<?php echo $toall_ip?></span><br />
            �ѻ�ȡQQ��&nbsp;&nbsp;���գ�<?php echo $today_all?>�����գ�<?php echo $yesterday_all?> �ܹ���<?php echo $toall?> <br />
            <span class="a">�Ѱ�����: <?php echo get_user("url")?></span><br />
            <?php
			if($_SESSION["admin"]!="yes")
			{
            ?>
			<span style="color:Green">����ʱ�䣺<?php echo get_user("end_date")?></span>
            <?php
			}
			?>
            </td>
            <td width="16%" valign="top">
            </td>
          </tr>
          <tr>
            <td height="25"></td>
            <td></td>
          </tr>
        </table>
  </div>
</div>
</body>
</html>
