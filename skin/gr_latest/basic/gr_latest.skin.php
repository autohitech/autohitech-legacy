<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<style>
.grlatest{
	height:170px; /* 전체 세로 사이즈 */
}
.grlatest_tab_title{
	padding:0;
	margin:0;
	height:27px;
	list-style:none;
}
.grlatest_tab_title .grlatest_tab_li{
	float:left;
	width:90px;
	height:27px;
	text-align:center;
	padding-top:5px;
	background: url("<?=$gr_latest_skin_path;?>/img/tap_out.gif") left top no-repeat;
}
.grlatest_tab_libg{
	float:left;
	width:90px;
	height:27px;
	text-align:center;
	padding-top:5px;
	background: url("<?=$gr_latest_skin_path;?>/img/tap_over.gif") left top no-repeat;
}
.grlatest_con{
	height:143px;
	border-left: 1px #E1E1E1 solid;
	border-right: 1px #E1E1E1 solid;
	border-bottom: 1px #E1E1E1 solid;
}
.grlatest_con ul{ /* 그룹최신글 메뉴 ul */
	clear:left;
	padding:0;
	margin:0;
	display:none;
	list-style:none;
}

.grlatest_con li{ /* 그룹최신글 메뉴 li */
	margin-left:5px;
	margin-bottom:6px;
}

.grlatest_con li font{ /* style-list font */
	font-size:13px;
}

.grlatest a:link, #sub a:visited, #sub a:active { text-decoration:none; color:#000000; }
.grlatest a:hover { text-decoration:none; color:#B5241E; }

</style>
<!-- 서브메뉴 시작 -->
<div class="grlatest">
<?
$gr_cnt = count($gr_list);

/* 남어지 bg 계산 */
$bg_width = 53;
$bg_cnt = 5 - $gr_cnt;
$bg_width = ($bg_cnt * 90) + $bg_width;

$tabstr = "<ul class=\"grlatest_tab_title\">\n";
	$tabstr .= "<li style=\"float:left;width:1px;height:27px;background: url('{$gr_latest_skin_path}/img/tap_left.gif') left top no-repeat;\"></li>";
for ($i=0; $i<$gr_cnt; $i++){
	$tabstr .= "<li id=\"grlatest_tabcon_$i\" class=\"grlatest_tab_li\"><strong><a href=\"$g4[bbs_path]/group.php?gr_id={$gr_list[$i][gr_id]}\" onmouseover=\"grcononChange('{$i}',{$gr_cnt});\">{$gr_list[$i][gr_sub]}</a></strong></li>";
}
	$tabstr .= "<li style=\"float:left;width:{$bg_width}px;height:27px;background: url('{$gr_latest_skin_path}/img/tap_bg.gif') left bottom repeat-x;\"></li>";
echo $tabstr .= "</ul>\n";
echo "<div class=\"grlatest_con\"><div style=\"height:12px\"></div>";
for ($i=0; $i<$gr_cnt; $i++){
	if(count($list[$i]) == 0){
		$str = "<ul id=\"grlatest_con_$i\">\n";
		$str .= "<li style=\"height:120px;text-align:center\"><br><br><br><br>게시물이 없습니다.</li>";
		$str .= "</ul>\n";
	}else{
		$str = "<ul id=\"grlatest_con_$i\">\n";
		for ($k=0; $k<count($list[$i]); $k++){
				$str .= "<li><font color=\"#A31511\">[{$list[$i][$k][bo_subject]}]</font> <a href=\"{$list[$i][$k][href]}\">{$list[$i][$k][subject]} {$list[$i][$k][comment_cnt]} </a></li>\n";
		}
		$str .= "</ul>\n";
	}
	echo $str;
}
echo "</div>";
?>
</div>
<script>
// 그룹최신글 오버,아웃을 위한 함수
function grcononChange(chk,cnt){
	for(var i=0; i < cnt; i++){
		id = "grlatest_con_"+i;
		tabid = "grlatest_tabcon_"+i;
		if(chk == i){
			document.getElementById(id).style.display = "block";
			document.getElementById(tabid).className = "grlatest_tab_libg";
		}else{
			document.getElementById(id).style.display = "none";
			document.getElementById(tabid).className = "grlatest_tab_li";
		}
	}
}
document.getElementById("grlatest_con_0").style.display = "block";
document.getElementById("grlatest_tabcon_0").className = "grlatest_tab_libg";
</script>
