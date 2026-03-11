-- ============================================================
-- IFMG CMS Database Schema
-- Institute of Financial Management and Good Governance
-- MySQL / MariaDB
-- ============================================================

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";
SET NAMES utf8mb4;

CREATE DATABASE IF NOT EXISTS `ifmg_cms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `ifmg_cms`;

-- ============================================================
-- 1. USERS & AUTHENTICATION
-- ============================================================

CREATE TABLE `users` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `username`      VARCHAR(50) NOT NULL UNIQUE,
    `email`         VARCHAR(150) NOT NULL UNIQUE,
    `password_hash` VARCHAR(255) NOT NULL,
    `full_name`     VARCHAR(100) NOT NULL,
    `role`          ENUM('super_admin','admin','editor') NOT NULL DEFAULT 'editor',
    `avatar`        VARCHAR(255) DEFAULT NULL,
    `is_active`     TINYINT(1) NOT NULL DEFAULT 1,
    `last_login`    DATETIME DEFAULT NULL,
    `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Default admin user (password: admin123 — CHANGE IMMEDIATELY)
INSERT INTO `users` (`username`, `email`, `password_hash`, `full_name`, `role`) VALUES
('admin', 'admin@ifmg.gov.so', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'System Admin', 'super_admin');

CREATE TABLE `sessions` (
    `id`            VARCHAR(128) NOT NULL,
    `user_id`       INT UNSIGNED NOT NULL,
    `ip_address`    VARCHAR(45) DEFAULT NULL,
    `user_agent`    VARCHAR(255) DEFAULT NULL,
    `payload`       TEXT NOT NULL,
    `last_activity` INT UNSIGNED NOT NULL,
    PRIMARY KEY (`id`),
    KEY `sessions_user_id_idx` (`user_id`),
    KEY `sessions_last_activity_idx` (`last_activity`),
    CONSTRAINT `fk_sessions_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 2. SITE SETTINGS (key-value store for global config)
-- ============================================================

CREATE TABLE `settings` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `setting_key`   VARCHAR(100) NOT NULL UNIQUE,
    `setting_value` TEXT DEFAULT NULL,
    `setting_group` VARCHAR(50) NOT NULL DEFAULT 'general',
    `updated_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_settings_group` (`setting_group`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed default settings
INSERT INTO `settings` (`setting_key`, `setting_value`, `setting_group`) VALUES
('site_name',        'IFMG',                                               'general'),
('site_full_name',   'Institute of Financial Management and Good Governance','general'),
('site_email',       'info@ifmg.gov.so',                                    'general'),
('site_phone',       '+252 XXX XXX',                                        'general'),
('site_location',    'Mogadishu, Somalia',                                  'general'),
('site_logo',        'assets/images/logo.png',                              'general'),
('footer_copyright', '© 2026 IFMG – Institute of Financial Management and Good Governance. All Rights Reserved.', 'general'),
('social_twitter',   '',                                                    'social'),
('social_facebook',  '',                                                    'social'),
('social_linkedin',  '',                                                    'social');

-- ============================================================
-- 3. HERO CAROUSEL SLIDES
-- ============================================================

CREATE TABLE `hero_slides` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title_en`      VARCHAR(255) NOT NULL,
    `title_so`      VARCHAR(255) DEFAULT NULL,
    `subtitle_en`   VARCHAR(500) DEFAULT NULL,
    `subtitle_so`   VARCHAR(500) DEFAULT NULL,
    `cta_text_en`   VARCHAR(100) DEFAULT 'Explore Our Work',
    `cta_text_so`   VARCHAR(100) DEFAULT 'Sahami Shaqadeenna',
    `cta_link`      VARCHAR(255) DEFAULT 'index#workstreams',
    `bg_image`      VARCHAR(500) DEFAULT NULL,
    `sort_order`    INT NOT NULL DEFAULT 0,
    `is_active`     TINYINT(1) NOT NULL DEFAULT 1,
    `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 4. ANNOUNCEMENT STRIP (single prominent announcement)
-- ============================================================

CREATE TABLE `announcement_strip` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `text_en`       VARCHAR(500) NOT NULL,
    `text_so`       VARCHAR(500) DEFAULT NULL,
    `link`          VARCHAR(255) DEFAULT 'announcements',
    `btn_text_en`   VARCHAR(100) DEFAULT 'View Announcement',
    `btn_text_so`   VARCHAR(100) DEFAULT 'Eeg Ogeysiiska',
    `is_active`     TINYINT(1) NOT NULL DEFAULT 1,
    `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 5. PUBLICATIONS
-- ============================================================

CREATE TABLE `publications` (
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title_en`          VARCHAR(255) NOT NULL,
    `title_so`          VARCHAR(255) DEFAULT NULL,
    `description_en`    TEXT DEFAULT NULL,
    `description_so`    TEXT DEFAULT NULL,
    `category`          ENUM('policy_paper','working_paper','annual_report') NOT NULL,
    `cover_image`       VARCHAR(500) DEFAULT NULL,
    `pdf_file`          VARCHAR(500) DEFAULT NULL,
    `gradient_from`     VARCHAR(30) DEFAULT 'navy-800',
    `gradient_to`       VARCHAR(30) DEFAULT 'navy-900',
    `badge_bg`          VARCHAR(30) DEFAULT 'gold-500',
    `badge_text_color`  VARCHAR(30) DEFAULT 'navy-900',
    `is_featured`       TINYINT(1) NOT NULL DEFAULT 0,
    `published_date`    DATE DEFAULT NULL,
    `sort_order`        INT NOT NULL DEFAULT 0,
    `is_active`         TINYINT(1) NOT NULL DEFAULT 1,
    `created_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_publications_category` (`category`),
    KEY `idx_publications_featured` (`is_featured`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 6. PROGRAMS / WORKSTREAMS
-- ============================================================

CREATE TABLE `programs` (
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `slug`              VARCHAR(100) NOT NULL UNIQUE,
    `title_en`          VARCHAR(255) NOT NULL,
    `title_so`          VARCHAR(255) DEFAULT NULL,
    `short_desc_en`     TEXT DEFAULT NULL,
    `short_desc_so`     TEXT DEFAULT NULL,
    `full_content_en`   LONGTEXT DEFAULT NULL,
    `full_content_so`   LONGTEXT DEFAULT NULL,
    `icon_svg`          TEXT DEFAULT NULL,
    `icon_bg_color`     VARCHAR(30) DEFAULT 'teal-500/10',
    `icon_color`        VARCHAR(30) DEFAULT 'teal-600',
    `page_label_en`     VARCHAR(100) DEFAULT NULL,
    `page_label_so`     VARCHAR(100) DEFAULT NULL,
    `sort_order`        INT NOT NULL DEFAULT 0,
    `is_active`         TINYINT(1) NOT NULL DEFAULT 1,
    `created_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Feature cards shown on program pages (2 per page)
CREATE TABLE `program_features` (
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `program_id`        INT UNSIGNED NOT NULL,
    `title_en`          VARCHAR(255) NOT NULL,
    `title_so`          VARCHAR(255) DEFAULT NULL,
    `description_en`    TEXT DEFAULT NULL,
    `description_so`    TEXT DEFAULT NULL,
    `icon_svg`          TEXT DEFAULT NULL,
    `icon_bg_color`     VARCHAR(30) DEFAULT NULL,
    `icon_color`        VARCHAR(30) DEFAULT NULL,
    `sort_order`        INT NOT NULL DEFAULT 0,
    `created_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_feature_program` (`program_id`),
    CONSTRAINT `fk_feature_program` FOREIGN KEY (`program_id`) REFERENCES `programs`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Bullet list items for program pages
CREATE TABLE `program_list_items` (
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `program_id`        INT UNSIGNED NOT NULL,
    `text_en`           VARCHAR(500) NOT NULL,
    `text_so`           VARCHAR(500) DEFAULT NULL,
    `bullet_color`      VARCHAR(30) DEFAULT 'teal-500',
    `sort_order`        INT NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`),
    KEY `idx_list_program` (`program_id`),
    CONSTRAINT `fk_list_program` FOREIGN KEY (`program_id`) REFERENCES `programs`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 7. DIRECTOR'S MESSAGE
-- ============================================================

CREATE TABLE `director_message` (
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name_en`           VARCHAR(150) NOT NULL,
    `name_so`           VARCHAR(150) DEFAULT NULL,
    `title_en`          VARCHAR(150) DEFAULT 'Executive Director',
    `title_so`          VARCHAR(150) DEFAULT 'Agaasimaha Fulinta',
    `photo`             VARCHAR(500) DEFAULT NULL,
    `quote_en`          VARCHAR(500) DEFAULT NULL,
    `quote_so`          VARCHAR(500) DEFAULT NULL,
    `message_en`        LONGTEXT DEFAULT NULL,
    `message_so`        LONGTEXT DEFAULT NULL,
    `is_active`         TINYINT(1) NOT NULL DEFAULT 1,
    `updated_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 8. PARTNERS
-- ============================================================

CREATE TABLE `partners` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`          VARCHAR(150) NOT NULL,
    `abbreviation`  VARCHAR(20) DEFAULT NULL,
    `logo`          VARCHAR(500) DEFAULT NULL,
    `website_url`   VARCHAR(500) DEFAULT NULL,
    `sort_order`    INT NOT NULL DEFAULT 0,
    `is_active`     TINYINT(1) NOT NULL DEFAULT 1,
    `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 9. ABOUT US PAGES (static content pages)
-- ============================================================

CREATE TABLE `pages` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `slug`          VARCHAR(100) NOT NULL UNIQUE,
    `title_en`      VARCHAR(255) NOT NULL,
    `title_so`      VARCHAR(255) DEFAULT NULL,
    `content_en`    LONGTEXT DEFAULT NULL,
    `content_so`    LONGTEXT DEFAULT NULL,
    `page_group`    ENUM('about','programs','events','publications','standalone') NOT NULL DEFAULT 'standalone',
    `meta_title`    VARCHAR(255) DEFAULT NULL,
    `meta_desc`     VARCHAR(500) DEFAULT NULL,
    `is_active`     TINYINT(1) NOT NULL DEFAULT 1,
    `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 10. ANNOUNCEMENTS
-- ============================================================

CREATE TABLE `announcements` (
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title_en`          VARCHAR(255) NOT NULL,
    `title_so`          VARCHAR(255) DEFAULT NULL,
    `description_en`    TEXT DEFAULT NULL,
    `description_so`    TEXT DEFAULT NULL,
    `published_date`    DATE NOT NULL,
    `status`            ENUM('open','closed','archived') NOT NULL DEFAULT 'open',
    `action_label_en`   VARCHAR(50) DEFAULT NULL,
    `action_label_so`   VARCHAR(50) DEFAULT NULL,
    `action_link`       VARCHAR(500) DEFAULT NULL,
    `attachment`        VARCHAR(500) DEFAULT NULL,
    `border_color`      VARCHAR(30) DEFAULT 'gold-500',
    `sort_order`        INT NOT NULL DEFAULT 0,
    `is_active`         TINYINT(1) NOT NULL DEFAULT 1,
    `created_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_announcements_date` (`published_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 11. NEWS / MEDIA
-- ============================================================

CREATE TABLE `media_articles` (
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title_en`          VARCHAR(255) NOT NULL,
    `title_so`          VARCHAR(255) DEFAULT NULL,
    `excerpt_en`        TEXT DEFAULT NULL,
    `excerpt_so`        TEXT DEFAULT NULL,
    `content_en`        LONGTEXT DEFAULT NULL,
    `content_so`        LONGTEXT DEFAULT NULL,
    `cover_image`       VARCHAR(500) DEFAULT NULL,
    `published_date`    DATE NOT NULL,
    `is_featured`       TINYINT(1) NOT NULL DEFAULT 0,
    `is_active`         TINYINT(1) NOT NULL DEFAULT 1,
    `created_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_media_date` (`published_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 12. EVENTS
-- ============================================================

CREATE TABLE `events` (
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title_en`          VARCHAR(255) NOT NULL,
    `title_so`          VARCHAR(255) DEFAULT NULL,
    `description_en`    TEXT DEFAULT NULL,
    `description_so`    TEXT DEFAULT NULL,
    `event_date`        DATE NOT NULL,
    `start_time`        TIME DEFAULT NULL,
    `end_time`          TIME DEFAULT NULL,
    `event_type`        ENUM('workshop','conference','seminar','forum','other') NOT NULL DEFAULT 'workshop',
    `location_en`       VARCHAR(255) DEFAULT NULL,
    `location_so`       VARCHAR(255) DEFAULT NULL,
    `registration_link` VARCHAR(500) DEFAULT NULL,
    `color_scheme`      VARCHAR(30) DEFAULT 'navy-900',
    `is_active`         TINYINT(1) NOT NULL DEFAULT 1,
    `created_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_events_date` (`event_date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 13. VISION, MISSION & VALUES
-- ============================================================

CREATE TABLE `vision_mission` (
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `mission_en`        LONGTEXT DEFAULT NULL,
    `mission_so`        LONGTEXT DEFAULT NULL,
    `vision_en`         LONGTEXT DEFAULT NULL,
    `vision_so`         LONGTEXT DEFAULT NULL,
    `updated_at`        DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `core_values` (
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title_en`          VARCHAR(100) NOT NULL,
    `title_so`          VARCHAR(100) DEFAULT NULL,
    `description_en`    VARCHAR(500) DEFAULT NULL,
    `description_so`    VARCHAR(500) DEFAULT NULL,
    `sort_order`        INT NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 14. ORGANIZATIONAL STRUCTURE
-- ============================================================

CREATE TABLE `org_structure` (
    `id`                INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `title_en`          VARCHAR(150) NOT NULL,
    `title_so`          VARCHAR(150) DEFAULT NULL,
    `level`             ENUM('board','director','department') NOT NULL,
    `icon_svg`          TEXT DEFAULT NULL,
    `icon_color`        VARCHAR(30) DEFAULT NULL,
    `bg_color`          VARCHAR(30) DEFAULT NULL,
    `text_color`        VARCHAR(30) DEFAULT 'white',
    `sort_order`        INT NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 15. CONTACT SUBMISSIONS
-- ============================================================

CREATE TABLE `contact_submissions` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`          VARCHAR(150) NOT NULL,
    `email`         VARCHAR(255) NOT NULL,
    `subject`       VARCHAR(255) DEFAULT NULL,
    `message`       TEXT NOT NULL,
    `is_read`       TINYINT(1) NOT NULL DEFAULT 0,
    `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_contact_read` (`is_read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 16. NEWSLETTER SUBSCRIBERS
-- ============================================================

CREATE TABLE `newsletter_subscribers` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `email`         VARCHAR(255) NOT NULL UNIQUE,
    `is_active`     TINYINT(1) NOT NULL DEFAULT 1,
    `subscribed_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 17. MEDIA LIBRARY (uploaded files tracker)
-- ============================================================

CREATE TABLE `media_library` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `filename`      VARCHAR(255) NOT NULL,
    `original_name` VARCHAR(255) NOT NULL,
    `mime_type`     VARCHAR(100) NOT NULL,
    `file_size`     INT UNSIGNED NOT NULL DEFAULT 0,
    `file_path`     VARCHAR(500) NOT NULL,
    `uploaded_by`   INT UNSIGNED DEFAULT NULL,
    `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_media_uploader` (`uploaded_by`),
    CONSTRAINT `fk_media_uploader` FOREIGN KEY (`uploaded_by`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 18. TRANSLATIONS (extensible key-value for dynamic content)
-- ============================================================

CREATE TABLE `translations` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `trans_key`     VARCHAR(100) NOT NULL,
    `lang`          CHAR(2) NOT NULL DEFAULT 'en',
    `trans_value`   TEXT NOT NULL,
    `updated_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `uk_translation` (`trans_key`, `lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ============================================================
-- 19. ACTIVITY LOG (audit trail)
-- ============================================================

CREATE TABLE `activity_log` (
    `id`            INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user_id`       INT UNSIGNED DEFAULT NULL,
    `action`        VARCHAR(100) NOT NULL,
    `entity_type`   VARCHAR(50) DEFAULT NULL,
    `entity_id`     INT UNSIGNED DEFAULT NULL,
    `description`   TEXT DEFAULT NULL,
    `ip_address`    VARCHAR(45) DEFAULT NULL,
    `created_at`    DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    KEY `idx_log_user` (`user_id`),
    KEY `idx_log_entity` (`entity_type`, `entity_id`),
    CONSTRAINT `fk_log_user` FOREIGN KEY (`user_id`) REFERENCES `users`(`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
