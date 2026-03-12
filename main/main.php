<?php
$g4_path = "..";
$g4["path"] = "..";
include_once("../_common.php");
include_once("$g4[path]/lib/latest.lib.php");

$g4['title'] = "오토하이테크(주)";
include_once("$g4[path]/head.sub.php");
include_once("../inc/top_menu.html");
?>

<script type="text/javascript">
// 공지사항/Q&A 탭 전환 함수 (Modernized)
function DisplayMenu(index) {
    if (index == 1) {
        $("#notice1").show();
        $("#notice2").hide();
    } else {
        $("#notice1").hide();
        $("#notice2").show();
    }
}
</script>

<!-- 메인 비주얼 -->
<div id="mainWrap">
  <div id="mainvisual">
    <div id="visual">
      <div class="visualAT">
        <ul>
          <li><a href="../controller/controller00_01.html?subNum=1"><img src="img/m_img01.jpg" class="mainani" /></a></li>
          <li><a href="../touch/touch01_01.html?subNum=1"><img src="img/m_img02.jpg" class="mainani" /></a></li>
          <li><a href="../system/system01.html?subNum=1"><img src="img/m_img03.jpg" class="mainani" /></a></li>
          <li><a href="../education/education11.html?subNum=1"><img src="img/m_img04.jpg" class="mainani" /></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<?php include "c_cus.html"; ?>

<!-- AutoBase -->
<div id="c_base">
  <div class="c_basebox">
    <iframe id="frame" src="c_base.html" frameborder="0" width="980" height="120" marginwidth="0" marginheight="0" scrolling="no"></iframe>
  </div>
</div>

<!-- Footer -->
<footer id="footer">
  <div class="copyboxM">
    <div class="copymenu">
      <ul>
        <li><a href="../company/greeting01.html?sugNum=1"><img src="../img/copy_menu01.gif" alt="회사소개" class="ovup" /></a></li>
        <li><img src="../img/copy_dot01.gif" /></li>
        <li><img src="../img/copy_menu02.gif" alt="이용약관" onClick="MM_openBrWindow('../company/provision.html','','scrollbars=no,width=720,height=615')" style="cursor:pointer;" class="ovup" link="no" /></li>
        <li><img src="../img/copy_dot01.gif" /></li>
        <li><img src="../img/copy_menu03.gif" alt="개인정보취급방침" onClick="MM_openBrWindow('../company/privacy.html','','scrollbars=no,width=720,height=615')" style="cursor:pointer;" class="ovup" link="no" /></li>
      </ul>
    </div>
    <div class="copyaddress">
      <ul>
        <li><img src="../img/copy_add01.gif" alt="서울시 금천구 가산동 60-44번지 이앤씨드림타워 7차 1309 호" border="0" usemap="#Map_copy01" /></li>
      </ul>
    </div>
  </div>
</footer>
<map name="Map_copy01" id="Map_copy01">
  <area shape="rect" coords="515,0,705,15" href="mailto:auto@autohitech.co.kr" title="메일보내기" />
  <area shape="rect" coords="75,28,140,40" href="../home/login.php?pageNum=1&amp;subNum=1&amp;url=../home/board.php?bo_table=staff01&amp;pageNum=1&amp;subNum=6" target="_blank" title="관리자페이지이동" />
</map>
<!-- //Footer -->

<script type="text/javascript" src="../js/jquery.msAccordion.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    // 적용사례 아코디언 초기화
    $("#accordion1").msAccordion({defaultid:0});
});
</script>

<?php 
  // latest() 함수를 호출하여 최신 글을 출력합니다.
  echo latest('popup_latest', 'popup01', 1);
?>
</body>
</html>
