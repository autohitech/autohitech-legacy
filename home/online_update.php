<?
include_once("./_common.php");
include_once("$g4[path]/lib/mailer.lib.php");

// 리퍼러 체크
referer_check();

if(!$config[cf_online_skin]){
	$config[cf_online_skin] = "basic";
}

if(!$ol_name)
	alert("성명을 입력해주세요");
if(!$ol_email)
	alert("이메일을 입력해주세요");

$ol_name = trim(strip_tags($_POST[ol_name]));
$ol_email = trim(strip_tags($_POST[ol_email]));
$ol_tel = trim(strip_tags($_POST[ol_tel]));
$ol_hp = trim(strip_tags($_POST[ol_hp]));
$addr2 = strip_tags($_POST[addr2]);
$ol_memo = strip_tags($_POST[ol_memo]);
$ol_1 = strip_tags($_POST[ol_1]);
$ol_2 = strip_tags($_POST[ol_2]);
$ol_3 = strip_tags($_POST[ol_3]);
$ol_4 = strip_tags($_POST[ol_4]);
$ol_5 = strip_tags($_POST[ol_5]);
$ol_6 = strip_tags($_POST[ol_6]);
$ol_7 = strip_tags($_POST[ol_7]);
$ol_8 = strip_tags($_POST[ol_8]);
$ol_9 = strip_tags($_POST[ol_9]);
$ol_10 = strip_tags($_POST[ol_10]);


$sql = " insert into $g4[online_table]
			set ol_kind         = '$ol_kind',
				ol_name         = '$ol_name',
				ol_email   = '$ol_email',
				ol_tel   = '$ol_tel',
				ol_hp     = '$ol_hp',
				ol_zip1          = '$zip1',
				ol_zip2         = '$zip2',
				ol_addr1        = '$addr1',
				ol_addr2     = '$addr2',
				ol_datetime    = '$g4[time_ymdhis]',
				ol_ip      = '$_SERVER[REMOTE_ADDR]',
				ol_memo      = '$ol_memo',
				ol_1            = '$ol_1',
				ol_2            = '$ol_2',
				ol_3            = '$ol_3',
				ol_4            = '$ol_4',
				ol_5            = '$ol_5',
				ol_6            = '$ol_6',
				ol_7            = '$ol_7',
				ol_8            = '$ol_8',
				ol_9            = '$ol_9',
				ol_10           = '$ol_10' ";
$result = sql_query($sql);

if (!$result)
	alert("실패하였습니다. \\n 올바른 형식으로 입력해주세요");


/* 메일보내기 시작 */
// 관리자님 회원정보

$admin = get_admin('super');

$subject = "관리자님 온라인 문의가 접수 되었습니다.";
ob_start();
include_once ("./online_update_mail.php");
$ol_memo = ob_get_contents();
ob_end_clean();

mailer($admin[mb_nick], $ol_email, $admin[mb_email], $subject, $ol_memo, 1);

/* 메일보내기 끝 */

 echo "<script language='javascript'>alert('성공적으로 접수되었습니다. 감사합니다.');self.close();</script>";

?>
