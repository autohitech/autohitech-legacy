<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<style>
/* 최신글 메뉴 */
#mylatest{
	width:100%;
	height:170px;
}
#mylatest_title{
	margin-left:5px;
	margin-top:2px;
	font-size:12px;
	font-weight:bold;
}

.mylatest_table{
	padding-top:5px;
	padding-bottom:5px;
	background: url("<?=$co_latest_skin_path?>/img/line_icon.gif") left bottom repeat-x;
}

#mylatest ul{ /* 최신 코멘트 메뉴 ul */
	padding:0;
	margin:0 0 10px 0;
	display:block;
	list-style:none;
}
#mylatest li{ /* 최신 코멘트 메뉴 li */
	margin-bottom:5px;
}
#mylatest li font{ /* style-list font */
	font-size:13px;
}

#mylatest a:link, #sub a:visited, #sub a:active { text-decoration:none; color:#000000; }
#mylatest a:hover { text-decoration:none; color:#B5241E; }

</style>
<!-- 최신글 시작 -->
<table border="0" cellpadding="0" cellspacing="0" width="100%" id="mylatest">
	<tr>
		<td colspan="3" height="10"></td>
	</tr>
	<tr>
		<td width="2" height="30"><img src="<?=$co_latest_skin_path?>/img/sbox_top_left.gif"></td>
		<td height="2" valign="middle" style="background: url('<?=$co_latest_skin_path?>/img/sbox_top_patten.gif') repeat-x;"> <div id="mylatest_title"><a href="<?=$g4[bbs_path];?>/new.php?sfl=mb_id&stx=<?=$member[mb_id];?>&srows=25&view=c">가장 최근 코멘트</a></div></td>
		<td width="2" height="30"><img src="<?=$co_latest_skin_path?>/img/sbox_top_right.gif"></td>
	</tr>
	<tr>
		<td width="2" style="background: url('<?=$co_latest_skin_path?>/img/sbox_left.gif') repeat-y;"></td>
		<td valign="top" width="" align="center">
			<table border="0" cellpadding="0" cellspacing="0" width="94%" style="margin-top:10px;">
				<tr>
					<td valign="middle">
					<?
					if(count($list) == 0){
						echo "최근 코멘트가 없습니다.";
					}else{
						$str = "<ul>\n";
						for ($k=0; $k<count($list); $k++){
								$str .= "<li><font color=\"#A31511\">ㆍ</font><a href=\"{$list[$k][href]}\">".cut_str(get_text(strip_tags($list[$k][wr_content])),$subject_len,"…")." {$list[$k][comment_cnt]} </a></li>\n";
						}
						$str .= "</ul>\n";
					}
					echo $str;
					?>
					</td>
				</tr>
			</table>
		</td>
		<td width="2" style="background: url('<?=$co_latest_skin_path?>/img/sbox_right.gif') repeat-y;"></td>
	</tr>
	<tr>
		<td width="2" height="2"><img src="<?=$co_latest_skin_path?>/img/sbox_bottom_left.gif"></td>
		<td height="2" style="background: url('<?=$co_latest_skin_path?>/img/sbox_bottom_patten.gif') repeat-x;"></td>
		<td width="2" height="2"><img src="<?=$co_latest_skin_path?>/img/sbox_bottom_right.gif"></td>
	</tr>
</table>
<!-- 최신글 종료 -->
