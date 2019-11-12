<?php include("inc_function.php");
if($_POST)
{
	header("content-type:text/html;charset=gb2312");
	ini_set("magic_quotes_runtime",0);
	require 'class.phpmailer.php';
	
	$n=$_SESSION["user"];	
	$sql=mysql_query("select * from base where user='$n'");
	$row=mysql_fetch_array($sql);
	$server=$row["server"];
	$name=$row["name"];
	$pws=$row["pws"];
	$email=$row["email"];
	$title=$row["title"];
	$content=html_entity_decode($row["content"]);
	$t=trim($row["t"]);
	
	$ID_Dele= implode(",",$_POST['ID_Dele']);
	$sql=mysql_query("select * from `$sql_db` where id in ($ID_Dele)");
	while($row=mysql_fetch_array($sql))
	{
		$qqemail=$row["qq"]."@qq.com";
			try {
			$mail = new PHPMailer(true); 
			$mail->IsSMTP();
			$mail->CharSet='gb2312'; //设置邮件的字符编码，这很重要，不然中文乱码
			$mail->SMTPAuth = true; //开启认证
			$mail->Port = 25; 
			$mail->Host = $server; 
			$mail->Username = $name; 
			$mail->Password = $pws; 
			//$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现"Could not execute: /var/qmail/bin/sendmail "的错误提示
			$mail->AddReplyTo($name,"网络营销");//回复地址
			$mail->From = $name;
			$mail->FromName = $name;
			$to = $qqemail;//收件人地址
			$mail->AddAddress($to);
			$mail->Subject = $title;
			$mail->Body = $content;
			//$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略
			$mail->WordWrap = 80; // 设置每行字符串的长度
			//$mail->AddAttachment("f:/test.png"); //可以添加附件
			$mail->IsHTML(true); 
			$mail->Send();
			
				//echo '邮件已发送';
				$q=$row["qq"];
				mysql_query("update `$sql_db` set t='1' where qq='$q'");

			} catch (phpmailerException $e) {
				echo "邮件发送失败：".$e->errorMessage();
				
			}
	}
	$rurl=$_SERVER['HTTP_REFERER'];
	echo "<script language=\"javascript\">location.href=\"{$rurl}\";</script>";
}
