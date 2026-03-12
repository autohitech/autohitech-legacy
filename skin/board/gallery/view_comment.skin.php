<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>
<script type="text/javascript">
// 글자수 제한
var char_min = parseInt(<?=$comment_min?>); // 최소
var char_max = parseInt(<?=$comment_max?>); // 최대
</script>

<!-- 코멘트 리스트 -->
<div id="commentContents" style=" position:relative; width:100%;">
<? if ($is_comment_write) { ?>
<h3 style=" margin:0 0 10px 0; padding:0 0 3px 0; letter-spacing:-1px; border-bottom:2px solid #ccc; font-size:12px;">Comments <span style=" font-size:11px; color:#e01300; font-weight:bold;"><?=$view[comment_cnt]?></span></h3>

<?}
for ($i=0; $i<count($list); $i++) {
	$comment_id = $list[$i][wr_id];
	$reply_len = strlen($list[$i][wr_comment_reply]);
	$reply_begin = "".($reply_len * 25)."px";
	$mb_dir = substr($list[$i]['mb_id'],0,2);
	
?>

<a name="c_<?=$comment_id?>"></a>

<div class="list" style="position:relative; margin-left:<?=$reply_begin?>; padding-right:-<?=$reply_begin?>px; border:1px solid #ddd; margin-bottom:10px;">

<?
	if ($list[$i][wr_comment_reply]){
	  echo "<span class=\"arrow\" style=\"position:absolute; width:15px; height:13px; top:5px; left:-25px; background:url({$board_skin_path}/img/arrow_comment.gif) 0 50% no-repeat;\"></span>";
	}
?>
  <div style="height:28px; line-height:28px; padding: 0 0 0 10px; margin:0;  clear:both;" >
    <div style="float:left;">
    <strong><?=$list[$i][name]?></strong>
    <span style="padding-left:5px; color:#888888; font-size:11px;"><?=$list[$i][datetime]?></span>
    </div>
    <div style="float:right; padding-top:7px;">
    <? if ($is_ip_view) { echo "&nbsp;<span style=\"color:#B2B2B2; font-size:11px;\">{$list[$i][ip]}</span>"; } ?>
    <? if ($list[$i][is_reply]) { echo "<a href=\"javascript:comment_box('{$comment_id}', 'c');\"><img src='$board_skin_path/img/co_btn_reply.gif' align=absmiddle alt='답변'></a> "; } ?>
    <? if ($list[$i][is_edit]) { echo "<a href=\"javascript:comment_box('{$comment_id}', 'cu');\"><img src='$board_skin_path/img/co_btn_modify.gif' align=absmiddle alt='수정'></a> "; } ?>
    <? if ($list[$i][is_del])  { echo "<a href=\"javascript:comment_delete('{$list[$i][del_link]}');\"><img src='$board_skin_path/img/co_btn_delete.gif' align=absmiddle alt='삭제'></a> "; } ?>
    &nbsp;
    </div>
  </div><!-- //header -->

  <!-- 코멘트 출력 -->
  <div style=" line-height:20px; padding:10px 10px 10px 10px; word-break:break-all; overflow:hidden; clear:both; ">
    <?
    if (strstr($list[$i][wr_option], "secret")) echo "<span style='color:#1992af; font-weight:bold;'>비밀글 : </span> ";
    $str = $list[$i][content];
    if (strstr($list[$i][wr_option], "secret"))
        $str = "<span style='color:#1992af;'>$str</span>";

    $str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp|mms)\:\/\/([^[:space:]]+)\.(mp3|wma|wmv|asf|asx|mpg|mpeg)\".*\<\/a\>\]/i", "<script>doc_write(obj_movie('$1://$2.$3'));</script>", $str);
    // FLASH XSS 공격에 의해 주석 처리 - 110406
    //$str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(swf)\".*\<\/a\>\]/i", "<script>doc_write(flash_movie('$1://$2.$3'));</script>", $str);
    $str = preg_replace("/\[\<a\s*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(gif|png|jpg|jpeg|bmp)\"\s*[^\>]*\>[^\s]*\<\/a\>\]/i", "<img src=\"$1://$2.$3\" id=\"target_resize_image[]\" onclick=\"image_window(this);\">", "$str");
    echo $str;
    ?>
    <? if ($list[$i][trackback]) { echo "<p>".$list[$i][trackback]."</p>"; } ?>
    <span id="edit_<?=$comment_id?>" style="display:none;"></span><!-- 수정 -->
    <span id="reply_<?=$comment_id?>" style="display:none;"></span><!-- 답변 -->
    </div>
    
    <input type="hidden" id="secret_comment_<?=$comment_id?>" value="<?=strstr($list[$i][wr_option],"secret")?>">
    <textarea id="save_comment_<?=$comment_id?>" style="display:none;"><?=get_text($list[$i][content1], 0)?></textarea>
  </div><!-- //list -->
<? } ?>

<? if ($is_comment_write) { ?>
<!-- 코멘트 입력 -->
<div id="comment_write" style=" position:relative; margin:20px 0px 6px 0px; border:2px solid #1baacc; padding:0 10px 10px 10px; background:#ffffff; display:none;">
<form name="fviewcomment" method="post" action="./write_comment_update.php" onsubmit="return fviewcomment_submit(this);" autocomplete="off" style=" position:relative; " >
<input type=hidden name=w           id=w value="c">
<input type=hidden name=bo_table    value="<?=$bo_table?>">
<input type=hidden name=wr_id       value="<?=$wr_id?>">
<input type=hidden name=comment_id  id="comment_id" value="">
<input type=hidden name=sca         value="<?=$sca?>" >
<input type=hidden name=sfl         value="<?=$sfl?>" >
<input type=hidden name=stx         value="<?=$stx?>">
<input type=hidden name=spt         value="<?=$spt?>">
<input type=hidden name=page        value="<?=$page?>">
<input type=hidden name=cwin        value="<?=$cwin?>">
<input type=hidden name=is_good     value="">


<div class="wr_content" style=" margin-right:100px;">

<div style=" height:18px; padding:5px 0 5px 0; margin:0; vertical-align:top;">
	<span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 5);" class="icon up"></span>
	<span style="cursor: pointer;" onclick="textarea_original('wr_content', 5);" class="icon init"></span>
	<span style="cursor: pointer;" onclick="textarea_increase('wr_content', 5);" class="icon down"></span>
    <input type=checkbox id="wr_secret" name="wr_secret" value="secret"><span style=" color:#999">비밀글</span>
</div>

<textarea id="wr_content" name="wr_content" rows="5" itemname="내용" required <? if ($comment_min || $comment_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<? }?> style="width:100%; background:#f0f0f0; border:1px solid #e5e5e5;"></textarea>
  <? if ($comment_min || $comment_max) { ?><script type="text/javascript"> check_byte('wr_content', 'char_count'); </script><? }?>
  
	<? if ($is_guest) { ?>
    <p style=" margin-top:10px; ">
	<img id="kcaptcha_image" align="absmiddle" style="margin-right:5px;"/>
		<input title="왼쪽의 글자를 입력하세요." type="input" name="wr_key" style='border:1px solid; width:160px; height:58px; text-align:center; line-height:58px; background-color:#ffffff; margin-right:10px;' class='mem_auto' itemname="자동등록방지" required />
		<span style=" color:#999; font-weight:bold;">이름</span> <INPUT type=text maxLength=20 name="wr_name" itemname="이름" style="width:80px; height:16px; margin-right:5px;" required />
		<span style=" color:#999; font-weight:bold;">비밀번호</span> <INPUT type=password maxLength=20 name="wr_password" itemname="비밀번호" style="width:135px; height:16px;" required />
	</p>
	<? } ?>
</div>

<div style=" position:absolute; top:27px; right:0; width:90px; ">
<input type="submit" value="댓글등록" accesskey="s" class="button" style=" width:90px; height:45px; float:right;" />
<a href="javascript:good_and_write()"><input type="submit" value="댓글+추천" accesskey="s" class="button" style=" width:90px; float:right; margin-top:2px;" /></a>
</div>

</form>
</div>
</div>

<script type="text/javascript" src="<?="$g4[path]/js/jquery.kcaptcha.js"?>"></script>
<script type="text/javascript">


var save_before = '';
var save_html = document.getElementById('comment_write').innerHTML;

function good_and_write() 
{ 
    var f = document.fviewcomment; 
    if(fviewcomment_submit(f)) 
    { 
        f.is_good.value = 1; 
        f.submit(); 
    } 
    else 
    { 
        f.is_good.value = 0; 
    } 
} 

function fviewcomment_submit(f)
{
    var pattern = /(^\s*)|(\s*$)/g; // \s 공백 문자

    f.is_good.value = 0;

    var subject = "";
    var content = "";
    $.ajax({
        url: "<?=$board_skin_path?>/ajax.filter.php",
        type: "POST",
        data: {
            "subject": "",
            "content": f.wr_content.value
        },
        dataType: "json",
        async: false,
        cache: false,
        success: function(data, textStatus) {
            subject = data.subject;
            content = data.content;
        }
    });

    if (content) {
        alert("내용에 금지단어('"+content+"')가 포함되어있습니다");
        f.wr_content.focus();
        return false;
    }

    // 양쪽 공백 없애기
    var pattern = /(^\s*)|(\s*$)/g; // \s 공백 문자
    document.getElementById('wr_content').value = document.getElementById('wr_content').value.replace(pattern, "");
    if (char_min > 0 || char_max > 0)
    {
        check_byte('wr_content', 'char_count');
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("코멘트는 "+char_min+"글자 이상 쓰셔야 합니다.");
            return false;
        } else if (char_max > 0 && char_max < cnt)
        {
            alert("코멘트는 "+char_max+"글자 이하로 쓰셔야 합니다.");
            return false;
        }
    }
    else if (!document.getElementById('wr_content').value)
    {
        alert("코멘트를 입력하여 주십시오.");
        return false;
    }

    if (typeof(f.wr_name) != 'undefined')
    {
        f.wr_name.value = f.wr_name.value.replace(pattern, "");
        if (f.wr_name.value == '')
        {
            alert('이름이 입력되지 않았습니다.');
            f.wr_name.focus();
            return false;
        }
    }

    if (typeof(f.wr_password) != 'undefined')
    {
        f.wr_password.value = f.wr_password.value.replace(pattern, "");
        if (f.wr_password.value == '')
        {
            alert('패스워드가 입력되지 않았습니다.');
            f.wr_password.focus();
            return false;
        }
    }

    if (!check_kcaptcha(f.wr_key)) {
        return false;
    }

    return true;
}


function comment_box(comment_id, work)
{
    var el_id;
    // 코멘트 아이디가 넘어오면 답변, 수정
    if (comment_id)
    {
        if (work == 'c')
            el_id = 'reply_' + comment_id;
        else
            el_id = 'edit_' + comment_id;
    }
    else
        el_id = 'comment_write';

    if (save_before != el_id)
    {
        if (save_before)
        {
            document.getElementById(save_before).style.display = 'none';
            document.getElementById(save_before).innerHTML = '';
        }

        document.getElementById(el_id).style.display = '';
        document.getElementById(el_id).innerHTML = save_html;
        // 코멘트 수정
        if (work == 'cu')
        {
            document.getElementById('wr_content').value = document.getElementById('save_comment_' + comment_id).value;
            if (typeof char_count != 'undefined')
                check_byte('wr_content', 'char_count');
            if (document.getElementById('secret_comment_'+comment_id).value)
                document.getElementById('wr_secret').checked = true;
            else
                document.getElementById('wr_secret').checked = false;
        }

        document.getElementById('comment_id').value = comment_id;
        document.getElementById('w').value = work;

        save_before = el_id;
    }

    if (typeof(wrestInitialized) != 'undefined')
        wrestInitialized();

    //jQuery(this).kcaptcha_load();
    if (comment_id && work == 'c')
        $.kcaptcha_run();
}

function comment_delete(url)
{
    if (confirm("이 코멘트를 삭제하시겠습니까?")) location.href = url;
}

comment_box('', 'c'); // 코멘트 입력폼이 보이도록 처리하기위해서 추가 (root님)
</script>
<? } ?>

<? if($cwin==1) { ?>
  <p align=center><a href="javascript:window.close();" class="button">창닫기</a><br><br>
<? }?>