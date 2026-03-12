<?php
include_once("./_common.php");
$g4[title] = "접속통계> 많이 찾는 페이지";
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




$filter = 'medium==referral';
//$filter = 'country == United States && browser == Firefox || browser == Chrome';



$start_index="1";
$max_results="17";

$ga->requestReportData(ga_profile_id,array('pagePath','landingPagePath','secondPagePath','exitPagePath','previousPagePath','nextPagePath'),array('pageviews','uniquePageviews','timeOnPage','bounces','entrances','exits'),'-pageviews',$filter,$start_date,$end_date,$start_index,$max_results); 
                                       //report_id, dimensions, metrics, sort_metric, filter, start_date, end_date, start_index, max_results pageviews



$num_days = days_between($start_date, $end_date); 
$total_count = $ga->getPageviews();

$i =0;


foreach($ga->getResults() as $result) {



$yoil_temp = date("w",mktime(0,0,0,$d_Month,$d_Day,$d_Year));
$yoilarray = array(일,월,화,수,목,금,토);
$yoil = $yoilarray[$yoil_temp]; 

$s_pageviews = $result->getPageviews();

 $s_pageviews = $s_pageviews;  $s_unit = "";

/*
$s_source = local_msg($result->getRegion());
if($s_source =="") {
$ssource = "기타";
} else {
$ssource = $s_source;
}
*/
$ssource = $result->getPagePath();
$ssource = iconv("UTF-8","EUC-KR", $ssource);
    $coloruid = md5(uniqid(rand()));
    $coloruid = substr($coloruid,1,6);


$category_data .= "<category name='검색어'  hoverText='검색어' />"; 
   if($i<17) {
   if($total_count>0) {
   $graph_data .= "<set name='$ssource' value='$s_pageviews' color='$coloruid' />"; 
   }
   }

$i++;

}


$CREATE_XMADATA = "
<graph caption='페이지별' xAxisName='' bgcolor='ffffff' yAxisName='WON' pieSliceDepth='60' numberPrefix='' outCnvBaseFont = '굴림' outCnvBaseFontSze='35'  baseFont='굴림체' baseFontSize='15' showNames='1'   rotateNames='1' animation='1'   decimalPrecision='0' formatNumberScale='0' pieRadius='90' showPercentageInLabel='1' pieYScale='45' pieBorderAlpha='40' pieFillAlpha='70'>
$graph_data
</graph>";

// // $CREATE_XMADATA  = iconv("utf-8","euc-kr",$CREATE_XMADATA); // UTF-8 Modernization

$fp = fopen("./class/shopacc_topcontent.xml", "w+");
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
<tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'><b>페이지별 방문통계  :<? echo "$start_date ~ $end_date";?></b>
</tr>
 <tr>
<td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
</tr>
<tr> 
<td  bgcolor='#FFFFFF' class='bbs'>
              &nbsp; 
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
    <td valign="top" class="text" align="center"> <div id="chartdiv" align="center"> </div>
      <script type="text/javascript">
		   var chart = new FusionCharts("./class/FCF_Pie3D.swf", "ChartId", "900", "300");
		   chart.setDataURL("./class/shopacc_topcontent.xml");		   
		   chart.render("chartdiv");
		</script> </td>
  </tr></table>

<table width='98%' border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
                  <tr>
  <td bgcolor='f4f2f2' class='bbs' align=center>페이지</td>
  <td bgcolor='f4f2f2' class='bbs' align=center>순 방문객수</td>
  <td bgcolor='f4f2f2' class='bbs' align=center>페이지뷰</td>
  <td bgcolor='f4f2f2' class='bbs' align=center>시작된 페이지</td>
  <td bgcolor='f4f2f2' class='bbs' align=center>종료된 페이지</td>
</tr>
 <tr>
<td height='1' colspan='9' align='center' bgcolor='#cccccc' class='bbs'></td>
</tr>
<?php
foreach($ga->getResults() as $result){

$ssource = $result->getPagePath();
$ssource = iconv("UTF-8","EUC-KR", $ssource);
$ssource = "<a href='$ssource' target='_blank'>$ssource</a>";
?>
<tr>
  <td bgcolor='ffffff' align=left style='padding-left:20px'><?php echo $ssource;?>

</td>
  <td bgcolor='ffffff' align=center><?php echo number_format($result->getUniquePageviews()) ?>명</td>
  <td bgcolor='ffffff' align=center><?php echo number_format($result->getPageviews()) ?>페이지</td>
  <td bgcolor='ffffff' align=center><?php echo number_format($result->getEntrances()) ?>명 </td>
  <td bgcolor='ffffff' align=center><?php echo number_format($result->getExits()) ?>명 </td>
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
