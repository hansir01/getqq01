<?php
class smail {
 var $smtp = ""; 
 var $check = 1;
 var $username = "";
 var $password = "";
 var $s_from = "";
 
 
 function smail ( $from, $password, $smtp, $check = 1 ) {
  if( preg_match("/^[^\d\-_][\w\-]*[^\-_]@[^\-][a-zA-Z\d\-]+[^\-](\.[^\-][a-zA-Z\d\-]*[^\-])*\.[a-zA-Z]{2,3}/", $from ) ) {
   $this->username = substr( $from, 0, strpos( $from , "@" ) );
   $this->password = $password;
   $this->smtp = $smtp ? $smtp : $this->smtp;
   $this->check = $check;
   $this->s_from = $from;
  }
 }
 

 function send ( $to, $from, $subject, $message ) { 
 

  $fp = fsockopen ( $this->smtp, 25, $errno, $errstr, 60); 
  if (!$fp ) return "联接服务器失败".__LINE__;
  set_socket_blocking($fp, true ); 
  
  $lastmessage=fgets($fp,512);
  if ( substr($lastmessage,0,3) != 220 ) return "错误信息1:$lastmessage".__LINE__; 
  

  $yourname = "YOURNAME";
  if($this->check == "1") $lastact="EHLO ".$yourname."\r\n";
  else $lastact="HELO ".$yourname."\r\n";
  
  fputs($fp, $lastact);
  $lastmessage == fgets($fp,512);
  if (substr($lastmessage,0,3) != 220 ) return "错误信息2:$lastmessage".__LINE__; 
  while (true) {
   $lastmessage = fgets($fp,512);
   if ( (substr($lastmessage,3,1) != "-")  or  (empty($lastmessage)) )
    break;
  } 
    

  if ($this->check=="1") {

   $lastact="AUTH LOGIN"."\r\n";
   fputs( $fp, $lastact);
   $lastmessage = fgets ($fp,512);
   if (substr($lastmessage,0,3) != 334) return "错误信息3:$lastmessage".__LINE__; 

   $lastact=base64_encode($this->username)."\r\n";
   fputs( $fp, $lastact);
   $lastmessage = fgets ($fp,512);
   if (substr($lastmessage,0,3) != 334) return "错误信息4:$lastmessage".__LINE__;

   $lastact=base64_encode($this->password)."\r\n";
   fputs( $fp, $lastact);
   $lastmessage = fgets ($fp,512);
   if (substr($lastmessage,0,3) != "235") return "错误信息5:$lastmessage".__LINE__;
  }
  
  $lastact="MAIL FROM: <". $this->s_from . ">\r\n"; 
  fputs( $fp, $lastact);
  $lastmessage = fgets ($fp,512);
  if (substr($lastmessage,0,3) != 250) return "错误信息6:$lastmessage".__LINE__;
  
  $lastact="RCPT TO: <". $to ."> \r\n"; 
  fputs( $fp, $lastact);
  $lastmessage = fgets ($fp,512);
  if (substr($lastmessage,0,3) != 250) return "错误信息7:$lastmessage".__LINE__;
   
  $lastact="DATA\r\n";
  fputs($fp, $lastact);
  $lastmessage = fgets ($fp,512);
  if (substr($lastmessage,0,3) != 354) return "错误信息8:$lastmessage".__LINE__;
  
   
  $head="Subject: $subject\r\n"; 
  $message = $head."\r\n".$message; 
   
  
  $head="From: $from\r\n"; 
  $message = $head.$message; 
   
  $head="To: $to\r\n";
  $message = $head.$message;

  $message .= "\r\n.\r\n";
  
  fputs($fp, $message); 
  $lastact="QUIT\r\n"; 
  
  fclose($fp); 
  return 0;
 } 
}