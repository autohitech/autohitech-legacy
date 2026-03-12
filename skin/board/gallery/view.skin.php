<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 


?>
<link rel="stylesheet" href="<?=$board_skin_path?>/css/basic.css" type="text/css" />
<script type="text/javascript" src="<?=$board_skin_path?>/js/jquery-board.js"></script>
<style type="text/css">
.board_list {clear:both; width:100%; table-layout:fixed; margin:5px 0 0 0; }
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
	<? if ($search_href) { echo "<a href=\"$search_href\"><img src='$board_skin_path/img/btn_list_search.gif' border='0' align='absmiddle'></a> "; } ?>
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

<div class="info">
<div style="width:100%; height:28px; padding:10px 0px 4px 0px; background:#f8f8f8;">
<span class="writer">
  <span style="float:left;" class="c_gray">글쓴이&nbsp;<?=$view[name]?><? if ($is_ip_view) { echo "($ip)"; } ?></span>
</span>
<span class="writer">
  <span style="float:left;" class="c_gray">등록일&nbsp;<?=date("y-m-d H:i", strtotime($view[wr_datetime]))?></span>
</span>
</div>

<div class="right_info">
<span class="count"><span class="c_gray">조회</span> <?=number_format($view[wr_hit])?></span>
<? if ($is_good) { ?>
  <? if ($good_href) {?>
    <div class="good button s left"><a href="<?=$good_href?>" target="hiddenframe" title="이 게시물을 추천합니다." class="tooltip"><span class="icon good"></span> <span class="c_gray">+</span><?=number_format($view[wr_good])?></a></div>
  <? }else {?>
    <div class="good button s left"><span class="icon good"></span> <span class="c_gray">+</span><?=number_format($view[wr_good])?></div>
  <? } ?>
<? } ?>

<? if ($is_nogood) { ?>
  <? if ($good_href) {?>
    <div class="nogood s button right"><a href="<?=$nogood_href?>" target="hiddenframe" title="이 게시물을 비추천합니다." class="tooltip"><span class="icon nogood"></span> <span class="c_gray">-</span><?=number_format($view[wr_nogood])?></a></div>
  <? }else {?>
    <div class="nogood s button right"><span class="icon nogood"></span> <span class="c_gray">-</span><?=number_format($view[wr_nogood])?></div>
  <? } ?>
<? } ?>
</div>



<?
// 링크
echo "<div class=\"link\">";
echo "<ul>";

$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) {
  if ($view[link][$i]) {
    $cnt++;
    $link = cut_str($view[link][$i], 70);
    echo "<li>";
    echo "<span class=\"icon link\"></span><a href=\"{$view[link_href][$i]}\" target=\"_blank\" class=\"c_gray\">{$link}</a>";
    echo "&nbsp;<span class=\"c_orange\">[{$view[link_hit][$i]}]</span>";
    echo "</li>";
    }
}
echo "</ul>";
echo "</div>";
?>

<?
// 첨부파일
echo "<div class=\"file\">";
echo "<ul>";
$cnt = 0;
for ($i=0; $i<count($view[file]); $i++) {
    if ($view[file][$i][source] && !$view[file][$i][view]) {
		
		
        $cnt++;
    echo "<li>";
    echo "<span class=\"icon file\"></span><a href=\"javascript:file_download('{$view[file][$i][href]}', '{$view[file][$i][source]}');\" title=\"{$view[file][$i][content]}\">{$view[file][$i][source]}</a> <span class=\"c_gray\">({$view[file][$i][size]})</span>";
    echo "&nbsp;<span class=\"c_orange\">[{$view[file][$i][download]}]</span>";
    echo "&nbsp;<span class=\"c_gray\">DATE {$view[file][$i][datetime]}</span>";
    echo "</li>";
    }
}
echo "</ul>";
echo "</div>";
?>

</div><!-- info end -->

<? 
// 파일 출력
for ($i=0; $i<=count($view[file]); $i++) {
  if ($view[file][$i][view]) 
  echo "<p class=\"img\">{$view[file][$i][view]}</p>";
}
?>
<!-- 내용 출력 -->
<div class="contents">
<?=$view[content];?>
<?//echo $view[rich_content]; // {이미지:0} 과 같은 코드를 사용할 경우?>
<!-- 테러 태그 방지용 --></xml></xmp><a href=""></a><a href=''></a>
<? if ($is_signature) { echo "<div class=\"signature corner-all6\">$signature</div>"; } // 서명 출력 ?>
</div>

<?
$msg = $view[wr_subject];
$tag = $g4[title];
$msg = iconv("EUC-KR", "UTF-8", $msg); 
$tag = iconv("EUC-KR", "UTF-8", $tag); 
$msg = urlencode($view[wr_subject]);
$tag = urlencode($g4[title]);

//echo "<div class=\"group_sns\">";
//echo "<a href=\"http://www.facebook.com/sharer.php?u={$trackback_url}&t={$msg}\" class=\"facebook sns\" title=\"페이스북으로 보내기\"></a>";
//echo "<a href=\"http://twitter.com/home?status={$msg}{$trackback_url}@{$twitter_id}\" class=\"tweeter sns\" title=\"트위터로 보내기\"></a>";
//echo "<a href=\"http://me2day.net/posts/new?new_post[body]={$msg}{$trackback_url}&new_post[tags]={$tag}\" class=\"metoday sns\" title=\"미투데이로 보내기\"></a>";
//echo "<a href=\"http://yozm.daum.net/api/popup/prePost?prefix={$msg}&sourceid=0&link={$trackback_url}&meta=&key=&imgurl=&crossdomain=0&callback=;\" class=\"yozum sns\" title=\"요즘으로 보내기\"></a>";
//echo "<a href=\"http://www.google.com/bookmarks/mark?op=add&title={$msg}&bkmk={$trackback_url}&labels={$tag}\" class=\"google sns\" title=\"구글링크\"></a>";
//echo "</div>";
?>


<?
// 코멘트 입출력
include_once("./view_comment.php");
?>

<!-- 이전글 다음글 -->
<div class="nextprev">
	<? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\" class=\"button next\"><span class=\"icon next\"></span>다음글</a>"; } ?>
	<? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\" class=\"button prev\"><span class=\"icon prev\"></span>이전글</a>"; } ?>
</div>

<script type="text/javascript">
function file_download(link, file) {
  <? if ($board[bo_download_point] < 0) { ?>
  if (confirm("'"+file+"' 파일을 다운로드 하시면 포인트가 차감(<?=number_format($board[bo_download_point])?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?"))
  <? }?>
    document.location.href=link;
}
</script>

<script type="text/javascript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
}
</script>
<!-- 게시글 보기 끝 -->