<?
$sub_menu = "900100";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");

$token = get_token();

if ($is_admin != "super")
    alert("최고관리자만 접근 가능합니다.");

$g4['title'] = "탑빌더환경설정";
include_once ("./admin.head.php");
?>

<form name='fconfigform' method='post' onsubmit="return fconfigform_submit(this);">
<input type=hidden name=token value='<?=$token?>'>

<table width=100% cellpadding=0 cellspacing=0 border=0>
<colgroup width=25%>
<colgroup width=25%>
<colgroup width=25%>
<colgroup width=25%>
<tr class='ht'>
    <td colspan=4 align=left><?=subtitle("인기검색어 설정")?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td align="left">인기검색어스킨 사용여부</td>
    <td>인기검색어스킨</td>
    <td align="left">인기검색어 라인수</td>
    <td align="left">인기검색어 검색범위</td>
</tr>
<tr class='ht'>
    <td align="left"><input type=checkbox name=tc_popular_chk value='y' <?=$topconfig[tc_popular_chk]?'checked':'';?>>사용 </td>
    <td><select id=tc_popular_skin name=tc_popular_skin itemname="인기검색어 스킨">
        <?
        $arr = get_skin_dir("popular");
        for ($i=0; $i<count($arr); $i++) {
            echo "<option value='$arr[$i]'>$arr[$i]</option>\n";
        }
        ?></select>
        <script language="JavaScript"> document.getElementById('tc_popular_skin').value="<?=$topconfig[tc_popular_skin]?>";</script>
    </td>
    <td align="left"><input type=text class=ed name='tc_popular_limit' value='<?=$topconfig[tc_popular_limit]?>' size=5 numeric > 라인수</td>
    <td align="left"><input type=text class=ed name='tc_popular_day' value='<?=$topconfig[tc_popular_day]?>' size=5 numeric > 일수 <?=help("검색하고 싶은 범위를 설정합니다.")?></td>
</tr>
<tr class='ht'>
    <td colspan=4 align=left><?=subtitle("포인트 스킨 설정")?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td align="left">포인트스킨 사용여부</td>
    <td>포인트스킨</td>
    <td align="left">포인트스킨 라인수</td>
    <td align="left">포인트스킨 검색범위</td>
</tr>
<tr class='ht'>
    <td align="left"><input type=checkbox name=tc_point_chk value='y' <?=$topconfig[tc_point_chk]?'checked':'';?>>사용 </td>
    <td><select id=tc_point_skin name=tc_point_skin itemname="포인트스킨">
        <?
        $arr = get_skin_dir("po_latest");
        for ($i=0; $i<count($arr); $i++) {
            echo "<option value='$arr[$i]'>$arr[$i]</option>\n";
        }
        ?></select>
        <script language="JavaScript"> document.getElementById('tc_point_skin').value="<?=$topconfig[tc_point_skin]?>";</script>
    </td>
    <td align="left"><input type=text class=ed name='tc_point_limit' value='<?=$topconfig[tc_point_limit]?>' size=5 numeric > 라인수</td>
    <td align="left"><input type=text class=ed name='tc_point_day' value='<?=$topconfig[tc_point_day]?>' size=5 numeric > 일수 <?=help("검색하고 싶은 범위를 설정합니다.")?></td>
</tr>
<tr class='ht'>
    <td colspan=4 align=left><?=subtitle("메인그룹 스킨 설정")?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td align="left">메인그룹스킨 사용여부</td>
    <td>메인그룹스킨</td>
    <td align="left">메인그룹스킨 라인수</td>
    <td align="left">메인그룹스킨 검색범위</td>
</tr>
<tr class='ht'>
    <td align="left"><input type=checkbox name=tc_group_chk value='y' <?=$topconfig[tc_group_chk]?'checked':'';?>>사용 </td>
    <td><select id=tc_group_skin name=tc_group_skin itemname="메인그룹스킨">
        <?
        $arr = get_skin_dir("gr_latest");
        for ($i=0; $i<count($arr); $i++) {
            echo "<option value='$arr[$i]'>$arr[$i]</option>\n";
        }
        ?></select>
        <script language="JavaScript"> document.getElementById('tc_group_skin').value="<?=$topconfig[tc_group_skin]?>";</script>
    </td>
    <td align="left"><input type=text class=ed name='tc_group_limit' value='<?=$topconfig[tc_group_limit]?>' size=5 numeric > 라인수</td>
    <td align="left"><input type=text class=ed name='tc_group_tab' value='<?=$topconfig[tc_group_tab]?>' size=5 numeric > 개수 <?=help("그룹의 탭 개수를 설정합니다.")?></td>
</tr>
<tr class='ht'>
    <td colspan=4 align=left><?=subtitle("최신 나의글 스킨 설정")?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td align="left">최신나의글스킨 사용여부</td>
    <td>최신나의글스킨</td>
    <td align="left">최신나의글스킨 라인수</td>
</tr>
<tr class='ht'>
    <td align="left"><input type=checkbox name=tc_mycontent_chk value='y' <?=$topconfig[tc_mycontent_chk]?'checked':'';?>>사용 </td>
    <td><select id=tc_mycontent_skin name=tc_mycontent_skin itemname="최신나의글스킨">
        <?
        $arr = get_skin_dir("my_latest");
        for ($i=0; $i<count($arr); $i++) {
            echo "<option value='$arr[$i]'>$arr[$i]</option>\n";
        }
        ?></select>
        <script language="JavaScript"> document.getElementById('tc_mycontent_skin').value="<?=$topconfig[tc_mycontent_skin]?>";</script>
    </td>
    <td align="left" colspan=2><input type=text class=ed name='tc_mycontent_limit' value='<?=$topconfig[tc_mycontent_limit]?>' size=5 numeric > 라인수</td>
</tr>
<tr class='ht'>
    <td colspan=4 align=left><?=subtitle("가장최신글 스킨 설정")?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td align="left">가장최신글스킨 사용여부</td>
    <td>가장최신글스킨</td>
    <td align="left">가장최신글스킨 라인수</td>
</tr>
<tr class='ht'>
    <td align="left"><input type=checkbox name=tc_newwrite_chk value='y' <?=$topconfig[tc_newwrite_chk]?'checked':'';?>>사용 </td>
    <td><select id=tc_newwrite_skin name=tc_newwrite_skin itemname="가장최신글스킨">
        <?
        $arr = get_skin_dir("new_latest");
        for ($i=0; $i<count($arr); $i++) {
            echo "<option value='$arr[$i]'>$arr[$i]</option>\n";
        }
        ?></select>
        <script language="JavaScript"> document.getElementById('tc_newwrite_skin').value="<?=$topconfig[tc_newwrite_skin]?>";</script>
    </td>
    <td align="left" colspan=2><input type=text class=ed name='tc_newwrite_limit' value='<?=$topconfig[tc_newwrite_limit]?>' size=5 numeric > 라인수</td>
</tr>
<tr class='ht'>
    <td colspan=4 align=left><?=subtitle("가장코멘트 스킨 설정")?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td align="left">가장코멘트스킨 사용여부</td>
    <td>가장코멘트스킨</td>
    <td align="left">가장코멘트스킨 라인수</td>
</tr>
<tr class='ht'>
    <td align="left"><input type=checkbox name=tc_newcomment_chk value='y' <?=$topconfig[tc_newcomment_chk]?'checked':'';?>>사용 </td>
    <td><select id=tc_newcomment_skin name=tc_newcomment_skin itemname="가장코멘트스킨">
        <?
        $arr = get_skin_dir("co_latest");
        for ($i=0; $i<count($arr); $i++) {
            echo "<option value='$arr[$i]'>$arr[$i]</option>\n";
        }
        ?></select>
        <script language="JavaScript"> document.getElementById('tc_newcomment_skin').value="<?=$topconfig[tc_newcomment_skin]?>";</script>
    </td>
    <td align="left" colspan=2><input type=text class=ed name='tc_newcomment_limit' value='<?=$topconfig[tc_newcomment_limit]?>' size=5 numeric > 라인수</td>
</tr>
<tr class='ht'>
    <td colspan=4 align=left><?=subtitle("설문조사 스킨 설정")?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td align="left">설문조사스킨 사용여부</td>
    <td>설문조사스킨</td>
</tr>
<tr class='ht'>
    <td align="left"><input type=checkbox name=tc_poll_chk value='y' <?=$topconfig[tc_poll_chk]?'checked':'';?>>사용 </td>
    <td colspan=2><select id=tc_poll_skin name=tc_poll_skin itemname="설문조사스킨">
        <?
        $arr = get_skin_dir("poll");
        for ($i=0; $i<count($arr); $i++) {
            echo "<option value='$arr[$i]'>$arr[$i]</option>\n";
        }
        ?></select>
        <script language="JavaScript"> document.getElementById('tc_poll_skin').value="<?=$topconfig[tc_poll_skin]?>";</script>
    </td>
</tr>
<tr class='ht'>
    <td colspan=4 align=left><?=subtitle("접속카운터터스킨 설정")?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td align="left">접속카운터스킨 사용여부</td>
    <td>접속카운터스킨</td>
</tr>
<tr class='ht'>
    <td align="left"><input type=checkbox name=tc_visit_chk value='y' <?=$topconfig[tc_visit_chk]?'checked':'';?>>사용 </td>
    <td colspan=2><select id=tc_visit_skin name=tc_visit_skin itemname="접속카운터스킨">
        <?
        $arr = get_skin_dir("visit");
        for ($i=0; $i<count($arr); $i++) {
            echo "<option value='$arr[$i]'>$arr[$i]</option>\n";
        }
        ?></select>
        <script language="JavaScript"> document.getElementById('tc_visit_skin').value="<?=$topconfig[tc_visit_skin]?>";</script>
    </td>
</tr>
<tr class='ht'>
    <td colspan=4 align=left><?=subtitle("접속카운터스킨 설정")?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td align="left">현재접속자스킨 사용여부</td>
    <td>현재접속자스킨</td>
</tr>
<tr class='ht'>
    <td align="left"><input type=checkbox name=tc_today_chk value='y' <?=$topconfig[tc_today_chk]?'checked':'';?>>사용 </td>
    <td colspan=2><select id=tc_today_skin name=tc_today_skin itemname="현재접속자스킨">
        <?
        $arr = get_skin_dir("connect");
        for ($i=0; $i<count($arr); $i++) {
            echo "<option value='$arr[$i]'>$arr[$i]</option>\n";
        }
        ?></select>
        <script language="JavaScript"> document.getElementById('tc_today_skin').value="<?=$topconfig[tc_today_skin]?>";</script>
    </td>
</tr>
<tr class='ht'>
    <td colspan=4 align=left><?=subtitle("CSRF 방지")?></td>
</tr>
<tr><td colspan=4 class=line1></td></tr>
<tr class='ht'>
    <td>
        <img id='kcaptcha_image' border='0' width=120 height=60 onclick="imageClick();" style="cursor:pointer;" title="글자가 잘안보이는 경우 클릭하시면 새로운 글자가 나옵니다.">
    </td>
    <td colspan=3>
        <input class='ed' type=input size=10 name='kcaptcha_key' itemname="자동등록방지" required>&nbsp;&nbsp;왼쪽의 글자를 입력하세요.
    </td>
</tr>
<tr><td colspan=4 class=line2></td></tr>
<tr><td colspan=4 class=ht></td></tr>
</table>

<p align=center>
    <input type=submit class=btn1 accesskey='s' value='  확  인  '>
</form>
<?=$g4[path];?>
<script type="text/javascript" src="<?=$g4[path];?>/js/prototype.js"></script>
<script type="text/javascript" src="<?=$g4[path];?>/js/md5.js"></script>
<script type="text/javascript" src="<?=$g4[path];?>/js/kcaptcha.js"></script>

<script language="javascript">
function fconfigform_submit(f)
{
    if (typeof(f.kcaptcha_key) != 'undefined') {
        if (hex_md5(f.kcaptcha_key.value) != md5_norobot_key) {
            alert('자동등록방지용 글자가 제대로 입력되지 않았습니다.');
            f.kcaptcha_key.select();
            f.kcaptcha_key.focus();
            return false;
        }
    }

    f.action = "./top_config_form_update.php";
    return true;
}
</script>

<?
include_once ("./admin.tail.php");
?>
