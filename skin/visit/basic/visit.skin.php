<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

global $is_admin;
?>
<style>
.vtcs { height:30; padding-right:20; font-size:11px; text-align:right; font-family:tahoma; color:#757575; }
</style>

<table width=100% cellpadding=0 cellspacing=0>
<tr>
    <td width=1 height="35"><img src='<?=$visit_skin_path?>/img/po_box_left.gif'></td>
    <td width='50%' background='<?=$visit_skin_path?>/img/po_box_bg.gif'>&nbsp;&nbsp;<strong>방문자 현황</strong></td>
    <td width='50%' align="right" background='<?=$visit_skin_path?>/img/po_box_bg.gif'><? if ($is_admin == "super") { ?><a href="<?=$g4['admin_path']?>/visit_list.php"><img src="<?=$visit_skin_path?>/img/admin.gif" border="0" align="absmiddle"></a><?}?></td>
    <td width=1><img src='<?=$visit_skin_path?>/img/po_box_right.gif'></td>
</tr>
</table>


<table width=100% cellpadding=0 cellspacing=0>
<tr>
    <td align=center height="100%" style="border-left:1px #cccccc solid;border-right:1px #cccccc solid;border-bottom:1px #cccccc solid;" valign="top">
        <table  cellpadding=0 cellspacing=0 width="100%">
        <tr><td align=center height=50 valign="middle">
          <table width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="50"><img src="<?=$visit_skin_path?>/img/visit_1.gif"></td>
              <td class="vtcs"><?=number_format($visit[1])?></td>
              <td width="50"><img src="<?=$visit_skin_path?>/img/visit_2.gif"></td>
              <td class="vtcs"><?=number_format($visit[2])?></td>
            </tr>
            <tr>
              <td><img src="<?=$visit_skin_path?>/img/visit_3.gif"></td>
              <td class="vtcs"><?=number_format($visit[3])?></td>
              <td><img src="<?=$visit_skin_path?>/img/visit_4.gif"></td>
              <td class="vtcs"><?=number_format($visit[4])?></td>
            </tr>
          </table></td></tr>
        </table>
	</td>
</tr>
</table>
