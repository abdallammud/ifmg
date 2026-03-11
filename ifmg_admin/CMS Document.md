# IFMG CMS — Comprehensive Reference Guide

> **Lightweight Content Management System** for the Institute of Financial Management and Good Governance website.

---

## Table of Contents

1. [Architecture Overview](#1-architecture-overview)
2. [Technology Stack](#2-technology-stack)
3. [Directory Structure](#3-directory-structure)
4. [Routing & Entry Point](#4-routing--entry-point)
5. [Authentication & Authorization](#5-authentication--authorization)
6. [Design System & UI](#6-design-system--ui)
7. [Dashboard](#7-dashboard)
8. [Content Modules](#8-content-modules)
9. [Media Library](#9-media-library)
10. [Translation System](#10-translation-system)
11. [Contact & Newsletter](#11-contact--newsletter)
12. [Activity Log](#12-activity-log)
13. [Frontend Integration](#13-frontend-integration)
14. [Security Guidelines](#14-security-guidelines)

---

## 1. Architecture Overview

The CMS follows a lightweight **MVC-like** architecture with a single entry point (`index.php`), an `.htaccess` router, and clean URL segments.

```
Browser Request
    ↓
.htaccess (rewrite)
    ↓
index.php (front controller)
    ↓
Router → parses URI → matches controller/action
    ↓
Controller → calls Model → returns data
    ↓
View (PHP templates) → renders HTML
    ↓
Response to browser
```

### Key Principles

| Principle | Description |
|---|---|
| **Single Entry Point** | All requests go through `index.php` |
| **Clean URLs** | `/ifmg_admin/publications/edit/5` instead of `?page=pub&action=edit&id=5` |
| **No Framework Dependency** | Pure PHP, PDO for DB, no Composer required |
| **Bilingual** | Every content field has `_en` and `_so` variants |
| **Separation of Concerns** | Models handle data, Controllers handle logic, Views handle presentation |

---

## 2. Technology Stack

| Layer | Technology |
|---|---|
| **Language** | PHP 7.4+ (compatible with XAMPP) |
| **Database** | MySQL / MariaDB via **MySQLi** |
| **Frontend** | HTML5, Tailwind CSS (CDN), **jQuery**, Vanilla JS |
| **Icons** | Heroicons (SVG inline) |
| **Fonts** | Inter (body), Poppins (headings) — Google Fonts |
| **Server** | Apache with mod_rewrite (XAMPP) |
| **Authentication** | PHP native sessions, bcrypt password hashing |

---

## 3. Directory Structure

```
ifmg_admin/
├── .htaccess                   # URL rewriting rules
├── index.php                   # Single entry point (front controller)
├── schema.sql                  # Database schema
├── CMS Document.md             # This document
├── task.md                     # Build task tracker
│
├── config/
│   ├── database.php            # MySQLi connection settings
│   ├── app.php                 # App-wide constants (APP_NAME, BASE_URL, etc.)
│   └── routes.php              # Route definitions
│
├── core/
│   ├── Router.php              # URI parser + route matcher
│   ├── Controller.php          # Base controller class
│   ├── Model.php               # Base model class (MySQLi wrapper)
│   ├── Auth.php                # Authentication helper
│   ├── Session.php             # Session management
│   ├── Validator.php           # Input validation utility
│   ├── Helpers.php             # Global helper functions
│   └── Middleware.php          # Auth/role checks before controller actions
│
├── controllers/
│   ├── DashboardController.php
│   ├── AuthController.php
│   ├── HeroController.php
│   ├── AnnouncementStripController.php
│   ├── PublicationController.php
│   ├── ProgramController.php
│   ├── DirectorController.php
│   ├── PartnerController.php
│   ├── PageController.php
│   ├── AnnouncementController.php
│   ├── MediaArticleController.php
│   ├── EventController.php
│   ├── VisionMissionController.php
│   ├── StructureController.php
│   ├── ContactSubmissionController.php
│   ├── NewsletterController.php
│   ├── MediaLibraryController.php
│   ├── TranslationController.php
│   ├── SettingController.php
│   ├── UserController.php
│   └── ActivityLogController.php
│
├── models/
│   ├── User.php
│   ├── HeroSlide.php
│   ├── AnnouncementStrip.php
│   ├── Publication.php
│   ├── Program.php
│   ├── ProgramFeature.php
│   ├── ProgramListItem.php
│   ├── DirectorMessage.php
│   ├── Partner.php
│   ├── Page.php
│   ├── Announcement.php
│   ├── MediaArticle.php
│   ├── Event.php
│   ├── VisionMission.php
│   ├── CoreValue.php
│   ├── OrgStructure.php
│   ├── ContactSubmission.php
│   ├── NewsletterSubscriber.php
│   ├── MediaFile.php
│   ├── Translation.php
│   ├── Setting.php
│   └── ActivityLog.php
│
├── views/
│   ├── layouts/
│   │   ├── app.php             # Main layout wrapper (sidebar + topbar + content)
│   │   └── auth.php            # Login page layout (no sidebar)
│   ├── partials/
│   │   ├── sidebar.php         # Left sidebar navigation
│   │   ├── topbar.php          # Top navigation bar
│   │   ├── alerts.php          # Flash message display
│   │   └── pagination.php      # Reusable pagination component
│   ├── auth/
│   │   └── login.php
│   ├── dashboard/
│   │   └── index.php
│   ├── hero/
│   │   ├── index.php           # List all slides
│   │   ├── create.php          # Add new slide
│   │   └── edit.php            # Edit slide
│   ├── publications/
│   │   ├── index.php
│   │   ├── create.php
│   │   └── edit.php
│   ├── programs/
│   │   ├── index.php
│   │   ├── create.php
│   │   └── edit.php
│   ├── director/
│   │   └── edit.php            # Single-record edit
│   ├── partners/
│   │   ├── index.php
│   │   ├── create.php
│   │   └── edit.php
│   ├── pages/
│   │   ├── index.php
│   │   ├── create.php
│   │   └── edit.php
│   ├── announcements/
│   │   ├── index.php
│   │   ├── create.php
│   │   └── edit.php
│   ├── media-articles/
│   │   ├── index.php
│   │   ├── create.php
│   │   └── edit.php
│   ├── events/
│   │   ├── index.php
│   │   ├── create.php
│   │   └── edit.php
│   ├── vision-mission/
│   │   └── edit.php
│   ├── structure/
│   │   ├── index.php
│   │   └── edit.php
│   ├── announcement-strip/
│   │   └── edit.php
│   ├── contact-submissions/
│   │   ├── index.php
│   │   └── view.php
│   ├── newsletter/
│   │   └── index.php
│   ├── media-library/
│   │   └── index.php
│   ├── translations/
│   │   └── index.php           # Search & edit translations
│   ├── settings/
│   │   └── index.php
│   ├── users/
│   │   ├── index.php
│   │   ├── create.php
│   │   └── edit.php
│   └── activity-log/
│       └── index.php
│
└── assets/
    ├── css/
    │   └── admin.css           # Admin-specific overrides
    ├── js/
    │   └── admin.js            # Admin-specific JS
    └── uploads/                # User-uploaded files
        ├── images/
        ├── documents/
        └── temp/
```

---

## 4. Routing & Entry Point

### `.htaccess`

```apache
RewriteEngine On
RewriteBase /ifmg_admin/

# If the request is not a real file or directory, route to index.php
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]
```

### `index.php` (Front Controller)

```php
<?php
session_start();

define('BASE_PATH', __DIR__ . '/');
define('BASE_URL', '/ifmg_admin/');

require_once 'config/database.php';
require_once 'config/app.php';
require_once 'core/Helpers.php';
require_once 'core/Router.php';
require_once 'core/Controller.php';
require_once 'core/Model.php';
require_once 'core/Auth.php';
require_once 'core/Session.php';
require_once 'core/Validator.php';
require_once 'core/Middleware.php';

$router = new Router();
require_once 'config/routes.php';
$router->dispatch();
```

### URL Convention

| URL Pattern | Controller | Action |
|---|---|---|
| `/ifmg_admin/` | DashboardController | index |
| `/ifmg_admin/login` | AuthController | login |
| `/ifmg_admin/publications` | PublicationController | index |
| `/ifmg_admin/publications/create` | PublicationController | create |
| `/ifmg_admin/publications/edit/5` | PublicationController | edit |
| `/ifmg_admin/publications/delete/5` | PublicationController | delete |

---

## 5. Authentication & Authorization

### Login Flow

1. User visits `/ifmg_admin/login`
2. Submits username + password
3. System verifies credentials with `password_verify()`
4. On success: create session, log activity, redirect to dashboard
5. On failure: flash error message, redirect back to login

### Roles

| Role | Permissions |
|---|---|
| `super_admin` | Full access, manage users, view activity log, manage settings |
| `admin` | Full content access, cannot manage users or settings |
| `editor` | Can create/edit content, cannot delete or manage system settings |

### Middleware

Every controller action (except login) passes through `Middleware::auth()` which checks for a valid session. Role-specific actions also check `Middleware::role('super_admin')`.

---

## 6. Design System & UI

### Color Palette

The admin panel mirrors the frontend color palette for brand consistency:

| Token | Hex | Usage |
|---|---|---|
| `--admin-navy-900` | `#0B2E4F` | Sidebar background, headers |
| `--admin-navy-950` | `#071B2F` | Sidebar hover states |
| `--admin-teal-500` | `#0F6E8C` | Primary accent, active states |
| `--admin-teal-600` | `#0C5A73` | Hover accent |
| `--admin-gold-500` | `#C9A227` | Badges, highlights, important actions |
| `--admin-emerald-500` | `#2E8B57` | Success states |
| `--admin-bg` | `#F5F7FA` | Page background |
| `--admin-card` | `#FFFFFF` | Card background |
| `--admin-border` | `#E2E8F0` | Borders |
| `--admin-danger` | `#DC2626` | Delete/error states |

### Typography

- **Headings**: Poppins (600, 700)
- **Body**: Inter (400, 500, 600)
- Same Google Fonts as the frontend

### Layout

```
┌─────────────────────────────────────────────────┐
│  TOPBAR  (logo, search, notifications, avatar)  │
├──────────┬──────────────────────────────────────┤
│          │                                      │
│ SIDEBAR  │         MAIN CONTENT AREA            │
│          │                                      │
│ • Dashboard                                     │
│ • Home Page                                     │
│   - Hero Slides                                 │
│   - Announcement                                │
│   - Partners                                    │
│   - Director                                    │
│   - Newsletter                                  │
│ • About Us                                      │
│   - History                                     │
│   - Vision/Mission                              │
│   - Structure                                   │
│ • Programs                                      │
│ • Publications                                  │
│ • Events                                        │
│   - Announcements                               │
│   - News/Media                                  │
│   - Events                                      │
│ • Media Library                                 │
│ • Translations                                  │
│ • Contact Msgs                                  │
│ • Settings                                      │
│ • Users                                         │
│ • Activity Log                                  │
│                                                 │
└──────────┴──────────────────────────────────────┘
```

### UI Components

| Component | Description |
|---|---|
| **Data Tables** | Striped rows, sortable headers, actions column (edit/delete) |
| **Forms** | Two-column layout: English fields left, Somali fields right |
| **Cards** | White bg, rounded corners, subtle shadow, border |
| **Alerts** | Top-of-content flash messages (success/error/warning/info) |
| **Buttons** | Primary (gold gradient), Secondary (outline), Danger (red) |
| **Modal** | Confirmation dialog for delete actions |
| **Pagination** | Bottom of tables, showing 15 items per page |
| **Breadcrumbs** | Top of content area: `Dashboard / Publications / Edit` |
| **Tabs** | For bilingual editing: English | Somali tabs |

---

## 7. Dashboard

### Route: `/ifmg_admin/` or `/ifmg_admin/dashboard`

### Stats Cards Row (top)

| Card | Source Table | Query |
|---|---|---|
| Total Publications | `publications` | `COUNT(*) WHERE is_active = 1` |
| Upcoming Events | `events` | `COUNT(*) WHERE event_date >= NOW()` |
| Unread Messages | `contact_submissions` | `COUNT(*) WHERE is_read = 0` |
| Subscribers | `newsletter_subscribers` | `COUNT(*) WHERE is_active = 1` |

### Quick Actions

- Add New Publication
- Add New Event
- Add New Announcement
- View Contact Messages

### Recent Activity Feed

Pull latest 10 entries from `activity_log` table. Display as: `[User] [action] [entity] — [time ago]`.

---

## 8. Content Modules

Each module follows a consistent CRUD pattern:

### 8.1 Hero Slides

- **Route**: `/ifmg_admin/hero`
- **Table**: `hero_slides`
- **Features**: Sortable, toggle active/inactive, image upload, bilingual title/subtitle
- **Form fields**: title_en, title_so, subtitle_en, subtitle_so, cta_text_en, cta_text_so, cta_link, bg_image (upload), sort_order, is_active

### 8.2 Announcement Strip

- **Route**: `/ifmg_admin/announcement-strip`
- **Table**: `announcement_strip`
- **Type**: Single-record edit form (not a list)
- **Form fields**: text_en, text_so, btn_text_en, btn_text_so, link, is_active

### 8.3 Publications

- **Route**: `/ifmg_admin/publications`
- **Table**: `publications`
- **Features**: Filter by category (policy/working/annual), PDF upload, cover image upload
- **Form fields**: title_en, title_so, description_en, description_so, category (dropdown), cover_image, pdf_file, is_featured, published_date, sort_order
- **Frontend mapping**: Feeds `publication.php` and the publications section on `index.php`

### 8.4 Programs (Workstreams)

- **Route**: `/ifmg_admin/programs`
- **Tables**: `programs`, `program_features`, `program_list_items`
- **Features**: Manages all 4 workstream pages (capacity-building, certification, research, policy)
- **Form fields**: slug, title_en, title_so, short_desc_en/so, full_content_en/so, icon_svg, page_label_en/so
- **Sub-forms**: Inline editing of feature cards and bullet list items
- **Frontend mapping**: Feeds workstream cards on `index.php` and individual program pages

### 8.5 Director's Message

- **Route**: `/ifmg_admin/director`
- **Table**: `director_message`
- **Type**: Single-record edit form
- **Form fields**: name_en, name_so, title_en, title_so, photo (upload), quote_en, quote_so, message_en, message_so
- **Frontend mapping**: Director section on `index.php`

### 8.6 Partners

- **Route**: `/ifmg_admin/partners`
- **Table**: `partners`
- **Features**: Logo upload, drag-and-drop sort order
- **Form fields**: name, abbreviation, logo (upload), website_url, sort_order
- **Frontend mapping**: Partners section on `index.php`

### 8.7 Pages (Static Content)

- **Route**: `/ifmg_admin/pages`
- **Table**: `pages`
- **Features**: Manages About/History page and Contact page body content, rich text (textarea) editor
- **Form fields**: slug, title_en, title_so, content_en, content_so, page_group, meta_title, meta_desc

### 8.8 Vision & Mission

- **Route**: `/ifmg_admin/vision-mission`
- **Tables**: `vision_mission`, `core_values`
- **Type**: Single-record edit + dynamic list of core values
- **Form fields**: mission_en, mission_so, vision_en, vision_so, core values (title + description, bilingual)
- **Frontend mapping**: `vision-mission.php`

### 8.9 Organizational Structure

- **Route**: `/ifmg_admin/structure`
- **Table**: `org_structure`
- **Features**: Manage board, director, and department nodes
- **Form fields**: title_en, title_so, level (board/director/department), icon_svg, icon_color, bg_color
- **Frontend mapping**: `structure.php`

### 8.10 Announcements

- **Route**: `/ifmg_admin/announcements`
- **Table**: `announcements`
- **Features**: Status management (open/closed/archived), attachment upload
- **Form fields**: title_en, title_so, description_en, description_so, published_date, status, action_label_en/so, action_link, attachment, border_color
- **Frontend mapping**: `announcements.php`

### 8.11 News & Media

- **Route**: `/ifmg_admin/media-articles`
- **Table**: `media_articles`
- **Features**: Cover image upload, excerpt + full content, featured toggle
- **Form fields**: title_en, title_so, excerpt_en, excerpt_so, content_en, content_so, cover_image, published_date, is_featured
- **Frontend mapping**: `media.php`

### 8.12 Events

- **Route**: `/ifmg_admin/events`
- **Table**: `events`
- **Features**: Date/time pickers, event type selection, registration link
- **Form fields**: title_en, title_so, description_en, description_so, event_date, start_time, end_time, event_type, location_en/so, registration_link, color_scheme
- **Frontend mapping**: `events.php`

### 8.13 Settings

- **Route**: `/ifmg_admin/settings`
- **Table**: `settings`
- **Access**: `super_admin` only
- **Grouped tabs**: General (site name, logo, email, phone, location, copyright), Social (Twitter, Facebook, LinkedIn)

### 8.14 Users

- **Route**: `/ifmg_admin/users`
- **Table**: `users`
- **Access**: `super_admin` only
- **Features**: Create/edit/deactivate users, assign roles, reset passwords

---

## 9. Media Library

### Route: `/ifmg_admin/media-library`

### Features

- **Grid View**: Thumbnail grid of all uploaded images and documents
- **Upload**: Drag-and-drop or click-to-upload, supports images (JPG, PNG, WebP, SVG) and documents (PDF)
- **File Browser**: Integration with edit forms via modal picker
- **File Info**: Original name, file size, upload date, uploaded by
- **Delete**: Soft delete or permanent removal

### Storage

All files stored in `ifmg_admin/assets/uploads/` with the structure:

```
uploads/
├── images/     (JPG, PNG, WebP)
├── documents/  (PDF)
└── temp/       (temporary upload staging)
```

File naming: `{timestamp}_{random}_{original_name}` to avoid collisions.

---

## 10. Translation System

### Route: `/ifmg_admin/translations`

### Purpose

Manage the bilingual translation key-value pairs currently hardcoded in `app.js`. The CMS will generate a JSON translations file that the frontend `app.js` consumes.

### Features

- **Search**: Find translation keys by key name or value
- **Inline Edit**: Edit translations directly in a table
- **Bulk Export**: Export all translations as JSON for the frontend
- **Auto-sync**: On save, regenerate `assets/js/translations.json` which `app.js` loads

### Architecture

1. Admin edits translations in the CMS
2. On save, the system writes a cached `translations.json` file
3. Frontend `app.js` is updated to fetch from `translations.json` instead of hardcoded object

---

## 11. Contact & Newsletter

### 11.1 Contact Submissions

- **Route**: `/ifmg_admin/contact-submissions`
- **Table**: `contact_submissions`
- **Features**: List all submissions, mark as read/unread, view detail, delete
- **No create/edit**: Read-only from admin perspective (data comes from frontend form)

### 11.2 Newsletter Subscribers

- **Route**: `/ifmg_admin/newsletter`
- **Table**: `newsletter_subscribers`
- **Features**: List all subscribers, export CSV, toggle active/inactive, delete

---

## 12. Activity Log

### Route: `/ifmg_admin/activity-log`

### Purpose

Audit trail of all admin actions. Auto-populated by helper function `logActivity()`.

### Fields Logged

- **Who**: User ID + name
- **What**: Action performed (created, updated, deleted, logged_in, etc.)
- **Where**: Entity type + entity ID
- **When**: Timestamp
- **IP**: Client IP address

### Features

- Filter by user, action type, entity type, date range
- Read-only (no editing or deletion allowed)

---

## 13. Frontend Integration

### How the CMS Connects to the Public Website

The public-facing IFMG website (parent directory) will include a shared `config/database.php` or use a bootstrap file to connect to the same `ifmg_cms` database.

### Integration Steps

1. **Create a shared `api.php`** in the `ifmg_admin/` folder that exposes read-only PHP functions
2. **Modify each frontend page** to query the database instead of displaying hardcoded HTML
3. **Translation JSON**: Frontend `app.js` loads `translations.json` generated by the CMS

### Example: `index.php` Integration

```php
<?php
require_once 'ifmg_admin/config/database.php';

// Fetch hero slides
$heroSlides = $pdo->query("SELECT * FROM hero_slides WHERE is_active = 1 ORDER BY sort_order")->fetchAll();

// Fetch publications
$publications = $pdo->query("SELECT * FROM publications WHERE is_active = 1 ORDER BY sort_order LIMIT 3")->fetchAll();

// Fetch programs
$programs = $pdo->query("SELECT * FROM programs WHERE is_active = 1 ORDER BY sort_order")->fetchAll();

// Render with data...
?>
```

### Pages That Need Database Integration

| Frontend Page | CMS Tables Used |
|---|---|
| `index.php` | `hero_slides`, `announcement_strip`, `publications`, `programs`, `director_message`, `partners`, `settings` |
| `about.php` | `pages` (slug: about) |
| `vision-mission.php` | `vision_mission`, `core_values` |
| `structure.php` | `org_structure` |
| `contact.php` | `settings`, `contact_submissions` (form handler) |
| `capacity-building.php` | `programs` (slug: capacity-building), `program_features`, `program_list_items` |
| `certification.php` | `programs` (slug: certification), `program_features`, `program_list_items` |
| `research.php` | `programs` (slug: research), `program_features`, `program_list_items` |
| `policy.php` | `programs` (slug: policy), `program_features`, `program_list_items` |
| `publication.php` | `publications` |
| `announcements.php` | `announcements` |
| `media.php` | `media_articles` |
| `events.php` | `events` |
| `header.php` | `settings` (logo) |
| `footer.php` | `settings` (contact info, social links, copyright) |

---

## 14. Security Guidelines

| Area | Implementation |
|---|---|
| **Passwords** | `password_hash()` with `PASSWORD_BCRYPT`, minimum 8 characters |
| **SQL Injection** | PDO prepared statements everywhere, no raw queries |
| **XSS** | `htmlspecialchars()` on all output, Content-Security-Policy header |
| **CSRF** | Token generated per session, validated on all POST forms |
| **File Upload** | Whitelist extensions, max 5MB, rename files, store outside webroot logic |
| **Session** | Regenerate ID on login, expire after 30 min inactivity, HTTP-only cookies |
| **Rate Limiting** | Max 5 login attempts per 15 minutes per IP |
| **Input Validation** | Server-side validation via `Validator.php` for all forms |
| **Error Handling** | Display generic errors to users, log detailed errors to file |
