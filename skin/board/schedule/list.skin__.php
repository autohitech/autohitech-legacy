<? 
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

include_once("$board_skin_path/moonday.php"); // 석봉운님의 음력날짜 함수

/*	
1차 제작: 탈루 님 (m@dreamresource.net)
2차 수정: Photofly 님 ( http://www.sir.co.kr/bbs/board.php?bo_table=g4_skin&wr_id=26398 )
  - 등록일: 2006-03-05
3차 수정: 지러유 님 ( http://sir.co.kr/bbs/board.php?bo_table=g4_skin&wr_id=84126 )
  - 등록일: 2008-12-11
  - 음력 기능, 아이콘 나오게 수정함(회사일정,바이블) 
4차 수정: 해피정 ( master@happyjung.com )
  - 등록일: 2009-04-04  /  최종수정일: 2009-04-06
  - 일정파일을 스킨폴더에 포함시킴 
     ( 기존 bbs/calendar/mydiary.2009   -->  게시판스킨/mydiary.2009 )
  - 최신 CSRF 방지 장착 ( 그누보드 4.31.06 기준 )
*/

if (!$board[bo_1]) alert("게시판 설정 : 여분 필드 1 에 파일이름을 설정 (꼭 영어이름!!)  \\n 예: mydiary.2009");
$schedule_file = $board[bo_1]; 

if (preg_match("/%/i", $width)) {
  $col_width = "14%"; //표의 가로 폭이 100보다 크면 픽셀값입력
} else{
  $col_width = round($width/7); //표의 가로 폭이 100보다 작거나 같으면 백분율 값을 입력
}
$col_height= 80 ;//내용 들어갈 사각공간의 세로길이를 가로 폭과 같도록
$today = getdate(); 
$b_mon = $today['mon']; 
$b_day = $today['mday']; 
$b_year = $today['year']; 
if ($year < 1) { // 오늘의 달력 일때
  $month = $b_mon;
  $mday = $b_day;
  $year = $b_year;
}

$file_len = strlen($schedule_file);
$file_name = substr($schedule_file,0,$file_len-5);

// 기념일 파일의 위치를 수정하려면 여기에서 한다.
$file_index = $board_skin_path."/".$file_name ;  // 스킨폴더에 포함된 파일 사용시
// $file_index = $g4['bbs_path']."/calendar/".$file_name ; // bbs/calendar 폴더 파일 사용시

if( file_exists($file_index.".".$year)) { 
  $dayfile = file($file_index.".".$year);  
  $cutpoint1 = 1;
  $cutpoint2 = 8;
} else if( file_exists($file_name.".0000")) { 
  $dayfile = file($file_name.".0000"); 
  $cutpoint1 = 5;
  $cutpoint2 = 4;
}

$lastday=array(0,31,28,31,30,31,30,31,31,30,31,30,31);
if ($year%4 == 0) $lastday[2] = 29;
$dayoftheweek = date("w", mktime (0,0,0,$month,1,$year));
?>

<table width="<?=$width?>" border=0 cellpadding="0" cellspacing="0">
  <tr>
       <td width="20%">&nbsp;</td>
       <td width="60%" height="30" align="center">
		<a href="<?="$_SERVER[PHP_SELF]?bo_table=$bo_table&"?><?if ($month == 1) { $year_pre=$year-1; $month_pre=$month; } else {$year_pre=$year-1; $month_pre=$month;} echo ("year=$year_pre&month=$month_pre");?>" target="_self" onfocus="this.blur()"><img src="<?=$board_skin_path?>/img/sc_prev2.gif" border="0" title="<?=$year_pre?>년" align="abbottom"></a>
		<a href="<?="$_SERVER[PHP_SELF]?bo_table=$bo_table&"?><?if ($month == 1) { $year_pre=$year-1; $month_pre=12; } else {$year_pre=$year; $month_pre=$month-1;} echo ("year=$year_pre&month=$month_pre");?>" target="_self" onfocus="this.blur()"><img src="<?=$board_skin_path?>/img/sc_prev.gif" border="0" title="<?=$month_pre?>월" align="abbottom"></a>
		&nbsp; &nbsp;<a href="<?="$_SERVER[PHP_SELF]?bo_table=$bo_table&"?>" title="오늘로" onfocus="this.blur()" class='sc_ym'><? echo ("$year".년."$month".월); ?></a>&nbsp;&nbsp;
		<a href="<?="$_SERVER[PHP_SELF]?bo_table=$bo_table&"?><?if ($month == 12) { $year_pre=$year+1; $month_pre=1; } else {$year_pre=$year; $month_pre=$month+1;} echo ("&year=$year_pre&month=$month_pre");?>" target="_self" onfocus="this.blur()"><img src="<?=$board_skin_path?>/img/sc_next.gif" border="0" title="<?=$month_pre?>월" align="abbottom"></a>
		<a href="<?="$_SERVER[PHP_SELF]?bo_table=$bo_table&"?><?if ($month == 12) { $year_pre=$year+1; $month_pre=$month; } else {$year_pre=$year+1; $month_pre=$month;} echo ("&year=$year_pre&month=$month_pre");?>" target="_self" onfocus="this.blur()"><img src="<?=$board_skin_path?>/img/sc_next2.gif" border="0" title="<?=$year_pre?>년" align="abbottom"></a>
	</td>
	<td width="20%" align="right" valign="bottom">
<?
  if ($write_href) { echo "		<a href='$write_href' title='일정추가' onfocus='this.blur()'><img src='$board_skin_path/img/btn_write.gif' border=0></a>\n"; }
  if ($admin_href) { echo "		&nbsp;<a href='$admin_href' title='관리자' onfocus='this.blur()'><img src='$board_skin_path/img/admin.gif' border=0 align=absmiddle></a>\n"; }
?>
</td>
  </tr>
</table>
<TABLE cellSpacing=0 cellPadding=0 bgcolor=#999999 width='<?=$width?>' align=center border=0><tr><td>
<table border=1 cellpadding=0 cellspacing=0 width=100% bgcolor=white bordercolor=white bordercolorlight=#DDDDDD>
    <tr class=size2 height=30>     
	<td align=center valign="middle" bgcolor="#fa8072" style="color:#ffffff;">일요일</td>     
	<td align=center valign="middle" bgcolor="#efefef">월요일</td>     
	<td align=center valign="middle" bgcolor="#efefef">화요일</td>     
	<td align=center valign="middle" bgcolor="#efefef">수요일</td>     
	<td align=center valign="middle" bgcolor="#efefef">목요일</td>     
	<td align=center valign="middle" bgcolor="#efefef">금요일</td>     
	<td align=center valign="middle" bgcolor="#318CCA" style="color:#ffffff;">토요일</td>
    </tr>
<?
$cday = 1;
$sel_mon = sprintf("%02d",$month);
$query = "SELECT * FROM $write_table WHERE left(wr_link1,6) <= '$year$sel_mon'  and left(wr_link2,6) >= '$year$sel_mon'  ORDER BY wr_id ASC";
$result = sql_query($query);
$j=0; // layer id
// 내용을 보여주는 부분
while ($row = mysql_fetch_array($result)) {  // 제목글 뽑아서 링크 문자열 만들기..
  if( substr($row[wr_link1],0,6) <  $year.$sel_mon ) {
	 $start_day =1; 
	 $start_day= (int)$start_day;
  } else {
	 $start_day = substr($row[wr_link1],6,2);
     $start_day= (int)$start_day;
  }

  if( substr($row[wr_link2],0,6) >  $year.$sel_mon ) {
	 $end_day = $lastday[$month];
	 $end_day= (int)$end_day;
  } else {
	 $end_day = substr($row[wr_link2],6,2);
	 $end_day= (int)$end_day;
  }

  // 아이디에 따라 다른 아이콘이미지 출력 하고 싶을때 ///주석을 해제
  $imgown = 'icon';

  for ($i = $start_day ; $i <= $end_day;  $i++) {
    if($row[mb_id]=='admin') { $imgown='bull_1'; }
  	else if($row[mb_id]=='test1971') {$imgown='bull_2'; }
  	else if($row[mb_id]=='mintbluejh') {$imgown='bull_3'; }
  	else if($row[mb_id]=='acelink1') {$imgown='bull_6'; }
  	else if($row[mb_id]=='bible750') {$imgown='bull_4'; }
   	else if($row[mb_id]=='seven') {$imgown='bull_2'; }

    if (strlen($row[wr_1]) > 0) {  // 입력된 아이콘 값이 있을 때
      $imgown = $row[wr_1] ;
	}

    $j++; // layer ID

    $list[comment_cnt] = "($row[wr_comment])"; // row에 대하여 코멘트 카운터 정의
    if($row[wr_comment] == 0) {
      $list[comment_cnt] = null ;
    } else {

      //날짜와 관계없이 24시간 코멘트 굵게
      if($row['wr_last'] >= date("Y-m-d H:i:s", $g4['server_time'] - ($board['bo_new'] * 3600))) { 
        $list[comment_cnt] = "($row[wr_comment])";
        if($list[comment_cnt]!=null) $list[comment_cnt] = "<b><font color=#7679E0>".$list[comment_cnt]."</font></b>"; 
      } else {
        $list[comment_cnt] = "<span style='font-size:7pt;color:#ff6600;'>".$list[comment_cnt]."</span>" ;
      }
    }

    $list['icon_new'] = null; //icon_new 정의
    $row[wr_subject] = cut_str(get_text($row[wr_subject]),$board[bo_subject_len],"…"); // subject length cut

    if ($row['wr_datetime'] >= date("Y-m-d H:i:s", $g4['server_time'] - ($board['bo_new'] * 3600)))
      $list['icon_new'] = "<img src='$board_skin_path/img/icon_new.gif' align='absmiddle'>";

    // $html_day[$i].= 은  문자를 덧붙이는 작업이다. 바로 . (쩜) 의 위력이다.
    if ($member[mb_level] < $board[bo_read_level]) {
      $functionlayer="" ;
    } else { 
      $functionlayer="onmouseover";
    }
 //   $html_day[$i].= "<br><a ".$functionlayer."=\"showLayers('popup_schd".$j."')\" onmouseout=\"startTimer(this)\"  href='$g4[bbs_path]/board.php?bo_table=$bo_table&year=$year&month=$month&wr_id=$row[wr_id]'><img src='$board_skin_path/img/".$imgown.".gif' border=0 align=absmiddle> ".$row[wr_subject]."</a>".$list[icon_new].$list[comment_cnt];
   $html_day[$i].= "<br><a href='$g4[bbs_path]/board.php?bo_table=$bo_table&year=$year&month=$month&wr_id=$row[wr_id]'><img src='$board_skin_path/img/".$imgown.".gif' border=0 align=absmiddle> ".$row[wr_subject]."</a>".$list[icon_new].$list[comment_cnt];

?>
    <!-- 뷰 팝업레이어 -->
    <DIV ID=popup_schd<?=$j?> onmouseout="startTimer(event.srcElement)" style="BORDER-RIGHT: #a2a2a2 1px solid; BORDER-TOP: #a2a2a2 1px solid; BORDER-LEFT: #a2a2a2 1px solid; BORDER-BOTTOM: #a2a2a2 1px solid;  BACKGROUND-COLOR: white; FILTER: alpha(opacity=90); padding: 5 5 5 5; POSITION:absolute; width:100px; top:*px; left:*px; visibility: hidden; Z-INDEX:1;"> 

<?
/*
    $html = 0;
    if (strstr($row[wr_option], "html1"))
      $html = 1;
    else if (strstr($row[wr_option], "html2"))
      $html = 2;
      $viewlist = cut_str(conv_content($row[wr_content], $html),200,"…");
      echo "글쓴이 : ".$row[wr_name]."<br>";
      echo "─────────<br>";
      echo $viewlist;
*/
?>
    </DIV>
<?
    }
  }

  // 달력의 틀을 보여주는 부분

  $temp = 7- (($lastday[$month]+$dayoftheweek)%7);

  if ($temp == 7) $temp = 0;
     $lastcount = $lastday[$month]+$dayoftheweek + $temp;

  for ($iz = 1; $iz <= $lastcount; $iz++) { // 42번을 칠하게 된다.
    $bgcolor = "#ffffff";  // 쭉 흰색으로 칠하고
    if ($b_year==$year && $b_mon==$month && $b_day==$cday) $bgcolor = "#DEFADE";      //  "#DFFDDF"; // 오늘날짜 연두색으로 표기
    if (($iz%7) == 1) echo ("<tr>"); // 주당 7개씩 한쎌씩을 쌓는다.
    if ($dayoftheweek < $iz  &&  $iz <= $lastday[$month]+$dayoftheweek)	{
      // 전체 루프안에서 숫자가 들어가는 셀들만 해당됨
      // 즉 11월 달에서 1일부터 30 일까지만 해당
      $daytext = "$cday";   // $cday 는 숫자 예> 11월달은 1~ 30일 까지
      //$daytext 은 셀에 써질 날짜 숫자 넣을 공간
      $daycontcolor = "" ; 
      $daycolor = ""; 
      if ($iz%7 == 1) $daycolor = "red"; // 일요일
      if ($iz%7 == 0) $daycolor = "blue"; // 토요일
	  
      // 여기까지 숫자와 들어갈 내용에 대한 변수들의 세팅이 끝나고 
      // 이제 여기 부터 직접 셀이 그려지면서 그 안에 내용이 들어 간다.
      echo ("<td width=$col_width height=$col_height bgcolor=$bgcolor valign=top class='cal_title'>");

      $f_date = $year.sprintf("%02d",$month).sprintf("%02d",$cday);

      // 기념일 파일 내용 비교위한 변수 선언, 월과 일을 두자리 포맷으로 고정
      if (strlen($month) == 1) { 
        $monthp = "0".$month ;
      } else {
        $monthp = $month ; 
      }
      if (strlen($cday) == 1) {
        $cdayp = "0".$cday ;
      } else { 
        $cdayp = $cday ; 
      }
      $memday = $year.$monthp.$cdayp;
      // *.0000 파일인 해마다 동일한 양력기념일은 월일로만 구분한다.
      if( !file_exists($file_index.".".$year)) { $memday = $monthp.$cdayp; }
      $daycont = "" ;

      // 년월일 8자리 또는 4자리를 잘라 비교하여 뒷 문장을 출력
      for($i=0 ; $i < sizeof($dayfile) ; $i++) {  // 파일 첫 행부터 끝행까지 루프
        if($memday == substr($dayfile[$i],$cutpoint1,$cutpoint2)){$daycont = substr($dayfile[$i],9,strlen($dayfile[$i])-10); 
        // r,b,y,g 구분자로 글자색깔 구분
        $daycl = substr($dayfile[$i],0,1) ;
        if($daycl == "r"){
          $daycontcolor = "red" ; // 휴일
          $daycolor = "red"; 
        }
        else if($daycl == "y"){$daycontcolor = "brown" ;} // 생일
        else if($daycl == "g"){$daycontcolor = "gray" ;} // 음력
        else{$daycontcolor = "blue" ;}
      }	
    }

    // 석봉운님의 음력날짜 변수선언
    $myarray = soltolun($year,$month,$cday);
    if ($myarray[day]==1 || $myarray[day]==11 || $myarray[day]==21) {
      $moonday ="<font color=gray>&nbsp;(음)$myarray[month].$myarray[day]$myarray[leap]</font>";
    } else {
      $moonday="";
    }

    include("$schedule_file.moon"); // 음력절기 & 음력기념일
    if ($annivmoonday&&$daycont) $blank="<br>"; // 음력절기와 양력기념일이 동시에 있으면 한칸 띔
    else $blank="";

    if ($write_href) { 
      // $write_href (글쓰기 권한)이 있으면
      // 날짜를 클릭하면 글씨쓰기가 가능한 링크를 넣어서 출력하기
      echo "<a href='$write_href&f_date=$f_date&t_date=$f_date'><font color=$daycolor>$daytext</font></a>$moonday <font color=$daycontcolor>$daycont</font>$blank $annivmoonday";
    } 
    else { // 글쓰기 권한이 없으면 글쓰기 링크는 넣지 않고 그냥 숫자와 기념일 내용만 출력하기  
      echo "<font color=$daycolor>$daytext</font>$moonday <font color=$daycontcolor>$daycont</font>$blank $annivmoonday";
    }
    echo $html_day[$cday];
    echo ("</td>");  // 한칸을 마무리
    $cday++; // 날짜를 카운팅
  } 
  // 11월에서 1일부터 30일에 해당되지 않으면 그냥 회색을 칠한다.
  else { echo ("     <td width=$col_width height=$col_height bgcolor=#F7F7F7 valign=top class=size1>&nbsp;</td>"); }
  if (($iz%7) == 0) echo ("  </tr>");
   
} // 반복구문이 끝남
?>
</table></td></tr></table><p>&nbsp;</p>

<!--년, 월 form 스크립트 -->
<script language="JavaScript">
<!--
function namosw_goto_byselect(sel, targetstr)
{
  var index = sel.selectedIndex;
  if (sel.options[index].value != '') {
     if (targetstr == 'blank') {
       window.open(sel.options[index].value, 'win1');
     } else {
       var frameobj;
       if (targetstr == '') targetstr = 'self';
       if ((frameobj = eval(targetstr)) != null)
         frameobj.location = sel.options[index].value;
     }
  }
}

// 레이어 뷰 스크립트
var iDelay = 50 // Delay to hide in milliseconds
var iNSWidth=130 // Default width for netscape
var sDisplayTimer = null, oLastItem

function getRealPosition(i,which) {
	iPos = 0
	while (i!=null) {
	 	iPos += i["offset" + which]
		i = i.offsetParent
	}
	return iPos
}
function showLayers(sDest,itop,ileft,iWidth) {
	if (document.all!=null) {
		var i = window.event.srcElement
		stopTimer()
		dest = document.all[sDest]
		if ((oLastItem!=null) && (oLastItem!=dest))
			hideItem()
		if (dest) {
			// Netscape Hack
			if (i.offsetWidth==0) 
				if (iWidth)
					i.offsetWidth=iWidth
				else
					i.offsetWidth=iNSWidth;
			if (ileft) 
				dest.style.pixelLeft = ileft
			else
			dest.style.pixelLeft = getRealPosition(i,"Left") - 60 // 미리보기 레이어 팝업 X좌표 설정(-10)
//			dest.style.pixelLeft = getRealPosition(i,"Left") + i.offsetWidth *0.1 // 불러오는 메뉴 좌표
			if (itop)
				dest.style.pixelTop = itop
			else
			   	dest.style.pixelTop = getRealPosition(i,"Top") - 65 // 미리보기 레이어 팝업 Y좌표 설정(-30)
			dest.style.visibility = "visible"
		}
		oLastItem = dest
	}
}

function stopTimer() {
	clearTimeout(sDisplayTimer)
}

function startTimer(el) {
	if (!el.contains(event.toElement)) {
		stopTimer()
		sDisplayTimer = setTimeout("hideItem()",iDelay)
	}
}

function hideItem() {
	if (oLastItem)
		oLastItem.style.visibility="hidden"
}

function checkOver() {
	if ((oLastItem) && (oLastItem.contains(event.srcElement))) {
		stopTimer()
	}
}

function checkOut() {
	if (oLastItem==event.srcElement)
		startTimer(event.srcElement)
}

document.onmouseover = checkOver
document.onmouseout = checkOut
//-->
</SCRIPT>
