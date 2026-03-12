<?
include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");
?>
<?=latest('popup_latest', 'popup', 1); ?> 
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<title>
<? include "../design/inc/title.html";?>
</title>
<link href="../design/inc/a.css" rel="stylesheet" type="text/css">
<script src="../design/inc/view_flash.js" type="text/javascript"></script>
<script src="../js/jquery-1.3.js" type="text/javascript"></script>
<script src="../design/inc/jquery_right.js" type="text/javascript"></script>
<!--script language="JavaScript"> 
function click() { 
if ((event.button==2) || (event.button==3)) { 
alert('★www.i-sunam.com★          '); } 
} 
document.onmousedown=click 
</script-->

<script language="JavaScript1.1"> 
<!-- 
function displayImage(picName, windowName, windowWidth, windowHeight){
var winHandle = window.open("" ,windowName,"toolbar=no,scrollbars=yes,resizable=no,width=" + windowWidth + ",height=" + windowHeight)
if(winHandle != null){
var htmlString = "<html><head><title>+++(주)서남+++</title></head>" 
htmlString += "<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0>"
htmlString += "<a href=javascript:window.close()><img src=" + picName + " border=0 alt=닫기></a>"
htmlString += "</body></html>"
winHandle.document.open()
winHandle.document.write(htmlString)
winHandle.document.close()
} 
if(winHandle != null) winHandle.focus()
return winHandle
}
function doNothing(){} 
//-->
</script>


<!--새창 띄우기-->
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>

<!--이미지롤오버-->
<script type="text/JavaScript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>

<!--따라다니는메뉴-->
<script type="text/javascript" >
$(document).ready(function() {
  $('#floatR').scrollFollower({
    pageAlign:'center',
    pageWidth:978,
    type:'right',
    topMargin:350,
    minTop:150,
    margin:0,
    speed:500,
    easing:'swing',
    zindex:10
  });
  $('#floatL').scrollFollower({
    pageAlign:'center',
    pageWidth:540,
    type:'left',
    topMargin:290,
    minTop:300,
    margin:0,
    speed:500,
    easing:'linear',
    zindex:10
  });
});
</script>

<script type="text/JavaScript">
<!--
//레이어
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
//-->
</script>
<script language="JavaScript">
function fngetCookie(name){
	var nameOfCookie = name + "=";
	var x = 0;
	while(x <= document.cookie.length){
		var y = (x + nameOfCookie.length);

		if(document.cookie.substring(x, y) == nameOfCookie){
			if((endOfCookie = document.cookie.indexOf(";", y)) == -1)
				endOfCookie = document.cookie.length;

			return unescape(document.cookie.substring(y, endOfCookie));
		}

		x = document.cookie.indexOf( " ", x ) + 1;
		if(x == 0)
			break;
	}
	return "";
}

if(fngetCookie("Notice") != "done"){
 //window.open('popup/popup01.html','','width=620,height=550');
}
</script>
</head>
<!--body oncontextmenu='return false' onselectstart='return false' style="overflow-x:hidden"-->
<body>
<div align="center">
<!--상단 메뉴/비주얼 // 전체 테이블 시작-->
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="575" align="left" valign="top"><div id="top_menu">
      <script>doc_write(flash_movie("../design/flash/top_menu.swf?pageNum=<?=$pageNum;?>&subNum=<?=$subNum;?>&category1=<?=$category1;?>&category2=<?=$category2;?>", "mainflash", "100%", "290", "transparent"));</script>
    </div>
    <script>doc_write(flash_movie("../design/flash/main_visual.swf", "mainflash", "100%", "575", "transparent"));</script></td>
    </tr>
</table>
<!--상단 메뉴/비주얼 // 전체 테이블 끝-->
<!--컨텐츠 // 전체 테이블 시작-->
<table width="980" height="115" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="265" align="left" valign="top"><? include "c_notice01.html";?></td>
    <td width="40" align="left" valign="top"></td>
    <td width="305" align="left" valign="top"><script>doc_write(flash_movie("../design/flash/bn_tel_M.swf", "mainflash", "305", "105", "transparent"));</script></td>
    <td width="40" align="left" valign="top"></td>
    <td width="330" align="left" valign="top"><script>doc_write(flash_movie("../design/flash/bn_cus.swf", "mainflash", "330", "115", "transparent"));</script></td>
  </tr>
</table>
<!--컨텐츠 // 전체 테이블 끝-->
<!--하단copy 테이블 시작-->
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td height="40" align="left" valign="top"><!--여백--></td>
    </tr>
  <tr>
    <td height="90" align="left" valign="top"><script>doc_write(flash_movie("../design/flash/copy_M.swf", "mainflash", "100%", "90", "transparent"));</script></td>
    </tr>
</table>
<!--하단copy 테이블 끝-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21575519-14']);
  _gaq.push(['_setDomainName', '.i-sunam.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</div>
</body>
</html>
