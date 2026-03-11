<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">News & Media</h1>
            <p class="text-gray-500 mt-1 font-medium">Manage news articles, press releases, and media updates.</p>
        </div>
        <a href="<?php echo url('media/create'); ?>"
            class="px-6 py-3 rounded-xl bg-gold-500 text-navy-900 text-sm font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Article
        </a>
    </div>

    <?php echo UI::card("Media Articles", UI::table(
        ['Article', 'Date', 'Featured', 'Status', 'Actions'],
        array_map(function ($a) {
                $featuredBadge = $a['is_featured'] ? UI::badge('Featured', 'warning') : '-';
                $statusBadge = UI::badge($a['is_active'] ? 'Active' : 'Draft', $a['is_active'] ? 'success' : 'info');
                return [
                    "<div class='font-bold text-gray-900'>{$a['title_en']}</div><div class='text-[10px] text-gray-400'>{$a['title_so']}</div>",
                    "<div>" . date('M d, Y', strtotime($a['published_date'])) . "</div>",
                    $featuredBadge,
                    $statusBadge,
                    "<div class='flex gap-2'>
                    <a href='" . url('media/edit/' . $a['id']) . "' class='p-2 rounded-lg bg-teal-50 text-teal-600 hover:bg-teal-500 hover:text-white transition-all'><svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'></path></svg></a>
                    <a href='" . url('media/delete/' . $a['id']) . "' onclick='return confirm(\"Are you sure?\")' class='p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-500 hover:text-white transition-all'><svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path></svg></a>
                </div>"
                ];
            }, $articles)
    )); ?>
</div>