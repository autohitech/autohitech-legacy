<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

					if(count($list) == 0){
						echo "<li><span style='height:60px; bgcolor:#f7f7f7; color:#999; font-size:11px;'>최근 게시물이 없습니다.</span></li>";
					}else{

						for ($k=0; $k<count($list); $k++){
$datetime = substr($list[$k][wr_datetime],0,10);
$datetime = str_replace("-", ".", $datetime);

 $str .= "<li><span class='subject'><a href=\"{$list[$k][href]}\" class='notice01'>{$list[$k][subject]} {$list[$k][comment_cnt]}</a></span><span class='date'>$datetime</span></li>\n";

						}

					}
					echo $str;
					?>
