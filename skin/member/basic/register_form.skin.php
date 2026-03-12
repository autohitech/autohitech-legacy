<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<?
//==============================================================================
// jquery date picker
//------------------------------------------------------------------------------
// 참고) ie 에서는 년, 월 select box 를 두번씩 클릭해야 하는 오류가 있습니다.
//------------------------------------------------------------------------------
// jquery-ui.css 의 테마를 변경해서 사용할 수 있습니다.
// base, black-tie, blitzer, cupertino, dark-hive, dot-luv, eggplant, excite-bike, flick, hot-sneaks, humanity, le-frog, mint-choc, overcast, pepper-grinder, redmond, smoothness, south-street, start, sunny, swanky-purse, trontastic, ui-darkness, ui-lightness, vader
// 아래 css 는 date picker 의 화면을 맞추는 코드입니다.
?>

<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/base/jquery-ui.css" rel="stylesheet" />
<style type="text/css">
<!--
.ui-datepicker { font:12px dotum; }
.ui-datepicker select.ui-datepicker-month, 
.ui-datepicker select.ui-datepicker-year { width: 70px;}
.ui-datepicker-trigger { margin:0 0 -5px 2px; }
-->
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script>
<script type="text/javascript">
/* Korean initialisation for the jQuery calendar extension. */
/* Written by DaeKwon Kang (ncrash.dk@gmail.com). */
jQuery(function($){
	$.datepicker.regional['ko'] = {
		closeText: '닫기',
		prevText: '이전달',
		nextText: '다음달',
		currentText: '오늘',
		monthNames: ['1월(JAN)','2월(FEB)','3월(MAR)','4월(APR)','5월(MAY)','6월(JUN)',
		'7월(JUL)','8월(AUG)','9월(SEP)','10월(OCT)','11월(NOV)','12월(DEC)'],
		monthNamesShort: ['1월','2월','3월','4월','5월','6월',
		'7월','8월','9월','10월','11월','12월'],
		dayNames: ['일','월','화','수','목','금','토'],
		dayNamesShort: ['일','월','화','수','목','금','토'],
		dayNamesMin: ['일','월','화','수','목','금','토'],
		weekHeader: 'Wk',
		dateFormat: 'yymmdd',
		firstDay: 0,
		isRTL: false,
		showMonthAfterYear: true,
		yearSuffix: ''};
	$.datepicker.setDefaults($.datepicker.regional['ko']);

    $('#mb_birth').datepicker({
        showOn: 'button',
		buttonImage: '<?=$member_skin_path?>/img/calendar.gif',
		buttonImageOnly: true,
        buttonText: "달력",
        changeMonth: true,
		changeYear: true,
        showButtonPanel: true,
        yearRange: 'c-99:c+99',
        maxDate: '+0d'
    }); 
});
</script>
<?
//==============================================================================
?>

<style type="text/css">
<!--
.m_title    { BACKGROUND-COLOR: #F7F7F7; PADDING-LEFT: 15px; PADDING-top: 5px; PADDING-BOTTOM: 5px; }
.m_padding  { PADDING-LEFT: 15px; PADDING-BOTTOM: 5px; PADDING-TOP: 5px; }
.m_padding2 { PADDING-LEFT: 0px; PADDING-top: 5px; PADDING-BOTTOM: 0px; }
.m_padding3 { PADDING-LEFT: 0px; PADDING-top: 5px; PADDING-BOTTOM: 5px; }
-->
</style>

<script>
var member_skin_path = "<?=$member_skin_path?>";
</script>
<script type="text/javascript" src="<?=$member_skin_path?>/ajax_register_form.jquery.js"></script>
<script type="text/javascript" src="<?=$g4[path]?>/js/md5.js"></script>
<script type="text/javascript" src="<?=$g4[path]?>/js/sideview.js"></script>

<form id="fregisterform" name=fregisterform method=post onsubmit="return fregisterform_submit(this);" enctype="multipart/form-data" autocomplete="off">
<input type=hidden name=w                value="<?=$w?>">
<input type=hidden name=url              value="<?=$urlencode?>">
<input type=hidden name=mb_jumin         value="<?=$jumin?>">
<input type=hidden name=mb_id_enabled    value="" id="mb_id_enabled">
<input type=hidden name=mb_nick_enabled  value="" id="mb_nick_enabled">
<input type=hidden name=mb_email_enabled value="" id="mb_email_enabled">
<input type=hidden name=subNum value="" id="2">
<!-- <input type=hidden name=token value="<?=$token?>"> -->

<? if ($w=='u') {$title_member = "title_mypage02.gif";$title_txt = "회원정보수정";  } else {$title_member = "title_member03.gif";$title_txt = "회원가입"; }?>
<!-- Title -->
<div id="titleWrap">
<div class="tit"><img src="../img/title_modify01.gif" /></div>
<div class="navi"><ul><li class="home">홈</li><li>홈페이지관리</li><li class="location">회원정보수정</li></ul></div><? include "../inc/b_font.html";?>
</div>
<!-- //Title -->
<!--? include "../inc/con_fix01.html";?-->

<!-- Content -->
<div class="content">
<!-- 회원가입 폼 -->
<table width="100%" border="0" cellpadding="20" cellspacing="1" bgcolor="ececec">
<tr>
    <td align="center" valign="top" bgcolor="fafafa"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="20" align="left" valign="top"><img src="<?=$member_skin_path?>/img/sub_title03.gif" /></td>
      </tr>
    </table>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="ececec">
      <tr>
        <td width="130" align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">아이디</td>
        <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input maxlength="20" id='reg_mb_id' name="mb_id" style='width:320px; height:15px;' class='ed'  required='required' value="<?=$member[mb_id]?>" <? if ($w=='u') { echo "readonly style='background-color:#dddddd;'"; } ?>
                    <? if ($w=='') { echo "onblur='reg_mb_id_check();'"; } ?> />
            <span id='msg_mb_id'></span>
            <table height="25" cellspacing="0" cellpadding="0" border="0">
              <tr>
                <td align="left" valign="middle" class="mem_t02">※ 영문자, 숫자 만 입력 가능. 최소 3자이상 입력하세요.</td>
              </tr>
            </table></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">패스워드</td>
        <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input type="password" name="mb_password" style='width:98%; height:15px;' class='ed' maxlength="20" <?=($w=="")?"required":"";?> itemname="패스워드" /></td>
      </tr>
      <tr>
        <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">패스워드 확인</td>
        <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input type="password" name="mb_password_re" style='width:98%; height:15px;' class='ed'maxlength="20" <?=($w=="")?"required":"";?> itemname="패스워드 확인" /></td>
      </tr>
      <!-- <tr>
            <TD class=m_title>패스워드 분실시 질문</TD>
            <TD class=m_padding>
                <select name=mb_password_q_select onchange="this.form.mb_password_q.value=this.value;">
                    <option value="">선택하십시오.</option>
                    <option value="내가 좋아하는 캐릭터는?">내가 좋아하는 캐릭터는?</option>
                    <option value="타인이 모르는 자신만의 신체비밀이 있다면?">타인이 모르는 자신만의 신체비밀이 있다면?</option>
                    <option value="자신의 인생 좌우명은?">자신의 인생 좌우명은?</option>
                    <option value="초등학교 때 기억에 남는 짝꿍 이름은?">초등학교 때 기억에 남는 짝꿍 이름은?</option>
                    <option value="유년시절 가장 생각나는 친구 이름은?">유년시절 가장 생각나는 친구 이름은?</option>
                    <option value="가장 기억에 남는 선생님 성함은?">가장 기억에 남는 선생님 성함은?</option>
                    <option value="친구들에게 공개하지 않은 어릴 적 별명이 있다면?">친구들에게 공개하지 않은 어릴 적 별명이 있다면?</option>
                    <option value="다시 태어나면 되고 싶은 것은?">다시 태어나면 되고 싶은 것은?</option>
                    <option value="가장 감명깊게 본 영화는?">가장 감명깊게 본 영화는?</option>
                    <option value="읽은 책 중에서 좋아하는 구절이 있다면?">읽은 책 중에서 좋아하는 구절이 있다면?</option>
                    <option value="기억에 남는 추억의 장소는?">기억에 남는 추억의 장소는?</option>
                    <option value="인상 깊게 읽은 책 이름은?">인상 깊게 읽은 책 이름은?</option>
                    <option value="자신의 보물 제1호는?">자신의 보물 제1호는?</option>
                    <option value="받았던 선물 중 기억에 남는 독특한 선물은?">받았던 선물 중 기억에 남는 독특한 선물은?</option>
                    <option value="자신이 두번째로 존경하는 인물은?">자신이 두번째로 존경하는 인물은?</option>
                    <option value="아버지의 성함은?">아버지의 성함은?</option>
                    <option value="어머니의 성함은?">어머니의 성함은?</option>
                </select>

                <table width="350" border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td class=m_padding2><input class=ed type=text name="mb_password_q" size=55 required itemname="패스워드 분실시 질문" value="<?=$member[mb_password_q]?>"></td>
                </tr>
                </table>
            </TD>
        </TR>
        <tr>
            <TD class=m_title>패스워드 분실시 답변</TD>
            <TD class=m_padding><input class=ed type=text name='mb_password_a' size=38 required itemname='패스워드 분실시 답변' value='<?=$member[mb_password_a]?>'></TD>
        </TR> -->
    </table>


      <table width="100%" height="15" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td></td>
        </tr>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="20" align="left" valign="top"><img src="<?=$member_skin_path?>/img/sub_title04.gif" /></td>
        </tr>
      </table>
      <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="ececec">
        <tr>
          <td width="130" align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">이름</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input name="mb_name" value="<?=$member[mb_name]?>" maxlength="20" itemname="이름" <?=$member[mb_name]?"readonly class=ed2":"class=ed";?> style='width:320px; height:15px;' class='ed' required='required' />
            <? if ($w=='') { echo "(공백없이 한글만 입력 가능)"; } ?>          </td>
        </tr>
        <? if ($member[mb_nick_date] <= date("Y-m-d", $g4[server_time] - ($config[cf_nick_modify] * 86400))) { // 별명수정일이 지났다면 수정가능 ?>
        <input type=hidden name=mb_nick_default value='<?=$member[mb_nick]?>'>
        <tr>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">별명</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02">
            <input type="text" id='reg_mb_nick' name='mb_nick' maxlength="20" value='<?=$member[mb_nick]?>'
                    onblur="reg_mb_nick_check();" style='width:98%; height:15px;' class='ed' required='required' /><span id='msg_mb_nick'></span> <br />
<br>공백없이 한글,영문,숫자만 입력 가능 (한글2자, 영문4자 이상)
                <br>별명을 바꾸시면 앞으로 <?=(int)$config[cf_nick_modify]?>일 이내에는 변경 할 수 없습니다.
            </TD>
        </TR>
        <? } else { ?>
        <input type=hidden name="mb_nick_default" value='<?=$member[mb_nick]?>'>
        <input type=hidden name="mb_nick" value="<?=$member[mb_nick]?>">
        <? } ?>

        <input type=hidden name='old_email' value='<?=$member[mb_email]?>'>
        <tr>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">이메일</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class='mem_t02'>
            <input type="text" id='reg_mb_email' name='mb_email' maxlength="100" value='<?=$member[mb_email]?>'
                    onblur="reg_mb_email_check()" style='width:98%; height:15px;' class='ed' required='required' />
          <span id='msg_mb_email'></span>
              <? if ($config[cf_use_email_certify]) { ?>
              <? if ($w=='') { echo "<br>e-mail 로 발송된 내용을 확인한 후 인증하셔야 회원가입이 완료됩니다."; } ?>
              <? if ($w=='u') { echo "<br>e-mail 주소를 변경하시면 다시 인증하셔야 합니다."; } ?>
              <? } ?>          </td>
        </tr>
        <? if ($w=="") { ?>
        <tr>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">생년월일</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input type="text" id="mb_birth" name='mb_birth' maxlength="8" minlength="8" numeric="numeric" itemname='생년월일' value='<?=$member[mb_birth]?>' readonly="readonly" title='옆의 달력 아이콘을 클릭하여 날짜를 입력하세요.' style='width:320px; height:15px;' class='ed' required='required' /></td>
        </tr>
        <? } ?>
        <? if ($member[mb_sex]) { ?>
        <input type="hidden" name="mb_sex" value='<?=$member[mb_sex]?>' />
        <? } else { ?>
        <tr>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">성별</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><select id="mb_sex" name="select" itemname='성별' style='width:327px; height:17px;' class='ed' required='required'>
            <option value=''>선택하세요 </option>
            <option value='F'>여자 </option>
            <option value='M'>남자 </option>
          </select>
            <script type="text/javascript">//document.getElementById('mb_sex').value='<?=$member[mb_sex]?>';</script>          </td>
        </tr>
        <? } ?>
        <? if ($config[cf_use_homepage]) { ?>
        <tr>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">홈페이지</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input type="text" name='mb_homepage' maxlength="255" <?=$config[cf_req_homepage]?'required':'';?> itemname='홈페이지' value='<?=$member[mb_homepage]?>' style='width:98%; height:15px;' class='ed'/></td>
        </tr>
        <? } ?>
        <? if ($config[cf_use_tel]) { ?>
        <tr>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">전화번호</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input type="text" name='mb_tel' maxlength="20" <?=$config[cf_req_tel]?'required':'';?> itemname='전화번호' value='<?=$member[mb_tel]?>' style='width:98%; height:15px;' class='ed'/></td>
        </tr>
        <? } ?>
        <? if ($config[cf_use_hp]) { ?>
        <tr>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">핸드폰번호</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input type="text" name='mb_hp' maxlength="20" <?=$config[cf_req_hp]?'required':'';?> itemname='핸드폰번호' value='<?=$member[mb_hp]?>' style='width:98%; height:15px;' class='ed'/></td>
        </tr>
        <? } ?>
        <? if ($config[cf_use_addr]) { ?>
        <tr>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">주소</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><table width="100%" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25"><input type="text" name='mb_zip1' maxlength="3" readonly="readonly" <?=$config[cf_req_addr]?'required':'';?> itemname='우편번호 앞자리' value='<?=$member[mb_zip1]?>' style='width:50px; height:15px;' class='ed'/>
                -
                <input type="text" name='mb_zip2' maxlength="3" readonly="readonly" <?=$config[cf_req_addr]?'required':'';?> itemname='우편번호 뒷자리' value='<?=$member[mb_zip2]?>' style='width:50px; height:15px;' class='ed'/>
      <a href="javascript:;" onclick="win_zip('fregisterform', 'mb_zip1', 'mb_zip2', 'mb_addr1', 'mb_addr2');"><img src="<?=$member_skin_path?>/img/btn_post.gif" border="0" align='absmiddle' /></a></td>
            </tr>
            <tr>
              <td height="25" colspan="2"><input type="text" name='mb_addr1' readonly="readonly" <?=$config[cf_req_addr]?'required':'';?> itemname='주소' value='<?=$member[mb_addr1]?>' style='width:98%; height:15px;' class='ed'/></td>
            </tr>
            <tr>
              <td height="25" colspan="2"><input type="text" name='mb_addr2' <?=$config[cf_req_addr]?'required':'';?> itemname='상세주소' value='<?=$member[mb_addr2]?>' style='width:98%; height:15px;' class='ed'/></td>
            </tr>
          </table></td>
        </tr>
        <? } ?>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td height="1" bgcolor="#ffffff"></td>
</tr>
</table>

      <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="ececec">
        <? if ($config[cf_use_signature]) { ?>
        <tr>
          <td width="130" align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">서명</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><textarea name="mb_signature" cols="74" rows="3" class="tx" <?=$config[cf_req_signature]?'required':'';?> itemname='서명' style='width:98%;'><?=$member[mb_signature]?></textarea></td>
        </tr>
        <? } ?>
        <? if ($config[cf_use_profile]) { ?>
        <tr>
          <td width="130" align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">자기소개</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><textarea name="mb_profile" rows="3" class="tx" <?=$config[cf_req_profile]?'required':'';?> itemname='자기 소개' style='width:98%;'><?=$member[mb_profile]?></textarea></td>
        </tr>
        <? } ?>
        <? if ($member[mb_level] >= $config[cf_icon_level]) { ?>
        <tr>
          <td width="130" align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">회원아이콘</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input type="file" name='mb_icon' style='width:98%; height:15px;' class='ed' />
              <table width="100%" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="mem_t02">* 이미지 크기는 가로(
                    <?=$config[cf_member_icon_width]?>
                    픽셀)x세로(
                    <?=$config[cf_member_icon_height]?>
                    픽셀) 이하로 해주세요.<br />
                    &nbsp;&nbsp;(gif만 가능 / 용량:
                    <?=number_format($config[cf_member_icon_size])?>
                    바이트 이하만 등록됩니다.)
                    <? if ($w == "u" && file_exists($mb_icon)) { ?>
                    <br />
                    <img src='<?=$mb_icon?>' align="absmiddle" />
                    <input type="checkbox" name='del_mb_icon' value='1' />
                    삭제
                    <? } ?>                  </td>
                </tr>
              </table></td>
        </tr>
        <? } ?>
        <tr>
          <td width="130" align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">메일링서비스</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input type="checkbox" name="mb_mailling" value='1' <?=($w=='' || $member[mb_mailling])?'checked':'';?> />
            정보 메일을 받겠습니다.</td>
        </tr>
        <tr>
          <td width="130" align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">SMS 수신여부</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input type="checkbox" name="mb_sms" value='1' <?=($w=='' || $member[mb_sms])?'checked':'';?> />
            핸드폰 문자메세지를 받겠습니다.</td>
        </tr>
        <? if ($member[mb_open_date] <= date("Y-m-d", $g4[server_time] - ($config[cf_open_modify] * 86400))) { // 정보공개 수정일이 지났다면 수정가능 ?>
        <input type="hidden" name="mb_open_default" value='<?=$member[mb_open]?>' />
        <tr>
          <td width="130" align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">정보공개</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input type="checkbox" name="mb_open" value='1' <?=($w=='' || $member[mb_open])?'checked':'';?> />
            다른분들이 나의 정보를 볼 수 있도록 합니다. <br />
            &nbsp;&nbsp;&nbsp;&nbsp; 정보공개를 바꾸시면 앞으로
            <?=(int)$config[cf_open_modify]?>일 이내에는 변경이 안됩니다.</td>
        </tr>
        <? } else { ?>
        <input type="hidden" name="mb_open" value="<?=$member[mb_open]?>" />
        <tr>
          <td width="130" align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">정보공개</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"> 정보공개는 수정후
            <?=(int)$config[cf_open_modify]?>일 이내,
            <?=date("Y년 m월 j일", strtotime("$member[mb_open_date] 00:00:00") + ($config[cf_open_modify] * 86400))?>까지는 변경이 안됩니다.<br />
            이렇게 하는 이유는 잦은 정보공개 수정으로 인하여 쪽지를 보낸 후 받지 않는 경우를 막기 위해서 입니다. </td>
        </tr>
        <? } ?>
        <? if ($w == "" && $config[cf_use_recommend]) { ?>
        <tr>
          <td width="130" align="left" valign="middle" bgcolor="#ffffff" class="mem_t01">추천인아이디</td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input type="text" name="mb_recommend" style='width:98%; height:15px;' class='ed' /></td>
        </tr>
        <? } ?>
      </table>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td height="1" bgcolor="#ffffff"></td>
</tr>
</table>

      <table width="100%" border="0" cellpadding="10" cellspacing="1" bgcolor="ececec">
        <tr>
          <td width="130" height="28" align="left" valign="middle" bgcolor="#ffffff" class="mem_t01"><img id='kcaptcha_image'/> </td>
          <td align="left" valign="middle" bgcolor="#ffffff" class="mem_t02"><input type="input" name="wr_key" itemname="자동등록방지" style='border:1px solid; width:180px; height:45px; line-height:45px; background-color:#ffffff;' class="mem_auto"  required="required" />
            &nbsp;&nbsp;왼쪽의 글자를 입력하세요. </td>
        </tr>
      </table>
       </td></tr>
</table>
<!-- //회원가입 폼 -->
<br />
<!-- 버튼 -->
<table width='100%' height="25" border='0' cellpadding='0' cellspacing='0'>
  <tr align='center'>
    <td valign="bottom"><input name="image" type=image accesskey='s' src="<?=$member_skin_path?>/img/btn_mok.gif" border="0" />
      &nbsp; <a href="javascript:history.back();"><img src="<?=$member_skin_path?>/img/btn_reset.gif" border="0" /></a></td>
  </tr>
</table>
<!-- //버튼 -->
</form>
</div>
<!-- //Content -->

<script type="text/javascript" src="<?="$g4[path]/js/jquery.kcaptcha.js"?>"></script>
<script type="text/javascript">
$(function() {
    // 폼의 첫번째 입력박스에 포커스 주기 
    $("#fregisterform :input[type=text]:visible:enabled:first").focus(); 
});

// submit 최종 폼체크
function fregisterform_submit(f) 
{
    // 회원아이디 검사
    if (f.w.value == "") {

        reg_mb_id_check();

        if (document.getElementById('mb_id_enabled').value!='000') {
            alert('회원아이디를 입력하지 않았거나 입력에 오류가 있습니다.');
            document.getElementById('reg_mb_id').select();
            return false;
        }
    }

    if (f.w.value == '') {
        if (f.mb_password.value.length < 3) {
            alert('패스워드를 3글자 이상 입력하십시오.');
            f.mb_password.focus();
            return false;
        }
    }

    if (f.mb_password.value != f.mb_password_re.value) {
        alert('패스워드가 같지 않습니다.');
        f.mb_password_re.focus();
        return false;
    }

    if (f.mb_password.value.length > 0) {
        if (f.mb_password_re.value.length < 3) {
            alert('패스워드를 3글자 이상 입력하십시오.');
            f.mb_password_re.focus();
            return false;
        }
    }

    /*
    if (f.mb_password_q.value.length < 1) {
        alert('패스워드 분실시 질문을 선택하거나 입력하십시오.');
        f.mb_password_q.focus();
        return false;
    }

    if (f.mb_password_a.value.length < 1) {
        alert('패스워드 분실시 답변을 입력하십시오.');
        f.mb_password_a.focus();
        return false;
    }
    */

    // 이름 검사
    if (f.w.value=='') {
        if (f.mb_name.value.length < 1) {
            alert('이름을 입력하십시오.');
            f.mb_name.focus();
            return false;
        }

        var pattern = /([^가-힣\x20])/i; 
        if (pattern.test(f.mb_name.value)) {
            alert('이름은 한글로 입력하십시오.');
            f.mb_name.focus();
            return false;
        }
    }

    // 별명 검사
    if ((f.w.value == "") ||
        (f.w.value == "u" && f.mb_nick.defaultValue != f.mb_nick.value)) {

        reg_mb_nick_check();

        if (document.getElementById('mb_nick_enabled').value!='000') {
            alert('별명을 입력하지 않았거나 입력에 오류가 있습니다.');
            document.getElementById('reg_mb_nick').select();
            return false;
        }
    }

    // E-mail 검사
    if ((f.w.value == "") ||
        (f.w.value == "u" && f.mb_email.defaultValue != f.mb_email.value)) {

        reg_mb_email_check();

        if (document.getElementById('mb_email_enabled').value!='000') {
            alert('E-mail을 입력하지 않았거나 입력에 오류가 있습니다.');
            document.getElementById('reg_mb_email').select();
            return false;
        }

        // 사용할 수 없는 E-mail 도메인
        var domain = prohibit_email_check(f.mb_email.value);
        if (domain) {
            alert("'"+domain+"'은(는) 사용하실 수 없는 메일입니다.");
            document.getElementById('reg_mb_email').focus();
            return false;
        }
    }

    if (typeof(f.mb_birth) != 'undefined') {
        if (f.mb_birth.value.length < 1) {
            alert('달력 버튼을 클릭하여 생일을 입력하여 주십시오.');
            //f.mb_birth.focus();
            return false;
        }

        var todays = <?=date("Ymd", $g4['server_time']);?>;
        // 오늘날짜에서 생일을 빼고 거기서 140000 을 뺀다.
        // 결과가 0 이상의 양수이면 만 14세가 지난것임
        var n = todays - parseInt(f.mb_birth.value) - 140000;
        if (n < 0) {
            alert("만 14세가 지나지 않은 어린이는 정보통신망 이용촉진 및 정보보호 등에 관한 법률\n\n제 31조 1항의 규정에 의하여 법정대리인의 동의를 얻어야 하므로\n\n법정대리인의 이름과 연락처를 '자기소개'란에 별도로 입력하시기 바랍니다.");
            return false;
        }
    }

    if (typeof(f.mb_sex) != 'undefined') {
        if (f.mb_sex.value == '') {
            alert('성별을 선택하여 주십시오.');
            f.mb_sex.focus();
            return false;
        }
    }

    if (typeof f.mb_icon != 'undefined') {
        if (f.mb_icon.value) {
            if (!f.mb_icon.value.toLowerCase().match(/.(gif)$/i)) {
                alert('회원아이콘이 gif 파일이 아닙니다.');
                f.mb_icon.focus();
                return false;
            }
        }
    }

    if (typeof(f.mb_recommend) != 'undefined') {
        if (f.mb_id.value == f.mb_recommend.value) {
            alert('본인을 추천할 수 없습니다.');
            f.mb_recommend.focus();
            return false;
        }
    }

    if (!check_kcaptcha(f.wr_key)) {
        return false;
    }

    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/register_form_update.php';";
    else
        echo "f.action = './register_form_update.php';";
    ?>

    // 보안인증관련 코드로 반드시 포함되어야 합니다.
    set_cookie("<?=md5($token)?>", "<?=base64_encode($token)?>", 1, "<?=$g4['cookie_domain']?>");

    return true;
}

// 금지 메일 도메인 검사
function prohibit_email_check(email)
{
    email = email.toLowerCase();

    var prohibit_email = "<?=trim(strtolower(preg_replace("/(\r\n|\r|\n)/", ",", $config[cf_prohibit_email])));?>";
    var s = prohibit_email.split(",");
    var tmp = email.split("@");
    var domain = tmp[tmp.length - 1]; // 메일 도메인만 얻는다

    for (i=0; i<s.length; i++) {
        if (s[i] == domain)
            return domain;
    }
    return "";
}
</script>
