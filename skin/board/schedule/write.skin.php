<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

if ($is_dhtml_editor) {
    include_once("$g4[path]/lib/cheditor4.lib.php");
    echo "<script src='$g4[cheditor4_path]/cheditor.js'></script>";
    echo cheditor1('wr_content', '100%', '250');
}

$f_date = $link[1];
$t_date   = $link[2];

   if(strlen($f_date) > 0 && strlen($t_date) > 0) {  // 받은 날짜 argument 가 있을때..
     $f_year = (int)substr($f_date,0,4);$f_mon = (int)substr($f_date,4,2);$f_day = (int)substr($f_date,6,2);
     $t_year = (int)substr($t_date,0,4);$t_mon = (int)substr($t_date,4,2);$t_day = (int)substr($t_date,6,2);
   }
   
   else {                                    // 받은 날짜 argument 가 없거나, 이상할 때 오늘날짜로 세팅...
     $today = getdate();
     $f_mon = $today['mon'];$f_day = $today['mday'];$f_year = $today['year'];
     $t_mon = $today['mon'];$t_day = $today['mday'];$t_year = $today['year'];   
   
     $f_date = $t_year.sprintf("%02d",$t_mon).$t_day;
     $t_date = $t_year.sprintf("%02d",$t_mon).$t_day;
   }
?>
<style type="text/css">
<!--
.happy_gnuboard_td {color:#000000 }
-->
</style>

<script language="javascript">
// 글자수 제한
var char_min = parseInt(<?=$write_min?>); // 최소
var char_max = parseInt(<?=$write_max?>); // 최대
</script>

<form name="fwrite" method="post" onsubmit="return fwrite_submit(this);" enctype="multipart/form-data" style="margin:0px;">
<input type=hidden name=null> 
<input type=hidden name=w        value="<?=$w?>" />
<input type=hidden name=bo_table value="<?=$bo_table?>" />
<input type=hidden name=wr_id    value="<?=$wr_id?>" />
<input type=hidden name=sca      value="<?=$sca?>" />
<input type=hidden name=sfl      value="<?=$sfl?>" />
<input type=hidden name=stx      value="<?=$stx?>" />
<input type=hidden name=spt      value="<?=$spt?>" />
<input type=hidden name=sst      value="<?=$sst?>" />
<input type=hidden name=sod      value="<?=$sod?>" />
<input type=hidden name=page     value="<?=$page?>" />

<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<table width="100%" align=center cellpadding=0 cellspacing=0>
  <tr>
    <td class="hp_skin_write_title" style="font-weight:bold; font-size:14px;">&nbsp;&nbsp;&nbsp;<?=$title_msg?></td>
  </tr>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <colgroup width=90>
  <colgroup width=''>
  <? if ($is_name) { ?>
  <tr>
    <td style='padding-left:20px; height:30px;'>· 이 름</td>
    <td><input class='hp_skin_field' maxlength=20 size=15 name=wr_name itemname="이름" required value="<?=$name?>" /></td></tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
  <? } ?>

  <? if ($is_password) { ?>
  <tr>
    <td style='padding-left:20px; height:30px;'>· 패스워드</td>
    <td><input class='hp_skin_field' type=password maxlength=20 size=15 name=wr_password itemname="패스워드" <?=$password_required?> /></td></tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
  <? } ?>

  <? if ($is_email) { ?>
  <tr>
    <td style='padding-left:20px; height:30px;'>· 이메일</td>
    <td><input class='hp_skin_field' maxlength=100 size=50 name=wr_email email itemname="이메일" value="<?=$email?>" /></td></tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
  <? } ?>

  <? if ($is_homepage) { ?>
  <tr>
    <td style='padding-left:20px; height:30px;'>· 홈페이지</td>
    <td><input class='hp_skin_field' size=50 name=wr_homepage itemname="홈페이지" value="<?=$homepage?>" /></td></tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
  <? } ?>

<? 
$option = "";
$option_hidden = "";
if ($is_notice || $is_html || $is_secret || $is_mail) { 
    $option = "";
    if ($is_notice) { 
        $option .= "<input type=checkbox name=notice value='1' $notice_checked />공지&nbsp;";
    }

    if ($is_html) {
        if ($is_dhtml_editor) {
            $option_hidden .= "<input type=hidden value='html1' name='html' />";
        } else {
            $option .= "<input onclick='html_auto_br(this);' type=checkbox value='$html_value' name='html' $html_checked><span class=w_title />html</span>&nbsp;";
        }
    }

    if ($is_secret) {
        if ($is_admin || $is_secret==1) {
            $option .= "<input type=checkbox value='secret' name='secret' $secret_checked /><span class=w_title>비밀글</span>&nbsp;";
        } else {
            $option_hidden .= "<input type=hidden value='secret' name='secret' />";
        }
    }
    
    if ($is_mail) {
        $option .= "<input type=checkbox value='mail' name='mail' $recv_email_checked />답변메일받기&nbsp;";
    }
}

echo $option_hidden;
if ($option) {
?>
  <tr>
    <td style='padding-left:20px; height:30px;'>· 옵 션</td>
    <td><?=$option?></td></tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>

  <? if ($is_category) { ?>
  <tr>
    <td style='padding-left:20px; height:30px;'>· 분 류</td>
    <td><select name=ca_name required itemname="분류"><option value="">선택하세요<?=$category_option?></select></td></tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
  <? } ?>

  <tr>
    <td style='padding-left:20px; height:30px;'>· 제 목</td>
    <td><input class="hp_skin_field" style="width:100%;" name=wr_subject id="wr_subject" itemname="제목" required value="<?=$subject?>" /></td></tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
  <? /*if($w == 'u' && $is_admin) { ?>
  <tr>
    <td style='padding-left:20px; height:30px;'>· 날자변경</td>
    <td><input class="hp_skin_field" style="width:100%;" name=wr_datetime id="wr_datetime" itemname="시간" required value="<?=$write[wr_datetime]?>" /></td></tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
  <tr>
    <td style='padding-left:20px; height:30px;'>· 조회수</td>
    <td><input class="hp_skin_field" style="width:100%;" name=wr_hit id="wr_hit" itemname="조회수" required value="<?=$write[wr_hit]?>" /></td></tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
  <? } */?> 

<?
$start_date = $link[1];
$end_date   = $link[2]; 

echo "<!--<script language='javascript'>alert('$link[1]$link[2]');</script>-->";  


$start_date_y = substr($start_date,0,4);
$start_date_m = substr($start_date,4,2);
$start_date_d = substr($start_date,6,2);

$end_date_y = substr($end_date,0,4);
$end_date_m = substr($end_date,4,2);
$end_date_d = substr($end_date,6,2);

echo "<!--<script language='javascript'>alert('$start_date$end_date');</script>-->";  

?>


<? 
if (strlen($start_date) == 8) { // 기존에 들어있는 값이 있을 경우엔 기존의 값을 이용한다.
	//(int)
	$f_year =(int)$start_date_y;
	$f_mon  =(int)$start_date_m;
	$f_day  = (int)$start_date_d;

    echo "<!--<script language='javascript'>alert('$f_year$f_mon$f_day');</script>-->";  

	$t_year = (int)$end_date_y;
	$t_mon  =(int)$end_date_m;
	$t_day  = (int)$end_date_d;

	echo "<!--<script language='javascript'>alert('$t_year$t_mon$t_day');</script>-->";  
}

   // 날짜 관련 listbox html 생성 시작
   $lastday=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
   if ($year%4 == 0) $lastday[2] = 29;
   for ($i=1;$i <= $lastday[$t_mon];$i++) {
     $temp_year = $t_year - 4 + $i;
     if($i <= 7) { // 년도 선택 listbox html 생성
       if ($temp_year==$f_year) { $htm_fyear .= "      <OPTION value=$temp_year selected>$temp_year</OPTION>\n"; }
       else { $htm_fyear .= "      <OPTION value=$temp_year>$temp_year</OPTION>\n"; }
       if ($temp_year==$t_year) { $htm_tyear .= "      <OPTION value=$temp_year selected>$temp_year</OPTION>\n"; }
       else { $htm_tyear .= "      <OPTION value=$temp_year>$temp_year</OPTION>\n"; }
     }
     if($i <=12) { // 월 선택 listbox html 생성
       $temp_mon = sprintf ("%02d",$i);
       if ($i==$f_mon) { $htm_fmon .= "      <OPTION value=$temp_mon selected>$i</OPTION>\n"; }
       else { $htm_fmon .= "      <OPTION value=$temp_mon>$i</OPTION>\n"; }
       if ($i==$t_mon) { $htm_tmon .= "      <OPTION value=$temp_mon selected>$i</OPTION>\n"; }
       else { $htm_tmon .= "      <OPTION value=$temp_mon>$i</OPTION>\n"; }
     }
     // 일 선택 listbox html 생성
     $temp_day = sprintf ("%02d",$i);
     if ($i==$f_day) { $htm_fday .= "      <OPTION value=$temp_day selected>$i</OPTION>\n"; }
     else { $htm_fday .= "      <OPTION value=$temp_day>$i</OPTION>\n"; }
     if ($i==$t_day) { $htm_tday .= "      <OPTION value=$temp_day selected>$i</OPTION>\n"; }
     else { $htm_tday .= "      <OPTION value=$temp_day>$i</OPTION>\n"; }
   }
   // 날짜 관련 listbox html 생성 끝
?>

  <tr>
    <td style='padding-left:20px; height:30px;'>· 시작일</td>
    <td>
	<SELECT onchange="javascript:resetday('from');" name=fyear>
    <?=$htm_fyear?>
	<?//echo "<script language='javascript'>alert('$htm_fyear');</script>";?>
	</SELECT> 년

	<SELECT onchange="javascript:resetday('from');" name=fmon>
    <?=$htm_fmon?>
    </SELECT> 월

	<SELECT onchange="javascript:resetday('from');" name=fday>
    <?=$htm_fday?>
    </SELECT> 일
	<input type=hidden name='wr_link1' itemname='링크 #1' value='<?=$f_date?>' class='input' size=60></td>
  </tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
  <tr>
    <td style='padding-left:20px; height:30px;'>· 종료일</td>
    <td>
    <SELECT onchange="javascript:resetday('to');" name=tyear>
    <?=$htm_tyear?>
    </SELECT> 년
    
	<SELECT onchange="javascript:resetday('to');" name=tmon>
    <?=$htm_tmon?>
    </SELECT> 월
    
	<SELECT onchange="javascript:resetday('to');" name=tday>
    <?=$htm_tday?>
    </SELECT> 일
	<input type=hidden name='wr_link2' itemname='링크 #2' value='<?=$t_date?>' class='input' size=60></td>
  </tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>

  <tr>
    <td colspan="2" class=hp_skin_write_head>
      <? if ($is_dhtml_editor) { ?>
            <?=cheditor2('wr_content', $content);?>
      <? } else { ?>
      <table width=100% cellpadding=0 cellspacing=0>
        <tr>
            <td width=50% align=left valign=bottom>
                <span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 10);"><img src="<?=$board_skin_path?>/img/up.gif" title="화면크게" alt="화면크게" /></span>
                <span style="cursor: pointer;" onclick="textarea_original('wr_content', 10);"><img src="<?=$board_skin_path?>/img/start.gif" title="입력화면 초기화" alt="입력화면 초기화" /></span>
                <span style="cursor: pointer;" onclick="textarea_increase('wr_content', 10);"><img src="<?=$board_skin_path?>/img/down.gif" title="입력화면 작게" alt="입력화면 작게" /></span></td>
            <td width=50% align=right><? if ($write_min || $write_max) { ?><span id=char_count></span>글자<? } ?></td>
        </tr>
      </table>
      <textarea id="wr_content" name="wr_content" class=tx style='width:100%; word-break:break-all;' rows=10 itemname="내용" required <? if ($write_min || $write_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<? } ?>><?=$content?></textarea>
      <? if ($write_min || $write_max) { ?><script language="javascript"> check_byte('wr_content', 'char_count'); </script><? } ?>
      <? } ?>
    </td>
  </tr>
  <tr><td colspan=2 height=1 bgcolor=#dddddd></td></tr>

<? /*if ($is_link) { ?>
<? for ($i=1; $i<=$g4[link_count]; $i++) { ?>
<tr>
    <td class=hp_skin_write_head>링크 #<?=$i?></td>
    <td><input type='text' class='hp_skin_field' size=50 name='wr_link<?=$i?>' itemname='링크 #<?=$i?>' value='<?=$write["wr_link{$i}"]?>' /></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>
<? } */?>

  <? if ($is_file) { ?>
  <tr>
    <td class=hp_skin_write_head>
      <table cellpadding=0 cellspacing=0>
        <tr>
            <td class=hp_skin_write_head style="padding-top:10px; line-height:20px;">
                파일첨부<br> 
                <span onclick="add_file();" style="cursor:pointer;"><img src="<?=$board_skin_path?>/img/btn_file_add.gif" title="파일입력창 추가" alt="파일입력창 추가" /></span> 
                <span onclick="del_file();" style="cursor:pointer;"><img src="<?=$board_skin_path?>/img/btn_file_minus.gif" title="파일입력창 삭제" alt="파일입력창 삭제" /></span>            </td>
        </tr>
      </table></td>
    <td style='padding:5 0 5 0;'><table id="variableFiles" cellpadding=0 cellspacing=0></table><?// print_r2($file); ?>
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

            objCell.innerHTML = "<input type='file' class='hp_skin_field' name='bf_file[]' title='파일 용량 <?=$upload_max_filesize?> 이하만 업로드 가능' />";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class='hp_skin_field' size=50 name='bf_content[]' title='업로드 이미지 파일에 해당 되는 내용을 입력하세요.' />";
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
        </script> <span onclick="add_file();" style='cursor:pointer; font-family:tahoma; font-size:12pt;'>+</span>를 클릭하시면 1개이상의 파일을 올리실수 있습니다.<br />
		파일 1개의 용량은 <?=$upload_max_filesize?> 이하만 업로드 가능합니다.</td>
  </tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
  <? } ?>

  <? if ($is_trackback) { ?>
  <tr>
    <td class=hp_skin_write_head>트랙백주소</td>
    <td><input class='hp_skin_field' size=50 name=wr_trackback itemname="트랙백" value="<?=$trackback?>" />
        <? if ($w=="u") { ?><input type=checkbox name="re_trackback" value="1" />핑 보냄<? } ?></td>
  </tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
  <? } ?>

  <? if ($is_guest) { ?>
  <tr>
    <td class=write_head><img id='kcaptcha_image' border='0' width=120 height=60 onclick="imageClick();" style="cursor:pointer;" title="글자가 잘안보이는 경우 클릭하시면 새로운 글자가 나옵니다."></td>
    <td><input class='ed' type=input size=10 name=wr_key itemname="자동등록방지" required />&nbsp;&nbsp;왼쪽의 글자를 입력하세요.</td>
  </tr>
  <tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<? } ?>
</table>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" align="center" valign="top" style="padding-top:30px;">
        <input type=image id="btn_submit" src="<?=$board_skin_path?>/img/btn_write_ok.gif" border=0 accesskey='s' title="저장" alt="저장" />&nbsp;
        <a href="./board.php?bo_table=<?=$bo_table?>"><img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0 title="목록" alt="목록" /></a></td>
  </tr>
</table>

</td></tr></table>
</form>

<script type="text/javascript"> var md5_norobot_key = ''; </script>
<script type="text/javascript" src="<?="$g4[path]/js/prototype.js"?>"></script>
<script type="text/javascript">
    function formcheck() 
    {
    	if (fwrite.wr_link2.value-fwrite.wr_link1.value<0) {
            alert("시작날짜보다 종료날짜가 빠릅니다.\n\n확인 후 다시 입력하시기 바랍니다.");
            fwrite.fyear.focus();
            return false;
        }
        fwrite.btnsubmit.disabled = true;

        return true;
    }
    
    function resetday(a_val)
    {
        if (a_val=="from") {
            fwrite.wr_link1.value = fwrite.fyear.value+fwrite.fmon.value+fwrite.fday.value;
        }
    	if (a_val=="to") {
            fwrite.wr_link2.value = fwrite.tyear.value+fwrite.tmon.value+fwrite.tday.value;
        }

		if (a_val=="all") {
			fwrite.wr_link1.value = fwrite.fyear.value+fwrite.fmon.value+fwrite.fday.value;
			fwrite.wr_link2.value = fwrite.tyear.value+fwrite.tmon.value+fwrite.tday.value;		
		}
    }

function imageClick() {
    var url = "<?=$g4[bbs_path]?>/kcaptcha_session.php";
    var para = "";
    var myAjax = new Ajax.Request(
        url, 
        {
            method: 'post', 
            asynchronous: true,
            parameters: para, 
            onComplete: imageClickResult
        });
}

function imageClickResult(req) { 
    var result = req.responseText;
    var img = document.createElement("IMG");
    img.setAttribute("src", "<?=$g4[bbs_path]?>/kcaptcha_image.php?t=" + (new Date).getTime());
    document.getElementById('kcaptcha_image').src = img.getAttribute('src');

    md5_norobot_key = result;
}

<? if (!$is_member) { ?>Event.observe(window, "load", imageClick);<? } ?>

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

with (document.fwrite) 
{
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
    var s = "";
    if (s = word_filter_check(f.wr_subject.value)) {
        alert("제목에 금지단어('"+s+"')가 포함되어있습니다");
        return false;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("내용에 금지단어('"+s+"')가 포함되어있습니다");
        return false;
    }

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

    if (typeof(f.wr_key) != 'undefined') {
        if (hex_md5(f.wr_key.value) != md5_norobot_key) {
            alert('자동등록방지용 글자가 제대로 입력되지 않았습니다.');
            f.wr_key.select();
            f.wr_key.focus();
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

<script language="JavaScript" src="<?="$g4[path]/js/board.js"?>"></script>
<script language="JavaScript"> window.onload=function() { drawFont(); } </script>
