<?
if (!defined("_GNUBOARD_")) exit;

$begin_time = get_microtime();

 include_once("$g4[path]/head.admin.php");

function print_menu1($key, $no)
{
    global $menu;

    $str = "<table width=130 cellpadding=1 cellspacing=0 id='menu_{$key}' style='position:absolute; display:none; z-index:1;' onpropertychange=\"selectBoxHidden('menu_{$key}')\"><colgroup><colgroup><colgroup width=10><tr><td rowspan=2 colspan=2 bgcolor=#EFCA95><table width=127 cellpadding=0 cellspacing=0 bgcolor=#FEF8F0><colgroup style='padding-left:10px'>";
    $str .= print_menu2($key, $no);
    $str .= "</table></td><td></td></tr><tr><td bgcolor=#DDDAD5 height=20></td></tr><tr><td width=4></td><td height=3 width=127 bgcolor=#DDDAD5></td><td bgcolor=#DDDAD5></td></tr></table>\n";

    return $str;
}


function print_menu2($key, $no)
{
    global $menu, $auth_menu, $is_admin, $auth, $g4;

    $str = "";
    for($i=1; $i<count($menu[$key]); $i++)
    {
        if ($is_admin != "super" && (!array_key_exists($menu[$key][$i][0],$auth) || !strstr($auth[$menu[$key][$i][0]], "r")))
            continue;

        if ($menu[$key][$i][0] == "-")
            $str .= "<tr><td class=bg_line{$no}></td></tr>";
        else
        {
            $span1 = $span2 = "";
            if (isset($menu[$key][$i][3]))
            {
                $span1 = "<span style='{$menu[$key][$i][3]}'>";
                $span2 = "</span>";
            }
            $str .= "<tr><td class=bg_menu{$no}>";
            if ($no == 2)
                $str .= "&nbsp;&nbsp;<img src='{$g4[admin_path]}/img/icon.gif' align=absmiddle> ";
            $str .= "<a href='{$menu[$key][$i][2]}' style='color:#555500;'>{$span1}{$menu[$key][$i][1]}{$span2}</a></td></tr>";

            $auth_menu[$menu[$key][$i][0]] = $menu[$key][$i][1];
        }
    }

    return $str;
}

function toptitle_msg($subm) {
global $sub_mtitle;
// $menu["menu300"]
            $tmp_menu = substr($sub_menu, 0, 3);
        if (isset($menu["menu{$tmp_menu}"][0][1]))
        {
    if($subm == $menu["menu{$subm}"][0][1]) {
    echo $menu["menu{$subm}"][0][2];

//                 echo $menu["menu{$tmp_menu}"][2][1]." > ";
     }
    }
}


        foreach($amenu as $key=>$value)
        {
           echo print_menu1("menu{$key}", 1);
        }
        ?>
<script language="JavaScript">
if (!g4_is_ie) document.captureEvents(Event.MOUSEMOVE)
document.onmousemove = getMouseXY;
var tempX = 0;
var tempY = 0;
var prevdiv = null;
var timerID = null;

function getMouseXY(e) 
{
    if (g4_is_ie) { // grab the x-y pos.s if browser is IE
        tempX = event.clientX + document.body.scrollLeft;
        tempY = event.clientY + document.body.scrollTop;
    } else {  // grab the x-y pos.s if browser is NS
        tempX = e.pageX;
        tempY = e.pageY;
    }  

    if (tempX < 0) {tempX = 0;}
    if (tempY < 0) {tempY = 0;}  

    return true;
}

function imageview(id, w, h)
{

    menu(id);

    var el_id = document.getElementById(id);

    //submenu = eval(name+".style");
    submenu = el_id.style;
    submenu.left = tempX - ( w + 11 );
    submenu.top  = tempY - ( h / 2 );

    selectBoxVisible();

    if (el_id.style.display != 'none')
        selectBoxHidden(id);
}

function help(id, left, top)
{
    menu(id);

    var el_id = document.getElementById(id);

    //submenu = eval(name+".style");
    submenu = el_id.style;
    submenu.left = tempX - 50 + left;
    submenu.top  = tempY + 15 + top;

    selectBoxVisible();

    if (el_id.style.display != 'none')
        selectBoxHidden(id);
}

// TEXTAREA 사이즈 변경
function textarea_size(fld, size)
{
	var rows = parseInt(fld.rows);

	rows += parseInt(size);
	if (rows > 0) {
		fld.rows = rows;
	}
}
</script>

<script language="javascript" src="<?=$g4['path']?>/js/common.js"></script>
<script language="javascript" src="<?=$g4['path']?>/js/sideview.js"></script>
<!-- Google Charts Loader -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    var googleChartsLoaded = false;
    google.charts.load('current', {'packages':['corechart', 'bar']});
    google.charts.setOnLoadCallback(function() {
        googleChartsLoaded = true;
        console.log("Google Charts loaded.");
    });

    function drawFusionChartXML(xmlPath, divId, chartType, width, height) {
        console.log("Attempting to draw chart:", divId, "from", xmlPath);
        // 로딩 완료까지 재시도
        if (!googleChartsLoaded) {
            setTimeout(function() { drawFusionChartXML(xmlPath, divId, chartType, width, height); }, 200);
            return;
        }

        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4) {
                if (this.status == 200) {
                    try {
                        var responseText = this.responseText;
                        
                        // UTF-8로 강제 인식 시도 (만약 파일이 여전히 EUC-KR일 경우를 대비)
                        // 하지만 AJAX는 기본적으로 UTF-8로 읽으려 하므로, PHP에서 UTF-8로 주는게 제일 확실함
                        
                        var parser = new DOMParser();
                        var xmlDoc = parser.parseFromString(responseText, "text/xml");
                        
                        // 만약 파싱 에러가 나면 (인코딩 문제 등), 수동으로 데이터 추출 시도
                        if (xmlDoc.getElementsByTagName("parsererror").length > 0) {
                            console.warn("XML Parser failed for " + xmlPath + ", attempting manual regex extraction.");
                            xmlDoc = null; 
                        }

                        var data = new google.visualization.DataTable();
                        var categories = xmlDoc.getElementsByTagName("category");
                        var categoryNames = [];
                        for (var i = 0; i < categories.length; i++) {
                            categoryNames.push(categories[i].getAttribute("name") || categories[i].getAttribute("hoverText"));
                        }

                        var datasets = xmlDoc.getElementsByTagName("dataset");
                        data.addColumn('string', 'Category');
                        
                        if (datasets.length > 0) {
                            for (var i = 0; i < datasets.length; i++) {
                                data.addColumn('number', datasets[i].getAttribute("seriesname") || "Data " + (i+1));
                            }
                            
                            // 만약 category가 없으면 dataset의 set들에서 추출
                            if (categoryNames.length == 0) {
                                var firstSets = datasets[0].getElementsByTagName("set");
                                for (var i = 0; i < firstSets.length; i++) {
                                    categoryNames.push(firstSets[i].getAttribute("name") || (i+1).toString());
                                }
                            }

                            for (var i = 0; i < categoryNames.length; i++) {
                                var row = [categoryNames[i]];
                                for (var j = 0; j < datasets.length; j++) {
                                    var sets = datasets[j].getElementsByTagName("set");
                                    var val = (sets[i]) ? sets[i].getAttribute("value") : 0;
                                    row.push(parseFloat(val) || 0);
                                }
                                data.addRow(row);
                            }
                        } else {
                            var sets = xmlDoc.getElementsByTagName("set");
                            data.addColumn('number', 'Value');
                            if (sets.length > 0) {
                                for (var i = 0; i < sets.length; i++) {
                                    var name = sets[i].getAttribute("name") || sets[i].getAttribute("label") || "Item " + (i+1);
                                    var val = parseFloat(sets[i].getAttribute("value")) || 0;
                                    data.addRow([name, val]);
                                }
                            } else {
                                console.warn("No data found in XML:", xmlPath);
                                return;
                            }
                        }

                        var options = {
                            width: width,
                            height: height,
                            chartArea: {width: '80%', height: '70%'},
                            legend: { position: 'bottom' },
                            hAxis: { slantedText: true, slantedTextAngle: 45 }
                        };

                        var targetDiv = document.getElementById(divId);
                        if (!targetDiv) {
                            console.error("Target DIV not found:", divId);
                            return;
                        }

                        var chart;
                        if (chartType == 'Pie') chart = new google.visualization.PieChart(targetDiv);
                        else if (chartType == 'Bar') chart = new google.visualization.BarChart(targetDiv);
                        else if (chartType == 'Line') chart = new google.visualization.LineChart(targetDiv);
                        else chart = new google.visualization.ColumnChart(targetDiv);
                        
                        chart.draw(data, options);
                        console.log("Chart drawn successfully:", divId);
                    } catch (e) {
                        console.error("Chart execution error (" + divId + "):", e);
                    }
                } else {
                    console.error("HTTP Error " + this.status + " loading " + xmlPath);
                }
            }
        };
        xhttp.open("GET", xmlPath, true);
        xhttp.send();
    }
</script>
<script language="JavaScript">
var save_layer = null;
function layer_view(link_id, menu_id, opt, x, y)
{
    var link = document.getElementById(link_id);
    var menu = document.getElementById(menu_id);

    //for (i in link) { document.write(i + '<br/>'); } return;

    if (save_layer != null)
    {
        save_layer.style.display = "none";
        selectBoxVisible();
    }

    if (link_id == '')
        return;

    if (opt == 'hide')
    {
        menu.style.display = 'none';
        selectBoxVisible();
    }
    else
    {
        x = parseInt(x);
        y = parseInt(y);
        menu.style.left = get_left_pos(link) + x;
        menu.style.top  = get_top_pos(link) + link.offsetHeight + y;
        menu.style.display = 'block';
    }

    save_layer = menu;
}
</script>

<link rel="stylesheet" href="<?=$g4['admin_path']?>/admin.style.css" type="text/css">
<style>
.bg_menu1 { height:22px; 
            padding-left:15px; 
            padding-right:15px; } 
.bg_line1 { height:1px; background-color:#EFCA95; } 

.bg_menu2 { height:22px; 
            padding-left:25px; } 
.bg_line2 { background-image:url('<?=$g4['admin_path']?>/img/dot.gif'); height:3px; } 
.dot {color:#D6D0C8;border-style:dotted;}
.lmenu{font-size:15px;font-weight:bold;color:#ce0000;letter-spacing:-1px;}

.smenu{font-size:13px;font-weight:bold;letter-spacing:-1px;}
#csshelp1 { border:0px; background:#FFFFFF; padding:6px; }
#csshelp2 { border:2px solid #BDBEC6; padding:0px; }
#csshelp3 { background:#F9F9F9; padding:6px; width:200px; color:#222222; line-height:120%; text-align:left; }
</style>
		<script type="text/JavaScript">
		var menux="admin_leftmenu";
		function visual2(admsub){
		
			if (menux != admsub){
				show_admMenu2();
				eval(admsub).style.display="block";
				menux=admsub;
			}
			else{
				menux="admin_leftmenu";
				show_admMenu2();
			}
		}
		function show_admMenu2(){
			
			for(i=1;i<=37;i++) {
				if(document.getElementById("admmenu"+i)) {
					document.getElementById("admmenu"+i).style.display="none";		
				}		
				bb="document.getElementById(admsub).style";
			}	
		}</script>
<body leftmargin=0 topmargin=0 bgcolor="#ffffff">
<a name='gnuboard4_admin_head'></a>
<table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
<colgroup width=180>
<colgroup>
  <tr>
    <td colspan=2 height="63" valign="top"><? include "inc/top.html";?></td>
  </tr>
  <tr>
    <td colspan=2 height="33" valign="top">
	<!-- 상단 메뉴 시작 // 마우스 오버시 테이블 칼라 변경-->
	<? include "inc/menu_top.html";?>
	<!-- 상단 메뉴 끝 --></td>
  </tr>
<tr>
    <td width="200" align=center valign=top><? include "inc/menu_left.html";?>
 <br>
    </td>
    <td valign=top style='padding:10px;'>
		<? include "inc/home.html";?><br><br>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 
            <tr>
              <td height="1" bgcolor="c8c8c8"></td>
            </tr>
            <tr>
              <td height="33" bgcolor="f4f2f2" class="bgcol1 smenu"><img src="img/arrow2.gif" width="22" height="11" hspace="3" align="absmiddle"><?=$g4[title];?></td>
            </tr>
            <tr>
              <td height="1" bgcolor="c8c8c8"></td>
            </tr>
        </table>


<br>
