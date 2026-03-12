<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
if(!function_exists('createThumb_list')){
	function createThumb_list($img_width, $img_height, $imgSource, $imgThumb,$get_img) {
		// 이미지체크 
		if($get_img[2]==1){
			$img_org = imagecreatefromgif($imgSource);            //원본 이미지: gif
		}else if($get_img[2]==2){
			$img_org = imagecreatefromjpeg($imgSource);            //원본 이미지: jpg
		}else if($get_img[2]==3){
			$img_org = imagecreatefrompng($imgSource);            //원본 이미지: png
		}else{
			continue;
		}

		$target = imagecreatetruecolor($img_width,$img_height); // 리사이징 이미지 생성
		Imagecopyresampled($img_org, $img_org, 0, 0, 0, 0, $img_width, $img_height, $get_img[0], $get_img[1]);  // 리사이징 temp 생성
		imagecopy($target, $img_org, 0, 0, 0, 0, $img_width, $img_height); // 리사이징 temp target에 복사
		imagejpeg($target,$imgThumb,100);
	}
}
?>
