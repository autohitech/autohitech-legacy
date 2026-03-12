<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>

<script language="javascript">
// 글자수 제한
var char_min = parseInt(<?=$write_min?>); // 최소
var char_max = parseInt(<?=$write_max?>); // 최대
</script>

<style type="text/css">
.board_list { clear:both; width:100%; table-layout:fixed; margin:5px 0 0 0; }
.write_head { width:130px; height:35px; text-align:center; font-weight:bold; background:#f5f5f5;}
.field { border:1px solid #ccc; }
.tip { padding-left:25px; margin-left:1px; color:#666;  background:url(<?=$board_skin_path?>/img/btn_tip.gif) no-repeat;}
</style>

<form name="fwrite" method="post" onsubmit="return fwrite_submit(this);" enctype="multipart/form-data" style="margin:0px;">
<input type=hidden name=null><!-- 삭제하지 마십시오. -->
<input type=hidden name=w        value="<?=$w?>">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=wr_id    value="<?=$wr_id?>">
<input type=hidden name=sca      value="<?=$sca?>">
<input type=hidden name=sfl      value="<?=$sfl?>">
<input type=hidden name=stx      value="<?=$stx?>">
<input type=hidden name=spt      value="<?=$spt?>">
<input type=hidden name=sst      value="<?=$sst?>">
<input type=hidden name=sod      value="<?=$sod?>">
<input type=hidden name=page     value="<?=$page?>">

<table width='<?=$width?>' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td>
<div style="border:1px solid #ddd; height:34px; background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x;">
<div style="margin:7px 0 0 0; text-align:center; width:130px; font-weight:bold; font-size:14px;">:: <?=$title_msg?> ::</div>
</div>
<div style="height:15px;"></div>
<table width='<?=$width?>' align='center' cellpadding='0' cellspacing='0'>
<tr><td colspan=2 height=2 bgcolor=#4d4f53></td></tr>

<? if ($is_name) { ?>
<tr>
    <td align="center" valign="middle" class=write_head>이름</td>
    <td align='left' valign='middle' style='padding-left:15px;'><input class=ed maxlength=20 style='width:98%; height:15px;' name=wr_name itemname="이름" required value="<?=$name?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_password) { ?>
<tr>
    <td align="center" valign="middle" class=write_head>패스워드</td>
    <td align='left' valign='middle' style='padding-left:15px;'><input class=ed type=password maxlength=20 style='width:98%; height:15px;' name=wr_password itemname="패스워드" <?=$password_required?>></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_email) { ?>
<tr>
    <td align="center" valign="middle" class=write_head>이메일</td>
    <td align='left' valign='middle' style='padding-left:15px;'><input class=ed maxlength=100 style='width:98%; height:15px;' name=wr_email email itemname="이메일" value="<?=$email?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>


<? if ($is_category) { ?>
<tr>
    <td align="center" valign="middle" class=write_head>분류</td>
    <td align='left' valign='middle' style='padding-left:15px;'><select name=ca_name style='width:98%; height:18px; font-size:11px; background:#f5f5f5;'required itemname="분류"><option value="">선택하세요<?=$category_option?></select></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<tr>
    <td align="center" valign="middle" class=write_head>업체명</td>
    <td align='left' valign='middle' style='padding-left:15px;'><input class=ed style='width:98%; height:15px;' name=wr_subject itemname="업체명" required value="<?=$subject?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
    <td align="center" valign="middle" class=write_head>홈페이지</td>
    <td align='left' valign='middle' style='padding-left:15px;'><input class=ed style='width:98%; height:15px;' name=wr_1 itemname="홈페이지" value="<?=$write[wr_1]?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
    <td align="center" valign="middle" class=write_head>주소</td>
    <td align='left' valign='middle' style='padding-left:15px;'><input class=ed style='width:98%; height:15px;' name=wr_2 value="<?=$write[wr_2]?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

<?
// 관리자라면 분류 선택에 '옵션을 추가함
if ($is_admin) 
{
	?>
 <tr>
    <td align="center" valign="middle" class=write_head>순서</td>
    <td align='left' valign='middle' style='padding-left:15px;'><input class=ed style='width:98%; height:15px;' name=wr_3 itemname="순서"  value="<?=$write["wr_3"]?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr> 
<? } ?>

<? if ($is_file) { ?>
<tr>
    <td align="center" valign="middle" class=write_head>업체배너</td>
    <td align='left' valign='middle' style='padding-left:15px;'><table id="variableFiles" cellpadding=0 cellspacing=0></table><?// print_r2($file); ?>
        <script language="JavaScript">
        var flen = 0;
        function add_file(delete_code)
        {
            var upload_count = <?=(int)$board[bo_upload_count]?>;
            if (upload_count && flen >= upload_count)
            {
                alert("이 게시판은 "+upload_count+"개 까지만 파일 업로드가 가능합니다.");
                return;
            }

            var objTbl;
            var objRow;
            var objCell;
            if (document.getElementById)
                objTbl = document.getElementById("variableFiles");
            else
                objTbl = document.all["variableFiles"];

            objRow = objTbl.insertRow(objTbl.rows.length);
            objCell = objRow.insertCell(0);

            objCell.innerHTML = "<input type='file' class=ed style='width:600px;' name='bf_file[]' title='파일 용량 <?=$upload_max_filesize?> 이하만 업로드 가능'>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class=ed style='width:600px;' name='bf_content[]' title='업로드 이미지 파일에 해당 되는 내용을 입력하세요.'>";
                <? } ?>
                ;
            }

            flen++;
        }

        <?=$file_script; //수정시에 필요한 스크립트?>

        function del_file()
        {
            // file_length 이하로는 필드가 삭제되지 않아야 합니다.
            var file_length = <?=(int)$file_length?>;
            var objTbl = document.getElementById("variableFiles");
            if (objTbl.rows.length - 1 > file_length)
            {
                objTbl.deleteRow(objTbl.rows.length - 1);
                flen--;
            }
        }
        </script></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_trackback) { ?>
<tr>
    <td align="center" valign="middle" class=write_head>트랙백주소</td>
    <td align='left' valign='middle' style='padding-left:15px;'><input class=ed style='width:98%; height:15px;' name=wr_trackback itemname="트랙백" value="<?=$trackback?>">
        <? if ($w=="u") { ?><input type=checkbox name="re_trackback" value="1">핑 보냄<? } ?></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<? if ($is_norobot) { ?>
<tr>
    <td align="center" valign="middle" class=write_head><?=$norobot_str?></td>
    <td align='left' valign='middle' style='padding-left:15px;'><input class=ed type=input size=10 name=wr_key itemname="자동등록방지" required>&nbsp;&nbsp;* 왼쪽의 글자중 <font color="red">빨간글자만</font> 순서대로 입력하세요.</td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

<tr><td colspan=2 height=1 bgcolor=#000000></td></tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td width="100%" height="30" background="<?=$board_skin_path?>/img/write_down_bg.gif"></td>
</tr>
<tr>
    <td width="100%" align="center" valign="top">
        <input type=image id="btn_submit" src="<?=$board_skin_path?>/img/btn_write.gif" border=0 accesskey='s'>&nbsp;
        <a href="./board.php?bo_table=<?=$bo_table?>"><img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0></a></td>
</tr>
</table>

</td></tr></table>
</form>


<script language="javascript">
<?
// 관리자라면 분류 선택에 '공지' 옵션을 추가함
if ($is_admin) 
{
    echo "
    if (typeof(document.fwrite.ca_name) != 'undefined')
    {
        document.fwrite.ca_name.options.length += 1;
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].value = '공지';
        document.fwrite.ca_name.options[document.fwrite.ca_name.options.length-1].text = '공지';
    }";
} 
?>

with (document.fwrite) {
    if (typeof(wr_name) != "undefined")
        wr_name.focus();
    else if (typeof(wr_subject) != "undefined")
        wr_subject.focus();
    else if (typeof(wr_content) != "undefined")
        wr_content.focus();

    if (typeof(ca_name) != "undefined")
        if (w.value == "u")
            ca_name.value = "<?=$write[ca_name]?>";
}

function html_auto_br(obj)
{
    if (obj.checked) {
        result = confirm("자동 줄바꿈을 하시겠습니까?\n\n자동 줄바꿈은 게시물 내용중 줄바뀐 곳을<br>태그로 변환하는 기능입니다.");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}

function fwrite_submit(f)
{
    /*
    var s = "";
    if (s = word_filter_check(f.wr_subject.value)) {
        alert("제목에 금지단어('"+s+"')가 포함되어있습니다");
        return false;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("내용에 금지단어('"+s+"')가 포함되어있습니다");
        return false;
    }
    */

    if (document.getElementById('char_count')) {
        if (char_min > 0 || char_max > 0) {
            var cnt = parseInt(document.getElementById('char_count').innerHTML);
            if (char_min > 0 && char_min > cnt) {
                alert("내용은 "+char_min+"글자 이상 쓰셔야 합니다.");
                return false;
            } 
            else if (char_max > 0 && char_max < cnt) {
                alert("내용은 "+char_max+"글자 이하로 쓰셔야 합니다.");
                return false;
            }
        }
    }

    <?
    if ($is_dhtml_editor) echo cheditor3('wr_content');
    ?>

    if (document.getElementById('tx_wr_content')) {
        if (!ed_wr_content.outputBodyText()) { 
            alert('내용을 입력하십시오.'); 
            ed_wr_content.returnFalse();
            return false;
        }
    }


    document.getElementById('btn_submit').disabled = true;
    document.getElementById('btn_list').disabled = true;

    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/write_update.php';";
    else
        echo "f.action = './write_update.php';";
    ?>
    
    return true;
}
</script>
