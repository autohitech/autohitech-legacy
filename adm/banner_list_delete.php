<?
$sub_menu = "300500";
include_once("./_common.php");

check_demo();

auth_check($auth[$sub_menu], "d");

if ($is_admin != "super")
    alert("최고관리자만 접근 가능합니다.");

$upload_dir = "$g4[path]/data/banner/";

$msg = "";
for ($i=0; $i<count($chk); $i++) 
{
    // 실제 번호를 넘김
    $k = $chk[$i];

	$row = sql_fetch(" select * from $g4[banner_table] where bn_id = '$bn_id[$k]' ");
	if (!$row[bn_id]){ 
		$msg ="bn_id 값이 제대로 넘어오지 않았습니다.";
    } else {
		@unlink($upload_dir.$row['bn_file_name']);
		sql_query(" delete from $g4[banner_table] where bn_id = '$bn_id[$k]' ");
    }
}

if ($msg)
    echo "<script type='text/JavaScript'> alert('$msg'); </script>";

goto_url("./banner_list.php?$qstr");
?>
