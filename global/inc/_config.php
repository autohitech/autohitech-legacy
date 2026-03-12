<?php
//session_start();
/*
$g4_path = ".."; // common.php 의 상대 경로
include_once("$g4_path/common_mvv.php");

if ($is_admin != "super") 
{
	 echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	 echo "<script language='javascript'>alert('글을 등록할 권한이 없습니다. 감사합니다. $is_admin , $is_member ');self.close();</script>";
	 exit;
} 
*/
$upload_temp_dir =  $_SERVER['DOCUMENT_ROOT'] . "/data/moviefile/tmp_file";
$upload_temp_img_dir =  "../data/moviefile/tmp_file";
$ucc_service_path =$_SERVER['DOCUMENT_ROOT'] . "/data/moviefile";
$ucc_service_img_path =$_SERVER['DOCUMENT_ROOT'] . "/data/moviefile/img";
$ucc_service_flv_path =$_SERVER['DOCUMENT_ROOT'] . "/data/moviefile/flv";

// $uploadquota_path =$_SERVER['DOCUMENT_ROOT'] . "/ucc/service";
$uploadquota_path =$_SERVER['DOCUMENT_ROOT'] . "/data/moviefile/tmp_file";
$limit_uploadquota = 1024*1000; //1GB
$thumb_img_size = "165";
$converter_movie_size = "320x240";


    function byteFormat($fs)
    {
        // Gb
        if ($fs > 999999)
        {
            $filesize = round($fs/1024/1024, 2);
            $unit = 'G';
        }
        // Mb
        elseif ($fs > 999)
        {
            $filesize = round($fs/1024,2);
            $unit = 'M';
        } else {

            $filesize = round($fs,2);
            $unit = 'K';
       }

        return number_format($filesize, 1).$unit;
    }

    function userquotasum() {
    global $uploadquota_path;
      $usedquotatotal = shell_exec("du -s $uploadquota_path");
       return (int)($usedquotatotal);
   }

////////////////////////////////////////////////////////////////////////
// GD를 이용한 이미지 리사이즈 함수
///////////////////////////////////////////////////////////////////////

//$img_file    :    원본파일 
//$simg_name    :리사이즈 파일 : 없을 경우 이미지를 직접출력합니다. 
//*리사이즈와 워터 마크를 사용하지 않을 경우 직접 출력하는건 효율성이 떨어집니다. 
//(직접 출력의 경우 header가 수정되기 때문에 다른 출력이 있으면 안됩니다.) 
//$simg_width    :리사이즈 너비 
//$simg_height    :리사이즈 높이 
//* $simg_width와$simg_height 가 둘다 없을 경우 원본크기 그대로 작업합니다. 
//$simg_type        :리사이즈 파일타입 (1:gif , 2:jpg , 3:png) : 기본 gif 
//$simg_str : 워터마크 문자열  (시작 위치:10px,20px ) 폰트는 gulim.ttc 지만, 없을 경우 ""로 바꿔주세요. 
//gulim.ttc 는 윈도우 font 폴더 안에 있습니다. 
//사용예 gd_image_resize('./ed_about.gif','./Upload/test_image000.gif', 400, '', 1,"실험20000000000"); 
function gd_image_resize($img_file,$simg_name='', $simg_width='', $simg_height='', $simg_type,$simg_str=''){ 

if(!is_file($img_file)){    return '원본 파일이 없습니다.'; } 
//if(!$simg_name){    return '리사이즈 파일이름이 없습니다.'; } : 리사이즈 파일 이름이 없으면, 이미지로 그냥 출력합니다. 
//if(!$simg_width && !$simg_height){    return '너비 와 높이 둘중 하나는 값이 있어야합니다'; } : 원본 크기로 작업합니다. 

// GD 버젼체크 
$gd = gd_info(); 
$gdver = substr(preg_replace("/[^0-9]/", "", $gd['GD Version']), 0, 1); 
if(!$gdver) return "GD 버젼체크 실패거나 GD 버젼이 1 미만입니다."; 

list($img_width, $img_height, $img_type, $img_attr) = getimagesize($img_file); //소스이미지파일 크기 
if(!$simg_width && !$simg_height){ 
    $simg_width = $img_width; 
    $simg_height = $img_height; 
}else if(!$simg_width){ 
    $simg_width = $img_width * ($simg_height/$img_height);    //자동 비율생성 : 너비 
}else if(!$simg_height){ 
    $simg_height = $img_height * ($simg_width/$img_width);    //자동 비율생성 : 높이 
} 
/* 
지원 이미지 타입 
1 = GIF, 2 = JPG, 3 = PNG, 4 = SWF, 5 = PSD, 6 = BMP, 7 = TIFF(intel byte order), 8 = TIFF(motorola byte order), 
9 = JPC, 10 = JP2, 11 = JPX, 12 = JB2, 13 = SWC, 14 = IFF, 15 = WBMP, 16 = XBM. 
1,2,3 만 지원하도록한다. 
*/ 
if($img_type<1 && $img_type > 3){ 
    return "GIF,JPG,PNG 가 아닙니다."; 
} 

if($img_type==1){ 
$img_im = imagecreatefromgif($img_file);            //원본 이미지: gif 
}else if($img_type==2){ 
$img_im = imagecreatefromjpeg($img_file);            //원본 이미지: jpg 
}else if($img_type==3){ 
$img_im = imagecreatefrompng($img_file);            //원본 이미지: png 
} 

if($gdver >= 2){    //GD 2.XX    : truecolor로 작업한다. 
    $simg_im = imagecreatetruecolor($simg_width, $simg_height); 
    imagecopyresampled($simg_im, $img_im, 0, 0, 0, 0, $simg_width, $simg_height,$img_width, $img_height); //이미지를 리사이즈한다. 
}else{ //GD 1.xxx 
    $simg_im = imagecreate($simg_width, $simg_height); 
    imagecopyresized($simg_im, $img_im, 0, 0, 0, 0, $simg_width, $simg_height,$img_width, $img_height);    //이미지를 리사이즈한다. 
} 

 if($simg_str){ 
  $color_000000 = imagecolorallocate($simg_im, 0, 0, 0); //색상 : 검정 
  $color_FFFFFF = imagecolorallocate($simg_im, 0xFF, 0xFF, 0xFF); //색상 : 흰색 
  $grey = imagecolorallocate($simg_im, 218, 218, 218);
  $simg_str = iconv("EUC-KR","UTF-8",$simg_str); // UTF-8로 한글 변경 
 // @imagettftext($simg_im, 15, 15, 12, 22, $color_000000, "./sjsoju1.ttf",$simg_str); //글자 적기 
//  @imagettftext($simg_im, 15, 15, 10, 20, $color_FFFFFF, "./sjsoju1.ttf",$simg_str); //글자 적기 
$spacing = 10;
$size = 12;
$fontfile = "./arial.ttf";
$angle = "15";
$x = "12";
$Y="20";
$lines=explode("|",$simg_str);
for($i=0; $i< count($lines); $i++)
    {
    $newY=$y+($i * $size * $spacing);
// @imagettftext($simg_im, 10, 15, 12, $newY, $color_000000, $fontfile,$lines[$i]);
 @imagettftext($simg_im, 10, 15, 12, $newY, $grey, $fontfile,$lines[$i]);
//    imagettftext($simg_im, $size, $angle, 12, $newY, $color_000000, $fontfile,  $lines[$i]);
//    imagettftext($simg_im, $size, $angle, 10, $newY, $color_FFFFFF, $fontfile,  $lines[$i]);
    }



 } 


if($simg_name){ 
    if($simg_type==1){ 
        imagegif($simg_im,$simg_name);            //원본 이미지: gif 
    }else if($simg_type==2){ 
        imagejpeg($simg_im,$simg_name,80);            //원본 이미지: jpg 
    }else if($simg_type==3){ 
        imagepng($simg_im,$simg_name);            //원본 이미지: png 
    } 
}else{ 
        Header("Content-Disposition: attachment;; filename=".basename($img_file)); 
        header("Content-Transfer-Encoding: binary"); 
    if($simg_type==1){ 
        header("Content-type: image/gif");  //이미지 타입에 맞도록 해더 구성 
        imagegif($simg_im);            //원본 이미지: gif 
    }else if($simg_type==2){ 
        header("Content-type: image/jpg");  //이미지 타입에 맞도록 해더 구성 
        imagejpeg($simg_im,'',80);            //원본 이미지: jpg 
    }else if($simg_type==3){ 
        header("Content-type: image/png");  //이미지 타입에 맞도록 해더 구성 
        imagepng($simg_im);            //원본 이미지: png 
    } 
} 

// 메모리에 있는 그림 삭제 
imagedestroy($img_im); 
imagedestroy($simg_im); 

// return '이미지 리사이즈 완료'; 

} 
?>