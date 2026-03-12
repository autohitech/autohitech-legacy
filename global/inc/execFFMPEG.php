<?php 


include_once dirname(__FILE__).'/config.inc.php';
if($_POST["cmd"] && $_POST["cmd"]!="" && $_POST["ffmpegpw"] && $_POST["ffmpegpw"] != ""){

if($_POST["ffmpegpw"]==FFMPEG_PW){
$cmd=$_POST["cmd"];
// Executing FFMPEG-Command
$handler = fOpen(dirname(__FILE__).'/../log/'.date('d-m-y').'.log' , "a+");
$loge="[".date("d.m.y H:i:s", mktime())."] ".$_SERVER["REMOTE_ADDR"]." ffmpeg: execute command (".FFMPEG_PATH." ".$cmd.")...\n";
fWrite($handler , $loge);
fClose($handler);
// Executing FFMPEG-Command

exec(FFMPEG_PATH.' '.$cmd);
}else{
$handler = fOpen(dirname(__FILE__).'/../log/'.date('d-m-y').'.warn.log' , "a+");
$loge="[".date("d.m.y H:i:s", mktime())."] ".$_SERVER["REMOTE_ADDR"]." Somebody with IP ".$_SERVER["REMOTE_ADDR"]." try to hack your Security Password (".$_POST["ffmpegpw"].")!\n";
fWrite($handler , $loge);
fClose($handler);
header("HTTP/1.1 401 Unauthorized");
exit('401 Unauthorized');
}
}else{
header("HTTP/1.1 401 Unauthorized");
exit('401 Unauthorized');
}

?>