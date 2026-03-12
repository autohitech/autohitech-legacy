<?php

define('ga_email','alexkk@hanmail.net');
define('ga_password','kimn0247');
define('ga_profile_id','72344518');
include "./acclog/gapi.class.php";
$ga = new gapi(ga_email,ga_password);


$accroot_path = "/www/engart/www/adm/acclog";

// 전역변수
include "$accroot_path/acclog.config.php";

?>
