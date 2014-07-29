<?php
require_once('mobile_device_detect.php');
$mobile = mobile_device_detect();
// include one file for mobiles and another for fully featured browsers
if($mobile==true){
  require_once('m.php');
}else{
  require_once('p.php');
}
exit;
?>