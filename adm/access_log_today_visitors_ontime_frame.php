<?php

require './acclog/acclog.account.php';


if($start_date) {
$sdate = explode('-',$start_date); 
$year = $sdate[0];
}
if(!$year) $year=date("Y");
if(!$month) $month=date("m");
if(!$day) $day=date("d");


if($cdate == "today") {$start_date = date("Y-m-d");  }
else if($cdate == "1d") {$start_date= date("Y-m-d",strtotime("-1 day")); }
else if($cdate == "2d") {$start_date= date("Y-m-d",strtotime("-2 day")); }
else if($cdate == "3d") {$start_date= date("Y-m-d",strtotime("-3 day"));}
else if($cdate == "4d") {$start_date= date("Y-m-d",strtotime("-4 day"));}
else if($cdate == "5d") {$start_date= date("Y-m-d",strtotime("-5 day"));}
else if($cdate == "6d") {$start_date= date("Y-m-d",strtotime("-6 day"));}
else {
if($cdate == "") $start_date = date("Y-m-d");
}


$filter = '';
//$filter = 'country == United States && browser == Firefox || browser == Chrome';

if(trim($start_date) == "") $start_date= date("Y-m-d");
if(trim($end_date) == "") $end_date = date("Y-m-d");

$start_index="1";
$max_results="100";

$ga->requestReportData(ga_profile_id,array('day','hour'),array('visits','timeOnSite','avgTimeOnSite'),'hour',$filter,$start_date,$start_date,$start_index,$max_results); 
                                       //report_id, dimensions, metrics, sort_metric, filter, start_date, end_date, start_index, max_results
$i =0;
$cmod = "3";

foreach($ga->getResults() as $result) {
$monthofdate = $result->getHour();

$total_count = $ga->getVisits();
$s_visits = $result->getVisits();


 $s_visits = $s_visits;  $s_pageviews = $s_pageviews;  $s_unit = "";


   if($total_count>0) {
  if(($i%$cmod==0 && $i!=0) || $cmod<2) {$category_data .=  "<category name='".$monthofdate."시'  hoverText='".$monthofdate."시' />"; 
  } else {
  $category_data .=  "<category name=''  hoverText='".$monthofdate."시' />"; 
 }

   $graph_data_1 .= "<set value='".$s_visits."' />";
   $graph_data_2 .= "<set value='".$result->gettimeOnSite()."' />";
   $graph_data_3 .= "<set value='".$result->getavgTimeOnSite()."' />";
}
$i++;

}


$CREATE_XMADATA = "
<graph caption=' $start_date  체류시간 (단위 :".$s_unit."명)' PYAxisName='방문객' SYAxisName='초' subcaption=' ' bgColor='ffffff' hovercapbg='DEDEBE' hovercapborder='889E6D' xAxisName='' yAxisName=''  numdivlines='9' divLineColor='CCCCCC' divLineAlpha='80' outCnvBaseFont = '굴림' numberPrefix='' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' showNames='1'  rotateNames='0' animation='1' decimalPrecision='0' formatNumberScale='0' showAlternateHGridColor='1' AlternateHGridAlpha='30' AlternateHGridColor='CCCCCC'>
 <categories font='굴림체' fontSize='12' fontColor='000000'>
 $category_data
</categories>
<dataset seriesname='방문객수' color='56B9F9' showValues='1'>
$graph_data_1
</dataset>
<dataset seriesName='체류시간' color='ff0000' showValues='0' parentYAxis='S' >
$graph_data_2
</dataset>
<dataset seriesName='평균체류시간' color='0028a2' showValues='0' parentYAxis='S' >
$graph_data_3
</dataset>
</graph>";
// // $CREATE_XMADATA  = iconv("utf-8","euc-kr",$CREATE_XMADATA); // UTF-8 Modernization
$fp = fopen("./class/shopacc_ontime_frame.xml", "w+");
fwrite($fp,"$CREATE_XMADATA"); 
fclose($fp); 

?>
