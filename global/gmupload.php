<?php
include_once './inc/_config.php';


function getmicrotime() {
    $microtimestmp = explode(" ",microtime());
    return $microtimestmp[0]+$microtimestmp[1];
}

// 임시 업로드 디렉토리 설정

//$upload_temp_dir = $_SERVER['DOCUMENT_ROOT'] . "/upload_temp";

 
if($_POST['PHPSESSID']) {

// 파일전송이 제대로 되지 않으면 오류

if (!isset($_FILES['Filedata']) || !is_uploaded_file($_FILES['Filedata']['tmp_name']) || $_FILES['Filedata']['error'] != 0) {
    header("HTTP/1.1 500 File Upload Error");
    if (isset($_FILES['Filedata'])) {
        echo $_FILES['Filedata']['error'];
    }
    exit(0);
}

$tmp_file = $_FILES['Filedata']['tmp_name'];
$filename = $_FILES['Filedata']['name'];
$file_size = $_FILES['Filedata']['size'];
$allowedExts = array("avi","wmv","mov","mp4","flv");
$file_name = substr($filename,0,-4);
$file_name = preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\_|\!\?\*$#<>()\[\]\{\}]/i", "", $file_name);
$file_name  = $file_name.substr(strtolower($filename),-4);
$extension = end(explode(".", $file_name));
if ($filename && $file_size>0) {
	if (!in_array($extension, $allowedExts)) {
		echo("Unhandled Error");
	} else if ($_FILES['Filedata']['error'] > 0) {
		echo("Unhandled Error");
	}
}




$file_name = strtolower($_FILES['Filedata']['name']); // 원래 파일명
$file_ext = strtolower(substr(strrchr($file_name, "."), 1)); // 파일 확장자

$mkuid=getmicrotime();
$mkuid=str_replace(".","",$mkuid);
$mkuid=str_replace(" ","",$mkuid);


do { // 임의의 중복되지 않는 화일명을 구한다.
    $new_file_name = $mkuid."." . $file_ext;
    if (!file_exists($upload_temp_dir . "/" . $new_file_name)) {
        break;
    }
} while(1);

 

if (move_uploaded_file($_FILES['Filedata']['tmp_name'], $upload_temp_dir . "/" . $new_file_name)) {
     //  chmod($new_file_name, 0606);
        echo $new_file_name;

} else {
    header("HTTP/1.1 500 File Upload Error");
    echo("Unhandled Error");
}
} else {
    header("HTTP/1.1 500 File Upload Error");
    echo("Unhandled Error");
}

?>
