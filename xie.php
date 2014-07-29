<?php
ob_start();
session_start();
$_SESSION['evabio']=1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="全球最大的网络传记平台" name="description">
<meta name="keywords" content="传记"/>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<title>夏娃传记，留下足迹</title>  
<link rel="stylesheet" type="text/css" href="upload/uploadify.css"> 
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link href="ui/evabio.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />
<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="ui/maxlength.js" type="text/javascript" ></script> 
<script src="upload/jquery.uploadify.min.js" type="text/javascript"></script>
<script language="javascript">
$(document).ready(function() {
<?php $timestamp = time();?>	
$('#file_upload').uploadify({
				'formData'     : {
					'timestamp' : '<?php echo $timestamp;?>',
					'token'     : '<?php echo md5('unique_salt' . $timestamp);?>'
				},
				'swf'      : 'upload/uploadify.swf',
				'uploader' : 'upload/uploadify.php',
				'onUploadSuccess' : function(file, data, response) {
				$("#upload").html(data)
                 },
				 'fileTypeExts' : '*.gif; *.jpg; *.png',
				 'buttonText' : '图片上传',
				 'fileSizeLimit' : '60000KB',
				 'height'   : 30,
				 'width'    : 80,
				 'uploadLimit' : 1
				 
			});
					
$('textarea.limited').maxlength({
            'feedback' : '.charsLeft', 
			'useInput' : true
        });
		$('input.limited').maxlength({
            'feedback' : '.charsLeft' 
        });
        
        $('textarea.wordLimited').maxlength({
            'words': true,
            'feedback': '.wordsLeft',
			'useInput' : true
        });		
var state =0;
$(".email").focus(function () {
                if (state == false) {
                    $(this).val('');
                }
            })
$(".email").blur(function () {
                if ($(this).val() == '') {
                    $("#spinfo").text("邮箱不能为空");
                    $(this).focus();
                }
                else {
                    if (/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test($(this).val()) == false) {
                        $("#spinfo").text("邮箱格式不正确，请重新填写");
                        $(this).focus();
                    }
                    else {
                        $("#spinfo").text('ok');
                        state=1;
                    }
                }
            });
//算术验证
$("#getcode_math").click(function(){
		$(this).attr("src",'code/code_math.php?' + Math.random());
});


$("#tijiao").click(function(msg){
var upload_img=($("#upload_pic").val());
var upload_content=($("#content").val());
var upload_email=($("#email").val());
var code_math = $("#code_math").val();
$.post("code/chk_code.php?act=math",{code:code_math},function(msg){

if(msg==1&&state==1){

$.post("insert.php", { upload_pic:upload_img, email:upload_email, content:upload_content} );
$("#wucai5").fadeOut(300);$("#wucai4").fadeOut(600);$("#wucai3").fadeOut(900);$("#wucai2").fadeOut(1200);$("#wucai1").fadeOut(1500);
$("#wucai1").fadeIn(300);$("#wucai2").fadeIn(600);$("#wucai3").fadeIn(900);$("#wucai4").fadeIn(1200);$("#wucai5").fadeIn(1500);
$("#chenggong").fadeIn(2000,function(){
   window.location.href="index.php";}

);

}else{
$("#yzm").text("左边有没填对的吧");
               
			}
		});
		
	});	
			
});
</script>
</head>
<body style="background:url(ui/evabg.png) repeat;font-size:100%;font-family:Arial, Helvetica, sans-serif;overflow:hidden">
<div id="chenggong" style="display: none;position:fixed;left:45%;top:45%;background:#A8DBA8;color:white;font-size:2em;z-index:99999">发布成功！</div>
<div id="wucai1" style="position:fixed;top:0;left:0;width:20%;background-color:#CFF09E;height:0.618%;z-index:9999;"></div>
<div id="wucai2" style="position:fixed;top:0;left:20%;width:20%;background-color:#A8DBA8;height:0.618%;z-index:9999;"></div>
<div id="wucai3" style="position:fixed;top:0;left:40%;width:20%;background-color:#79BD9A;height:0.618%;z-index:9999;"></div>
<div id="wucai4" style="position:fixed;top:0;left:60%;width:20%;background-color:#3B8686;height:0.618%;z-index:9999;"></div>
<div id="wucai5" style="position:fixed;top:0;left:80%;width:20%;background-color:#0B486B;height:0.618%;z-index:9999;"></div>
<div id="eva" style="top:3%;left:5%;width:90%;height:88%;position:absolute;">
<div class="zuozhong"></div>
<div class="zuoshang"></div>
<div class="zuoxia" ></div>
<div class="youzhong"></div>
<div class="youshang"></div>
<div class="youxia"></div>
<div class="shang"></div>
<div class="xia"></div>
<div class="zhongshang"></div>
<div class="guangying"></div>
<div class="zhongxia"></div>
<!--zuo-->
<div style="position:absolute;width:50%;height:100%;left:0%;background:url(ui/book_bgl.png) repeat;z-index:50;" >
<div style="position:absolute;right:0px;top:0px;background:url(ui/zhongzuo.png) repeat-y;;width:142px;height:100%;z-index:30;"></div>
<div style="position:absolute;right:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;z-index:30;"></div>
<div style="position:absolute;right:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;z-index:30;"></div>
<div style="position:absolute;right:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;z-index:30;"></div>
<div style="position:absolute;right:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;z-index:30;"></div>
<div style="position:absolute;top:10px;left:10px;z-index:50;"><a href="index.php"><img src="ui/logo.png" border="0" /></a></div>
<div class="ee" style="position:absolute;top:12%;left:6.18%;text-align:left;width:80%;font-size:2em;z-index:50;"><?php echo date("Y-m-d");?> </div>
<div style="position:absolute;top:19%;font-size:0.8em;width:100%;z-index:50;" >
<div style="position:relative;width:80%;height:80%;margin-left:auto;margin-right:auto;text-align:center;" >
<form>
<textarea name="content" wrap="physical" class="limited" id="content" style="background:none;width:100%;height:300px;text-align:center;resize: vertical;overflow:auto;font-size:1.3em;border:1px solid #aaa" type="text"></textarea>
<span style="font-size:0.8em;color:#aaa" class="charsLeft">490</span><input type="hidden" name="maxlength" value="490" />
</form>
</div>
</div>
<!--shiji-->
<div style="position:absolute;bottom:60px;left:20%;color:#aaa;font-size:0.8em;width:100%;z-index:50;"> &nbsp;Email: <input type="text" name="email" id="email" class="email" style="width: 200px;height: 16px;padding: 2px 3px;text-align: right;background:none;"><span id="spinfo" style="color:#0B486B;"></span>
</div>
<!--email-->
<div style="position:absolute;bottom:30px;left:20%;font-size:0.8em;width:100%;z-index:50;color:#aaa" >
验证码:<input type="text" style="background:none;color:#aaa;text-align: right;width: 200px;height: 16px;padding: 2px 3px;" class="input" id="code_math" maxlength="3" /> <img src="code/code_math.php" id="getcode_math" title="看不清，点击换一张" align="absmiddle">
</div><!--yanzhengma-->
</div>
<!--zuo-->
<!--you-->
<div style="position:absolute;width:50%;height:100%;left:50%;background:url(ui/book_bgr.png) repeat;">
<div style="position:absolute;left:0px;top:0px;background:url(ui/zhongyou.png) repeat-y;;width:142px;height:100%;z-index:30;"></div>
<div style="position:absolute;left:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;z-index:30;"></div>
<div style="position:absolute;left:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;z-index:30;"></div>
<div style="position:absolute;left:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;z-index:30;"></div>
<div style="position:absolute;left:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;z-index:30;"></div>
<div class="e" style="position:absolute;top:10px;right:10px;font-size:0.8em;z-index:50;"><a href="index.php" target="_parent" style="padding:3px">返回</a> </div>
<div id="upload" style="position:absolute;top:15%;left:6%;text-align:center;width:90%;height:70%;overflow:hidden;border:0;z-index:50;">
<input id="file_upload" name="file_upload" type="file" >
</div>
<!--tupian-->
<div style="position:absolute;bottom:40px;left:0;font-size:1.4em;width:100%;text-align:center;z-index:50;" >
<span class="e"><a class="btn" id="tijiao" style="padding-left:60px;padding-right:60px;" href="###">提交</a></span><span id="yzm" style="color:#0B486B;"></span>
</div><!--tijiao-->
</div><!--you-->
</div><!--eva-->
<div class="eee" style="width:100%;text-align:center;z-index:99999999999;position:absolute;left:0;bottom:1%;font-size:0.8em;color:#aaa"><a href="m.php" target="_self" style="padding:3px;">移动版</a> <a href="us.html" target="_self" style="padding:3px;">联系我们</a></div>
</body>
</html>