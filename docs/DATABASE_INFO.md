# Database Information: autotech

This document provides a functional overview of the tables in the Autohitech database, categorizing them into standard Gnuboard 4 modules and custom business modules.

## 🏢 Business & CRM Modules (Custom)

These tables are unique to the Autohitech system and manage internal business processes.

| Table | Purpose | Description |
| :--- | :--- | :--- |
| **`diary`** | **Work Logs (Daily Report)** | The largest custom table (22,000+ rows). Used for recording daily field activities, site visits, and technical support logs (e.g., PLC maintenance, site inspections). |
| **`customers`** | **Client/Contact Management** | CRM-style table managing company names, contact persons, phone numbers, addresses, and emails for business leads and partners. |
| **`adm_user`** | **Admin User Management** | Likely a secondary admin authentication table or specific permissions for custom modules. |
| **`bbs`** | **Legacy Bulletin Board** | An older or simplified board structure, possibly used for internal quick memos or legacy data. |
| **`Sheet1`** | **Temporary Data Import** | Usually an imported Excel sheet for one-time data migration or reference. |

## 🛠️ Gnuboard 4 Core Tables (Standard)

Standard tables used for the website's community features and basic configuration.

### 1. Configuration & Management
- **`g4_config`**: Global site settings (title, theme, admin email, etc.).
- **`g4_group`**: Categorizes multiple boards into logical groups.
- **`g4_auth`**: Fine-grained administrative permissions for specific modules.
- **`g4_banner`**: Manages rolling banners or advertisement images.

### 2. User & Membership
- **`g4_member`**: Core user data (ID, password, nickname, level, points).
- **`g4_login`**: Tracks user login history and IP addresses.
- **`g4_memo`**: Internal private messages sent between members.
- **`g4_point`**: Ledger for all point transactions (earned/spent).
- **`g4_scrap`**: Stores posts that users have "scrapped" to their profile.

### 3. Board & Content
- **`g4_board`**: Configuration for each individual bulletin board (permissions, skin, etc.).
- **`g4_board_file`**: Metadata for all files uploaded to board posts.
- **`g4_board_new`**: Index for recent posts across all boards for "Latest Posts" widgets.
- **`g4_write_[bo_table]`**: Individual tables that store the actual content of posts for each board (e.g., `g4_write_notice`).

### 4. Statistics & Tracking
- **`g4_visit`**: Real-time visitor counts and statistics (OS, Browser, Referer).
- **`g4_popular`**: Stores and counts frequently used search terms.
- **`g4_homeconfig`**: Custom configuration for homepage layout or design elements.

## 📝 Usage Notes
- **G4 Prefix**: All standard Gnuboard 4 tables start with `g4_`.
- **Legacy Variations**: Tables like `customers22`, `customers-0305`, and `customers_old` are backup versions or historical snapshots of the main `customers` table.
- **Encoded Data**: Some `diary` and `customers` entries may show encoding issues in raw SQL but are intended to be displayed as Korean (EUC-KR/UTF-8) in the web interface.
