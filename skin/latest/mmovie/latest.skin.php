<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
include_once("$latest_skin_path/skin.lib.php");
?>


<?
$img_width = 89; // 이미지 가로 사이즈
$img_height = 64; // 이미지 세로 사이즈

?>
<? 
for ($i=0; $i<count($list); $i++) { 

echo "	<!-- Img Table 95x70/Img Size 89x64-->
      <table border='0' cellspacing='0' class='c_movie01'>
        <tr>
          <td><div id='frame'><a href='{$list[$i]['href']}'><img src='{$latest_skin_path}/img/frame.png' border='0' class='png24' /></a></div>";


					if($list[$i][wr_1]){
						$img_file = '/data/moviefile/img/'.$list[$i][wr_1] . '.jpg';
						$img = "<a href='{$list[$i]['href']}'><img src=".$img_file." border=\"0\" width=\"$img_width\" height=\"$img_height\"/></a>";
					}else{
						// no 이미지를 비율적으로 만들어났음
						$img = "<!-- Img Table 95x70/Img Size 89x64-->
      <table border='0' cellspacing='0' class='c_photo01'>
        <tr>
          <td><a href='{$list[$i]['href']}'><img src=\"$latest_skin_path/img/no_image.gif\" border=\"0\" height=\"{$img_height}\" width=\"{$img_width}\"/></a></td>
        </tr>
      </table>
      <!-- //Img Table 95x70/Img Size 89x64-->";
					}
					echo $img;
			?>
</td>
        </tr>
      </table>
      <!-- //Img Table 95x70/Img Size 89x64-->
<?}?>

<? if (count($list) == 0) { 
echo "<!-- Img Table 95x70/Img Size 89x64-->
      <table border='0' cellspacing='0' class='c_movie01'>
        <tr>
          <td><img src=\"$latest_skin_path/img/no_image.gif\" border=\"0\" height=\"{$img_height}\" width=\"{$img_width}\"/></td>
        </tr>
      </table>
      <!-- //Img Table 95x70/Img Size 89x64-->"; } ?>
