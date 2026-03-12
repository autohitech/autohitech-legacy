<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<table width="600" border="0" cellpadding="0" cellspacing="3" bgcolor="#2a3346">
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF">
	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td height="45" align="left" valign="top" background="<?=$member_skin_path?>/img/bar_scrap.jpg">&nbsp;</td>
</tr>
<tr>
<td height="10" align="left" valign="top"></td>
</tr>
</table>
	
	<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
	<table width="95%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="4" align="left" valign="top" background="<?=$member_skin_path?>/img/table_line_P.gif"></td>
                </tr>
      </table>
	<table width="95%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td bgcolor="#FFFFFF">
		
		
		
		<table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#e7e7e7">
            <tr bgcolor="#E1E1E1" align="center">
              <td width="30" bgcolor="f3f3f3" class="my_scrap">No.</td>
              <td bgcolor="f3f3f3" class="my_scrap">게시판</td>
              <td bgcolor="f3f3f3" class="my_scrap">제 목</td>
              <td width="130" bgcolor="f3f3f3" class="my_scrap">보관일시</td>
              <td width="60" bgcolor="f3f3f3" class="my_scrap">삭 제</td>
            </tr>
            <? for ($i=0; $i<count($list); $i++) { ?>
            <tr align="center">
              <td bgcolor="#FFFFFF"><?=$list[$i][num]?></td>
              <td bgcolor="#FFFFFF"><a href="javascript:;" onclick="opener.document.location.href='<?=$list[$i][opener_href]?>';">
                <?=$list[$i][bo_subject]?>
              </a></td>
              <td align="left" bgcolor="#FFFFFF" style='word-break:break-all;'>&nbsp;<a href="javascript:;" onclick="opener.document.location.href='<?=$list[$i][opener_href_wr_id]?>';">
                <?=$list[$i][subject]?>
              </a></td>
              <td bgcolor="#FFFFFF"><?=$list[$i][ms_datetime]?></td>
              <td bgcolor="#FFFFFF"><a href="javascript:del('<?=$list[$i][del_href]?>');"><img src="<?=$member_skin_path?>/img/btn_comment_delete.gif" width="45" height="14" border="0" /></a></td>
            </tr>
            <? } ?>
            <? if ($i == 0) echo "<tr><td colspan=5 align=center height=90 bgcolor='#FFFFFF'>등록된 스크랩 데이터가 없습니다.</td></tr>"; ?>
        </table></td>
      </tr>
      <tr>
        <td height="30" align="center"><?=get_paging($config[cf_write_pages], $page, $total_page, "?$qstr&page=");?></td>
      </tr>
      <tr>
      </table>
	 <!--버튼 테이블 시작-->
<table width='95%' height="55" border='0' align='center' cellpadding='0' cellspacing='0'>
          <tr>
            <td align="center" valign="middle"><a href="javascript:window.close();"><img src="<?=$member_skin_path?>/img/btn_close.gif" border="0" /></a></td>
          </tr>
      </table>
        <!--버튼 테이블 끝--> 
    </td>
  </tr>
</table>


    

