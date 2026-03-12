<!-- 메인화면 최신글 시작 -->
<table width="100%" cellpadding=0 cellspacing=0>
<tr>
	<td align="center">
		<!-- banner_latest(세로출력row 가로출력 col , 중앙[c] 왼쪽[l] 오른쪽[r] 하단[b] 그룹[g] 랜덤[d] , limit ); -->
		<?=banner_latest("row","g",1);?>
	</td>
</tr>
<tr>
    <td valign=top>
    <?
    //  최신글
    $sql = " select bo_table, bo_subject,bo_skin from $g4[board_table] 
              where gr_id = '$gr_id' 
                and bo_list_level <= '$member[mb_level]'
              order by bo_table ";
    $result = sql_query($sql);
    for ($i=0; $row=sql_fetch_array($result); $i++) {
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 스킨은 입력하지 않을 경우 관리자 > 환경설정의 최신글 스킨경로를 기본 스킨으로 합니다.

        // 사용방법
        // latest(스킨, 게시판아이디, 출력라인, 글자수);
			if(($row[bo_skin] == "free_image3") || ($row[bo_skin] == "ucc_basic")){
           		                echo latest("tgallery", $row[bo_table], 3, 18);
			}else{
			echo latest("tbasic", $row[bo_table], 6, 50);
			}
        echo "<p>";
    }
    ?>
    </td>
</tr>
</table>
<!-- 메인화면 최신글 끝 -->
