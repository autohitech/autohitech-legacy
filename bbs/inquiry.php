<?

/*
##############################################################################
#이 프로그램은 프리웨어로 자유롭게 사용할 수 있다.
#여기 부분을 제발 지우지 말아 주십시요. 
#본 프로그램은 Matt Wright's Perl FormMail.pl를 PHP로 제작한 것이다. 
#
# COPYRIGHT NOTICE
#
# FormMail.php v4.0
# Copyright 2000,2001ALEX KIM (c) All rights reserved.
# Created 07/06/01
#  http://www.nenter.com
##############################################################################
*/

// formmail version 
$version = "4.0";

$sks = "auto@autohitech.co.kr";

$referers = array('autohitech.co.kr','www.autohitech.co.kr');
echo "<meta charset=\"utf-8\">";
function print_error($reason,$type = 0) {
   global $version;
   build_body($title, $bgcolor, $text_color, $link_color, $vlink_color, $alink_color, $style_sheet);
   
   if ($type == "missing") {
      ?><center><P><P>
      다음과 같은 이유로 메일을 보낼수 없습니다.:<p>
     <ul><?
     echo $reason."\n";
     ?></ul>
     <A href='javascript:history.back()'>여기</a>를 클릭하시어 다시 시도하시기 바랍니다.

<?
   } else { // 다른 에러가 있을까
      ?>
      다음과 같은 이유로 메일을 보낼수 없습니다.:<p>
      <?
   }
   echo "<br><br>\n";

 //  echo "<small><a href=\"http://www.bizdb.com/\">Alex Kim Formmail.php $version!</a></small>\n\n";
 // include "./send_footer.html";



 exit;
}

function check_referer($referers){
   if (count($referers)){
      $found = false;
      $temp = explode("/",getenv("HTTP_REFERER"));
      $referer = $temp[2];
      for ($x=0; $x < count($referers); $x++){
         if (preg_match("/" . $referers[$x] . "/", $referer)) {
            $found = true;
         }
      }
      if (!$found){
         print_error("<b>승인되지 않은 도메인입니다.(".getenv("HTTP_REFERER").")</b> ");
         error_log("승인되지 않은 도메인(".getenv("HTTP_REFERER").")", 0);
      }
         return $found;
      } else {
         return true; 
   }
}
if ($referers)
   check_referer($referers);


function parse_form($array) {
   $reserved_keys[] = "MAX_FILE_SIZE";
   $reserved_keys[] = "required";
   $reserved_keys[] = "redirect";
   $reserved_keys[] = "email";
   $reserved_keys[] = "require";
   $reserved_keys[] = "path_to_file";
   $reserved_keys[] = "recipient";
   $reserved_keys[] = "subject";
   $reserved_keys[] = "bgcolor";
   $reserved_keys[] = "text_color";
   $reserved_keys[] = "link_color";
   $reserved_keys[] = "vlink_color";
   $reserved_keys[] = "alink_color";
   $reserved_keys[] = "title";
   $reserved_keys[] = "missing_fields_redirect";
   $reserved_keys[] = "env_report";
   
   $content = "";
   if (is_array($array)) {
      foreach ($array as $key => $val) {
         $reserved_violation = 0;
         for ($ri=0; $ri<count($reserved_keys); $ri++) {
            if ($key == $reserved_keys[$ri]) {
               $reserved_violation = 1;
            }
         }

         if ($reserved_violation != 1) {
            if (is_array($val)) {
               for ($z=0;$z<count($val);$z++) {
                  $content .= "$key: $val[$z]\n";
               }
            } else {
               $content .= "$key: $val\n";
            }
         }
      }
   }
   return $content;
}

function encode_alex($subject) {
    return '=?euc-kr?b?'.base64_encode($subject).'?=';
}

function mailer($from_email, $from_name, $to, $cc, $bcc, $subject, $content) {
    $from_name = encode_alex(iconv("UTF-8","EUC-KR",$from_name));
    $admin_name = encode_alex(iconv("UTF-8","EUC-KR",$admin_name));
    $subject = iconv("UTF-8","EUC-KR",$subject);
    $content= iconv("UTF-8","EUC-KR",$content);

    $headers  = "From: $from_name<$from_email>\n";
    $headers .= "Date: ".date('r', $_SERVER['REQUEST_TIME'])."\n";  
    $headers .= "Message-ID: <" . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME']) . "@" . $_SERVER['SERVER_NAME'] .">\n";
    $headers .= "Return-Path: <".$admin_email.">\n";
    $headers .= "X-Sender: $admin_email\n";
    $headers .= "Return-L: $admin_email\n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "X-Priority: 3\n";
    $headers .= "X-MSMail-Priority: Normal\n";
    $headers .= "X-Mailer: AlexFormMailer\n";
    $headers .= "Content-Type: text/html; charset=EUC-KR\n";
   // $headers .= "Content-Transfer-Encoding: base64\n";

    if($cc)
        $headers .= "cc:$cc\n";
    if($bcc)
        $headers .= "bcc:$bcc\n";
    @mail($to, $subject, $content, $headers);
}

function build_body($title, $bgcolor, $text_color, $link_color, $vlink_color, $alink_color, $style_sheet) {
   if ($style_sheet)
      echo "<LINK rel=STYLESHEET href=\"$style_sheet\" Type=\"text/css\">\n";
   if ($title)
      echo "<title>$title</title>\n";
   if (!$bgcolor)
      $bgcolor = "#FFFFFF";
   if (!$text_color)
      $text_color = "#000000";
   if (!$link_color)
      $link_color = "#0000FF";
   if (!$vlink_color)
      $vlink_color = "#FF0000";
   if (!$alink_color)
      $alink_color = "#000088";
   if ($background)
      $background = "background=\"$background\"";
   echo "<body bgcolor=\"$bgcolor\" text=\"$text_color\" link=\"$link_color\" vlink=\"$vlink_color\" alink=\"$alink_color\" $background>\n\n";
}

$sks_in = explode(',',$sks);
for ($i=0;$i<count($sks_in);$i++) {
   $sks_to_test = trim($sks_in[$i]);
   if (!preg_match("/^[_\\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\\.)+[a-z]{2,3}$/i", $sks_to_test)) {
      print_error("<b>I NEED VALID RECIPIENT EMAIL ADDRESS ($sks_to_test) TO CONTINUE</b>");
   }
}

if ($required)
   $require = $required;
if ($require) {
   $require = preg_replace("/ +/", "", $require);
   $required = explode(",",$require);
   for ($i=0;$i<count($required);$i++) {
      $string = trim($required[$i]);
      if((!(${$string})) || (!(${$string}))) {
            if ($missing_fields_redirect) {
            header ("Location: $missing_fields_redirect");
            exit;
         }
         $missing_field_list .= "<b>$required[$i]을 채워주세요</b><br>\n";
      }
   }
      if ($missing_field_list)
      print_error($missing_field_list,"missing");
}

// email 전화번호 유효성 검사
if (($email) || ($EMAIL)) {
   $email = trim($email);
   if ($EMAIL)
      $email = trim($EMAIL);
   if (!preg_match("/^[_\.0-9a-z-]+@([0-9a-z][0-9a-z-]+\.)+[a-z]{2,3}$/i", $email)) {
      print_error("잘못된<b>email 주소</b>입니다.");
   }
   $EMAIL = $email;
}

//$subject = iconv("EUC-KR", "UTF-8", $subject);
$subject =  "방문예약";
$mail_title = "-견적문의-"; 
$systemsetting = preg_replace("/\n/", "<br>", $System_setting);
include "../email/_email_inquriy.html";
//mail_it(stripslashes($content), stripslashes($subject), $email, $sks);
mailer($email, $Name, $sks, '', '', $mail_title, $send_content, '', 1, '', ''); 

if ($redirect) {
   header ("Location: $redirect");
   exit;
} else {
 echo "<meta charset=\"utf-8\"><script language='javascript'>alert('문의 주셔서 감사합니다. 빠른시일 내에 연락드리겠습니다.');</script>";
 echo "<meta http-equiv='refresh' content='0;url=estimate.html'>";
   exit;
}
?>
