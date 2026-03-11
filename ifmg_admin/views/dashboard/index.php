<div class="flex flex-col gap-10">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Welcome, <?php echo e($user['username']); ?>!
            </h1>
            <p class="text-gray-500 mt-1 font-medium">Here's your overview for the IFMG portal.</p>
        </div>
        <div class="flex gap-3">
            <button
                class="px-6 py-3 rounded-xl bg-white border border-gray-200 text-sm font-bold shadow-sm hover:bg-gray-50 transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                Export Report
            </button>
            <button
                class="px-6 py-3 rounded-xl bg-gold-500 text-navy-900 text-sm font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                New Entry
            </button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php
        $stats = [
            ['title' => 'Publications', 'value' => '24', 'icon' => 'book', 'trend' => '+2 this week', 'color' => 'teal'],
            ['title' => 'Upcoming Events', 'value' => '03', 'icon' => 'calendar', 'trend' => 'Next: Mar 15', 'color' => 'gold'],
            ['title' => 'Announcements', 'value' => '12', 'icon' => 'speakerphone', 'trend' => '4 active', 'color' => 'navy'],
            ['title' => 'Subscribers', 'value' => '1.2k', 'icon' => 'users', 'trend' => '+48 new', 'color' => 'teal'],
        ];

        foreach ($stats as $s):
            ?>
            <div class="bg-white p-6 rounded-2xl border border-gray-100 shadow-sm admin-card">
                <div class="flex items-center justify-between mb-4">
                    <div
                        class="w-12 h-12 rounded-xl bg-<?php echo $s['color']; ?>-500/10 flex items-center justify-center text-<?php echo $s['color']; ?>-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    </div>
                    <?php echo UI::badge($s['trend'], $s['color'] == 'navy' ? 'info' : ($s['color'] == 'gold' ? 'warning' : 'info')); ?>
                </div>
                <h3 class="text-gray-400 text-xs font-bold uppercase tracking-widest"><?php echo $s['title']; ?></h3>
                <p class="text-3xl font-black mt-1 text-navy-900"><?php echo $s['value']; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Data Sections -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <?php echo UI::card("Recent Publications", UI::table(
            ['Title', 'Category', 'Status', 'Date'],
            [
                ['Fiscal Policy 2026', 'Policy Paper', UI::badge('Published', 'success'), '2026-03-05'],
                ['Quarterly Report Q1', 'Annual Report', UI::badge('Review', 'warning'), '2026-03-01'],
                ['Governance Ethics', 'Working Paper', UI::badge('Draft', 'info'), '2026-02-28'],
            ]
        ), "<a href='#' class='text-teal-600 text-xs font-bold hover:underline'>View All</a>"); ?>

        <?php echo UI::card("System Activity", UI::table(
            ['User', 'Action', 'Time'],
            [
                ['<b>Admin</b>', 'Updated Hero Slide #1', '2 mins ago'],
                ['<b>Editor</b>', 'Created Publication', '45 mins ago'],
                ['<b>Admin</b>', 'User Login', '2 hours ago'],
            ]
        ), "<a href='#' class='text-teal-600 text-xs font-bold hover:underline'>View Log</a>"); ?>
    </div>
</div>