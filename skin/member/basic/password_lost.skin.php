<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<table width="400" height="245" border="0" cellpadding="0" cellspacing="3" bgcolor="#2a3346">
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="45" align="left" valign="top" background="<?=$member_skin_path?>/img/bar_idpwsc.jpg">&nbsp;</td>
      </tr>
      <tr>
        <td height="20" align="left" valign="top"></td>
      </tr>
      <tr>
        <td align="center" valign="top">
		
		
		<form name="fpasswordlost" method="post" onsubmit="return fpasswordlost_submit(this);" autocomplete="off">
<!--회원 비밀번호 찾기 회색 테이블 시작-->
	<table width="350" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="fafafa">
      <tr>
        <td width="7" height="7" align="left" valign="top" background="<?=$member_skin_path?>/img/table_img06.gif"><img src="<?=$member_skin_path?>/img/table_img01.gif" /></td>
        <td align="center" valign="top" background="<?=$member_skin_path?>/img/table_img05.gif"></td>
        <td width="7" height="7" align="right" valign="top" background="<?=$member_skin_path?>/img/table_img07.gif"><img src="<?=$member_skin_path?>/img/table_img02.gif" /></td>
      </tr>
      <tr>
        <td align="left" valign="middle" background="<?=$member_skin_path?>/img/table_img06.gif"><img src="<?=$member_skin_path?>/img/table_img06.gif" /></td>
        <td align="center" valign="middle" bgcolor="fafafa">
        <table width="280" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="2" align="left" valign="middle"><img src="<?=$member_skin_path?>/img/icon01.gif" align="absmiddle" /><b>회원가입 시 등록한 이메일주소</b></td>
          </tr>
        <tr> 
            <td colspan="2" align="left" valign="middle">
                <input type="text" name="mb_email" email itemname="이메일주소" style='width:280px; height:15px;' class='ed' required='required'></td>
            </tr>
        <tr> 
            <td height="10" colspan="2"></td>
        </tr>
        <tr> 
            <td width="130" align="left" valign="top"><img id='kcaptcha_image' /></td>
            <td width="150" align="left" valign="top"><input type="text" name='wr_key' style='width:150px; height:15px;' class='ed' required='required' itemname='자동등록방지' /><br />
              왼쪽의 숫자를 입력하세요.</td>
        </tr>
        </table>
</td>
        <td align="right" valign="middle" background="<?=$member_skin_path?>/img/table_img07.gif"><img src="<?=$member_skin_path?>/img/table_img07.gif" /></td>
      </tr>
      <tr>
        <td width="7" height="7" align="left" valign="bottom" background="<?=$member_skin_path?>/img/table_img08.gif"><img src="<?=$member_skin_path?>/img/table_img03.gif" /></td>
        <td align="center" valign="bottom" background="<?=$member_skin_path?>/img/table_img08.gif"></td>
        <td width="7" height="7" align="right" valign="top" background="<?=$member_skin_path?>/img/table_img08.gif"><img src="<?=$member_skin_path?>/img/table_img04.gif" /></td>
      </tr>
    </table>
	<!--회원 비밀번호 찾기 회색 테이블 끝-->
<table width="380" height="40" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><input type="image" src="<?=$member_skin_path?>/img/btn_ok01.gif"></td>
</tr>
</table>
        </form></td>
      </tr>
    </table></td>
  </tr>
</table>





<script type="text/javascript" src="<?="$g4[path]/js/md5.js"?>"></script>
<script type="text/javascript" src="<?="$g4[path]/js/jquery.kcaptcha.js"?>"></script>
<script type="text/javascript">
function fpasswordlost_submit(f)
{
    if (!check_kcaptcha(f.wr_key)) {
        return false;
    }

    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/password_lost2.php';";
    else
        echo "f.action = './password_lost2.php';";
    ?>

    return true;
}

self.focus();
document.fpasswordlost.mb_email.focus();

$(function() {
    var sw = screen.width;
    var sh = screen.height;
    var cw = document.body.clientWidth;
    var ch = document.body.clientHeight;
    var top  = sh / 2 - ch / 2 - 100;
    var left = sw / 2 - cw / 2;
    moveTo(left, top);
});
</script>
