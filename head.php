<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once("$g4[path]/head.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");
include_once("$g4[path]/lib/thumb.lib.php");
include_once("$g4[path]/_menu.php");

// top_*.html 파일들에서 이미 contWrap과 container를 열어줍니다.
include_once("$show_top_menu");

// 좌측 메뉴 출력
include_once("$show_left_menu");

if ($member['mb_id']) {
    if(!$group['gr_id']) { $group['gr_id'] = "Member"; }
?>
<script language="JavaScript"> 
function memberLeave() {
  if (confirm("정말 회원에서 탈퇴 하시겠습니까?")) 
    location.href = "/home/member_leave.php";
}
</script>
<?}?>
