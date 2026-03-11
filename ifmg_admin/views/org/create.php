<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Add Structure Member</h1>
            <p class="text-gray-500 mt-1 font-medium">Create a new member in the organizational hierarchy.</p>
        </div>
    </div>

    <form action="<?php echo url('org/store'); ?>" method="POST" class="space-y-6">
        <?php echo UI::card("Member Content", "
            <div class='grid grid-cols-1 gap-6'>
                " . UI::bilingualInput('title', 'Member Title', [], true) . "
                <div class='grid grid-cols-2 gap-6'>
                    <div class='space-y-2'>
                        <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Hierarchy Level</label>
                        <select name='level' class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'>
                            <option value='board'>Board of Directors</option>
                            <option value='director'>Executive Director</option>
                            <option value='department'>Department / Unit</option>
                        </select>
                    </div>
                    " . UI::input('sort_order', 'Sort Order', 'number', '0') . "
                </div>
            </div>
        "); ?>

        <?php echo UI::card("Visual Styles (Icons/Colors)", "
            <div class='grid grid-cols-1 gap-6'>
                " . UI::textarea('icon_svg', 'Icon SVG (Tailwind compatible)', '', 'e.g. <svg>...</svg>') . "
                <div class='grid grid-cols-3 gap-6'>
                    " . UI::input('icon_color', 'Icon Color Class', 'text', 'teal-600', 'e.g. teal-600') . "
                    " . UI::input('bg_color', 'Background Color Class', 'text', 'teal-500/10', 'e.g. bg-teal-50') . "
                    " . UI::input('text_color', 'Text Color Class', 'text', 'white', 'e.g. white') . "
                </div>
            </div>
        "); ?>

        <div class="flex justify-end gap-3">
            <a href="<?php echo url('org'); ?>"
                class="px-6 py-3 rounded-xl bg-white text-navy-900 text-sm font-bold shadow-sm border border-gray-200 hover:bg-gray-50 transition-all">Cancel</a>
            <button type="submit"
                class="px-6 py-3 rounded-xl bg-gold-500 text-navy-900 text-sm font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all">Create
                Member</button>
        </div>
    </form>
</div>