<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<?
function remove_tags_($str) 
{ 
	$str = html_entity_decode($str); 
	$str = preg_replace("/<[^>]*>/","",$str); 
	$str = strip_tags($str); 
	return $str; 
};
?>

<link rel="stylesheet" type="text/css" href="<?=$search_skin_path?>/css/style.css" />

<!-- 헤더 -->
<div class="boardHeader">
    <h3>Search</h3>
</div>
<!-- 헤더 끝 -->
<br class='clear' />

<table cellspacing="0" width=100%>
	<col />
	<tr>
		<td valign="top" align="left">
			<div class="search">

				<form name=fsearch method=get action="javascript:fsearch_submit(document.fsearch);" onsubmit="return check_value()">
					<input type="hidden">
					<?=$group_select?>
					<select name=sfl class=select style="background-color:#ffffff">
						<option value="wr_subject||wr_content">제목+내용</option>
						<option value="wr_subject">제목</option>
						<option value="wr_content">내용</option>
						<option value="mb_id">회원아이디</option>
						<option value="wr_name">이름</option>
					</select>

					<input name="stx" maxlength="25" required itemname="검색어" value="<?=$text_stx?>" style="border:1px solid #999999; width:160px; height:20px; background-color: #ffffff;">

					<input type="image" src="<?=$search_skin_path?>/img/search_btn.gif"	border="0" align="absmiddle" alt="검색">

					<input type="radio" name="sop" value="or" <?=($sop == "or") ? "checked" : "";?>>OR
						
					<input type="radio" name="sop" value="and" <?=($sop == "and") ? "checked" : "";?>>AND
				</form>

				<br class='clear' />

				<?
				if($_GET[stx] != "")
				{
				?>
				<!--검색 결과 출력-->
				<div class="boardComment">
					<b>&nbsp;&nbsp;검색 완료</b> (<b><?=$board_count?></b>개의 게시판, <b><?=number_format($total_count)?></b>개의 게시글, <?=number_format($page)?>/<b><?=number_format($total_page)?></b> 페이지)
				</div>
				<!-- 출력-->
				<? 
					$k=0;
					for ($idx=$table_index, $k=0; $idx<count($search_table) && $k<$rows; $idx++) 
					{	//테이블 루프 시작
				?>
				<br class='clear' />
				<!-- 검색된 게시판 이름-->
				<div class="subheader">
					<a href='./board.php?bo_table=<?=$search_table[$idx]?>&<?=$search_query?>'><p><?=$bo_subject[$idx]?> 검색 결과</p></a>
				</div>
				<!-- 검색된 게시판 끝-->
				<!-- 검색된 데이터들 출력 -->
				<?
				            $comment_href = "";
				            for ($i=0; $i<count($list[$idx]) && $k<$rows; $i++, $k++)
				           	{	//데이터 루프

				           		//썸네일 코드 시작
								$img = $list[$idx][$i][wr_id];
								$roo = sql_fetch(" select bf_file from $g4[board_file_table] where bo_table = '$search_table[$idx]' and wr_id = '$img' and bf_no = '0' ");

								$data_path = $g4['path'] . "/data/file/{$search_table[$idx]}";//라이브러리 파일 참조
								$thumb_path = $data_path . '/thumbSearch';

								$sch_w = 80; //썸네일 가로사이즈
								$sch_h = 100; //썸네일 세로사이즈
								$sch_q = 100; //썸네일 퀼리티

								//디렉토리 생성
								if (!is_dir($thumb_path)) {
									@mkdir($thumb_path, 0707);
									@chmod($thumb_path, 0707);
								}

							    $filename = $roo[bf_file]; //파일명
							    //if($filename != "")
							    {
								    $thumb = $thumb_path.'/'.$filename; //썸네일

								    if (!file_exists($thumb))
								    {
								    	$file = $data_path.'/'.$filename; //원본
								        if (preg_match("/\.(jp[e]?g|gif|png)$/i", $file) && file_exists($file))
								        {
								            $size = getimagesize($file);
								            if ($size[2] == 1)
								                $src = imagecreatefromgif($file);
								            else if ($size[2] == 2)
								                $src = imagecreatefromjpeg($file);
								            else if ($size[2] == 3)
								                $src = imagecreatefrompng($file);
								            else
								                continue;

								            $rate = $sch_w / $size[0];
								            $height = (int)($size[1] * $rate);

								            if ($height < $sch_h)
								                $dst = imagecreatetruecolor($sch_w, $height);
								            else
								                $dst = imagecreatetruecolor($sch_w, $sch_h);
								            imagecopyresampled($dst, $src, 0, 0, 0, 0, $sch_w, $height, $size[0], $size[1]);
								            imagejpeg($dst, $thumb_path.'/'.$filename, $sch_q);
								            chmod($thumb_path.'/'.$filename, 0707);
								        }
								    }
								}
								//else
								{
									//$thumb = "";
								}

							    if (file_exists($thumb) && $filename != "")
							        $img = $thumb;
							    else
							    	$img = "";

								$iscmt = "";
				                if ($list[$idx][$i][wr_is_comment]) 
				                {
				                    $iscmt = "<font color=999999>[코멘트]</font> ";
				                    $comment_href = "#c_".$list[$idx][$i][wr_id];
				                }

				?>
				<div class="item_text">
					<table cellspacing="0">
					<? if($img == ""){ ?>
					<col width="0" />
					<? } else { ?>
					<col width="<?=$sch_w?>" />
					<? } ?>
					<col/>
						<tr>
							<td valign=top><? if ($img != "") { ?><a href='<?=$list[$idx][$i][href]?><?=$comment_href?>' target='_blank'><img src='<?=$img?>' style='border:1px solid #000'></a><? } ?></td>
							<td valign=top>
								<? if ($img != "") { ?><img src="<?=$search_skin_path?>/img/pipe.png" alt="" /><? } ?>
								<b><a href='<?=$list[$idx][$i][href]?><?=$comment_href?>' target='_blank'><?=$iscmt?><?=$list[$idx][$i][subject]?></a></b>&nbsp;&nbsp;&nbsp;<font color=#999999><?=$list[$idx][$i][wr_datetime]?></font><br />
								<div class="item_text2">
									<?=$list[$idx][$i][content]?>
								</div>
							</td>
						</tr>
					</table>
				</div>
				<?
							}	//데이터 루프 끝
							//검색 결과 더보기
				?>
				<div class="item_text3">
						<img src="<?=$search_skin_path?>/img/arrow_sch.gif" alt="" />&nbsp;<a href="./board.php?bo_table=<?=$search_table[$idx]?>&<?=$search_query?>"><?=$bo_subject[$idx]?> 검색 결과 더 보기</a>
				</div>
				<br class='clear' />
				<?
					}	//테이블 루프 끝
				?>
				<div class="clear">
				<?=$write_pages?>
				<div class="clear">
				<? } else { ?>
				<!--검색어 없음-->
				<div class="boardComment">
					검색어를 입력하세요.
				</div>
				<? } ?>
			</div>
		</td>
	</tr>
</table>

<br class='clear' />

<script language="javascript">
document.fsearch.sfl.value = "<?=$sfl?>";
function fsearch_submit(f)
{
	/*
	// 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
	var cnt = 0;
	for (var i=0; i<f.stx.value.length; i++)
	{
		if (f.stx.value.charAt(i) == ' ')
			cnt++;
	}

	if (cnt > 1)
	{
		alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
		f.stx.select();
		f.stx.focus();
		return;
	}
	*/
	f.action = "";
	f.submit();
};
function check_value()
{
	var s = document.all.stx.value.replace(" ", "");
	if(s.length == 1)
	{
		alert("2자 이상 입력해 주세요");
		document.all.stx.focus();
		return false;
	}
	return true;
};
</script>

<script language="javascript">document.all.stx.focus();</script>
