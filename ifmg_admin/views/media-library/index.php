<div class="space-y-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-navy-900 tracking-tight">Media Library</h1>
            <p class="text-gray-500 mt-1 font-medium">Manage and browse all uploaded assets.</p>
        </div>
        <div class="flex gap-3">
            <button onclick="document.getElementById('file-upload').click()"
                class="px-6 py-3 rounded-xl bg-gold-500 text-navy-900 text-sm font-bold shadow-lg shadow-gold-500/20 hover:scale-[1.02] active:scale-95 transition-all flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Upload File
            </button>
            <input type="file" id="file-upload" class="hidden" multiple onchange="handleUpload(this)">
        </div>
    </div>

    <!-- Filters -->
    <div class="flex items-center gap-4 bg-white p-2 rounded-2xl border border-gray-100 w-fit shadow-sm">
        <a href="<?php echo url('media-library'); ?>"
            class="px-6 py-2 rounded-xl text-sm font-bold transition-all <?php echo !$current_type ? 'bg-navy-900 text-white shadow-lg shadow-navy-900/20' : 'text-gray-400 hover:bg-gray-50'; ?>">
            All
        </a>
        <a href="<?php echo url('media-library?type=image'); ?>"
            class="px-6 py-2 rounded-xl text-sm font-bold transition-all <?php echo $current_type == 'image' ? 'bg-navy-900 text-white shadow-lg shadow-navy-900/20' : 'text-gray-400 hover:bg-gray-50'; ?>">
            Images
        </a>
        <a href="<?php echo url('media-library?type=document'); ?>"
            class="px-6 py-2 rounded-xl text-sm font-bold transition-all <?php echo $current_type == 'document' ? 'bg-navy-900 text-white shadow-lg shadow-navy-900/20' : 'text-gray-400 hover:bg-gray-50'; ?>">
            Documents
        </a>
    </div>

    <!-- Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6" id="media-grid">
        <?php foreach ($assets as $asset): ?>
            <div
                class="group relative bg-white rounded-3xl border border-gray-100 p-3 shadow-sm hover:shadow-xl hover:scale-[1.02] transition-all cursor-pointer">
                <div class="aspect-square rounded-2xl overflow-hidden bg-gray-50 flex items-center justify-center">
                    <?php if (strpos($asset['mime_type'], 'image') !== false): ?>
                        <img src="<?php echo asset($asset['file_path']); ?>" class="w-full h-full object-cover">
                    <?php else: ?>
                        <svg class="w-12 h-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                    <?php endif; ?>
                </div>
                <div class="mt-3 px-1">
                    <p class="text-[10px] font-bold text-gray-900 truncate">
                            <?php echo e($asset['original_name']); ?>
                    </p>
                    <p class="text-[9px] text-gray-400 font-medium uppercase mt-0.5">
                            <?php echo round($asset['file_size'] / 1024, 1); ?> KB
                    </p>
                </div>

                <!-- Actions -->
                <div
                    class="absolute inset-0 bg-navy-900/60 backdrop-blur-sm rounded-3xl opacity-0 group-hover:opacity-100 transition-all flex items-center justify-center gap-2">
                    <button onclick="copyUrl('<?php echo asset($asset['file_path']); ?>')"
                        class="p-2.5 rounded-xl bg-white text-navy-900 hover:bg-gold-500 transition-all" title="Copy URL">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3">
                            </path>
                        </svg>
                    </button>
                    <a href="<?php echo url('media-library/delete/' . $asset['id']); ?>"
                        onclick="return confirm('Delete permanently?')"
                        class="p-2.5 rounded-xl bg-red-500 text-white hover:bg-red-600 transition-all">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    function handleUpload(input) {
        if (!input.files.length) return;

        const formData = new FormData();
        for (let file of input.files) {
            formData.append('file', file);
        }

        fetch('<?php echo url("media-library/upload"); ?>', {
            method: 'POST',
            body: formData
        })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Upload failed: ' + (data.error || 'Unknown error'));
                }
            });
    }

    function copyUrl(url) {
        navigator.clipboard.writeText(url);
        alert('URL copied to clipboard!');
    }
</script>