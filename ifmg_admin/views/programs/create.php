<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Create Workstream</h1>
            <p class="text-gray-500 mt-1 font-medium">Define a new service area or program page.</p>
        </div>
    </div>

    <form action="<?php echo url('programs/store'); ?>" method="POST" class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-6">
                <?php echo UI::card("Main Content", "
                    <div class='grid grid-cols-1 gap-6'>
                        " . UI::bilingualInput('title', 'Workstream Title', [], true) . "
                        <div class='grid grid-cols-2 gap-6'>
                            " . UI::input('slug', 'URL Slug', 'text', '', 'e.g. macro-fiscal', true) . "
                            " . UI::input('sort_order', 'Sort Order', 'number', '0') . "
                        </div>
                        " . UI::bilingualTextarea('short_desc', 'Short Description', [], true, 4, true) . "
                        " . UI::bilingualTextarea('full_content', 'Detailed Page Content', [], false, 8, true) . "
                    </div>
                "); ?>

                <div id="features-container" class="space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="font-bold text-navy-900 italic">Program Features (Max 2 recommended)</h3>
                        <button type="button" onclick="addFeature()"
                            class="text-xs font-bold text-teal-600 hover:text-teal-700">+ Add Feature</button>
                    </div>
                    <!-- Features added via JS -->
                </div>
            </div>

            <div class="space-y-6">
                <?php echo UI::card("Visual Identity", "
                    <div class='grid grid-cols-1 gap-6'>
                        " . UI::textarea('icon_svg', 'Icon SVG', '', 'Paste SVG code here') . "
                    </div>
                "); ?>

                <div id="items-container" class="space-y-4">
                    <div class="flex items-center justify-between">
                        <h3 class="font-bold text-navy-900 italic">Key Bullets</h3>
                        <button type="button" onclick="addItem()"
                            class="text-xs font-bold text-teal-600 hover:text-teal-700">+ Add Bullet</button>
                    </div>
                    <!-- Items added via JS -->
                </div>

                <div class="flex flex-col gap-3 pt-4">
                    <button type="submit"
                        class="w-full px-6 py-4 rounded-xl bg-gold-500 text-navy-900 font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all">
                        Create Workstream
                    </button>
                    <a href="<?php echo url('programs'); ?>"
                        class="w-full px-6 py-4 rounded-xl bg-white text-gray-500 text-center font-bold border border-gray-200 hover:bg-gray-50 transition-all">
                        Cancel
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>

<script>
    let featureCount = 0;
    function addFeature() {
        const html = `
    <div class="p-6 bg-gray-50 rounded-2xl border border-gray-100 space-y-4 relative">
        <button type="button" onclick="this.parentElement.remove()" class="absolute top-4 right-4 text-red-400">×</button>
        <input type="text" name="features[${featureCount}][title_en]" placeholder="Feature Title (EN)" class="w-full p-2 border rounded">
        <textarea name="features[${featureCount}][description_en]" placeholder="Description (EN)" class="w-full p-2 border rounded"></textarea>
        <!-- Somali versions simplified for now -->
        <input type="hidden" name="features[${featureCount}][sort_order]" value="${featureCount}">
    </div>`;
        document.getElementById('features-container').insertAdjacentHTML('beforeend', html);
        featureCount++;
    }

    let itemCount = 0;
    function addItem() {
        const html = `
    <div class="flex gap-2">
        <input type="text" name="list_items[${itemCount}][text_en]" placeholder="Bullet Text" class="flex-1 p-2 border rounded text-sm">
        <button type="button" onclick="this.parentElement.remove()" class="text-red-400">×</button>
    </div>`;
        document.getElementById('items-container').insertAdjacentHTML('beforeend', html);
        itemCount++;
    }
</script>