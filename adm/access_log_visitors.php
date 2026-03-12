<?php
include_once("./_common.php");
$g4[title] = "접속통계> 날짜";
include_once("./admin.head.php");
require './acclog/acclog.account.php';

if(trim($start_date) == "") $start_date= date("Y-m-d",strtotime("-30 day"));
if(trim($end_date) == "") $end_date = date("Y-m-d");

if($start_date) {
$sdate = explode('-',$start_date); 
$year = $sdate[0];
}
if(!$year) $year=date("Y");
if(!$month) $month=date("m");
if(!$day) $day=date("d");




$filter = '';
//$filter = 'country == United States && browser == Firefox || browser == Chrome';



$start_index="1";
$max_results="100";

$ga->requestReportData(ga_profile_id,array('year','month','day'),array('pageviews','visits','newVisits','percentNewVisits'),'month',$filter,$start_date,$end_date,$start_index,$max_results); 
                                       //report_id, dimensions, metrics, sort_metric, filter, start_date, end_date, start_index, max_results


$num_days = days_between($start_date, $end_date); 
$total_count = $ga->getVisits();

$i =0;

if($num_days <21) {$cmod = "1";
} else if ( ($num_days>20) ||  ($num_days<41) ) {
$cmod = "3";
} else if ( ($num_days>40) ||  ($num_days<61) ) {
$cmod = "4";
} else if ( ($num_days>60) ||  ($num_days<81) ) {
$cmod = "5";
} else if ( ($num_days>80) ||  ($num_days<101) ) {
$cmod = "6";
} else {

$cmod = "7";
 }

foreach($ga->getResults() as $result) {
$monthofdate = $result->getMonth()."/".$result->getDay();

$d_Year = $result->getYear();
$d_Month = $result->getMonth();
$d_Day = $result->getDay();

$yoil_temp = date("w",mktime(0,0,0,$d_Month,$d_Day,$d_Year));
$yoilarray = array(일,월,화,수,목,금,토);
$yoil = $yoilarray[$yoil_temp]; 
$s_visits = $result->getVisits();
$s_pageviews = $result->getPageviews();

if ($num_days>16)  {
if($s_visits>100) { $s_visits = $s_visits/100; $s_pageviews = $s_pageviews/100; $s_unit = "백";
}else if($s_visits>1000) { $s_visits = $s_visits/1000;  $s_pageviews = $s_pageviews/1000; $s_unit = "천";
}else if($s_visits>10000) { $s_visits = $s_visits/10000;  $s_pageviews = $s_pageviews/1000; $s_unit = "만";
} else {
 $s_visits = $s_visits;  $s_pageviews = $s_pageviews;  $s_unit = "";
}
} else {
 $s_visits = $s_visits;  $s_pageviews = $s_pageviews;  $s_unit = "";

}

  if(($i%$cmod==0 && $i!=0) || $cmod<2) {$category_data .= "<category name='$monthofdate($yoil)'  hoverText='$monthofdate($yoil)' />"; 
  } else {
  $category_data .= "<category name=''  hoverText='$monthofdate' />";
 }
   if($total_count>0) {
   $graph_data_1 .= "<set value='".$s_pageviews."' />";
   $graph_data_2 .= "<set value='".$s_visits."' />";
   }

$i++;

}


$CREATE_XMADATA = "
<graph caption=' $start_date ~ $end_date 방문통계 (단위 :".$s_unit."명)' subcaption=' ' bgColor='ffffff' hovercapbg='DEDEBE' hovercapborder='889E6D' xAxisName='' yAxisName=''  numdivlines='9' divLineColor='CCCCCC' divLineAlpha='80' outCnvBaseFont = '굴림' numberPrefix='' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' showNames='1'  rotateNames='0' animation='1' decimalPrecision='0' formatNumberScale='0' showAlternateHGridColor='1' AlternateHGridAlpha='30' AlternateHGridColor='CCCCCC'>
 <categories font='굴림체' fontSize='12' fontColor='000000'>
 $category_data
</categories>
<dataset seriesname='페이지뷰' color='FDC12E'>
$graph_data_1
</dataset>
<dataset seriesname='방문객수' color='56B9F9'>
$graph_data_2
</dataset>
</graph>";
// // $CREATE_XMADATA  = iconv("utf-8","euc-kr",$CREATE_XMADATA); // UTF-8 Modernization
$fp = fopen("./class/shopacc_month.xml", "w+");
fwrite($fp,"$CREATE_XMADATA"); 
fclose($fp); 

$normal_date = date("Y-m-d H:i:s", strtotime($ga->getUpdated()));

echo "
<table width='100%' border='0' cellpadding='3' cellspacing='1' align=center>
                  <tr>
                    <td align='center'>
<form name=frm_caption action='$PHP_SELF'>
<input type=hidden name=showmenu value='$showmenu'>
<input type=hidden name=worktype value='$worktype'>
<input type=text id=start_date name=start_date value='$start_date' size=10 maxlength=10>
-
<input type=text id=end_date name=to_date value='$end_date' size=10 maxlength=10>
<input type=submit value=' 검 색 '>
</form>
</td></tr></table>

";

?>
<table width="98%" border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
<tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'>날짜별 방문통계 
</tr>
 <tr>
<td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
</tr>
<tr> 
<td  bgcolor='#FFFFFF' class='bbs'>
              &nbsp; 
              총 방문자수 : 
              <?php echo number_format($ga->getVisits()) ?> 명
              <br> &nbsp; 
              총 페이지뷰 : 
              <?php echo number_format($ga->getPageviews()) ?> 페이지
              <br> &nbsp; 
              업데이트 일시 : 
              <?php echo $normal_date ?> 
             </td>
          </tr>
</table>



<table width="98%" border="0" cellspacing="0" cellpadding="3" align="center">
  <tr> 
    <td valign="top" class="text" align="center"> <div id="chartdiv" align="center"> 
        FusionCharts. </div>
      <script type="text/javascript">
		   var chart = new FusionCharts("./class/FCF_MSColumn3D.swf", "ChartId", "980", "500");
		   chart.setDataURL("class/shopacc_month.xml");		   
		   chart.render("chartdiv");
		</script> </td>
  </tr></table>

<table width='98%' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
                  <tr>
  <td bgcolor='f4f2f2' class='bbs' align=center>일시</td>
  <td bgcolor='f4f2f2' class='bbs' align=center>페이지뷰</td>
  <td bgcolor='f4f2f2' class='bbs' align=center>방문객수</td>
  <td bgcolor='f4f2f2' class='bbs' align=center>신규 방문객수(%)</td>
  <td bgcolor='f4f2f2' class='bbs' align=center>재방문객수(%)</td>
  <td bgcolor='f4f2f2' class='bbs' align=center>방문당페이지뷰</td>
</tr>
 <tr>
<td height='1' colspan='9' align='center' bgcolor='#cccccc' class='bbs'></td>
</tr>
<?php
foreach($ga->getResults() as $result){
if($result->getVisits()>0) {
$revisitors = $result->getVisits()-$result->getnewVisits();
$revisitors_per = ($revisitors/$result->getVisits())*100;
$pervisitors = round(($result->getPageviews()/$result->getVisits()),2);
} else {
$revisitors= 0;
$revisitors_per = 0;
$pervisitors =  0;
}

?>
<tr>
  <td bgcolor='ffffff' align=center><?php echo $result->getMonth() ?>/<?php echo $result->getDay() ?></td>
  <td bgcolor='ffffff' align=center><?php echo number_format($result->getPageviews()) ?>페이지</td>
  <td bgcolor='ffffff' align=center><?php echo number_format($result->getVisits()) ?>명</td>
  <td bgcolor='ffffff' align=center><?php echo number_format($result->getnewVisits()) ?>명(<?php echo number_format($result->getpercentNewVisits());?>%)</td>
  <td bgcolor='ffffff' align=center><?php echo number_format($revisitors) ?>명(<?php echo number_format($revisitors_per);?>%)</td>
  <td bgcolor='ffffff' align=center><?php echo $pervisitors;?>페이지 </td>
</tr>
<?php
}
?>
</table>
	<script type="text/javascript">
	$(function() {
		$('#start_date').datepicker({
                  dateFormat: 'yy-mm-dd',
                  showOn: 'button',
                  buttonImage: '/css/images/calendar.gif',
                  buttonImageOnly: true
            });
		$('#end_date').datepicker({
                  dateFormat: 'yy-mm-dd',
                  showOn: 'button',
                  buttonImage: '/css/images/calendar.gif',
                  buttonImageOnly: true
            });
	});
	</script>
<?
include_once("./admin.tail.php");
?>
    </body>
</html>
