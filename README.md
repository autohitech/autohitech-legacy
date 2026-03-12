# 🚀 Autohitech Legacy System (Modernized)

![PHP](https://img.shields.io/badge/PHP-5.6-777BB4?style=flat-square&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7-4479A1?style=flat-square&logo=mysql&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-Enabled-2496ED?style=flat-square&logo=docker&logoColor=white)
![Framework](https://img.shields.io/badge/Framework-Gnuboard%204-red?style=flat-square)
![Status](https://img.shields.io/badge/Status-Legacy%20Archive-orange?style=flat-square&logo=github)

오토하이테크의 레거시 그누보드 4 시스템을 현대적인 도커 환경으로 복구하고 최적화한 프로젝트입니다.


## 🌟 Key Features

- **현대적 개발 환경**: Docker Compose를 통한 원클릭 환경 구축.
- **비즈니스 모듈**: 22,000건 이상의 업무 일지(`diary`) 및 고객 관리(`customers`) 연동.
- **안정적인 레거시 지원**: PHP 5.6 호환성 확보 및 `.htm` 파일의 PHP 실행 환경 구성.
- **보안 강화**: `.env` 기반의 환경 변수 관리 및 데이터베이스 크리덴셜 분리.


## 🛠 Tech Stack

- **Backend**: PHP 5.6 (Apache)
- **Database**: MySQL 5.7
- **Database Management**: Adminer
- **Infrastructure**: Docker & Docker Compose


## 🚀 Quick Start

### 1. 환경 설정
설정 예시 파일을 복사하여 `.env` 파일을 생성합니다.
```bash
cp .env.example .env
# .env 파일을 열어 필요한 비밀번호를 수정하세요.
```

### 2. 컨테이너 실행
```bash
docker-compose up -d
```

### 3. 접속 정보
- **Website**: [http://localhost:8000](http://localhost:8000) (자동 리다이렉트: `main/main.php`)
- **Adminer (DB UI)**: [http://localhost:8080](http://localhost:8080)
- **External MySQL**: `localhost:3307`


## 📂 Project Structure

```text
autohitech-legacy/
├── database/           # DB 덤프 및 데이터 저장소
│   ├── autotech.sql    # 초기 데이터 데이터베이스
│   └── mysql_data/     # 컨테이너 데이터 (Git 제외)
├── docs/               # 시스템 및 데이터베이스 문서
│   ├── PHP_FILES_LIST.md
│   ├── DATABASE_INFO_KR.md
│   └── DATABASE_SCHEMA_KR.md
├── inc/                # 공지/레이아웃 공통 HTML
├── main/               # 메인 페이지 및 비주얼 리소스
├── home/               # 그누보드 4 핵심 엔진 및 게시판
├── data/               # 업로드 파일 및 세션 데이터
├── .env                # 환경 설정 (Git 제외)
└── docker-compose.yml  # 도커 오케스트레이션
```


## 📖 Documentation

시스템 구조 및 데이터베이스 상세 정보는 아래 문서를 참고하세요.

- [PHP_FILES_LIST.md](./docs/PHP_FILES_LIST.md) - PHP 파일 전체 목록
- [HTML_LIST.md](./docs/HTML_LIST.md) - HTML 리소스 파일 목록 
- [CSS_LIST.md](./docs/CSS_LIST.md) - CSS 스타일시트 목록 
- [JS_LIST.md](./docs/JS_LIST.md) - JavaScript 스크립트 목록 
- [XML_LIST.md](./docs/XML_LIST.md) - XML 데이터 파일 목록 
- [PDF_LIST.md](./docs/PDF_LIST.md) - PDF 문서 파일 목록
- [DATABASE_INFO_KR.md](./docs/DATABASE_INFO_KR.md) - 테이블별 상세 기능 설명
- [DATABASE_SCHEMA_KR.md](./docs/DATABASE_SCHEMA_KR.md) - 데이터베이스 기술 스키마
- [GEMINI.md](./GEMINI.md) - 프로젝트 개발 가이드 및 히스토리


## 🔧 Maintenance

- **로그 확인**: `docker logs -f autohitech-web`
- **컨테이너 중지**: `docker-compose down`
- **데이터 초기화**: `docker-compose down -v` (주의: 모든 DB 데이터가 초기화됩니다.)

© 2013-2026 Autohitech. All rights reserved.
