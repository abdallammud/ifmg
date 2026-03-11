<div class="max-w-4xl mx-auto py-10">
    <div class="mb-8">
        <h1 class="text-2xl font-bold text-navy-900">Director's Message</h1>
        <p class="text-gray-500 mt-1 font-medium">Manage the Director's section on the home page.</p>
    </div>

    <form action="<?php echo url('director-message/update'); ?>" method="POST" enctype="multipart/form-data"
        class="space-y-6">
        <?php echo UI::card("Director Info", "
            <div class='grid grid-cols-1 gap-6'>
                <div class='grid grid-cols-2 gap-6 items-end'>
                    <div class='flex gap-4 items-center'>
                        <img src='" . asset('uploads/' . $data['photo']) . "' class='w-20 h-20 object-cover rounded-2xl border border-gray-100 shadow-sm'>
                        <div class='flex-1 space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Change Photo</label>
                            <input type='file' name='image' class='w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-teal-50 file:text-teal-700 hover:file:bg-teal-100 transition-all'>
                        </div>
                    </div>
                </div>
                " . UI::bilingualInput('name', 'Director Name', ['en' => $data['name_en'], 'so' => $data['name_so']], true) . "
                " . UI::bilingualInput('title', 'Director Title', ['en' => $data['title_en'], 'so' => $data['title_so']], true) . "
            </div>
        "); ?>

        <?php echo UI::card("Message Content", "
            <div class='grid grid-cols-1 gap-6'>
                " . UI::bilingualInput('quote', 'Short Quote (Banner)', ['en' => $data['quote_en'], 'so' => $data['quote_so']]) . "
                " . UI::bilingualTextarea('message', 'Full Message', ['en' => $data['message_en'], 'so' => $data['message_so']], true, 4, true) . "
            </div>
        "); ?>

        <div class="flex items-center justify-end gap-3">
            <button type="submit"
                class="px-8 py-3 rounded-xl bg-navy-900 text-white text-sm font-bold shadow-lg shadow-navy-900/20 hover:scale-[1.02] active:scale-95 transition-all">Save
                Changes</button>
        </div>
    </form>
</div>