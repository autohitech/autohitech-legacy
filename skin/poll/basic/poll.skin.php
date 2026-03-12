<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
global $is_admin;

// 제작자 : 이슬삼호? ㅋㅋ (aaara@nate.com) 2009. 7. 20 제작, 탑스쿨님의 탑빌더 헌정스킨~ ^^

// 투표번호가 넘어오지 않았다면 가장 큰(최근에 등록한) 투표번호를 얻는다
if (!$po_id) 
{
    $po_id = $config[cf_max_po_id];

    if (!$po_id) return;
}

$po = sql_fetch(" select po_id, po_subject, po_level, po_poll1, po_poll2, po_poll3, po_poll4, po_poll5, po_poll6, po_poll7, po_poll8, po_poll9 from $g4[poll_table] where po_id = '$po_id' ");
?> 

<form name="fpoll" method="post" action="<?=$g4[bbs_path]?>/poll_update.php" onsubmit="return fpoll_submit(this);" target="winPoll" style="display:inline">
<input type="hidden" name="po_id" value="<?=$po_id?>">
<input type="hidden" name="skin_dir" value="<?=$skin_dir?>">
<table width="100%"  border="0" cellspacing="0" cellpadding="0" style="border:1px solid #e1e1e1;padding:0 10px 0 10px;">
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td height="22">
			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td background="<?=$poll_skin_path?>/img/hh_poll_04.jpg" height="22" width="2"><img src="<?=$poll_skin_path?>/img/hh_poll_03.jpg">
					</td>
					<td background="<?=$poll_skin_path?>/img/hh_poll_04.jpg" width="" align="center" valign="top"><img src="<?=$poll_skin_path?>/img/hh_poll_06.jpg" width="84" height="21" alt="">
					</td>
					<td background="<?=$poll_skin_path?>/img/hh_poll_04.jpg" height="22" width="3"><img src="<?=$poll_skin_path?>/img/hh_poll_08.jpg">
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td style="font-size:11px;letter-spacing:-1px;padding:10px 5px 10px 15px;">
			<font color="#444444">
			<?=$po[po_subject]?>
			</font>
			<? if ($is_admin == "super") { ?>
			<a href="<?=$g4[admin_path]?>/poll_form.php?w=u&po_id=<?=$po_id?>"> &nbsp;<img src="<?=$poll_skin_path?>/img/admin.gif"  border=0 align=absmiddle></a>
			<? } ?>
		</td>
	</tr>
	<tr>
		<td>
			<table width="100%"  cellspacing="0" cellpadding="0" bgcolor="#f7f7f7" style="border:1px solid #e1e1e1;padding:0 0 0 6px;">
				<tr>
					<td height="6"><!-- -->
					</td>
				</tr>
				<? for ($i=1; $i<=9 && $po["po_poll{$i}"]; $i++) { ?>
                <tr> 
                  <td width="10" height="20"><input type="radio" name="gb_poll" value="<?=$i?>"></td>
                  <td style="padding:4px 0 0 2px;font-size:11px;letter-spacing:-1px;"> 
                    <?=$po['po_poll'.$i]?>
                  </td>
                </tr>
				<? } ?>
				<tr>
					<td height="6"><!-- -->
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
	<tr>
		<td>
			<table width="132" border="0" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td width="66"><input type="image" src="<?=$poll_skin_path?>/img/hh_poll_14.jpg" width="68" height="22" hspace="4"  border="0"></td>
					<td width="66"><a href="javascript:;" onclick="poll_result('<?=$po_id?>');"><img src="<?=$poll_skin_path?>/img/hh_poll_16.jpg" width="68" height="22" border="0"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="10"></td>
	</tr>
</table>
</form>


<script language='JavaScript'>
function fpoll_submit(f)
{
    var chk = false;
    for (i=0; i<f.gb_poll.length;i ++) {
        if (f.gb_poll[i].checked == true) {
            chk = f.gb_poll[i].value;
            break;
        }
    }

    <?
    if ($member[mb_level] < $po[po_level])
        echo " alert('권한 $po[po_level] 이상의 회원만 투표에 참여하실 수 있습니다.'); return false; ";
    ?>

    if (!chk) {
        alert("항목을 선택하세요");
        return false;
    }

    win_poll();
    return true;
}

function poll_result(po_id)
{
    <?
    if ($member[mb_level] < $po[po_level])
        echo " alert('권한 $po[po_level] 이상의 회원만 결과를 보실 수 있습니다.'); return false; ";
    ?>

    win_poll("<?=$g4[bbs_path]?>/poll_result.php?po_id="+po_id+"&skin_dir="+document.fpoll.skin_dir.value);
}
</script>
