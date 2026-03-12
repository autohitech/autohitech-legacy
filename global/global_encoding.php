<?php
include_once './inc/_config.php';
include_once 'inc/config.inc.php';
include_once 'inc/ffmpegprogressbar2.class.php';
ob_flush();


?>
<div id="progress">
<table width="430" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="65" align="left" valign="top"><img src="images/tab_m02.gif" width="430" height="50" /></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="top" class="bg_title con_Tt01"><strong><img src="images/icon_Tt.gif" align="texttop" />동영상파일을 변환하고 있습니다.</strong>  잠시만 기다려 주세요.</td>
  </tr>
  <tr>
    <td height="30" align="left" valign="top">

<?php
// Specifie Inputfile for FFMPEG

$filename=str_replace("?","",$_GET['filename']);
//$filename = "133635679414.mov";
$file_ext = strtolower(substr(strrchr($filename, "."), 1));
$file_nam = explode(".",$filename);

 $FFMPEGInput=$upload_temp_dir.'/'.$filename;
 $FFMPEGOutput=$upload_temp_dir.'/'.$file_nam[0].'.flv';


if(file_exists($FFMPEGInput)) {

// Specifie (optional) Parameters for FFMPEG
//$FFMPEGParams=' -acodec aac -ab 96k -vcodec libx264 -fpre "'.FFMPEG_PRESET_DIR.'libx264-slower.ffpreset" -qmax 25 -strict experimental -threads 0';
//$FFMPEGParams=' -vcodec flv -f flv -r 30 -b 1000000 -ab 128000  -ar 44100 -s '.$converter_movie_size;
$FFMPEGParams=' -vcodec flv -f flv -r 30 -qscale 20  -ar 44100 -sameq -s '.$converter_movie_size;




  if(!isset($_GET["pkey"])){
    $pkey=rand();
  } else {
   $_GET['pkey']=strip_tags(AddSlashes($_GET['pkey']));
  if(file_exists('log/'.$_GET["pkey"].'.ffmpeg')){
    $pkey=$_GET["pkey"];
  }
  else{
    $pkey=rand();
  }
 }
// initializing and create ProgressBar
flush();

$FFMPEGProgressBar2 = &new FFMPEGProgressBar2();

flush();

// Show Progressbar

$FFMPEGProgressBar2->Show($pkey);
if(!isset($_GET["pkey"]) || !file_exists('log/'.isset($_GET["pkey"]).'.ffmpeg')){
flush();
$FFMPEGProgressBar2 = &new FFMPEGProgressBar2();
flush();
@$FFMPEGProgressBar2->execFFMPEG($FFMPEGInput, $FFMPEGOutput, $FFMPEGParams, $pkey);
}

} else {

echo "error";
}



include_once 'inc/autodelete.php';

?>
    </td>
  </tr>
</table>
</div>
<div id="loading">
<table width="430" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="65" align="left" valign="top"><img src="images/tab_m03.gif" width="430" height="50" /></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="top" class="bg_title con_Tt01"><strong><img src="images/icon_Tt.gif" align="texttop" />썸네일 이미지를 추출하고 있습니다.</strong>  잠시만 기다려 주세요.</td>
  </tr>
  <tr>
    <td height="52" align="left" valign="top" style="padding-top:15px;"><img src="./images/loading-p.gif" /></td>
  </tr>
</table>
</div>
<div id="select_images"></div>