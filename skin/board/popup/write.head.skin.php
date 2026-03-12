<?
$write=sql_fetch("select * from $write_table where mb_id='$member[mb_id]'"); 
if($write[wr_id]){ $w='u'; $wr_id=$write[wr_id]; 
set_session('ss_bo_table', $bo_table); 
set_session('ss_wr_id', $write[wr_id]); 
} 

?>