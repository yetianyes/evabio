<?php 
require_once('conn.php');
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
<div style="position:absolute;right:0px;top:0px;background:url(ui/zhongzuo.png) repeat-y;;width:142px;height:100%;"></div>
<div style="position:absolute;right:-5px;top:10%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;right:-5px;top:35%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;right:-5px;top:60%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;right:-5px;top:85%;background:url(ui/evabio.png) no-repeat;background-position: -59px -3px;width:10px;height:44px;"></div>
<div style="position:absolute;top:10px;left:10px;"><a href="index.php"><img src="ui/logo.png" border="0" /></a></div>
<div style="position:absolute;top:70px;height:90%;overflow:hidden;left:0;width:100%;">
<div class="ee" style="position:relative;top:0;left:6.18%;text-align:left;width:80%;font-size:2em"><?php echo $row[2]; ?></div> 
<div style="display:table;width:100%;height:60%;_position:relative;overflow:hidden; ">   
<div style="vertical-align:middle;display:table-cell;_position:absolute;_top:50%;   ">   
<div style="_position:relative; _top:-50%;">
<div id="shiji" style="position:relative;margin-left:auto;margin-right:auto;text-align:center;font-size:0.8em;z-index:10;width:80%;top:0;">
<span class="eeee"><?php if ($row[4]=='0') {echo $row[1];} else {echo '根据相关法律法规和政策，此传记未予显示。' ;} ?></span>
</div>
</div>   
</div>   
</div>
<div style="position:relative;font-size:0.8em;text-align:center;width:100%;top:0px;">
<span class="ee">——<?php if ($row[4]=='0') {echo $row[6];} else {echo 's@evabio.com';} ?></span>&nbsp;&nbsp;<span class="e gong" style="color:#3B8686">
共鸣&nbsp;<a action-data="<?php echo $row[0]; ?>" href="###" style="padding:1px;"><?php echo $row[7]; ?></a>
</span>
</div>     
</div>
<div style="position:absolute;margin:10px;bottom:0px;font-size:0.8em;width:100%;text-align:center;z-index:2;color:#0B486B">- <?php echo 2*$row[0]+2; ?> -
</div>
</div>