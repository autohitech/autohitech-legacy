<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<!-- 인기검색어 시작 -->
<table width=100% cellpadding=0 cellspacing=0>
<tr>
    <td width=1 height="35"><img src='<?=$popular_skin_path?>/img/popular_box_left.gif'></td>
    <td width='100%' background='<?=$popular_skin_path?>/img/popular_box_bg.gif'>&nbsp;&nbsp;<strong>최근 <font style="font-size:13pt;color:#B1150F;"><?=$date_cnt;?></font> 일간 인기검색어</strong></td>
    <td width=1><img src='<?=$popular_skin_path?>/img/popular_box_right.gif'></td>
</tr>
</table>
<table width=100% cellpadding=0 cellspacing=0>
<tr>
    <td align=center height="100%" style="border-left:1px #cccccc solid;border-right:1px #cccccc solid;border-bottom:1px #cccccc solid;" valign="top">
        <table  cellpadding=0 cellspacing=0 width="100%">
		<tr>
			<td height="10" colspan="2"></td>
		</tr>
<? for ($i=0; $i<count($list); $i++) { ?>
        <tr>
            <td>&nbsp;&nbsp;<img src='<?=$popular_skin_path?>/img/no_<?=$i;?>.gif'>&nbsp;&nbsp;<?="<a href='$g4[bbs_path]/search.php?sfl=wr_subject&sop=and&stx=".urlencode($list[$i][pp_word])."'>{$list[$i][pp_word]}</a>";?>
			</td>
			<td align="right">
				<font style="font-size:8pt;"><?=$list[$i][cnt];?></font>&nbsp;&nbsp;<img src='<?=$popular_skin_path?>/img/arrow.gif'>&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
		<tr>
			<td height="6" colspan="2"></td>
		</tr>
<? } ?>
<? if (count($list) == 0) { ?><tr><td align=center height=100 valign="middle" colspan="2"><font color=#6A6A6A>인기검색어가 없습니다.</a></td></tr><? } ?>
        </table></td>
</tr>
</table>
