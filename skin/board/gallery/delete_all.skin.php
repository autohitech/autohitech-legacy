<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 자신만의 코드를 넣어주세요.

$data_path = $g4[path]."/data/file/$bo_table";
$thumb_dir = "$g4[path]/data/file/$bo_table/thumb_165";
for ($i=count($tmp_array)-1; $i>=0; $i--) {
$sql = " select bf_file from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '{$tmp_array[$i]}' and bf_no = '0' ";
$result = sql_query($sql);
if($result) {
while ($row = sql_fetch_array($result)) 
{
		@unlink("$thumb_dir/$row[bf_file]");

}
}	
}
?>
