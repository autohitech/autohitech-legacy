<?
$sub_menu = "300500";
include_once("./_common.php");

auth_check($auth[$sub_menu], "w");

if ($is_admin != "super")
    alert("최고관리자만 접근 가능합니다.");

$upload_dir = "$g4[path]/data/design/";

// 디렉토리가 없다면 생성.
@mkdir("$upload_dir", 0707);
@chmod("$upload_dir", 0707);

function file_upload($files, $upload_dir, $allow_type="", $limit_size="")
{
    $total_size = 0;
    $upfile = array();

    // 단일 파일이면 배열로..
    if (!is_array($files[tmp_name])) {
        $files[tmp_name] = array($files[tmp_name]);
        $files[name] = array($files[name]);
        $files[type] = array($files[type]);
        $files[size] = array($files[size]);
    }

    for ($i=0; $i<count($files[tmp_name]); $i++)
    {
        if (is_uploaded_file($files[tmp_name][$i]))
        {
            $upfile[$i][file_name] = get_file_name($upload_dir, $files[name][$i]);
            $upfile[$i][real_name] = $files[name][$i];
            //$upfile[$i]mime_type] = $files[type][$i];
            $upfile[$i][file_size] = $files[size][$i];
            $upfile[$i][extension]=strtolower(array_pop(explode('.', $files[name][$i])));

            // 허용타입 체크
            if ($allow_type) {
                if (!allow_file_type($upfile[$i][extension], $allow_type))
                    alert("허용하지 않는 파일형식 입니다.");
            }

            // 허용용량 체크 byte 단위로 세트...
            $total_size += $upfile[$i][file_size];

            if ($limit_size) {
                if ((int)$upfile[$i][file_size] > (int)($limit_size))
                    alert("파일용량이 허용치를 초과하였습니다.");
            }

            // 파일복사
            $tmp_upload_file = $upload_dir.$upfile[$i][file_name];

            if (!move_uploaded_file($files[tmp_name][$i], $tmp_upload_file))
                alert("파일명 : $upfile[real_name]\\n파일을 업로드할 수 없습니다.");

            @chmod($tmp_upload_file, 0606);

            $upfile[$i][image] = @getimagesize($tmp_upload_file);
        }
        else
        {
            $upfile[$i][file_name] = "";
        }
    }
    return $upfile;
}

// get unique filename
function get_file_name($upload_dir, $file_name)
{
    global $g4;

    // 아래의 문자열이 들어간 파일은 -x 를 붙여서 웹경로를 알더라도 실행을 하지 못하도록 함
    $file_name = preg_replace("/\.(php|phtm|htm|cgi|pl|exe|jsp|asp|inc)/i", "$0-x", $file_name);

    // 접미사를 붙인 파일명
    //$upload[$i][file] = abs(ip2long($_SERVER[REMOTE_ADDR])).'_'.substr(md5(uniqid($jb2[server_time])),0,8).'_'.urlencode($filename);
    // 달빛온도님 수정 : 한글파일은 urlencode($filename) 처리를 할경우 '%'를 붙여주게 되는데 '%'표시는 미디어플레이어가 인식을 못하기 때문에 재생이 안됩니다. 그래서 변경한 파일명에서 '%'부분을 빼주면 해결됩니다. 
    $file_name = abs(ip2long($_SERVER[REMOTE_ADDR])).'_'.substr(md5(uniqid($g4[server_time])),0,8).'_'.str_replace('%', '', urlencode($file_name)); 

    // duplicate check
    srand((double)microtime()*1000000);
    while (file_exists($upload_dir.$file_name)) {
        $seed = rand(100,999);
        $file_name=$seed."_".$file_name;
        if (!file_exists($upload_dir.$file_name)) break;
    }

    return $file_name;
}

function allow_file_type($file_type, $allow_type)
{
    $rtn = false;
    $allow_type_array = explode(",", $allow_type);
    if (in_array($file_type, $allow_type_array))
        $rtn = true;

    return $rtn;
}

$sql_file = "";

/* 업로드 시작 */
$upload_1 = file_upload($_FILES['bn_file1'],$upload_dir);
$upload_2 = file_upload($_FILES['bn_file2'],$upload_dir);
$upload_3 = file_upload($_FILES['bn_file3'],$upload_dir);
// if((!$bn_file1_chk) || (!$bn_file2_chk) || (!$bn_file3_chk) ) {
if(!$bn_file1_chk){
	if($upload_1[0][file_name]){
		$sql_file .= "ds_logo_top = '{$upload_1[0][file_name]}',";
	}
}
 if(!$bn_file2_chk){
	if($upload_2[0][file_name]){
		$sql_file .= "ds_logo_btn = '{$upload_2[0][file_name]}',";
            }	
 }
 if(!$bn_file3_chk){
	if($upload_3[0][file_name]){
		$sql_file .= "ds_main = '{$upload_3[0][file_name]}',";
            }	
 }
 //}else{
	$rs = sql_fetch("select ds_logo_top,ds_logo_btn, ds_main from $g4[design_table] where ds_id = $ds_id");
   if($bn_file1_chk){
	@unlink($upload_dir.$rs[ds_logo_top]);
		$sql_file .= "ds_logo_top = '',";
  }
   if($bn_file2_chk){
	@unlink($upload_dir.$rs[ds_logo_btn]);
		$sql_file .= "ds_logo_btn = '',";
  }
   if($bn_file3_chk){
	@unlink($upload_dir.$rs[ds_main]);
		$sql_file .= "ds_main = '',";
  }
// }

$sql_common = " ds_site_align = '$ds_site_align',
						ds_design_top = '$ds_design_top',
						ds_design_left = '$ds_design_left',
						ds_design_copy = '$ds_design_copy',
						ds_option_0 = '$ds_option_0',
						ds_option_1 = '$ds_option_1',
						ds_option_2 = '$ds_option_2',
						ds_option_3 = '$ds_option_3',
						ds_option_4 = '$ds_option_4',
						ds_option_5 = '$ds_option_5',
						$sql_file
						ds_datetime = '$g4[time_ymdhis]' ";

if ($w == 'u'){
	$sql = " update $g4[design_table] set 
				$sql_common 
			  where ds_id = '$ds_id' ";
	sql_query($sql);
}else{
    $sql = " insert $g4[design_table] set 
				$sql_common ";
    sql_query($sql);
    $ds_id = mysql_insert_id();
}

 goto_url("./design_form.php?$qstr&w=u&ds_id=$ds_id");
?>
