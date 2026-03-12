<?
$sub_menu = "300500";
include_once("./_common.php");

check_demo();

auth_check($auth[$sub_menu], "w");

for ($i=0; $i<count($chk); $i++) 
{

    // 실제 번호를 넘김
    $k = $chk[$i];

	$row = sql_fetch(" select * from $g4[banner_table] where bn_id = '$bn_id[$k]' ");
	if (!$row[bn_id]){ 
		$msg ="bn_id 값이 제대로 넘어오지 않았습니다.";
    } else {
        $sql = " update $g4[banner_table]
                    set bn_openchk = '$bn_openchk[$k]',
							bn_seq = '$bn_seq[$k]'
                  where bn_id = '$bn_id[$k]' ";
        sql_query($sql);
    }
}

if ($msg)
    echo "<script type='text/JavaScript'> alert('$msg'); </script>";

goto_url("./banner_list.php?$qstr");
?>
