<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Edit News Article</h1>
            <p class="text-gray-500 mt-1 font-medium">Update article content and publishing status.</p>
        </div>
    </div>

    <form action="<?php echo url('media/update/' . $article['id']); ?>" method="POST" enctype="multipart/form-data"
        class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <?php echo UI::card("Article Content", "
                    <div class='grid grid-cols-1 gap-6'>
                        " . UI::bilingualInput('title', 'Headline', ['en' => $article['title_en'], 'so' => $article['title_so']], true) . "
                        " . UI::bilingualTextarea('excerpt', 'Excerpt / Summary', ['en' => $article['excerpt_en'], 'so' => $article['excerpt_so']], true, 3, true) . "
                        " . UI::bilingualTextarea('content', 'Article Content', ['en' => $article['content_en'], 'so' => $article['content_so']], true, 12, true) . "
                    </div>
                "); ?>
            </div>

            <div class="space-y-6">
                <?php echo UI::card("Publishing Settings", "
                    <div class='grid grid-cols-1 gap-6'>
                        " . UI::input('published_date', 'Publication Date', 'date', $article['published_date'], '', true) . "
                        <div class='flex flex-col gap-4 p-4 bg-gray-50 rounded-xl border border-gray-100'>
                            <label class='flex items-center gap-3 cursor-pointer'>
                                <input type='checkbox' name='is_featured' " . ($article['is_featured'] ? 'checked' : '') . " class='w-5 h-5 rounded text-teal-600 focus:ring-teal-500'>
                                <span class='text-sm font-bold text-gray-700'>Feature this article</span>
                            </label>
                            <label class='flex items-center gap-3 cursor-pointer'>
                                <input type='checkbox' name='is_active' " . ($article['is_active'] ? 'checked' : '') . " class='w-5 h-5 rounded text-teal-600 focus:ring-teal-500'>
                                <span class='text-sm font-bold text-gray-700'>Published (Active)</span>
                            </label>
                        </div>
                    </div>
                "); ?>

                <?php echo UI::card("Media", "
                    <div class='space-y-2'>
                        <label class='block text-xs font-bold text-gray-500 uppercase tracking-widest'>Cover Image</label>
                        " . ($article['cover_image'] ? "<img src='" . asset('uploads/' . $article['cover_image']) . "' class='w-full h-32 object-cover rounded-xl mb-3 shadow-sm border'>" : "") . "
                        <input type='file' name='cover_image' accept='image/*' class='w-full text-sm text-gray-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200 transition-all'>
                    </div>
                "); ?>

                <div class="flex flex-col gap-3 pt-4">
                    <button type="submit"
                        class="w-full px-6 py-4 rounded-xl bg-gold-500 text-navy-900 font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        Update Article
                    </button>
                    <a href="<?php echo url('media'); ?>"
                        class="w-full px-6 py-4 rounded-xl bg-white text-gray-500 text-center font-bold border border-gray-200 hover:bg-gray-50 transition-all">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>