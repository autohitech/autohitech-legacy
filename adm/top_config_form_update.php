<?
$sub_menu = "100100";
include_once("./_common.php");

if (!(get_session('captcha_keystring') && get_session('captcha_keystring') == $_POST['kcaptcha_key'])) {
    alert('정상적인 접근이 아닌것 같습니다.');
}

check_demo();

auth_check($auth[$sub_menu], "w");

if ($is_admin != "super")
    alert("최고관리자만 접근 가능합니다.");

check_token();

$sql = " update $g4[topconfig_table]
            set tc_popular_chk                = '$_POST[tc_popular_chk]',
                tc_popular_day                = '$_POST[tc_popular_day]',
                tc_popular_skin            = '$_POST[tc_popular_skin]',
                tc_popular_limit          = '$_POST[tc_popular_limit]',
                tc_point_chk         = '$_POST[tc_point_chk]',
                tc_point_day    = '$_POST[tc_point_day]',
                tc_point_skin          = '$_POST[tc_point_skin]',
                tc_point_limit             = '$_POST[tc_point_limit]',
                tc_mycontent_chk          = '$_POST[tc_mycontent_chk]',
                tc_mycontent_skin             = '$_POST[tc_mycontent_skin]',
                tc_mycontent_limit             = '$_POST[tc_mycontent_limit]',
                tc_newwrite_chk          = '$_POST[tc_newwrite_chk]',
                tc_newwrite_skin         = '$_POST[tc_newwrite_skin]',
                tc_newwrite_limit           = '$_POST[tc_newwrite_limit]',
                tc_newcomment_chk          = '$_POST[tc_newcomment_chk]',
                tc_newcomment_skin        = '$_POST[tc_newcomment_skin]',
                tc_newcomment_limit       = '$_POST[tc_newcomment_limit]',
                tc_poll_chk       = '$_POST[tc_poll_chk]',
                tc_poll_skin         = '$_POST[tc_poll_skin]',
                tc_group_chk          = '$_POST[tc_group_chk]',
                tc_group_skin          = '$_POST[tc_group_skin]',
                tc_group_limit          = '$_POST[tc_group_limit]',
                tc_group_tab          = '$_POST[tc_group_tab]',
                tc_visit_chk            = '$_POST[tc_visit_chk]',
                tc_visit_skin         = '$_POST[tc_visit_skin]',
                tc_visit_chk            = '$_POST[tc_visit_chk]',
                tc_visit_skin         = '$_POST[tc_visit_skin]',
                tc_today_chk              = '$_POST[tc_today_chk]',
                tc_today_skin                   = '$_POST[tc_today_skin]' where tc_id = 1";
sql_query($sql);

goto_url("./top_config_form.php");
?>
