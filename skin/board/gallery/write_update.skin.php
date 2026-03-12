<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

include_once("$board_skin_path/skin.lib.php");

$data_path = $g4[path]."/data/file/$bo_table";//$_SERVER[DOCUMENT_ROOT].
$img_width = $board[bo_image_width];
//$board[bo_upload_count]

for ($i=0; $i<$board[bo_upload_count]; $i++) {
	if ($_FILES[bf_file][name][$i]) {
    $row = sql_fetch(" select bf_file from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '$wr_id' and bf_no = '$i' ");
    $file = $data_path ."/". $row[bf_file];
	$refile = $data_path ."/re_". $row[bf_file];
    $size = getimagesize($file);
    if($img_width>$size[0]) {$simg_width = $size[0];} else {$simg_width =$img_width;}
	gd_image_resize($file,$file, $simg_width, "", "$size[2]",""); 
}
}
?>
