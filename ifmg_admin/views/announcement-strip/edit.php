<div class="max-w-4xl mx-auto py-10">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-navy-900">Announcement Strip</h1>
        <p class="text-gray-500 mt-1 font-medium">This banner appears at the very top of the website.</p>
    </div>

    <form action="<?php echo url('announcement-strip/update'); ?>" method="POST" class="space-y-6">
        <?php echo UI::card("Announcement Content", "
            <div class='grid grid-cols-1 gap-6'>
                <div class='flex items-center gap-3 mb-4'>
                    <input type='checkbox' name='is_active' value='1' " . ($data['is_active'] ? 'checked' : '') . " class='w-5 h-5 text-teal-600 rounded-lg focus:ring-teal-500 border-gray-100'>
                    <label class='text-sm font-bold text-navy-900'>Enable Announcement Strip</label>
                </div>
                " . UI::bilingualInput('text', 'Banner Text', ['en' => $data['text_en'], 'so' => $data['text_so']], true) . "
                <div class='grid grid-cols-2 gap-6'>
                    " . UI::bilingualInput('btn_text', 'Link Text', ['en' => $data['btn_text_en'], 'so' => $data['btn_text_so']]) . "
                    " . UI::input('link', 'Link URL', 'text', $data['link'], 'e.g. /news/1') . "
                </div>
            </div>
        "); ?>

        <div class="flex items-center justify-end gap-3">
            <button type="submit"
                class="px-8 py-3 rounded-xl bg-navy-900 text-white text-sm font-bold shadow-lg shadow-navy-900/20 hover:scale-[1.02] active:scale-95 transition-all">Save
                Changes</button>
        </div>
    </form>
</div>