<header class="bg-white border-b border-gray-100 h-20 px-10 flex items-center justify-between sticky top-0 z-20">
    <div class="flex items-center gap-8">
        <h3 class="font-bold text-gray-900"><?php echo e($page_title ?? 'Dashboard'); ?></h3>

        <!-- Dummy Search -->
        <div class="hidden md:flex items-center relative">
            <svg class="w-4 h-4 absolute left-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
            </svg>
            <input type="text" placeholder="Search anything..."
                class="bg-gray-50 border-none rounded-xl pl-10 pr-4 py-2 text-sm w-64 focus:ring-2 focus:ring-teal-500/20 transition-all">
        </div>
    </div>

    <div class="flex items-center gap-6">
        <!-- System Notifications (Dummy) -->
        <button
            class="relative w-10 h-10 rounded-xl bg-gray-50 flex items-center justify-center text-gray-400 hover:bg-gray-100 transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                </path>
            </svg>
            <span class="absolute top-2.5 right-2.5 w-2 h-2 bg-gold-500 rounded-full border-2 border-white"></span>
        </button>

        <div class="h-8 w-[1px] bg-gray-100"></div>

        <div class="relative">
            <div class="flex items-center gap-4 cursor-pointer group profile-trigger">
                <div class="text-right hidden sm:block text-left">
                    <p class="text-[13px] font-bold text-gray-900 group-hover:text-teal-600 transition-colors"><?php echo e(Auth::user()['username']); ?></p>
                    <p class="text-[10px] text-gray-400 uppercase tracking-widest font-semibold"><?php echo e(Auth::user()['role']); ?></p>
                </div>
                <div class="w-10 h-10 rounded-xl bg-navy-900 flex items-center justify-center text-white ring-4 ring-gray-50 group-hover:ring-teal-50 group-hover:bg-teal-600 transition-all">
                    <span class="text-xs font-bold uppercase"><?php echo substr(Auth::user()['username'], 0, 1); ?></span>
                </div>
            </div>

            <!-- Profile Dropdown -->
            <div id="profileDropdown" class="hidden absolute right-0 mt-3 w-48 bg-white rounded-2xl shadow-2xl border border-gray-100 py-2 z-50">
                <a href="<?php echo url('profile'); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50 hover:text-teal-600 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    My Profile
                </a>
                <a href="<?php echo url('settings'); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm text-gray-600 hover:bg-gray-50 hover:text-teal-600 transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path></svg>
                    Settings
                </a>
                <div class="h-[1px] bg-gray-50 my-2"></div>
                <a href="<?php echo url('logout'); ?>" class="flex items-center gap-3 px-4 py-2.5 text-sm text-red-500 hover:bg-red-50 transition-all font-bold">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path></svg>
                    Sign Out
                </a>
            </div>
        </div>
    </div>
</header>