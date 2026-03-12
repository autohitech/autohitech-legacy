<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<!-- 포인트순위 시작 -->
<table width=100% cellpadding=0 cellspacing=0>
<tr>
    <td width=1 height="35"><img src='<?=$po_latest_skin_path?>/img/po_box_left.gif'></td>
    <td width='100%' background='<?=$po_latest_skin_path?>/img/po_box_bg.gif'>&nbsp;&nbsp;<a href="<?=$g4[path];?>/bbs/company_point.php"><strong><font style="font-size:13pt;color:#B1150F;"><?=$interval;?></font> 일간 포인트 Top <?=$rows;?></strong></a></td>
    <td width=1><img src='<?=$po_latest_skin_path?>/img/po_box_right.gif'></td>
</tr>
</table>
<table width=100% cellpadding=0 cellspacing=0>
<tr>
    <td align=center height="100%" style="border-left:1px #cccccc solid;border-right:1px #cccccc solid;border-bottom:1px #cccccc solid;" valign="top">
        <table  cellpadding=0 cellspacing=0 width="100%">
		<tr>
			<td height="10" colspan="3"></td>
		</tr>
<? for ($i=0; $i<count($list); $i++) { ?>
        <tr>
            <td>&nbsp;&nbsp;<?=$i + 1;?> 위</a>
			</td>
            <td>&nbsp;&nbsp;<span style="cursor:hand;" onClick="showSideView(this, '<?=$list[$i][mb_id];?>', '<?=$list[$i][mb_name];?>', '<?=$list[$i][mb_email];?>', '<?=$list[$i][mb_homepage];?>');"><?=$list[$i][mb_nick];?></span>
			</td>
			<td align="right" width="100">
				<font style="font-size:8pt;"><?=number_format($list[$i][point]);?> Point&nbsp;&nbsp;</font>
			</td>
		</tr>
		<tr>
			<td height="6" colspan="3"></td>
		</tr>
<? } ?>
<? if (count($list) == 0) { ?><tr><td align=center height=100 valign="middle" colspan="3"><font color=#6A6A6A>포인트순위이가 없습니다.</a></td></tr><? } ?>
        </table>
	</td>
</tr>
</table>
