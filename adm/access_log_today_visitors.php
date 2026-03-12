<?php
include_once("./_common.php");
$g4[title] = "접속통계> 시간";
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

$ga->requestReportData(ga_profile_id,array('day','hour'),array('pageviews','visits','newVisits','percentNewVisits'),'hour',$filter,$start_date,$start_date,$start_index,$max_results); 
                                       //report_id, dimensions, metrics, sort_metric, filter, start_date, end_date, start_index, max_results

$total_count = $ga->getVisits();

foreach($ga->getResults() as $result) {
$monthofdate = $result->getHour();


$s_visits = $result->getVisits();
$s_pageviews = $result->getPageviews();

 $s_visits = $s_visits;  $s_pageviews = $s_pageviews;  $s_unit = "";


$category_data .= "<category name='".$monthofdate."시'  hoverText='".$monthofdate."시' />"; 
   if($total_count>0) {
   $graph_data_1 .= "<set value='".$s_pageviews."' />";
   $graph_data_2 .= "<set value='".$s_visits."' />";
 }

$i++;

}


$CREATE_XMADATA = "
<graph caption=' $start_date  방문통계 (단위 :".$s_unit."명)' subcaption=' ' bgColor='ffffff' hovercapbg='DEDEBE' hovercapborder='889E6D' xAxisName='' yAxisName=''  numdivlines='9' divLineColor='CCCCCC' divLineAlpha='80' outCnvBaseFont = '굴림' numberPrefix='' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' showNames='1'  rotateNames='0' animation='1' decimalPrecision='0' formatNumberScale='0' showAlternateHGridColor='1' AlternateHGridAlpha='30' AlternateHGridColor='CCCCCC'>
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
<tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'><b><?=$start_date;?> 방문통계 </b>
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
		   var chart = new FusionCharts("./class/FCF_MSColumn3D.swf", "ChartId", "1000", "500");
		   chart.setDataURL("class/shopacc_month.xml");		   
		   chart.render("chartdiv");
		</script> </td>
  </tr></table>

<table width='98%' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
                  <tr>
  <td bgcolor='f4f2f2' class='bbs' align=center>시간</td>
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
  <td bgcolor='ffffff' align=center><?php echo $result->getHour() ?>시</td>
  <td bgcolor='ffffff'  align=center><?php echo number_format($result->getPageviews()) ?>페이지</td>
  <td bgcolor='ffffff' align=center><?php echo number_format($result->getVisits()) ?>명</td>
  <td bgcolor='ffffff' align=center><?php echo number_format($result->getnewVisits()) ?>명(<?php echo number_format($result->getpercentNewVisits());?>%)</td>
  <td bgcolor='ffffff' align=center><?php echo number_format($revisitors) ?>명(<?php echo number_format($revisitors_per);?>%)</td>
  <td bgcolor='ffffff' align=center><?php echo $pervisitors;?>페이지 </td>
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
