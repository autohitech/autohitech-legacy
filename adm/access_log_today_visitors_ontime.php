<?php
include_once("./_common.php");
$g4[title] = "접속통계> 체류시간";
include_once("./admin.head.php");
require './acclog/acclog.account.php';


echo "<link href='./acclog/button.css' rel='stylesheet' type='text/css'>";

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



foreach($ga->getResults() as $result) {
$monthofdate = $result->getHour();

$total_count = $ga->getVisits();
$s_visits = $result->getVisits();


 $s_visits = $s_visits;  $s_pageviews = $s_pageviews;  $s_unit = "";

   if($total_count>0) {
$category_data .= "<category name='".$monthofdate."시'  hoverText='".$monthofdate."시' />"; 

   $graph_data_1 .= "<set value='".$s_visits."' />";
   $graph_data_2 .= "<set value='".$result->gettimeOnSite()."' />";
   $graph_data_3 .= "<set value='".$result->getavgTimeOnSite()."' />";
}
$i++;

}

// <graph caption='Sales' PYAxisName='Revenue' SYAxisName='Quantity' numberPrefix='$' showvalues='0'  numDivLines='4' formatNumberScale='0' decimalPrecision='0' anchorSides='10' anchorRadius='3' anchorBorderColor='009900'>

$CREATE_XMADATA = "
<graph caption=' $start_date  체류시간 방문통계 (단위 :".$s_unit."명)' PYAxisName='방문객' SYAxisName='초' subcaption=' ' bgColor='ffffff' hovercapbg='DEDEBE' hovercapborder='889E6D' xAxisName='' yAxisName=''  numdivlines='9' divLineColor='CCCCCC' divLineAlpha='80' outCnvBaseFont = '굴림' numberPrefix='' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' showNames='1'  rotateNames='0' animation='1' decimalPrecision='0' formatNumberScale='0' showAlternateHGridColor='1' AlternateHGridAlpha='30' AlternateHGridColor='CCCCCC'>
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
$fp = fopen("./class/shopacc_ontime.xml", "w+");
fwrite($fp,"$CREATE_XMADATA"); 
fclose($fp); 

$normal_date = date("Y-m-d H:i:s", strtotime($ga->getUpdated()));

echo "
<table width='100%' border='0' cellpadding='3' cellspacing='1' align=center>
                  <tr>
                    <td align='center'><a href='$PHP_SELF?cdate=today'><span class='button orange medium'>오늘</span></a>
                    <a href='$PHP_SELF?cdate=1d'><span class='button orange medium'>어제</span></a>
                    <a href='$PHP_SELF?cdate=2d'><span class='button orange medium'>2일전</span></a>
                    <a href='$PHP_SELF?cdate=3d'><span class='button orange medium'>3일전</span></a>
                    <a href='$PHP_SELF?cdate=4d'><span class='button orange medium'>4일전</span></a>
                    <a href='$PHP_SELF?cdate=5d'><span class='button orange medium'>5일전</span></a>
                    <a href='$PHP_SELF?cdate=6d'><span class='button orange medium'>6일전</span></a>
</tr></table><br>

";

?>
<table width="98%" border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
<tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'><b><?=$start_date;?> 체류시간 방문통계 </b>
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
		   var chart = new FusionCharts("./class/FCF_MSColumn3DLineDY.swf", "ChartId", "1000", "500");
		   chart.setDataURL("class/shopacc_ontime.xml");		   
		   chart.render("chartdiv");
		</script> </td>
  </tr></table>

<table width='98%' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
                  <tr>
  <td bgcolor='f4f2f2' class='bbs' align=center>시간</td>
  <td bgcolor='f4f2f2' class='bbs' align=center>방문객수</td>
  <td bgcolor='f4f2f2' class='bbs' align=center>총 체류시간</td>
  <td bgcolor='f4f2f2' class='bbs' align=center>방문당 체류시간</td>
</tr>
 <tr>
<td height='1' colspan='9' align='center' bgcolor='#cccccc' class='bbs'></td>
</tr>
<?php
foreach($ga->getResults() as $result){


?>
<tr>
  <td bgcolor='ffffff' align=center><?php echo $result->getHour() ?>시</td>
  <td bgcolor='ffffff' align=center><?php echo number_format($result->getVisits()) ?>명</td>
  <td bgcolor='ffffff' align=center><?php echo getTimeFromSeconds($result->gettimeOnSite()) ?></td>
  <td bgcolor='ffffff' align=center><?php echo getTimeFromSeconds($result->getavgTimeOnSite()) ?></td>
</tr>
<?php
}
?>
</table>
<?
include_once("./admin.tail.php");
?>
    </body>
</html>
