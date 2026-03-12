# Project: Autohitech (New)

## Core Mandates
- **Environment**: Docker (MySQL 5.7, PHP 5.6-Apache, Adminer)
- **Framework**: Gnuboard 4 (G4) legacy system.
- **Port Strategy**: External MySQL (3307), External Adminer (8080), External Web (8000).
- **Encoding**: Source is compatible with UTF-8/EUC-KR (Apache configured with `AddDefaultCharset Off`).
- **Security**: Sensitive database credentials stored in `.env`. Never commit `.env` or `database/mysql_data/`.

## Architectural Context
- **Database**:
  - **Database Name**: `autotech`
  - **Tables**: Uses `g4_` prefix.
  - **Storage**: Persistent in `./database/mysql_data`.
- **Source Code**:
  - Successfully merged legacy code from `git@github.com:autohitech/autohitech.kr-legacy.git`.
  - Entry point: `index.php` redirects to `main/main.php`.
- **Global Path & Include Strategy**:
  - **Apache `include_path`**: Set to `.:/var/www/html`. This allows including files like `inc/file.htm` from any subdirectory without relative path mess.
  - **HTM as PHP**: Apache is configured to execute `.htm` and `.html` files as PHP.
  - **Prefix Removal**: All `include` paths have been updated to remove `./` prefixes (e.g., `include "inc/..."` instead of `include "./inc/..."`) to leverage the `include_path`.

## Recent Progress
- **Session Management**: Fixed PHP session save path warning by ensuring `data/session` directory exists and using `realpath()` for absolute path in `common.php`.
- **Legacy Compatibility**: 
  - Fixed `split()` deprecated warnings by replacing them with `explode()`.
  - Suppressed `E_DEPRECATED` notices in `common.php`.
- **Layout Restoration**:
  - Restored `head.php` and `tail.php` linkage for board pages (`home/board.php`).
  - Fixed broken layout by adding missing `</div>` for `contWrap` in `tail.php`.
  - Corrected menu path definitions in `_menu.php`.
- **Security**: Refactored `dbconfig.php` to use `getenv()` for database credentials.
- **Error Logging & Diagnostics**: Enabled PHP error logging to `data/log/php_error.log` in `common.php` and `common_mvv.php` for tracking runtime issues.
- **PHP Modernization (Step 2 & 3)**:
  - Replaced deprecated `each()` loops with `foreach` in core files.
  - Implemented manual variable extraction (`extract`) in `common_mvv.php`.
  - Migrated POSIX regex (`ereg`, `eregi`) to PCRE (`preg_match`, `preg_replace`).
  - Replaced `session_unregister()` with modern `unset($_SESSION['var'])`.
- **Security & Hardening (Step 4)**:
  - Prevented directory listing by creating `index.html` in all subdirectories of `data/`.
  - Added `data/.htaccess` to block script execution in upload directories.
  - Verified foundation for SQL Injection and XSS protection in `common.php`.
  - Adjusted `data/` directory permissions to **707** and files to **606** for web server write access.
- **Database Compatibility**:
  - Disabled MySQL 5.7 Strict Mode by executing `SET sql_mode = ''` on connection, ensuring legacy query compatibility.
  - Completed migration of all `.htm` extensions to `.html` across the entire codebase and links.
  - Cleaned up 250+ redundant duplicate files (` 2.php`, `.ori`, `.bak`, etc.).
  - Regenerated all resource list documentation in `docs/` folder.
  - Verified core navigation path (root -> main).
- **Modernization (Flash Removal & Chart Recovery)**: 
  - Replaced Flash-based FusionCharts with Google Charts in admin statistics (`adm/access_log_index.php`).
  - Implemented automatic XML-to-GoogleChart parser in `adm/admin.head.php`.
  - Removed all 13 redundant `.swf` files from the project.
- **JS Modernization & Compatibility**:
  - Upgraded jQuery from 1.3/1.7 to **1.12.4** (final legacy-supporting version).
  - Added **jQuery Migrate 1.4.1** to ensure backward compatibility for legacy plugins.
  - Implemented a robust **Google Charts XML Parser** in `adm/admin.head.php` with automatic retry and error handling logic.
  - Updated script references across `head.admin.php`, `head.sub.php`, and `inc/top_menu.html`.
- **HTML & Layout Modernization**:
  - Implemented semantic HTML5 tags (`<header>`, `<footer>`, `<!DOCTYPE html>`) in core layout files.
  - Converted key sub-pages (`location01.html`, `organization01.html`) from legacy `<table>` to modern `<div>` structures while maintaining visual alignment via `css/sub.css`.
  - Refactored `main/main.php` to include `head.sub.php`, fixing layout breakage caused by missing headers.
- **Animation & Interaction Recovery**:
  - Restored AutoBase accordion animation in `main/c_base.html` by upgrading its internal jQuery environment.
  - Fixed notice/Q&A tab switching logic in `main/c_cus.html` using standard DOM methods.
  - Cleaned up redundant script calls across layout fragments to prevent jQuery event conflicts.
- **CSS Optimization**:
  - Standardized indentation and moved archived/commented code to the bottom of core CSS files.
  - Removed legacy IE expressions and updated filters to standard grayscale.
- **XML Data Modernization**:
  - Converted all 27 statistics XML files in `adm/class/` from EUC-KR to **UTF-8**.
  - Standardized XML declarations and fixed syntax errors (e.g., escaping `&` to `&amp;`) for modern browser compatibility.
  - Updated XML generation PHP scripts to output native UTF-8 data.
- **Sub-page Recovery & Navigation Fix**:
  - Fixed blank sub-pages by repairing broken `$g4_path` and `head.php` include logic in all 40+ `.html` files.
  - Implemented `gr_id` auto-detection in `_menu.php` based on URL paths, enabling correct menu highlighting and sidebar rendering for static pages.
  - Added legacy `MM_openBrWindow` function to `js/common.js` for compatibility with old Dreamweaver-style popups.
  - Standardized header/footer inclusion across the entire site to prevent double-header or missing-header issues.
  - **Layout Standardization**: Resolved duplicate `menuWrap` issues by removing redundant explicit menu includes (`inc/menu_*.html`) and `inc/copy.html` from sub-pages.
  - **Syntax Correction**: Fixed critical syntax errors in sub-pages (missing `$g4_path` variables and broken `[path]` variables) introduced during automated migration.

## Next Steps
- **Cross-Browser Testing**: Verify layout and JavaScript functionality in modern browsers (Chrome, Safari, Edge).
- **Form Validation & Mailer**: Test and verify online inquiry forms (`online_form.php`) and ensure the mailer function is compatible with modern SMTP requirements if needed.
- **Image Path Audit**: Scan for and fix any remaining broken image links or hardcoded legacy paths.
- **SEO & Meta Tags**: Standardize `<title>` and `<meta>` tags across sub-pages using G4's global configuration.
- **Mobile Responsiveness**: Evaluate the feasibility of adding basic responsive styles to the fixed-width desktop layout.

## Guidelines
- **Include Rules**: Always use `include "inc/..."` (no `./`) for fragments. For full page layouts, use `include_once("$g4[path]/head.php")` and `include_once("$g4[path]/tail.php")` to ensure consistent menu and footer rendering.
- **PHP Logic**: Ensure no output (HTML/Whitespace) exists before PHP logic that modifies headers.
- **G4 Path**: Always verify `$g4['path']` and `$g4_path` are correctly set relative to the project root.
