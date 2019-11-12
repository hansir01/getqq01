<?php include("inc_function.php");if($_SESSION["admin"]!="yes"){header("location:/out_login.php");exit();}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>列表</title>
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

.bk{float:left;width:46%;height:auto;border:1px solid #CCC;margin-left:10px;margin-top:10px;color:#555; font-size:14px; line-height:26px;}
 .bk .bk_top{padding-left:6px;height:27px;line-height:27px;background:url(images/admin_tb.jpg) repeat-x;color:#316ab1;font-weight:bolder;}
 	.bk_text{padding-top:6px;}
		.bk_text tr.ft{color:#000}
		.bk_text td.x{font-size:12px;}
			.bk_text span{color:red}
			.bk_text span.a{color:#F60}
	.bk_text table{
	margin:auto;
	color: #FFF;
}
	.bk_text_border{border-bottom:1px dotted #CCC;}
		.bk_gx{color:red;}
.page{text-align:center; height:35px; line-height:35px; font-size:12px; color:#666}
	.page a{color:#000;}
	.page a:hover{color:#F60}
</style>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
//全选全不选
function SelectAll(chkAll) {
    var items = document.getElementsByTagName("input");
    for (i = 0; i < items.length; i++) {
        if (items[i].id.indexOf("ID_Dele[]") != -1) {
            if (items[i].type == "checkbox") {
                items[i].checked = chkAll.checked;
            }
        }
    }
}
function qr()
{
	confirm("您确定删除所选用户？此操作无法恢复！");
}
</script>
</head>

<body>

<div class="bk" style="width:96%">
    <div class="bk_text">
<form name="mfrom" method="post" action="user_list_up.php">
<table width="98%" border="0" cellspacing="1" cellpadding="0">
          <tr>
            <td width="10%" align="left" valign="top">
            </td>
            <td width="8%" valign="top"></td>
            <td width="12%" valign="top"></td>
            <td width="13%" valign="top"></td>
            <td width="14%" valign="top"></td>
            <td width="11%" valign="top"></td>
            <td colspan="3" valign="top"></td>
          </tr>
          <tr>
            <td width="10%" height="25" align="center" bgcolor="#0099CC"> 用户名 </td>
            <td width="8%" align="center" bgcolor="#0099CC"> 姓名</td>
            <td width="12%" align="center" bgcolor="#0099CC"> 添加时间 </td>
            <td width="13%" align="center" bgcolor="#0099CC"> 创建者IP</td>
            <td width="14%" align="center" bgcolor="#0099CC"> 联系电话 </td>
            <td width="11%" align="center" bgcolor="#0099CC"> 联系QQ </td>
            <td width="14%" align="center" bgcolor="#0099CC"> 到期时间 </td>
            <td width="14%" align="center" bgcolor="#0099CC">绑定域名</td>
            <td width="4%" align="center" bgcolor="#0099CC">操作</td>
          </tr>
         <?php
		 //统计总数
		$sql=mysql_query("select count(*) as c from admin_user");
		$r=mysql_fetch_array($sql);
		$count=$r["c"];
		
		//统计页数
		$cpage=ceil($count/20);
		 
		 if(empty($_GET["page"]) || $_GET["page"]==1)
		 {
			 $page_id=0;
			 $page=1;
			 $sql=mysql_query("select * from admin_user where admin!=1 order by id desc limit $page_id,10");
		 }
		 else
		 {
			 $page_id=$_GET["page"]*10-10;
			 $page=$_GET["page"];
			 
			 $sql=mysql_query("select * from admin_user where id>=(select id from admin_user and admin!=1 order by id desc limit $page_id,1) and admin!=1 limit 10");
		 }

		 while($row=mysql_fetch_array($sql))
		 {
		 ?> 
          <tr class="ft">
            <td height="35" align="center" valign="middle" class="x"><?php echo $row["user"]?></td>
            <td align="center" valign="middle"><?php echo $row["name"]?></td>
            <td align="center" valign="middle" class="x"><?php echo $row["mdate"]?></td>
            <td align="center" valign="middle" class="x"><?php echo $row["ip"]?></td>
            <td align="center" valign="middle" class="x"><?php echo $row["tel"]?></td>
            <td align="center" valign="middle" class="x"><?php echo $row["qq"]?></td>
            <td align="center" valign="middle" class="x"><?php echo $row["end_date"]?></td>
            <td align="center" valign="middle" class="x"><?php echo $row["url"]?></td>
            <td align="center" valign="middle" class="x"><input name="ID_Dele[]" type="checkbox" id="ID_Dele[]" value="<?php echo $row["id"]?>"/></td>
          </tr>
          <?php
		 }
		  ?>
          <tr>
            <td height="30" colspan="7" align="center" valign="middle"></td>
            <td height="30" align="right" valign="middle" style="color:#000;font-size:12px;"><input type="submit" name="button" id="button" value="删除所选" onclick="return qr()" />
            全选</td>
            <td height="30" align="center" valign="middle"><input type="checkbox" name="checkbox25" id="checkbox25" onclick="SelectAll(this)" /></td>
          </tr>
        </table>
</form>
  </div>
  
  <div class="page">
  共：<?php echo $count;?>条 <?php echo $page?>/<?php echo $cpage?>页 <a href="?page=1">首页</a>
  <?php
		if($page>1)
		{
			$r=$page-1;
			echo "<a href=\"?page={$r}\">上一页</a>";
		}
		else
		{
			echo "上一页";
		}
		if($page<$cpage)
		{
			$p=$page+1;
			echo " <a href=\"?page={$p}\">下一页</a>";
		}
		else
		{
			echo " 下一页";
		}
		?>
        <a href="?page=<?php echo $cpage?>">尾页</a>
        <select name="jumpMenu" id="jumpMenu" onchange="MM_jumpMenu('self',this,0)">
            <?php
			for($i=1;$i<$cpage+1;$i++)
			{
				if($i==$page)
				{
            		echo "<option value=\"list.php?page={$i}\" selected=\"selected\">{$i}页</option>";
				}
				else
				{
					echo "<option value=\"list.php?page={$i}\">{$i}页</option>";
				}
			}
			?>
        </select>
  </div>
</div>
</body>
</html>
