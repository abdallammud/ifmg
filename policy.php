<?php
require_once 'includes/db.php';
$slug = 'policy';
$program_res = $mysqli->query("SELECT * FROM programs WHERE slug = '$slug' LIMIT 1");
$program = $program_res->fetch_assoc();

if ($program) {
    $features_res = $mysqli->query("SELECT * FROM program_features WHERE program_id = {$program['id']} ORDER BY sort_order ASC");
    $items_res = $mysqli->query("SELECT * FROM program_list_items WHERE program_id = {$program['id']} ORDER BY sort_order ASC");
}

$current_page = $slug;
include 'includes/header.php';
?>

<main class="pt-20">
    <div class="bg-navy-900 py-16 text-white">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4" data-translate="nav_policy">Policy & Research Analysis</h1>
            <div class="flex gap-2 text-navy-200 text-sm">
                <a href="index" class="hover:text-gold-500">Home</a>
                <span>/</span>
                <a href="index#workstreams" class="hover:text-gold-500" data-translate="nav_workstreams">Workstreams</a>
                <span>/</span>
                <span class="text-white" data-translate="nav_policy">Policy & Research Analysis</span>
            </div>
        </div>
    </div>

    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-4 gap-12">
            <aside class="lg:col-span-1">
                <div class="sticky top-28">
                    <h3 class="font-bold text-navy-900 mb-6 uppercase tracking-wider text-xs">Programs</h3>
                    <nav class="sidebar-nav">
                        <a href="capacity-building" class="sidebar-link" data-translate="nav_training">Training and
                            capacity building</a>
                        <a href="certification" class="sidebar-link"
                            data-translate="nav_certification">Certification</a>
                        <a href="research" class="sidebar-link" data-translate="nav_research">Research and
                            innovation</a>
                        <a href="policy" class="sidebar-link active" data-translate="nav_policy">Policy & advisory</a>
                    </nav>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <span class="inline-block text-gold-600 font-semibold text-sm uppercase tracking-widest mb-3"
                    data-translate="program_label">What We Do</span>
                <h2 class="text-3xl font-bold text-navy-900 mb-6"><?php echo e(get_text($program, 'title')); ?></h2>
                <div class="section-divider mb-8"></div>
                <div class="text-navy-600 text-lg leading-relaxed mb-8 rich-text">
                              <?php echo get_text($program, 'short_desc'); ?>
                </div>

                <div class="grid md:grid-cols-2 gap-8 mb-12">
                    <?php if (isset($features_res) && $features_res->num_rows > 0): ?>
                        <?php while ($f = $features_res->fetch_assoc()): ?>
                            <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                                <div
                                    class="w-14 h-14 rounded-xl <?php echo e($f['icon_bg_color'] ?? 'bg-gold-500/10'); ?> flex items-center justify-center mb-6">
                                    <div class="text-<?php echo e($f['icon_color'] ?? 'gold-600'); ?>">
                                        <?php if (!empty($f['icon_svg'])): ?>
                                            <?php echo $f['icon_svg']; ?>
                                        <?php else: ?>
                                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <h3 class="text-xl font-semibold text-navy-900 mb-3"><?php echo e(get_text($f, 'title')); ?>
                                </h3>
                                <p class="text-navy-600"><?php echo e(get_text($f, 'description')); ?></p>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>

                <div class="bg-navy-50 rounded-2xl p-8 border border-navy-100">
                    <h3 class="text-xl font-semibold text-navy-900 mb-4" data-translate="program_focus">Policy Focus
                        Areas</h3>
                    <ul class="space-y-3 text-navy-600">
                        <?php if (isset($items_res) && $items_res->num_rows > 0): ?>
                            <?php while ($item = $items_res->fetch_assoc()): ?>
                                <li class="flex items-center gap-2">
                                    <span
                                        class="w-2 h-2 rounded-full bg-<?php echo e($item['bullet_color'] ?? 'gold-500'); ?>"></span>
                                    <?php echo e(get_text($item, 'text')); ?>
                                </li>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>