<?
$sub_menu = "900200";
include_once("./_common.php");

auth_check($auth[$sub_menu], "w");

$token = get_token();

if ($is_admin != "super" && $w == "") alert("최고관리자만 접근 가능합니다.");

$html_title = "게시판그룹";
if ($w == "") 
{
    $gr_id_attr = "required";
    $gr[gr_use_access] = 0;
    $html_title .= " 생성";
} 
else if ($w == "u") 
{
    $gr_id_attr = "readonly style='background-color:#dddddd'";
    $gr = sql_fetch(" select * from $g4[group_table] where gr_id = '$gr_id' ");
    $html_title .= " 수정";
} 
else
    alert("제대로 된 값이 넘어오지 않았습니다.");

$g4[title] = $html_title;
include_once("./admin.head.php");
?>

<form name=fboardgroup method=post onsubmit="return ftop_boardgroup_check(this);" autocomplete="off">
<input type=hidden name=w     value='<?=$w?>'>
<input type=hidden name=sfl   value='<?=$sfl?>'>
<input type=hidden name=stx   value='<?=$stx?>'>
<input type=hidden name=sst   value='<?=$sst?>'>
<input type=hidden name=sod   value='<?=$sod?>'>
<input type=hidden name=page  value='<?=$page?>'>
<input type=hidden name=token value='<?=$token?>'>
<table width=100% cellpadding=0 cellspacing=0>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<colgroup width=20% class='col1 pad1 bold right'>
<colgroup width=30% class='col2 pad2'>
<tr class='ht'>
    <td colspan=4 class=title align=left><img src='<?=$g4[admin_path]?>/img/icon_title.gif'> <?=$html_title?></td>
</tr>
<tr><td colspan=4 class='line1'></td></tr>
<tr class='ht'>
    <td>그룹 ID</td>
    <td colspan=3><input type='text' class=ed name=gr_id size=11 maxlength=10 <?=$gr_id_attr?> alphanumericunderline itemname='그룹 아이디' value='<?=$group[gr_id]?>'> 영문자, 숫자, _ 만 가능 (공백없이)</td>
</tr>
<tr class='ht'>
    <td>그룹 제목</td>
    <td colspan=3>
        <input type='text' class=ed name=gr_subject size=40 required itemname='그룹 제목' value='<?=get_text($group[gr_subject])?>'>
        <? 
        if ($w == 'u')
            echo "<input type=button class='btn1' value='게시판생성' onclick=\"location.href='./board_form.php?gr_id=$gr_id';\">";
        ?>
    </td>
</tr>
<tr class='ht'>
    <td>그룹 관리자</td>
    <td colspan=3>
        <?
        if ($is_admin == "super")
            //echo get_member_id_select("gr_admin", 9, $row[gr_admin]);
            echo "<input type='text' class=ed name='gr_admin' value='$gr[gr_admin]' maxlength=20>";
        else
            echo "<input type=hidden name='gr_admin' value='$gr[gr_admin]' size=40>$gr[gr_admin]";
        ?></td>
</tr>
<tr class='ht'>
    <td>접근회원사용</td>
    <td colspan=3>
        <input type=checkbox name=gr_use_access value='1' <?=$gr[gr_use_access]?'checked':'';?>>사용 
        <?=help("사용에 체크하시면 이 그룹에 속한 게시판은 접근가능한 회원만 접근이 가능합니다.")?>
    </td>
</tr>
<tr class='ht'>
    <td>접근회원수</td>
    <td colspan=3>
        <?
        // 접근회원수
        $sql1 = " select count(*) as cnt from $g4[group_member_table] where gr_id = '$gr_id' ";
        $row1 = sql_fetch($sql1);
        echo "<a href='./boardgroupmember_list.php?gr_id=$gr_id'>$row1[cnt]</a>";
        ?>
    </td>
</tr>

<tr class='ht'>
    <td>그룹페이지스킨</td>
    <td colspan=3>
		<select id=gr_7 name=gr_7 required itemname="그룹페이지스킨">
        <?
        $arr = get_skin_dir("group");
        for ($i=0; $i<count($arr); $i++) {
            echo "<option value='$arr[$i]'>$arr[$i]</option>\n";
        }
        ?>
		</select>
        <script language="JavaScript"> document.getElementById('gr_7').value="<?=$gr[gr_7]?>";</script>
    </td>
</tr>
<tr class='ht'>
    <td>탑메뉴출력여부</td>
    <td colspan=3>
        <input type=checkbox name=gr_8 value='y' <?=($gr[gr_8] == "y")?'checked':'';?>>사용 
        <?=help("사이트 운영자들끼리 비공개로 메뉴를 사용하실때 유용합니다.")?>
    </td>
</tr>
<tr class='ht'>
    <td>탑서브메뉴출력여부</td>
    <td colspan=3>
        <input type=checkbox name=gr_9 value='y' <?=($gr[gr_9] == "y")?'checked':'';?>>사용 
        <?=help("한 메뉴에 많은 게시판들이 등록될시 탑메뉴가 깨질수있으므로 그럴경우 출력여부를 결정합니다.")?>
    </td>
</tr>
<tr class='ht'>
    <td>출력순서</td>
    <td colspan=3>
        <input type='text' class=ed name=gr_10 size=2 required itemname='출력순서' value='<?=$gr[gr_10];?>'>
        <?=help("출력순서가 높을수록 우선순위를 가집니다. 탑메뉴와 메인페이지 그룹메뉴에 적용됩니다.")?>
    </td>
</tr>

<tr><td colspan=4 class='line2'></td></tr>
</table>

<p align=center>
    <input type=submit class=btn1 accesskey='s' value='  확  인  '>&nbsp;
    <input type=button class=btn1 value='  목  록  ' onclick="document.location.href='./top_boardgroup_list.php?<?=$qstr?>';">
</form>

<script language='JavaScript'>
if (document.fboardgroup.w.value == '')
    document.fboardgroup.gr_id.focus();
else
    document.fboardgroup.gr_subject.focus();

function ftop_boardgroup_check(f)
{
    f.action = "./top_boardgroup_form_update.php";
    return true;
}
</script>

<?
include_once ("./admin.tail.php");
?>
