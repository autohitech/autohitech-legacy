<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

					if(count($list) == 0){
						echo "<li><div style='color:#c7d2e3; padding-top:2px;'>최근 게시물이 없습니다.</div></li>";
					}else{

						for ($k=0; $k<count($list); $k++){
$datetime = substr($list[$k][wr_datetime],0,11);
 $str .= "<li><div><span class='date'>$datetime</span>   <a href=\"{$list[$k][href]}&subNum=1\" class='notice01'>{$list[$k][subject]} {$list[$k][comment_cnt]}</a><img src='img/new.gif' align='absmiddle' class='AL_icon01' /></div></li>\n";

						}

					}
         
          echo "<div id='news-container'><ul>$str</ul></div>";
		  
?>