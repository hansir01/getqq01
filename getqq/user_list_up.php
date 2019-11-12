<?php include("inc_function.php");
if($_SESSION["admin"]!="yes"){header("location:/out_login.php");exit();}
if($_POST)
{
	$ID_Dele= implode(",",$_POST['ID_Dele']);
	$sql=mysql_query("select user from admin_user where id in ($ID_Dele)");
	while($row=mysql_fetch_array($sql))
	{
		$n[]=$row["user"];
	}
	foreach($n as $value)
	{
		$ip="ip_".$value;
		$qq="me_getqq_".$value;
		mysql_query("drop table $ip");
		mysql_query("drop table $qq");
		mysql_query("delete from base where user='$value'");
	}
	
	$SQL="delete from admin_user where id in ($ID_Dele)";
	$result = mysql_query($SQL);
	$rurl=$_SERVER['HTTP_REFERER'];
	
	echo "<script language=\"javascript\">location.href=\"{$rurl}\";</script>";
}
