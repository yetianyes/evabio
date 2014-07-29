<?php
require_once('conn.php'); 
$a=mysql_real_escape_string($_GET['gongming_id']);
$result = mysql_query("UPDATE  `evabioyetian`.`shiji` SET  `gongming` =  gongming+1 WHERE  `shiji`.`id` =$a;");

?>
