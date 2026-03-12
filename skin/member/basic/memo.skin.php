<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<table width="600" height="395" border="0" cellpadding="0" cellspacing="3" bgcolor="#2a3346">
  <tr>
    <td align="center" valign="top" bgcolor="#ffffff">
	
	<table width="100%" height="45" border="0" cellpadding="0" cellspacing="0" background="<?=$member_skin_path?>/img/bar_memo.jpg">
        <tr>
          <td align="left" valign="top" style="padding:8px 0px 0px 40px; color:#ffffff; font-size:15px; font-weight:bold; letter-spacing:-1px;"><?=$g4[title]?></td>
        </tr>
      </table>
      <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td></td>
        </tr>
      </table>
      <table width="95%" height="23" border="0" cellpadding="0" cellspacing="0" background="<?=$member_skin_path?>/img/memo_bg02.gif">
        <tr>
          <td width="88" align="left" valign="top"><a href="./memo.php?kind=recv"><img src="<?=$member_skin_path?>/img/btn_recv_paper_<?=$recv_img?>.gif" border="0" /></a></td>
          <td width="88" align="left" valign="top"><a href="./memo.php?kind=send"><img src="<?=$member_skin_path?>/img/btn_send_paper_<?=$send_img?>.gif" border="0" /></a></td>
          <td width="88" align="left" valign="top"><a href="./memo_form.php"><img src="<?=$member_skin_path?>/img/btn_write_paper_off.gif" border="0" /></a></td>
          <td align="right">전체 <b><font color="4440bb"><u><?=$kind_title?></u></font></b>쪽지 [ <b><font color="#CC0000"><?=$total_count?></font></b> ]통</td>
        </tr>
      </table>
      <table width="95%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="25" align="left" valign="middle"><img src="<?=$member_skin_path?>/img/icon01.gif" vspace="2" align='top'>쪽지 보관일수는 최장 <b><u><font color="#009900"><?=$config[cf_memo_del]?></font></u></b>일 입니다.</td>
        </tr>
        <tr>
          <td width="95%" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="4" align="left" valign="top" background="<?=$member_skin_path?>/img/table_line_P.gif"></td>
              </tr>
            </table>
            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#e7e7e7">
              <tr bgcolor="#E1E1E1" align="center">
                <td valign="middle" bgcolor="#f3f3f3"><b>
                  <?= ($kind == "recv") ? "보낸사람" : "받는사람"; ?>
                  </b></td>
                <td valign="middle" bgcolor="#f3f3f3"><b>보낸시간</b></td>
                <td valign="middle" bgcolor="#f3f3f3"><b>읽은시간</b></td>
                <td valign="middle" bgcolor="#f3f3f3"><b>쪽지삭제</b></td>
              </tr>
              <? for ($i=0; $i<count($list); $i++) { ?>
              <tr height="25" bgcolor="#F6F6F6" align="center">
                <td height="25" valign="middle" bgcolor="#FFFFFF"><?=$list[$i][name]?></td>
                <td valign="middle" bgcolor="#FFFFFF"><a href="<?=$list[$i][view_href]?>">
                  <?=$list[$i][send_datetime]?>
                  </font></td>
                <td valign="middle" bgcolor="#FFFFFF"><a href="<?=$list[$i][view_href]?>">
                  <?=$list[$i][read_datetime]?>
                  </font></td>
                <td valign="middle" bgcolor="#FFFFFF"><a href="javascript:del('<?=$list[$i][del_href]?>');"><img src="<?=$member_skin_path?>/img/btn_comment_delete.gif" width="45" height="14" border="0" /></a></td>
              </tr>
              <? } ?>
              <? if ($i==0) { echo "<tr><td height=180 align=center colspan=4 bgcolor='#ffffff'>자료가 없습니다.</td></tr>"; } ?>
            </table></td>
        </tr>
      </table>
      <table width="95%" height="55" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" valign="middle"><a href="javascript:window.close();"><img src="<?=$member_skin_path?>/img/btn_close.gif" border="0"></a></td>
        </tr>
      </table></td>
  </tr>
</table>
