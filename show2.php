<?php 
require_once('conn.php'); 
require_once('ad.php'); 
$x=mysql_real_escape_string($_GET['evaid']);    
if( $x<1) {
$result = mysql_query("SELECT * FROM `shiji` WHERE `id`=0 ");
$row = mysql_fetch_row($result);
} 
else {    
$result = mysql_query("SELECT * FROM `shiji` WHERE `id`<$x ORDER BY  `shiji`.`id` DESC LIMIT 0 , 1");
$row = mysql_fetch_row($result);
} 
?>
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
echo $ad[1];
?>
</div>
<div style="position:relative;top:0;left:0;text-align:center;width:100%;height:70%;overflow:hidden;"><a href="pic/<?php if ($row[4]=='0') {if (empty($row[3])){ echo "w.png";} else { echo $row[3];}}  else { echo "w.png"; } ?>" target="_blank"><img src="ui/transparent.gif" style="background-image:url(pic/<?php if ($row[4]=='0') {if (empty($row[3])){ echo "w.png";} else { echo $row[3];}}  else { echo "w.png"; } ?>);background-repeat:no-repeat; background-position:center;width:100%; height:100%;" /></a></div>
</div>
<div style="position:absolute;width:100%;bottom:0px;font-size:0.8em;margin:10px;text-align:center;z-index:2;color:#0B486B">- <?php echo 2*$row[0]+1; ?> -
</div>
</div> 