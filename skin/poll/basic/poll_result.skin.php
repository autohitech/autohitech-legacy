<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<table width="100%" cellspacing="0" cellpadding="0" align="center" style="border:10px solid #000000;padding:10px 10px 10px 10px;">
	<tr>
		<td>

			<table width="100%" cellspacing="0" cellpadding="0" style="border:2px solid #e1e1e1;">
				<tr>
					<td height="40" width="" bgcolor="f7f7f7" style="padding:0 0 0 20px;"><span style="font-size:12px;letter-spacing:-1;font-weight:bold;color:000000;">설문 : <?=$po_subject?></span><span style="font-size:11px;color:666666;"> (전체 <?=$nf_total_po_cnt?>표)</span>
					</td>
				</tr>
			</table>

			<div style="height:10px;"><!-- --></div>
			<div style="background-color:#ff0066;width:100%;height:2px;"><!-- --></div>
			<div style="height:10px;"><!-- --></div>

			<table width=100% cellpadding=2 cellspacing=0>
				<? for ($i=1; $i<=count($list); $i++) { ?>
				<tr bgcolor=#FFFFFF>
					<td width=""><span style="font-size:12px;letter-spacing:-1;font-weight:bold;color:000000;"><?=$list[$i][num]?>. <?=$list[$i][content]?></span></td>
					<td width="175" bgcolor="#f7f7f7"><img src="<?=$g4[bbs_img_path]?>/poll_graph_y.gif" width="<?=(int)$list[$i][bar]?>" height="7"></td>
					<td width="121"><span style="font-size:11px;letter-spacing:-1;color:000000;"><?=$list[$i][cnt]?>표 (<?=number_format($list[$i][rate], 1)?>%)</span></td>
				</tr>
				<tr>
					<td colspan="3">
					<div style="height:2px;"><!-- --></div>
					<div style="background-color:#e1e1e1;width:100%;height:1px;"><!-- --></div>
					<div style="height:2px;"><!-- --></div>
					</td>
				</tr>
				<? } ?>
				<tr>
					<td colspan="3">
					<div style="height:2px;"><!-- --></div>
					<div style="background-color:#ff0066;width:100%;height:2px;"><!-- --></div>
					<div style="height:2px;"><!-- --></div>
					</td>
				</tr>
				<tr>
					<td height="10" colspan="3"><!-- --></td>
				</tr>
			</table>

			
<? if ($is_etc) { ?>

    <? if ($member[mb_level] >= $po[po_level]) { ?>
        <table width=100% cellpadding=0 cellspacing=0>
        <form name="fpollresult" method="post" action="javascript:fpollresult_submit(document.fpollresult);" autocomplete="off">
        <input type=hidden name=po_id value="<?=$po_id?>">
        <input type=hidden name=w value="">
        <tr> 
            <td>
				<table width=100% cellpadding=4>
					<tr>
						<td style="padding:0 0 0 0px;"><span style="font-size:12px;letter-spacing:-1;font-weight:bold;color:000000;">■ <?=$po_etc?></span>
						</td>
					</tr>
				</table>
                <table width=100% cellpadding=0 cellspacing=0 bgcolor=#f7f7f7 style="border:1px solid #e1e1e1;">
                <tr> 
                    <td height=35 width=120 align="center">
                        <? if ($member[mb_id]) { ?>
                            <input type=hidden name=pc_name value="<?=cut_str($member[mb_nick],255)?>">
                            <b><?=$member[mb_nick]?></b> &nbsp;
                        <? } else { ?>
                            이름 <input type='text' name='pc_name' size=10 class=input required itemname='이름'> &nbsp;
                        <? } ?>
                    </td>
                    <td>
                        의견 <input type='text' name='pc_idea' size=65 class=input required itemname='의견' maxlength="100"> &nbsp;
                        <input name="image" type=image src='<?=$g4[bbs_img_path]?>/ok_btn.gif' align=absmiddle border=0></td>
                </tr>
                </table>
            </td>
        </tr>
        </form>
        </table>

        <script language="JavaScript">
        function fpollresult_submit(f)
        {
            f.action = "./poll_etc_update.php";
            f.submit();
        }
        </script>
    <? } ?>

    <? for ($i=0; $i<count($list2); $i++) { ?>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
            <td height="10" colspan="4"></td>
        </tr>
        <tr> 
            <td width="20" height="25" align="center" bgcolor="#f7f7f7"><img src="<?=$g4[bbs_img_path]?>/icon_03.gif" width="3" height="5"></td>
            <td width="350" bgcolor="#f7f7f7"><?=$list2[$i][name]?></td>
            <td width="70" align="center" bgcolor="#f7f7f7"><? if ($list2[$i][del]) { echo $list2[$i][del] . "<img src='$g4[bbs_img_path]/btn_comment_delete.gif' width=45 height=14 border=0></a>"; } ?></td>
            <td width="150" align="center" bgcolor="#f7f7f7"><?=$list2[$i][datetime]?></td>
        </tr>
        <tr> 
            <td height="1" colspan="4" background="<?=$g4[bbs_img_path]?>/dot_bg.gif"></td>
        </tr>
        <tr> 
            <td width="20" height="25" bgcolor="#ffffff">&nbsp;</td>
            <td width="550" height="25" colspan="3" bgcolor="#ffffff"><?=$list2[$i][idea]?></td>
        </tr>
        </table>
    <? } ?>

<? } ?>

		<div style="height:10px;"><!-- --></div>

			<table width="100%" cellspacing="0" cellpadding="0" style="border:1px solid #e1e1e1;">
			<form name=fpolletc>
				<tr>
					<td width="120" bgcolor="f7f7f7" style="padding:0 0 0 20px;">다른투표결과보기 : </td>
					<td height="40" width="" bgcolor="f7f7f7" style="padding:0 0 0 0px;"><select name=po_id onchange="select_po_id(this)"><? for ($i=0; $i<count($list3); $i++) { ?><option value='<?=$list3[$i][po_id]?>'>[<?=$list3[$i][date]?>] <?=$list3[$i][subject]?><? } ?></select><script>document.fpolletc.po_id.value='<?=$po_id?>';</script>
					</td>
				</tr>
			</form>
			</table>

		</td>
	</tr>
	<tr align="center" valign="bottom">
		<td height="38" colspan="3"><a href="javascript:window.close();"><img src="<?=$poll_skin_path?>/img/close001.gif" width="100" height="30" border="0"></a></td>
	</tr>
	<tr>
		<td height="10" colspan="3"></td>
	</tr>
</table>



<script language='JavaScript'>
function select_po_id(fld) 
{
    document.location.href = "./poll_result.php?po_id="+fld.options[fld.selectedIndex].value;
}
</script>
