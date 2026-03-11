<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">
                <?php echo $page_title; ?>
            </h1>
            <p class="text-gray-500 mt-1 font-medium">Update the content for this section of the website.</p>
        </div>
        <div class="flex gap-3">
            <a href="<?php echo url('dashboard'); ?>"
                class="px-6 py-3 rounded-xl bg-white text-navy-900 text-sm font-bold shadow-sm border border-gray-200 hover:bg-gray-50 transition-all">
                Cancel
            </a>
            <button type="submit" form="about-form"
                class="px-6 py-3 rounded-xl bg-gold-500 text-navy-900 text-sm font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                Save Changes
            </button>
        </div>
    </div>

    <form id="about-form" action="<?php echo url('about/update/' . $slug); ?>" method="POST" class="space-y-6">
        <?php echo UI::card("Page Content", "
            <div class='grid grid-cols-1 gap-6'>
                " . UI::bilingualInput('title', 'Page Title', ['en' => $page['title_en'], 'so' => $page['title_so']], true) . "
                " . UI::bilingualTextarea('content', 'Main Content', ['en' => $page['content_en'], 'so' => $page['content_so']], true, 4, true) . "
            </div>
        "); ?>

        <?php echo UI::card("SEO Metadata (Optional)", "
            <div class='grid grid-cols-1 gap-6'>
                " . UI::input('meta_title', 'Meta Title', 'text', $page['meta_title'], 'SEO Title') . "
                " . UI::textarea('meta_desc', 'Meta Description', $page['meta_desc'], 'SEO Description') . "
            </div>
        "); ?>
    </form>
</div>