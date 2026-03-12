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
.login_bor { border:1px #DDCABB solid;}
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

<table width="220" height="125" border="0" cellpadding="0" cellspacing="0">
  <tr>
 
   <td height="25" colspan="2" align="left" valign="top"><img src="<?=$outlogin_skin_path?>/img/login_title02.gif" /></td>
  </tr>
			<form name="fhead" method="post" onsubmit="return fhead_submit(this);" autocomplete="off" style="display:inline;">
			<input type="hidden" name="url" value="<?=$url?>">
  <tr>
    <td width="10" height="70" align="left" valign="top"></td>
    <td width="210" align="left" valign="middle"><table width="210" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="45" height="20" align="left"><img src="<?=$outlogin_skin_path?>/img/img_id01.gif" /></td>
        <td width="100" align="left" valign="middle"><input name="mb_id" type="text" maxlength="20" style="border : 1px solid #d4d4d4; width: 100px; HEIGHT: 18px; BACKGROUND-COLOR: #f4f4f4"  class="input1" size="12"  class="login_bor" value="아이디" onMouseOver='chkReset(this.form);' onFocus='chkReset(this.form);'>
<input type="checkbox" border="0" name="auto_login" value="1" onclick="if (this.checked) { if (confirm('자동로그인을 사용하시면 다음부터 회원아이디와 패스워드를 입력하실 필요가 없습니다.\n\n\공공장소에서는 개인정보가 유출될 수 있으니 사용을 자제하여 주십시오.\n\n자동로그인을 사용하시겠습니까?')) { this.checked = true; } else { this.checked = false; } }"> <font>자동</font> </td>
        <td width="65" rowspan="2" align="right" valign="top"><input name="image" type="image"  onClick="return check_login()" tabindex="3"  src="<?=$outlogin_skin_path?>/img/btn_login02.gif" border="0" /></a> </td>
      </tr>
      <tr>
        <td height="20" align="left" valign="middle"><img src="<?=$outlogin_skin_path?>/img/img_pw01.gif" /></td>
        <td height="20" align="left" valign="middle">
<input type="text" maxlength="20" style="width:100%;height:17px;" class="login_bor" value="패스워드" id="pw1" onMouseOver='chkReset(this.form);' onfocus='chkReset(this.form);'><input name="mb_password" type="password" maxlength="20" style="width:100%;display:none;height:17px;" class="login_bor" id="pw2" onMouseOver='chkReset(this.form);' onfocus='chkReset(this.form);' onKeyPress="check_capslock(event, 'pw2');">

</td>
      </tr>  <tr>
    <td width="10" height="30" align="left" valign="middle"></td>
    <td align="left" valign="middle" background="<?=$outlogin_skin_path?>/img/login_bg.gif"> 
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td align="center" valign="bottom">
						<a href="<?=$g4[bbs_path]?>/register.php"><font color="#B77E6A"><strong>회원가입</strong></font></a>
						<font color="#B47E64">|</font>
						<a href="javascript:win_password_forget();"><font>아이디 · 비밀번호 찾기</font></a>
					</td>
				</tr>
				<tr>
					<td height="5"></td>
				</tr>
			</table>
</td>
      </tr>
    </table></td>
  </tr></form>

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
