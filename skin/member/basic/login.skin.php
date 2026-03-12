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

<!-- Title -->
<div id="titleWrap">
<div class="tit"><img src="../img/title_login01.gif" /></div>
<div class="navi"><ul><li class="home">홈</li><li>홈페이지관리</li><li class="location">로그인</li></ul></div><? include "../inc/b_font.html";?>
</div>
<!-- //Title -->
<!--? include "../inc/con_fix01.html";?-->
	
<script type="text/javascript" src="<?=$g4[path]?>/js/capslock.js"></script>

<!-- Content -->
<div class="contentM">
<!--로그인-->
<table height="220" border="0" align="center" cellpadding="0" cellspacing="0">
<form name="flogin" method="post" onsubmit="return flogin_submit(this);" autocomplete="off">
<input type="hidden" name="url" value='<?=$url?>'>
          <tr>
            <td rowspan="2" align="right" valign="top"><img src="<?=$member_skin_path?>/img/img_login01.jpg" /></td>
            <td width="480" height="150" align="left" valign="top">
			<!--회색테두리-->
			<table width="480" height="150" border="0" cellpadding="0" cellspacing="5" bgcolor="#f3f3f3">
              <tr>
                <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding-right:10px;">
				
				<!--로그인 폼 전체-->
			<table height="75" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="100" align="right" valign="top"><img src="<?=$member_skin_path?>/img/img_mem01.jpg" width="100" height="75"></td>
                <td width="20" align="left" valign="top"></td>
                <td align="left" valign="middle" class="mem_line">
				
				<!--로그인 폼-->
				<table height="40" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="45" align="left" valign="middle"><img src="<?=$member_skin_path?>/img/t_id.gif"></td>
                    <td width="150" height="18" align="left" valign="middle" class="mem_form01"><input type="text" maxlength='20' name="mb_id" tabindex='112' itemname="아이디" style="background-color:transparent; border:0; overflow:hidden; width:143px; height:17px;" class='login_t01' minlength="2" /></td>
                    <td width="70" rowspan="3" align="right" valign="middle"><input name="image" type="image" tabindex=114 src="<?=$member_skin_path?>/img/btn_login.gif" border="0" id="btn_submit" /></td>
                  </tr>
                  <tr>
                    <td height="4" colspan="2"></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle"><img src="<?=$member_skin_path?>/img/t_pw.gif"></td>
                    <td width="150" height="18" align="left" valign="middle" class="mem_form01"><INPUT type=password maxLength='20' tabindex='113' name=mb_password id="login_mb_password" itemname="패스워드" style="background-color:transparent; border:0; overflow:hidden; width:143px; height:17px;" class='password_t01' onkeypress="check_capslock(event, 'login_mb_password');"></td>
                    </tr>
                </table>
				<!--//로그인 폼-->				</td>
              </tr>
            </table>
			<!--//로그인 폼 전체-->				
			</td>
              </tr>
            </table>
			<!--회색테두리-->			</td>
          </tr>
          <tr>
            <td height="70" align="left" valign="top"><img src="<?=$member_skin_path?>/img/img_login02.jpg" />
			<!--버튼 테이블 시작-->
			<table border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td height="15" align="right" valign="top"></td>
              </tr>
              <tr>
                <td align="right" valign="top"><a href="javascript:;" onclick="win_password_lost('./password_lost.php');"><img src="<?=$member_skin_path?>/img/btn_lost.gif" width="260" height="17" border="0"></a></td>
              </tr>
              <tr>
                <td height="5" align="right" valign="top"></td>
              </tr>
              <!--tr>
                <td align="right" valign="top"><a href="./register.php?subNum=3"><img src="<?=$member_skin_path?>/img/btn_join.gif" width="260" height="17" border="0" /></a></td>
              </tr-->
            </table>			
			<!--버튼 테이블 끝-->			</td>
          </tr></form>
    </table>		
<!--//로그인-->

</div>
<!-- //Content -->

<script language='Javascript'>
document.flogin.mb_id.focus();

function flogin_submit(f)
{
    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/login_check.php';";
    else
        echo "f.action = '$g4[bbs_path]/login_check.php';";
    ?>

    return true;
}
</script>