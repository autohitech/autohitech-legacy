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
	$row = sql_fetch(" select * from $g4[banner_table] where bn_id = '$bn_id' ");
    if (!$row[bn_id])
        alert("자료가 존재 하지 않습니다..");
	sql_query("update $g4[banner_table] set bn_datetime = '$g4[time_ymdhis]' where bn_id = '$bn_id'");

    $html_title = "수정";
} 
else 
    alert("제대로 된 값이 넘어오지 않았습니다.");

$g4[title] = "배너관리 " . $html_title;
include_once("./admin.head.php");

     $file_path = "../data/banner";
      $eventbnrimgfiletype = substr(strtolower($row[bn_file_name]),-3);
      $bnrimgfile = "$file_path/$row[bn_file_name]";
      if(($eventbnrimgfiletype == "gif") ||  ($eventbnrimgfiletype == "jpg") ) {
        $bannerfilash = "<img src='$bnrimgfile' border=0>";
       } else if ($eventbnrimgfiletype == "swf") {
        list($width, $height, $type, $attr) = getImagesize($bnrimgfile);
        $bannerfilash = "<script>doc_write(flash_movie(\"$bnrimgfile\", \"mainflash\", \"$width\", \"$height\", \"transparent\"));</script>";
        }


?>

<form name=popup method=post onsubmit="return banner_submit(this);" enctype="multipart/form-data" autocomplete="off">
<input type=hidden name=w    value='<?=$w?>'>
<input type=hidden name=sfl  value='<?=$sfl?>'>
<input type=hidden name=stx  value='<?=$stx?>'>
<input type=hidden name=sst  value='<?=$sst?>'>
<input type=hidden name=sod  value='<?=$sod?>'>
<input type=hidden name=page value='<?=$page?>'>
<input type=hidden name=bn_id value='<?=$row[bn_id]?>'>
<input type=hidden name=kind value='<?=$kind?>'>
<table width=100% align=center cellpadding=0 cellspacing=0>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<tr>
    <td colspan=4 class=title align=left><img src='<?=$g4[admin_path]?>/img/icon_title.gif'> <?=$g4[title]?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td>배너위치</td>
    <td colspan="3">
		<select name="bn_location" required>
			<option value="">위치선택</option>
			<option value='c' <? echo ($row[bn_location] == "c") ? "selected" : ""; ?>>사이트중앙</option>
			<option value='l' <? echo ($row[bn_location] == "l") ? "selected" : ""; ?>>사이트왼쪽</option>
			<option value='r' <? echo ($row[bn_location] == "r") ? "selected" : ""; ?>>사이트오른쪽</option>
			<option value='b' <? echo ($row[bn_location] == "b") ? "selected" : ""; ?>>사이트하단</option>
			<option value='g' <? echo ($row[bn_location] == "g") ? "selected" : ""; ?>>그룹페이지중앙</option>
			<option value='d' <? echo ($row[bn_location] == "d") ? "selected" : ""; ?>>랜덤배너사용</option>
		</select>
	</td>
</tr>
<tr class='ht'>
    <td>사용여부</td>
    <td><input type=checkbox name=bn_openchk value="1" <? echo ($row[bn_openchk] == "1") ? "checked" : ""; ?>> * 체크시 사용
	</td>
    <td>순서</td>
    <td>
		<input type=text name=bn_seq value="<?=$row[bn_seq];?>" class=ed size="5"> * 숫자가 높을수록 먼저출력
	</td>
</tr>
<tr class='ht'>
    <td>시작일시</td>
    <td>
        <input type=text class=ed name=bn_start_date size=21 maxlength=19 value='<? echo $row[bn_start_date] ?>' required itemname="시작일시">
        <input type=checkbox name=bn_start_chk value="<? echo date("Y-m-d 00:00:00", $g4[server_time]); ?>" onclick="if (this.checked == true) this.form.bn_start_date.value=this.form.bn_start_chk.value; else this.form.bn_start_date.value = this.form.bn_start_date.defaultValue;">오늘
	</td>
    <td>종료일시</td>
    <td>
        <input type=text class=ed name=bn_end_date size=21 maxlength=19 value='<? echo $row[bn_end_date] ?>' required itemname="종료일시">
        <input type=checkbox name=bn_end_chk value="<? echo date("Y-m-d 23:59:59", $g4[server_time]+(60*60*24*30)); ?>" onclick="if (this.checked == true) this.form.bn_end_date.value=this.form.bn_end_chk.value; else this.form.bn_end_date.value = this.form.bn_end_date.defaultValue;">오늘+30일
	</td>
</tr>
<tr class='ht'>
    <td>가로사이즈</td>
    <td><input type=text name=bn_width value="<?=$row[bn_width];?>" class=ed size="5" required itemname='가로사이즈'> 
	</td>
    <td>세로사이즈</td>
    <td>
		<input type=text name=bn_height value="<?=$row[bn_height];?>" class=ed size="5" required itemname='세로사이즈'> 
	</td>
</tr>
<tr class='ht'>
    <td>제 목 ( alt 또는 title )</td>
    <td colspan="3"><input type=text class=ed name='bn_subject' required itemname='제목' value='<? echo $row[bn_subject] ?>' style="width:80%;"></td>
</tr>
<tr class='ht'>
    <td>링크</td>
    <td colspan="3"><input type=text class=ed name='bn_url' itemname='링크' value='<? echo $row[bn_url] ?>' style="width:50%;"> 예) http://naver.com <font color="red">* 주의 : 플래시 업로드일경우에는 플래시에 링크를 심어주세요</font></td>
</tr>
<tr class='ht'>
    <td>타겟</td>
    <td colspan="3"> <input type=checkbox name=bn_target value="1" <? echo ($row[bn_target] == "1") ? "checked" : ""; ?>> * 체크시 새창으로 </td>
</tr>
<tr class='ht'>
    <td>이미지 or 플래시(swf)</td>
    <td colspan="3"><input type=file class=ed name='bn_file'> <font color="red">배너 위치에 맞는 사이즈를 올려주세요</font>
<br><?=($row[bn_file_name])? "<input type=checkbox name=bn_file_chk> $row[bn_file_name] 삭제시 체크" : "";?><br><?=$bannerfilash;?>
	</td>
</tr>
<? if ($w == "u") {?>
<tr class='ht'>
    <td>등록일</td>
    <td colspan="3"><?=$row[bn_datetime]?></td>
</tr>
<?}?>
<tr><td colspan=4 class=line1></td></tr>
</table>

<p align=center>
    <input type=submit class=btn1 accesskey='s' value='  확    인  '>&nbsp;
    <input type=button class=btn1 value='  목  록  ' onclick="document.location.href='./banner_list.php?<?=$qstr?>';">&nbsp;
    
    <? if ($w != '') { ?>
    <input type=button class=btn1 value='  삭  제  ' onclick="del('./banner_delete.php?<?=$qstr?>&w=d&bn_id=<?=$row[bn_id]?>&url=<?=$_SERVER[PHP_SELF]?>');">&nbsp;
    <? } ?>
</form>

<script language='Javascript'>
function banner_submit(f)
{
    f.action = './banner_form_update.php';
    return true;
}
</script>

<?
include_once("./admin.tail.php");
?>
