<?
$sub_menu = "300500";
include_once("./_common.php");
include_once("$g4[path]/lib/cheditor4.lib.php");

auth_check($auth[$sub_menu], "w");

if ($w == "") 
{
    $html_title = "등록";
	$row[bn_skin] = "basic";
}
else if ($w == "u") 
{
	$row = sql_fetch(" select * from $g4[design_table] where ds_id = '$ds_id' ");
    if (!$row[ds_id])
        alert("자료가 존재 하지 않습니다..");
	sql_query("update $g4[design_table] set ds_datetime = '$g4[time_ymdhis]' where ds_id = '$ds_id'");

    $html_title = "수정";
} 
else 
    alert("제대로 된 값이 넘어오지 않았습니다.");

$g4[title] = "디자인관리 " . $html_title;
include_once("./admin.head.php");
echo "<script src='$g4[cheditor4_path]/cheditor.js'></script>";
//echo cheditor1('ds_design_left', '100%', '250');
//echo cheditor1('ds_design_copy', '100%', '250');


$ds_design_copy = $row[ds_design_copy];

//onsubmit="return banner_submit(this);"
     $file_path = "../data/design";
      $eventbnrimgfiletype = substr(strtolower($row[ds_main]),-3);
      $bnrimgfile = "$file_path/$row[ds_main]";
      if(($eventbnrimgfiletype == "gif") ||  ($eventbnrimgfiletype == "jpg") ) {
        $mainfilash = "<img src='$bnrimgfile' border=0>";
       } else if ($eventbnrimgfiletype == "swf") {
        list($width, $height, $type, $attr) = getImagesize($bnrimgfile);
        $mainfilash = "<script>doc_write(flash_movie(\"$bnrimgfile\", \"mainflash\", \"$width\", \"$height\", \"transparent\"));</script>";
        }

?>

<form name=popup method=post action='design_form_update.php'  enctype="multipart/form-data" autocomplete="off">
<input type=hidden name=w    value='<?=$w?>'>
<input type=hidden name=sfl  value='<?=$sfl?>'>
<input type=hidden name=stx  value='<?=$stx?>'>
<input type=hidden name=sst  value='<?=$sst?>'>
<input type=hidden name=sod  value='<?=$sod?>'>
<input type=hidden name=page value='<?=$page?>'>
<input type=hidden name=ds_id value='<?=$row[ds_id]?>'>
<input type=hidden name=kind value='<?=$kind?>'>
<table width=100% align=center cellpadding=0 cellspacing=0>
<colgroup width=30% class='col1 pad1 bold left'>
<colgroup width=80% class='col2 pad2'>
<tr>
    <td colspan=2 class=title align=left><img src='<?=$g4[admin_path]?>/img/icon_title.gif'> <?=$g4[title]?><br>
플래시 삽입시 : <FLASH>flash_movie("플래시파일경로/프래시파일명", "mainflash", "가로", "세로", "transparent")</FLASH>
</td>
</tr>
<tr><td colspan=2 class=line1></td></tr>
<tr class='ht'>
    <td colspan=2>사이트 정렬</td></tr>
<tr class='ht'>
    <td align=left colspan=2>
		<select name="ds_site_align" required>
			<option value="">사이트 위치선택</option>
			<option value='center' <? echo ($row[ds_site_align] == "center") ? "selected" : ""; ?>>가운데 정렬</option>
			<option value='left' <? echo ($row[ds_site_align] == "left") ? "selected" : ""; ?>>왼쪽정렬</option>
			<option value='right' <? echo ($row[ds_site_align] == "right") ? "selected" : ""; ?>>오른쪽정렬</option>
		</select>-사이트의 전체 정렬을 설정합니다
	</td>
</tr>
<tr><td  colspan=2 class=line2></td></tr>
<tr class='ht'>
    <td colspan=2>메인플래시(swf)</td></tr>
<tr class='ht'>
    <td colspan=2><input type=file name='bn_file3'> <font color="red">배너 위치에 맞는 사이즈를 올려주세요</font>
<br><?=($row[ds_main])? "<input type=checkbox name=bn_file3_chk> $row[ds_main] 삭제시 체크" : "";?><br> <?=$mainfilash;?>
	</td>
</tr>
<tr><td  colspan=2 class=line2></td></tr>
<tr class='ht'>
    <td colspan=2>
<table width=100% align=center cellpadding=0 cellspacing=0>
<tr class='ht'>
    <td colspan=2 align=left>상단 디자인</td>
</tr>
<tr class='ht'>
    <td colspan=2>
<textarea class=ed name='ds_design_top' rows='20' style='width:99%;' geditor><?=$row[ds_design_top];?></textarea></td>
</tr>
<tr class='ht'>
    <td colspan=2 align=left>하단 디자인</td>
</tr>
<tr class='ht'>
    <td colspan=2>

<textarea class=ed name='ds_design_copy' rows='20' style='width:99%;' geditor><?=$row[ds_design_copy];?></textarea>
</td>
</tr>

<tr><td  colspan=2 class=line2></td></tr>

<tr class='ht'>
    <td colspan=2 align=left>옵션2(ds_option_2)</td>
</tr>
<tr class='ht'>
    <td colspan=2>
<textarea class=ed name='ds_option_2' rows='10' style='width:99%;' geditor><?=$row[ds_option_2];?></textarea></td>
</tr>
<tr><td  colspan=2 class=line2></td></tr>
<tr class='ht'>
    <td colspan=2 align=left>옵션3(ds_option_3)</td>
</tr>
<tr class='ht'>
    <td colspan=2>
<textarea class=ed name='ds_option_3' rows='10' style='width:99%;' geditor><?=$row[ds_option_3];?></textarea></td>
</tr>
<tr><td  colspan=2 class=line2></td></tr>
<tr class='ht'>
    <td colspan=2 align=left>옵션4(ds_option_4)</td>
</tr>
<tr class='ht'>
    <td colspan=2>
<textarea class=ed name='ds_option_4' rows='10' style='width:99%;' geditor><?=$row[ds_option_4];?></textarea></td>
</tr>
<tr><td  colspan=2 class=line2></td></tr>
<tr class='ht'>
    <td colspan=2 align=left>옵션5(ds_option_5)</td>
</tr>
<tr class='ht'>
    <td colspan=2>
<textarea class=ed name='ds_option_5' rows='10' style='width:99%;' geditor><?=$row[ds_option_5];?></textarea></td>
</tr>


<? if ($w == "u") {?>
<tr class='ht'>
    <td>등록일</td>
    <td align=left><?=$row[ds_datetime]?></td>
</tr>
<?}?>
<tr><td  colspan=2 class=line1></td></tr>
</table>

<p align=center>
    <input type=submit class=btn1 accesskey='s' value='  확    인  '  onClick="editor_wr_ok();">&nbsp;
    <input type=button class=btn1 value='  목  록  ' onclick="document.location.href='./design_list.php?<?=$qstr?>';">&nbsp;
    
    <? if ($w != '') { ?>
    <input type=button class=btn1 value='  삭  제  ' onclick="del('./design_delete.php?<?=$qstr?>&w=d&bn_id=<?=$row[bn_id]?>&url=<?=$_SERVER[PHP_SELF]?>');">&nbsp;
    <? } ?>
</form>

<script language='Javascript'>
function banner_submit(f)
{
editor_wr_ok()
    f.action = './design_form_update.php';
    return true;
}
</script>
<script language="JavaScript" src="<?=$g4[path]?>/geditor/geditor.js"></script>
<?
include_once("./admin.tail.php");
?>
