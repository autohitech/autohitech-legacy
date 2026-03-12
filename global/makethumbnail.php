<?php
 include_once './inc/_config.php';
?>

<table width="430" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="65" align="left" valign="top"><img src="images/tab_m03.gif" width="430" height="50" /></td>
  </tr>
  <tr>
    <td height="30" align="left" valign="top" class="bg_title con_Tt01"><strong><img src="images/icon_Tt.gif" align="texttop" />썸네일 이미지를</strong> 선택하시고 확인버튼을 클릭해 주세요.</td>
  </tr>
  <tr>
    <td height="400" align="left" valign="top">
<div id="thumb">
<?php

if($_GET[pkey]) {
$data = file_get_contents("log/".$_GET[pkey].".ffmpeg.file", true); //read the file
$convert = explode("\n", $data); //create array separate by new line
$n = preg_match("/[^file\/$][0-9]+[^.flv]/i", $convert[1], $match);
$mov = new ffmpeg_movie($convert[1]);
$total_frames = $mov->getFrameCount();
$frm_ech = 6;
$j=0;
echo "<form name='MyImageSetting' method='POST' action=''><ul id='gallery'>";
for ($i=1;$i<$frm_ech;$i++)  {
    $j += $frm_ech;
	if(($i == "3") ||($i == "6")) { $cssname ="thumbnoright"; } else {$cssname ="thumbright";} 
   $frm_ech = (int)($total_frames/$frm_ech);
   $getframe = $mov->getFrame($j);
    //$getframe->resize(50, 50);
   $gd_image = $getframe->toGDImage();
   $small_img = $match[0]."_".$i.".jpg";
   $resizeimg01 = $upload_temp_dir."/".$small_img;
   imagejpeg($gd_image, $resizeimg01);

   gd_image_resize($resizeimg01,$resizeimg01, $thumb_img_size, '', '2',''); 
   imagedestroy($gd_image);
echo "<li class='$cssname'><img class='imgbox' src='$upload_temp_img_dir/$small_img'><span><input type='radio' name='selectimg' value='$small_img'>이미지 # $i</span></li>";

}
echo "</ul><input type='image' src='images/btn_confirm.gif' width='430' height='40' border='0' onclick=\"popupsel();\"  /></form>";


} else {
echo "error!";

}
// onSubmit="return agreecheckform(this);"
?>
</div>
<script language="JavaScript">
<!--
function popupsel(){

 var num_temp = document.MyImageSetting.selectimg.length; 
 var cnt = 0;
 for (i=0;i<num_temp ;i++) 
 {
    if (document.MyImageSetting.selectimg[i].checked == true)  //document.all.radio_button[i].checked
     {
		 cnt++;
                         objs = eval("document.MyImageSetting.selectimg");
                        var chkid = objs[i].value;
                        var array_data = chkid.split("_");
                        var chkname = array_data[0];
                  	window.opener.document.fwrite.wr_1.value = chkname;
                    window.opener.document.fwrite.wr_2.value = chkid;
                	self.close();
     } 
 } 
if (cnt<1) 
 { 
 alert("썸네일 이미지를 선택해 주세요"); 
 return false;

 }

}


//-->
</SCRIPT>    </td>
  </tr>
</table>
