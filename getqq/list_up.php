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
			$mail->CharSet='gb2312'; //�����ʼ����ַ����룬�����Ҫ����Ȼ��������
			$mail->SMTPAuth = true; //������֤
			$mail->Port = 25; 
			$mail->Host = $server; 
			$mail->Username = $name; 
			$mail->Password = $pws; 
			//$mail->IsSendmail(); //���û��sendmail�����ע�͵����������"Could not execute: /var/qmail/bin/sendmail "�Ĵ�����ʾ
			$mail->AddReplyTo($name,"����Ӫ��");//�ظ���ַ
			$mail->From = $name;
			$mail->FromName = $name;
			$to = $qqemail;//�ռ��˵�ַ
			$mail->AddAddress($to);
			$mail->Subject = $title;
			$mail->Body = $content;
			//$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //���ʼ���֧��htmlʱ������ʾ������ʡ��
			$mail->WordWrap = 80; // ����ÿ���ַ����ĳ���
			//$mail->AddAttachment("f:/test.png"); //������Ӹ���
			$mail->IsHTML(true); 
			$mail->Send();
			
				//echo '�ʼ��ѷ���';
				$q=$row["qq"];
				mysql_query("update `$sql_db` set t='1' where qq='$q'");

			} catch (phpmailerException $e) {
				echo "�ʼ�����ʧ�ܣ�".$e->errorMessage();
				
			}
	}
	$rurl=$_SERVER['HTTP_REFERER'];
	echo "<script language=\"javascript\">location.href=\"{$rurl}\";</script>";
}
