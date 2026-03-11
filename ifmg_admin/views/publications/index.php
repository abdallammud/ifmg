<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Publications</h1>
            <p class="text-gray-500 mt-1 font-medium">Manage research papers, annual reports, and policy documents.</p>
        </div>
        <a href="<?php echo url('publications/create'); ?>"
            class="px-6 py-3 rounded-xl bg-gold-500 text-navy-900 text-sm font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Publication
        </a>
    </div>

    <?php echo UI::card("Active Publications", UI::table(
        ['Cover', 'Title (EN)', 'Category', 'Date', 'Actions'],
        array_map(function ($p) {
                $categories = [
                    'policy_paper' => 'Policy Paper',
                    'working_paper' => 'Working Paper',
                    'annual_report' => 'Annual Report'
                ];
                $cover = $p['cover_image'] ? "<img src='" . asset('uploads/' . $p['cover_image']) . "' class='w-12 h-16 object-cover rounded shadow-sm'>" : "<div class='w-12 h-16 bg-gray-100 rounded flex items-center justify-center'><svg class='w-6 h-6 text-gray-300' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path d='M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z'></path></svg></div>";

                return [
                    $cover,
                    "<div class='font-bold text-gray-900'>{$p['title_en']}</div><div class='text-[10px] text-gray-400'>{$p['title_so']}</div>",
                    "<span class='text-xs font-medium text-gray-600 capitalize'>" . str_replace('_', ' ', $p['category']) . "</span>",
                    date('M d, Y', strtotime($p['published_date'])),
                    "<div class='flex gap-2'>
                    <a href='" . url('publications/edit/' . $p['id']) . "' class='p-2 rounded-lg bg-teal-50 text-teal-600 hover:bg-teal-500 hover:text-white transition-all'><svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'></path></svg></a>
                    <a href='" . url('publications/delete/' . $p['id']) . "' onclick='return confirm(\"Are you sure?\")' class='p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-500 hover:text-white transition-all'><svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path></svg></a>
                </div>"
                ];
            }, $publications)
    )); ?>
</div>