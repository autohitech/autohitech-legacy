# Project: Autohitech (Legacy Archive)

> [!IMPORTANT]
> **Project Status: Archival & Reference Only**
> This project is no longer actively managed or maintained. It serves as a comprehensive reference for legacy Gnuboard 4 (G4) systems and provides a baseline for migrating to modern tech stacks.

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
- **Database Cleanup & Security**:
  - **Admin Password Reset**: Reset `admin` account password to `1234` for local development and archival access.
  - **Member Cleanup**: Deleted all user accounts except the `admin` account to ensure a clean archival state.
  - **Content Management**: Deleted specific spam/outdated posts (qna01: 1821, 1820, 1083, 1084) and synchronized board counts.
  - **State Persistence**: Updated `database/autotech.sql` with the final cleaned and secured state.
- **Session Management**: Fixed PHP session save path warning by ensuring `data/session` directory exists and using `realpath()` for absolute path in `common.php`.
- **Legacy Compatibility**: 
  - Fixed `split()` deprecated warnings by replacing them with `explode()`.
  - Suppressed `E_DEPRECATED` notices in `common.php`.
- **Security & Access Control**:
  - Refactored `dbconfig.php` to use `getenv()` for database credentials.
  - **Localhost Restriction**: Restricted access to the Admin panel (`/adm`) and Login page (`home/login.php`) to `localhost` (127.0.0.1) only, redirecting external attempts to the main page.
  - Removed intrusive "Please login" JavaScript alerts for a smoother navigation experience.
- **Database Compatibility & Hygiene**:
  - Disabled MySQL 5.7 Strict Mode by executing `SET sql_mode = ''` on connection.
  - **Spam Cleanup**: Performed an exhaustive site-wide cleanup of spam comments and posts. Synchronized board and comment counters.
- **JS Modernization & Compatibility**:
  - **jQuery Upgrade**: Upgraded to **jQuery 3.7.1**, **jQuery UI 1.14.1**, and **jQuery Easing 1.4.1** (latest stable versions).
  - **Migrate Removal**: Entirely removed `jquery-migrate` by refactoring all legacy jQuery syntax and event aliases.
  - **Bundling & Optimization**: Consolidated 13 individual JS files into two main bundles: **`js/autotech.bundle.js`** (UI/Plugins) and **`js/g4.core.js`** (Utilities/Security). Removed redundant source files.
  - **ES6+ Standards**: Refactored the entire JS codebase to use `const`, `let`, arrow functions, and classes. Implemented `G4` and `G4_Core` namespaces.
  - **Security (XSS Protection)**: Hardened data rendering with HTML escaping and replaced `innerHTML` with `textContent` across core functions.
  - **Maintenance System**: Created `build_js.sh` as a reference for the bundle composition and implemented automatic cache-busting (?v=mtime) in headers.
- **HTML & Layout Modernization**:
  - **Layout Unification**: Standardized container opening/closing logic across `head.php`, `top_*.html`, and `tail.php`, resolving alignment and footer issues.
  - **Main Page Restoration**: Restored missing `#mainWrap`, `#c_con`, and `#c_base` styles in `css/main.css`. Added clearfixes to contain floated elements.
  - **Banner Clipping Resolution**: Resolved the clipping issue for customer banners (`bn_cus0[1-3]`) by removing rigid height constraints and implementing CSS-based alignment.
  - **Sticky Footer**: Implemented a Flexbox-based layout for the `body`, ensuring the footer remains at the bottom of the viewport even on pages with minimal content.
  - **Popup Modernization**: Replaced legacy table-based "Terms" and "Privacy" popups with a clean, CSS-based `.modern-popup` structure.
  - **Menu UX Optimization**: 
    - Resolved submenu hover "gap" issue.
    - Disabled submenus for "SCADA&Touch" and "Education" items as requested, including both HTML removal and JS logic updates.
  - Cleaned up the top menu: removed mobile link, updated staff link to `/adm`, and fixed search bar alignment using Flexbox.
- **UI Behavior & Accessibility**:
  - **TOP Button**: Restored the "follow-scroll" behavior using jQuery `animate` for a smoother user experience, moving from `fixed` to a dynamic `absolute` position.
  - **Font Control**: Implemented functional font resizing (increase/decrease/reset) for the `b_font` controls, affecting body and table text globally.
- **Documentation & Maintenance**:
  - Exhaustively updated file registry in `docs/` (`PHP_FILES_LIST.md`, `HTML_LIST.md`, etc.).
  - Created `docs/IMG_LIST.md` to index and categorize over 5,800 project assets.

## Final Notes
- **Archive Status**: This repository is now a static archive. No further feature development or bug fixes will be performed.
- **Reference Value**: Use the `js/` and `css/` modernizations as a template for upgrading legacy PHP applications to modern standards.

## Guidelines
- **Include Rules**: Always use `include "inc/..."` (no `./`) for fragments. For full page layouts, use `include_once("$g4[path]/head.php")` and `include_once("$g4[path]/tail.php")` to ensure consistent menu and footer rendering.
- **PHP Logic**: Ensure no output (HTML/Whitespace) exists before PHP logic that modifies headers.
- **G4 Path**: Always verify `$g4['path']` and `$g4_path` are correctly set relative to the project root.
