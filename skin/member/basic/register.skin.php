<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<script type="text/JavaScript">
<!--



function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<!-- Title -->
	<table border="0" cellpadding="0" cellspacing="0" class="bg_title">
      <tr>
        <td height="25" align="left" valign="top" class="title_Tt"><table border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="left" valign="top"><img src="/img/title_member03.gif" /></td>
              <td align="left" valign="bottom"><img src="/img/title_text01.gif" /></td>
            </tr>
        </table></td>
        <td align="right" valign="top" class="navi_PD"><table border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td align="right" valign="bottom"><img src="/img/navi_home.gif" /><span class="navi_t01">홈</span><img src="/img/navi_icon.gif" /><span class="navi_t02">회원가입</span></td>
              <td align="right" valign="middle"><!--? include "/inc/b_font.html";?--></td>
            </tr>
        </table></td>
      </tr>
    </table>
	<!-- //Title -->
<form name="fregister" method="POST" onSubmit="return fregister_submit(this);" autocomplete="off">
  <!--이용약관-->
  <table width="100%" border="0" cellpadding="20" cellspacing="1" bgcolor="ececec">
    <tr>
      <td align="center" valign="top" bgcolor="fafafa"><table width="100%" height="20" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height="20" align="left" valign="top"><img src="<?=$member_skin_path?>/img/sub_title01.gif" /></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="T_provision"><textarea name="textarea" class="T_provision" readonly="readonly" style="width:685px; height:210px; padding:10px;"><?=get_text($config[cf_stipulation])?>
            </textarea></td>
          </tr>
          <tr>
            <td height="25" align="right" valign="bottom" class="T_provision"><input type="checkbox" value="1" name="agree" id="agree" /><label for="agree">회원가입약관을 읽었으며 내용에 동의합니다.</label></td>
          </tr>
        </table>
        <table width="100%" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td height='20' align="left" valign="top"><img src="<?=$member_skin_path?>/img/sub_title02.gif"></td>
          </tr>
          <tr>
            <td align="left" valign="top" class="T_provision"><textarea class="T_provision" style="width:685px; height:205px; padding:10px;" readonly><?=get_text($config[cf_privacy])?>
</textarea></td>
          </tr>
          <tr>
            <td height=25 align="right" valign="bottom" class="T_provision"><input type=checkbox value=1 name=agree2 id=agree2><label for=agree2>개인정보취급방침을 읽었으며 내용에 동의합니다.</label></td>
          </tr>
        </table>
</td>
    </tr>
  </table><br>
  <!--버튼 테이블 시작-->
  <table width='710' height="25" border='0' cellpadding='0' cellspacing='0'>
    <tr align='center'>
      <td valign="bottom"><input type=image  src="<?=$member_skin_path?>/img/btn_mjoin.gif" border=0>
        &nbsp; <a href="javascript:history.back();"><img src="<?=$member_skin_path?>/img/btn_mback.gif" border="0" /></a></td>
    </tr>
  </table>
  <!--버튼 테이블 끝-->
  <br>
</form>
<script language="javascript">
function fregister_submit(f) {
/*
    if (!f.agree.checked) {
        alert("회원가입약관의 내용에 동의해야 회원가입 하실 수 있습니다.");
        f.agree.focus();
        return false;
    }

    if (!f.agree2.checked) {
        alert("개인정보취급방침의 내용에 동의해야 회원가입 하실 수 있습니다.");
        f.agree2.focus();
        return false;
    }
*/
    f.action = "./register_form.php?subNum=3";
    return true;
}

if (typeof(document.fregister.mb_name) != "undefined")
    document.fregister.mb_name.focus();
</script>
