<div class="max-w-4xl mx-auto py-10">
    <div class="mb-8 flex items-center gap-4">
        <a href="<?php echo url('hero'); ?>"
            class="w-10 h-10 rounded-xl bg-white border border-gray-100 flex items-center justify-center text-gray-400 hover:text-navy-900 shadow-sm transition-all">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
        </a>
        <h1 class="text-2xl font-bold text-navy-900">Edit Hero Slide</h1>
    </div>

    <form action="<?php echo url('hero/update/' . $slide['id']); ?>" method="POST" enctype="multipart/form-data"
        class="space-y-6">
        <?php echo UI::card("Content Details", "
            <div class='grid grid-cols-1 gap-6'>
                " . UI::bilingualInput('title', 'Slide Title', ['en' => $slide['title_en'], 'so' => $slide['title_so']], true) . "
                " . UI::bilingualTextarea('subtitle', 'Slide Subtitle', ['en' => $slide['subtitle_en'], 'so' => $slide['subtitle_so']], false, 4, true) . "
                <div class='grid grid-cols-2 gap-6 items-end'>
                    <div class='flex gap-4 items-center'>
                        <img src='" . asset('uploads/' . $slide['bg_image']) . "' class='w-24 h-16 object-cover rounded-xl border border-gray-100 shadow-sm'>
                        <div class='flex-1 space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Change Image</label>
                            <input type='file' name='image' class='w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-all'>
                        </div>
                    </div>
                    " . UI::input('sort_order', 'Sort Order', 'number', $slide['sort_order']) . "
                </div>
            </div>
        "); ?>

        <?php echo UI::card("Call to Action", "
            <div class='grid grid-cols-1 gap-6'>
                " . UI::bilingualInput('cta_text', 'Button Label', ['en' => $slide['cta_text_en'], 'so' => $slide['cta_text_so']]) . "
                " . UI::input('cta_link', 'Button URL', 'text', $slide['cta_link'], 'e.g. /projects') . "
            </div>
        "); ?>

        <div class="flex items-center justify-end gap-3">
            <a href="<?php echo url('hero'); ?>"
                class="px-8 py-3 rounded-xl bg-white border border-gray-200 text-sm font-bold text-gray-500 hover:bg-gray-50 transition-all">Cancel</a>
            <button type="submit"
                class="px-8 py-3 rounded-xl bg-navy-900 text-white text-sm font-bold shadow-lg shadow-navy-900/20 hover:scale-[1.02] active:scale-95 transition-all">Update
                Slide</button>
        </div>
    </form>
</div>