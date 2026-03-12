<script type="text/javascript" src="<?=$g4['path']?>/js/g4.core.js?v=<?=filemtime($g4['path']."/js/g4.core.js")?>"></script>
<!-- 새창 대신 사용하는 iframe -->
<iframe width=0 height=0 name='hiddenframe' style='display:none;'></iframe>

<? if ($is_admin == "super") { ?><!-- <div style='float:left; width:<?=$table_width?>px; text-align:center;'>RUN TIME : <?=get_microtime()-$begin_time;?><br></div> --><? } ?>


<?
// 사이트를 방문하게 되면 처음 한번 insert가 되고, 이후에는 계속 update가 이루어 집니다. 따라서 무조건 update를 먼저하게 하는게 속도를 더 빠르게 합니다.
$tmp_sql = " update $g4[login_table] set mb_id = '$member[mb_id]', lo_datetime = '$g4[time_ymdhis]', lo_location = '$lo_location', lo_url = '$lo_url' where lo_ip = '$_SERVER[REMOTE_ADDR]' ";
sql_query($tmp_sql, FALSE);

// update가 안되는 경우에는 insert를 합니다.
if (!mysql_affected_rows())
{
 $tmp_sql = " insert into $g4[login_table] ( lo_ip, mb_id, lo_datetime, lo_location, lo_url ) values ( '$_SERVER[REMOTE_ADDR]', '$member[mb_id]', '$g4[time_ymdhis]', '$lo_location',  '$lo_url' ) ";
 sql_query($tmp_sql, FALSE);

 // 시간이 지난 접속은 삭제한다
 sql_query(" delete from $g4[login_table] where lo_datetime < '".date("Y-m-d H:i:s", $g4[server_time] - (60 * $config[cf_login_minutes]))."' ");
}

//include_once "lib/popup.lib.php";
?>
