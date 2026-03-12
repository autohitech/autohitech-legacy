<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="4" align="left" valign="top" background="<?=$latest_skin_path?>/img/table_line_P.gif"></td>
                </tr>
</table>
<table width=100% border="0" cellpadding=0 cellspacing=1 bgcolor="e0e0e0">
<tr>
    <td height="120" colspan=4 align=center valign="top" bgcolor="#FFFFFF">
        <table width="100%" height="25" border="0" cellpadding="0" cellspacing="0" bgcolor="f0f0f0">
          <tr>
            <td align="left" valign="middle" style="padding-left:10;"><a href='<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>' class="cus_titleP"><?=$board[bo_subject]?></a></td>
            <td width="100" align="right" valign="middle"><a href='<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>'><img src='<?=$latest_skin_path?>/img/list_btn.gif' border=0 align='absmiddle'></a></td>
          </tr>
          <tr>
            <td height="1" colspan="2" align="left" valign="middle" bgcolor="e0e0e0"></td>
          </tr>
        </table>
        <table width="100%" border="0"  cellpadding=0 cellspacing=0>
		<tr>
			<td height="10"></td>
		</tr>
<? for ($i=0; $i<count($list); $i++) { ?>
        <tr>
            <td style="padding-left:15">
			<?
            echo $list[$i]['icon_reply'];
            //echo "<a href='{$list[$i]['href']}'>";
            if ($list[$i]['is_notice'])
                echo "<a href='{$list[$i]['href']}' class='cus_adm'><img src='$latest_skin_path/img/icon_star.gif' align='absmiddle'>{$list[$i]['subject']}</a>";
            else
                echo "<a href='{$list[$i]['href']}' class='notice'><img src='$latest_skin_path/img/icon_P.gif'><font color:#6A6A6A;>{$list[$i]['subject']}</font></a>";
            if ($list[$i]['comment_cnt']) 
                echo " <a href=\"{$list[$i]['comment_href']}\" class='notice'>{$list[$i]['comment_cnt']}</a>";

            // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
            // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

            echo " " . $list[$i]['icon_new'];
            echo " " . $list[$i]['icon_file'];
            echo " " . $list[$i]['icon_link'];
            echo " " . $list[$i]['icon_hot'];
            echo " " . $list[$i]['icon_secret'];
            ?></td></tr>
		<tr>
			<td height="6"></td>
		</tr>
<? } ?>
<? if (count($list) == 0) { ?><tr><td align=center height=100 valign="middle"><font color=#6A6A6A>게시물이 없습니다.</a></td></tr><? } ?>
    </table></td>
</tr>


</table>
