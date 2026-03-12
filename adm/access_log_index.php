<?php
include_once("./_common.php");
$g4[title] = "접속통계> 메인";
include_once("./admin.head.php");
require './acclog/acclog.account.php';


?>
<iframe src="./access_log_visitors_frame.php" frameborder="0" width="1" height="1" marginwidth="0" marginheight="0" scrolling="no"> </iframe>
<iframe src="./access_log_today_visitors_ontime_frame.php" frameborder="0" width="1" height="1" marginwidth="0" marginheight="0" scrolling="no"> </iframe>
<iframe src="./access_log_engine_frame.php" frameborder="0" width="1" height="1" marginwidth="0" marginheight="0" scrolling="no"> </iframe>
<iframe src="./access_log_word_frame.php" frameborder="0" width="1" height="1" marginwidth="0" marginheight="0" scrolling="no"> </iframe>

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr> 
     <td>
         <table width="98%" border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
           <tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'><b>날짜별</b> 
          </tr>
          <tr>
             <td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
         </tr>
         <tr> 
           <td  bgcolor='#FFFFFF' class='bbs'>
              <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
                  <tr> 
                     <td valign="top" class="text" align="center"> <div id="chartdiv1" align="center"> </div>
                                 <script type="text/javascript">
                                                    google.charts.setOnLoadCallback(function() {
                                                        drawFusionChartXML("./class/shopacc_month_frame.xml", "chartdiv1", "Column", 500, 500);
                                                    });
                                                 </script> </td>
                   </tr>
                </table>
              </td>
             </tr>
          </table>
       </td>
       <td>
         <table width="98%" border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
          <tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'><b>사이트 체류시간</b> 
          </tr>
          <tr>
            <td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
         </tr>
         <tr> 
         <td  bgcolor='#FFFFFF' class='bbs'>
                <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
                   <tr> 
                    <td valign="top" class="text" align="center"> <div id="chartdiv2" align="center"></div>
                                  <script type="text/javascript">
                   google.charts.setOnLoadCallback(function() {
                       drawFusionChartXML("class/shopacc_ontime_frame.xml", "chartdiv2", "Line", 500, 500);
                   });
                </script> </td>
                 </tr>
               </table>
              </td>
           </tr>
          </table>
        </td>
       </tr>


  <tr> 
     <td height='10'>
        </td>
       </tr>


  <tr> 
     <td>
         <table width="98%" border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
           <tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'><b>검색엔진</b> 
          </tr>
          <tr>
             <td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
         </tr>
         <tr> 
           <td  bgcolor='#FFFFFF' class='bbs'>
              <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
                  <tr> 
                     <td valign="top" class="text" align="center"> <div id="chartdiv3" align="center"> </div>
                                       <script type="text/javascript">
                   google.charts.setOnLoadCallback(function() {
                       drawFusionChartXML("./class/shopacc_engine_frame.xml", "chartdiv3", "Pie", 500, 300);
                   });
                </script> </td>
                   </tr>
                </table>
              </td>
             </tr>
          </table>
       </td>
       <td>
         <table width="98%" border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
          <tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'><b>검색어</b> 
          </tr>
          <tr>
            <td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
         </tr>
         <tr> 
         <td  bgcolor='#FFFFFF' class='bbs'>
                <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
                   <tr> 
                    <td valign="top" class="text" align="center"> <div id="chartdiv4" align="center"></div>
                                  <script type="text/javascript">
                   google.charts.setOnLoadCallback(function() {
                       drawFusionChartXML("./class/shopacc_keyword_frame.xml", "chartdiv4", "Pie", 500, 300);
                   });
                </script> </td>
                 </tr>
               </table>
              </td>
           </tr>
          </table>
        </td>
       </tr>




  <tr> 
     <td height='10'>
        </td>
       </tr>


  <tr> 
     <td>
         <table width="98%" border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
           <tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'><b>지역</b> 
          </tr>
          <tr>
             <td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
         </tr>
         <tr> 
           <td  bgcolor='#FFFFFF' class='bbs'>
              <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
                  <tr> 
                     <td valign="top" class="text" align="center"> <div id="chartdiv5" align="center"> </div>
                                            <script type="text/javascript">
                   google.charts.setOnLoadCallback(function() {
                       drawFusionChartXML("./class/shopacc_country_frame.xml", "chartdiv5", "Pie", '100%', 300);
                   });
                </script> </td>
                   </tr>
                </table>
              </td>
             </tr>
          </table>
       </td>
       <td>
         <table width="98%" border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
          <tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'><b>브라우져</b> 
          </tr>
          <tr>
            <td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
         </tr>
         <tr> 
         <td  bgcolor='#FFFFFF' class='bbs'>
                <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
                   <tr> 
                    <td valign="top" class="text" align="center"> <div id="chartdiv6" align="center"></div>
                                  <script type="text/javascript">
                   google.charts.setOnLoadCallback(function() {
                       drawFusionChartXML("./class/shopacc_browsers_frame.xml", "chartdiv6", "Pie", '100%', 300);
                   });
                </script> </td>
                 </tr>
               </table>
              </td>
           </tr>
          </table>
        </td>
       </tr>



  <tr> 
     <td height='10'>
        </td>
       </tr>


  <tr> 
     <td>
         <table width="98%" border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
           <tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'><b>운영체제</b> 
          </tr>
          <tr>
             <td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
         </tr>
         <tr> 
           <td  bgcolor='#FFFFFF' class='bbs'>
              <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
                  <tr> 
                     <td valign="top" class="text" align="center"> <div id="chartdiv7" align="center"> </div>
                                            <script type="text/javascript">
                   google.charts.setOnLoadCallback(function() {
                       drawFusionChartXML("./class/shopacc_system_frame.xml", "chartdiv7", "Pie", '100%', 300);
                   });
                </script> </td>
                   </tr>
                </table>
              </td>
             </tr>
          </table>
       </td>
       <td>
         <table width="98%" border='0' cellpadding='3' cellspacing='1' bgcolor='cccccc' align="center">
          <tr>  <td  colspan=2 bgcolor='f4f2f2' class='bbs'><b>해상도</b> 
          </tr>
          <tr>
            <td colspan=2 height='1' align='center' bgcolor='#cccccc' class='bbs'></td>
         </tr>
         <tr> 
         <td  bgcolor='#FFFFFF' class='bbs'>
                <table width="100%" border="0" cellspacing="0" cellpadding="3" align="center">
                   <tr> 
                    <td valign="top" class="text" align="center"> <div id="chartdiv8" align="center"></div>
                                  <script type="text/javascript">
                   google.charts.setOnLoadCallback(function() {
                       drawFusionChartXML("./class/shopacc_screen_frame.xml", "chartdiv8", "Pie", '100%', 300);
                   });
                </script> </td>
                 </tr>
               </table>
              </td>
           </tr>
          </table>
        </td>
       </tr>








</table>


<iframe src="./access_log_region_frame.php" frameborder="0" width="1" height="1" marginwidth="0" marginheight="0" scrolling="no"> </iframe>
<iframe src="./access_log_browsers_frame.php" frameborder="0" width="1" height="1" marginwidth="0" marginheight="0" scrolling="no"> </iframe>
<iframe src="./access_log_system_frame.php" frameborder="0" width="1" height="1" marginwidth="0" marginheight="0" scrolling="no"> </iframe>
<iframe src="./access_log_screen_frame.php" frameborder="0" width="1" height="1" marginwidth="0" marginheight="0" scrolling="no"> </iframe>
<?
include_once("./admin.tail.php");
?>

    </body>
</html>
