# IFMG CMS Build Task List

This document outlines the step-by-step implementation plan for the IFMG CMS project.

## Phase 1: Foundation & Authentication
- [x] Initialize `ifmg_admin` folder structure
- [x] Set up `.htaccess` for MVC-style routing
- [x] Create `config/database.php` for MySQLi connection
- [x] Create core classes: `Router.php`, `Controller.php`, `Model.php` (MySQLi based)
- [x] Implement User Model and `Auth.php` helper
- [x] Create Login View and `AuthController`
- [x] Implement Session management and Middleware for auth checks
- [x] Create base `DashboardController` and index view

## Phase 2: Design System & Shared Components
- [x] Set up `assets/css/admin.css` with Tailwind custom config
- [x] Create layout wrappers: `app.php` (sidebar + content) and `auth.php`
- [x] Build sidebar navigation partial
- [x] Build topbar with user profile dropdown
- [x] Create reusable UI components: Data Tables, Form Groups, Alert Messages, Modals

## Phase 3: Home Page Content Management
- [x] **Hero Carousel**: List, Add, Edit, Delete, Sort slides
- [x] **Announcement Strip**: Single-record edit form for the top strip
- [x] **Director Message**: Single-record edit form for the Director's section
- [x] **Partners**: List, Add, Edit, Delete, Sort partner logos
- [x] **Newsletter**: View subscribers list and export CSV

## Phase 4: Core Pages & Programs
- [x] **About Us**: Manage content for History, Vision, Mission, and Structure
- [x] **Workstreams (Programs)**: 
    - [x] Manage main program descriptions
    - [x] Manage program features (cards)
    - [x] Manage program bullet lists
- [x] **Static Pages**: Create general-purpose page manager for future expansion

## Phase 5: Resource Hub (Publications, Events, Media)
- [x] **Publications**: 
    - [x] Category-based management (Policy, Working, Annual)
    - [x] PDF file and cover image upload integration
- [x] **Events**: Calendar management with date/time pickers
- [x] Announcements: List and detail management for the announcements page
- [x] News & Media Center: Article management with featured flags and excerpts

## Phase 6: Media Library & Localization
- [x] **Media Library**:
    - [x] Centralized asset browser (Grid view)
    - [x] Drag-and-drop file uploader
    - [x] Integration with content forms (image/document picking)
- [x] **Translation Manager**:
    - [x] Key-value pair editor for `app.js` translations
    - [x] JSON generation tool to export `translations.json`

## Phase 7: System Monitoring & Communication
- [x] **Contact Submissions**: Inbox for website contact forms
- [x] **Settings**: Global site config (Logo, Site Name, Social Links)
- [x] **User Management**: Add/Edit/Deactivate admin users and roles
- [x] **Activity Log**: View system-wide audit trail

## Phase 8: Frontend Integration & Deployment
- [x] Create shared database bootstrap file for the frontend
- [x] Refactor `index.php` to fetch dynamic content from DB
- [x] Refactor all inner pages to use DB content
- [x] Update `app.js` to load translations from JSON
- [x] Final verification and performance optimization

## Phase 9: Final Polish & Handover
- [x] Ensure all contact details are dynamic in header/footer
- [x] Implement AJAX form handling for newsletters and contact
- [x] Verify bilingual consistency across all pages
- [x] Final code cleanup and documentation
