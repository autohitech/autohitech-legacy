 <?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<style>
a.search:link	 {color:#1992af; font-weight:bold; text-decoration:underline;}
a.search:visited {color:#888888; font-weight:bold; text-decoration:underline;}
a.search:active	 {color:#e01300; font-weight:bold; text-decoration:underline;}
a.search:hover	 {color:#e01300; font-weight:bold; text-decoration:underline;}
.board_page { clear:both; text-align:center; margin-top:30px;}
.board_page a:link        { color:#777777; font-size:11px; text-decoration:none; font-family:Verdana, Tahoma, AppleGothic, sans-serif;}
.board_page a:visited     { color:#999999; font-size:11px; text-decoration:none; font-family:Verdana, Tahoma, AppleGothic, sans-serif;}
.board_page a:hover       { color:#1992af; font-size:11px; text-decoration:none; font-family:Verdana, Tahoma, AppleGothic, sans-serif;}

.board_page .pagingpre { color:#ed454d; font-size:11px; font-weight:bold; text-decoration:underline; font-family:Verdana, Tahoma, AppleGothic, sans-serif;}
.board_page .pagingimg { margin-top:5px;}

.board_search {clear:both; width:750px; text-align:center; padding:8px 0px 8px 0px; background:#f5f5f5; border:1px solid #e5e5e5;}
.board_search .stx {height:21px; border:1px solid #9A9A9A; border-right:1px solid #D8D8D8; border-bottom:1px solid #D8D8D8; }
</style>

<!-- Title -->
<div id="titleWrap">
<div class="tit"><img src="../img/title_search01.gif" /></div>
<div class="navi"><ul><li class="home">홈</li><li class="location">검색결과</li></ul></div><? include "../inc/b_font.html";?>
</div>
<!-- //Title -->



<form name=fsearch method=get onsubmit="return fsearch_submit(this);" style="margin:0px;">
<table width=100% cellpadding=2 cellspacing=0>
<input type="hidden" name="srows" value="<?=$srows?>">
<input type="hidden" name="sfl" value="wr_subject||wr_content||wr_3">
<tr>
    <td align=center>
	 <!-- 검색 -->
    <div class="board_search">
        <input type=text name=stx class=ed maxlength=20 required itemname="검색어" value='<?=$text_stx?>' style="width:200px; height:18px;" />

        <input type="image" src="<?=$search_skin_path?>/img/btn_search.gif" border='0' align="absmiddle">

        <script language="javascript">
        function fsearch_submit(f)
        {
            if (f.stx.value.length < 2) {
                alert("검색어는 두글자 이상 입력하십시오.");
                f.stx.select();
                f.stx.focus();
                return false;
            }

            // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
            var cnt = 0;
            for (var i=0; i<f.stx.value.length; i++) {
                if (f.stx.value.charAt(i) == ' ')
                    cnt++;
            }

            if (cnt > 1) {
                alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                f.stx.select();
                f.stx.focus();
                return false;
            }
            
            f.action = "";
            return true;
        }
        </script>
        <input type="hidden" name="sop" value="and">
		
		</div>
    </td>
</tr>
<tr>
    <td height="20" align=center>
        
    </td>
</tr>
</table>
</form>



<table width=100% cellpadding=2 cellspacing=0>
<tr>
    <td style='word-break:break-all;' align='left'>

        <? 
        if ($stx) 
        { 
          //  echo "<b>검색된 게시판 리스트</b> (<b>{$board_count}</b>개의 게시판, <b>".number_format($total_count)."</b>개의 게시글, <b>".number_format($page)."/".number_format($total_page)."</b> 페이지)";
            if ($board_count)
            {/*
                echo "<ul><ul type=square style='line-height:20px;;'>";
                if ($onetable)
                    echo "<li>";
                echo $str_board_list;
                echo "</ul></ul>";*/
            }
            else
            {
                echo "<table width='100%' height='300' border='0' cellpadding='0' cellspacing='0'>
  <tr>
    <td align='center' valign='middle'><img src='$search_skin_path/img/search01.gif' /></td>
  </tr>
</table>";
            }
        }
        ?>


        <? 
        $k=0;
        for ($idx=$table_index, $k=0; $idx<count($search_table) && $k<$rows; $idx++) 
        { 
       //     echo "<ul type=circle><li><b><a href='./board.php?bo_table={$search_table[$idx]}&{$search_query}'><u>{$bo_subject[$idx]}</u></a>에서의 검색결과</b></ul>";
            $comment_href = "";
            for ($i=0; $i<count($list[$idx]) && $k<$rows; $i++, $k++) 
            {
                echo "<ul><ul type=square><li style='line-height:22px; padding-bottom:10px;'>";
                echo "<a href='{$list[$idx][$i][href]}{$comment_href}' class='search'><u>";
                echo $list[$idx][$i][subject];
                echo "</u></a> [<a href='{$list[$idx][$i][href]}{$comment_href}' target=_blank>새창</a>]<br>";
                echo $list[$idx][$i][content];
            //    echo "<br><font color=#999999>{$list[$idx][$i][wr_datetime]}</font>&nbsp;&nbsp;&nbsp;";
              //  echo $list[$idx][$i][name];
                echo "</ul></ul>";
            }
        }
        ?>
    <!-- 페이지 -->
    <div class="board_page">
        <? //if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$search_skin_path/img/page_search_prev.gif' border='0' align=absmiddle title='이전검색'></a>"; } ?>
        <?
        // 기본으로 넘어오는 페이지를 아래와 같이 변환하여 이미지로도 출력할 수 있습니다.
        //echo $write_pages;
        $write_pages = str_replace("처음", "<img src='$search_skin_path/img/page_begin.gif' border='0' class='pagingimg' title='처음'>", $write_pages);
        $write_pages = str_replace("이전", "<img src='$search_skin_path/img/page_prev.gif' border='0' class='pagingimg' title='이전'>", $write_pages);
        $write_pages = str_replace("다음", "<img src='$search_skin_path/img/page_next.gif' border='0' class='pagingimg' title='다음'>", $write_pages);
        $write_pages = str_replace("맨끝", "<img src='$search_skin_path/img/page_end.gif' border='0' class='pagingimg' title='맨끝'>", $write_pages);
        $write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "$1", $write_pages);
        ?>
        <?=$write_pages?>
        <?// if ($next_part_href) { echo "<a href='$next_part_href'><img src='$search_skin_path/img/page_search_next.gif' border='0' align=absmiddle title='다음검색'></a>"; } ?>
    </div>

</td></tr></table>
