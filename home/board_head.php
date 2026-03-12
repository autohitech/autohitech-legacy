<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 게시판 관리의 상단 파일 경로
if ($board[bo_include_head]) 
    @include ($board[bo_include_head]); 

// 게시판 관리의 상단 이미지 경로
if ($board[bo_image_head]) 
    echo "<img src='$g4[path]/data/file/$bo_table/$board[bo_image_head]' border='0'>";

// 게시판 관리의 상단 내용
// if ($board[bo_content_head]){ 
//    echo stripslashes($board[bo_content_head]); 
if(($bo_table) && ($wr_id)) {
                                        $global_boardslist = "g4_write_".$bo_table;
                                        $gbl_sql = " select wr_id, wr_subject from $global_boardslist  where wr_id = '$wr_id'  ";
                                        $gbl_result = sql_query($gbl_sql);
                                        $gbl_row=sql_fetch_array($gbl_result);
}


?>

<!-- Title -->
<div id="titleWrap">
<div class="tit"><?
if(($board[bo_10] == yes) && ($gbl_row[wr_subject])) { echo $gbl_row[wr_subject]; }
else { $title_img = "<img src='../img/title_".$board[bo_table].".gif'>";
echo $title_img;


}?></div>
<div class="navi"><ul><li class="home">홈</li><li><?=$group[gr_subject];?></li><li class="location"><?
if(($board[bo_10] == yes) && ($gbl_row[wr_subject])) { echo $gbl_row[wr_subject]; }
else { echo $board[bo_subject];}?></li></ul></div><? include "../inc/b_font.html";?>
</div>
<!-- //Title -->

<?// } ?>
