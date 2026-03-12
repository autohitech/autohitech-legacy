<?php
// .env 파일의 환경 변수를 가져오거나 기본값을 사용합니다.
$mysql_host     = getenv('DB_HOST')     ?: 'db';
$mysql_user     = getenv('DB_USER')     ?: 'autohitech';
$mysql_password = getenv('DB_PASSWORD') ?: 'wjstks2025!!';
$mysql_db       = getenv('DB_NAME')     ?: 'autotech';
?>
