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
}

if(($gr_id) && ($gr_id == "customer")) {
	$show_top_menu = "inc/top_customer.html";
	$show_left_menu ="inc/menu_customer.html";
} else if(($gr_id) && ($gr_id == "company")) {
	$show_top_menu = "inc/top_company.html";
	$show_left_menu ="inc/menu_company.html";
} else if(($gr_id) && ($gr_id == "download")) {
	$show_top_menu = "inc/top_download.html";
	$show_left_menu ="inc/menu_download.html";
} else if(($gr_id) && ($gr_id == "controller")) {
	$show_top_menu = "inc/top_controller.html";
	$show_left_menu ="inc/menu_controller.html";
} else if(($gr_id) && ($gr_id == "system")) {
	$show_top_menu = "inc/top_system.html";
	$show_left_menu ="inc/menu_system.html";
} else if(($gr_id) && ($gr_id == "education")) {
	$show_top_menu = "inc/top_education.html";
	$show_left_menu ="inc/menu_education.html";
} else if(($gr_id) && ($gr_id == "touch")) {
	$show_top_menu = "inc/top_touch.html";
	$show_left_menu ="inc/menu_touch.html";
} else if(($gr_id) && ($gr_id == "admin")) {
	$show_top_menu = "inc/top_customer.html";
	$show_left_menu ="inc/menu_mypage.html";
} else if($grid == "searchtool") {
	$show_top_menu = "inc/top_customer.html";
	$show_left_menu ="inc/menu_customer.html";
} else {
	$show_top_menu = "inc/top_customer.html";
	$show_left_menu ="inc/menu_mypage.html";
}
?>