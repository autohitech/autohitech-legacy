<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

					if(count($list) == 0){
						echo "<tr><td>최근 게시물이 없습니다.</td><td></td></tr>";
					}else{
						$str = "<tr><td>\n";
						for ($k=0; $k<count($list); $k++){
								$str .= "<font color=\"#A31511\">ㆍ</font><a href=\"{$list[$k][href]}\">{$list[$k][subject]} {$list[$k][comment_cnt]} </a>\n";
						}
						$str .= "</td><td></td></tr>\n";
					}
					echo $str;
					?>
