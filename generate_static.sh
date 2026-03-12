#!/bin/bash

# static_site 디렉토리 초기화
rm -rf static_site
mkdir -p static_site

echo "Waiting for the web server to be ready..."
# 서버가 응답할 때까지 대기 (최대 60초)
NEXT_WAIT_TIME=0
until $(curl --output /dev/null --silent --head --fail http://localhost:8000); do
    printf '.'
    sleep 2
    NEXT_WAIT_TIME=$((NEXT_WAIT_TIME+2))
    if [ $NEXT_WAIT_TIME -gt 60 ]; then
        echo "Error: Server timeout"
        exit 1
    fi
done
echo "Server is up!"

echo "Starting static site generation..."

# wget을 사용하여 정적 파일 추출
# --recursive: 재귀적으로 방문
# --page-requisites: 페이지를 보여주는 데 필요한 모든 파일(이미지, CSS 등) 다운로드
# --html-extension: .php 파일을 .html로 저장
# --convert-links: 로컬에서 작동하도록 링크 변환
# --no-clobber: 이미 존재하는 파일은 다시 받지 않음
# --restrict-file-names=windows: 특수문자를 안전하게 변환
# --domains localhost: localhost 외부로는 나가지 않음
# --no-parent: 상위 디렉토리로는 가지 않음
wget --recursive \
     --page-requisites \
     --html-extension \
     --convert-links \
     --restrict-file-names=windows \
     --no-clobber \
     --domains localhost \
     --no-parent \
     --directory-prefix=static_site \
     --no-host-directories \
     http://localhost:8000/

# index.php.html을 index.html로 링크 (GitHub Pages 기본 진입점)
if [ -f "static_site/index.php.html" ]; then
    cp "static_site/index.php.html" "static_site/index.html"
fi

echo "Static site generation complete in ./static_site"
