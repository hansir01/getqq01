<?php
include("inc_function.php");
if($_POST)
{
	
		$name=$_SESSION["user"];
		$pws=md5($_POST["pws"]);
		$xpws=md5(strip_tags($_POST["xpws"]));
		$tname=strip_tags($_POST["tname"]);
		$tel=strip_tags($_POST["tel"]);
		$qq=strip_tags($_POST["qq"]);
		$url=strip_tags($_POST["url"]);
		$ymdate=date("Y-m-d H:i:s");
		$yip=$_SERVER['REMOTE_ADDR'];
		
		if($_POST["pws"]!="" && $_POST["xpws"]!="")
		{
			$sql=mysql_query("select count(*) as count from admin_user where user='$name' and pws='$pws'");
			$count=mysql_fetch_array($sql);
			if($count["count"]>0)
			{
				if($_POST["xpws"]=="" || strlen($_POST["xpws"])<8)
				{
					echo "<script language='javascript'>alert('您的密码不能为空或者少于8位数!');history.go(-1);</script>";
					exit();
				}
				
				$sql=mysql_query("update admin_user set pws='$xpws',name='$tname',tel='$tel',qq='$qq',ymdate='$ymdate',yip='$yip' where user='{$_SESSION["user"]}'");
				if($sql)
				{
					echo "<script language='javascript'>alert('修改成功！');location.href='pws.php';</script>";
				}
				else
				{
					echo "<script language='javascript'>alert('修改失败，请检查参数是否填写错误！');history.go(-1);</script>";
				}
				exit();
			}
			else
			{
				echo "<script language='javascript'>alert('修改失败，原密码错误！');history.go(-1);</script>";
				exit();
			}
		}
		else
		{
			$sql=mysql_query("update admin_user set name='$tname',tel='$tel',qq='$qq',url='$url',ymdate='$ymdate',yip='$yip' where user='{$_SESSION["user"]}'");
			if($sql)
			{
				echo "<script language='javascript'>alert('修改成功！');location.href='pws.php';</script>";
			}
			else
			{
				echo "<script language='javascript'>alert('修改失败，请检查参数是否填写错误！');history.go(-1);</script>";
			}
			exit();
		}
}
?>
