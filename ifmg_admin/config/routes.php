<?php
/**
 * Route Definitions
 */

// Auth routes
$router->add('login', 'AuthController', 'login');
$router->add('logout', 'AuthController', 'logout');

// Dashboard
$router->add('', 'DashboardController', 'index', [Middleware::class, 'auth']);
$router->add('dashboard', 'DashboardController', 'index', [Middleware::class, 'auth']);

// Hero Carousel
$router->add('hero', 'HeroController', 'index', [Middleware::class, 'auth']);
$router->add('hero/create', 'HeroController', 'create', [Middleware::class, 'auth']);
$router->add('hero/store', 'HeroController', 'store', [Middleware::class, 'auth']);
$router->add('hero/edit/{id}', 'HeroController', 'edit', [Middleware::class, 'auth']);
$router->add('hero/update/{id}', 'HeroController', 'update', [Middleware::class, 'auth']);
$router->add('hero/delete/{id}', 'HeroController', 'delete', [Middleware::class, 'auth']);

// Announcements (Site-wide strip)
$router->add('announcement-strip', 'AnnouncementStripController', 'edit', [Middleware::class, 'auth']);
$router->add('announcement-strip/update', 'AnnouncementStripController', 'update', [Middleware::class, 'auth']);

// Director Message
$router->add('director-message', 'DirectorController', 'edit', [Middleware::class, 'auth']);
$router->add('director-message/update', 'DirectorController', 'update', [Middleware::class, 'auth']);

// Partners
$router->add('partners', 'PartnerController', 'index', [Middleware::class, 'auth']);
$router->add('partners/create', 'PartnerController', 'create', [Middleware::class, 'auth']);
$router->add('partners/store', 'PartnerController', 'store', [Middleware::class, 'auth']);
$router->add('partners/edit/{id}', 'PartnerController', 'edit', [Middleware::class, 'auth']);
$router->add('partners/update/{id}', 'PartnerController', 'update', [Middleware::class, 'auth']);
$router->add('partners/delete/{id}', 'PartnerController', 'delete', [Middleware::class, 'auth']);

// Newsletter
$router->add('newsletter', 'NewsletterController', 'index', [Middleware::class, 'auth']);
$router->add('newsletter/export', 'NewsletterController', 'export', [Middleware::class, 'auth']);

// About Us & Static Pages
$router->add('about/history', 'AboutController', 'history', [Middleware::class, 'auth']);
$router->add('about/vision-mission', 'AboutController', 'visionMission', [Middleware::class, 'auth']);
$router->add('about/update/{slug}', 'AboutController', 'update', [Middleware::class, 'auth']);

// Core Values
$router->add('core-values', 'CoreValueController', 'index', [Middleware::class, 'auth']);
$router->add('core-values/create', 'CoreValueController', 'create', [Middleware::class, 'auth']);
$router->add('core-values/store', 'CoreValueController', 'store', [Middleware::class, 'auth']);
$router->add('core-values/edit/{id}', 'CoreValueController', 'edit', [Middleware::class, 'auth']);
$router->add('core-values/update/{id}', 'CoreValueController', 'update', [Middleware::class, 'auth']);
$router->add('core-values/delete/{id}', 'CoreValueController', 'delete', [Middleware::class, 'auth']);

// Organizational Structure
$router->add('org', 'OrgController', 'index', [Middleware::class, 'auth']);
$router->add('org/create', 'OrgController', 'create', [Middleware::class, 'auth']);
$router->add('org/store', 'OrgController', 'store', [Middleware::class, 'auth']);
$router->add('org/edit/{id}', 'OrgController', 'edit', [Middleware::class, 'auth']);
$router->add('org/update/{id}', 'OrgController', 'update', [Middleware::class, 'auth']);
$router->add('org/delete/{id}', 'OrgController', 'delete', [Middleware::class, 'auth']);

// Publications
$router->add('publications', 'PublicationController', 'index', [Middleware::class, 'auth']);
$router->add('publications/create', 'PublicationController', 'create', [Middleware::class, 'auth']);
$router->add('publications/store', 'PublicationController', 'store', [Middleware::class, 'auth']);
$router->add('publications/edit/{id}', 'PublicationController', 'edit', [Middleware::class, 'auth']);
$router->add('publications/update/{id}', 'PublicationController', 'update', [Middleware::class, 'auth']);
$router->add('publications/delete/{id}', 'PublicationController', 'delete', [Middleware::class, 'auth']);

// Events
$router->add('events', 'EventController', 'index', [Middleware::class, 'auth']);
$router->add('events/create', 'EventController', 'create', [Middleware::class, 'auth']);
$router->add('events/store', 'EventController', 'store', [Middleware::class, 'auth']);
$router->add('events/edit/{id}', 'EventController', 'edit', [Middleware::class, 'auth']);
$router->add('events/update/{id}', 'EventController', 'update', [Middleware::class, 'auth']);
$router->add('events/delete/{id}', 'EventController', 'delete', [Middleware::class, 'auth']);

// Programs
$router->add('programs', 'ProgramController', 'index', [Middleware::class, 'auth']);
$router->add('programs/create', 'ProgramController', 'create', [Middleware::class, 'auth']);
$router->add('programs/store', 'ProgramController', 'store', [Middleware::class, 'auth']);
$router->add('programs/edit/{id}', 'ProgramController', 'edit', [Middleware::class, 'auth']);
$router->add('programs/update/{id}', 'ProgramController', 'update', [Middleware::class, 'auth']);
$router->add('programs/delete/{id}', 'ProgramController', 'delete', [Middleware::class, 'auth']);

// Announcements
$router->add('announcements', 'AnnouncementController', 'index', [Middleware::class, 'auth']);
$router->add('announcements/create', 'AnnouncementController', 'create', [Middleware::class, 'auth']);
$router->add('announcements/store', 'AnnouncementController', 'store', [Middleware::class, 'auth']);
$router->add('announcements/edit/{id}', 'AnnouncementController', 'edit', [Middleware::class, 'auth']);
$router->add('announcements/update/{id}', 'AnnouncementController', 'update', [Middleware::class, 'auth']);
$router->add('announcements/delete/{id}', 'AnnouncementController', 'delete', [Middleware::class, 'auth']);

// Media
$router->add('media', 'MediaController', 'index', [Middleware::class, 'auth']);
$router->add('media/create', 'MediaController', 'create', [Middleware::class, 'auth']);
$router->add('media/store', 'MediaController', 'store', [Middleware::class, 'auth']);
$router->add('media/edit/{id}', 'MediaController', 'edit', [Middleware::class, 'auth']);
$router->add('media/update/{id}', 'MediaController', 'update', [Middleware::class, 'auth']);
$router->add('media/delete/{id}', 'MediaController', 'delete', [Middleware::class, 'auth']);

// Media Library
$router->add('media-library', 'MediaLibraryController', 'index', [Middleware::class, 'auth']);
$router->add('media-library/upload', 'MediaLibraryController', 'upload', [Middleware::class, 'auth']);
$router->add('media-library/delete/{id}', 'MediaLibraryController', 'delete', [Middleware::class, 'auth']);

// Translations
$router->add('translations', 'TranslationController', 'index', [Middleware::class, 'auth']);
$router->add('translations/update', 'TranslationController', 'update', [Middleware::class, 'auth']);
$router->add('translations/export', 'TranslationController', 'export', [Middleware::class, 'auth']);

// Contact Inbox
$router->add('contacts', 'ContactController', 'index', [Middleware::class, 'auth']);
$router->add('contacts/view/{id}', 'ContactController', 'view_message', [Middleware::class, 'auth']);
$router->add('contacts/delete/{id}', 'ContactController', 'delete', [Middleware::class, 'auth']);

// Settings
$router->add('settings', 'SettingController', 'index', [Middleware::class, 'auth']);
$router->add('settings/update', 'SettingController', 'update', [Middleware::class, 'auth']);

// Users
$router->add('users', 'UserController', 'index', [Middleware::class, 'auth']);
$router->add('users/create', 'UserController', 'create', [Middleware::class, 'auth']);
$router->add('users/store', 'UserController', 'store', [Middleware::class, 'auth']);
$router->add('users/edit/{id}', 'UserController', 'edit', [Middleware::class, 'auth']);
$router->add('users/update/{id}', 'UserController', 'update', [Middleware::class, 'auth']);
$router->add('users/delete/{id}', 'UserController', 'delete', [Middleware::class, 'auth']);

// Activity Log
$router->add('activity', 'ActivityController', 'index', [Middleware::class, 'auth']);
