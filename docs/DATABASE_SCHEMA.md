# Database Schema: autotech

This document outlines the tables and columns for the Autohitech (Gnuboard 4) database.

## Table Categories
1. [Gnuboard 4 Standard Tables](#gnuboard-4-standard-tables)
2. [Custom & Legacy Tables](#custom--legacy-tables)

---

## Gnuboard 4 Standard Tables

### g4_auth
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| mb_id | varchar(255) | NO | PRI |  |  |
| au_menu | varchar(20) | NO | PRI |  |  |
| au_auth | set('r','w','d') | NO |  |  |  |

### g4_banner
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| bn_id | int(11) | NO | PRI | NULL |  |
| bn_location | char(1) | NO |  |  |  |
| bn_url | varchar(255) | NO |  |  |  |
| bn_target | tinyint(1) | NO |  | 0 |  |
| bn_openchk | tinyint(1) | NO | MUL | 0 |  |
| bn_start_date | varchar(19) | NO | MUL |  |  |
| bn_end_date | varchar(19) | NO |  |  |  |
| bn_subject | varchar(255) | NO |  |  |  |
| bn_width | int(11) | NO |  | 0 |  |
| bn_height | int(11) | NO |  | 0 |  |
| bn_file_name | varchar(255) | NO |  |  |  |
| bn_file_source | varchar(255) | NO |  |  |  |
| bn_file_type | varchar(255) | NO |  |  |  |
| bn_seq | int(11) | NO |  | 0 |  |
| bn_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |

### g4_board
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| bo_table | varchar(20) | NO | PRI |  |  |
| gr_id | varchar(255) | NO |  |  |  |
| bo_subject | varchar(255) | NO |  |  |  |
| bo_admin | varchar(255) | NO |  |  |  |
| bo_list_level | tinyint(4) | NO |  | 0 |  |
| bo_read_level | tinyint(4) | NO |  | 0 |  |
| bo_write_level | tinyint(4) | NO |  | 0 |  |
| bo_reply_level | tinyint(4) | NO |  | 0 |  |
| bo_comment_level | tinyint(4) | NO |  | 0 |  |
| bo_upload_level | tinyint(4) | NO |  | 0 |  |
| bo_download_level | tinyint(4) | NO |  | 0 |  |
| bo_html_level | tinyint(4) | NO |  | 0 |  |
| bo_link_level | tinyint(4) | NO |  | 0 |  |
| bo_trackback_level | tinyint(4) | NO |  | 0 |  |
| bo_count_delete | tinyint(4) | NO |  | 0 |  |
| bo_count_modify | tinyint(4) | NO |  | 0 |  |
| bo_read_point | int(11) | NO |  | 0 |  |
| bo_write_point | int(11) | NO |  | 0 |  |
| bo_comment_point | int(11) | NO |  | 0 |  |
| bo_download_point | int(11) | NO |  | 0 |  |
| bo_use_category | tinyint(4) | NO |  | 0 |  |
| bo_category_list | text | NO |  | NULL |  |
| bo_disable_tags | text | NO |  | NULL |  |
| bo_use_sideview | tinyint(4) | NO |  | 0 |  |
| bo_use_file_content | tinyint(4) | NO |  | 0 |  |
| bo_use_secret | tinyint(4) | NO |  | 0 |  |
| bo_use_dhtml_editor | tinyint(4) | NO |  | 0 |  |
| bo_use_rss_view | tinyint(4) | NO |  | 0 |  |
| bo_use_comment | tinyint(4) | NO |  | 0 |  |
| bo_use_good | tinyint(4) | NO |  | 0 |  |
| bo_use_nogood | tinyint(4) | NO |  | 0 |  |
| bo_use_name | tinyint(4) | NO |  | 0 |  |
| bo_use_signature | tinyint(4) | NO |  | 0 |  |
| bo_use_ip_view | tinyint(4) | NO |  | 0 |  |
| bo_use_trackback | tinyint(4) | NO |  | 0 |  |
| bo_use_list_view | tinyint(4) | NO |  | 0 |  |
| bo_use_list_content | tinyint(4) | NO |  | 0 |  |
| bo_table_width | int(11) | NO |  | 0 |  |
| bo_subject_len | int(11) | NO |  | 0 |  |
| bo_page_rows | int(11) | NO |  | 0 |  |
| bo_new | int(11) | NO |  | 0 |  |
| bo_hot | int(11) | NO |  | 0 |  |
| bo_image_width | int(11) | NO |  | 0 |  |
| bo_skin | varchar(255) | NO |  |  |  |
| bo_image_head | varchar(255) | NO |  |  |  |
| bo_image_tail | varchar(255) | NO |  |  |  |
| bo_include_head | varchar(255) | NO |  |  |  |
| bo_include_tail | varchar(255) | NO |  |  |  |
| bo_content_head | text | NO |  | NULL |  |
| bo_content_tail | text | NO |  | NULL |  |
| bo_insert_content | text | NO |  | NULL |  |
| bo_gallery_cols | int(11) | NO |  | 0 |  |
| bo_upload_size | int(11) | NO |  | 0 |  |
| bo_reply_order | tinyint(4) | NO |  | 0 |  |
| bo_use_search | tinyint(4) | NO |  | 0 |  |
| bo_order_search | int(11) | NO |  | 0 |  |
| bo_count_write | int(11) | NO |  | 0 |  |
| bo_count_comment | int(11) | NO |  | 0 |  |
| bo_write_min | int(11) | NO |  | 0 |  |
| bo_write_max | int(11) | NO |  | 0 |  |
| bo_comment_min | int(11) | NO |  | 0 |  |
| bo_comment_max | int(11) | NO |  | 0 |  |
| bo_notice | text | NO |  | NULL |  |
| bo_upload_count | tinyint(4) | NO |  | 0 |  |
| bo_use_email | tinyint(4) | NO |  | 0 |  |
| bo_sort_field | varchar(255) | NO |  |  |  |
| bo_1_subj | varchar(255) | NO |  |  |  |
| bo_2_subj | varchar(255) | NO |  |  |  |
| bo_3_subj | varchar(255) | NO |  |  |  |
| bo_4_subj | varchar(255) | NO |  |  |  |
| bo_5_subj | varchar(255) | NO |  |  |  |
| bo_6_subj | varchar(255) | NO |  |  |  |
| bo_7_subj | varchar(255) | NO |  |  |  |
| bo_8_subj | varchar(255) | NO |  |  |  |
| bo_9_subj | varchar(255) | NO |  |  |  |
| bo_10_subj | varchar(255) | NO |  |  |  |
| bo_1 | varchar(255) | NO |  |  |  |
| bo_2 | varchar(255) | NO |  |  |  |
| bo_3 | varchar(255) | NO |  |  |  |
| bo_4 | varchar(255) | NO |  |  |  |
| bo_5 | varchar(255) | NO |  |  |  |
| bo_6 | varchar(255) | NO |  |  |  |
| bo_7 | varchar(255) | NO |  |  |  |
| bo_8 | varchar(255) | NO |  |  |  |
| bo_9 | varchar(255) | NO |  |  |  |
| bo_10 | varchar(255) | NO |  |  |  |

### g4_board_file
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| bo_table | varchar(20) | NO | PRI |  |  |
| wr_id | int(11) | NO | PRI | 0 |  |
| bf_no | int(11) | NO | PRI | 0 |  |
| bf_source | varchar(255) | NO |  |  |  |
| bf_file | varchar(255) | NO |  |  |  |
| bf_download | varchar(255) | NO |  |  |  |
| bf_content | text | NO |  | NULL |  |
| bf_filesize | int(11) | NO |  | 0 |  |
| bf_width | int(11) | NO |  | 0 |  |
| bf_height | smallint(6) | NO |  | 0 |  |
| bf_type | tinyint(4) | NO |  | 0 |  |
| bf_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |

### g4_board_good
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| bg_id | int(11) | NO | PRI | NULL |  |
| bo_table | varchar(20) | NO | MUL |  |  |
| wr_id | int(11) | NO |  | 0 |  |
| mb_id | varchar(20) | NO |  |  |  |
| bg_flag | varchar(255) | NO |  |  |  |
| bg_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |

### g4_board_new
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| bn_id | int(11) | NO | PRI | NULL |  |
| bo_table | varchar(20) | NO |  |  |  |
| wr_id | int(11) | NO |  | 0 |  |
| wr_parent | int(11) | NO |  | 0 |  |
| bn_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| mb_id | varchar(20) | NO | MUL |  |  |
| gr_id | varchar(10) | NO |  |  |  |

### g4_config
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| cf_title | varchar(255) | NO |  |  |  |
| cf_admin | varchar(255) | NO |  |  |  |
| cf_use_point | tinyint(4) | NO |  | 0 |  |
| cf_use_norobot | tinyint(4) | NO |  | 0 |  |
| cf_use_copy_log | tinyint(4) | NO |  | 0 |  |
| cf_use_email_certify | tinyint(4) | NO |  | 0 |  |
| cf_login_point | int(11) | NO |  | 0 |  |
| cf_cut_name | tinyint(4) | NO |  | 0 |  |
| cf_nick_modify | int(11) | NO |  | 0 |  |
| cf_new_skin | varchar(255) | NO |  |  |  |
| cf_login_skin | varchar(255) | NO |  |  |  |
| cf_new_rows | int(11) | NO |  | 0 |  |
| cf_search_skin | varchar(255) | NO |  |  |  |
| cf_connect_skin | varchar(255) | NO |  |  |  |
| cf_read_point | int(11) | NO |  | 0 |  |
| cf_write_point | int(11) | NO |  | 0 |  |
| cf_comment_point | int(11) | NO |  | 0 |  |
| cf_download_point | int(11) | NO |  | 0 |  |
| cf_search_bgcolor | varchar(255) | NO |  |  |  |
| cf_search_color | varchar(255) | NO |  |  |  |
| cf_write_pages | int(11) | NO |  | 0 |  |
| cf_link_target | varchar(255) | NO |  |  |  |
| cf_delay_sec | int(11) | NO |  | 0 |  |
| cf_filter | text | NO |  | NULL |  |
| cf_possible_ip | text | NO |  | NULL |  |
| cf_intercept_ip | text | NO |  | NULL |  |
| cf_register_skin | varchar(255) | NO |  | basic |  |
| cf_member_skin | varchar(255) | NO |  |  |  |
| cf_use_homepage | tinyint(4) | NO |  | 0 |  |
| cf_req_homepage | tinyint(4) | NO |  | 0 |  |
| cf_use_tel | tinyint(4) | NO |  | 0 |  |
| cf_req_tel | tinyint(4) | NO |  | 0 |  |
| cf_use_hp | tinyint(4) | NO |  | 0 |  |
| cf_req_hp | tinyint(4) | NO |  | 0 |  |
| cf_use_addr | tinyint(4) | NO |  | 0 |  |
| cf_req_addr | tinyint(4) | NO |  | 0 |  |
| cf_use_signature | tinyint(4) | NO |  | 0 |  |
| cf_req_signature | tinyint(4) | NO |  | 0 |  |
| cf_use_profile | tinyint(4) | NO |  | 0 |  |
| cf_req_profile | tinyint(4) | NO |  | 0 |  |
| cf_register_level | tinyint(4) | NO |  | 0 |  |
| cf_register_point | int(11) | NO |  | 0 |  |
| cf_icon_level | tinyint(4) | NO |  | 0 |  |
| cf_use_recommend | tinyint(4) | NO |  | 0 |  |
| cf_recommend_point | int(11) | NO |  | 0 |  |
| cf_leave_day | int(11) | NO |  | 0 |  |
| cf_search_part | int(11) | NO |  | 0 |  |
| cf_email_use | tinyint(4) | NO |  | 0 |  |
| cf_email_wr_super_admin | tinyint(4) | NO |  | 0 |  |
| cf_email_wr_group_admin | tinyint(4) | NO |  | 0 |  |
| cf_email_wr_board_admin | tinyint(4) | NO |  | 0 |  |
| cf_email_wr_write | tinyint(4) | NO |  | 0 |  |
| cf_email_wr_comment_all | tinyint(4) | NO |  | 0 |  |
| cf_email_mb_super_admin | tinyint(4) | NO |  | 0 |  |
| cf_email_mb_member | tinyint(4) | NO |  | 0 |  |
| cf_email_po_super_admin | tinyint(4) | NO |  | 0 |  |
| cf_prohibit_id | text | NO |  | NULL |  |
| cf_prohibit_email | text | NO |  | NULL |  |
| cf_new_del | int(11) | NO |  | 0 |  |
| cf_memo_del | int(11) | NO |  | 0 |  |
| cf_visit_del | int(11) | NO |  | 0 |  |
| cf_popular_del | int(11) | NO |  | 0 |  |
| cf_use_jumin | tinyint(4) | NO |  | 0 |  |
| cf_use_member_icon | tinyint(4) | NO |  | 0 |  |
| cf_member_icon_size | int(11) | NO |  | 0 |  |
| cf_member_icon_width | int(11) | NO |  | 0 |  |
| cf_member_icon_height | int(11) | NO |  | 0 |  |
| cf_login_minutes | int(11) | NO |  | 0 |  |
| cf_image_extension | varchar(255) | NO |  |  |  |
| cf_flash_extension | varchar(255) | NO |  |  |  |
| cf_movie_extension | varchar(255) | NO |  |  |  |
| cf_formmail_is_member | tinyint(4) | NO |  | 0 |  |
| cf_page_rows | int(11) | NO |  | 0 |  |
| cf_visit | varchar(255) | NO |  |  |  |
| cf_max_po_id | int(11) | NO |  | 0 |  |
| cf_stipulation | text | NO |  | NULL |  |
| cf_privacy | text | NO |  | NULL |  |
| cf_open_modify | int(11) | NO |  | 0 |  |
| cf_memo_send_point | int(11) | NO |  | 0 |  |
| cf_1_subj | varchar(255) | NO |  |  |  |
| cf_2_subj | varchar(255) | NO |  |  |  |
| cf_3_subj | varchar(255) | NO |  |  |  |
| cf_4_subj | varchar(255) | NO |  |  |  |
| cf_5_subj | varchar(255) | NO |  |  |  |
| cf_6_subj | varchar(255) | NO |  |  |  |
| cf_7_subj | varchar(255) | NO |  |  |  |
| cf_8_subj | varchar(255) | NO |  |  |  |
| cf_9_subj | varchar(255) | NO |  |  |  |
| cf_10_subj | varchar(255) | NO |  |  |  |
| cf_1 | varchar(255) | NO |  |  |  |
| cf_2 | varchar(255) | NO |  |  |  |
| cf_3 | varchar(255) | NO |  |  |  |
| cf_4 | varchar(255) | NO |  |  |  |
| cf_5 | varchar(255) | NO |  |  |  |
| cf_6 | varchar(255) | NO |  |  |  |
| cf_7 | varchar(255) | NO |  |  |  |
| cf_8 | varchar(255) | NO |  |  |  |
| cf_9 | varchar(255) | NO |  |  |  |
| cf_10 | varchar(255) | NO |  |  |  |

### g4_design
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| ds_id | int(11) | NO | PRI | NULL |  |
| ds_site_align | varchar(19) | NO |  | NULL |  |
| ds_logo_top | varchar(255) | NO |  | NULL |  |
| ds_logo_btn | varchar(255) | NO |  | NULL |  |
| ds_topmenu | varchar(19) | NO |  | NULL |  |
| ds_main | varchar(100) | NO |  | NULL |  |
| ds_design_top | longtext | YES |  | NULL |  |
| ds_design_left | longtext | YES |  | NULL |  |
| ds_design_copy | longtext | YES |  | NULL |  |
| ds_option_0 | mediumtext | YES |  | NULL |  |
| ds_option_1 | mediumtext | YES |  | NULL |  |
| ds_option_2 | mediumtext | YES |  | NULL |  |
| ds_option_3 | mediumblob | YES |  | NULL |  |
| ds_option_4 | mediumblob | YES |  | NULL |  |
| ds_option_5 | mediumblob | YES |  | NULL |  |
| ds_option_6 | mediumblob | YES |  | NULL |  |
| ds_option_7 | mediumblob | YES |  | NULL |  |
| ds_option_8 | tinyblob | YES |  | NULL |  |
| ds_option_9 | tinyblob | YES |  | NULL |  |
| ds_option_10 | tinyblob | YES |  | NULL |  |
| ds_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |

### g4_group
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| gr_id | varchar(10) | NO | PRI |  |  |
| gr_subject | varchar(255) | NO |  |  |  |
| gr_admin | varchar(255) | NO |  |  |  |
| gr_use_access | tinyint(4) | NO |  | 0 |  |
| gr_1_subj | varchar(255) | NO |  |  |  |
| gr_2_subj | varchar(255) | NO |  |  |  |
| gr_3_subj | varchar(255) | NO |  |  |  |
| gr_4_subj | varchar(255) | NO |  |  |  |
| gr_5_subj | varchar(255) | NO |  |  |  |
| gr_6_subj | varchar(255) | NO |  |  |  |
| gr_7_subj | varchar(255) | NO |  |  |  |
| gr_8_subj | varchar(255) | NO |  |  |  |
| gr_9_subj | varchar(255) | NO |  |  |  |
| gr_10_subj | varchar(255) | NO |  |  |  |
| gr_1 | varchar(255) | NO |  |  |  |
| gr_2 | varchar(255) | NO |  |  |  |
| gr_3 | varchar(255) | NO |  |  |  |
| gr_4 | varchar(255) | NO |  |  |  |
| gr_5 | varchar(255) | NO |  |  |  |
| gr_6 | varchar(255) | NO |  |  |  |
| gr_7 | varchar(255) | NO |  |  |  |
| gr_8 | varchar(255) | NO |  |  |  |
| gr_9 | varchar(255) | NO |  |  |  |
| gr_10 | int(11) | NO |  | 0 |  |

### g4_group_member
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| gm_id | int(11) | NO | PRI | NULL |  |
| gr_id | varchar(255) | NO | MUL |  |  |
| mb_id | varchar(255) | NO | MUL |  |  |
| gm_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |

### g4_homeconfig
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| tc_id | int(11) | NO | PRI | NULL |  |
| tc_popular_chk | char(1) | NO |  |  |  |
| tc_popular_day | int(5) | NO |  | 0 |  |
| tc_popular_skin | varchar(255) | NO |  |  |  |
| tc_popular_limit | int(5) | NO |  | 0 |  |
| tc_point_chk | char(1) | NO |  |  |  |
| tc_point_day | int(5) | NO |  | 0 |  |
| tc_point_skin | varchar(255) | NO |  |  |  |
| tc_point_limit | int(5) | NO |  | 0 |  |
| tc_mycontent_chk | char(1) | NO |  |  |  |
| tc_mycontent_skin | varchar(255) | NO |  |  |  |
| tc_mycontent_limit | int(5) | NO |  | 0 |  |
| tc_newwrite_chk | char(1) | NO |  |  |  |
| tc_newwrite_skin | varchar(255) | NO |  |  |  |
| tc_newwrite_limit | int(5) | NO |  | 0 |  |
| tc_newcomment_chk | char(1) | NO |  |  |  |
| tc_newcomment_skin | varchar(255) | NO |  |  |  |
| tc_newcomment_limit | int(5) | NO |  | 0 |  |
| tc_group_chk | char(1) | NO |  |  |  |
| tc_group_skin | varchar(255) | NO |  |  |  |
| tc_group_limit | int(5) | NO |  | 0 |  |
| tc_group_tab | int(5) | NO |  | 0 |  |
| tc_poll_chk | char(1) | NO |  |  |  |
| tc_poll_skin | varchar(255) | NO |  |  |  |
| tc_visit_chk | char(1) | NO |  | 0 |  |
| tc_visit_skin | varchar(255) | NO |  |  |  |
| tc_today_chk | char(1) | NO |  | 0 |  |
| tc_today_skin | varchar(255) | NO |  |  |  |

### g4_login
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| lo_ip | varchar(255) | NO | PRI |  |  |
| mb_id | varchar(255) | NO | MUL |  |  |
| lo_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| lo_location | text | NO |  | NULL |  |
| lo_url | text | NO |  | NULL |  |

### g4_mail
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| ma_id | int(11) | NO | PRI | NULL |  |
| ma_subject | varchar(255) | NO |  |  |  |
| ma_content | mediumtext | NO |  | NULL |  |
| ma_time | datetime | NO |  | 0000-00-00 00:00:00 |  |
| ma_ip | varchar(255) | NO |  |  |  |
| ma_last_option | text | NO |  | NULL |  |

### g4_member
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| mb_no | int(11) | NO | PRI | NULL |  |
| mb_id | varchar(255) | NO | UNI |  |  |
| mb_password | varchar(255) | NO |  |  |  |
| mb_name | varchar(255) | NO |  |  |  |
| mb_nick | varchar(255) | NO |  |  |  |
| mb_nick_date | date | NO |  | 0000-00-00 |  |
| mb_email | varchar(255) | NO |  |  |  |
| mb_homepage | varchar(255) | NO |  |  |  |
| mb_password_q | varchar(255) | NO |  |  |  |
| mb_password_a | varchar(255) | NO |  |  |  |
| mb_level | tinyint(4) | NO |  | 0 |  |
| mb_jumin | varchar(255) | NO |  |  |  |
| mb_sex | char(1) | NO |  |  |  |
| mb_birth | varchar(255) | NO |  |  |  |
| mb_tel | varchar(255) | NO |  |  |  |
| mb_hp | varchar(255) | NO |  |  |  |
| mb_zip1 | char(3) | NO |  |  |  |
| mb_zip2 | char(3) | NO |  |  |  |
| mb_addr1 | varchar(255) | NO |  |  |  |
| mb_addr2 | varchar(255) | NO |  |  |  |
| mb_signature | text | NO |  | NULL |  |
| mb_recommend | varchar(255) | NO |  |  |  |
| mb_point | int(11) | NO |  | 0 |  |
| mb_today_login | datetime | NO | MUL | 0000-00-00 00:00:00 |  |
| mb_login_ip | varchar(255) | NO |  |  |  |
| mb_datetime | datetime | NO | MUL | 0000-00-00 00:00:00 |  |
| mb_ip | varchar(255) | NO |  |  |  |
| mb_leave_date | varchar(8) | NO |  |  |  |
| mb_intercept_date | varchar(8) | NO |  |  |  |
| mb_email_certify | datetime | NO |  | 0000-00-00 00:00:00 |  |
| mb_memo | text | NO |  | NULL |  |
| mb_lost_certify | varchar(255) | NO |  | NULL |  |
| mb_mailling | tinyint(4) | NO |  | 0 |  |
| mb_sms | tinyint(4) | NO |  | 0 |  |
| mb_open | tinyint(4) | NO |  | 0 |  |
| mb_open_date | date | NO |  | 0000-00-00 |  |
| mb_profile | text | NO |  | NULL |  |
| mb_memo_call | varchar(255) | NO |  |  |  |
| mb_1 | varchar(255) | NO |  |  |  |
| mb_2 | varchar(255) | NO |  |  |  |
| mb_3 | varchar(255) | NO |  |  |  |
| mb_4 | varchar(255) | NO |  |  |  |
| mb_5 | varchar(255) | NO |  |  |  |
| mb_6 | varchar(255) | NO |  |  |  |
| mb_7 | varchar(255) | NO |  |  |  |
| mb_8 | varchar(255) | NO |  |  |  |
| mb_9 | varchar(255) | NO |  |  |  |
| mb_10 | varchar(255) | NO |  |  |  |

### g4_memo
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| me_id | int(11) | NO | PRI | 0 |  |
| me_recv_mb_id | varchar(255) | NO |  |  |  |
| me_send_mb_id | varchar(255) | NO |  |  |  |
| me_send_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| me_read_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| me_memo | text | NO |  | NULL |  |

### g4_mw_basic_config
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| gr_id | varchar(20) | NO | PRI |  |  |
| bo_table | varchar(20) | NO | PRI |  |  |
| cf_type | varchar(5) | NO |  | list |  |
| cf_thumb_width | smallint(6) | NO |  | 80 |  |
| cf_thumb_height | smallint(6) | NO |  | 50 |  |
| cf_attribute | varchar(10) | NO |  | basic |  |
| cf_ccl | tinyint(4) | NO |  | 0 |  |
| cf_hot | tinyint(4) | NO |  | 0 |  |
| cf_hot_basis | varchar(10) | NO |  | hit |  |
| cf_related | tinyint(4) | NO |  | 0 |  |
| cf_link_blank | tinyint(4) | NO |  | 1 |  |
| cf_zzal | tinyint(4) | NO |  | 0 |  |
| cf_zzal_must | tinyint(4) | NO |  | 0 |  |
| cf_source_copy | tinyint(4) | NO |  | 1 |  |
| cf_relation | tinyint(4) | NO |  | 1 |  |
| cf_comment_editor | tinyint(4) | NO |  | 1 |  |
| cf_comment_emoticon | tinyint(4) | NO |  | 1 |  |
| cf_comment_write | tinyint(4) | NO |  | 1 |  |
| cf_singo | tinyint(4) | NO |  | 1 |  |
| cf_singo_id | text | NO |  | NULL |  |
| cf_email | text | NO |  | NULL |  |
| cf_sms_id | varchar(100) | NO |  | NULL |  |
| cf_sms_pw | varchar(100) | NO |  | NULL |  |
| cf_hp | text | NO |  | NULL |  |
| cf_content_head | text | NO |  | NULL |  |
| cf_content_tail | text | NO |  | NULL |  |
| cf_comma | tinyint(4) | NO |  | 0 |  |
| cf_comment_notice | text | NO |  | NULL |  |
| cf_download_comment | tinyint(4) | NO |  | 0 |  |
| cf_uploader_point | tinyint(4) | NO |  | 0 |  |
| cf_uploader_day | tinyint(4) | NO |  | 0 |  |
| cf_norobot_image | tinyint(4) | NO |  | 1 |  |
| cf_comment_secret | tinyint(4) | NO |  | 0 |  |
| cf_desc_len | int(11) | NO |  | 150 |  |
| cf_write_button | tinyint(4) | NO |  | 1 |  |
| cf_subject_link | tinyint(4) | NO |  | 0 |  |
| cf_comment_ban | tinyint(4) | NO |  | 0 |  |
| cf_link_board | tinyint(4) | NO |  | 0 |  |
| cf_notice_name | tinyint(4) | NO |  | 0 |  |
| cf_notice_date | tinyint(4) | NO |  | 0 |  |
| cf_notice_hit | tinyint(4) | NO |  | 0 |  |
| cf_post_name | tinyint(4) | NO |  | 0 |  |
| cf_post_date | tinyint(4) | NO |  | 0 |  |
| cf_post_hit | tinyint(4) | NO |  | 0 |  |
| cf_post_num | tinyint(4) | NO |  | 0 |  |
| cf_comment_ban_level | tinyint(4) | NO |  | 10 |  |
| cf_post_history | char(1) | NO |  | NULL |  |
| cf_post_history_level | tinyint(4) | NO |  | 10 |  |
| cf_delete_log | char(1) | NO |  | NULL |  |
| cf_download_log | char(1) | NO |  | NULL |  |
| cf_board_member | char(1) | NO |  | NULL |  |
| cf_board_member_list | char(1) | NO |  | NULL |  |
| cf_comment_default | text | NO |  | NULL |  |
| cf_list_shuffle | char(1) | NO |  | NULL |  |
| cf_img_1_noview | char(1) | NO |  | NULL |  |
| cf_file_head | text | NO |  | NULL |  |
| cf_file_tail | text | NO |  | NULL |  |
| cf_only_one | char(1) | NO |  | NULL |  |
| cf_contents_shop | char(1) | NO |  | NULL |  |
| cf_admin_dhtml | char(1) | NO |  | NULL |  |
| cf_write_notice | text | NO |  | NULL |  |
| cf_css | text | NO |  | NULL |  |
| cf_thumb_keep | char(1) | NO |  | NULL |  |
| cf_exif | char(1) | NO |  | NULL |  |
| cf_print | tinyint(4) | NO |  | 1 |  |
| cf_umz | tinyint(4) | NO |  | 0 |  |
| cf_shorten | tinyint(4) | NO |  | 0 |  |
| cf_include_view_head | varchar(255) | NO |  | NULL |  |
| cf_include_view_tail | varchar(255) | NO |  | NULL |  |
| cf_include_file_head | varchar(255) | NO |  | NULL |  |
| cf_include_file_tail | varchar(255) | NO |  | NULL |  |
| cf_include_list_main | varchar(255) | NO |  | NULL |  |
| cf_include_comment_main | varchar(255) | NO |  | NULL |  |
| cf_include_view_top | varchar(255) | NO |  | NULL |  |
| cf_thumb2_width | smallint(6) | NO |  | NULL |  |
| cf_thumb2_height | smallint(6) | NO |  | NULL |  |
| cf_thumb3_width | smallint(6) | NO |  | NULL |  |
| cf_thumb3_height | smallint(6) | NO |  | NULL |  |
| cf_subject_style | tinyint(4) | NO |  | NULL |  |
| cf_subject_style_level | tinyint(4) | NO |  | NULL |  |
| cf_thumb2_keep | char(1) | NO |  | NULL |  |
| cf_thumb3_keep | char(1) | NO |  | NULL |  |
| cf_guploader | char(1) | NO |  | NULL |  |
| cf_download_popup | tinyint(4) | NO |  | NULL |  |
| cf_download_popup_msg | text | NO |  | NULL |  |
| cf_comment_period | int(11) | NO |  | 0 |  |
| cf_under_construction | char(1) | NO |  | NULL |  |
| cf_no_delete | char(1) | NO |  | NULL |  |
| cf_write_point | int(11) | NO |  | NULL |  |
| cf_write_register | int(11) | NO |  | NULL |  |
| cf_write_day | int(11) | NO |  | NULL |  |
| cf_write_day_count | int(11) | NO |  | NULL |  |
| cf_latest | tinyint(4) | NO |  | NULL |  |
| cf_sns | char(1) | NO |  | NULL |  |
| cf_vote | char(1) | NO |  | NULL |  |
| cf_vote_level | tinyint(4) | NO |  | NULL |  |
| cf_vote_join_level | tinyint(4) | NO |  | NULL |  |
| cf_reward | char(1) | NO |  | NULL |  |
| cf_list_good | tinyint(4) | NO |  | 0 |  |
| cf_good_graph | char(1) | NO |  | NULL |  |
| cf_singo_after | varchar(20) | NO |  | NULL |  |
| cf_singo_number | tinyint(4) | NO |  | NULL |  |
| cf_singo_id_block | char(1) | NO |  | NULL |  |
| cf_singo_write_block | char(1) | NO |  | NULL |  |
| cf_singo_level | tinyint(4) | NO |  | 2 |  |
| cf_search_top | char(1) | NO |  | NULL |  |
| cf_must_notice | char(1) | NO |  | NULL |  |
| cf_category_tab | char(1) | NO |  | NULL |  |
| cf_category_radio | char(1) | NO |  | NULL |  |
| cf_notice_top | char(1) | NO |  | NULL |  |
| cf_comment_good | char(1) | NO |  | NULL |  |
| cf_comment_nogood | char(1) | NO |  | NULL |  |
| cf_comment_best | char(1) | NO |  | NULL |  |
| cf_singo_write_secret | char(1) | NO |  | NULL |  |
| cf_icon_level | char(1) | NO |  | NULL |  |
| cf_icon_level_point | int(11) | NO |  | 10000 |  |
| cf_include_head | varchar(255) | NO |  | NULL |  |
| cf_include_tail | varchar(255) | NO |  | NULL |  |
| cf_include_view | varchar(255) | NO |  | NULL |  |
| cf_comment_file | char(1) | NO |  | NULL |  |
| cf_contents_shop_download_count | int(10) unsigned | NO |  | NULL |  |
| cf_contents_shop_download_day | int(10) unsigned | NO |  | NULL |  |
| cf_contents_shop_write | char(1) | NO |  | NULL |  |
| cf_contents_shop_write_cash | int(10) unsigned | NO |  | NULL |  |
| cf_comment_page | char(1) | NO |  | NULL |  |
| cf_comment_page_rows | int(11) | NO |  | NULL |  |
| cf_comment_html | char(1) | NO |  | NULL |  |
| cf_replace_word | int(11) | NO |  | 10 |  |
| cf_name_title | varchar(20) | NO |  | NULL |  |
| cf_anonymous | char(1) | NO |  | NULL |  |
| cf_no_img_ext | char(1) | NO |  | NULL |  |
| cf_download_popup_w | int(11) | NO |  | 500 |  |
| cf_download_popup_h | int(11) | NO |  | 300 |  |
| cf_link_log | char(1) | NO |  | NULL |  |
| cf_editor | varchar(10) | NO |  | NULL |  |

### g4_mw_board_member
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| bo_table | varchar(20) | NO | PRI | NULL |  |
| mb_id | varchar(20) | NO | PRI | NULL |  |
| bm_datetime | datetime | NO |  | NULL |  |

### g4_mw_comment_file
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| bo_table | varchar(20) | NO | PRI |  |  |
| wr_id | int(11) | NO | PRI | 0 |  |
| bf_no | int(11) | NO | PRI | 0 |  |
| bf_source | varchar(255) | NO |  |  |  |
| bf_file | varchar(255) | NO |  |  |  |
| bf_download | varchar(255) | NO |  |  |  |
| bf_content | text | NO |  | NULL |  |
| bf_filesize | int(11) | NO |  | 0 |  |
| bf_width | int(11) | NO |  | 0 |  |
| bf_height | smallint(6) | NO |  | 0 |  |
| bf_type | tinyint(4) | NO |  | 0 |  |
| bf_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |

### g4_mw_comment_good
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| bo_table | varchar(20) | NO | PRI | NULL |  |
| parent_id | int(11) | NO | PRI | NULL |  |
| wr_id | int(11) | NO | PRI | NULL |  |
| mb_id | varchar(20) | NO | PRI | NULL |  |
| bg_flag | varchar(6) | NO |  | NULL |  |
| bg_datetime | datetime | NO |  | NULL |  |

### g4_mw_download_log
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| dl_id | int(11) | NO | PRI | NULL |  |
| bo_table | varchar(20) | NO | MUL | NULL |  |
| wr_id | int(11) | NO |  | NULL |  |
| bf_no | int(11) | NO |  | NULL |  |
| mb_id | varchar(20) | NO |  | NULL |  |
| dl_ip | varchar(20) | NO |  | NULL |  |
| dl_datetime | datetime | NO |  | NULL |  |

### g4_mw_link_log
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| ll_id | int(11) | NO | PRI | NULL |  |
| bo_table | varchar(20) | NO | MUL | NULL |  |
| wr_id | int(11) | NO |  | NULL |  |
| ll_no | int(11) | NO |  | NULL |  |
| mb_id | varchar(20) | NO |  | NULL |  |
| ll_name | varchar(20) | NO |  | NULL |  |
| ll_ip | varchar(20) | NO |  | NULL |  |
| ll_datetime | datetime | NO |  | NULL |  |

### g4_mw_must_notice
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| bo_table | varchar(20) | NO | PRI | NULL |  |
| wr_id | int(11) | NO | PRI | NULL |  |
| mb_id | varchar(20) | NO | PRI | NULL |  |
| mu_datetime | datetime | NO |  | NULL |  |

### g4_mw_post_history
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| ph_id | int(10) unsigned | NO | PRI | NULL |  |
| bo_table | varchar(20) | NO | MUL | NULL |  |
| wr_id | int(11) | NO |  | NULL |  |
| wr_parent | int(11) | NO |  | NULL |  |
| mb_id | varchar(20) | NO |  | NULL |  |
| ph_name | varchar(255) | YES |  | NULL |  |
| ph_option | set('html1','html2','secret','mail') | NO |  | NULL |  |
| ph_subject | varchar(255) | NO |  | NULL |  |
| ph_content | text | NO |  | NULL |  |
| ph_ip | varchar(20) | NO |  | NULL |  |
| ph_datetime | datetime | NO |  | NULL |  |

### g4_mw_reward
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| bo_table | varchar(20) | NO | PRI | NULL |  |
| wr_id | int(11) | NO | PRI | NULL |  |
| re_site | varchar(20) | NO |  | NULL |  |
| re_point | int(11) | NO |  | NULL |  |
| re_url | varchar(255) | NO |  | NULL |  |
| re_status | char(1) | NO |  | NULL |  |
| re_edate | date | NO |  | NULL |  |
| re_hit | int(11) | NO |  | NULL |  |

### g4_mw_reward_log
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| re_no | int(11) | NO | PRI | NULL |  |
| bo_table | varchar(20) | NO | MUL | NULL |  |
| wr_id | int(11) | NO |  | NULL |  |
| mb_id | varchar(20) | NO |  | NULL |  |
| re_date | date | NO |  | NULL |  |
| re_time | time | NO |  | NULL |  |
| re_merchant_id | varchar(255) | NO |  | NULL |  |
| re_merchant_site | varchar(255) | NO |  | NULL |  |
| re_order_no | varchar(255) | NO |  | NULL |  |
| re_product_no | varchar(255) | NO |  | NULL |  |
| re_product_name | varchar(255) | NO |  | NULL |  |
| re_category | varchar(255) | NO |  | NULL |  |
| re_qty | int(11) | NO |  | NULL |  |
| re_payment | int(11) | NO |  | NULL |  |
| re_paytype | varchar(255) | NO |  | NULL |  |
| re_commission | int(11) | NO |  | NULL |  |
| re_id | varchar(255) | NO |  | NULL |  |
| re_ip | varchar(255) | NO |  | NULL |  |
| re_remote | varchar(20) | NO |  | NULL |  |

### g4_mw_singo_log
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| si_id | int(11) | NO | PRI | NULL |  |
| bo_table | varchar(20) | NO | MUL | NULL |  |
| wr_id | int(11) | NO |  | NULL |  |
| mb_id | varchar(20) | NO |  | NULL |  |
| si_type | varchar(255) | NO |  | NULL |  |
| si_memo | text | NO |  | NULL |  |
| si_datetime | datetime | NO |  | NULL |  |
| si_ip | varchar(20) | NO |  | NULL |  |

### g4_mw_vote
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| vt_id | int(11) | NO | PRI | NULL |  |
| bo_table | varchar(20) | NO | MUL | NULL |  |
| wr_id | int(11) | NO |  | NULL |  |
| vt_edate | date | NO |  | NULL |  |
| vt_total | int(11) | NO |  | NULL |  |
| vt_point | int(11) | NO |  | NULL |  |

### g4_mw_vote_item
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| vt_id | int(11) | NO | PRI | NULL |  |
| vt_num | int(11) | NO | PRI | NULL |  |
| vt_item | varchar(255) | NO |  | NULL |  |
| vt_hit | int(11) | NO |  | NULL |  |

### g4_mw_vote_log
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| vt_id | int(11) | NO | MUL | NULL |  |
| vt_num | int(11) | NO |  | NULL |  |
| mb_id | varchar(20) | NO |  | NULL |  |
| vt_ip | varchar(20) | NO |  | NULL |  |
| vt_datetime | datetime | NO |  | NULL |  |

### g4_online
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| ol_id | int(11) | NO | PRI | NULL |  |
| ol_kind | varchar(255) | NO |  |  |  |
| ol_name | varchar(255) | NO |  |  |  |
| ol_email | varchar(255) | NO |  |  |  |
| ol_tel | varchar(255) | NO |  |  |  |
| ol_hp | varchar(255) | NO |  |  |  |
| ol_zip1 | char(3) | NO |  |  |  |
| ol_zip2 | char(3) | NO |  |  |  |
| ol_addr1 | varchar(255) | NO |  |  |  |
| ol_addr2 | varchar(255) | NO |  |  |  |
| ol_datetime | datetime | NO | MUL | 0000-00-00 00:00:00 |  |
| ol_ip | varchar(255) | NO |  |  |  |
| ol_read_date | datetime | NO |  | 0000-00-00 00:00:00 |  |
| ol_memo | text | NO |  | NULL |  |
| ol_admmemo | text | NO |  | NULL |  |
| ol_mailmemo | text | NO |  | NULL |  |
| ol_1 | varchar(255) | NO |  |  |  |
| ol_2 | varchar(255) | NO |  |  |  |
| ol_3 | varchar(255) | NO |  |  |  |
| ol_4 | varchar(255) | NO |  |  |  |
| ol_5 | varchar(255) | NO |  |  |  |
| ol_6 | varchar(255) | NO |  |  |  |
| ol_7 | varchar(255) | NO |  |  |  |
| ol_8 | varchar(255) | NO |  |  |  |
| ol_9 | varchar(255) | NO |  |  |  |
| ol_10 | varchar(255) | NO |  |  |  |

### g4_point
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| po_id | int(11) | NO | PRI | NULL |  |
| mb_id | varchar(20) | NO | MUL |  |  |
| po_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| po_content | varchar(255) | NO |  |  |  |
| po_point | int(11) | NO |  | 0 |  |
| po_rel_table | varchar(20) | NO |  |  |  |
| po_rel_id | varchar(20) | NO |  |  |  |
| po_rel_action | varchar(255) | NO |  |  |  |

### g4_poll
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| po_id | int(11) | NO | PRI | NULL |  |
| po_subject | varchar(255) | NO |  |  |  |
| po_poll1 | varchar(255) | NO |  |  |  |
| po_poll2 | varchar(255) | NO |  |  |  |
| po_poll3 | varchar(255) | NO |  |  |  |
| po_poll4 | varchar(255) | NO |  |  |  |
| po_poll5 | varchar(255) | NO |  |  |  |
| po_poll6 | varchar(255) | NO |  |  |  |
| po_poll7 | varchar(255) | NO |  |  |  |
| po_poll8 | varchar(255) | NO |  |  |  |
| po_poll9 | varchar(255) | NO |  |  |  |
| po_cnt1 | int(11) | NO |  | 0 |  |
| po_cnt2 | int(11) | NO |  | 0 |  |
| po_cnt3 | int(11) | NO |  | 0 |  |
| po_cnt4 | int(11) | NO |  | 0 |  |
| po_cnt5 | int(11) | NO |  | 0 |  |
| po_cnt6 | int(11) | NO |  | 0 |  |
| po_cnt7 | int(11) | NO |  | 0 |  |
| po_cnt8 | int(11) | NO |  | 0 |  |
| po_cnt9 | int(11) | NO |  | 0 |  |
| po_etc | varchar(255) | NO |  |  |  |
| po_level | tinyint(4) | NO |  | 0 |  |
| po_point | int(11) | NO |  | 0 |  |
| po_date | date | NO |  | 0000-00-00 |  |
| po_ips | mediumtext | NO |  | NULL |  |
| mb_ids | text | NO |  | NULL |  |

### g4_poll_etc
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| pc_id | int(11) | NO | PRI | 0 |  |
| po_id | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  |  |  |
| pc_name | varchar(255) | NO |  |  |  |
| pc_idea | varchar(255) | NO |  |  |  |
| pc_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |

### g4_popular
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| pp_id | int(11) | NO | PRI | NULL |  |
| pp_word | varchar(50) | NO |  |  |  |
| pp_date | date | NO | MUL | 0000-00-00 |  |
| pp_ip | varchar(50) | NO |  |  |  |

### g4_popup
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| po_id | int(11) | NO | PRI | NULL |  |
| po_skin | varchar(255) | NO |  |  |  |
| po_dir | varchar(255) | NO |  |  |  |
| po_popstyle | tinyint(1) | NO |  | 0 |  |
| po_openchk | tinyint(1) | NO | MUL | 0 |  |
| po_start_date | varchar(19) | NO | MUL |  |  |
| po_end_date | varchar(19) | NO |  |  |  |
| po_expirehours | int(4) | NO |  | 0 |  |
| po_scrollbar | tinyint(1) | NO |  | 0 |  |
| po_left | int(4) | NO |  | 0 |  |
| po_top | int(4) | NO |  | 0 |  |
| po_width | int(4) | NO |  | 0 |  |
| po_height | int(4) | NO |  | 0 |  |
| po_subject | varchar(255) | NO |  |  |  |
| po_content | text | NO |  | NULL |  |
| po_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |

### g4_scrap
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| ms_id | int(11) | NO | PRI | NULL |  |
| mb_id | varchar(255) | NO | MUL |  |  |
| bo_table | varchar(20) | NO |  |  |  |
| wr_id | varchar(15) | NO |  |  |  |
| ms_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |

### g4_token
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| to_token | varchar(32) | NO | PRI |  |  |
| to_datetime | datetime | NO | MUL | 0000-00-00 00:00:00 |  |
| to_ip | varchar(255) | NO | MUL |  |  |

### g4_visit
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| vi_id | int(11) | NO | PRI | 0 |  |
| vi_ip | varchar(255) | NO | MUL |  |  |
| vi_date | date | NO | MUL | 0000-00-00 |  |
| vi_time | time | NO |  | 00:00:00 |  |
| vi_referer | text | NO |  | NULL |  |
| vi_agent | varchar(255) | NO |  |  |  |

### g4_visit_sum
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| vs_date | date | NO | PRI | 0000-00-00 |  |
| vs_count | int(11) | NO | MUL | 0 |  |

### g4_write_com01
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  |  |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  |  |  |
| ca_name | varchar(255) | NO |  |  |  |
| wr_option | set('html1','html2','secret','mail') | NO |  |  |  |
| wr_subject | varchar(255) | NO |  |  |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  |  |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  |  |  |
| wr_password | varchar(255) | NO |  |  |  |
| wr_name | varchar(255) | NO |  |  |  |
| wr_email | varchar(255) | NO |  |  |  |
| wr_homepage | varchar(255) | NO |  |  |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  |  |  |
| wr_ip | varchar(255) | NO |  |  |  |
| wr_1 | varchar(255) | NO |  |  |  |
| wr_2 | varchar(255) | NO |  |  |  |
| wr_3 | varchar(255) | NO |  |  |  |
| wr_4 | varchar(255) | NO |  |  |  |
| wr_5 | varchar(255) | NO |  |  |  |
| wr_6 | varchar(255) | NO |  |  |  |
| wr_7 | varchar(255) | NO |  |  |  |
| wr_8 | varchar(255) | NO |  |  |  |
| wr_9 | varchar(255) | NO |  |  |  |
| wr_10 | varchar(255) | NO |  |  |  |
| wr_ccl | varchar(10) | NO |  |  |  |
| wr_singo | tinyint(4) | NO |  | 0 |  |
| wr_related | varchar(255) | NO |  |  |  |
| wr_comment_ban | char(1) | NO |  | NULL |  |
| wr_contents_price | int(11) | NO |  | NULL |  |
| wr_contents_domain | char(1) | NO |  | NULL |  |
| wr_umz | varchar(30) | NO |  |  |  |
| wr_subject_font | varchar(10) | NO |  | NULL |  |
| wr_subject_color | varchar(10) | NO |  | NULL |  |
| wr_anonymous | char(1) | NO |  | NULL |  |
| wr_comment_hide | char(1) | NO |  | NULL |  |
| wr_zzal | varchar(255) | NO |  | ?? |  |

### g4_write_com02
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  | NULL |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  | NULL |  |
| ca_name | varchar(255) | NO |  | NULL |  |
| wr_option | set('html1','html2','secret','mail') | NO |  | NULL |  |
| wr_subject | varchar(255) | NO |  | NULL |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  | NULL |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  | NULL |  |
| wr_password | varchar(255) | NO |  | NULL |  |
| wr_name | varchar(255) | NO |  | NULL |  |
| wr_email | varchar(255) | NO |  | NULL |  |
| wr_homepage | varchar(255) | NO |  | NULL |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  | NULL |  |
| wr_ip | varchar(255) | NO |  | NULL |  |
| wr_1 | varchar(255) | NO |  | NULL |  |
| wr_2 | varchar(255) | NO |  | NULL |  |
| wr_3 | varchar(255) | NO |  | NULL |  |
| wr_4 | varchar(255) | NO |  | NULL |  |
| wr_5 | varchar(255) | NO |  | NULL |  |
| wr_6 | varchar(255) | NO |  | NULL |  |
| wr_7 | varchar(255) | NO |  | NULL |  |
| wr_8 | varchar(255) | NO |  | NULL |  |
| wr_9 | varchar(255) | NO |  | NULL |  |
| wr_10 | varchar(255) | NO |  | NULL |  |
| wr_ccl | varchar(10) | NO |  | NULL |  |
| wr_singo | tinyint(4) | NO |  | 0 |  |
| wr_related | varchar(255) | NO |  | NULL |  |
| wr_comment_ban | char(1) | NO |  | NULL |  |
| wr_contents_price | int(11) | NO |  | NULL |  |
| wr_contents_domain | char(1) | NO |  | NULL |  |
| wr_umz | varchar(30) | NO |  | NULL |  |
| wr_subject_font | varchar(10) | NO |  | NULL |  |
| wr_subject_color | varchar(10) | NO |  | NULL |  |
| wr_anonymous | char(1) | NO |  | NULL |  |
| wr_comment_hide | char(1) | NO |  | NULL |  |
| wr_zzal | varchar(255) | NO |  | ?? |  |

### g4_write_com03
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  | NULL |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  | NULL |  |
| ca_name | varchar(255) | NO |  | NULL |  |
| wr_option | set('html1','html2','secret','mail') | NO |  | NULL |  |
| wr_subject | varchar(255) | NO |  | NULL |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  | NULL |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  | NULL |  |
| wr_password | varchar(255) | NO |  | NULL |  |
| wr_name | varchar(255) | NO |  | NULL |  |
| wr_email | varchar(255) | NO |  | NULL |  |
| wr_homepage | varchar(255) | NO |  | NULL |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  | NULL |  |
| wr_ip | varchar(255) | NO |  | NULL |  |
| wr_1 | varchar(255) | NO |  | NULL |  |
| wr_2 | varchar(255) | NO |  | NULL |  |
| wr_3 | varchar(255) | NO |  | NULL |  |
| wr_4 | varchar(255) | NO |  | NULL |  |
| wr_5 | varchar(255) | NO |  | NULL |  |
| wr_6 | varchar(255) | NO |  | NULL |  |
| wr_7 | varchar(255) | NO |  | NULL |  |
| wr_8 | varchar(255) | NO |  | NULL |  |
| wr_9 | varchar(255) | NO |  | NULL |  |
| wr_10 | varchar(255) | NO |  | NULL |  |
| wr_ccl | varchar(10) | NO |  | NULL |  |
| wr_singo | tinyint(4) | NO |  | 0 |  |
| wr_related | varchar(255) | NO |  | NULL |  |
| wr_comment_ban | char(1) | NO |  | NULL |  |
| wr_contents_price | int(11) | NO |  | NULL |  |
| wr_contents_domain | char(1) | NO |  | NULL |  |
| wr_umz | varchar(30) | NO |  | NULL |  |
| wr_subject_font | varchar(10) | NO |  | NULL |  |
| wr_subject_color | varchar(10) | NO |  | NULL |  |
| wr_anonymous | char(1) | NO |  | NULL |  |
| wr_comment_hide | char(1) | NO |  | NULL |  |
| wr_zzal | varchar(255) | NO |  | ?? |  |

### g4_write_cus01
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  | NULL |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  | NULL |  |
| ca_name | varchar(255) | NO |  | NULL |  |
| wr_option | set('html1','html2','secret','mail') | NO |  | NULL |  |
| wr_subject | varchar(255) | NO |  | NULL |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  | NULL |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  | NULL |  |
| wr_password | varchar(255) | NO |  | NULL |  |
| wr_name | varchar(255) | NO |  | NULL |  |
| wr_email | varchar(255) | NO |  | NULL |  |
| wr_homepage | varchar(255) | NO |  | NULL |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  | NULL |  |
| wr_ip | varchar(255) | NO |  | NULL |  |
| wr_1 | varchar(255) | NO |  | NULL |  |
| wr_2 | varchar(255) | NO |  | NULL |  |
| wr_3 | varchar(255) | NO |  | NULL |  |
| wr_4 | varchar(255) | NO |  | NULL |  |
| wr_5 | varchar(255) | NO |  | NULL |  |
| wr_6 | varchar(255) | NO |  | NULL |  |
| wr_7 | varchar(255) | NO |  | NULL |  |
| wr_8 | varchar(255) | NO |  | NULL |  |
| wr_9 | varchar(255) | NO |  | NULL |  |
| wr_10 | varchar(255) | NO |  | NULL |  |

### g4_write_down00
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  |  |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  |  |  |
| ca_name | varchar(255) | NO |  |  |  |
| wr_option | set('html1','html2','secret','mail') | NO |  |  |  |
| wr_subject | varchar(255) | NO |  |  |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  |  |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  |  |  |
| wr_password | varchar(255) | NO |  |  |  |
| wr_name | varchar(255) | NO |  |  |  |
| wr_email | varchar(255) | NO |  |  |  |
| wr_homepage | varchar(255) | NO |  |  |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  |  |  |
| wr_ip | varchar(255) | NO |  |  |  |
| wr_1 | varchar(255) | NO |  |  |  |
| wr_2 | varchar(255) | NO |  |  |  |
| wr_3 | varchar(255) | NO |  |  |  |
| wr_4 | varchar(255) | NO |  |  |  |
| wr_5 | varchar(255) | NO |  |  |  |
| wr_6 | varchar(255) | NO |  |  |  |
| wr_7 | varchar(255) | NO |  |  |  |
| wr_8 | varchar(255) | NO |  |  |  |
| wr_9 | varchar(255) | NO |  |  |  |
| wr_10 | varchar(255) | NO |  |  |  |

### g4_write_down01
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  | NULL |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  | NULL |  |
| ca_name | varchar(255) | NO |  | NULL |  |
| wr_option | set('html1','html2','secret','mail') | NO |  | NULL |  |
| wr_subject | varchar(255) | NO |  | NULL |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  | NULL |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  | NULL |  |
| wr_password | varchar(255) | NO |  | NULL |  |
| wr_name | varchar(255) | NO |  | NULL |  |
| wr_email | varchar(255) | NO |  | NULL |  |
| wr_homepage | varchar(255) | NO |  | NULL |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  | NULL |  |
| wr_ip | varchar(255) | NO |  | NULL |  |
| wr_1 | varchar(255) | NO |  | NULL |  |
| wr_2 | varchar(255) | NO |  | NULL |  |
| wr_3 | varchar(255) | NO |  | NULL |  |
| wr_4 | varchar(255) | NO |  | NULL |  |
| wr_5 | varchar(255) | NO |  | NULL |  |
| wr_6 | varchar(255) | NO |  | NULL |  |
| wr_7 | varchar(255) | NO |  | NULL |  |
| wr_8 | varchar(255) | NO |  | NULL |  |
| wr_9 | varchar(255) | NO |  | NULL |  |
| wr_10 | varchar(255) | NO |  | NULL |  |

### g4_write_down02
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  | NULL |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  | NULL |  |
| ca_name | varchar(255) | NO |  | NULL |  |
| wr_option | set('html1','html2','secret','mail') | NO |  | NULL |  |
| wr_subject | varchar(255) | NO |  | NULL |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  | NULL |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  | NULL |  |
| wr_password | varchar(255) | NO |  | NULL |  |
| wr_name | varchar(255) | NO |  | NULL |  |
| wr_email | varchar(255) | NO |  | NULL |  |
| wr_homepage | varchar(255) | NO |  | NULL |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  | NULL |  |
| wr_ip | varchar(255) | NO |  | NULL |  |
| wr_1 | varchar(255) | NO |  | NULL |  |
| wr_2 | varchar(255) | NO |  | NULL |  |
| wr_3 | varchar(255) | NO |  | NULL |  |
| wr_4 | varchar(255) | NO |  | NULL |  |
| wr_5 | varchar(255) | NO |  | NULL |  |
| wr_6 | varchar(255) | NO |  | NULL |  |
| wr_7 | varchar(255) | NO |  | NULL |  |
| wr_8 | varchar(255) | NO |  | NULL |  |
| wr_9 | varchar(255) | NO |  | NULL |  |
| wr_10 | varchar(255) | NO |  | NULL |  |

### g4_write_down03
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  | NULL |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  | NULL |  |
| ca_name | varchar(255) | NO |  | NULL |  |
| wr_option | set('html1','html2','secret','mail') | NO |  | NULL |  |
| wr_subject | varchar(255) | NO |  | NULL |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  | NULL |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  | NULL |  |
| wr_password | varchar(255) | NO |  | NULL |  |
| wr_name | varchar(255) | NO |  | NULL |  |
| wr_email | varchar(255) | NO |  | NULL |  |
| wr_homepage | varchar(255) | NO |  | NULL |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  | NULL |  |
| wr_ip | varchar(255) | NO |  | NULL |  |
| wr_1 | varchar(255) | NO |  | NULL |  |
| wr_2 | varchar(255) | NO |  | NULL |  |
| wr_3 | varchar(255) | NO |  | NULL |  |
| wr_4 | varchar(255) | NO |  | NULL |  |
| wr_5 | varchar(255) | NO |  | NULL |  |
| wr_6 | varchar(255) | NO |  | NULL |  |
| wr_7 | varchar(255) | NO |  | NULL |  |
| wr_8 | varchar(255) | NO |  | NULL |  |
| wr_9 | varchar(255) | NO |  | NULL |  |
| wr_10 | varchar(255) | NO |  | NULL |  |

### g4_write_down04
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  | NULL |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  | NULL |  |
| ca_name | varchar(255) | NO |  | NULL |  |
| wr_option | set('html1','html2','secret','mail') | NO |  | NULL |  |
| wr_subject | varchar(255) | NO |  | NULL |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  | NULL |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  | NULL |  |
| wr_password | varchar(255) | NO |  | NULL |  |
| wr_name | varchar(255) | NO |  | NULL |  |
| wr_email | varchar(255) | NO |  | NULL |  |
| wr_homepage | varchar(255) | NO |  | NULL |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  | NULL |  |
| wr_ip | varchar(255) | NO |  | NULL |  |
| wr_1 | varchar(255) | NO |  | NULL |  |
| wr_2 | varchar(255) | NO |  | NULL |  |
| wr_3 | varchar(255) | NO |  | NULL |  |
| wr_4 | varchar(255) | NO |  | NULL |  |
| wr_5 | varchar(255) | NO |  | NULL |  |
| wr_6 | varchar(255) | NO |  | NULL |  |
| wr_7 | varchar(255) | NO |  | NULL |  |
| wr_8 | varchar(255) | NO |  | NULL |  |
| wr_9 | varchar(255) | NO |  | NULL |  |
| wr_10 | varchar(255) | NO |  | NULL |  |

### g4_write_down05
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  | NULL |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  | NULL |  |
| ca_name | varchar(255) | NO |  | NULL |  |
| wr_option | set('html1','html2','secret','mail') | NO |  | NULL |  |
| wr_subject | varchar(255) | NO |  | NULL |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  | NULL |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  | NULL |  |
| wr_password | varchar(255) | NO |  | NULL |  |
| wr_name | varchar(255) | NO |  | NULL |  |
| wr_email | varchar(255) | NO |  | NULL |  |
| wr_homepage | varchar(255) | NO |  | NULL |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  | NULL |  |
| wr_ip | varchar(255) | NO |  | NULL |  |
| wr_1 | varchar(255) | NO |  | NULL |  |
| wr_2 | varchar(255) | NO |  | NULL |  |
| wr_3 | varchar(255) | NO |  | NULL |  |
| wr_4 | varchar(255) | NO |  | NULL |  |
| wr_5 | varchar(255) | NO |  | NULL |  |
| wr_6 | varchar(255) | NO |  | NULL |  |
| wr_7 | varchar(255) | NO |  | NULL |  |
| wr_8 | varchar(255) | NO |  | NULL |  |
| wr_9 | varchar(255) | NO |  | NULL |  |
| wr_10 | varchar(255) | NO |  | NULL |  |

### g4_write_popup01
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  | NULL |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  | NULL |  |
| ca_name | varchar(255) | NO |  | NULL |  |
| wr_option | set('html1','html2','secret','mail') | NO |  | NULL |  |
| wr_subject | varchar(255) | NO |  | NULL |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  | NULL |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  | NULL |  |
| wr_password | varchar(255) | NO |  | NULL |  |
| wr_name | varchar(255) | NO |  | NULL |  |
| wr_email | varchar(255) | NO |  | NULL |  |
| wr_homepage | varchar(255) | NO |  | NULL |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  | NULL |  |
| wr_ip | varchar(255) | NO |  | NULL |  |
| wr_1 | varchar(255) | NO |  | NULL |  |
| wr_2 | varchar(255) | NO |  | NULL |  |
| wr_3 | varchar(255) | NO |  | NULL |  |
| wr_4 | varchar(255) | NO |  | NULL |  |
| wr_5 | varchar(255) | NO |  | NULL |  |
| wr_6 | varchar(255) | NO |  | NULL |  |
| wr_7 | varchar(255) | NO |  | NULL |  |
| wr_8 | varchar(255) | NO |  | NULL |  |
| wr_9 | varchar(255) | NO |  | NULL |  |
| wr_10 | varchar(255) | NO |  | NULL |  |

### g4_write_qna01
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  | NULL |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  | NULL |  |
| ca_name | varchar(255) | NO |  | NULL |  |
| wr_option | set('html1','html2','secret','mail') | NO |  | NULL |  |
| wr_subject | varchar(255) | NO |  | NULL |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  | NULL |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  | NULL |  |
| wr_password | varchar(255) | NO |  | NULL |  |
| wr_name | varchar(255) | NO |  | NULL |  |
| wr_email | varchar(255) | NO |  | NULL |  |
| wr_homepage | varchar(255) | NO |  | NULL |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  | NULL |  |
| wr_ip | varchar(255) | NO |  | NULL |  |
| wr_1 | varchar(255) | NO |  | NULL |  |
| wr_2 | varchar(255) | NO |  | NULL |  |
| wr_3 | varchar(255) | NO |  | NULL |  |
| wr_4 | varchar(255) | NO |  | NULL |  |
| wr_5 | varchar(255) | NO |  | NULL |  |
| wr_6 | varchar(255) | NO |  | NULL |  |
| wr_7 | varchar(255) | NO |  | NULL |  |
| wr_8 | varchar(255) | NO |  | NULL |  |
| wr_9 | varchar(255) | NO |  | NULL |  |
| wr_10 | varchar(255) | NO |  | NULL |  |

### g4_write_staff01
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| wr_id | int(11) | NO | PRI | NULL |  |
| wr_num | int(11) | NO | MUL | 0 |  |
| wr_reply | varchar(10) | NO |  | NULL |  |
| wr_parent | int(11) | NO |  | 0 |  |
| wr_is_comment | tinyint(4) | NO | MUL | 0 |  |
| wr_comment | int(11) | NO |  | 0 |  |
| wr_comment_reply | varchar(5) | NO |  | NULL |  |
| ca_name | varchar(255) | NO |  | NULL |  |
| wr_option | set('html1','html2','secret','mail') | NO |  | NULL |  |
| wr_subject | varchar(255) | NO |  | NULL |  |
| wr_content | text | NO |  | NULL |  |
| wr_link1 | text | NO |  | NULL |  |
| wr_link2 | text | NO |  | NULL |  |
| wr_link1_hit | int(11) | NO |  | 0 |  |
| wr_link2_hit | int(11) | NO |  | 0 |  |
| wr_trackback | varchar(255) | NO |  | NULL |  |
| wr_hit | int(11) | NO |  | 0 |  |
| wr_good | int(11) | NO |  | 0 |  |
| wr_nogood | int(11) | NO |  | 0 |  |
| mb_id | varchar(255) | NO |  | NULL |  |
| wr_password | varchar(255) | NO |  | NULL |  |
| wr_name | varchar(255) | NO |  | NULL |  |
| wr_email | varchar(255) | NO |  | NULL |  |
| wr_homepage | varchar(255) | NO |  | NULL |  |
| wr_datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| wr_last | varchar(19) | NO |  | NULL |  |
| wr_ip | varchar(255) | NO |  | NULL |  |
| wr_1 | varchar(255) | NO |  | NULL |  |
| wr_2 | varchar(255) | NO |  | NULL |  |
| wr_3 | varchar(255) | NO |  | NULL |  |
| wr_4 | varchar(255) | NO |  | NULL |  |
| wr_5 | varchar(255) | NO |  | NULL |  |
| wr_6 | varchar(255) | NO |  | NULL |  |
| wr_7 | varchar(255) | NO |  | NULL |  |
| wr_8 | varchar(255) | NO |  | NULL |  |
| wr_9 | varchar(255) | NO |  | NULL |  |
| wr_10 | varchar(255) | NO |  | NULL |  |

## Custom & Legacy Tables

### adm_user
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| Mid | varchar(23) | NO | PRI | NULL |  |
| Mlevel | tinyint(9) | NO |  | 0 |  |
| Mpass | varchar(32) | NO |  | 0 |  |
| Mkey | varchar(32) | NO |  | 0 |  |
| Mname | varchar(20) | NO |  | NULL |  |
| Mjumin1 | varchar(6) | NO |  | NULL |  |
| Mjumin2 | varchar(7) | NO |  | NULL |  |
| Mpart | varchar(50) | NO |  | NULL |  |
| Mpos | varchar(50) | NO |  | NULL |  |
| Memail | varchar(60) | YES |  | NULL |  |
| Mtel | varchar(15) | YES |  | NULL |  |
| Mhp | varchar(15) | YES |  | NULL |  |
| Maddate | datetime | NO |  | 0000-00-00 00:00:00 |  |
| log_time | datetime | NO |  | 0000-00-00 00:00:00 |  |
| log | varchar(10) | NO |  | NULL |  |
| ip | varchar(15) | NO |  | NULL |  |
| last | tinyint(10) | NO |  | 0 |  |

### bbs
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| id | int(11) | NO | PRI | NULL |  |
| no | int(11) | NO |  | 0 |  |
| mark | varchar(11) | NO |  | NULL |  |
| name | varchar(30) | NO |  | NULL |  |
| pwd | varchar(16) | NO |  | NULL |  |
| scr_pwd | varchar(16) | NO |  | NULL |  |
| email | varchar(40) | NO |  | NULL |  |
| datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |
| hit | int(11) | NO |  | 0 |  |
| ip | varchar(15) | NO |  | NULL |  |
| title | tinytext | NO |  | NULL |  |
| content | text | NO |  | NULL |  |
| option_01 | varchar(60) | YES |  | NULL |  |
| option_02 | varchar(60) | YES |  | NULL |  |
| option_03 | varchar(60) | YES |  | NULL |  |
| option_04 | varchar(60) | YES |  | NULL |  |
| option_05 | varchar(60) | YES |  | NULL |  |
| mq | int(11) | NO |  | 0 |  |
| se_use | int(11) | NO |  | 0 |  |
| html | int(11) | NO |  | 0 |  |
| files | varchar(100) | NO |  | NULL |  |
| Mid | varchar(23) | NO |  | NULL |  |
| level | tinyint(9) | NO |  | 0 |  |

### customers
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| id | int(4) | NO | PRI | NULL |  |
| Mid | varchar(10) | YES |  | NULL |  |
| company | varchar(48) | YES |  | NULL |  |
| cname | varchar(26) | YES |  | NULL |  |
| part | varchar(66) | YES |  | NULL |  |
| job_title | varchar(24) | YES |  | NULL |  |
| telno | varchar(17) | YES |  | NULL |  |
| hpno | varchar(23) | YES |  | NULL |  |
| faxno | varchar(14) | YES |  | NULL |  |
| url | varchar(42) | YES |  | NULL |  |
| email | varchar(43) | YES |  | NULL |  |
| zipcode1 | int(3) | YES |  | NULL |  |
| zipcode2 | int(3) | YES |  | NULL |  |
| address | varchar(91) | YES |  | NULL |  |
| address1 | varchar(72) | YES |  | NULL |  |
| cmemo | varchar(639) | YES |  | NULL |  |
| addate | varchar(19) | YES |  | NULL |  |

### customers-0305
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| id | int(11) | NO | PRI | NULL |  |
| Mid | varchar(23) | NO |  | NULL |  |
| company | varchar(100) | NO |  | NULL |  |
| cname | varchar(30) | NO |  | NULL |  |
| part | varchar(100) | NO |  | NULL |  |
| job_title | varchar(100) | NO |  | NULL |  |
| telno | varchar(13) | NO |  | NULL |  |
| hpno | varchar(13) | NO |  | NULL |  |
| faxno | varchar(13) | NO |  | NULL |  |
| url | varchar(255) | NO |  | NULL |  |
| email | varchar(200) | NO |  | NULL |  |
| zipcode1 | char(3) | NO |  | NULL |  |
| zipcode2 | varchar(5) | NO |  | NULL |  |
| address | varchar(100) | NO |  | NULL |  |
| address1 | varchar(100) | NO |  | NULL |  |
| cmemo | text | NO |  | NULL |  |
| addate | datetime | NO |  | 0000-00-00 00:00:00 |  |

### customers22
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| id | int(11) | NO | PRI | NULL |  |
| Mid | varchar(23) | NO |  | NULL |  |
| company | varchar(100) | NO |  | NULL |  |
| cname | varchar(30) | NO |  | NULL |  |
| part | varchar(100) | NO |  | NULL |  |
| job_title | varchar(100) | NO |  | NULL |  |
| telno | varchar(13) | NO |  | NULL |  |
| hpno | varchar(13) | NO |  | NULL |  |
| faxno | varchar(13) | NO |  | NULL |  |
| url | varchar(255) | NO |  | NULL |  |
| email | varchar(200) | NO |  | NULL |  |
| zipcode1 | char(3) | NO |  | NULL |  |
| zipcode2 | varchar(5) | NO |  | NULL |  |
| address | varchar(100) | NO |  | NULL |  |
| address1 | varchar(100) | NO |  | NULL |  |
| cmemo | text | NO |  | NULL |  |
| addate | datetime | NO |  | 0000-00-00 00:00:00 |  |

### customers_old
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| id | int(11) | NO | PRI | NULL |  |
| Mid | varchar(23) | NO |  | NULL |  |
| company | varchar(100) | NO |  | NULL |  |
| cname | varchar(30) | NO |  | NULL |  |
| part | varchar(100) | NO |  | NULL |  |
| job_title | varchar(100) | NO |  | NULL |  |
| telno | varchar(13) | NO |  | NULL |  |
| hpno | varchar(13) | NO |  | NULL |  |
| faxno | varchar(13) | NO |  | NULL |  |
| url | varchar(255) | NO |  | NULL |  |
| email | varchar(200) | NO |  | NULL |  |
| zipcode1 | char(3) | NO |  | NULL |  |
| zipcode2 | varchar(5) | NO |  | NULL |  |
| address | varchar(100) | NO |  | NULL |  |
| address1 | varchar(100) | NO |  | NULL |  |
| cmemo | text | NO |  | NULL |  |
| addate | datetime | NO |  | 0000-00-00 00:00:00 |  |

### customers_test_
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| id | int(11) | NO | PRI | NULL |  |
| Mid | varchar(23) | NO |  | NULL |  |
| company | varchar(100) | NO |  | NULL |  |
| cname | varchar(30) | NO |  | NULL |  |
| part | varchar(100) | NO |  | NULL |  |
| job_title | varchar(100) | NO |  | NULL |  |
| telno | varchar(13) | NO |  | NULL |  |
| hpno | varchar(13) | NO |  | NULL |  |
| faxno | varchar(13) | NO |  | NULL |  |
| url | varchar(255) | NO |  | NULL |  |
| email | varchar(200) | NO |  | NULL |  |
| zipcode1 | char(3) | NO |  | NULL |  |
| zipcode2 | varchar(5) | NO |  | NULL |  |
| address | varchar(100) | NO |  | NULL |  |
| address1 | varchar(100) | NO |  | NULL |  |
| cmemo | text | NO |  | NULL |  |
| addate | datetime | NO |  | 0000-00-00 00:00:00 |  |

### diary
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| daid | int(11) | NO | PRI | NULL |  |
| Mid | varchar(12) | NO |  | NULL |  |
| name | varchar(20) | NO |  | NULL |  |
| part | varchar(50) | NO |  | NULL |  |
| status | int(11) | NO |  | 0 |  |
| subject | varchar(255) | NO |  | NULL |  |
| html | varchar(8) | NO |  | NULL |  |
| contents | text | NO |  | NULL |  |
| hit | int(5) | NO |  | 0 |  |
| secret | varchar(40) | NO |  | NULL |  |
| fromdate | int(10) | NO |  | 0 |  |
| fromtime | time | NO |  | 00:00:00 |  |
| todate | int(10) | NO |  | 0 |  |
| totime | time | NO |  | 00:00:00 |  |
| event | text | NO |  | NULL |  |
| special | text | NO |  | NULL |  |
| addate | datetime | NO |  | 0000-00-00 00:00:00 |  |

### memo
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| no | int(11) | NO | PRI | NULL |  |
| mname | varchar(20) | YES |  | NULL |  |
| password | varchar(20) | YES |  | NULL |  |
| msubject | varchar(255) | NO |  | NULL |  |
| mmemo | text | YES |  | NULL |  |
| Mid | varchar(23) | NO |  | NULL |  |
| ip | varchar(15) | YES |  | NULL |  |
| datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |

### re_massenger
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| num | mediumint(9) unsigned | NO | PRI | NULL |  |
| toid | varchar(255) | NO |  | NULL |  |
| fromid | varchar(255) | NO |  | NULL |  |
| content | text | NO |  | NULL |  |
| level | smallint(1) unsigned | NO |  | 0 |  |
| status | int(4) | NO |  | 0 |  |
| seid | int(11) | NO |  | 0 |  |
| datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |

### se_massenger
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| num | mediumint(9) unsigned | NO | PRI | NULL |  |
| toid | varchar(255) | NO |  | NULL |  |
| fromid | varchar(255) | NO |  | NULL |  |
| content | text | NO |  | NULL |  |
| level | smallint(1) unsigned | NO |  | 0 |  |
| status | int(4) | NO |  | 0 |  |
| reid | int(11) | NO |  | 0 |  |
| datetime | datetime | NO |  | 0000-00-00 00:00:00 |  |

### Sheet1
| Column | Type | Null | Key | Default | Extra/Comment |
| --- | --- | --- | --- | --- | --- |
| A | varchar(10) | YES |  | NULL |  |
| B | varchar(8) | YES |  | NULL |  |
| C | varchar(19) | YES |  | NULL |  |

