<?
// 이 파일은 새로운 파일 생성시 반드시 포함되어야 함
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$begin_time = get_microtime();

if (!$g4['title'])
    $g4['title'] = $config['cf_title'];

// 쪽지를 받았나?
if ($member['mb_memo_call']) {
    $mb = get_member($member[mb_memo_call], "mb_nick");
    sql_query(" update {$g4[member_table]} set mb_memo_call = '' where mb_id = '$member[mb_id]' ");

    alert($mb[mb_nick]."님으로부터 쪽지가 전달되었습니다.", $_SERVER[REQUEST_URI]);
}


// 현재 접속자
$lo_location = addslashes($g4['title']);
if (!$lo_location)
    $lo_location = $_SERVER['REQUEST_URI'];
$lo_url = $_SERVER['REQUEST_URI'];
if (strstr($lo_url, "/$g4[admin]/") || $is_admin == "super") $lo_url = "";

// 헤더 설정
header("Content-Type: text/html; charset=$g4[charset]");
$gmnow = gmdate("D, d M Y H:i:s") . " GMT";
header("Expires: 0");
header("Last-Modified: " . $gmnow);
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: pre-check=0, post-check=0, max-age=0");
header("Pragma: no-cache");
?>
<!DOCTYPE html>
<html lang="ko">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?=$g4['title']?></title>
<link rel="shortcut icon" href="<?=$g4['path']?>/img/favicon.ico" />
<link rel="stylesheet" href="<?=$g4['path']?>/css/common.css">
<script type="text/javascript" src="<?=$g4['path']?>/js/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="<?=$g4['path']?>/js/jquery-ui-1.14.1.min.js"></script>
<script type="text/javascript" src="<?=$g4['path']?>/js/autotech.bundle.js?v=<?=filemtime($g4['path']."/js/autotech.bundle.js")?>"></script>
<script type="text/javascript">
// Modernized Popup Function
function G4_Popup(url, winname, width, height, left, top, scrollbars) {
    if (!width) width = 720;
    if (!height) height = 615;
    
    // Centering if left/top not provided
    if (left === undefined || left === null || left === "" || left === 0) {
        left = (screen.width - width) / 2;
    }
    if (top === undefined || top === null || top === "" || top === 0) {
        top = (screen.height - height) / 2;
    }
    
    var features = "width=" + width + ",height=" + height + ",left=" + left + ",top=" + top;
    features += ",scrollbars=" + (scrollbars ? "yes" : "no");
    features += ",resizable=yes,status=no,toolbar=no,menubar=no,location=no";
    
    var win = window.open(url, winname, features);
    if (win) win.focus();
    return win;
}

// MM_openBrWindow (Dreamweaver Legacy)
function MM_openBrWindow(theURL, winName, features) {
    var width = 720;
    var height = 615;
    var scrollbars = "no";
    
    if (features) {
        var wMatch = features.match(/width=([0-9]+)/);
        if (wMatch) width = wMatch[1];
        var hMatch = features.match(/height=([0-9]+)/);
        if (hMatch) height = hMatch[1];
        if (features.indexOf("scrollbars=yes") > -1) scrollbars = "yes";
    }
    
    return G4_Popup(theURL, winName, width, height, null, null, (scrollbars === "yes"));
}
</script>
<script language="javascript">
// 자바스크립트에서 사용하는 전역변수 선언
var g4_path      = "<?=$g4['path']?>";
var g4_bbs       = "<?=$g4['bbs']?>";
var g4_bbs_img   = "<?=$g4['bbs_img']?>";
var g4_url       = "<?=$g4['url']?>";
var g4_is_member = "<?=$is_member?>";
var g4_is_admin  = "<?=$is_admin?>";
var g4_bo_table  = "<?=isset($bo_table)?$bo_table:'';?>";
var g4_sca       = "<?=isset($sca)?$sca:'';?>";
var g4_charset   = "<?=$g4['charset']?>";
var g4_cookie_domain = "<?=$g4['cookie_domain']?>";
<? if ($is_admin) { echo "var g4_admin = '{$g4['admin']}';"; } ?>
</script>
</head>
<body <?=isset($g4['body_script']) ? $g4['body_script'] : "";?>>
<a name="g4_head"></a>
