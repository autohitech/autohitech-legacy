<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<table width="400" border="0" cellpadding="0" cellspacing="3" bgcolor="#2a3346">
<tr>
  <td align="left" valign="top" bgcolor="#FFFFFF"><form name="fzip" method="get" autocomplete="off">
    <input type=hidden name=frm_name  value='<?=$frm_name?>'>
    <input type=hidden name=frm_zip1  value='<?=$frm_zip1?>'>
    <input type=hidden name=frm_zip2  value='<?=$frm_zip2?>'>
    <input type=hidden name=frm_addr1 value='<?=$frm_addr1?>'>
    <input type=hidden name=frm_addr2 value='<?=$frm_addr2?>'>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="top" height="45" background="<?=$member_skin_path?>/img/bar_post.jpg"></td>
      </tr>
      <tr>
        <td align="center" valign="top">
		<table width="100%" height="83" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="45" align="left" valign="top" bgcolor="f4f4f5"><img src="<?=$member_skin_path?>/img/post_bg01.jpg"></td>
            </tr>
            <tr>
              <td height="18" align="center" valign="top" bgcolor="f4f4f5"><!--검색 테이블 시작-->
                <table width="370" height="18" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td align="left" valign="bottom"><span class="post_t01">우편번호검색</span></td>
                    <td width="260" align="right" valign="middle"><input type=text name=addr1 value='<?=$addr1?>' required minlength=2 itemname='동(읍/면/리)' style='border : 1px solid #c3c3c3; width: 258px; HEIGHT: 14px; BACKGROUND-COLOR: #ffffff'/></td>
                    <td width="33" align="left" valign="middle"><input type=image src='<?=$member_skin_path?>/img/btn_psearch.gif' border='0' align='absmiddle'></td>
                  </tr>
                </table>
                <!--검색 테이블 끝-->
              </td>
            </tr>
            <tr>
              <td height="20" align="left" valign="top" background="<?=$member_skin_path?>/img/post_bg02.jpg" bgcolor="f4f4f5"></td>
            </tr>
          </table>
          <br />
          <!-- 검색결과 여기서부터 -->
          <script language='javascript'>
document.fzip.addr1.focus();
</script>
          <? if ($search_count > 0) { ?>
          <table width="350" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="1" background="<?=$g4[bbs_img_path]?>/post_dot_bg.gif"></td>
            </tr>
            <tr>
              <td height="10"></td>
            </tr>
          </table>
          <table width="350" border="0" cellpadding="3" cellspacing="1" bgcolor="f0f0f0">
            <tr>
              <td height="25" valign="middle" style="padding-left:15;">총<b><font color="ff4400"><u>
                <?=$search_count?>
                </u></font></b>건 가나다순</td>
            </tr>
            <?
        for ($i=0; $i<count($list); $i++) 
        {
            echo "<tr><td style='padding-left:15;' bgcolor='#FFFFFF'><a href='javascript:;' onclick=\"find_zip('{$list[$i][zip1]}', '{$list[$i][zip2]}', '{$list[$i][addr]}');\">{$list[$i][zip1]}-{$list[$i][zip2]} : {$list[$i][addr]} {$list[$i][bunji]}</a></td></tr>\n";
        }
        ?>
            <tr>
              <td height="25" align="center" bgcolor="#F0F0F0">[끝]</td>
            </tr>
          </table>
          <script language="javascript">
function find_zip(zip1, zip2, addr1)
{
    var of = opener.document.<?=$frm_name?>;

    of.<?=$frm_zip1?>.value  = zip1;
    of.<?=$frm_zip2?>.value  = zip2;

    of.<?=$frm_addr1?>.value = addr1;

    of.<?=$frm_addr2?>.focus();
    window.close();
    return false;
}
</script>
          <? } ?>
          <!--버튼 테이블 시작-->
          <table width='100%' height="55" border='0' align='center' cellpadding='0' cellspacing='0'>
            <tr align='center'>
              <td valign="middle"><a href="javascript:window.close();"><img src="<?=$member_skin_path?>/img/btn_close.gif" border="0" /></a></td>
            </tr>
          </table>
          <!--버튼 테이블 끝-->
        </td>
      </tr>
    </table>
</td>
      </tr>
</table>