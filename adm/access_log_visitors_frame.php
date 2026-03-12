<?php

require './acclog/acclog.account.php';

if(trim($start_date) == "") $start_date= date("Y-m-d",strtotime("-5 day"));
if(trim($end_date) == "") $end_date = date("Y-m-d");

if($start_date) {
$sdate = explode('-',$start_date); 
$year = $sdate[0];
}
if(!$year) $year=date("Y");
if(!$month) $month=date("m");
if(!$day) $day=date("d");


//날자별

$filter_1 = '';
$ga->requestReportData(ga_profile_id,array('year','month','day'),array('pageviews','visits','newVisits','percentNewVisits'),'month',$filter_1,$start_date,$end_date,'1','6'); 
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

foreach($ga->getResults() as $result_1) {
$monthofdate = $result_1->getMonth()."/".$result_1->getDay();

$d_Year = $result_1->getYear();
$d_Month = $result_1->getMonth();
$d_Day = $result_1->getDay();

$yoil_temp = date("w",mktime(0,0,0,$d_Month,$d_Day,$d_Year));
$yoilarray = array(일,월,화,수,목,금,토);
$yoil = $yoilarray[$yoil_temp]; 
$s_visits = $result_1->getVisits();
$s_pageviews = $result_1->getPageviews();

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

  if(($i%$cmod==0 && $i!=0) || $cmod<2) {$category_data .= "<category name='$monthofdate'  hoverText='$monthofdate($yoil)' />"; 
  } else {
  $category_data .= "<category name=''  hoverText='$monthofdate' />";
 }
   if($total_count>0) {
   $graph_data_1 .= "<set value='".$s_pageviews."' />";
   $graph_data_2 .= "<set value='".$s_visits."' />";
   }

$i++;

}


$CREATE_XMADATA_1 = "
<graph caption=' $start_date ~ $end_date  (단위 :".$s_unit."명)' subcaption=' ' bgColor='ffffff' hovercapbg='DEDEBE' hovercapborder='889E6D' xAxisName='' yAxisName=''  numdivlines='9' divLineColor='CCCCCC' divLineAlpha='80' outCnvBaseFont = '굴림' numberPrefix='' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' showNames='1'  rotateNames='0' animation='1' decimalPrecision='0' formatNumberScale='0' showAlternateHGridColor='1' AlternateHGridAlpha='30' AlternateHGridColor='CCCCCC'>
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
// // $CREATE_XMADATA_1  = iconv("utf-8","euc-kr",$CREATE_XMADATA_1); // UTF-8 Modernization
$fp = fopen("./class/shopacc_month_frame.xml", "w+");
fwrite($fp,"$CREATE_XMADATA_1"); 
fclose($fp); 
?>
