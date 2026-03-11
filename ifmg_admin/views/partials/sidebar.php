<aside class="w-72 bg-navy-900 text-white flex flex-col transition-all duration-300">
    <!-- Logo Section -->
    <div class="p-8 mb-4">
        <div class="flex items-center gap-3">
            <div
                class="w-10 h-10 bg-gold-500 rounded-lg flex items-center justify-center transform rotate-3 shadow-lg shadow-gold-500/20">
                <span class="text-navy-900 font-bold text-xl">I</span>
            </div>
            <div>
                <h2 class="text-xl font-bold tracking-tight">IFMG <span class="text-gold-500">CMS</span></h2>
                <p class="text-[10px] text-teal-500 font-semibold tracking-widest uppercase opacity-70">Admin Panel</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-4 space-y-1.5 overflow-y-auto custom-scrollbar">
        <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-4">Main Menu</p>

        <a href="<?php echo url('dashboard'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'dashboard') !== false || ($_GET['url'] ?? '') == '' ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 0 001-1v-4a1 0 011-1h2a1 0 011 1v4a1 0 001 1m-6 0h6">
                </path>
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>

        <!-- Home Content Group -->
        <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-8">Home Management</p>

        <a href="<?php echo url('hero'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'hero') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            <span class="font-medium text-sm">Hero Slides</span>
        </a>

        <a href="<?php echo url('announcement-strip'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'announcement-strip') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 5.882V19.297A2.453 2.453 0 019.28 17.62l-1.2-1.2h0a2.453 2.453 0 01-.432-2.735L11 5.882zM11 5.882L13.152 4.16a2.453 2.453 0 013.352 0l4.352 3.48a2.453 2.453 0 010 3.352L11 19.297">
                </path>
            </svg>
            <span class="font-medium text-sm">Announcement Strip</span>
        </a>

        <a href="<?php echo url('director-message'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'director-message') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z">
                </path>
            </svg>
            <span class="font-medium text-sm">Director Message</span>
        </a>

        <a href="<?php echo url('partners'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'partners') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <span class="font-medium text-sm">Partners</span>
        </a>

        <a href="<?php echo url('newsletter'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'newsletter') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
            <span class="font-medium text-sm">Newsletter</span>
        </a>

        <!-- Programs & Services Group -->
        <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-8">Programs & Services</p>

        <a href="<?php echo url('programs'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'programs') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                </path>
            </svg>
            <span class="font-medium text-sm">Workstreams</span>
        </a>

        <!-- Resource Hub Group -->
        <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-8">Resource Hub</p>

        <a href="<?php echo url('publications'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'publications') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                </path>
            </svg>
            <span class="font-medium text-sm">Publications</span>
        </a>

        <a href="<?php echo url('events'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'events') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                </path>
            </svg>
            <span class="font-medium text-sm">Events</span>
        </a>

        <a href="<?php echo url('announcements'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'announcements') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                </path>
            </svg>
            <span class="font-medium text-sm">Public notices</span>
        </a>

        <a href="<?php echo url('media'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'media') !== false && strpos($_GET['url'] ?? '', 'library') === false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10l4 4v10a2 2 0 01-2 2z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 2v6h6"></path>
            </svg>
            <span class="font-medium text-sm">News Center</span>
        </a>

        <!-- About Us Group -->
        <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-8">About IFMG</p>

        <a href="<?php echo url('about/history'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'about/history') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium text-sm">Our History</span>
        </a>

        <a href="<?php echo url('about/vision-mission'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'about/vision-mission') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                </path>
            </svg>
            <span class="font-medium text-sm">Vision & Mission</span>
        </a>

        <a href="<?php echo url('core-values'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'core-values') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium text-sm">Core Values</span>
        </a>
        <a href="<?php echo url('org'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'org') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                </path>
            </svg>
            <span class="font-medium text-sm">Org Structure</span>
        </a>

        <!-- System Group -->
        <p class="px-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 mt-8">System</p>

        <a href="<?php echo url('settings'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'settings') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                </path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
            </svg>
            <span class="font-medium text-sm">Settings</span>
        </a>

        <a href="<?php echo url('contacts'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'contacts') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                </path>
            </svg>
            <span class="font-medium text-sm">Inbox</span>
        </a>

        <a href="<?php echo url('users'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'users') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                </path>
            </svg>
            <span class="font-medium text-sm">Admins</span>
        </a>

        <a href="<?php echo url('activity'); ?>"
            class="sidebar-link flex items-center gap-3 px-4 py-3 rounded-xl <?php echo strpos($_GET['url'] ?? '', 'activity') !== false ? 'active bg-teal-500 text-white shadow-lg shadow-teal-500/20' : 'text-gray-400 hover:text-white'; ?>">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span class="font-medium text-sm">Logs</span>
        </a>
    </nav>

    <!-- User Section -->
    <div class="p-6 mt-auto border-t border-white/5">
        <div class="flex items-center gap-3 mb-4">
            <div
                class="w-10 h-10 rounded-xl bg-teal-500/10 border border-teal-500/20 flex items-center justify-center text-teal-500 font-bold uppercase">
                <?php echo substr(Auth::user()['username'], 0, 1); ?>
            </div>
            <div class="overflow-hidden">
                <p class="text-xs font-bold truncate"><?php echo e(Auth::user()['username']); ?></p>
                <p class="text-[10px] text-gray-400 capitalize"><?php echo e(Auth::user()['role']); ?></p>
            </div>
        </div>
        <a href="<?php echo url('logout'); ?>"
            class="flex items-center justify-center gap-2 w-full py-2.5 rounded-lg bg-red-500/10 text-red-400 hover:bg-red-500 hover:text-white text-[11px] font-bold transition-all uppercase tracking-wider">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                </path>
            </svg>
            Sign Out
        </a>
    </div>
</aside>