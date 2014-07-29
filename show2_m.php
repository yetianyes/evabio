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
<div style="position:absolute;top:5px;left:10px;"><a href="index.php"><img src="ui/logo_m.png" /></a></div>
<div style="position:absolute;top:3px;right:10px;font-size:0.618em;"><form action="m_s.php" method="get" id="tiaoye"><input type="text" name="yeshu" class="yeshu" style="background:none;border:1;width: 12px;font-size:0.618em;color:#79BD9A" > <span class="e"><button>跳页</button> | <a href="m_xie.php" target="_self" style="padding:1px;">写传记</a></span>
</form>
</div>
<div style="display:table;width:100%;height:400px;_position:relative;overflow:hidden; ">   
<div style="vertical-align:middle;display:table-cell;_position:absolute;_top:50%;   ">   
<div style="_position:relative; _top:-50%;">
<div class="ee" style="position:relative;top:30px;left:20px;text-align:left;width:100%;font-size:1em;"><?php echo $row[2]; ?></div>
<div id="shiji" style="position:relative;width:80%;left:10%;top:40px;text-align:center;font-size:0.618em;">
<span class="eeee"><?php if ($row[4]=='0') {echo $row[1];} else {echo '根据相关法律法规和政策，此传记未予显示。' ;} ?></span>
</div>
<div style="position:relative;font-size:0.618em;text-align:center;width:100%;top:60px">
<span class="ee">—<?php if ($row[4]=='0') {echo $row[6];} else {echo 's@evabio.com';} ?></span>&nbsp;&nbsp;<span class="e gong" style="color:#3B8686">
共鸣&nbsp;<a action-data="<?php echo $row[0]; ?>" href="###" style="padding:1px;"><?php echo $row[7]; ?></a>
</span>
</div>
<div style="position:relative;top:70px;left:10%;width:80%;height:150px;overflow:hidden;text-align:center">
<a href="pic/<?php if ($row[4]=='0') {if (empty($row[3])){ echo "w.png";} else { echo $row[3];}}  else { echo "w.png"; } ?>" target="_blank"><img src="ui/transparent.gif" style="background-image:url(pic/<?php if ($row[4]=='0') {if (empty($row[3])){ echo "w.png";} else { echo $row[3];}}  else { echo "w.png"; } ?>);background-repeat:no-repeat; background-position:top;width:100%; height:100%;" /></a>
</div>
</div>
</div>
</div>
<div class="e" style="position:relative;text-align:center;width:100%;font-size:0.618em;height:15px;top:10px;left:0;margin-left:auto;margin-right:auto">
<?php
echo $ad[3];
?> 
</div>
<div class="eee" style="position:absolute;width:90%;bottom:0;font-size:0.618em;margin:5px;text-align:center;z-index:2;color:#0B486B;"><?php echo 2*$row[0]+2; ?>-<?php echo 2*$row[0]+1; ?>
</div>
</div> 