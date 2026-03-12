
<br>

<!-- 원글 내용 -->
<TABLE width=<?=$width?> cellSpacing=0 borderColorDark=#000000 cellPadding=0 bgColor=#f6f6f6 borderColorLight=#ffffff border=0 align="center">
  <TR>
    <TD>
	  <table border=1 cellpadding=3 cellspacing=0 width=100% bgcolor=white bordercolor=white bordercolorlight=#c8d8e0>
        <TR bgcolor="#f7f7f7">
          <TD height=28 colspan="2" valign="middle">
		  &nbsp;<IMG src="<?=$board_skin_path?>/img/cal.gif" align=absMiddle border=0>
			<? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?>
			<B><FONT color=#000000><?=$view[subject]?></FONT></B> </TD>
		</TR>
      </TABLE>
<table border=1 cellpadding=3 cellspacing=0 width=100% bgcolor=white bordercolor=white bordercolorlight=#c8d8e0>
  <?
     $from_date = str_replace("http://","",$view[link][1]);
     $to_date = str_replace("http://","",$view[link][2]);
     $from_date = substr($from_date,0,4)."년 ".sprintf("%2d",substr($from_date,4,2))."월 ".sprintf("%2d",substr($from_date,6,2))."일";
     $to_date   = substr($to_date,0,4)."년 ".sprintf("%2d",substr($to_date,4,2))."월 ".sprintf("%2d",substr($to_date,6,2))."일";
  ?>
  <tr height="25">
    <td valign="middle">&nbsp; - 일 정 : <?=$from_date?> <? if($from_date != $to_date) echo"~ $to_date";?></td>
  </tr>
  <? 
    // 파일 업로드 설정한 값만큼 출력
    for ($i=1; $i<=$cfg[file_count]; $i++) {
      if ($file[$i][source]) { 
	    echo "  <tr height='25'><td>&nbsp;다운로드 #{$i} : <a href='{$file[$i][href]}'>{$file[$i][source]} ({$file[$i][size]})</a>, Down:{$file[$i][download]}</td></tr>";

	  }	
    }
  ?>
  <tr>
     <td>
	 
	 
	  <TABLE width="100%" border=0 cellpadding="5" cellspacing="0">
        <TR><TD>
     <? 
       for ($i=1; $i<=$cfg[file_count]; $i++) {
         if ($file[$i][view]) { echo $file[$i][view]; }
       } 
     ?>
     <!-- 내용 출력 -->
       <span class=content><?=$view[content];?></span>
       <? if ($board[bo_use_signature]) { echo $signature; } // 서명 출력 ?>
     <!-- 테러 태그 방지용 -->
       </xml></xmp><a href=""></a><a href=''></a>
	   </TD>
	   </TR>
	   </table>
	 </td>
  </tr>
</TABLE>
<!----그냥 라인----------->
<? if ($is_comment) { ?>
<!-- 코멘트 내용 -->
  <? for ($i=0; $i<count($list); $i++) { ?>
  <a name='c<?=$list[$i][wr_id]?>'></a>
  <table width=100% border=0 align=center cellpadding=4 cellspacing=1>
    <tr>
      <td>
        <table width=100% border=0 cellpadding=0 cellspacing=0>
          <col width=100 align=center></col>
          <col width=''></col>
          <col width=150></col>
          <tr>
            <td valign=top style='word-break:break-all;'><?=$list[$i][name]?></td>
            <td valign=top style='word-break:break-all; text-align:justify;' class='lh'><?=$list[$i][content]?></td>
            <td valign=top align=right>
              <?=$list[$i][datetime]?><br>
              <?=$list[$i][ip]?><br>
              <? if ($list[$i][is_del]) { echo "{$list[$i][del_href]}x</a>"; } ?>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
<? } // for ?>


<? if ($is_comment_write) { ?>
<!-- 코멘트 쓰기 -->


  <table width=100% align=center cellpadding=0 cellspacing=0 border=0>
    <form name=fgbview method=post action='./?doc=bbs/gbupdate.php'>
    <input type=hidden name=w        value='c'>
    <input type=hidden name=bo_table value='<?=$bo_table?>'>
    <input type=hidden name=sselect  value='<?=$sselect?>'>
    <input type=hidden name=stext    value='<?=$stext?>'>
    <input type=hidden name=wr_id    value='<?=$wr_id?>'>
    <input type=hidden name=page     value='<?=$page?>'>
    <input type=hidden name=section  value='<?=$section?>'>
    <colgroup width=170>
    <colgroup width=''>
    <colgroup width=50>
    <tr>
      <td>
        <table width=100%>
          <tr>
            <td width=70><img src='<?=$board_skin_path?>/img/img_name.gif'></td>
            <td width=100><?=$c_name?></td>
          </tr>
          <? if ($is_guest) { ?>
          <tr>
            <td><img src='<?=$board_skin_path?>/img/img_pw.gif'></td>
            <td><input type=password name=wr_passwd size=10 class=input required itemname='비밀번호'></td>
          </tr>
          <? } ?>
        </table>
      </td>
      <td> &nbsp;<textarea name=wr_content rows=3 style='width:98%; line-height:150%;' required itemname='내용' class=textarea></textarea></td>
      <td>
        <table width=100%>
          <tr><td><input type=image src='<?="$board_skin_path/img/btncomment.gif"?>' border=0 align=absmiddle></td></tr>
          <tr><td><a href='javascript:textarea_size(document.fgbview.wr_content, 5)'><img src='<?=$board_skin_path?>/img/icon_down.gif' border=0></a> <a href='javascript:textarea_size(document.fgbview.wr_content, -5)'><img src='<?=$board_skin_path?>/img/icon_up.gif' border=0></a></td></tr>
        </table>
      </td>
    </tr>
    </form>
  </table><br>
    <? } // if ?>
<? } // if ?>

<br>

<!-- 링크 -->
<table width=100% align=center border=0 cellpadding=3 cellspacing=0>
  <tr>
    <td width=70% height=25>
        <? if ($search_href) { echo "<a href=\"$search_href\"><img src='$board_skin_path/img/searchlist.gif' border=0 alt='검색목록'></a>"; } ?>
        <? echo "<a href=\"$list_href\"><img src='$board_skin_path/img/list.gif' border=0 alt='목록'></a>"; ?>
        <? if ($write_href) { echo "<a href=\"$write_href\"><img src='$board_skin_path/img/write.gif' border=0 alt='글쓰기'></a>"; } ?>
        <? if ($reply_href) { echo "<a href=\"$reply_href\"><img src='$board_skin_path/img/reply.gif' border=0 alt='답변'></a>"; } ?>
        <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_path/img/edit.gif' border=0 alt='수정'></a>"; } ?>
        <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_path/img/delete.gif' border=0 alt='삭제'></a>"; } ?>
        <? if ($good_href) { echo "<a href=\"$good_href\"><img src='$board_skin_path/img/good.gif' border=0 alt='추천'></a>"; } ?>
        <? if ($nogood_href) { echo "<a href=\"$nogood_href\"><img src='$board_skin_path/img/nogood.gif' border=0 alt='비추천'></a>"; } ?>
        <? if ($copy_href) { echo "<a href=\"$copy_href\"><img src='$board_skin_path/img/copy.gif' border=0 alt='복사'></a>"; } ?>
        <? if ($move_href) { echo "<a href=\"$move_href\"><img src='$board_skin_path/img/move.gif' border=0 alt='이동'></a>"; } ?>
    </td>
    <td width=30% align=right>
        <? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/prev.gif' border=0 alt='이전글'></a>"; } ?>
        <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/next.gif' border=0 alt='다음글'></a>"; } ?>
    </td>
  </tr>
</table>
	  </TD>
    </TR>
</TABLE>
