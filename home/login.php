<?php
include_once("./_common.php");

// 개발용 PC(localhost) 접근 제한
$is_localhost = ($_SERVER['REMOTE_ADDR'] == '127.0.0.1' || $_SERVER['REMOTE_ADDR'] == '::1' || strpos($_SERVER['HTTP_HOST'], 'localhost') !== false);
if (!$is_localhost) {
    goto_url($g4['path']);
}

$g4['title'] = "로그인";
include_once("$g4[path]/head.php");

// 이미 로그인 중이라면
if ($member['mb_id'])
{
    if ($url)
        goto_url($url);
    else
        goto_url($g4['path']);
}

if ($url)
    $urlencode = urlencode($url);
else
    $urlencode = urlencode($_SERVER['REQUEST_URI']);

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";

include_once("$member_skin_path/login.skin.php");

include_once("$g4[path]/tail.php");
?>
