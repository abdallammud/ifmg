<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Add Publication</h1>
            <p class="text-gray-500 mt-1 font-medium">Create a new publication entry with PDF document.</p>
        </div>
    </div>

    <form action="<?php echo url('publications/store'); ?>" method="POST" enctype="multipart/form-data"
        class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <?php echo UI::card("Content Details", "
                    <div class='grid grid-cols-1 gap-6'>
                        " . UI::bilingualInput('title', 'Publication Title', [], true) . "
                        " . UI::bilingualTextarea('description', 'Short Description', [], false, 4, true) . "
                        <div class='grid grid-cols-2 gap-6'>
                            <div class='space-y-2'>
                                <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Category</label>
                                <select name='category' required class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'>
                                    <option value='policy_paper'>Policy Paper</option>
                                    <option value='working_paper'>Working Paper</option>
                                    <option value='annual_report'>Annual Report</option>
                                </select>
                            </div>
                            " . UI::input('published_date', 'Published Date', 'date', date('Y-m-d'), '', true) . "
                        </div>
                    </div>
                "); ?>
            </div>

            <div class="space-y-6">
                <?php echo UI::card("Files & Settings", "
                    <div class='grid grid-cols-1 gap-6'>
                        <div class='space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest text-teal-600'>PDF Document (Required)</label>
                            <input type='file' name='pdf_file' required accept='.pdf' class='w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-all'>
                        </div>
                        <div class='space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Cover Image</label>
                            <input type='file' name='cover_image' accept='image/*' class='w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 transition-all'>
                        </div>
                        " . UI::input('sort_order', 'Sort Order', 'number', '0') . "
                        <div class='flex items-center gap-3 p-4 bg-gold-50/50 rounded-xl border border-gold-100'>
                            <input type='checkbox' name='is_featured' value='1' class='w-5 h-5 rounded border-gray-300 text-gold-500 focus:ring-gold-500'>
                            <label class='text-sm font-bold text-navy-900'>Feature on Homepage</label>
                        </div>
                    </div>
                "); ?>

                <div class="flex flex-col gap-3 pt-4">
                    <button type="submit"
                        class="w-full px-6 py-4 rounded-xl bg-gold-500 text-navy-900 font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        Save Publication
                    </button>
                    <a href="<?php echo url('publications'); ?>"
                        class="w-full px-6 py-4 rounded-xl bg-white text-gray-500 text-center font-bold border border-gray-200 hover:bg-gray-50 transition-all">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>