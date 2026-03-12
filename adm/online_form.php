<?
$sub_menu = "300300";
include_once("./_common.php");

auth_check($auth[$sub_menu], "w");

$token = get_token();

if ($w == "") 
{
    $html_title = "등록";
}
else if ($w == "u") 
{
	$row = sql_fetch(" select * from $g4[online_table] where ol_id = '$ol_id' ");
    if (!$row[ol_id])
        alert("존재하지 않는 문의입니다..");
	sql_query("update $g4[online_table] set ol_read_date = '$g4[time_ymdhis]' where ol_id = '$ol_id'");

    $html_title = "수정";
} 
else 
    alert("제대로 된 값이 넘어오지 않았습니다.");

$g4[title] = "$row[ol_kind] " . $html_title;
include_once("./admin.head.php");
?>

<table width=100% align=center cellpadding=0 cellspacing=0>
<form name=online method=post action="javascript:online_submit(document.online);" enctype="multipart/form-data" autocomplete="off">
<input type=hidden name=w    value='<?=$w?>'>
<input type=hidden name=sfl  value='<?=$sfl?>'>
<input type=hidden name=stx  value='<?=$stx?>'>
<input type=hidden name=sst  value='<?=$sst?>'>
<input type=hidden name=sod  value='<?=$sod?>'>
<input type=hidden name=page value='<?=$page?>'>
<input type=hidden name=ol_id value='<?=$row[ol_id]?>'>
<input type=hidden name="token" value="<?=$token?>">
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<tr>
    <td colspan=4 class=title align=left><img src='<?=$g4[admin_path]?>/img/icon_title.gif'> <?=$g4[title]?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<?if($row[ol_kind]){?>
<tr class='ht'>
    <td>상품명</td>
    <td colspan="3"><?=$row[ol_kind];?></td>
</tr>
<?}?>
<tr class='ht'>
    <td>이름</td>
    <td><input type=text class=ed name='ol_name' maxlength=20 minlength=2 required itemname='이름(실명)' value='<? echo get_text($row[ol_name]); ?>'></td>
    <td>E-mail</td>
    <td><input type=text class=ed name='ol_email' size=40 maxlength=100 required email itemname='e-mail' value='<? echo get_text($row[ol_email]); ?>'></td>
</tr>
<tr class='ht'>
    <td>전화번호</td>
    <td colspan=3><input type=text class=ed name='ol_tel' maxlength=20 itemname='전화번호' value='<? echo $row[ol_tel] ?>'></td>
</tr>
<tr class='ht'>
    <td>내용</td>
    <td colspan=3><textarea class=ed name=ol_memo rows=5 style='width:99%; word-break:break-all;'><? echo $row[ol_memo] ?></textarea></textarea></td>
</tr>
<tr class='ht'>
    <td>문의날짜</td>
    <td><?=$row[ol_datetime]?></td>
    <td>확인날짜</td>
    <td><?=$row[ol_read_date]?></td>
</tr>
<tr class='ht'>
    <td>관리자메모</td>
    <td colspan=3><textarea class=ed name=ol_admmemo rows=5 style='width:99%; word-break:break-all;'><? echo $row[ol_admmemo] ?></textarea></td>
</tr>
<tr class='ht'>
    <td>답변메일보내기</td>
    <td colspan=3><textarea class=ed name=ol_mailmemo rows=5 style='width:99%; word-break:break-all;'><? echo $row[ol_mailmemo] ?></textarea></td>
</tr>
<tr class='ht'>
    <td>IP</td>
    <td><?=$row[ol_ip]?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
</table>

<p align=center>
    <input type=submit class=btn1 accesskey='s' value='  확    인  '>&nbsp;
    <input type=button class=btn1 value='  목  록  ' onclick="document.location.href='./online_list.php?<?=$qstr?>';">&nbsp;
    
    <? if ($w != '') { ?>
    <input type=button class=btn1 value='  삭  제  ' onclick="del('./online_delete.php?<?=$qstr?>&w=d&ol_id=<?=$row[ol_id]?>&url=<?=$_SERVER[PHP_SELF]?>');">&nbsp;
    <? } ?>
</form>

<script language='Javascript'>
function online_submit(f)
{

    f.action = './online_form_update.php';
    f.submit();
}
</script>

<?
include_once("./admin.tail.php");
?>
