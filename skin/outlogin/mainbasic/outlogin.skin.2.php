<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

?>

<style>
/* 공통 적용 */
#outlogin_box font{
	font-size:8pt;
	letter-spacing:-1px;
	color:#B77E6A;
}


</style>
<script language="JavaScript"> 
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function memberLeave() {
  if (confirm("정말 회원에서 탈퇴 하시겠습니까?")) 
    location.href = "/home/member_confirm.php?url=member_leave.php";
}
</script>
 

<?
// 회원가입후 몇일째인지? + 1 은 당일을 포함한다는 뜻
$sql = " select (TO_DAYS('$g4[time_ymdhis]') - TO_DAYS('$member[mb_datetime]') + 1) as day ";
$row = sql_fetch($sql);
$mb_reg_after = number_format($row[day]);
?>
<table width="210" height="135" border="0" cellpadding="0" cellspacing="0">
 <tr>
    <td height="23" align="left" valign="top"><img src="<?=$outlogin_skin_path?>/img/login_title01.gif" /></td>
  </tr>
  <tr>
   <td height="1" align="left" valign="top" bgcolor="dcdcdc"></td>
  </tr><tr>
    <td align="center" valign="bottom">
	
	<form name="fhead" method="post" action="javascript:fhead_submit(document.fhead);" autocomplete="off" style="display:inline;">
			<input type="hidden" name="url" value="<?=$url?>">
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td height="30" align="center" valign="middle"><img src="<?=$outlogin_skin_path?>/img/admin_img.gif" vspace="5" align="absmiddle"/><font color="00928e"><b><u><?=$member[mb_name];?></u></b></font> <span class="login_t01">님 환영합니다.</span><? if ($is_admin == "super" || $is_auth) { ?><br />
					  <a href="<?=$g4['admin_path']?>/" class="login">[관리자페이지바로가기]</a>

<? } ?></td>				</tr>
				<tr>
				  <td align="right" valign="bottom">
						<table width="210" height="42" border="0" cellpadding="0" cellspacing="0" bgcolor="f0f0f0">
							<tr>
								<td height="20" align="left" valign="middle" style="padding-left:10;">쪽지 : <a href="javascript:win_memo();"><?=$memo_not_read;?></a></td>
								<td align="left" valign="middle">포인트 : <a href="javascript:win_point();"><?=$point;?></a></td>
							</tr>
							<tr>
								<td height="20" align="left" valign="middle" style="padding-left:10;">권한 : <?=$member[mb_level];?></td>
								<td align="left" valign="middle">가입일 : <?=$mb_reg_after;?> 일</td>
							</tr>
				  </table>				  </td>
				</tr>
				<tr>
				  <td height="5" align="right" valign="middle"></td>
			  </tr>
  </table>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
  </table>
    </form>
	
	</td>
    </tr>
  <tr>
   <td height="1" bgcolor="dcdcdc"></td>
  </tr>
            
  <tr>
    <td height="28" align="left" valign="middle"><a href="javascript:win_scrap();" class="login">스크랩북</a> <span class="login_line">|</span> <a href="<?=$g4['bbs_path']?>/member_confirm.php?url=register_form.php" class="login">정보수정</a> <span class="login_line">|</span> <a href="<?=$g4['bbs_path']?>/logout.php" class="login">로그아웃</a> <span class="login_line">|</span> <a href="javascript:memberLeave();" target="" class="login">회원탈퇴</a></td>
  </tr>
  <tr>
   <td height="1" bgcolor="dcdcdc"></td>
  </tr>
            
</table>
