<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<style type="text/css">
.board_list { clear:both; width:100%; table-layout:fixed; margin:5px 0 0 0; }
.write_head { width:130px; height:35px; text-align:center; font-weight:bold; background:#f5f5f5;}
.field { border:1px solid #ccc; }
.tip { padding-left:25px; margin-left:1px; color:#666;  background:url(<?=$board_skin_path?>/img/btn_tip.gif) no-repeat;}
</style>
<div style="height:5px;"></div>
<table width='<?=$width?>' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td>
<div style="clear:both; height:30px;">
    <div style="float:left; margin-top:6px;">
    <img src="<?=$board_skin_path?>/img/icon_date.gif" align=absmiddle border='0'>
    <span style="color:#888888;">작성일 : <?=date("y-m-d H:i", strtotime($view[wr_datetime]))?></span>
    </div>

    <!-- 링크 버튼 -->
    <div style="float:right;">
    <? 
    ob_start(); 
    ?>
    <? if ($copy_href) { echo "<a href=\"$copy_href\"><img src='$board_skin_path/img/btn_copy.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($move_href) { echo "<a href=\"$move_href\"><img src='$board_skin_path/img/btn_move.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_path/img/btn_modify.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($reply_href) { echo "<a href=\"$reply_href\"><img src='$board_skin_path/img/btn_reply.gif' border='0' align='absmiddle'></a> "; } ?>
	<? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_path/img/btn_delete.gif' border='0' align='absmiddle'></a> "; } ?>
    <? if ($write_href) { echo "<a href=\"$write_href\"><img src='$board_skin_path/img/btn_write.gif' border='0' align='absmiddle'></a> "; } ?>
	<? echo "<a href=\"$list_href\"><img src='$board_skin_path/img/btn_list.gif' border='0' align='absmiddle'></a> "; ?>
    <?
    $link_buttons = ob_get_contents();
    ob_end_flush();
    ?>
    </div>
</div>

<div style="border:1px solid #ddd; clear:both; height:34px; background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x;">
<table width='<?=$width?>' align='center' cellpadding='0' cellspacing='0' class='board_list'>
    <tr>
        <td style="padding-left:10px;">
            <div style="width:600px; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; color:#505050; font-size:13px; font-weight:bold;">
            <? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?>
            <?=cut_hangul_last(get_text($view[wr_subject]))?>
            </div>
        </td>
        <td align="right" style="padding:0 6px 0 0;" width=120>
            <? if ($scrap_href) { echo "<a href=\"javascript:;\" onclick=\"win_scrap('$scrap_href');\"><img src='$board_skin_path/img/btn_scrap.gif' border='0' align='absmiddle'></a> "; } ?>
            <? if ($trackback_url) { ?><a href="javascript:trackback_send_server('<?=$trackback_url?>');" style="letter-spacing:0;" title='주소 복사'><img src="<?=$board_skin_path?>/img/btn_trackback.gif" border='0' align="absmiddle"></a><?}?>
        </td>
    </tr>
    </table>
</div>
</td></tr></table>
<div style="height:20px;"></div>
<!-- 게시글 보기 시작 -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0"><tr><td>

<!-- 링크 버튼 -->
<? 
ob_start(); 
?>
<?
$link_buttons = ob_get_contents();
ob_end_flush();
?>

<table width='<?=$width?>' align='center' cellpadding='0' cellspacing='0'>
<tr><td height=2 bgcolor=#4d4f53></td>
  <td bgcolor=#4d4f53></td>
</tr>
<? if ($is_admin){?>
<tr>
<td align="center" valign="middle" class=write_head>업체명</td>
<td align='left' valign='middle' style='padding-left:15px;'><?=cut_hangul_last(get_text($view[wr_subject]))?></td>
</tr>       
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
<td align="center" valign="middle" class=write_head>홈페이지</td>
<td align='left' valign='middle' style='padding-left:15px;'><?=$view[wr_1]?></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr><td align="center" valign="middle" class=write_head>주소</td>
<td align='left' valign='middle' style='padding-left:15px;'><?=$view[wr_2]?></td>
</tr>       
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<?}?>

<?
// 가변 파일
$cnt = 0;
for ($i=0; $i<count($view[file]); $i++) 
{
    if ($view[file][$i][source] && !$view[file][$i][view]) 
    {
        $cnt++;
        //echo "<tr><td height=22>&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_file.gif' align=absmiddle> <a href='{$view[file][$i][href]}' title='{$view[file][$i][content]}'><strong>{$view[file][$i][source]}</strong> ({$view[file][$i][size]}), Down : {$view[file][$i][download]}, {$view[file][$i][datetime]}</a></td></tr>";
        echo "<tr><td height=22>&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_file.gif' align=absmiddle> <a href=\"javascript:file_download('{$view[file][$i][href]}', '".urlencode($view[file][$i][source])."');\" title='{$view[file][$i][content]}'><strong>{$view[file][$i][source]}</strong> ({$view[file][$i][size]}), Down : {$view[file][$i][download]}, {$view[file][$i][datetime]}</a></td></tr>";
    }
}

// 링크
$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) 
{
    if ($view[link][$i]) 
    {
        $cnt++;
        $link = cut_str($view[link][$i], 70);
        echo "<tr><td height=22>&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_link.gif' align=absmiddle> <a href='{$view[link_href][$i]}' target=_blank><strong>{$link}</strong></a></td></tr>";
    }
}
?>

<tr> 
    <td height="150" colspan="2" bgcolor=#FFFFFF style='word-break:break-all; padding:10px 0px 10px 0px;'>
		<? 
        // 파일 출력
        for ($i=0; $i<=count($view[file]); $i++) {
            if ($view[file][$i][view]) 
                echo $view[file][$i][view] . "<p>";
        }
        ?>

        <span class="ct lh"><?=url_auto_link($view[content])?></span>
        <?//echo $view[rich_content]; // {이미지:0} 과 같은 코드를 사용할 경우?>
        <!-- 테러 태그 방지용 --></xml></xmp><a href=""></a><a href=''></a>
        
        <? if ($is_signature) { echo "<br>$signature<br><br>"; } // 서명 출력 ?></td>
    </tr>

<? if ($trackback_url) { ?>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
<tr>
<td align="center" valign="middle" class=write_head>트랙백 주소</td>
<td align='left' valign='middle' style='padding-left:15px;'><a href="javascript:clipboard_trackback('<?=$trackback_url?>');" style="letter-spacing:0;" title='이 글을 소개할 때는 이 주소를 사용하세요'><?=$trackback_url?></a>
<script language="JavaScript">
function clipboard_trackback(str) 
{
    if (g4_is_gecko)
        prompt("이 글의 고유주소입니다. Ctrl+C를 눌러 복사하세요.", str);
    else if (g4_is_ie) {
        window.clipboardData.setData("Text", str);
        alert("트랙백 주소가 복사되었습니다.\n\n<?=$trackback_url?>");
    }
}
</script></td>
</tr>
<?}?>
<tr><td colspan=2 height=1 bgcolor=#e7e7e7></td></tr>
</table>
<br>
<?=$link_buttons?>

</td>
</tr></table>
<br>

<script language="JavaScript">
// HTML 로 넘어온 <img ... > 태그의 폭이 테이블폭보다 크다면 테이블폭을 적용한다.
function resize_image()
{
    var target = document.getElementsByName('target_resize_image[]');
    var image_width = parseInt('<?=$board[bo_image_width]?>');
    var image_height = 0;

    for(i=0; i<target.length; i++) { 
        // 원래 사이즈를 저장해 놓는다
        target[i].tmp_width  = target[i].width;
        target[i].tmp_height = target[i].height;
        // 이미지 폭이 테이블 폭보다 크다면 테이블폭에 맞춘다
        if(target[i].width > image_width) {
            image_height = parseFloat(target[i].width / target[i].height)
            target[i].width = image_width;
            target[i].height = parseInt(image_width / image_height);
        }
    }
}

window.onload = resize_image;

function file_download(link, file)
{
<? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+decodeURIComponent(file)+"' 파일을 다운로드 하시면 포인트가 차감(<?=number_format($board[bo_download_point])?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?"))<?}?>
document.location.href = link;
}
</script>
<!-- 게시글 보기 끝 -->
