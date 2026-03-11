<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Add Announcement</h1>
            <p class="text-gray-500 mt-1 font-medium">Create a new public notice or announcement.</p>
        </div>
    </div>

    <form action="<?php echo url('announcements/store'); ?>" method="POST" enctype="multipart/form-data"
        class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <?php echo UI::card("Announcement Content", "
                    <div class='grid grid-cols-1 gap-6'>
                        " . UI::bilingualInput('title', 'Title', [], true) . "
                        " . UI::bilingualTextarea('description', 'Description', [], true, 6, true) . "
                    </div>
                "); ?>

                <?php echo UI::card("Call to Action (Optional)", "
                    <div class='grid grid-cols-1 md:grid-cols-2 gap-6'>
                        " . UI::bilingualInput('action_label', 'Button Label') . "
                        " . UI::input('action_link', 'Button Link', 'text', '', 'e.g. https://... or internal path') . "
                    </div>
                "); ?>
            </div>

            <div class="space-y-6">
                <?php echo UI::card("Settings", "
                    <div class='grid grid-cols-1 gap-6'>
                        " . UI::input('published_date', 'Publication Date', 'date', date('Y-m-d'), '', true) . "
                        <div class='space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Status</label>
                            <select name='status' class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'>
                                <option value='open'>Open</option>
                                <option value='closed'>Closed</option>
                                <option value='archived'>Archived</option>
                            </select>
                        </div>
                        <div class='space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Border Color</label>
                            <select name='border_color' class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'>
                                <option value='gold-500'>Gold (Default)</option>
                                <option value='teal-500'>Teal</option>
                                <option value='navy-900'>Navy</option>
                                <option value='red-500'>Red</option>
                            </select>
                        </div>
                        " . UI::input('sort_order', 'Sort Order', 'number', '0') . "
                    </div>
                "); ?>

                <?php echo UI::card("Attachment", "
                    <div class='space-y-2'>
                        <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Document (PDF/Image)</label>
                        <input type='file' name='attachment' class='w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 transition-all'>
                    </div>
                "); ?>

                <div class="flex flex-col gap-3 pt-4">
                    <button type="submit"
                        class="w-full px-6 py-4 rounded-xl bg-gold-500 text-navy-900 font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        Create Announcement
                    </button>
                    <a href="<?php echo url('announcements'); ?>"
                        class="w-full px-6 py-4 rounded-xl bg-white text-gray-500 text-center font-bold border border-gray-200 hover:bg-gray-50 transition-all">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>