<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Events</h1>
            <p class="text-gray-500 mt-1 font-medium">Manage workshops, conferences, and seminars.</p>
        </div>
        <a href="<?php echo url('events/create'); ?>"
            class="px-6 py-3 rounded-xl bg-gold-500 text-navy-900 text-sm font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Add Event
        </a>
    </div>

    <?php echo UI::card("Upcoming & Past Events", UI::table(
        ['Event', 'Date', 'Type', 'Location', 'Actions'],
        array_map(function ($e) {
                return [
                    "<div class='font-bold text-gray-900'>{$e['title_en']}</div><div class='text-[10px] text-gray-400'>{$e['title_so']}</div>",
                    "<div>" . date('M d, Y', strtotime($e['event_date'])) . "</div><div class='text-[10px] text-gray-400'>" . ($e['start_time'] ?? '') . "</div>",
                    "<span class='text-xs font-medium text-gray-600 capitalize'>{$e['event_type']}</span>",
                    "<div class='text-xs text-gray-600'>{$e['location_en']}</div>",
                    "<div class='flex gap-2'>
                    <a href='" . url('events/edit/' . $e['id']) . "' class='p-2 rounded-lg bg-teal-50 text-teal-600 hover:bg-teal-500 hover:text-white transition-all'><svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z'></path></svg></a>
                    <a href='" . url('events/delete/' . $e['id']) . "' onclick='return confirm(\"Are you sure?\")' class='p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-500 hover:text-white transition-all'><svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path></svg></a>
                </div>"
                ];
            }, $events)
    )); ?>
</div>