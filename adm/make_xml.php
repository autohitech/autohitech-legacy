<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
/*
$XML_CATE ="<?xml version=\"1.0\" encoding=\"euc-kr\"?>
      <Element>
        <menu>";

				//  그룹별 탑 그룹
$grc_sql = " select gr_id, gr_subject,gr_1_subj from $g4[group_table] where gr_8 <> 'y'  order by gr_10 asc, gr_id desc ";
$grc_result = sql_query($grc_sql);
for ($i=0; $grc_row=sql_fetch_array($grc_result); $i++) {

        $XML_CATE .="<MainMenu>
            <MainMenuBigText value=\"$grc_row[gr_subject]\" />
            <MainMenuSmallText value=\"Company\" />
            <MainMenuLINK value=\"$g4[bbs_path]/group.php?gr_id=$grc_row[gr_id]\" target=\"_self\" />";


	//	if($grc_row[gr_8] != "y"){ // 표현하고 싶지 않은 그룹테이블 설정시사용
					//  그룹별 탑 테이블
	$tb_sql = " select bo_table, bo_subject,bo_10 from $g4[board_table]  where gr_id = '$grc_row[gr_id]'  order by bo_order_search asc, bo_table desc ";
	$tb_result = sql_query($tb_sql);
                       for ($i=0; $tb_row=sql_fetch_array($tb_result); $i++) {

                      if(($tb_row) && ($tb_row[bo_10] == "yes")) {

                                 $gc_boardslist = "g4_write_".$tb_row[bo_table];
			$tbl_sql = " select wr_id, wr_subject from $gc_boardslist where wr_id>0 order by wr_1 asc, wr_id desc ";
			$tbl_result = sql_query($tbl_sql);

				for ($j=0; $tbl_row=sql_fetch_array($tbl_result); $j++) {

							$style= "";
							if($wr_id == $tbl_row[wr_id]){
								$style = "style=\"color:#B5241E;\"";
							}

                                                                  $XML_CATE .="<SubMenu>
                                                                  <SubMenuText value=\"$tbl_row[wr_subject]\" />
                                                                  <SubMenuLINK value=\"$g4[bbs_path]/board.php?bo_table=$tb_row[bo_table]&wr_id=$tbl_row[wr_id]\" target=\"_self\" />
                                                                </SubMenu>";
				    }
                                                 //   }
                             } else {

	//	for ($i=0; $tb_row=sql_fetch_array($tb_result); $i++) {
			$style= "";
			if($bo_table == $tb_row[bo_table]){
				$style = "style=\"color:#B5241E;\"";
			}

                                                            $XML_CATE .="<SubMenu>
                                                                  <SubMenuText value=\"$tb_row[bo_subject]\" />
                                                                  <SubMenuLINK value=\"$g4[bbs_path]/board.php?bo_table=$tb_row[bo_table]\" target=\"_self\" />
                                                                </SubMenu>";

		// }
                           }


 }

        $XML_CATE .="</MainMenu>";
}
        $XML_CATE .="        </menu>

        <option0
startX_Main=\"25\"          
startY_Main=\"5\"             
spaceMain=\"45\"            
startX_Sub=\"25\"
startY_Sub=\"33\"
spaceSub=\"12\"
//etcMenuVisible=\"1\"
//startX_Etc=\"620\"
//startY_Etc=\"8\"
//spaceEtc=\"12\"
mainMenuTextSize=\"0\"
mainMenuETextSize=\"-1\"
subMenuTextSize=\"0\"
//etcMenuTextSize=\"-1\"
mainTextXscale=\"100\"
mainTextYscale=\"100\"
mainETextXscale=\"100\"
mainETextYscale=\"100\"
subTextXscale=\"95\"
subTextYscale=\"100\"
//etcTextXscale=\"100\"
//etcTextYscale=\"100\"
mainMenuTextOverColor=\"0xffffff\"
mainMenuTextOutColor=\"0x000000\"
mainMenuETextOverColor=\"0x637BA6\"
mainMenuETextOutColor=\"0xFFFFFF\"
subMenuTextOverColor=\"0x00ffff\"
subMenuTextOutColor=\"0xe4e4e4\"
//etcMenuTextOverColor=\"0xffffff\"
//etcMenuTextOutColor=\"0xF0EFEF\"
//etcMenuLineColor=\"0xF0EFEF\"
SBColor=\"0x333333\"
//EBColor=\"0x333333\"
/>
      </Element>";


$fp = fopen("../flash/tmmenu.xml", "w+");
fwrite($fp,"$XML_CATE"); 
fclose($fp); 
*/
?>

