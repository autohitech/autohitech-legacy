<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

if($_GET[ol_kind]) {
$img_bar = "bar_inquiry01.jpg";
$title_form = "  <tr>
    <td width='100' height='30' align='center' valign='middle' class='inquiry_t02'>Products</td>
    <td align='left' valign='middle'  class='inquiry_Tt01'>$_GET[ol_kind]<input name='ol_kind' value='$_GET[ol_kind]' type=hidden></td>
  </tr>";
} else {
$img_bar = "bar_inquiry02.jpg";
$title_form = "  <tr>
    <td width='100' height='30' align='center' valign='middle' class='inquiry_t02'>Products</td>
    <td align='left' valign='middle'  class='inquiry_Tt01'><input name='ol_kind' value='$_GET[ol_kind]' type=text style='width:98%;'></td>
  </tr>";

}
?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr" />
<link href="/eng/inc/a.css" rel="stylesheet" type="text/css">
</head>

<body>
<form name="online" method="post" action="javascript:online_submit(document.online);" enctype="multipart/form-data" autocomplete="off">

<table width="710" height="410" border="0" cellpadding="0" cellspacing="5" bgcolor="c82f50">
<tr><td align="center" valign="top" bgcolor="#FFFFFF">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="60" valign="top"><img src="<?=$online_skin_path;?>/img/<?=$img_bar;?>" width="700" height="60" ></td>
  </tr>
 </table>
  <table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
<tr>
    <td height="20" align="left" valign='top' bgcolor='#FFFFFF' style='padding:0px 0px 5px 10px;' class="inquiry_t01"><img src='/eng/company/img/icon01.gif' align='absmiddle'>If you have any questions, please fill out the following column.</td>
  </tr>
</table>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
 <tr>
    <td height='4' colspan='2' background="/eng/company/img/table_line_V.gif"></td>
  </tr>

<?=$title_form;?>

  <tr>
    <td height="1" colspan="2" bgcolor="e7e7e7" class="inquiry_t02"></td>
  </tr>
  <tr>
    <td height="30" align="center" valign="middle" bgcolor="f4f4f4" class="inquiry_t02">Name</td>
    <td align="left" valign="middle" bgcolor="f4f4f4" class="inquiry_t02"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><input name="ol_name" required itemname="Name" type=text style='width:98%;'></td>
        <td width="100" align="center" valign="middle" class="inquiry_t02">Phone</td>
        <td><input name="ol_tel" itemname="Phone"  type=text style='width:95%;'></td>
      </tr>
    </table> </td>
  </tr>
  <tr>
    <td height="1" colspan="2" bgcolor="e7e7e7" class="inquiry_t02"></td>
  </tr>
  <tr>
    <td height="28" align="center" valign="middle" class="inquiry_t02">E-mail</td>
    <td align="left" valign="middle" class="inquiry_t02"><input type=text size=78 name="ol_email" required email itemname="E-mail" style='width:98%;'></td>
  </tr>
  <tr>
    <td height="1" colspan="2" bgcolor="e7e7e7" class="inquiry_t02"></td>
  </tr>
  <tr>
    <td align="center" valign="middle" class="inquiry_t02">Content</td>
    <td align="left" valign="middle" class="inquiry_t02" style="padding:10px 0px 10px 0px;"><textarea name="ol_memo" itemname="Content" rows='8' cols='80' style='width:98%;'></textarea></td>
  </tr>
  <tr>
    <td height="2" colspan="2" bgcolor="e7e7e7"></td>
  </tr>
 </table>
<table width="100%" height="50" border="0" cellpadding="0" cellspacing="0">
            <tr>
              <td align="center" valign="middle"><input name="image" type="image" src="/eng/company/img/btn_inquiry.gif" border="0" />
              &nbsp; <a href="javascript:window.close();"><img src="/eng/company/img/btn_cancel.gif" border="0" /></a></td>
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
