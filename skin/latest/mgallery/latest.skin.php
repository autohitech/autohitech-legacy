<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
include_once("$latest_skin_path/skin.lib.php");
?>


<?
$img_width = 89; // 이미지 가로 사이즈
$img_height = 64; // 이미지 세로 사이즈

$mod = 4; // 한줄 출력개수

$data_path = $g4[path]."/data/file/$bo_table"; 
$thumb_path = $data_path.'/latest_thumb';

@mkdir($thumb_path, 0707);
@chmod($thumb_path, 0707);

?>
<table border='0' cellspacing='0' class='c_photoM'>
        <tr>
<? 
for ($i=0; $i<count($list); $i++) { 

?>
<td>
         

			<?
					if($list[$i][file][0][view]){
						$src = $list[$i][file][0][path]."/".$list[$i][file][0][file];

						$img = "<!-- Img Table 95x70/Img Size 89x64-->
      <table border='0' cellspacing='0' class='c_photo01'>
        <tr><td><a href='{$list[$i]['href']} '><img src=\"$src\" border=\"0\" width=\"$img_width\" height=\"$img_height\"/></a></td></tr>
      </table>";
					}else{
						// no 이미지를 비율적으로 만들어났음
						$img = "<!-- Img Table 95x70/Img Size 89x64-->
      <table border='0' cellspacing='0' class='c_photo01'>
        <tr><td><a href='{$list[$i]['href']}'><img src=\"$latest_skin_path/img/no_image.gif\" border=\"0\" height=\"{$img_height}\" width=\"{$img_width}\"/></a></td></tr>
      </table>";
					}
					echo $img;
			?>
</td>
<?}?>
        
		</tr>
      </table>
<?
if ($i && $i%$mod==0) {
					echo "</tr><tr>";
			}
?>
<? if (count($list) == 0) { 
?>
<table border='0' cellspacing='0' class='c_photoM'>
        <tr>
<? 
for ($i=0; $i<$mod; $i++) { 
echo "<td><!-- Img Table 95x70/Img Size 89x64-->
      <table border='0' cellspacing='0' class='c_photo01'>
        <tr>
          <td><img src=\"$latest_skin_path/img/no_image.gif\" border=\"0\" height=\"{$img_height}\" width=\"{$img_width}\"/></td>
        </tr>
      </table>
      <!-- //Img Table 95x70/Img Size 89x64--></td>"; 
	  } 
	?>
	 		</tr>
      </table>
	<?
}
?>

