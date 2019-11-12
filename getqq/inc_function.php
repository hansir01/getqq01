<?php
session_start();
if($_SESSION["user"]=="" || empty($_SESSION["user"])){
	if($_SERVER['SCRIPT_NAME']!="/login.php")
	{
		header("location:/out_login.php");
		exit();
	}
}

//date_default_timezone_set('Asia/Shanghai');
include("inc_conm.php");
include("inc_date.php");
//数据库名称
$sql_db="me_getqq_".$_SESSION["user"];
$user_ip="ip_".$_SESSION["user"];
function sql_open($py_host,$py_root,$py_pws,$py_db)
{
	$con=mysql_connect($py_host,$py_root,$py_pws);
	if(!$con)
	{
		die("数据库连接错误：".mysql_error());
	}
	mysql_query("set names gbk");
	mysql_select_db($py_db,$con);
}

function session_user()
{
	if(!isset($_SESSION["user"]))
	{
		return false;
	}
	else
	{
		return true;
	}
}

function get_ip($ip)
{
	$get_city=file_get_contents("http://int.dpool.sina.com.cn/iplookup/iplookup.php?ip={$ip}");
	$get_city=explode("	",$get_city);
	if($ip=="")
	{
		echo "未获取!";
	}
	else
	{
		echo $get_city[3].$get_city[4].$get_city[5]." - ".$get_city[7];
	}
}

function get_user($t)
{
	$u=$_SESSION["user"];
	$s=mysql_query("select `$t` from admin_user where user='$u'");
	$row=mysql_fetch_array($s);
	return $row[$t];
}

function query($sql)
{
	$s=mysql_query($sql);
	$row=mysql_fetch_array($s);
	return $row["count"];
}


function is_email($email){ 
	$pattern="/^([\w\.-]+)@([a-zA-Z0-9-]+)(\.[a-zA-Z\.]+)$/i";//包含字母、数字、下划线_和点.的名字的email 
	if(preg_match($pattern,$email,$matches)){ 
	return true; 
	}else{ 
	return false; 
	} 
} 

function get_db($t)
{
	$user=$_SESSION["user"];
	$sql=mysql_query("select * from base where user='$user'");
	$row=mysql_fetch_array($sql);
	return $row[$t];
}
function createTABLE($n)
{
	$t="me_getqq_{$n}";
	$sql = "CREATE TABLE `$t`
	(
	id int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	qq varchar(60),
	ip varchar(60),
	title varchar(255),
	weburl varchar(255),
	rurl varchar(255),
	nc varchar(80),
	t tinyint(1),
	mdate int(11),
	get_date int(11)
	)";
	mysql_query($sql);
	
	$t="ip_{$n}";
	$sql = "CREATE TABLE `$t`
	(
	id int NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(id),
	ip char(20),
	get_date int(11)
	)";
	mysql_query($sql);
}

sql_open($py_host,$py_root,$py_pws,$py_db);


