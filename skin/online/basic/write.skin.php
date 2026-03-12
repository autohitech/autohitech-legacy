<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

if($_GET[ol_kind]) {
$img_bar = "bar_inquiry01.jpg";
$title_form = "  <tr>
    <td width='110' height='33' align='center' valign='middle' bgcolor='f5f5f5' style='color:#777; font-weight:bold;'>제&nbsp;&nbsp;목</td>
    <td colspan='3' align='left' valign='middle' style='padding:0px 10px 0px 15px;'>$_GET[ol_kind]<input name='ol_kind' value='$_GET[ol_kind]' type=hidden></td>
  </tr>";
} else {
$img_bar = "bar_inquiry01.jpg";
$title_form = "  <tr>
    <td width='110' height='33' align='center' valign='middle' bgcolor='f5f5f5' style='color:#777; font-weight:bold;'>제&nbsp;&nbsp;목</td>
    <td colspan='3' align='left' valign='middle' style='padding:0px 10px 0px 15px;'><input name='ol_kind' value='$_GET[ol_kind]' type=text style='width:99%;'></td>
  </tr>";

}
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../inc/a.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="online" method="post" action="javascript:online_submit(document.online);" enctype="multipart/form-data" autocomplete="off">

<table width="650" height="400" border="0" cellpadding="0" cellspacing="3" bgcolor="#2a3346">
<tr><td align="center" valign="top" bgcolor="#ffffff">
  <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
<tr>
  <td align="left" valign='top'><a href="javascript:window.close();"><img src="<?=$online_skin_path;?>/img/<?=$img_bar;?>" border="0" /></a></td>
</tr>
<tr>
    <td align="left" valign='top' bgcolor='#f3f3f3' style='padding:7px 7px 7px 15px; color:#777777; font-size:11px;'><img src='<?=$online_skin_path;?>/img/icon_txt.gif' align='absmiddle' />궁금한 점이 있으신 분은 아래란을 빠짐없이 작성해 주시기 바랍니다.</td>
  </tr>
</table>
<br>

<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
    <td height='2' colspan='4' bgcolor='a3a3a3'></td>
  </tr>
<?=$title_form;?>
<tr>
    <td height="1" colspan="4" bgcolor="e0e0e0"></td>
  </tr>
  <tr>
    <td width='110' height='33' align='center' valign='middle' bgcolor='f5f5f5' style='color:#777; font-weight:bold;'>이&nbsp;&nbsp;름</td>
    <td align='left' valign='middle' style='padding:0px 10px 0px 15px;'><input name="ol_name" required itemname="이름" type=text style='width:150px;'></td>
    <td width='105' height='33' align='center' valign='middle' bgcolor='f5f5f5' style='color:#777; font-weight:bold;'>전화번호</td>
    <td align='left' valign='middle' style='padding:0px 10px 0px 15px;'><input name="ol_tel" itemname="전화번호"  type=text style='width:177px;'></td>
    </tr>
  <tr>
    <td height="1" colspan="4" bgcolor="e0e0e0"></td>
  </tr>
  <tr>
    <td width='110' height='33' align='center' valign='middle' bgcolor='f5f5f5' style='color:#777; font-weight:bold;'>이메일</td>
    <td colspan='3' align='left' valign='middle' style='padding:0px 10px 0px 15px;'><input type=text size=78 name="ol_email" required email itemname="이메일" style='width:99%;'></td>
    </tr>
<tr>
    <td height="1" colspan="4" bgcolor="e0e0e0"></td>
  </tr>
  <tr>
    <td width='110' height='33' align='center' valign='middle' bgcolor='f5f5f5' style='color:#777; font-weight:bold;'>내&nbsp;&nbsp;용</td>
    <td colspan="3" align='left' valign='middle' style='padding:7px 10px 7px 15px;'><textarea name="ol_memo" itemname="메모" rows='8' cols='80' style='width:99%; font-size:11px;'></textarea></td>
    </tr>
<tr>
    <td height="2" colspan="4" bgcolor="e0e0e0"></td>
  </tr>
 </table>
<table width="100%" height="50" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center" valign="middle"><input name="image" type="image" src="<?=$online_skin_path;?>/img/btn_inquiry.gif" style="width:70px; height:20px; border:0;" /><a href="javascript:window.close();"><img src="<?=$online_skin_path;?>/img/btn_cancel.gif" border="0" style="padding:2px 0px 0px 7px;" /></a></td>
            </tr>
      </table>
		  </td>
</tr></table></form>
</body>
</html>

<script>
<!-- 본문 끝 -->
function online_submit(f)
{
    f.action = './online_update.php';
    f.submit();
}
</script>