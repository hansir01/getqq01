<?php
include("inc_function.php");
if($_POST)
{
	if($_POST["server"]=="")
	{
		echo "<script language='javascript'>alert('����д�ʼ���������ַ!');history.go(-1);</script>";
		exit();
	}
	elseif($_POST["mname"]=="" || !is_email($_POST["mname"]) || strlen($_POST["mname"])<8)
	{
		echo "<script language='javascript'>alert('Email�˺�Ϊ�ջ��ʽ����! �����˺Ų�������7λ��');history.go(-1);</script>";
		exit();
	}
	elseif($_POST["mpws"]=="" || strlen($_POST["mpws"])<9)
	{
		echo "<script language='javascript'>alert('�������벻��Ϊ�ջ�������8λ��!');history.go(-1);</script>";
		exit();
	}
	elseif($_POST["email"]=="" || !is_email($_POST["email"]))
	{
		echo "<script language='javascript'>alert('������ַΪ�ջ��ʽ����');history.go(-1);</script>";
		exit();
	}
	elseif($_POST["title"]=="")
	{
		echo "<script language='javascript'>alert('�ʼ����ⲻ��Ϊ�գ�');history.go(-1);</script>";
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
				echo '<script language="javascript">alert("�޸ĳɹ���");location.href="base.php";</script>';
			}
			else
			{
				echo '<script language="javascript">alert("�޸�ʧ�ܣ���������Ƿ���д��ȷ��");location.href="base.php";</script>';
			}
		}
		else
		{
			$sql=mysql_query("insert into base(server,name,pws,email,title,content,t,user) values('$server','$name','$pws','$email','$title','$content','$t','$user')");
			echo '<script language="javascript">alert("�޸ĳɹ���");location.href="base.php";</script>';
		}
	}
}
?>
