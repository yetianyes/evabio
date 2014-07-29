<?php 
error_reporting(0);
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
 
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/png") 
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 10000000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {

    if (file_exists("pic/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
$a1=pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$large_image_name = time().mt_rand(100,9999).".".$a1; 
$fileTypes1 = array('png','PNG');
$fileParts1 = pathinfo($large_image_name);
	 
if(in_array($fileParts1['extension'],$fileTypes1)) {
$large_image_location1 = "pic/".$large_image_name;
move_uploaded_file($_FILES['file']['tmp_name'], $large_image_location1);
chmod($large_image_location1, 0777);
		//aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
} 
else {	  
$max_width = "500";							// Max width allowed for the large image
$large_image_name = time().mt_rand(100,9999).".".pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION); 
//Image functions
//You do not need to alter these functions
function resizeImage($image,$width,$height,$scale) {
	$newImageWidth = ceil($width * $scale);
	$newImageHeight = ceil($height * $scale);
	$newImage = imagecreatetruecolor($newImageWidth,$newImageHeight);
	$source = imagecreatefromjpeg($image);
	imagecopyresampled($newImage,$source,0,0,0,0,$newImageWidth,$newImageHeight,$width,$height);
	imagejpeg($newImage,$image,90);
	chmod($image, 0777);
	return $image;
}

//You do not need to alter these functions
function getHeight($image) {
	$sizes = getimagesize($image);
	$height = $sizes[1];
	return $height;
}
//You do not need to alter these functions
function getWidth($image) {
	$sizes = getimagesize($image);
	$width = $sizes[0];
	return $width;
}

//Image Locations
$large_image_location = "pic/".$large_image_name;
//Everything is ok, so we can upload the image.
move_uploaded_file($_FILES['file']['tmp_name'], $large_image_location);
			chmod($large_image_location, 0777);
			
			$width = getWidth($large_image_location);
			$height = getHeight($large_image_location);
			//Scale the image if it is greater than the width set above
			if ($width > $max_width){
				$scale = $max_width/$width;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}else{
				$scale = 1;
				$uploaded = resizeImage($large_image_location,$width,$height,$scale);
			}
			
			
		}
}
     
      }
    }
else
  {
  $large_image_name='w.jpg';
  }  


$result = mysql_query("INSERT INTO shiji (`id`, `content`, `addtime`, `pic`, `delete`, `shouye`,`email`) VALUES (NULL,'$aa', '$b', '$large_image_name ', '', '','$c')");
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
} catch (phpmailerException $e) { 
echo "邮件发送失败：".$e->errorMessage(); 
}
header('Location: m.php');
exit;


}
}

}
?>
