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
?>

<!--타이틀 // 전체 테이블 시작-->
<table width="720" height="57" border="0" cellpadding="0" cellspacing="0" background="../design/img/title_bg.gif">
  <tr>
    <td align="left" valign="top"><!--타이틀 테이블 시작-->
      <table height="20" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr>
          <td align="left" valign="top" class="title_t01"><?=$group[gr_subject];?></td>
          <td width="10" align="left" valign="top"></td>
        </tr>
      </table>
      <!--타이틀 테이블 끝-->    </td>
    <td align="left" valign="middle">&nbsp;</td>
    <td align="right" valign="top" style="padding-top:3px;">
	  <table border="0" cellpadding="0" cellspacing="0">
        <tr>
		<td align="right" valign="top"><img src="../design/img/navi_home.gif" align="absmiddle" /><span class="navi_t02"><?=$group[gr_subject];?></span></td>
        </tr>
      </table>	</td>
  </tr>
</table>
<!--타이틀 // 전체 테이블 끝-->



<?// } ?>
