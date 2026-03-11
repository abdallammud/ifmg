<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Inbox</h1>
            <p class="text-gray-500 mt-1 font-medium">Messages from the website contact form.</p>
        </div>
    </div>

    <?php echo UI::card("All Messages", UI::table(
        ['Sender', 'Subject', 'Date', 'Status', 'Actions'],
        array_map(function ($m) {
                $statusBadge = UI::badge($m['is_read'] ? 'Read' : 'New', $m['is_read'] ? 'info' : 'success');
                return [
                    "<div class='font-bold text-gray-900'>{$m['name']}</div><div class='text-[10px] text-gray-400'>{$m['email']}</div>",
                    "<div class='truncate max-w-xs'>{$m['subject']}</div>",
                    "<div>" . date('M d, Y', strtotime($m['created_at'])) . "</div>",
                    $statusBadge,
                    "<div class='flex gap-2'>
                    <a href='" . url('contacts/view/' . $m['id']) . "' class='p-2 rounded-lg bg-teal-50 text-teal-600 hover:bg-teal-500 hover:text-white transition-all'><svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M15 12a3 3 0 11-6 0 3 3 0 016 0z'></path><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z'></path></svg></a>
                    <a href='" . url('contacts/delete/' . $m['id']) . "' onclick='return confirm(\"Delete message?\")' class='p-2 rounded-lg bg-red-50 text-red-600 hover:bg-red-500 hover:text-white transition-all'><svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16'></path></svg></a>
                </div>"
                ];
            }, $messages)
    )); ?>
</div>