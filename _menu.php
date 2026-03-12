<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// URL 경로를 분석하여 gr_id 자동 설정 (정적 페이지용)
if (!$gr_id) {
    if (preg_match("/\/company\//i", $_SERVER['PHP_SELF'])) $gr_id = "company";
    else if (preg_match("/\/customer\//i", $_SERVER['PHP_SELF'])) $gr_id = "customer";
    else if (preg_match("/\/controller\//i", $_SERVER['PHP_SELF'])) $gr_id = "controller";
    else if (preg_match("/\/system\//i", $_SERVER['PHP_SELF'])) $gr_id = "system";
    else if (preg_match("/\/education\//i", $_SERVER['PHP_SELF'])) $gr_id = "education";
    else if (preg_match("/\/download\//i", $_SERVER['PHP_SELF'])) $gr_id = "download";
    else if (preg_match("/\/touch\//i", $_SERVER['PHP_SELF'])) $gr_id = "touch";
    else if (preg_match("/\/bbs\/estimate\.html/i", $_SERVER['PHP_SELF'])) $gr_id = "estimate";
}

// 언어별 파일 접미사 설정
$lang_suffix = "";
if ($g4['lang'] == 'en') $lang_suffix = "_en";
else if ($g4['lang'] == 'vi') $lang_suffix = "_vi";

// 탑 메뉴 기본값 (contWrap, container가 포함된 top_customer를 기본으로 사용)
$show_top_menu = "inc/top_customer" . $lang_suffix . ".html";

// 그룹별 메뉴 설정
if(($gr_id) && ($gr_id == "customer")) {
	$show_top_menu = "inc/top_customer" . $lang_suffix . ".html";
	$show_left_menu ="inc/menu_customer" . $lang_suffix . ".html";
} else if(($gr_id) && ($gr_id == "company")) {
	$show_top_menu = "inc/top_company" . $lang_suffix . ".html";
	$show_left_menu ="inc/menu_company" . $lang_suffix . ".html";
} else if(($gr_id) && ($gr_id == "download")) {
	$show_top_menu = "inc/top_download" . $lang_suffix . ".html";
	$show_left_menu ="inc/menu_download" . $lang_suffix . ".html";
} else if(($gr_id) && ($gr_id == "controller")) {
	$show_top_menu = "inc/top_controller" . $lang_suffix . ".html";
	$show_left_menu ="inc/menu_controller" . $lang_suffix . ".html";
} else if(($gr_id) && ($gr_id == "system")) {
	$show_top_menu = "inc/top_system" . $lang_suffix . ".html";
	$show_left_menu ="inc/menu_system" . $lang_suffix . ".html";
} else if(($gr_id) && ($gr_id == "education")) {
	$show_top_menu = "inc/top_education" . $lang_suffix . ".html";
	$show_left_menu ="inc/menu_education" . $lang_suffix . ".html";
} else if(($gr_id) && ($gr_id == "touch")) {
	$show_top_menu = "inc/top_touch" . $lang_suffix . ".html";
	$show_left_menu ="inc/menu_touch" . $lang_suffix . ".html";
} else if(($gr_id) && ($gr_id == "estimate")) {
	$show_top_menu = "inc/top_customer" . $lang_suffix . ".html";
	$show_left_menu ="inc/menu_estimate" . $lang_suffix . ".html";
} else if(($gr_id) && ($gr_id == "admin")) {
	$show_top_menu = "inc/top_customer" . $lang_suffix . ".html";
	$show_left_menu ="inc/menu_mypage" . $lang_suffix . ".html";
} else if($grid == "searchtool") {
	$show_top_menu = "inc/top_customer" . $lang_suffix . ".html";
	$show_left_menu ="inc/menu_customer" . $lang_suffix . ".html";
} else {
    // gr_id가 없는 페이지(로그인 등)의 기본 메뉴 설정
	$show_left_menu ="inc/menu_mypage" . $lang_suffix . ".html";
}

// 만약 해당 언어의 파일이 존재하지 않으면 기본 파일로 폴백 (안정성 확보)
if (!file_exists($g4['path'] . "/" . $show_top_menu)) {
    $show_top_menu = preg_replace("/_(en|vi)\.html$/", ".html", $show_top_menu);
}
if (!file_exists($g4['path'] . "/" . $show_left_menu)) {
    $show_left_menu = preg_replace("/_(en|vi)\.html$/", ".html", $show_left_menu);
}
?>