<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$data_path = $g4[path]."/data/file/$bo_table";
$thumb_dir = "$g4[path]/data/file/$bo_table/thumb_165";

$sql = " select bf_file from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '$wr_id' ";
$result = sql_query($sql);
if($result) {
while ($row = sql_fetch_array($result)) 
{
		@unlink("$thumb_dir/$row[bf_file]");

}
}
?>
