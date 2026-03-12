<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;
if ($is_category) $colspan++;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// 제목이 두줄로 표시되는 경우 이 코드를 사용해 보세요.
// <nobr style='display:block; overflow:hidden; width:000px;'>제목</nobr>
?>
<style>
table, td {line-height:17px;}
.partner img       {width:150px; height:55px; border:1px solid #d5d5d5; background:#f8f8f8;}
.partner img:hover {width:150px; height:55px; border:1px solid #bd0110; background:#f8f8f8;}
a.url:link	       {color:#666666; font-size:9pt; font-family:Verdana, Tahoma, AppleGothic, sans-serif;}
a.url:visited      {color:#999999; font-size:9pt; font-family:Verdana, Tahoma, AppleGothic, sans-serif;}
a.url:active       {color:#1992af; font-size:9pt; text-decoration:underline; font-family:Verdana, Tahoma, AppleGothic, sans-serif;}
a.url:hover	       {color:#1992af; font-size:9pt; text-decoration:underline; font-family:Verdana, Tahoma, AppleGothic, sans-serif;}


.board_top { clear:both; }

.board_list { clear:both; width:100%; table-layout:fixed; margin:0 0 0 0; }
.board_list th { font-weight:bold; font-size:12px; } 
.board_list th { background:#f8f8f8; } 
.board_list th { white-space:nowrap; height:30px; overflow:hidden; text-align:center; } 
.board_list th { border-top:2px solid #836ec9; border-bottom:1px solid #dcdcdc; } 

.board_list tr.bg0 { background-color:#fafafa; } 
.board_list tr.bg1 { background-color:#ffffff; } 

.board_list td { padding:.5em; }
.board_list td { border-bottom:1px solid #ddd; } 
.board_list td.num { color:#999999; text-align:center; }
.board_list td.checkbox { text-align:center; }
.board_list td.subject { overflow:hidden; }
.board_list td.name { padding:0px; }
.board_list td.datetime { font:normal 11px tahoma; color:#BABABA; text-align:center; }
.board_list td.hit { font:normal 11px tahoma; color:#BABABA; text-align:center; }
.board_list td.good { font:normal 11px tahoma; color:#BABABA; text-align:center; }
.board_list td.nogood { font:normal 11px tahoma; color:#BABABA; text-align:center; }

.board_list .notice { font-weight:normal; }
.board_list .current { font:bold 11px tahoma; color:#E15916; }
.board_list .comment {font-size:10px; color:#c70752; font-weight:bold; line-height:13px; font-family:Verdana, Tahoma, dotum, gulim, AppleGothic, sans-serif;}

.board_button { clear:both; margin:10px 0 0 0; }

.board_page { clear:both; text-align:center; margin-top:30px;}
.board_page a:link        { color:#777777; font-size:11px; text-decoration:none; font-family:Verdana, Tahoma, AppleGothic, sans-serif;}
.board_page a:visited     { color:#999999; font-size:11px; text-decoration:none; font-family:Verdana, Tahoma, AppleGothic, sans-serif;}
.board_page a:hover       { color:#1992af; font-size:11px; text-decoration:none; font-family:Verdana, Tahoma, AppleGothic, sans-serif;}

.board_page .pagingpre { color:#ed454d; font-size:11px; font-weight:bold; text-decoration:underline; font-family:Verdana, Tahoma, AppleGothic, sans-serif;}
.board_page .pagingimg { margin-top:5px;}

.board_search { clear:both; width:100%; text-align:center; margin:50px 0 0 0; padding:8px 0px 8px 0px; background:#f5f5f5; }
.board_search .stx { height:21px; border:1px solid #9A9A9A; border-right:1px solid #D8D8D8; border-bottom:1px solid #D8D8D8; }
</style>


<!-- 게시판 목록 시작 -->
<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0>
    <tr>
	    <td>

<table width="100%" height="30" cellpadding="0" cellspacing="0">
  <tr><td width="32%"><!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
<table cellspacing="0" cellpadding="0">
    <tr height="27">
        <td>
<!-- 카테고리&관리버튼 -->
<? if ($is_category) { ?> 
<? if (!$wr_id) {  ?> 
<?   
    $cnt_bo_1 = $bo_1[0] ? $bo_1[0] : 10; // 한줄당 분류 갯수(현재:10) 
    $cnt = 1; 
    $cnt0 = 0; 
    $arr = explode("|", $board[bo_category_list]); // 구분자가 , 로 되어 있음 
    $str = "&nbsp;<span style='font-size:11px; color:#D2D2D2;'>|</span>&nbsp;"; 
	$sca_a = urldecode($_GET[sca]);
    for ($i=0; $i<count($arr); $i++) 
        if (trim($arr[$i]))  { $s_category = $i + 1;
        if ($sca_a == $arr[$i]) { $b_ss="tab_menu_pre"; } else {$b_ss="tab_menu"; } 
		$sqlCnum = " select count(*) as Cnum from $write_table where wr_is_comment = 0 and ca_name = '$arr[$i]'"; 
$rowCnum = sql_fetch($sqlCnum); 
            //$str .= " <a href='./board.php?bo_table=$bo_table&sca=".urlencode($arr[$i])."' class='tab_menu'>$b_s$arr[$i]$b_e</a>&nbsp;&nbsp;<span style='font-size:11px; color:#D2D2D2;'>|</span>&nbsp;"; 
			$str .= " <a href='./board.php?bo_table=$bo_table&sca=".urlencode($arr[$i])."&pageNum=4&subNum=3&category=$s_category' class='$b_ss'>$arr[$i]</a>[".$rowCnum[Cnum]."]";

if ($cnt == $cnt_bo_1) { $cnt = 0; $str .= "<br>"; } 
    $cnt++; 
    } 
    if ($cnt0 == 0 ) { $bb_s="<b>"; $bb_e="</b>"; } 
	


?> 
  <?echo "  ";?><a href='./board.php?bo_table=<?=$bo_table?>&page=<?=$page?>'>전체</a><?=$bb_e?>
  <?=$str?></td>
  <? } ?> 
  <? } ?>
      </tr>
      </table></td>
    <td width="68%" align="right"><div style="float:right;"><? if ($admin_href) { ?>
        <a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/btn_admin.gif"border='0' title="관리자" align="absmiddle" style="padding:0px 0px 10px 5px;" /></a>
        <?}?>
      </div></td>
  </tr>
</table>

<!-- 제목 -->
<form name="fboardlist" method="post" style="margin:0px;">
<input type="hidden" name="bo_table" value="<?=$bo_table?>">
<input type="hidden" name="sfl"  value="<?=$sfl?>">
<input type="hidden" name="stx"  value="<?=$stx?>">
<input type="hidden" name="spt"  value="<?=$spt?>">
<input type="hidden" name="page" value="<?=$page?>">
<input type="hidden" name="sw"   value="">
<table width=100% cellpadding=0 cellspacing=0>
<tr><td colspan=<?=$colspan?> height=2 bgcolor=#4d4f53></td></tr>
<tr bgcolor=#F8F8F9 height=30 align=center>
    <th width='50'>번호</th>
    <? if ($is_checkbox) { ?><th width='40'><INPUT onclick="if (this.checked) all_checked(true); else all_checked(false);" type=checkbox></th><?}?>
    <th width='160'>업체로고</th>
	<th>업체명 / 홈페이지 / 주소</th>
    <th width='40'><?=subject_sort_link('wr_hit', $qstr2, 1)?>조회</a></th>
</tr>
<tr><td colspan=<?=$colspan?> height=1 bgcolor=#dcdcdc></td></tr>

<!-- 목록 -->
<? for ($i=0; $i<count($list); $i++) { 

?>
<tr height=28 align=center> 
        <td align="center" valign="middle" class="num">
            <? 
            if ($list[$i][is_notice]) // 공지사항 
                echo "<b>공지</b>";
            else if ($wr_id == $list[$i][wr_id]) // 현재위치
                echo "<span class='current'>{$list[$i][num]}</span>";
            else
                echo $list[$i][num];
            ?>        </td>
    <? if ($is_checkbox) { ?><td><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
    <td align='center' style='word-break:break-all; padding:10px 0px 10px 0px;'>
        <? 
			//이미지보이기
			$img = "$g4[path]/data/file/$bo_table/".urlencode($list[$i][file][0][file]);
			
			$list[$i][wr_1] = str_replace("http://","",$list[$i][wr_1]);
			if (file_exists($img) && $list[$i][file][0][file])
			{ 	echo "<div class='partner'><a href=\"http://{$list[$i][wr_1]}\" target=\"_blank\"><img src=\"{$img}\" border=\"0\"></a></div>"; 
			} else {
				echo "<div class='partner'><img src='$board_skin_path/img/noimg.jpg' border=\"0\"></div>"; 
			}
        ?></td>

    <td align='left' style='word-break:break-all; padding:10px;'>
        <? 
        echo $nobr_begin;
        echo $list[$i][reply];
        echo $list[$i][icon_reply];
        //echo "<a href='{$list[$i][href]}'>";
        if ($list[$i][is_notice])
			echo "<font color='#FF6600'><strong>{$list[$i][subject]}</strong></font>";
        else
        {
            $style1 = $style2 = "";
            if ($list[$i][icon_new]) // 최신글은 검정
                $style1 = "color:#112222;";
            if (!$list[$i][comment_cnt]) // 코멘트 없는것만 굵게
                $style2 = "";
            
			$list[$i][wr_1] = str_replace("http://","",$list[$i][wr_1]);
            //echo "<span style='$style1 $style2'><B>{$list[$i][subject]}</B></span>&nbsp;(순서: {$list[$i]['wr_3']}";
			//if($list[$i]['wr_4']=="1") echo ",&nbsp;사용)";
			//else echo ",&nbsp;미사용)";
			if ($is_admin) {
			echo "<b><a href='{$list[$i][href]}'>{$list[$i][subject]}</a></b></span>";
			}else{
            echo "<b>{$list[$i][subject]}</b></span>";
			}
		    echo "<br><a href=\"http://{$list[$i][wr_1]}\" target=\"_blank\" class='url'>{$list[$i][wr_1]}</a>";
			echo "<br>{$list[$i][wr_2]}";
        }
       // echo "</a>";

        if ($list[$i][comment_cnt]) 
            echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-size:7pt;'>{$list[$i][comment_cnt]}</span></a>";

        // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
        // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

        //echo " " . $list[$i][icon_new];
        //echo " " . $list[$i][icon_file];
        //echo " " . $list[$i][icon_link];
        //echo " " . $list[$i][icon_hot];
        //echo " " . $list[$i][icon_secret];
        echo $nobr_end;
        ?></td>

    <td><?=$list[$i][wr_hit]?></td>

</tr>
<tr><td colspan=<?=$colspan?> height=1 bgcolor=#dddddd></td></tr>
<?}?>
</table>
</form>
</td>
</tr>
</table>
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


<? if ($is_checkbox) { ?>
<script language="JavaScript">
function all_checked(sw)
{
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str)
{
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
function select_delete()
{
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
function select_copy(sw)
{
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=396, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<? } ?>
<!-- 게시판 목록 끝 -->
