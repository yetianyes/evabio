<?php
require_once('conn.php');
require_once('mobile_device_detect.php');
require_once('ad.php');
$mobile = mobile_device_detect();
$ziliao1=mysql_query("SELECT * FROM `shiji` ORDER BY  `shiji`.`id` DESC LIMIT 0 , 1");
$num1 = mysql_fetch_row($ziliao1);
$ziliao2=mysql_query("SELECT * FROM `shiji` where `id`<$num1[0] ORDER BY  `shiji`.`id` DESC LIMIT 0 , 1");
$num2 = mysql_fetch_row($ziliao2);
$ziliao3=mysql_query("SELECT * FROM `shiji` where `id`<$num2[0] ORDER BY  `shiji`.`id` DESC LIMIT 0 , 1");
$num3= mysql_fetch_row($ziliao3);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta content="全球最大的网络传记平台" name="description">
<meta name="keywords" content="传记"/>
<title>夏娃传记，留下足迹</title>
<!--[if lt IE 8]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<div style="position:absolute;width:50%;left:25%;top:0;background:#A8DBA8;color:white;font-size:1.5em;z-index:99999">&nbsp;IE浏览器太卡了，用chrome或者其他最新版本的浏览器吧</div>
<![endif]-->   
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link href="ui/booklet/book.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />
<link href="ui/evabio.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />
<script src="http://libs.baidu.com/jquery/1.9.1/jquery.min.js"></script>
<script src="http://libs.baidu.com/jqueryui/1.10.1/jquery-ui.min.js"></script>
<script src="ui/booklet/evabio.js" type="text/javascript" ></script> 
<script language="javascript">
$(document).ready(function() {
 $(document).ajaxStop(function(){
$("#wucai1").fadeIn(300);$("#wucai2").fadeIn(600);$("#wucai3").fadeIn(900);$("#wucai4").fadeIn(1200);$("#wucai5").fadeIn(1500);$(".eva_load").fadeOut(300)
 }) 
var i=<?php echo $num3[0]?>;
$('#mybook').booklet({
width:'100%',height:'100%',pageNumbers:false,<?php if($mobile==true){echo 'arrows:true,manual:false,';} else {echo 'manual:true,';}?>
start: function(){$("#wucai5").fadeOut(300);$("#wucai4").fadeOut(600);$("#wucai3").fadeOut(900);$("#wucai2").fadeOut(1200);$("#wucai1").fadeOut(1500);$(".eva_load").fadeIn(300)},
change: function(){
   
   $.ajax({
   type: "GET",
   url: "show1.php",
   data: {evaid:i},
   success: function(result1){
     $('#mybook').booklet("add", "end",result1),
	 setTimeout (
	  $.ajax({
   type: "GET",
   url: "show2.php",
   data: {evaid:i},
   success: function(result2){
     $('#mybook').booklet("add", "end",result2),
	i--
		
	 
   }
}),1000)
   }
})//ajax
,
$(".sousuo_1").hover(
function () {
    $(".yeshu ").show(); 
	$(".slider ").show();
	$(".ye ").show();
}
),
$(".yeshu ").hide(), 
$(".slider ").hide(),
$(".ye ").hide();
$( ".slider" ).slider({
      value: <?php echo  $num1[0]*2+2?>,
      min: 1,
      max: <?php echo $num1[0]*2+2?>,
      slide: function(event, ui) {
      $( ".yeshu" ).val( ui.value );		
      },
	  stop: function(event, ui) {
	  $("form").trigger("submit");
	  }
});	
$( ".yeshu" ).val( $( ".slider" ).slider( "value" ) );	   

	}//change

});//booklet
$( ".slider" ).slider({
      value: <?php echo $num1[0]*2+2?>,
      min: 1,
      max: <?php echo $num1[0]*2+2?>,
      slide: function(event, ui) {
      $( ".yeshu" ).val( ui.value );		
      },
	  stop: function(event, ui) {
	  $("form").trigger("submit");
	  }
});	
$( ".yeshu" ).val( $( ".slider" ).slider( "value" ) );	   
setInterval(
function eva_reload()
{
$(".gong a" ).click(function(){
$(this).html($(this).html()*1+1);
$.get('gongming.php?gongming_id='+$(this).attr("action-data")
  );
  exit;
	});			

}
,500);	
$(".sousuo_1").hover(
function () {
    $(".yeshu ").show(); 
	$(".slider ").show();
	$(".ye ").show();
}
)
$(function(){
	$('.help').show();
	$('#step1').show();
	$('.close').on('click',function(){
		$('.step').hide();
		$('.help').hide();
	});
	$('.next').on('click',function(){
		var obj = $(this).parents('.step');
		var step = obj.attr('step');
		obj.hide();
		$('#step'+(parseInt(step)+1)).show();
	});
	$('.over').on('click',function(){
		$(this).parents('.step').hide();
		$('.help').hide();
	});
});	

});
</script>
</head>
<body style="background:url(ui/evabg.png) repeat;font-size:100%;font-family:Arial, Helvetica, sans-serif;overflow:hidden">
<div class="eva_load" style="position:absolute; right:0; top:0; width:10%; height:100%; z-index:999999;display: none;background:url(ui/loading.gif) no-repeat center"></div>
<div class="eva_load" style="position:absolute; left:0; top:0; width:10%; height:100%; z-index:999999;display: none;"></div>
<div class="help">
	<a href="###" class="close" title="关闭新手帮助">×</a>
	<div id="step1" class="step" step="1" style="top:10%;right:10%;width:300px">
		<b class="jt jt_right" style="right:-40px;top:40px"></b>
		<p>
			<span class="h1">①</span><span class="h2">下一页</span>
			<br>鼠标放在上面，看见翻页，然后点击哦<br>
			<a href="###" class="next">下一步</a>
		</p>
	</div>
	<div id="step2" class="step" step="2" style="top:10%;left:10%;width:300px">
		<b class="jt jt_left" style="top:40px;left:-40px"></b>
		<p>
			<span class="h1">②</span><span class="h2">上一页</span>
			<br>从下一页开始，才能翻到上一页呢！！<br/>
			<br>人生不要轻易回头哦！！<br /> 
			<a href="###" class="next">下一步</a>
		</p>
	</div>
	<div id="step3" class="step" step="3" style="bottom:20%;left:20%;width:250px">
		<b class="jt jt_bottom" style="bottom:-40px;left:100px"></b>
		<p>
			<span class="h1">③</span><span class="h2">夏娃页码</span>
			<br>记住页码，就不怕忘了哦<br>
			<a href="###" class="over">&nbsp;完&nbsp;成&nbsp;</a>
		</p>
	</div>
</div>
<div id="wucai1" style="position:fixed;top:0;left:0;width:20%;background-color:#CFF09E;height:0.618%;z-index:9999;"></div>
<div id="wucai2" style="position:fixed;top:0;left:20%;width:20%;background-color:#A8DBA8;height:0.618%;z-index:9999;"></div>
<div id="wucai3" style="position:fixed;top:0;left:40%;width:20%;background-color:#79BD9A;height:0.618%;z-index:9999;"></div>
<div id="wucai4" style="position:fixed;top:0;left:60%;width:20%;background-color:#3B8686;height:0.618%;z-index:9999;"></div>
<div id="wucai5" style="position:fixed;top:0;left:80%;width:20%;background-color:#0B486B;height:0.618%;z-index:9999;"></div>
<div id="eva" style="position:absolute;left:5%;top:3%;width:90%;height:88%;z-index:8;min-width:800px;<?php if($mobile==true){echo 'min-height:700px;';} else {echo 'min-height:300px;';}?>">
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
<div id="mybook" class="mybook" >
<!--l-->
<div>
<div style="position:absolute;right:0px;top:0px;background:url(ui/zhongzuo.png) repeat-y;;width:142px;height:100%;"></div>
<div style="position:absolute;right:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;right:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;right:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;right:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;top:10px;left:10px;"><a href="index.php"><img src="ui/logo.png" border="0" /></a></div>
<div style="position:absolute;top:70px;height:90%;overflow:hidden;left:0;width:100%;">
<div class="ee" style="position:relative;top:0;left:6.18%;text-align:left;width:80%;font-size:2em"><?php echo $num1[2]; ?></div> 
<div style="display:table;width:100%;height:60%;_position:relative;overflow:hidden; ">   
<div style="vertical-align:middle;display:table-cell;_position:absolute;_top:50%;   ">   
<div style="_position:relative; _top:-50%;">
<div id="shiji" style="position:relative;margin-left:auto;margin-right:auto;text-align:center;font-size:0.8em;z-index:10;width:80%;top:0;">
<span class="eeee"><?php if ($num1[4]=='0') {echo $num1[1];} else {echo '根据相关法律法规和政策，此传记未予显示。' ;} ?></span>
</div>
</div>   
</div>
</div>
<div style="position:relative;font-size:0.8em;text-align:center;width:100%;top:0px;">
<span class="ee">——<?php if ($num1[4]=='0') {echo $num1[6];} else {echo 's@evabio.com';} ?></span>&nbsp;&nbsp;<span class="e gong" style="color:#3B8686">
共鸣&nbsp;<a action-data="<?php echo $num1[0]; ?>" href="###" style="padding:1px;"><?php echo $num1[7]; ?></a>
</span>
</div>     
</div>
<div style="position:absolute;margin:10px;bottom:0px;font-size:0.8em;width:100%;text-align:center;z-index:2;color:#0B486B">- <?php echo 2*$num1[0]+2; ?> -
</div>
</div>
<!--l-->
<!--2-->
<div>
<div style="position:absolute;left:0px;top:0px;background:url(ui/zhongyou.png) repeat-y;;width:142px;height:100%;"></div>
<div style="position:absolute;left:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;top:10px;right:10px;font-size:0.8em;"><form action="s.php" method="get" id="tiaoye"><input type="text" name="yeshu" class="yeshu" style="background:none;border:0;width: 25px;padding: 0;font-size:0.8em;color:#79BD9A;display:none" ><div class="slider" style="position:absolute;top:5px;left:-60px;width:50px;display:none"></div><span class="ye" style="color:#79BD9A;display:none">页</span><span class="e">  <a class="sousuo_1" href="###"  style="padding:1px;">搜索</a> | <a href="xie.php" target="_self" style="padding:1px;">免注册，写传记</a></span>
</form></div>
<div style="position:absolute;top:10%;height:80%;overflow:hidden;text-align:center;left:10%;width:80%;">
<div class="e" style="position:relative;left:0;top:0;text-align:center;width:100%;height:60px;">
<?php
//echo $ad_z[1];
?>
</div>
<div style="position:relative;top:0;left:0;text-align:center;width:100%;height:70%;overflow:hidden;"><a href="pic/<?php if ($num1[4]=='0') {if (empty($num1[3])){ echo "w.png";} else { echo $num1[3];}}  else { echo "w.png"; } ?>" target="_blank"><img src="ui/transparent.gif" style="background-image:url(pic/<?php if ($num1[4]=='0') {if (empty($num1[3])){ echo "w.png";} else { echo $num1[3];}}  else { echo "w.png"; } ?>);background-repeat:no-repeat; background-position:center;width:100%; height:100%;" /></a></div>
</div>
<div style="position:absolute;width:100%;bottom:0px;font-size:0.8em;margin:10px;text-align:center;z-index:2;color:#0B486B">- <?php echo 2*$num1[0]+1; ?> -
</div>
</div> 
<!--2-->
<!--3-->
<div>
<div style="position:absolute;right:0px;top:0px;background:url(ui/zhongzuo.png) repeat-y;;width:142px;height:100%;"></div>
<div style="position:absolute;right:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;right:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;right:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;right:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;top:10px;left:10px;"><a href="index.php"><img src="ui/logo.png" border="0" /></a></div>
<div style="position:absolute;top:70px;height:90%;overflow:hidden;left:0;width:100%;">
<div class="ee" style="position:relative;top:0;left:6.18%;text-align:left;width:80%;font-size:2em"><?php echo $num2[2]; ?></div> 
<div style="display:table;width:100%;height:60%;_position:relative;overflow:hidden; ">   
<div style="vertical-align:middle;display:table-cell;_position:absolute;_top:50%;   ">   
<div style="_position:relative; _top:-50%;">
<div id="shiji" style="position:relative;margin-left:auto;margin-right:auto;text-align:center;font-size:0.8em;z-index:10;width:80%;top:0;">
<span class="eeee"><?php if ($num2[4]=='0') {echo $num2[1];} else {echo '根据相关法律法规和政策，此传记未予显示。' ;} ?></span>
</div>
</div>   
</div>
</div>
<div style="position:relative;font-size:0.8em;text-align:center;width:100%;top:0px;">
<span class="ee">——<?php if ($num2[4]=='0') {echo $num2[6];} else {echo 's@evabio.com';} ?></span>&nbsp;&nbsp;<span class="e gong" style="color:#3B8686">
共鸣&nbsp;<a action-data="<?php echo $num2[0]; ?>" href="###" style="padding:1px;"><?php echo $num2[7]; ?></a>
</span>
</div>     
</div>
<div style="position:absolute;margin:10px;bottom:0px;font-size:0.8em;width:100%;text-align:center;z-index:2;color:#0B486B">- <?php echo 2*$num2[0]+2; ?> -
</div>
</div>
<!--3-->
<!--4-->
<div>
<div style="position:absolute;left:0px;top:0px;background:url(ui/zhongyou.png) repeat-y;;width:142px;height:100%;"></div>
<div style="position:absolute;left:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;top:10px;right:10px;font-size:0.8em;"><form action="s.php" method="get" id="tiaoye"><input type="text" name="yeshu" class="yeshu" style="background:none;border:0;width: 25px;padding: 0;font-size:0.8em;color:#79BD9A;display:none" ><div class="slider" style="position:absolute;top:5px;left:-60px;width:50px;display:none"></div><span class="ye" style="color:#79BD9A;display:none">页</span><span class="e">  <a class="sousuo_1" href="###"  style="padding:1px;">搜索</a> | <a href="xie.php" target="_self" style="padding:1px;">免注册，写传记</a></span>
</form></div>
<div style="position:absolute;top:10%;height:80%;overflow:hidden;text-align:center;left:10%;width:80%;">
<div style="position:relative;left:0;top:0;text-align:center;width:100%;height:60px;">
<script type="text/javascript">
document.write('<a style="display:none!important" id="tanx-a-mm_30214063_4196832_13744810"></a>');
     tanx_s = document.createElement("script");
     tanx_s.type = "text/javascript";
     tanx_s.charset = "gbk";
     tanx_s.id = "tanx-s-mm_30214063_4196832_13744810";
     tanx_s.async = true;
     tanx_s.src = "http://p.tanx.com/ex?i=mm_30214063_4196832_13744810";
     tanx_h = document.getElementsByTagName("head")[0];
     if(tanx_h)tanx_h.insertBefore(tanx_s,tanx_h.firstChild);
</script>
</div>
<div style="position:relative;top:0;left:0;text-align:center;width:100%;height:70%;overflow:hidden;"><a href="pic/<?php if ($num2[4]=='0') {if (empty($num2[3])){ echo "w.png";} else { echo $num2[3];}}  else { echo "w.png"; } ?>" target="_blank"><img src="ui/transparent.gif" style="background-image:url(pic/<?php if ($num2[4]=='0') {if (empty($num2[3])){ echo "w.png";} else { echo $num2[3];}}  else { echo "w.png"; } ?>);background-repeat:no-repeat; background-position:center;width:100%; height:100%;" /></a></div>
</div>
<div style="position:absolute;width:100%;bottom:0px;font-size:0.8em;margin:10px;text-align:center;z-index:2;color:#0B486B">- <?php echo 2*$num2[0]+1; ?> -
</div>
</div> 
<!--4-->
<!--5-->
<div>
<div style="position:absolute;right:0px;top:0px;background:url(ui/zhongzuo.png) repeat-y;;width:142px;height:100%;"></div>
<div style="position:absolute;right:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;right:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;right:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;right:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;top:10px;left:10px;"><a href="index.php"><img src="ui/logo.png" border="0" /></a></div>
<div style="position:absolute;top:70px;height:90%;overflow:hidden;left:0;width:100%;">
<div class="ee" style="position:relative;top:0;left:6.18%;text-align:left;width:80%;font-size:2em"><?php echo $num3[2]; ?></div> 
<div style="display:table;width:100%;height:60%;_position:relative;overflow:hidden; ">   
<div style="vertical-align:middle;display:table-cell;_position:absolute;_top:50%;   ">   
<div style="_position:relative; _top:-50%;">
<div id="shiji" style="position:relative;margin-left:auto;margin-right:auto;text-align:center;font-size:0.8em;z-index:10;width:80%;top:0;">
<span class="eeee"><?php if ($num3[4]=='0') {echo $num3[1];} else {echo '根据相关法律法规和政策，此传记未予显示。' ;} ?></span>
</div>
</div>   
</div>
</div>
<div style="position:relative;font-size:0.8em;text-align:center;width:100%;top:0px;">
<span class="ee">——<?php if ($num3[4]=='0') {echo $num3[6];} else {echo 's@evabio.com';} ?></span>&nbsp;&nbsp;<span class="e gong" style="color:#3B8686">
共鸣&nbsp;<a action-data="<?php echo $num3[0]; ?>" href="###" style="padding:1px;"><?php echo $num3[7]; ?></a>
</span>
</div>     
</div>
<div style="position:absolute;margin:10px;bottom:0px;font-size:0.8em;width:100%;text-align:center;z-index:2;color:#0B486B">- <?php echo 2*$num3[0]+2; ?> -
</div>
</div>
<!--5-->
<!--6-->
<div>
<div style="position:absolute;left:0px;top:0px;background:url(ui/zhongyou.png) repeat-y;;width:142px;height:100%;"></div>
<div style="position:absolute;left:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;top:10px;right:10px;font-size:0.8em;"><form action="s.php" method="get" id="tiaoye"><input type="text" name="yeshu" class="yeshu" style="background:none;border:0;width: 25px;padding: 0;font-size:0.8em;color:#79BD9A;display:none" ><div class="slider" style="position:absolute;top:5px;left:-60px;width:50px;display:none"></div><span class="ye" style="color:#79BD9A;display:none">页</span><span class="e">  <a class="sousuo_1" href="###"  style="padding:1px;">搜索</a> | <a href="xie.php" target="_self" style="padding:1px;">免注册，写传记</a></span>
</form></div>
<div style="position:absolute;top:10%;height:80%;overflow:hidden;text-align:center;left:10%;width:80%;">
<div style="position:relative;left:0;top:0;text-align:center;width:100%;height:60px;">
<?php
//echo $ad_z[2];
?>
</div>
<div style="position:relative;top:0;left:0;text-align:center;width:100%;height:70%;overflow:hidden;"><a href="pic/<?php if ($num3[4]=='0') {if (empty($num3[3])){ echo "w.png";} else { echo $num3[3];}}  else { echo "w.png"; } ?>" target="_blank"><img src="ui/transparent.gif" style="background-image:url(pic/<?php if ($num3[4]=='0') {if (empty($num3[3])){ echo "w.png";} else { echo $num3[3];}}  else { echo "w.png"; } ?>);background-repeat:no-repeat; background-position:center;width:100%; height:100%;" /></a></div>
</div>
<div style="position:absolute;width:100%;bottom:0px;font-size:0.8em;margin:10px;text-align:center;z-index:2;color:#0B486B">- <?php echo 2*$num3[0]+1; ?> -
</div>
</div> 
<!--6-->
</div><!--mybook-->
<div class="eee" style="width:100%;text-align:center;z-index:99999999999;position:relative;left:0;bottom:-30px;font-size:0.8em;"><a href="m.php" target="_self" style="padding:3px;">移动版</a> <a href="us.html" target="_self" style="padding:3px;">联系我们</a></div>
</div><!--eva-->
</body>
</html>