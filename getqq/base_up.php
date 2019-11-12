<?php
include("inc_function.php");
if($_POST)
{
	if($_POST["server"]=="")
	{
		echo "<script language='javascript'>alert('请填写邮件服务器地址!');history.go(-1);</script>";
		exit();
	}
	elseif($_POST["mname"]=="" || !is_email($_POST["mname"]) || strlen($_POST["mname"])<8)
	{
		echo "<script language='javascript'>alert('Email账号为空或格式不对! 并且账号不能少于7位数');history.go(-1);</script>";
		exit();
	}
	elseif($_POST["mpws"]=="" || strlen($_POST["mpws"])<9)
	{
		echo "<script language='javascript'>alert('您的密码不能为空或者少于8位数!');history.go(-1);</script>";
		exit();
	}
	elseif($_POST["email"]=="" || !is_email($_POST["email"]))
	{
		echo "<script language='javascript'>alert('发件地址为空或格式错误！');history.go(-1);</script>";
		exit();
	}
	elseif($_POST["title"]=="")
	{
		echo "<script language='javascript'>alert('邮件标题不能为空！');history.go(-1);</script>";
		exit();
	}
	else
	{
		$server=strip_tags($_POST["server"]);
		$name=strip_tags($_POST["mname"]);
		$pws=strip_tags($_POST["mpws"]);
		$email=strip_tags($_POST["email"]);
		$title=strip_tags($_POST["title"]);
		$content=strip_tags(htmlentities($_POST["content"]));
		$t=$_POST["t"];
		
		$user=$_SESSION["user"];
		$sql=mysql_query("select count(user) as count from base where user='$user'");
		$count=mysql_fetch_array($sql);
		if($count["count"]>0)
		{
			$sql=mysql_query("update base set server='$server',name='$name',pws='$pws',email='$email',title='$title',content='$content',t='$t' where user='$user'");
			if($sql)
			{
				echo '<script language="javascript">alert("修改成功！");location.href="base.php";</script>';
			}
			else
			{
				echo '<script language="javascript">alert("修改失败！请检查参数是否填写正确。");location.href="base.php";</script>';
			}
		}
		else
		{
			$sql=mysql_query("insert into base(server,name,pws,email,title,content,t,user) values('$server','$name','$pws','$email','$title','$content','$t','$user')");
			echo '<script language="javascript">alert("修改成功！");location.href="base.php";</script>';
		}
	}
}
?>
