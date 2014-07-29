<?php
require_once('conn.php');
require_once('ad.php'); 
$ziliao1=mysql_query("SELECT * FROM `shiji` ORDER BY  `shiji`.`id` DESC LIMIT 0 , 1");
$num1 = mysql_fetch_row($ziliao1);
$ziliao2=mysql_query("SELECT * FROM `shiji` where `id`<$num1[0] ORDER BY  `shiji`.`id` DESC LIMIT 0 , 1");
$num2 = mysql_fetch_row($ziliao2);
$ziliao3=mysql_query("SELECT * FROM `shiji` where `id`<$num2[0] ORDER BY  `shiji`.`id` DESC LIMIT 0 , 1");
$num3= mysql_fetch_row($ziliao3);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.5, minimum-scale=1.0" />
<meta content="全球最大的网络传记平台" name="description">
<meta name="keywords" content="传记"/>
<title>夏娃传记，留下足迹</title> 
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link href="ui/booklet/book_m.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />
<link href="ui/m_evabio.css" type="text/css" rel="stylesheet" media="screen, projection, tv" />
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
width:'100%',height:'100%',pageNumbers:false,manual:false,arrows:true,
start: function(){$("#wucai5").fadeOut(300);$("#wucai4").fadeOut(600);$("#wucai3").fadeOut(900);$("#wucai2").fadeOut(1200);$("#wucai1").fadeOut(1500);$(".eva_load").fadeIn(300)},
change: function(){
   
   $.ajax({
   type: "GET",
   url: "show1_m.php",
   data: {evaid:i},
   success: function(result1){
     $('#mybook').booklet("add", "end",result1),
	  $.ajax({
   type: "GET",
   url: "show2_m.php",
   data: {evaid:i},
   success: function(result2){
     $('#mybook').booklet("add", "end",result2),
	i--
		
	 
   }
})
   }
})//ajax		
	}//change

});//booklet
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
			
});
</script>
</head>

<body style="background:url(ui/evabg.png) repeat;font-size:100%;font-family:Arial, Helvetica, sans-serif;">
<div class="eva_load" style="position:absolute; right:10%; top:0; width:10%; height:100%; z-index:999999;display: none;background:url(ui/loading.gif) no-repeat center"></div>
<div class="eva_load" style="position:absolute; left:5%; top:0; width:10%; height:100%; z-index:999999;display: none;"></div>
<div id="wucai1" style="position:fixed;top:0;left:0;width:20%;background-color:#CFF09E;height:1%;z-index:9999;"></div>
<div id="wucai2" style="position:fixed;top:0;left:20%;width:20%;background-color:#A8DBA8;height:1%;z-index:9999;"></div>
<div id="wucai3" style="position:fixed;top:0;left:40%;width:20%;background-color:#79BD9A;height:1%;z-index:9999;"></div>
<div id="wucai4" style="position:fixed;top:0;left:60%;width:20%;background-color:#3B8686;height:1%;z-index:9999;"></div>
<div id="wucai5" style="position:fixed;top:0;left:80%;width:20%;background-color:#0B486B;height:1%;z-index:9999;"></div>
<div id="eva" style="position:absolute;left:-70%;top:3%;width:155%;height:88%;z-index:8;min-height:600px;min-width:400px;">
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
</div>
<!--l-->
<!--2-->
<div>
<div style="position:absolute;left:0px;top:0px;background:url(ui/zhongyou.png) repeat-y;;width:142px;height:100%;"></div>
<div style="position:absolute;left:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;top:5px;left:10px;"><a href="index.php"><img src="ui/logo_m.png" /></a></div>
<div style="position:absolute;top:3px;right:10px;font-size:0.618em;"><form action="m_s.php" method="get" id="tiaoye"><input type="text" name="yeshu" class="yeshu" style="background:none;border:1;width: 12px;font-size:0.618em;color:#79BD9A" > <span class="e"><button>跳页</button> | <a href="m_xie.php" target="_self" style="padding:1px;">免注册，写传记</a></span>
</form>
</div>
<div style="display:table;width:100%;height:400px;_position:relative;overflow:hidden; ">   
<div style="vertical-align:middle;display:table-cell;_position:absolute;_top:50%;   ">   
<div style="_position:relative; _top:-50%;">
<div class="ee" style="position:relative;top:30px;left:20px;text-align:left;width:100%;font-size:1em;"><?php echo $num1[2]; ?></div>
<div id="shiji" style="position:relative;width:80%;left:10%;top:40px;text-align:center;font-size:0.618em;">
<span class="eeee"><?php if ($num1[4]=='0') {echo $num1[1];} else {echo '根据相关法律法规和政策，此传记未予显示。' ;} ?></span>
</div>
<div style="position:relative;font-size:0.618em;text-align:center;width:100%;top:60px">
<span class="ee">—<?php if ($num1[4]=='0') {echo $num1[6];} else {echo 's@evabio.com';} ?></span>&nbsp;&nbsp;<span class="e gong" style="color:#3B8686">
共鸣&nbsp;<a action-data="<?php echo $num1[0]; ?>" href="###" style="padding:1px;"><?php echo $num1[7]; ?></a>
</span>
</div>
<div style="position:relative;top:70px;left:10%;width:80%;height:150px;overflow:hidden;text-align:center">
<a href="pic/<?php if ($num1[4]=='0') {if (empty($num1[3])){ echo "w.png";} else { echo $num1[3];}}  else { echo "w.png"; } ?>" target="_blank"><img src="ui/transparent.gif" style="background-image:url(pic/<?php if ($num1[4]=='0') {if (empty($num1[3])){ echo "w.png";} else { echo $num1[3];}}  else { echo "w.png"; } ?>);background-repeat:no-repeat; background-position:top;width:100%; height:100%;" /></a>
</div>
</div>
</div>
</div>
<div class="e" style="position:relative;text-align:center;width:100%;font-size:0.618em;height:15px;top:10px;left:0;margin-left:auto;margin-right:auto">
<?php
echo $ad_l[1];
?> 
</div>
<div class="eee" style="position:absolute;width:90%;bottom:0;font-size:0.618em;margin:5px;text-align:center;z-index:2;color:#0B486B;"><?php echo 2*$num1[0]+2; ?>-<?php echo 2*$num1[0]+1; ?>
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
</div>
<!--3-->
<!--4-->
<div>
<div style="position:absolute;left:0px;top:0px;background:url(ui/zhongyou.png) repeat-y;;width:142px;height:100%;"></div>
<div style="position:absolute;left:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;top:5px;left:10px;"><a href="index.php"><img src="ui/logo_m.png" /></a></div>
<div style="position:absolute;top:3px;right:10px;font-size:0.618em;"><form action="m_s.php" method="get" id="tiaoye"><input type="text" name="yeshu" class="yeshu" style="background:none;border:1;width: 12px;font-size:0.618em;color:#79BD9A" > <span class="e"><button>跳页</button> | <a href="m_xie.php" target="_self" style="padding:1px;">免注册，写传记</a></span>
</form>
</div>
<div style="display:table;width:100%;height:400px;_position:relative;overflow:hidden; ">   
<div style="vertical-align:middle;display:table-cell;_position:absolute;_top:50%;   ">   
<div style="_position:relative; _top:-50%;">
<div class="ee" style="position:relative;top:30px;left:20px;text-align:left;width:100%;font-size:1em;"><?php echo $num2[2]; ?></div>
<div id="shiji" style="position:relative;width:80%;left:10%;top:40px;text-align:center;font-size:0.618em;">
<span class="eeee"><?php if ($num2[4]=='0') {echo $num2[1];} else {echo '根据相关法律法规和政策，此传记未予显示。' ;} ?></span>
</div>
<div style="position:relative;font-size:0.618em;text-align:center;width:100%;top:60px">
<span class="ee">—<?php if ($num2[4]=='0') {echo $num2[6];} else {echo 's@evabio.com';} ?></span>&nbsp;&nbsp;<span class="e gong" style="color:#3B8686">
共鸣&nbsp;<a action-data="<?php echo $num2[0]; ?>" href="###" style="padding:1px;"><?php echo $num2[7]; ?></a>
</span>
</div>
<div style="position:relative;top:70px;left:10%;width:80%;height:150px;overflow:hidden;text-align:center">
<a href="pic/<?php if ($num2[4]=='0') {if (empty($num2[3])){ echo "w.png";} else { echo $num2[3];}}  else { echo "w.png"; } ?>" target="_blank"><img src="ui/transparent.gif" style="background-image:url(pic/<?php if ($num2[4]=='0') {if (empty($num2[3])){ echo "w.png";} else { echo $num2[3];}}  else { echo "w.png"; } ?>);background-repeat:no-repeat; background-position:top;width:100%; height:100%;" /></a>
</div>
</div>
</div>
</div>
<div class="e" style="position:relative;text-align:center;width:100%;font-size:0.618em;height:15px;top:10px;left:0;margin-left:auto;margin-right:auto">
<?php
echo $ad_l[2];
?> 
</div>
<div class="eee" style="position:absolute;width:90%;bottom:0;font-size:0.618em;margin:5px;text-align:center;z-index:2;color:#0B486B;"><?php echo 2*$num2[0]+2; ?>-<?php echo 2*$num2[0]+1; ?>
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
</div>
<!--5-->
<!--6-->
<div>
<div style="position:absolute;left:0px;top:0px;background:url(ui/zhongyou.png) repeat-y;;width:142px;height:100%;"></div>
<div style="position:absolute;left:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;left:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;top:5px;left:10px;"><a href="index.php"><img src="ui/logo_m.png" /></a></div>
<div style="position:absolute;top:3px;right:10px;font-size:0.618em;"><form action="m_s.php" method="get" id="tiaoye"><input type="text" name="yeshu" class="yeshu" style="background:none;border:1;width: 12px;font-size:0.618em;color:#79BD9A" > <span class="e"><button>跳页</button> | <a href="m_xie.php" target="_self" style="padding:1px;">免注册，写传记</a></span>
</form>
</div>
<div style="display:table;width:100%;height:400px;_position:relative;overflow:hidden; ">   
<div style="vertical-align:middle;display:table-cell;_position:absolute;_top:50%;   ">   
<div style="_position:relative; _top:-50%;">
<div class="ee" style="position:relative;top:30px;left:20px;text-align:left;width:100%;font-size:1em;"><?php echo $num3[2]; ?></div>
<div id="shiji" style="position:relative;width:80%;left:10%;top:40px;text-align:center;font-size:0.618em;">
<span class="eeee"><?php if ($num3[4]=='0') {echo $num3[1];} else {echo '根据相关法律法规和政策，此传记未予显示。' ;} ?></span>
</div>
<div style="position:relative;font-size:0.618em;text-align:center;width:100%;top:60px">
<span class="ee">—<?php if ($num3[4]=='0') {echo $num3[6];} else {echo 's@evabio.com';} ?></span>&nbsp;&nbsp;<span class="e gong" style="color:#3B8686">
共鸣&nbsp;<a action-data="<?php echo $num3[0]; ?>" href="###" style="padding:1px;"><?php echo $num3[7]; ?></a>
</span>
</div>
<div style="position:relative;top:70px;left:10%;width:80%;height:150px;overflow:hidden;text-align:center">
<a href="pic/<?php if ($num3[4]=='0') {if (empty($num3[3])){ echo "w.png";} else { echo $num3[3];}}  else { echo "w.png"; } ?>" target="_blank"><img src="ui/transparent.gif" style="background-image:url(pic/<?php if ($num3[4]=='0') {if (empty($num3[3])){ echo "w.png";} else { echo $num3[3];}}  else { echo "w.png"; } ?>);background-repeat:no-repeat; background-position:top;width:100%; height:100%;" /></a>
</div>
</div>
</div>
</div>
<div class="e" style="position:relative;text-align:center;width:100%;font-size:0.618em;height:15px;top:10px;left:0;margin-left:auto;margin-right:auto">
<?php
echo $ad_l[3];
?> 
</div>
<div class="eee" style="position:absolute;width:90%;bottom:0;font-size:0.618em;margin:5px;text-align:center;z-index:2;color:#0B486B;"><?php echo 2*$num3[0]+2; ?>-<?php echo 2*$num3[0]+1; ?>
</div>
</div> 
<!--6-->
</div><!--mybook-->
<div class="eee" style="width:150%;text-align:center;z-index:99999999999;position:absolute;bottom:-60px;font-size:0.618em;"><a href="p.php" target="_self" style="padding:1px;">电脑版</a> <a href="us.html" target="_self" style="padding:3px;">联系我们</a></div>
</div><!--eva-->
</body>
</html>