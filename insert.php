<?php 
session_start();
if( $_SESSION['evabio'] != 1){

echo $_SESSION['evabio'];
}
else {
require('badword.src.php');  
require_once('conn.php'); 
$a=mysql_real_escape_string($_POST['content']); 
$b=date("Y-m-d"); 
$c=mysql_real_escape_string($_POST['email']);
$d=mysql_real_escape_string($_POST['upload_pic']);
$badword1 = array_combine($badword,array_fill(0,count($badword),'*'));  
$aa = strtr($a, $badword1); 
if(strlen($a) > 1500 ){
 echo "太多了吧"; 
 exit;} 
 else {
if (!eregi("^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$",$c)) {
       echo "请您填写正确的E-Mail 地址!";
	   exit;}
 else {
$result = mysql_query("INSERT INTO shiji (`id`, `content`, `addtime`, `pic`, `delete`, `shouye`,`email`) VALUES (NULL,'$aa', '$b', '$d', '', '','$c')");
$ziliao1=mysql_query("SELECT `id` FROM `shiji` WHERE email='$c' ORDER BY  `shiji`.`id` DESC LIMIT 0 , 1");
$num1 = mysql_fetch_row($ziliao1);
$num2=$num1[0]*2+1;
$num3=$num1[0]*2+2;

ini_set("magic_quotes_runtime",0); 
require 'PHPMailer-master/class.phpmailer.php';  
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
$to = $c; 
$mail->AddAddress($to); 
$mail->Subject = "夏娃传记"; 
$message = '
<html>
<head>
<title>夏娃传记</title>
</head>
<body style="background:#CCCCCC;overflow:hidden">
<div style="width:100%;height:100%;position:absolute;top:40%;left:0;text-align:center">
<a href="www.evabio.com/m_s.php?yeshu='.$num2.'" style="background:#79BD9A;color:white;font-size:2em;padding:3px;text-decoration:none;"><span>夏娃传记</span></a>&nbsp;您的夏娃页数:'.$num2.'-'.$num3.'
</div>
</body>
</html>
';
$mail->Body = $message; 
$mail->AltBody = "To view the message, please use an HTML compatible email viewer!"; //当邮件不支持html时备用显示，可以省略 
$mail->WordWrap = 80; // 设置每行字符串的长度 
//$mail->AddAttachment("f:/test.png"); //可以添加附件 
$mail->IsHTML(true); 
$mail->Send(); 
echo '<script>setTimeout(function(){location.href="index.php"},3000)</script>'; 
} catch (phpmailerException $e) { 
echo "邮件发送失败：".$e->errorMessage(); 
}



}
}

}
?>

