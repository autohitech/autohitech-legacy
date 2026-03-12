<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$thumb_width = "165"; //썸네일 가로최대 크기
$thumb_height = "125"; //썸네일 세로최대 크기
include_once("$board_skin_path/plugin/thumb.lib.php");
?>
<link rel="stylesheet" href="<?=$board_skin_path?>/css/basic.css" type="text/css" />
<script type="text/javascript" src="<?=$board_skin_path?>/js/jquery-board.js"></script>
<style>
.board_search { clear:both; width:100%; text-align:center; margin:50px 0 0 0; padding:8px 0px 8px 0px; background:#f5f5f5; }
.board_search .stx { height:21px; border:1px solid #9A9A9A; border-right:1px solid #D8D8D8; border-bottom:1px solid #D8D8D8; }
</style>
<!-- 게시판 목록 시작 -->
<table width='<?=$width?>' align='center' cellpadding='0' cellspacing='0'>
<tr>
<td align="right" valign="top">
    <!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
    <div class="board_top">
        <div style="float:left;">
            <form name="fcategory" method="get" style="margin:0px;">
            <? if ($is_category) { ?>
            <select name=sca onchange="location='<?=$category_location?>'+this.value;">
            <option value=''>전체</option>
            <?=$category_option?>
            </select>
            <? } ?>
            </form>
        </div>
        <div style="float:right;">
            <img src="<?=$board_skin_path?>/img/icon_total.gif" align="absmiddle" border='0'>
            <span style="color:#888888; font-weight:bold;">Total <?=number_format($total_count)?></span>
            <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border='0' align="absmiddle"></a><?}?>
            <? if ($admin_href) { ?><a href="<?=$admin_href?>" target="_blank"><img src="<?=$board_skin_path?>/img/btn_admin.gif" border='0' title="관리자" align="absmiddle" style="padding:0px 0px 10px 5px;" /></a><?}?>
        </div>
    </div>
</td></tr></table>
<form name="fboardlist" method="post">
<input type='hidden' name='bo_table' value='<?=$bo_table?>'>
<input type='hidden' name='sfl'  value='<?=$sfl?>'>
<input type='hidden' name='stx'  value='<?=$stx?>'>
<input type='hidden' name='spt'  value='<?=$spt?>'>
<input type='hidden' name='page' value='<?=$page?>'>
<input type='hidden' name='sw'   value=''>
<ul class="gallery_basic">
<? 
for ($i=0; $i<count($list); $i++) {
	
	$content = $list[$i][wr_content];
	// 내용에서 <img.*> 태그의 전체 코드를 얻음
	preg_match("/(<img[^>]+>)/i", $content, $matches);
	$img = $matches[1];
	// <img.*> 태그에서 src 의 코드만 얻음
	preg_match("/src\=[\"\']?([^\"\'\s\>]+)/i", $img, $matches);
	$src_editor = $matches[1];
	
	$src_image = $g4[path]."/data/file/".$bo_table."/".$list[$i][file][0][file];
	
	$thumb = $thumb_dir."/".$list[$i][file][0][file];
	$thumb_editor = $thumb_dir."/".$list[$i][wr_id];
			
	if (!file_exists($thumb)){ //업로드이미지 썸네일 생성
		$thumb = create_thumb( $src_image,$thumb_width, $thumb_height, $thumb);
	} else if (!file_exists($thumb) && $src_editor ){ //업로드이미지가 없을시 에디터이미지 썸네일 생성
		$thumb = create_thumb($real_img_url, $thumb_width, $thumb_height, $thumb_editor);

	}

	
	if ($list[$i][file][0][file]){
		$print_thumb = "<div class=\"item\"><a href=".$list[$i][href]."><img src=".$thumb." class=\"thumb\" /></a></div>";
//	} else  if ($src_editor){
	//	$print_thumb = "<a href=".$list[$i][href]."><img src=".$thumb_editor." class=\"thumb\" /></a>";
	} else {
		$print_thumb = "<div class='noimg'><a href=".$list[$i][href]."><img src=\"{$board_skin_path}/img/noimage.jpg\" /></a></div>";
	}
?>
<li>
	<?=$print_thumb?>
	<p><? if ($is_checkbox) { ?><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>" style="width:12px; height:12px;"><? }?><a href="<?=$list[$i][href]?>" class="title"><?=$list[$i][subject]?></a><span class='comment'><?=$list[$i][comment_cnt]?></span></p>
	<p class="c_gray"><?=$list[$i][datetime]?></p>
</li>
<? }?>
</ul>
</form>

<!-- 버튼 -->
<div class="board_button">
        <div style="float:left;">
        <? if ($list_href) { ?>
        <a href="<?=$list_href?>"><img src="<?=$board_skin_path?>/img/btn_list.gif" align="absmiddle" border='0'></a>
        <? } ?>
        <? if ($is_checkbox) { ?>
        <a href="javascript:select_delete();"><img src="<?=$board_skin_path?>/img/btn_select_delete.gif" align="absmiddle" border='0'></a>
        <a href="javascript:select_copy('copy');"><img src="<?=$board_skin_path?>/img/btn_select_copy.gif" align="absmiddle" border='0'></a>
        <a href="javascript:select_copy('move');"><img src="<?=$board_skin_path?>/img/btn_select_move.gif" align="absmiddle" border='0'></a>
        <? } ?>
        </div>

        <div style="float:right;">
        <? if ($write_href) { ?><a href="<?=$write_href?>"><img src="<?=$board_skin_path?>/img/btn_write.gif" border='0'></a><? } ?>
        </div>
    </div>

    <!-- 페이지 -->
    <div class="board_page">
        <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/page_search_prev.gif' border='0' align=absmiddle title='이전검색'></a>"; } ?>
        <?
        // 기본으로 넘어오는 페이지를 아래와 같이 변환하여 이미지로도 출력할 수 있습니다.
        //echo $write_pages;
        $write_pages = str_replace("처음", "<img src='$board_skin_path/img/page_begin.gif' border='0' class='pagingimg' title='처음'>", $write_pages);
        $write_pages = str_replace("이전", "<img src='$board_skin_path/img/page_prev.gif' border='0' class='pagingimg' title='이전'>", $write_pages);
        $write_pages = str_replace("다음", "<img src='$board_skin_path/img/page_next.gif' border='0' class='pagingimg' title='다음'>", $write_pages);
        $write_pages = str_replace("맨끝", "<img src='$board_skin_path/img/page_end.gif' border='0' class='pagingimg' title='맨끝'>", $write_pages);
        //$write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "$1", $write_pages);
        $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<span class='pagingpre'>$1</span>", $write_pages);
        ?>
        <?=$write_pages?>
        <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/page_search_next.gif' border='0' align=absmiddle title='다음검색'></a>"; } ?>
    </div>

    <!-- 검색 -->
    <div class="board_search">
        <form name="fsearch" method="get">
        <input type="hidden" name="bo_table" value="<?=$bo_table?>">
        <input type="hidden" name="sca"      value="<?=$sca?>">
        <input type="hidden" name="sop"      value="and">
        <select name="sfl">
            <option value="wr_subject">제목</option>
            <option value="wr_content">내용</option>
            <option value="wr_subject||wr_content">제목+내용</option>
            <option value="mb_id,1">회원아이디</option>
            <option value="mb_id,0">회원아이디(코)</option>
            <option value="wr_name,1">글쓴이</option>
            <option value="wr_name,0">글쓴이(코)</option>
        </select>
        <input name="stx" maxlength="15" itemname="검색어" required value='<?=$stx?>' style="width:200px; height:15px;">
		<input type="image" src="<?=$board_skin_path?>/img/btn_search.gif" border='0' align="absmiddle">
        </form>
    </div>



<? if ($is_checkbox) { ?>
<script type="text/javascript">
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str) {
    var f = document.fboardlist;
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(str + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }
    return true;
}

// 선택한 게시물 삭제
function select_delete() {
    var f = document.fboardlist;

    str = "삭제";
    if (!check_confirm(str))
        return;

    if (!confirm("선택한 게시물을 정말 "+str+" 하시겠습니까?\n\n한번 "+str+"한 자료는 복구할 수 없습니다"))
        return;

    f.action = "./delete_all.php";
    f.submit();
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<? } ?>
<!-- 게시판 목록 끝 -->
