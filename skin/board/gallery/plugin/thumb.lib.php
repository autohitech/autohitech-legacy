<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$thumb_dir = "$g4[path]/data/file/$bo_table/thumb_{$thumb_width}";
if (!is_dir($thumb_dir))
{
    @unlink($thumb_dir);
    @mkdir($thumb_dir);
    @chmod($thumb_dir, 0707);
}

// 원본 이미지를 넘기면 비율에 따라 썸네일 이미지를 생성함
function create_thumb($src_image, $width, $height, $thumb) 
{
    $size = @getimagesize($src_image);
    if ($size[2] == 1) 
        $source = @imagecreatefromgif($src_image);
    else if ($size[2] == 2) 
        $source = @imagecreatefromjpeg($src_image);
    else if ($size[2] == 3) 
        $source = @imagecreatefrompng($src_image);
    else 
        return "";

    if ($size[0] < $width){
      $width  = $size[0];
      $height = $size[1];
    } else{	
	  if ($size[0] <= $size[1]){
        $rate = $height / $size[1];
		$width = (int)($size[0] * $rate);
	  } else{
        $rate = $height / $size[0];
        $height = (int)($size[1] * $rate);
	  }
    }
	
	// 썸네일 이미지 넓이 보다 원본이미지의 넓이가 작다면 그냥 원본이미지가 썸네일이 됨
    if ($width > $size[0]) 
    {
        $target = imagecreatetruecolor($size[0], $size[1]);
        imagecopyresampled($target, $source, 0, 0, 0, 0, $size[0], $size[1], $size[0], $size[1]);
    } 
    else 
    {
        // 썸네일 높이가 넘어왔다면 비율에 의해 이미지를 생성하지 않음
        if ($height) 
        {
            // 원본이미지를 썸네일로 복사
            // 1000x1500 -> 500x500 으로 복사되는 형식이므로 이미지가 일그러진다.
            $comp_height = $height;
        }
        else 
        {
            // 원래 이미지와 썸네일 이미지와의 비율
            $rate = round($width / $size[0], 2); // 소수점 2자리 , 소수점 3자리에서 반올림됨
            // 비율에 의해 계산된 높이
            $comp_height = floor($size[1] * $rate); // 소수점 이하 버림
        }
	}

    $target = @imagecreatetruecolor($width, $height);
    $bgcolor = @imagecolorallocate($target, 255, 255, 255); // 썸네일 배경
    imagefilledrectangle($target, 0, 0, $width, $height, $bgcolor);
    imagecopyresampled($source, $source, 0, 0, 0, 0, $width, $height, $size[0], $size[1]);
    imagecopy($target, $source, 0, 0, 0, 0, $size[0], $size[1]);

    imagejpeg($target, $thumb, 100);
    chmod($thumb, 0606); // 추후 삭제를 위하여 파일모드 변경

    return $thumb;
}
?>