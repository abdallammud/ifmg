<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Newsletter Subscribers</h1>
            <p class="text-gray-500 mt-1 font-medium">View and manage website newsletter signups.</p>
        </div>
        <a href="<?php echo url('newsletter/export'); ?>"
            class="px-6 py-3 rounded-xl bg-teal-500 text-white text-sm font-bold shadow-lg shadow-teal-500/20 hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
            Export CSV
        </a>
    </div>

    <?php echo UI::card("Subscriber List", UI::table(
        ['Email Address', 'Date Subscribed'],
        array_map(function ($s) {
                return [
                    "<div class='font-bold text-gray-900'>{$s['email']}</div>",
                    date('M d, Y H:i', strtotime($s['subscribed_at']))
                ];
            }, $subscribers)
    )); ?>
</div>