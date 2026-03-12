<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$url = '';
if ($g4['https_url']) {
    if (preg_match("/^\./", $urlencode))
        $url = $g4[url];
    else
        $url = $g4[url].$urlencode;
} else {
    $url = $urlencode;
}


?>
<script type="text/javascript">
// 엠파스 로긴 참고
var bReset = true;
function chkReset(f) 
{
    if (bReset) { if ( f.mb_id.value == '아이디' ) f.mb_id.value = ''; bReset = false; }
    document.getElementById("pw1").style.display = "none";
    document.getElementById("pw2").style.display = "";
}
</script>
<style>
/* 공통 적용 */
.login_bor { border : 1px solid #d4d4d4; width: 100px; HEIGHT: 18px; BACKGROUND-COLOR: #f4f4f4}
#outlogin_box font{
	font-size:8pt;
	letter-spacing:-1px;
	color:#B77E6A;
}
#outlogin_login_input{
	border-bottom:1px #EEE6E3 solid;
}
/* 로그인 끝 */

</style>

<table width="210" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="23" align="left" valign="top"><img src="<?=$outlogin_skin_path?>/img/login_title01.gif" /></td>
  </tr>
  <tr>
   <td height="1" align="left" valign="top" bgcolor="dcdcdc"></td>
          </tr>
  <form name="fhead" method="post" onsubmit="return fhead_submit(this);" autocomplete="off" style="display:inline;">
    <input type="hidden" name="url" value="<?=$url?>" />
    <tr>
      <td width="210" height="70" align="left" valign="middle"><table width="210" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="45" height="20" align="left"><img src="<?=$outlogin_skin_path?>/img/img_id01.gif" /></td>
          <td width="100" align="left" valign="middle"><input name="mb_id" tabindex=1 type="text" style="border : 1px solid #d4d4d4; width: 100px; HEIGHT: 18px; BACKGROUND-COLOR: #f4f4f4" class="login_t01" value="아이디" onmouseover='chkReset(this.form);' onfocus='chkReset(this.form);' /></td>
          <td width="65" align="right" valign="middle" style="padding-right:3;"><input type="checkbox" border="0" name="auto_login" value="1" onclick="if (this.checked) { if (confirm('자동로그인을 사용하시면 다음부터 회원아이디와 패스워드를 입력하실 필요가 없습니다.\n\n\공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?')) { this.checked = true; } else { this.checked = false; } }" />
            <img src="<?=$outlogin_skin_path?>/img/img_save01.gif" align="absmiddle" /></td>
        </tr>
        <tr>
          <td height="20" align="left" valign="middle"><img src="<?=$outlogin_skin_path?>/img/img_pw01.gif" /></td>
          <td height="20" align="left" valign="middle"><input name="text" type="text" class="login_t01" id="pw1" style="border : 1px solid #d4d4d4; width: 100px; HEIGHT: 18px; BACKGROUND-COLOR: #f4f4f4" onfocus='chkReset(this.form);' onmouseover='chkReset(this.form);' value="패스워드" maxlength="20" />
                <input name="mb_password" type="password" tabindex=2 maxlength="20" style="width:100px; display:none; height:18px;" class="login_bor" id="pw2" onmouseover='chkReset(this.form);' onfocus='chkReset(this.form);' onkeypress="check_capslock(event, 'pw2');" /></td>
          <td align="right" valign="middle"><input name="image" type="image"  tabindex=3 onclick="return check_login()" tabindex="3"  src="<?=$outlogin_skin_path?>/img/btn_login.gif" border="0" /></td>
        </tr>
      </table></td>
    </tr>
   <tr>
        <td height="1" bgcolor="dcdcdc"></td>
            </tr>
    <tr>
      <td height="28" align="left" valign="middle"><table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
          <td align="left" valign="bottom"><a href="<?=$g4[bbs_path]?>/register.php" class="login">튜닝 회원가입</a> <span class="login_line">|</span> <a href="javascript:win_password_forget();"class="login">회원 아이디/비밀번호찾기</a></td>
        </tr>
      </table></td>
    </tr>
    <tr>
        <td height="1" bgcolor="dcdcdc"></td>
            </tr>
  </form>
</table>
<script type="text/javascript">
function fhead_submit(f)
{
    if (!f.mb_id.value) {
        alert("회원아이디를 입력하십시오.");
        f.mb_id.focus();
        return false;
    }

    if (!f.mb_password.value) {
        alert("패스워드를 입력하십시오.");
        f.mb_password.focus();
        return false;
    }

    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/login_check.php';";
    else
        echo "f.action = '$g4[bbs_path]/login_check.php';";
    ?>
    return true;
}
</script>
<!-- 로그인 전 외부로그인 끝 -->
