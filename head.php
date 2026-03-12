<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once("$g4[path]/head.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
//include_once("$g4[path]/lib/poll.lib.php");
//include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");
include_once("$g4[path]/lib/thumb.lib.php");
include_once("$g4[path]/_menu.php");


if ($member[mb_id])
{

if(!$group[gr_id]) {$group[gr_id] = "Member";}
?>
<?include_once("$show_top_menu");?>


<!-- Container Wrap -->
<div id="contWrap">
  <?include_once("$show_left_menu");?>
<script language="JavaScript"> 
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function memberLeave() {
  if (confirm("정말 회원에서 탈퇴 하시겠습니까?")) 
    location.href = "/home/member_leave.php";
}
</script>
    <?
} else {
?>
<?include_once("$show_top_menu");?>

<!-- Container Wrap -->
<div id="contWrap">
  <?include_once("$show_left_menu");?>
<?}?>
