<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<form name=fmemberconfirm method=post onsubmit="return fmemberconfirm_submit(this);">
<input type=hidden name=mb_id value='<?=$member[mb_id]?>'>
<input type=hidden name=w value='u'>
<input type=hidden name=subNum value='2'>
<!-- Title -->
<div id="titleWrap">
<div class="tit"><img src="../img/title_modify01.gif" /></div>
<div class="navi"><ul><li class="home">홈</li><li>홈페이지관리</li><li class="location">회원정보수정</li></ul></div><? include "../inc/b_font.html";?>
</div>
<!-- //Title -->
<!--? include "../inc/con_fix01.html";?-->

<!-- Content -->
<div class="contentM">
<!-- 회원정보수정 -->
<table height="220" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
      <td rowspan="2" align="left" valign="top"><img src="<?=$member_skin_path?>/img/img_modify01.jpg" /></td>
      <td width="480" height="150" align="left" valign="top"><!--회색테두리-->
          <table width="480" height="150" border="0" cellpadding="0" cellspacing="5" bgcolor="f3f3f3">
            <tr>
              <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding-right:10px;"><!--정보수정 폼 전체-->
                  <table height="75" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="100" align="right" valign="top"><img src="<?=$member_skin_path?>/img/img_mem01.jpg" width="100" height="75"></td>
                      <td width="20" align="left" valign="top"></td>
                      <td align="left" valign="middle" class="mem_line"><!--정보수정 폼-->
                          <table height="40" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td width="45" align="left" valign="middle"><img src="<?=$member_skin_path?>/img/t_id.gif"></td>
                              <td width="145" height="18" align="left" valign="middle" class='modify_t01'><?=$member[mb_id]?></td>
                              <td width="70" rowspan="3" align="right" valign="middle"><input name="image" type="image" src="<?=$member_skin_path?>/img/btn_confirm.gif" border="0" id="btn_submit" /></td>
                            </tr>
                            <tr>
                              <td height="4" colspan="2"></td>
                            </tr>
                            <tr>
                              <td align="left" valign="middle"><img src="<?=$member_skin_path?>/img/t_pw.gif"></td>
                              <td width="145" height="18" align="left" valign="top" class="mem_form01"><input type="password" maxlength="20" name="mb_password" id="confirm_mb_password" itemname="패스워드" style="background-color:transparent; border:0; overflow:hidden; width:143px; height:17px;" class='password_t01' required='required' onkeypress="check_capslock('confirm_mb_password');" /></td>
                            </tr>
                          </table>
                        <!--//정보수정 폼-->
                      </td>
                    </tr>
                  </table>
                <!--//정보수정 폼 전체-->
              </td>
            </tr>
          </table>
        <!--회색테두리-->
      </td>
    </tr>
    <tr>
      <td height="70" align="left" valign="top"><img src="<?=$member_skin_path?>/img/img_modify02.jpg" align="left" /><img src="<?=$member_skin_path?>/img/txt_modify01.gif" align="right" style="margin-top:15px;" /></td>
    </tr>
</table>
</form>
<!-- //회원정보수정 -->
</div>
<!-- //Content -->
<script language='Javascript'>
document.onload = document.fmemberconfirm.mb_password.focus();

function fmemberconfirm_submit(f)
{
    document.getElementById("btn_submit").disabled = true;

    f.action = "<?=$url?>";
    return true;
}
</script>