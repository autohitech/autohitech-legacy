<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<table width="600" height="395" border="0" cellpadding="0" cellspacing="3" bgcolor="#2a3346">
  <tr>
    <td align="center" valign="top" bgcolor="#FFFFFF">


<table width="100%" height="45" border="0" cellpadding="0" cellspacing="0" background="<?=$member_skin_path?>/img/bar_memo.jpg">
  <tr>
    <td align="left" valign="top" style="padding:8px 0px 0px 40px; color:#ffffff; font-size:15px; font-weight:bold; letter-spacing:-1px;"><?=$g4[title]?></td>
  </tr>
</table>

<table width="100%" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>

<table width="95%" height="23" border="0" cellpadding="0" cellspacing="0" background="<?=$member_skin_path?>/img/memo_bg02.gif">
  <tr>
    <td width="88" align="left" valign="top"><a href="./memo.php?kind=recv"><img src="<?=$member_skin_path?>/img/btn_recv_paper_off.gif" border="0" /></a></td>
    <td width="88" align="left" valign="top"><a href="./memo.php?kind=send"><img src="<?=$member_skin_path?>/img/btn_send_paper_off.gif" border="0" /></a></td>
    <td width="88" align="left" valign="top"><a href="./memo_form.php"><img src="<?=$member_skin_path?>/img/btn_write_paper_off.gif" border="0" /></a></td>
    <td align="right"><?
                echo "<a href=\"$prev_link\" class=page_n>이전</a>&nbsp;|&nbsp;";
                echo "<a href=\"$next_link\" class=page_n>다음</a>"; 
                ?></td>
  </tr>
</table>
<table width="95%" height="10" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td></td>
  </tr>
</table>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
                <tr>
                  <td height="4" align="left" valign="top" background="<?=$member_skin_path?>/img/table_line_P.gif"></td>
                </tr>
      </table>
<table width="95%" border="0" cellpadding="5" cellspacing="1" bgcolor="#e7e7e7">
         <tr>
           <td align="left" valign="middle" bgcolor="f4f4f4" style="padding-left:20;">
             <?
        //$nick = cut_str($mb[mb_nick], $config[cf_cut_name]);
        $nick = get_sideview($mb[mb_id], $mb[mb_nick], $mb[mb_email], $mb[mb_homepage]);
        if ($kind == "recv")
            echo "<b><font color=4440bb>$nick</font></b>님께서 {$memo[me_send_datetime]}에 보내온 쪽지의 내용입니다.";

        if ($kind == "send") 
            echo "<b><font color=4440bb>$nick</font></b>님께 {$memo[me_send_datetime]}에 보낸 쪽지의 내용입니다."; 
        ?></td>
         </tr>
         <tr> 
            <td align="center" valign="middle" bgcolor="#FFFFFF" style="padding:10 0 10 0;"><table width="100%" height="90" border="0" cellpadding="5" cellspacing="1" bgcolor="e9e9e9">
                    <tr>
                        <td align="left" valign="top" bgcolor="f9f9f9" class=lh><?=conv_content($memo[me_memo], 0)?></td>
                    </tr>
          </table></td>
        </tr>
      </table>
<table width="95%" height="55" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" valign="middle"><? if ($kind == "recv") echo "<a href='./memo_form.php?me_recv_mb_id=$mb[mb_id]&me_id=$memo[me_id]'><img src='$member_skin_path/img/btn_reply.gif' border='0' /></a>"; ?><a href="./memo.php?kind=<?=$kind?>"><img src="<?=$member_skin_path?>/img/btn_list_view.gif" border="0" style="padding:0px 0px 0px 7px;" /></a><a href="javascript:window.close();"><img src="<?=$member_skin_path?>/img/btn_close.gif" border="0" style="padding:0px 0px 0px 7px;" /></a></td>
  </tr>
</table>
</td>
  </tr>
</table>
