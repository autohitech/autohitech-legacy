<?

  if(!$year) $year=date("Y");
  if(!$month) $month=date("m");
  if(!$day) $day=date("d");

  $today=mktime(0,0,0,$month,$day,$year);
  $yesterday=mktime(0,0,0,$month,$day,$year)-3600*24;
  $tomorrow=mktime(0,0,0,$month,$day,$year)+3600*24;
  $month_start=mktime(0,0,0,$month,1,$year);
  $lastdate=01;
  while (checkdate($month,$lastdate,$year)): 
    $lastdate++;  
  endwhile;
  $lastdate=mktime(0,0,0,$month,$lastdate,$year);
  if(!$worktype)$worktype="main";
?>
        <form method=post name = "VisitFrm" action="<?=$PHP_SELF?>">
          <input type=hidden name=worktype value="<? echo $worktype; ?>">
          <input type=hidden name=showmenu value=<? echo $showmenu; ?>>
              <select name="year">
                <?
$ThisYear = date("Y");
for($i = ${ThisYear};$i >= date("Y" , $SITE_START_DATE );$i--) {
if($year == $i) echo "<option value='$i' selected>$i</option>\n";
else echo "<option value='$i'>$i</option>\n";
}
?>
              </select>년 &nbsp;
              <select name="month">
                <?
for($i=1;$i<=12;$i++) {
if($month == $i) echo "<option value='$i' selected>$i</option>\n";
else echo "<option value='$i'>$i</option>\n";
}
?>
              </select>월 &nbsp;  
              <select name="day">
                <?
for($i=1;$i<=31;$i++) {
if($day == $i) echo "<option value='$i' selected>$i</option>\n";
else echo "<option value='$i'>$i</option>\n";
}
?>일</b>
                </select><input type=submit value=' 검 색 '>
 </form>

          <?
	$count = array();

  // 전체
  $total=mysql_fetch_array(mysql_query("select sum(uniq_cnt),  sum(pageview) from $counter_main where id>1"));
  $count[total_hit]=$total[0];
  $count[total_view]=$total[1];
  // 오늘 카운터 읽어오는 부분
  $detail=mysql_fetch_array(mysql_query("select uniq_cnt, pageview from $counter_main where date='$today'"));
  $count[today_hit]=$detail[0];
  $count[today_view]=$detail[1];
  // 어제 카운터 읽어오는 부분
  $detail=mysql_fetch_array(mysql_query("select uniq_cnt, pageview from $counter_main where date='$yesterday'"));
  $count[yesterday_hit]=$detail[0];
  $count[yesterday_view]=$detail[1];
  // 최고 카운터 읽어오는 부분
  $detail=mysql_fetch_array(mysql_query("select max(uniq_cnt), max(pageview) from $counter_main where id>1"));
  $count[max_hit]=$detail[0];
  $count[max_view]=$detail[1];
  // 최저 카운터 읽어오는 부분
  $detail=mysql_fetch_array(mysql_query("select min(uniq_cnt), min(pageview) from $counter_main where id>1 and date<$today"));
  $count[min_hit]=$detail[0];
  $count[min_view]=$detail[1];


if($worktype=="main"):
?>
<table width='750' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc'>
<tr>  <td  bgcolor='f4f2f2' colspan=2 class='bbs'>중요 방문통계 
</tr>
 <tr>
<td height='1' colspan='2' align='center' bgcolor='#cccccc' class='bbs'></td>
</tr>
         <tr> 
            <td  colspan=2  bgcolor='#FFFFFF' class='bbs'>
<table width=98% border='0' cellpadding='0' cellspacing='0'>
<tr><td height=40>전체 방문자수 : 
              <?=$count[total_hit]?>
              <br>
              전체 페이지뷰 : 
              <?=$count[total_view]?>
              </font></td>
            <td height=40> 오늘 방문자수 : 
              <?=$count[today_hit]?>
              <br>
              오늘 페이지뷰 : 
              <?=$count[today_view]?>
              </font></td>
            <td bgcolor=#ffffff height=40>어제 방문자수 : 
              <?=$count[yesterday_hit]?>
              <br>
              어제 페이지뷰 : 
              <?=$count[yesterday_view]?>
              </font></td>
          </tr></table>
</td></tr></table>
<br>
<table width='750' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc'>
<tr>  <td  bgcolor='f4f2f2' class='bbs'>주요사이트  </td><td  bgcolor='f4f2f2' class='bbs'>접속수 </td>
</tr>
<?
  $total_sql = " select hostname,count(hostname) AS hosts from $counter_content where date <'$tomorrow' and date > '$yesterday'  group by hostname order by hosts desc limit 10 ";
 // $total_sql = " select hostname,count(hostname) , keyword,count(keyword)  from $counter_content where date >= '$month_start' and date <='$today' group by hostname,keyword order by date desc limit 5  ";

  $result = mysql_query($total_sql) or die (mysql_error());
  if(mysql_num_rows($result) < 1) {
echo "         <tr> 
            <td  colspan=2  bgcolor='#FFFFFF' class='bbs'>자료가 없습니다.</td></tr>";
}
  while($row=mysql_fetch_array($result)) {
  $host_name=$row[0];
  $host_cnt=$row[hosts];
if($host_name =="") { $host_name = "직접 혹은 즐겨찾기";}
echo "<tr><td  bgcolor='#FFFFFF' class='bbs' width=50%>$host_name </td><td  bgcolor='#FFFFFF' class='bbs'> $host_cnt </td></tr> ";
}

?>
</table> <br>
<table width='750' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc'>
<tr>  <td  bgcolor='f4f2f2' class='bbs'>주요검색어 </td><td  bgcolor='f4f2f2' class='bbs'>접속수 </td>
</tr><?
  $keysql = " select keyword,count(keyword) AS keysw from $counter_content where date <'$tomorrow' and date > '$yesterday' group by keyword order by keysw desc limit 10 ";
  $keyresult = mysql_query($keysql) or die (mysql_error());
  if(mysql_num_rows($result) < 1) {
echo "         <tr> 
            <td  colspan=2  bgcolor='#FFFFFF' class='bbs'>자료가 없습니다.</td></tr>";
}
  while($keyrow=mysql_fetch_array($keyresult)) {
  $kyword=$keyrow[0];
  $kyword_cnt=$keyrow[keysw];
if($kyword =="") { $kyword = "직접 혹은 즐겨찾기";}
echo "<tr><td  bgcolor='#FFFFFF' class='bbs' width=50%>$kyword </td><td  bgcolor='#FFFFFF' class='bbs'> $kyword_cnt </td></tr>  ";
}

?>


</table>


          <?

elseif($worktype=="today"):
?>
<table width='750' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc'>
<tr>  <td  bgcolor='f4f2f2' colspan=2 class='bbs'>오늘 시간대별 방문통계 
</tr>
 <tr>
<td height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
</tr>
<tr> 
<td  bgcolor='#FFFFFF' class='bbs'>
              &nbsp; 
         <?= $month ?>
              월 
              <?=$day?>
              일 방문자수 : 
              <?=$count[today_hit]?>
              <br>
              &nbsp; 
              <?=$month?>
              월 
              <?=$day?>
              일 페이지뷰 : 
              <?=$count[today_view]?>
              </font></td>
          </tr>


          <tr> 
            <td align=middle bgcolor='#FFFFFF' class='bbs' height=300 valign=bottom>
                <?  
  $max=1;
  for($i=0;$i<24;$i++)
  {
   $time1=mktime($i,0,0,$month,$day,$year);
   $time2=mktime($i,59,59,$month,$day,$year);
   $temp=mysql_fetch_array(mysql_query("select count(*) from $counter_content where date>='$time1' and date<='$time2'"));
   $time_count[$i]=$temp[0];
   if($max<$time_count[$i]) $max=$time_count[$i];
  }

  for($i=0;$i<24;$i++)
  {
    if($time_count[$i])  {
    $colorurand = md5(uniqid(rand()));
    $coloruid = substr($colorurand,1,6);
   $graph_data .= "<set name='$i 시' value='$time_count[$i]' color='$coloruid' />";
    }
  }

$CREATE_XMADATA = "
<graph caption='$sub_title' subcaption='일시 : $month 월 $day 일 (단위 : 명)' bgcolor='ffffff' xAxisName='오늘 시간대별 방문통계' yAxisName='' outCnvBaseFont = '굴림' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' rotateNames='0' animation='1' decimalPrecision='0' formatNumberScale='0'>
$graph_data
</graph>";

$fp = fopen("./class/shopacc_today.xml", "w+");
fwrite($fp,"$CREATE_XMADATA"); 
fclose($fp); 
?>
<table width="900" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr> 
    <td valign="top" class="text" align="center"> <div id="chartdiv" align="center"> 
        FusionCharts. </div>
      <script type="text/javascript">
		   var chart = new FusionCharts("./class/FCF_Column3D.swf", "ChartId", "980", "600");
		   chart.setDataURL("class/shopacc_today.xml");		   
		   chart.render("chartdiv");
		</script> </td>
  </tr></table>
<br>


</td>

                </tr>
              </table>

          <?

elseif($worktype=="week"):
 $start_day=$day;
 while(date('l',mktime(0,0,0,$month,$start_day,$year))!='Sunday')
 {
  $start_day--;
 }
 $last_day=$day;
 while(date('l',mktime(0,0,0,$month,$last_day,$year))!='Saturday')
 {
  $last_day++;
 }
 $start_time=mktime(0,0,0,$month,$start_day,$year);
 $last_time=mktime(23,59,59,$month,$last_day,$year);
 
 $detail=mysql_fetch_Array(mysql_query("select sum(uniq_cnt), sum(pageview) from $counter_main where date>=$start_time and date<=$last_time"));
 $count[week_hit]=$detail[0];
 $count[week_view]=$detail[1];
?>
<table width='750' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc'>
<tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'>주간별 방문통계 
</tr>
 <tr>
<td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
</tr>
<tr> 
<td  bgcolor='#FFFFFF' class='bbs'>
              &nbsp; 
              <?=$month?>
              월 
              <?=$start_day?>
              ~ 
              <?=$last_day?>
              일 방문자수 : 
              <?=$count[week_hit]?>
              <br> &nbsp; 
              <?=$month?>
              월 
              <?=$start_day?>
              ~ 
              <?=$last_day?>
              일 페이지뷰 : 
              <?=$count[week_view]?>
             </td>
          </tr>
          <tr> 
            <td colspan=2 align=middle bgcolor='#FFFFFF' class='bbs' height=300 valign=bottom>
                <?
  $max1=1;
  $max2=1;
  for($i=0;$i<7;$i++)
  {
   $time=mktime(0,0,0,$month,$start_day+$i,$year);
   $temp=mysql_fetch_array(mysql_query("select uniq_cnt, pageview from $counter_main where date='$time'"));
   $time_count1[$i]=$temp[0];
   if($max1<$time_count1[$i]) $max1=$time_count1[$i];
   $time_count2[$i]=$temp[1];
   if($max2<$time_count2[$i]) $max2=$time_count2[$i];
  }
  $week=array("일요일","월요일","화요일","수요일","목요일","금요일","토요일");
  for($i=0;$i<7;$i++)
  {
    if(($time_count1[$i]>0) || ($time_count2[$i]>0)) {
  $category_data .= "<category name='$week[$i]'  hoverText='$week[$i]' />";

   $graph_data_1 .= "<set value='$time_count1[$i]' />";
   $graph_data_2 .= "<set value='$time_count2[$i]' />";
   } 
  }
$CREATE_XMADATA = "
<graph caption='주간별 방문통계' subcaption='기간 : $month 월 $start_day 일 ~ $last_day 일(단위 : 명)' bgColor='ffffff' hovercapbg='DEDEBE' hovercapborder='889E6D' xAxisName='' yAxisName=''  numdivlines='9' divLineColor='CCCCCC' divLineAlpha='80' outCnvBaseFont = '굴림' numberPrefix='' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' showNames='1'  rotateNames='0' animation='1' decimalPrecision='0' formatNumberScale='0' showAlternateHGridColor='1' AlternateHGridAlpha='30' AlternateHGridColor='CCCCCC'>
 <categories font='굴림체' fontSize='12' fontColor='000000'>
 $category_data
</categories>
<dataset seriesname='방문객수' color='FDC12E'>
$graph_data_1
</dataset>
<dataset seriesname='페이지뷰' color='56B9F9'>
$graph_data_2
</dataset>
</graph>";

$fp = fopen("./class/shopacc_week.xml", "w+");
fwrite($fp,"$CREATE_XMADATA"); 
fclose($fp); 

?>
<table width="900" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr> 
    <td valign="top" class="text" align="center"> <div id="chartdiv" align="center"> 
        FusionCharts. </div>
      <script type="text/javascript">
		   var chart = new FusionCharts("./class/FCF_MSColumn3D.swf", "ChartId", "900", "500");
		   chart.setDataURL("class/shopacc_week.xml");		   
		   chart.render("chartdiv");
		</script> </td>
  </tr></table>
</td>


           </tr>   </table>
          <?

elseif($worktype=="month"):
  $total_month_counter=mysql_fetch_array(mysql_query("select sum(uniq_cnt), sum(pageview) from $counter_main where date>='$month_start' and date<='$lastdate'"));
?>
<table width='750' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc'>
<tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'>월간 방문통계 
</tr>
 <tr>
<td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
</tr>
<tr> 
<td  bgcolor='#FFFFFF' class='bbs'>
              &nbsp; 
              <?=$month?>
              월 방문자수 : 
              <?=$total_month_counter[0]?>
              <br> &nbsp; 
              <?=$month?>
              월 페이지뷰 : 
              <?=$total_month_counter[1]?>
             </td>
          </tr>
          <tr> 
            <td colspan=2 align=middle bgcolor='#FFFFFF' class='bbs' height=300 valign=bottom> <table cellspacing=0 cellpadding=1 width="98%" height=100% border=0 valign=bottonm>
                <?

  $max=mysql_fetch_array(mysql_query("select max(uniq_cnt), max(pageview) from $counter_main where date>='$month_start' and date<='$lastdate'"));
  $month_counter=mysql_query("select date, uniq_cnt, pageview from $counter_main where date>='$month_start' and date<='$lastdate'"); 
  while($data=mysql_fetch_array($month_counter)):
$monthofdate = date("d 일",$data[date]);
  $category_data .= "<category name='$monthofdate'  hoverText='$monthofdate' />";

   $graph_data_1 .= "<set value='$data[uniq_cnt]' />";
   $graph_data_2 .= "<set value='$data[pageview]' />";

  endwhile;
$CREATE_XMADATA = "
<graph caption='월간 방문통계' subcaption='  $month 월  (단위 : 명)' bgColor='ffffff' hovercapbg='DEDEBE' hovercapborder='889E6D' xAxisName='' yAxisName=''  numdivlines='9' divLineColor='CCCCCC' divLineAlpha='80' outCnvBaseFont = '굴림' numberPrefix='' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' showNames='1'  rotateNames='0' animation='1' decimalPrecision='0' formatNumberScale='0' showAlternateHGridColor='1' AlternateHGridAlpha='30' AlternateHGridColor='CCCCCC'>
 <categories font='굴림체' fontSize='12' fontColor='000000'>
 $category_data
</categories>
<dataset seriesname='방문객수' color='FDC12E'>
$graph_data_1
</dataset>
<dataset seriesname='페이지뷰' color='56B9F9'>
$graph_data_2
</dataset>
</graph>";

$fp = fopen("./class/shopacc_month.xml", "w+");
fwrite($fp,"$CREATE_XMADATA"); 
fclose($fp); 
?> 

<table width="900" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr> 
    <td valign="top" class="text" align="center"> <div id="chartdiv" align="center"> 
        FusionCharts. </div>
      <script type="text/javascript">
		   var chart = new FusionCharts("./class/FCF_MSBar2D.swf", "ChartId", "900", "900");
		   chart.setDataURL("class/shopacc_month.xml");		   
		   chart.render("chartdiv");
		</script> </td>
  </tr></table>

<br>

 </td>
  </tr></table>


          <?

elseif($worktype=="year"):
  $year_start=mktime(0,0,0,1,1,$year);
  $year_last=mktime(23,59,59,12,31,$year);
  $total_year_counter=mysql_fetch_array(mysql_query("select sum(uniq_cnt), sum(pageview) from $counter_main where date>='$year_start' and date<='$year_last'"));

?>
<table width='750' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc'>
<tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'>월별 방문통계 
</tr>
 <tr>
<td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
</tr>
<tr> 
<td  bgcolor='#FFFFFF' class='bbs'>
              &nbsp; 
              <?=$year?>
              년 방문자수 : 
              <?=$total_year_counter[0]?>
              <br> &nbsp; 
              <?=$year?>
              년 페이지뷰 : 
              <?=$total_year_counter[1]?>
             </td>
          </tr>
          <tr> 
            <td colspan=2 align=middle bgcolor='#FFFFFF' class='bbs' height=300 valign=bottom>

                <?

$max1=1;
  $max2=1;
  for($i=0;$i<7;$i++)
  {
   $time=mktime(0,0,0,$month,$start_day+$i,$year);
   $temp=mysql_fetch_array(mysql_query("select uniq_cnt, pageview from $counter_main where date='$time'"));
   $time_count1[$i]=$temp[0];
   if($max1<$time_count1[$i]) $max1=$time_count1[$i];
   $time_count2[$i]=$temp[1];
   if($max2<$time_count2[$i]) $max2=$time_count2[$i];
  }
  $mmax=array("31","28","31","30","31","30","31","31","30","31","30","31");
  $max=1;
  $max2=1;
  for($i=0;$i<12;$i++)
  {
   $sdate=mktime(0,0,0,$i+1,1,$year);
   $edate=mktime(0,0,0,$i+1,$mmax[$i],$year);
   $year_counter=mysql_query("select sum(uniq_cnt), sum(pageview) from $counter_main where date>='$sdate' and date<='$edate'");
   $temp=mysql_fetch_array($year_counter);
   $time_count1[$i]=$temp[0];
   if($max1<$time_count1[$i]) $max1=$time_count1[$i];
   $time_count2[$i]=$temp[1];
   if($max2<$time_count2[$i]) $max2=$time_count2[$i];
  }
  
  for($i=0;$i<12;$i++)
  {
   $j=$i+1;
  $category_data .= "<category name='$j 월'  hoverText='$j 월 ' />";

   $graph_data_1 .= "<set value='$time_count1[$i]' />";
   $graph_data_2 .= "<set value='$time_count2[$i]' />";
}
$CREATE_XMADATA = "
<graph caption='월별 방문통계' subcaption='기간 : $year 년 (단위 : 명)' bgColor='ffffff' hovercapbg='DEDEBE' hovercapborder='889E6D' xAxisName='' yAxisName=''  numdivlines='9' divLineColor='CCCCCC' divLineAlpha='80' outCnvBaseFont = '굴림' numberPrefix='' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' showNames='1'  rotateNames='0' animation='1' decimalPrecision='0' formatNumberScale='0' showAlternateHGridColor='1' AlternateHGridAlpha='30' AlternateHGridColor='CCCCCC'>
 <categories font='굴림체' fontSize='12' fontColor='000000'>
 $category_data
</categories>
<dataset seriesname='방문객수' color='FDC12E'>
$graph_data_1
</dataset>
<dataset seriesname='페이지뷰' color='56B9F9'>
$graph_data_2
</dataset>
</graph>";

$fp = fopen("./class/shopacc_year.xml", "w+");
fwrite($fp,"$CREATE_XMADATA"); 
fclose($fp); 
?>
<table width="900" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr> 
    <td valign="top" class="text" align="center"> <div id="chartdiv" align="center"> 
        FusionCharts. </div>
      <script type="text/javascript">
		   var chart = new FusionCharts("./class/FCF_MSColumn3D.swf", "ChartId", "900", "500");
		   chart.setDataURL("class/shopacc_year.xml");		   
		   chart.render("chartdiv");
		</script> </td>
  </tr></table>
</td>


           </tr>   </table>

          <?
elseif($worktype=="referer"):

  $total_sql = " select * from $counter_referer where date='$today' ";
  $result = mysql_query($total_sql) or die (mysql_error());
  $nTotalCount = mysql_num_rows($result);
  $nPage = ceil($nTotalCount / $nCount);
  if ($page == "") $page = 1;
  $nFrom = ($page - 1) * $nCount;
  $number=($nTotalCount-$nCount*($page-1))+1;
  $sql    = $total_sql . " order by hit desc limit $nFrom, $nCount ";
  $result = mysql_query($sql) or die (mysql_error());
  if($nTotalCount<1) {
                    echo "<tr> 
                            <td align=center bgcolor='#FFFFFF' class='bbs'><br>자료가 없습니다.</td>
                          </tr>";
} 
  for ($i=0;$i<mysql_num_rows($result);$i++) {
    $row = mysql_fetch_array($result);
 $number = $i+1;
    $coloruid = md5(uniqid(rand()));
    $coloruid = substr($coloruid,1,6);

if($row[referer] == "즐겨찾기") {
 $show_referer = "직접입력 혹은 즐겨찾기";

} else {
 $show_referer = "<a href='$row[referer] ' target='_blank'>" . cutstr(strip_tags( $row[referer]), 100) . "</a> "; 

}
  $referer_data .= "<tr> <td  bgcolor='#FFFFFF' class='bbs'>$number.  $show_referer  ($row[hit] hits)</td></tr>";
  }



?>



<table width='750' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc'>
<tr>  <td  bgcolor='f4f2f2' class='bbs'>접속자 방문경로
</tr>
 <tr>
<td height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
</tr>
<?=$referer_data;?>

                </tr>
              </table>

 <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor = FFFFFF >
                <tr> 
                  <td align = center> 
				  
<br>
<center><? echo pageListing($page, $nPage, $nCount, "$PHP_SELF?showmenu=$showmenu&worktype=$worktype&page=")?></center>
            
                  </td>
                </tr>
              </table>
          <?

elseif($worktype=="overture"):
?>
<table width='750' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc'>
<tr>  <td  bgcolor='f4f2f2' class='bbs'>오버추어 접속자 방문경로
</tr>
 <tr>
<td height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
</tr>
 <?
  $total_sql = " select hostname, overture,count(overture) AS ovture from $counter_content where date='$today' group by overture  ";
  $result = mysql_query($total_sql) or die (mysql_error());
  $nTotalCount = mysql_num_rows($result);
  $nPage = ceil($nTotalCount / $nCount);
  if ($page == "") $page = 1;
  $nFrom = ($page - 1) * $nCount;
  $number=($nTotalCount-$nCount*($page-1))+1;
  $sql    = $total_sql . " order by ovture desc limit $nFrom, $nCount ";
  $result = mysql_query($sql) or die (mysql_error());
  if($nTotalCount<1) {
                    echo "<tr> 
                            <td align=center bgcolor='#FFFFFF' class='bbs'><br>자료가 없습니다.</td>
                          </tr>";
} 
  for ($i=0;$i<mysql_num_rows($result);$i++) {
    $row = mysql_fetch_array($result);
 $number = $i+1;

if($row[overture] ) { $show_overture = "<a href='$row[overture]' target='_blank'>" . cutstr(strip_tags( $row[overture]), 100) . "</a> "; }
   echo "<tr> 
<td  bgcolor='#FFFFFF' class='bbs'>$number.  $show_overture  ($row[ovture] hits)</td></tr>";

  }

?>

                </tr>
              </table>

 <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor = FFFFFF >
                <tr> 
                  <td align = center> 
				  
<br>
<center><? echo pageListing($page, $nPage, $nCount, "$PHP_SELF?showmenu=$showmenu&worktype=$worktype&page=")?></center>
            
                  </td>
                </tr>
              </table>

          <?

elseif($worktype=="keyword"):
?>
<table width='750' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc'>
<tr>  <td colspan=2   bgcolor='f4f2f2' class='bbs'>접속자 키워드
</tr>
 <tr>
<td height='1' colspan=2  align='center' bgcolor='#cccccc' class='bbs'></td>
</tr></tr><td>
 <?

  $keysql = " select keyword,count(keyword) AS keysw from $counter_content where date <'$tomorrow' and date > '$yesterday' group by keyword   ";
  $keyresult = mysql_query($keysql) or die (mysql_error());
  $nTotalCount = mysql_num_rows($keyresult);
  $nPage = ceil($nTotalCount / $nCount);
  if ($page == "") $page = 1;
  $nFrom = ($page - 1) * $nCount;
  $number=($nTotalCount-$nCount*($page-1))+1;
  $sql    = $keysql . " order by keysw desc limit 20 ";
  $result = mysql_query($sql) or die (mysql_error());

  if(mysql_num_rows($result) < 1) {
echo "         <tr> 
            <td  colspan=2  bgcolor='#FFFFFF' class='bbs'>자료가 없습니다.</td></tr>";
}
  for ($i=0;$i<mysql_num_rows($result);$i++) {
    $keyrow = mysql_fetch_array($result);
    $coloruid = md5(uniqid(rand()));
    $coloruid = substr($coloruid,1,6);
  $kyword=$keyrow[0];
  $kyword_cnt=$keyrow[keysw];

if($kyword =="") { $kyword = "직접 혹은 즐겨찾기";}
   $graph_data .= "<set name='$kyword' value='$kyword_cnt' color='$coloruid' />";
 echo "<tr><td  bgcolor='#FFFFFF' class='bbs' width=50%>$kyword </td><td  bgcolor='#FFFFFF' class='bbs'> $kyword_cnt </td></tr>  ";
}

$CREATE_XMADATA = "
<graph caption='접속자 키워드' xAxisName='' bgcolor='ffffff' yAxisName='WON' pieSliceDepth='60' numberPrefix='' outCnvBaseFont = '굴림' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' showNames='1'   rotateNames='1' animation='1'   decimalPrecision='0' formatNumberScale='0' pieRadius='90' showPercentageInLabel='1' pieYScale='45' pieBorderAlpha='40' pieFillAlpha='70'>
$graph_data
</graph>";

$fp = fopen("./class/shopacc_keyword.xml", "w+");
fwrite($fp,"$CREATE_XMADATA"); 
fclose($fp); 
?>
<table width="900" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr> 
    <td valign="top" class="text" align="center"> <div id="chartdiv" align="center"> 
        FusionCharts. </div>
      <script type="text/javascript">
		   var chart = new FusionCharts("./class/FCF_Pie3D.swf", "ChartId", "900", "500");
		   chart.setDataURL("class/shopacc_keyword.xml");		   
		   chart.render("chartdiv");
		</script> </td>
  </tr></table>

<br>


</td></tr>
           </table>

 <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor = FFFFFF >
                <tr> 
                  <td align = center> 
				  
<br>
<center><? echo pageListing($page, $nPage, $nCount, "$PHP_SELF?showmenu=$showmenu&worktype=$worktype&page=")?></center>
            
                  </td>
                </tr>
              </table>

          <?

elseif($worktype=="engine"):
?>
<table width='750' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc'>
<tr>  <td colspan=2   bgcolor='f4f2f2' class='bbs'>접속사이트
</tr>
 <tr>
<td height='1' colspan=2  align='center' bgcolor='#cccccc' class='bbs'></td>
</tr><tr><td bgcolor='#fffff'>
 <?
  $total_sql = " select hostname,count(hostname) AS hosts from $counter_content where date <'$tomorrow' and date > '$yesterday'  group by hostname   ";
  $result = mysql_query($total_sql) or die (mysql_error());
  $nTotalCount = mysql_num_rows($result);
  $nPage = ceil($nTotalCount / $nCount);
  if ($page == "") $page = 1;
  $nFrom = ($page - 1) * $nCount;
  $number=($nTotalCount-$nCount*($page-1))+1;
  $sql    = $total_sql . " order by hosts desc limit $nFrom, $nCount ";
  $result = mysql_query($sql) or die (mysql_error());

  if(mysql_num_rows($result) < 1) {
echo "         <tr> 
            <td  colspan=2  bgcolor='#FFFFFF' class='bbs'>자료가 없습니다.</td></tr>";
}
  while($row=mysql_fetch_array($result)) {
    $coloruid = md5(uniqid(rand()));
    $coloruid = substr($coloruid,1,6);

  $host_name=$row[0];
  $host_cnt=$row[hosts];
if($host_name1 =="") { $host_name1 = "직접 혹은 즐겨찾기";} else { 
$host_name1 = "<a href='http://$host_name' target=_blank'>$host_name</a>"; 

}
 echo "<tr><td  bgcolor='#FFFFFF' class='bbs' width=50%>$host_name1 </td><td  bgcolor='#FFFFFF' class='bbs'> $host_cnt </td></tr> ";

   $graph_data .= "<set name='$host_name' value='$host_cnt' color='$coloruid' />"; 

}

$CREATE_XMADATA = "
<graph caption='접속사이트별' xAxisName='' bgcolor='ffffff' pieSliceDepth='60' numberPrefix='' outCnvBaseFont = '굴림' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' showNames='1'   rotateNames='1' animation='1'   decimalPrecision='0' formatNumberScale='0' pieRadius='90' showPercentageInLabel='1' pieYScale='45' pieBorderAlpha='40' pieFillAlpha='70'>
$graph_data
</graph>";

$fp = fopen("./class/shopacc_engine.xml", "w+");
fwrite($fp,"$CREATE_XMADATA"); 
fclose($fp); 
?>
<table width="900" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr> 
    <td valign="top" class="text" align="center"> <div id="chartdiv" align="center"> 
        FusionCharts. </div>
      <script type="text/javascript">
		   var chart = new FusionCharts("./class/FCF_Pie3D.swf", "ChartId", "900", "500");
		   chart.setDataURL("class/shopacc_engine.xml");		   
		   chart.render("chartdiv");
		</script> </td>
  </tr></table>

<br>
</td></tr>

              </table>

 <table width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor = FFFFFF >
                <tr> 
                  <td align = center> 
				  
<br>
<center><? echo pageListing($page, $nPage, $nCount, "$PHP_SELF?showmenu=$showmenu&worktype=$worktype&page=")?></center>
            
                  </td>
                </tr>
              </table>
          <?

endif;

?>
        </form>
      </table></td>
  </tr>
</table>
