<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>


<form name="fboardpassword" method=post onsubmit="return fboardpassword_submit(this);">
<input type=hidden name=w           value="<?=$w?>">
<input type=hidden name=bo_table    value="<?=$bo_table?>">
<input type=hidden name=wr_id       value="<?=$wr_id?>">
<input type=hidden name=comment_id  value="<?=$comment_id?>">
<input type=hidden name=sfl         value="<?=$sfl?>">
<input type=hidden name=stx         value="<?=$stx?>">
<input type=hidden name=page        value="<?=$page?>">

<br />
<!--비밀글 // 전체 테이블 시작-->
<table width="715" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="140" align="left" valign="top"><img src="<?=$member_skin_path?>/img/secrecy_T.jpg"></td>
  </tr>
  <tr>
    <td align="left" valign="top" background="<?=$member_skin_path?>/img/table_M.jpg"><!--비밀번호등록 테이블 시작-->
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="30" align="left" valign="top">&nbsp;</td>
            <td align="left" valign="middle">&nbsp;</td>
            <td rowspan="4" align="right" valign="top" style="padding:5px 3px 0px 0px;"><img src="<?=$member_skin_path?>/img/img_free.jpg" /></td>
          </tr>
          <tr>
            <td width="60" align="left" valign="top"><img src="<?=$member_skin_path?>/img/img_line01.gif" width="60" height="75" /></td>
            <td align="left" valign="middle"><table width="335" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="1" colspan="3" align="left" valign="middle" bgcolor="dcdcdc"></td>
                </tr>
                <tr>
                  <td height="20" colspan="3" align="left" valign="middle"></td>
                </tr>
                <tr>
                  <td width="50" align="left" valign="middle" style="padding:3px 0px 0px 10px;"><img src="<?=$member_skin_path?>/img/img_pw01.gif" /></td>
                  <td align="left" valign="top" style="padding-top:0;"><INPUT type=password name="wr_password" id="password_wr_password" itemname="패스워드" required onkeypress="check_capslock(event, 'password_wr_password');" style="border:1px solid #d3d3d3; width:200px; height:18px; line-height:18px; background:#f3f3f3;"></td>
                  <td width="70" rowspan="2" align="right" valign="top"><input name="image" type="image" src="<?=$member_skin_path?>/img/btn_ok02.gif" border="0" id="btn_submit" /></td>
                </tr>
                <tr>
                  <td colspan="2" align="left" valign="bottom" style="padding-top:3px;"><img src="<?=$member_skin_path?>/img/text03.gif" /></td>
                </tr>
                <tr>
                  <td height="15" colspan="3" align="left" valign="middle"></td>
                </tr>
                <tr>
                  <td height="1" colspan="3" align="left" valign="middle" bgcolor="dcdcdc"></td>
                </tr>
            </table></td>
          </tr>
          <tr>
            <td height="10" align="left" valign="top"></td>
            <td align="left" valign="top"></td>
          </tr>
          <tr>
            <td align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top"><img src="<?=$member_skin_path?>/img/img_text01.gif" /></td>
          </tr>
		  <tr>
            <td height="20" align="left" valign="top"></td>
            <td align="left" valign="top"></td>
          </tr>
        </table>
      <!--비밀번호등록 테이블 끝-->
    </td>
  </tr>
  <tr>
    <td height="5" align="left" valign="bottom"><img src="<?=$member_skin_path?>/img/tabel_B.jpg" /></td>
  </tr>
</table>
<!--비밀글 // 전체 테이블 끝-->
</form>

<script language='JavaScript'>
document.fboardpassword.wr_password.focus();

function fboardpassword_submit(f)
{
    f.action = "<?=$action?>";
    return true;
}
</script>
