<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 일정(스케쥴) 스킨
// 게시판의 wr_1 필드에 날짜 형식 20081216 일과 같은 yyyymmdd 형식으로 저장
?>

<table width=100% border='0' cellspacing='0' cellpadding='0' id="schedule_latest">
<?
if (!function_exists("get_first_day")) {
    // mktime() 함수는 1970 ~ 2038년까지만 계산되므로 사용하지 않음
    // 참고 : http://phpschool.com/bbs2/inc_view.html?id=3924&code=tnt2&start=0&mode=search&s_que=mktime&field=title&operator=and&period=all
    function get_first_day($year, $month)
    {
        $day = 1;
        $spacer = array(0, 3, 2, 5, 0, 3, 5, 1, 4, 6, 2, 4);
        $year = $year - ($month < 3);
        $result = ($year + (int) ($year/4) - (int) ($year/100) + (int) ($year/400) + $spacer[$month-1] + $day) % 7;
        return $result;
    }
}

// 오늘
$today = getdate($g4[server_time]);

$year  = (int)substr($schedule_ym, 0, 4);
$month = (int)substr($schedule_ym, 4, 2);
if ($year  < 1)                $year  = $today[year];
if ($month < 1 || $month > 12) $month = $today[mon];
$current_ym = sprintf("%04d%02d", $year, $month);

$end_day = array(1=>31, 28, 31, 30 , 31, 30, 31, 31, 30 ,31 ,30, 31);
// 윤년 계산 부분이다. 4년에 한번꼴로 2월이 28일이 아닌 29일이 있다.
if( $year%4 == 0 && $year%100 != 0 || $year%400 == 0 )
    $end_day[2] = 29; // 조건에 적합할 경우 28을 29로 변경

// 해당월의 1일을 mktime으로 변경
$mktime = mktime(0,0,0,$month,1,$year);
$mkdate = getdate(strtotime(date("Y-m-1", $mktime)));

// 1일의 첫번째 요일 (0:일, 1:월 ... 6:토)
$first_day = get_first_day($year, $month);
// 해당월의 마지막 날짜,
$last_day  = $end_day[$month];

if ($month - 1 < 1) {
    $before_ym = sprintf("%04d%02d", ($year-1), 12);
} else {
    $before_ym = sprintf("%04d%02d", $year, ($month-1));
}

if ($month + 1 > 12) {
    $after_ym  = sprintf("%04d%02d", ($year+1), 1);
} else {
    $after_ym  = sprintf("%04d%02d", $year, ($month+1));
}

// 최신글과 게시판의 스킨폴더명이 동일해야 함
//echo "<tr><td colspan='7' align='center'>";
//echo "<a href='$g4[path]/skin/board/$skin_dir/schedule.php?bo_table=$bo_table&schedule_ym=$schedule_ym'>more</a></td></tr>";
echo "<tr>";
echo "<td align='center'></td>";
echo "<td colspan='5' align='center'>";
echo "<a href='$_SERVER[PHP_SELF]?bo_table=$bo_table&schedule_ym=$before_ym'><img src='$latest_skin_path/img/sc_prev.gif' border='0' hspace='7'></a><span class='sc_year'>$year.</span> <span class='sc_moon'>$month</span><a href='$_SERVER[PHP_SELF]?bo_table=$bo_table&schedule_ym=$after_ym'><img src='$latest_skin_path/img/sc_next.gif' border='0' hspace='7'></a>";
echo "</td>";
echo "<td align='center'></td>";
echo "</tr>";

// 요일
$yoil = array ("일", "월", "화", "수", "목", "금", "토");
echo "<tr>";
for ($i=0; $i<7; $i++) {
    $class = array();
    $class[] = "sc_tit";
    if ($i == 0)
        $class[] = "sc_sun";
    else if ($i == 6)
        $class[] = "sc_sat";
    $class_list = implode(" ", $class);
    echo "<td align=center class='$class_list'><b>$yoil[$i]</b></td>";
}
echo "</tr><tr><td height='1' colspan='7' bgcolor='dedede'></td>
                  </tr><tr><td height='5' colspan='7'></td>
                  </tr>";

$cnt = $day = 0;
for ($i=0; $i<6; $i++) {
    echo "<tr bgcolor='f3f3f3'>";
    for ($k=0; $k<7; $k++) {
        $cnt++;
        echo "<td height='15' align=center class='sc_day'>";
        if ($cnt > $first_day) {
            $day++;
            if ($day <= $last_day) {

                $class = array();

                // 오늘이라면
                if ($today[year] == $year && $today[mon] == $month && $today[mday] == $day) {
                    $class[] = "sc_today";
                }

                $current_ymd = $current_ym . sprintf("%02d", $day);

                if ($k == 0)
                    $class[] = "sc_sun";
                else if ($k == 6)
                    $class[] = "sc_sat";

                $class_list = implode(" ", $class);
                echo "<span class='$class_list'>";

                $sql = " select count(*) as cnt from $g4[write_prefix]$bo_table where wr_link1 = '$current_ymd' and wr_is_comment = 0 ";
                $row = sql_fetch($sql);
                if ($row[cnt]) {
                if ($today[year] == $year && $today[mon] == $month && $today[mday] == $day) {
                    echo "<a href='$g4[bbs_path]/board.php?bo_table=$bo_table&sfl=wr_link1&stx=$current_ymd');\" title='일정건수 : {$row[cnt]}건' class='sctoday'>";
               } else {
                    echo "<a href='$g4[bbs_path]/board.php?bo_table=$bo_table&sfl=wr_link1&stx=$current_ymd');\" title='일정건수 : {$row[cnt]}건' class='sc'>";
               }
                    echo $day;
                    echo "</a>";
                } else {
                    echo $day;
                }
                echo "</span>";
            } else {
                echo "&nbsp;";
            }
        } else {
            echo "&nbsp;";
        }
        echo "</td>";
    }
    echo "</tr>\n";
    if ($day >= $last_day)
        break;
}

?>
</table>
