<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
for ($i=0; $i<count($list); $i++) 
{
?>
<script src="../js/ui/jquery-ui-1.8.1.custom.js" type="text/javascript"></script>
<? 


if ($i > 0) 
$title = get_text($list[$i][wr_subject]);
$content = nl2br($list[$i][wr_content]); 
$img = "$g4[path]/data/file/$bo_table/".urlencode($list[$i][file][0][file]);
list($width, $height, $type, $attr) = getImagesize($img);
if($width<300){ $width = "367";}
$left = get_text($list[$i][wr_3]);
$top = get_text($list[$i][wr_4]); 
if (!file_exists($img) || !$list[$i][file][0][file])
echo "";
if ($list[$i][wr_1] == "2") 
{ 
$j = 10-$i;
?>

<script language="JavaScript">
<!--
window.onresize = popupresize<?=$i;?>;
window.onload = popupresize<?=$i;?>;
function setCookie<?=$i;?>( name, value, expiredays ) { 
var todayDate = new Date(); 
todayDate.setDate( todayDate.getDate() + expiredays ); 
document.cookie = name + "=" + escape( value ) + "; path=/; expires=" + todayDate.toGMTString() + ";" 
} 

function closeWin<?=$i;?>() { 
if ( document.notice_form<?=$i;?>.chkbox<?=$i;?>.checked ){ 
setCookie<?=$i;?>( "maindiv<?=$i;?>", "done" , 1 ); 
} 
document.all['divpop<?=$i;?>'].style.visibility = "hidden";
}

jQuery(function() {
 jQuery( "#divpop<?=$i;?>" ).draggable();
 });

function popupresize<?=$i;?>() {
    var w = document.body.clientWidth;
          LeftPosition=(w/2)-(<?=$width;?>/2);
          document.getElementById('divpop<?=$i;?>').style.left = LeftPosition + "px";
}
//--> 
</script>
<body OnLoad="popupresize<?=$i;?>();">
<div align="center">
<div id="divpop<?=$i;?>" style="position: absolute; top:80px; z-index:20000<?=$j;?>; visibility:hidden; cursor: move;">
<table border='0' cellspacing='0' cellpadding='0' bgcolor="#FFFFFF">
  <tr height='7'> 
    <td width='7' bgcolor="666666"></td>
    <td bgcolor="666666"></td>
    <td bgcolor="666666"></td>
    <td width='7' bgcolor="666666"></td>
  </tr>
  <tr> 
    <td bgcolor="#666666">&nbsp;</td>
    <td colspan='2' align="left" valign='top'>
	<? 
if ($list[$i][file][0][file]) 
{
 echo  "<a href={$list[$i][wr_link1]} target={$list[$i][wr_2]}><img src='{$img}' style='cursor: move;' border='0'></a>";
 }
 else
 {
 echo "<table width='367' border='0' cellspacing='0' cellpadding='0'>";
 echo "<tr>";
 echo "<td width='23'><img src='{$latest_skin_path}/img/bg_09.gif' width='23' height='27'></td>";
 echo "<td width='320' background='{$latest_skin_path}/img/bg_11.gif'><div align='center'><img src='{$latest_skin_path}/img/bg_11.gif' width='1' height='27'></div></td>";
 echo "<td width='24'><img src='{$latest_skin_path}/img/bg_13.gif' width='24' height='27'></td>";
 echo "</tr>";
 echo "<tr>";
 echo "<td background='{$latest_skin_path}/img/bg_23.gif'><img src='{$latest_skin_path}/img/bg_23.gif' width='23' height='1'></td>";
 echo "<td valign='top'>";		  
 echo "<table width=100% border=0 cellspacing=0 cellpadding=0 align=center>";
 echo "<tr><td height=25><font color=#c70752>★&nbsp;<b>{$list[$i][wr_subject]}</b>★</font></td><td align=right><font color=#999999>{$list[$i][datetime]}</font></td></tr>";
 echo "<tr><td height=1 colspan=2 bgcolor=#dcdcdc></td></tr>";
 echo "<tr><td height=2 colspan=2 bgcolor=#f5f5f5></td></tr>";
 
 if ($list[$i][wr_link1]) { 
 echo "<td valign=top colspan=2 style=padding-top:10px;><a href={$list[$i][wr_link1]} target={$list[$i][wr_2]}>{$content}</a></td>";
 } else {
 echo "<td valign=top colspan=2 style=padding-top:10px;>{$content}</td>";
 } 
 
 echo "</tr>";
 echo "</table>";
 echo "</td>";
 echo "<td background='{$latest_skin_path}/img/bg_19.gif'><img src='{$latest_skin_path}/img/bg_19.gif' width='24' height='8'></td>";
 echo "</tr>";
 echo "</table>";
  }
?></td>
    <td bgcolor="#666666">&nbsp;</td>
  </tr>
  <tr> 
    <td bgcolor="#666666">&nbsp;</td>
    <td colspan='2' background='<?=$latest_skin_path?>/img/bg_32.gif' bgcolor="#666666">	
	  <form name="notice_form<?=$i;?>">
<table width='256' border='0' cellspacing='0' cellpadding='0' align='right'>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><a href="#"><input type="checkbox" name="chkbox<?=$i;?>" value="checkbox<?=$i;?>" onClick="closeWin<?=$i;?>();" style="background-color:#666666"></a><font color="ffffff">오늘은 이창을 다시 열지않음</font></td>
    <td width="45" align="right"><a href="javascript:closeWin<?=$i;?>();"><img src='<?=$latest_skin_path?>/img/bg_34.gif' align='absmiddle' border='0'></a></td>
  </tr>
</table>
  </form>
	</td>
    <td bgcolor="#666666">&nbsp;</td>
  </tr>
</table>
<script language="Javascript">
cookiedata<?=$i;?> = document.cookie; 
if ( cookiedata<?=$i;?>.indexOf("maindiv<?=$i;?>=done") < 0 ){ 
document.all['divpop<?=$i;?>'].style.visibility = "visible";
} 
else {
document.all['divpop<?=$i;?>'].style.visibility = "hidden"; 
}
</script>
</div> 
</div> 

<? }?>
<? }?>
