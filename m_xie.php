<?php
ob_start();
session_start();
$_SESSION['evabio']=1;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
<meta content="全球最大的网络传记平台" name="description">
<meta name="keywords" content="传记"/>
<title>夏娃传记，留下足迹</title> 
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link href="ui/m_evabio.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />
<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="ui/maxlength.js" type="text/javascript" ></script> 
<script language="javascript">
$(document).ready(function() {
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
$("#getcode_math").click(function(){
		$(this).attr("src",'code/code_math.php?' + Math.random());
});
$("#tijiao").click(function(){
		var code_math = $("#code_math").val();
		$.post("code/chk_code.php?act=math",{code:code_math},function(msg){
			if(msg==1){
				$("form").submit(); 
			}else{
				alert("验证码错误！");
			}
		});
	});
$(".email").blur(function () {               
                    if (/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/.test($(this).val()) == false) {
                        alert("邮箱格式不正确，请重新填写");
                    }
});
					
});
</script>
</head>

<body style="background:url(ui/evabg.png) repeat;font-size:100%;font-family:Arial, Helvetica, sans-serif;">
<div id="wucai1" style="position:fixed;top:0;left:0;width:20%;background-color:#CFF09E;height:1%;z-index:9999;"></div>
<div id="wucai2" style="position:fixed;top:0;left:20%;width:20%;background-color:#A8DBA8;height:1%;z-index:9999;"></div>
<div id="wucai3" style="position:fixed;top:0;left:40%;width:20%;background-color:#79BD9A;height:1%;z-index:9999;"></div>
<div id="wucai4" style="position:fixed;top:0;left:60%;width:20%;background-color:#3B8686;height:1%;z-index:9999;"></div>
<div id="wucai5" style="position:fixed;top:0;left:80%;width:20%;background-color:#0B486B;height:1%;z-index:9999;"></div>
<div id="eva" style="position:absolute;left:-70%;top:3%;width:150%;height:88%;z-index:8;min-height:450px;min-width:400px;">
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
</div>
<!--zuo-->
<!--you-->
<div style="position:absolute;width:50%;height:100%;left:50%;background:url(ui/book_bgr.png) repeat;">
<div style="position:absolute;left:0px;top:0px;background:url(ui/zhongyou.png) repeat-y;;width:142px;height:100%;z-index:30;"></div>
<div style="position:absolute;left:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;z-index:30;"></div>
<div style="position:absolute;left:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;z-index:30;"></div>
<div style="position:absolute;left:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;z-index:30;"></div>
<div style="position:absolute;left:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;z-index:30;"></div>
<div style="position:absolute;top:5px;left:10px;z-index:50"><a href="index.php"><img src="ui/logo_m.png" /></a></div>
<div class="e" style="position:absolute;top:5px;right:10px;font-size:0.8em;z-index:50;"><a href="index.php" target="_parent" style="padding:3px">返回</a> </div>
<div style="position:absolute;top:8%;left:20px;text-align:left;width:100%;font-size:1em;z-index:50;"><span class="ee"><?php echo date("Y-m-d"); ?></span></div>
<div style="position:absolute;top:15%;font-size:1em;width:100%;z-index:50;" >
<div style="position:relative;width:80%;height:50%;margin-left:auto;margin-right:auto;text-align:center;" >
<form action="m_insert.php" method="post" enctype="multipart/form-data">
<textarea name="content" wrap="physical" class="limited" id="content" style="background:none;width:100%;height:170px;resize: vertical;text-align:center;overflow:auto;font-size:0.8em;border:1px solid #aaa" type="text"></textarea>
<span style="font-size:0.7em;color:#aaa" class="charsLeft">490</span><input type="hidden" name="maxlength" value="490" />
</div>
</div>
<div id="upload" style="color:#aaa;font-size:0.8em;position:absolute;top:60%;left:0;text-align:center;width:100%;overflow:hidden;border:0;z-index:50;">
<input name="file" type="file" />

</div>
<div style="position:absolute;top:68%;left:0;color:#aaa;font-size:0.8em;width:100%;text-align:center;z-index:50;"> Email: <input type="text" name="email" id="email" class="email" style="width:95px;height: 16px;padding: 2px 3px;text-align: right;margin-right: 3px;background:none;"><span id="spinfo"></span>
</div>
<div style="position:absolute;bottom:50px;left:0;font-size:0.8em;width:100%;text-align:center;z-index:50;color:#aaa;" >
验证码:<input type="text" style="background:none;color:#aaa;width:100px" class="input" id="code_math" maxlength="3" />
<div>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="code/code_math.php" id="getcode_math" title="看不清，点击换一张" align="absmiddle">
</div>
</div>
<div style="position:absolute;bottom:10px;left:0;font-size:1.2em;width:100%;text-align:center;z-index:50;" >
<span class="e"><a id="tijiao"  style="padding-left:60px;padding-right:60px;" href="#" >提交</a></span></div>
</form>
</div><!--you-->
<div class="eee" style="width:150%;text-align:center;z-index:99999999999;position:absolute;bottom:-60px;font-size:0.8em;color:#aaa"><a href="p.php" target="_self" style="padding:3px;">电脑版</a> <a href="us.html" target="_self" style="padding:3px;">联系我们</a></div>
</div><!--eva-->
</body>
</html>