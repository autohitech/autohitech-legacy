<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<table width="600" height="395" border="0" cellpadding="0" cellspacing="3" bgcolor="#2a3346">
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF">
	
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
          <td width="88" align="left" valign="top"><a href="./memo.php?kind=recv"><img src="<?=$member_skin_path?>/img/btn_recv_paper_off.gif" border="0" /></a></td>
          <td width="88" align="left" valign="top"><a href="./memo.php?kind=send"><img src="<?=$member_skin_path?>/img/btn_send_paper_off.gif" border="0" /></a></td>
          <td width="88" align="left" valign="top"><a href="./memo_form.php"><img src="<?=$member_skin_path?>/img/btn_write_paper_on.gif" border="0" /></a></td>
          <td align="right">&nbsp;</td>
        </tr>
      </table>
      <form name=fmemoform method=post onsubmit="return fmemoform_submit(this);" style="margin:0px;">
        <table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td></td>
          </tr>
        </table>
        <table width="95%" border="0" cellpadding="0" cellspacing="0">
          <?
            if ($config[cf_memo_send_point]) {
                echo "쪽지 보낼때 회원당 ".number_format($config[cf_memo_send_point])."점의 포인트를 차감합니다.";
            }
            ?>
          <tr>
            <td height="2" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="4" align="left" valign="top" background="<?=$member_skin_path?>/img/table_line_P.gif"></td>
                </tr>
              </table>
              <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="e7e7e7">
                <tr bgcolor="#E1E1E1" align="center">
                  <td width="160" height="24" rowspan="2" valign="middle" bgcolor="#f3f3f3"><b>받는 회원아이디</b></td>
                  <td align="left" valign="middle" bgcolor="ffffff"><input type="text" name="me_recv_mb_id" required="required" itemname="받는 회원아이디" value="<?=$me_recv_mb_id?>" style="width:98%;" /></td>
                </tr>
                <tr bgcolor="#E1E1E1" align="center">
                  <td align="left" valign="middle" bgcolor="ffffff">※ 여러 회원에게 보낼때는 컴마(,)로 구분하세요.(띄어쓰기금지)</td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td align="center" valign="middle" bgcolor="#f8f8f8" style="padding:10px 0px 10px 0px;"><textarea name="me_memo" rows="5" style='width:95%;' required="required" itemname='내용'></textarea></td>
          </tr>
           <tr>
            <td height="1" bgcolor="e7e7e7"></td>
          </tr>
          <tr>
            <td align="left" valign="middle"><table width="100%" border="0" cellpadding="5" cellspacing="0">
              <tr align="center">
                <td width="160" height="70" valign="middle"><img id='kcaptcha_image' /></td>
                <td align="left" valign="middle" class="mem_t02"><input type="input" size="10" name="wr_key" itemname="자동등록방지" style='border:1px solid; width:180px; Height:45px; line-height:45px; background-color:#ffffff;' class="mem_auto" required="required" /> 
                왼쪽의 글자를 입력하세요.</td>
              </tr>
            </table></td>
          </tr>
		  <tr>
            <td height="1" bgcolor="e7e7e7"></td>
          </tr>
        </table>
		<table width="95%" height="55" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td align="center" valign="middle"><input id=btn_submit type=image src="<?=$member_skin_path?>/img/btn_paper_send.gif" border=0><a href="javascript:window.close();"><img src="<?=$member_skin_path?>/img/btn_close.gif" border="0" style="padding:0px 0px 0px 7px;" /></a></td>
          </tr>
        </table>
      </form></td>
  </tr>
</table>
<script type="text/javascript">
with (document.fmemoform) {
    if (me_recv_mb_id.value == "")
        me_recv_mb_id.focus();
    else
        me_memo.focus();
}

function fmemoform_submit(f)
{
    if (!check_kcaptcha(f.wr_key)) {
        return false;
    }

    document.getElementById("btn_submit").disabled = true;

    f.action = "./memo_form_update.php";
    return true;
}
</script>

