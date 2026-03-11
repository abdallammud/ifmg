<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Activity Log</h1>
            <p class="text-gray-500 mt-1 font-medium">Audit trail of all administrative actions.</p>
        </div>
    </div>

    <?php echo UI::card("Recent Actions", UI::table(
        ['User', 'Action', 'Entity', 'Description', 'Date'],
        array_map(function ($l) {
                return [
                    "<div class='font-bold text-navy-900'>" . e($l['user_name'] ?? 'System') . "</div><div class='text-[9px] text-gray-400 font-mono'>{$l['ip_address']}</div>",
                    UI::badge($l['action'], 'info'),
                    "<div class='text-xs font-medium text-gray-600'>" . e($l['entity_type']) . " #" . e($l['entity_id']) . "</div>",
                    "<div class='text-xs text-gray-500'>" . e($l['description']) . "</div>",
                    "<div class='text-[10px] font-bold text-gray-400 uppercase'>" . date('M d, H:i', strtotime($l['created_at'])) . "</div>"
                ];
            }, $logs)
    )); ?>
</div>