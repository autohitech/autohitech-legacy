<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
include_once("$board_skin_path/_config.php");

foreach (glob("{$thumb_dir}/{$wr_id}_*") as $thumb)
    @unlink($thumb);
?>