<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Translation Manager</h1>
            <p class="text-gray-500 mt-1 font-medium">Manage localized strings used across the website UI.</p>
        </div>
        <a href="<?php echo url('translations/export'); ?>"
            class="px-6 py-3 rounded-xl bg-teal-500 text-white text-sm font-bold shadow-lg shadow-teal-500/20 hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
            Export to JSON
        </a>
    </div>

    <?php echo UI::card("Interface Strings", "
        <div class='space-y-4'>
            <div class='grid grid-cols-12 gap-4 px-4 py-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100'>
                <div class='col-span-3'>Translation Key</div>
                <div class='col-span-4'>English (EN)</div>
                <div class='col-span-4'>Somali (SO)</div>
                <div class='col-span-1 text-right'>Action</div>
            </div>
            
            <div class='divide-y divide-gray-50' id='trans-list'>
                " . (empty($translations) ? "<div class='p-8 text-center text-gray-400'>No translation keys found. Use the form below to add one.</div>" : "") . "
                
                <?php foreach ($translations as $key => $langs): ?>
                    <form action='" . url('translations/update') . "' method='POST' class='grid grid-cols-12 gap-4 items-center p-4 hover:bg-gray-50/50 transition-all rounded-xl'>
                        <input type='hidden' name='key' value='" . e($key) . "'>
                        <div class='col-span-3 font-mono text-xs text-navy-600 bg-navy-50 px-2 py-1 rounded w-fit'>" . e($key) . "</div>
                        <div class='col-span-4'>
                            <input type='text' name='en' value='" . e($langs['en']) . "' class='w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-teal-500 outline-none'>
                        </div>
                        <div class='col-span-4'>
                            <input type='text' name='so' value='" . e($langs['so']) . "' class='w-full px-3 py-2 text-sm rounded-lg border border-gray-200 focus:border-teal-500 outline-none'>
                        </div>
                        <div class='col-span-1 text-right'>
                            <button type='submit' class='p-2 rounded-lg bg-gold-50 text-gold-600 hover:bg-gold-500 hover:text-navy-900 transition-all'>
                                <svg class='w-4 h-4' fill='none' stroke='currentColor' viewBox='0 0 24 24'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 13l4 4L19 7'></path></svg>
                            </button>
                        </div>
                    </form>
                <?php endforeach; ?>
            </div>
            
            <!-- Add New Key -->
            <div class='mt-8 pt-6 border-t border-gray-100'>
                <h4 class='text-sm font-bold text-navy-900 mb-4 italic'>Add New Translation Key</h4>
                <form action='" . url('translations/update') . "' method='POST' class='grid grid-cols-12 gap-4 items-center bg-gray-50 p-6 rounded-2xl'>
                    <div class='col-span-3'>
                        <input type='text' name='key' placeholder='key.name' required class='w-full px-4 py-2 text-sm rounded-xl border border-gray-200 focus:border-teal-500 outline-none'>
                    </div>
                    <div class='col-span-4'>
                        <input type='text' name='en' placeholder='English value' required class='w-full px-4 py-2 text-sm rounded-xl border border-gray-200 focus:border-teal-500 outline-none'>
                    </div>
                    <div class='col-span-4'>
                        <input type='text' name='so' placeholder='Somali value' class='w-full px-4 py-2 text-sm rounded-xl border border-gray-200 focus:border-teal-500 outline-none'>
                    </div>
                    <div class='col-span-1 text-right'>
                        <button type='submit' class='w-full py-2 rounded-xl bg-gold-500 text-navy-900 font-bold text-xs shadow hover:scale-105 transition-all'>
                            Add
                        </button>
                    </div>
                </form>
            </div>
        </div>
    "); ?>
</div>