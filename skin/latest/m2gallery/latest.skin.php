<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

					if(count($list) == 0){
						echo "<tr><td height='60' colspan='2' align='center' valign='middle' bgcolor='#f7f7f7' style='color:#999; font-size:11px;'>최근 게시물이 없습니다.</td></tr>";
					}else{

						for ($k=0; $k<count($list); $k++){
$datetime = substr($list[$k][wr_datetime],0,11);
 $str .= " <tr>
        <td height='20' align='left' valign='middle'><img src='../main/img/icon_notice.gif' align='absmiddle'><a href=\"{$list[$k][href]}\" class='notice01'>{$list[$k][subject]} {$list[$k][comment_cnt]}</a></td>
        <td width='70' align='right' valign='middle' class='date'>$datetime</td>
  </tr>\n";

						}

					}
					echo $str;
					?>
