<?php
include("inc_function.php");
if($_SESSION["admin"]!="yes"){header("location:/out_login.php");exit();}
if($_POST)
{
	if($_POST["user"]=="" || strlen($_POST["user"])<5)
	{
		echo "<script language='javascript'>alert('�û�������Ϊ�ջ�����8λ����');history.go(-1);</script>";
		exit();
	}
	elseif($_POST["pws"]=="" || strlen($_POST["pws"])<5)
	{
		echo "<script language='javascript'>alert('���벻��Ϊ�ջ�����8λ����');history.go(-1);</script>";
		exit();
	}
	else
	{
		$muser=trim($_POST["user"]);
		$pws=md5($_POST["pws"]);
		$md=md5($muser);
		$mdate=date("Y-m-d H:i:s");
		$ip=$_SERVER['REMOTE_ADDR'];
		$sy=trim($_POST["sy"]);
		$url=strip_tags(trim($_POST["url"]));
		if($sy=="")
		{
			$sy=date("Y-m-d H:i:s",strtotime('2 days'));
		}
		else
		{
			$sy=date("Y-m-d H:i:s",strtotime("{$sy} days"));
		}
		$sql=mysql_query("select count(id) as count from admin_user where user='$muser'");
		$count=mysql_fetch_array($sql);
		if($count["count"]<1)
		{
			$sql=mysql_query("insert into admin_user(user,pws,md5,mdate,ip,end_date,url) values('$muser','$pws','$md','$mdate','$ip','$sy','$url')");
			if($sql)
			{
				$getip="ip_".$muser;
				$md=strtotime($mdate);
				createTABLE($muser);
				mysql_query("insert into `$getip`(ip,get_date) values('127.0.0.1','$md')");
				echo '<script language="javascript">alert("��ӳɹ���");location.href="adduser.php";</script>';
			}
			else
			{
				echo '<script language="javascript">alert("�޸�ʧ�ܣ���������Ƿ���д��ȷ��");location.href="adduser.php";</script>';
			}
		}
		else
		{
			echo '<script language="javascript">alert("���˺��Ѵ��ڣ�");location.href="adduser.php";</script>';
		}
	}
}
