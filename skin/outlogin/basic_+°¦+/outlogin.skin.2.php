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

/* 로그인 시작*/
#outlogin_login_input{
	border-top:1px #EEE6E3 solid;
	border-bottom:1px #EEE6E3 solid;
}
/* 로그인 끝 */

</style>
<?
// 회원가입후 몇일째인지? + 1 은 당일을 포함한다는 뜻
$sql = " select (TO_DAYS('$g4[time_ymdhis]') - TO_DAYS('$member[mb_datetime]') + 1) as day ";
$row = sql_fetch($sql);
$mb_reg_after = number_format($row[day]);
?>
<table border="0" cellpadding="0" cellspacing="0" width="100%" id="outlogin_box">
	<tr>
		<td width="3" height="3"><img src="<?=$outlogin_skin_path?>/img/box_top_left.gif"></td>
		<td height="3" bgcolor="#F1DAD0"></td>
		<td width="3" height="3"><img src="<?=$outlogin_skin_path?>/img/box_top_right.gif"></td>
	</tr>
	<tr>
		<td width="3" bgcolor="#F1DAD0"></td>
		<td valign="top" bgcolor="#FFF8ED" width="" align="center">
			<form name="fhead" method="post" action="javascript:fhead_submit(document.fhead);" autocomplete="off" style="display:inline;">
			<input type="hidden" name="url" value="<?=$url?>">
			<table border="0" cellpadding="0" cellspacing="0" width="90%" id="outlogin_login_title">
				<tr>
					<td height="21" align="left" valign="bottom"><font color="#B77E6A"><strong><?=$member[mb_name];?></strong></font> <font>님 환영합니다.</font><? if ($is_admin == "super" || $is_auth) { ?><a href="<?=$g4['admin_path']?>/"><img src="<?=$outlogin_skin_path?>/img/admin_btn.gif" border="0" align="absmiddle"></a><? } ?></th>
				</tr>
				<tr>
					<td height="60" valign="middle">
						<table border="0" cellpadding="0" cellspacing="0" width="100%" id="outlogin_login_input">
							<tr>
								<td width="60" align="left" height="20"><font color="#B77E6A"><strong>쪽지:</strong></font>: <a href="javascript:win_memo();"><font><?=$memo_not_read;?></font></a></td>
								<td align="left"><font color="#B77E6A"><strong>포인트:</strong></font>: <a href="javascript:win_point();"><font><?=$point;?></font></a></td>
							</tr>
							<tr>
								<td width="60" align="left" height="20"><font color="#B77E6A"><strong>권한:</strong></font>: <font><?=$member[mb_level];?></font></td>
								<td align="left"><font color="#B77E6A"><strong>가입일:</strong></font>: <font><?=$mb_reg_after;?> 일</font></td>
							</tr>
							<tr>
								<td height="5"></td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			<table border="0" cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<td align="center" valign="bottom">
						<a href="javascript:win_scrap();"><font color="#B77E6A">스크랩</font></a>
						<font color="#B47E64">|</font>
						<a href="<?=$g4['bbs_path']?>/member_confirm.php?url=register_form.php"><font color="#B47E64">정보수정</font></a>
						<font color="#B47E64">|</font>
						<a href="<?=$g4['bbs_path']?>/logout.php"><font color="#B47E64">로그아웃</font></a>
					</td>
				</tr>
				<tr>
					<td height="5"></td>
				</tr>
			</table>
			</form>
		</td>
		<td width="3" bgcolor="#F1DAD0"></td>
	</tr>
	<tr>
		<td width="3" height="3"><img src="<?=$outlogin_skin_path?>/img/box_bottom_left.gif"></td>
		<td height="3" bgcolor="#F1DAD0"></td>
		<td width="3" height="3"><img src="<?=$outlogin_skin_path?>/img/box_bottom_right.gif"></td>
	</tr>
</table>
