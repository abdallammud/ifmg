<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo e(get_settings('site_full_name') ?? 'IFMG - Institute of Financial Management and Good Governance'); ?>
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        navy: {
                            50: '#E8EDF2',
                            100: '#C5D1DC',
                            200: '#9FB5C5',
                            300: '#7999AE',
                            400: '#5C819A',
                            500: '#3F697E',
                            600: '#325A6C',
                            700: '#254A5A',
                            800: '#183A48',
                            900: '#0B2E4F',
                            950: '#071B2F'
                        },
                        teal: {
                            500: '#0F6E8C',
                            600: '#0C5A73',
                            700: '#09465A'
                        },
                        emerald: {
                            500: '#2E8B57',
                            600: '#267347',
                            700: '#1E5B37'
                        },
                        gold: {
                            400: '#D4B23A',
                            500: '#C9A227',
                            600: '#A88520'
                        }
                    },
                    fontFamily: {
                        heading: ['Poppins', 'sans-serif'],
                        body: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    <script>
        // Sync PHP language to JS
        window.IFMG_LANG = '<?php echo isset($lang) ? $lang : "en"; ?>';
    </script>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<?php
require_once 'includes/db.php';
$current_page = isset($current_page) ? $current_page : preg_replace('/\.php$/', '', basename($_SERVER['PHP_SELF']));
$about_active = in_array($current_page, ['about', 'vision-mission', 'structure', 'contact'], true);
$programs_active = in_array($current_page, ['capacity-building', 'certification', 'research', 'policy'], true);
$events_active = in_array($current_page, ['announcements', 'media', 'events'], true);
$publications_active = in_array($current_page, ['publication'], true);
?>

<body>
    <!-- Header -->
    <header id="header" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 header-white">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between " style="height:8rem">
                <!-- Logo -->
                <a href="index" class="flex items-center gap-3">
                    <img src="<?php echo fe_asset(get_settings('site_logo') ?? 'images/logo.png'); ?>"
                        style="height:4.5rem" alt="<?php echo e(get_settings('site_name') ?? 'IFMG'); ?> Logo"
                        class="h-14 w-auto">
                </a>

                <!-- Desktop Menu -->
                <nav class="hidden lg:flex items-center gap-1">
                    <a href="index"
                        class="nav-link px-4 py-2 font-medium text-sm transition-colors <?php echo $current_page === 'index' ? 'nav-current text-teal-600' : 'text-navy-900'; ?>"
                        data-translate="nav_home">Home</a>

                    <!-- About Dropdown -->
                    <div class="dropdown relative">
                        <button
                            class="nav-link px-4 py-2 font-medium text-sm transition-colors flex items-center gap-1 <?php echo $about_active ? 'nav-current text-teal-600' : 'text-navy-900'; ?>">
                            <span data-translate="nav_about">About Us</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div
                            class="dropdown-menu absolute top-full left-0 mt-2 w-56 bg-white rounded-lg shadow-xl py-2 border border-gray-100">
                            <a href="about" class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_history">History</a>
                            <a href="vision-mission"
                                class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_vision_mission">Vision / Mission</a>
                            <a href="structure"
                                class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_structure">Structure and governance</a>
                            <a href="contact"
                                class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_contact">Contact Us</a>
                        </div>
                    </div>

                    <!-- Programs Dropdown -->
                    <div class="dropdown relative">
                        <button
                            class="nav-link px-4 py-2 font-medium text-sm transition-colors flex items-center gap-1 <?php echo $programs_active ? 'nav-current text-teal-600' : 'text-navy-900'; ?>">
                            <span data-translate="nav_programs">Programs</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div
                            class="dropdown-menu absolute top-full left-0 mt-2 w-64 bg-white rounded-lg shadow-xl py-2 border border-gray-100">
                            <a href="capacity-building"
                                class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_training">Training and capacity building</a>
                            <a href="certification"
                                class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_certification">Certification</a>
                            <a href="research"
                                class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_research">Research and innovation</a>
                            <a href="policy"
                                class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_policy">Policy & advisory</a>
                        </div>
                    </div>

                    <!-- Events Dropdown -->
                    <div class="dropdown relative">
                        <button
                            class="nav-link px-4 py-2 font-medium text-sm transition-colors flex items-center gap-1 <?php echo $events_active ? 'nav-current text-teal-600' : 'text-navy-900'; ?>">
                            <span data-translate="nav_events_menu">Events</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div
                            class="dropdown-menu absolute top-full left-0 mt-2 w-56 bg-white rounded-lg shadow-xl py-2 border border-gray-100">
                            <a href="announcements"
                                class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_announcements">Announcements</a>
                            <a href="media" class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_news_media">News and media</a>
                            <a href="events"
                                class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_events">Events</a>
                        </div>
                    </div>

                    <!-- Publication Dropdown -->
                    <div class="dropdown relative">
                        <button
                            class="nav-link px-4 py-2 font-medium text-sm transition-colors flex items-center gap-1 <?php echo $publications_active ? 'nav-current text-teal-600' : 'text-navy-900'; ?>">
                            <span data-translate="nav_publications">Publication</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div
                            class="dropdown-menu absolute top-full left-0 mt-2 w-56 bg-white rounded-lg shadow-xl py-2 border border-gray-100">
                            <a href="publication#policy"
                                class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_policy_papers">Policy papers</a>
                            <a href="publication#working"
                                class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_working_papers">Working papers</a>
                            <a href="publication#annual"
                                class="block px-4 py-2.5 text-navy-900 hover:bg-navy-50 text-sm font-medium"
                                data-translate="nav_annual_reports">Annual Reports</a>
                        </div>
                    </div>
                </nav>

                <!-- Right Section -->
                <div class="flex items-center gap-4">
                    <!-- Language Toggle -->
                    <div class="lang-toggle">
                        <button class="lang-btn <?php echo $lang === 'en' ? 'active' : ''; ?>"
                            data-lang="en">ENG</button>
                        <button class="lang-btn <?php echo $lang === 'so' ? 'active' : ''; ?>"
                            data-lang="so">SOM</button>
                    </div>

                    <!-- Mobile Menu Button -->
                    <button id="mobileMenuBtn"
                        class="lg:hidden p-2 text-navy-900 hover:bg-navy-50 rounded-lg transition-colors"
                        aria-label="Toggle mobile menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobileMenu"
            class="mobile-menu fixed top-20 right-0 bottom-0 w-80 max-w-full bg-white shadow-2xl lg:hidden overflow-y-auto">
            <nav class="p-6">
                <div class="space-y-1">
                    <a href="index" class="block px-4 py-3 text-navy-900 hover:bg-navy-50 rounded-lg font-medium"
                        data-translate="nav_home">Home</a>

                    <div class="mobile-dropdown">
                        <button
                            class="w-full px-4 py-3 text-navy-900 hover:bg-navy-50 rounded-lg font-medium flex items-center justify-between">
                            <span data-translate="nav_about">About Us</span>
                            <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="hidden pl-4 mt-1 space-y-1">
                            <a href="about" class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_history">History</a>
                            <a href="vision-mission" class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_vision_mission">Vision / Mission</a>
                            <a href="structure" class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_structure">Structure and governance</a>
                            <a href="contact" class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_contact">Contact Us</a>
                        </div>
                    </div>

                    <div class="mobile-dropdown">
                        <button
                            class="w-full px-4 py-3 text-navy-900 hover:bg-navy-50 rounded-lg font-medium flex items-center justify-between">
                            <span data-translate="nav_programs">Programs</span>
                            <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="hidden pl-4 mt-1 space-y-1">
                            <a href="capacity-building"
                                class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_training">Training and capacity building</a>
                            <a href="certification" class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_certification">Certification</a>
                            <a href="research" class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_research">Research and innovation</a>
                            <a href="policy" class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_policy">Policy & advisory</a>
                        </div>
                    </div>

                    <div class="mobile-dropdown">
                        <button
                            class="w-full px-4 py-3 text-navy-900 hover:bg-navy-50 rounded-lg font-medium flex items-center justify-between">
                            <span data-translate="nav_events_menu">Events</span>
                            <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="hidden pl-4 mt-1 space-y-1">
                            <a href="announcements" class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_announcements">Announcements</a>
                            <a href="media" class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_news_media">News and media</a>
                            <a href="events" class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_events">Events</a>
                        </div>
                    </div>

                    <div class="mobile-dropdown">
                        <button
                            class="w-full px-4 py-3 text-navy-900 hover:bg-navy-50 rounded-lg font-medium flex items-center justify-between">
                            <span data-translate="nav_publications">Publication</span>
                            <svg class="w-4 h-4 transition-transform" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="hidden pl-4 mt-1 space-y-1">
                            <a href="publication#policy"
                                class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_policy_papers">Policy papers</a>
                            <a href="publication#working"
                                class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_working_papers">Working papers</a>
                            <a href="publication#annual"
                                class="block px-4 py-2.5 text-navy-600 hover:text-navy-900 text-sm"
                                data-translate="nav_annual_reports">Annual Reports</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>