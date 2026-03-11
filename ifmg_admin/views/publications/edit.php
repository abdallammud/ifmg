<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Edit Publication</h1>
            <p class="text-gray-500 mt-1 font-medium">Update publication details and files.</p>
        </div>
    </div>

    <form action="<?php echo url('publications/update/' . $publication['id']); ?>" method="POST"
        enctype="multipart/form-data" class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <?php echo UI::card("Content Details", "
                    <div class='grid grid-cols-1 gap-6'>
                        " . UI::bilingualInput('title', 'Publication Title', ['en' => $publication['title_en'], 'so' => $publication['title_so']], true) . "
                        " . UI::bilingualTextarea('description', 'Short Description', ['en' => $publication['description_en'], 'so' => $publication['description_so']], false, 4, true) . "
                        <div class='grid grid-cols-2 gap-6'>
                            <div class='space-y-2'>
                                <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Category</label>
                                <select name='category' required class='w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-teal-500 focus:ring-4 focus:ring-teal-500/10 outline-none transition-all'>
                                    <option value='policy_paper' " . ($publication['category'] == 'policy_paper' ? 'selected' : '') . ">Policy Paper</option>
                                    <option value='working_paper' " . ($publication['category'] == 'working_paper' ? 'selected' : '') . ">Working Paper</option>
                                    <option value='annual_report' " . ($publication['category'] == 'annual_report' ? 'selected' : '') . ">Annual Report</option>
                                </select>
                            </div>
                            " . UI::input('published_date', 'Published Date', 'date', $publication['published_date'], '', true) . "
                        </div>
                    </div>
                "); ?>
            </div>

            <div class="space-y-6">
                <?php echo UI::card("Files & Settings", "
                    <div class='grid grid-cols-1 gap-6'>
                        <div class='space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest text-teal-600'>PDF Document</label>
                            <div class='flex items-center gap-2 mb-2 p-3 bg-teal-50 rounded-lg border border-teal-100'>
                                <svg class='w-5 h-5 text-teal-600' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path d='M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z'></path></svg>
                                <span class='text-xs font-bold text-teal-700 truncate'>Current File Attached</span>
                            </div>
                            <input type='file' name='pdf_file' accept='.pdf' class='w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-all'>
                        </div>
                        <div class='space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Cover Image</label>
                            " . ($publication['cover_image'] ? "<img src='" . asset('uploads/' . $publication['cover_image']) . "' class='w-20 h-28 object-cover rounded-lg mb-3 shadow-md border'>" : "") . "
                            <input type='file' name='cover_image' accept='image/*' class='w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 transition-all'>
                        </div>
                        " . UI::input('sort_order', 'Sort Order', 'number', $publication['sort_order']) . "
                        <div class='flex items-center gap-3 p-4 bg-gold-50/50 rounded-xl border border-gold-100'>
                            <input type='checkbox' name='is_featured' value='1' " . ($publication['is_featured'] ? 'checked' : '') . " class='w-5 h-5 rounded border-gray-300 text-gold-500 focus:ring-gold-500'>
                            <label class='text-sm font-bold text-navy-900'>Feature on Homepage</label>
                        </div>
                    </div>
                "); ?>

                <div class="flex flex-col gap-3 pt-4">
                    <button type="submit"
                        class="w-full px-6 py-4 rounded-xl bg-gold-500 text-navy-900 font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        Update Publication
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