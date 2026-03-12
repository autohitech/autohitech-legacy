<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<form name=f_scrap_popin method=post action="./scrap_popin_update.php">
  <input type="hidden" name="bo_table" value="<?=$bo_table?>">
  <input type="hidden" name="wr_id" value="<?=$wr_id?>">
  <table width="600" border="0" cellpadding="0" cellspacing="3" bgcolor="#2a3346">
  <tr>
    <td align="left" valign="top" bgcolor="#FFFFFF">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td align="left" valign="top" height="45" background="<?=$member_skin_path?>/img/bar_scrap.jpg"></td>
        </tr>
		<tr>
          <td align="left" valign="top" height="10"></td>
        </tr>
        <tr>
          <td align="center" valign="top">
		  
		  <table width="95%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="4" align="left" valign="top" background="<?=$member_skin_path?>/img/table_line_P.gif"></td>
              </tr>
            </table>
            <table width="95%" border="0" cellpadding="5" cellspacing="1" bgcolor="#e7e7e7">
              <tr>
                <td width="100" height="27" align="center" valign="middle" bgcolor="f4f4f4" class="my_scrap">제 목</td>
                <td align="left" valign="middle" bgcolor="#FFFFFF" style='word-break:break-all; padding-left:10px;'><?=get_text(cut_str($write[wr_subject], 255))?></td>
              </tr>
            </table>
            <!--버튼 테이블 시작-->
            <table width='95%' height="55" border='0' align='center' cellpadding='0' cellspacing='0'>
              <tr>
                <td valign="middle"><INPUT type=image src="<?=$member_skin_path?>/img/btn_ok01.gif" border=0></td>
              </tr>
            </table>
            <!--버튼 테이블 끝-->
          </td>
        </tr>
      </table>
</td>
        </tr>
      </table>
</form>
