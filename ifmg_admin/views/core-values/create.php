<div class="max-w-4xl mx-auto py-10">
    <div class="mb-8 flex items-center gap-4">
        <a href="<?php echo url('core-values'); ?>"
            class="w-10 h-10 rounded-xl bg-white border border-gray-100 flex items-center justify-center text-gray-400 hover:text-navy-900 shadow-sm transition-all text-sm font-bold">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-navy-900">Add New Core Value</h1>
    </div>

    <form action="<?php echo url('core-values/store'); ?>" method="POST" class="space-y-6">
        <?php echo UI::card("Core Value Details", "
            <div class='grid grid-cols-1 gap-6'>
                " . UI::bilingualInput('title', 'Value Title', [], true) . "
                " . UI::bilingualTextarea('description', 'Description', [], false, 4) . "
                " . UI::input('sort_order', 'Sort Order', 'number', '0') . "
            </div>
        "); ?>

        <div class="flex items-center justify-end gap-3">
            <a href="<?php echo url('core-values'); ?>"
                class="px-8 py-3 rounded-xl bg-white border border-gray-200 text-sm font-bold text-gray-500 hover:bg-gray-50 transition-all">Cancel</a>
            <button type="submit"
                class="px-8 py-3 rounded-xl bg-navy-900 text-white text-sm font-bold shadow-lg shadow-navy-900/20 hover:scale-[1.02] active:scale-95 transition-all">Save
                Core Value</button>
        </div>
    </form>
</div>