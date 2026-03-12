<?
$sub_menu = "300400";
include_once("./_common.php");

auth_check($auth[$sub_menu], "w");


$sql_common = " po_skin = '$po_skin',
						po_dir = '$po_dir',
						po_popstyle = '$po_popstyle',
						po_openchk = '$po_openchk',
						po_scrollbar = '$po_scrollbar',
						po_start_date = '$po_start_date',
						po_end_date = '$po_end_date',
						po_expirehours = '$po_expirehours',
						po_left = '$po_left',
						po_top = '$po_top',
						po_height = '$po_height',
						po_width = '$po_width',
						po_subject = '$po_subject',
						po_content = '$po_content' ";

if ($w == 'u'){
	$sql = " update $g4[popup_table] set 
				$sql_common 
			  where po_id = '$po_id' ";
	sql_query($sql);
}else{
    $sql = " insert $g4[popup_table] set 
				$sql_common ";
    sql_query($sql);
    $po_id = mysql_insert_id();
}

goto_url("./popup_form.php?$qstr&w=u&po_id=$po_id");
?>
