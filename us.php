<?php
header("content-type:text/html;charset=utf-8"); 
ini_set("magic_quotes_runtime",0); 
require 'PHPMailer-master/class.phpmailer.php'; 
$message=$_POST['contact']; 
try { 
$mail = new PHPMailer(true); 
$mail->IsSMTP(); 
$mail->CharSet='UTF-8'; //设置邮件的字符编码，这很重要，不然中文乱码 
$mail->SMTPAuth = true; //开启认证 
$mail->Port = 25; 
$mail->Host = "smtp.qq.com"; 
$mail->Username = "evabio@evabio.com"; 
$mail->Password = "a355285351"; 
//$mail->IsSendmail(); //如果没有sendmail组件就注释掉，否则出现“Could not execute: /var/qmail/bin/sendmail ”的错误提示 
$mail->AddReplyTo("evabio@evabio.com","夏娃传记");//回复地址 
$mail->From = "evabio@evabio.com"; 
$mail->FromName = "夏娃传记"; 
$to = "s@evabio.com"; 
$mail->AddAddress($to); 
$mail->Subject = "evabio 建议"; 
$mail->Body = $message; 
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略 
$mail->WordWrap = 80; // 设置每行字符串的长度 
//$mail->AddAttachment("f:/test.png"); //可以添加附件 
$mail->IsHTML(true); 
$mail->Send(); 
echo '收到啦！';
echo '<script>setTimeout(function(){location.href="index.php"},3000)</script>'; 
} catch (phpmailerException $e) { 
echo "邮件发送失败：".$e->errorMessage(); 
}


?>
