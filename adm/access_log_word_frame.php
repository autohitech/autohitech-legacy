<?php

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




//$filter = 'medium==cpa || medium==cpc || medium==cpm || medium==cpp || medium==cpv || medium==organic || medium==ppc';
//$filter = 'country == United States && browser == Firefox || browser == Chrome';



$start_index="1";
$max_results="100";

$ga->requestReportData(ga_profile_id,array('keyword'),array('visits','pageviews','newvisits','timeOnSite','exits'),'-visits',$filter,$start_date,$end_date,$start_index,$max_results); 
                                       //report_id, dimensions, metrics, sort_metric, filter, start_date, end_date, start_index, max_results


$num_days = days_between($start_date, $end_date); 
$total_count = $ga->getVisits();

$i =0;


foreach($ga->getResults() as $result) {



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
/*
$s_source = search_msg($result->getSource());
if($s_source =="") {
$ssource = $result->getSource();
} else {
$ssource = $s_source;
}
*/

    $coloruid = md5(uniqid(rand()));
    $coloruid = substr($coloruid,1,6);

$sKey = iconv("UTF-8","EUC-KR", $result->getKeyword());

$category_data .= "<category name='검색어'  hoverText='검색어' />"; 
   if($i<11) {
   if($total_count>0) {
   $graph_data .= "<set name='$sKey' value='$s_visits' color='$coloruid' />"; 
   }
   }

$i++;

}


$CREATE_XMADATA = "
<graph caption='검색어별' xAxisName='' bgcolor='ffffff' yAxisName='WON' pieSliceDepth='60' numberPrefix='' outCnvBaseFont = '굴림' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' showNames='1'   rotateNames='1' animation='1'   decimalPrecision='0' formatNumberScale='0' pieRadius='90' showPercentageInLabel='1' pieYScale='45' pieBorderAlpha='40' pieFillAlpha='70'>
$graph_data
</graph>";

// // $CREATE_XMADATA  = iconv("utf-8","euc-kr",$CREATE_XMADATA); // UTF-8 Modernization

$fp = fopen("./class/shopacc_keyword_frame.xml", "w+");
fwrite($fp,"$CREATE_XMADATA"); 
fclose($fp); 
?>
