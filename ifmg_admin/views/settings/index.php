<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">System Settings</h1>
            <p class="text-gray-500 mt-1 font-medium">Manage global website configuration and contact info.</p>
        </div>
    </div>

    <form action="<?php echo url('settings/update'); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <?php echo UI::card("General Configuration", "
                    <div class='grid grid-cols-1 gap-6'>
                        " . UI::input('site_name', 'Site Short Name', 'text', $settings['site_name'] ?? '') . "
                        " . UI::input('site_full_name', 'Site Full Title', 'text', $settings['site_full_name'] ?? '') . "
                        " . UI::textarea('footer_copyright', 'Footer Copyright Text', $settings['footer_copyright'] ?? '', '', 2) . "
                    </div>
                "); ?>

                <?php echo UI::card("Contact Information", "
                    <div class='grid grid-cols-1 md:grid-cols-2 gap-6'>
                        " . UI::input('site_email', 'Official Email', 'email', $settings['site_email'] ?? '') . "
                        " . UI::input('site_phone', 'Official Phone', 'text', $settings['site_phone'] ?? '') . "
                        <div class='md:col-span-2'>
                            " . UI::input('site_location', 'Office Location', 'text', $settings['site_location'] ?? '') . "
                        </div>
                    </div>
                "); ?>

                <?php echo UI::card("Social Media Links", "
                    <div class='grid grid-cols-1 md:grid-cols-2 gap-6'>
                        " . UI::input('social_twitter', 'X (Twitter) URL', 'text', $settings['social_twitter'] ?? '') . "
                        " . UI::input('social_facebook', 'Facebook URL', 'text', $settings['social_facebook'] ?? '') . "
                        " . UI::input('social_linkedin', 'LinkedIn URL', 'text', $settings['social_linkedin'] ?? '') . "
                    </div>
                "); ?>
            </div>

            <div class="space-y-6">
                <?php echo UI::card("Brand Identity", "
                    <div class='space-y-6'>
                        <div class='space-y-2'>
                            <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Site Logo</label>
                            <div class='p-4 bg-navy-900 rounded-2xl flex items-center justify-center mb-4'>
                                <img src='" . asset($settings['site_logo'] ?? 'assets/images/logo.png') . "' class='h-12 object-contain'>
                            </div>
                            <input type='file' name='site_logo' class='w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 transition-all'>
                        </div>
                    </div>
                "); ?>

                <div class="pt-4">
                    <button type="submit"
                        class="w-full px-6 py-4 rounded-xl bg-gold-500 text-navy-900 font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        Save Global Settings
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>