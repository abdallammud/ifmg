<?php
require_once 'includes/db.php';
$publications_res = $mysqli->query("SELECT * FROM publications ORDER BY created_at DESC");
include 'includes/header.php';
?>

<main class="pt-20">
    <div class="bg-navy-900 py-16 text-white">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4" data-translate="nav_publications">Publications</h1>
            <div class="flex gap-2 text-navy-200 text-sm">
                <a href="index" class="hover:text-gold-500">Home</a>
                <span>/</span>
                <span class="text-white" data-translate="nav_publications">Publications</span>
            </div>
        </div>
    </div>

    <section class="py-20 lg:py-28 pattern-bg">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                    data-translate="pub_label">Knowledge Hub</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy-900 mb-4" data-translate="pub_title">
                    Recent Publications</h2>
                <div class="section-divider mx-auto"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php if ($publications_res && $publications_res->num_rows > 0): ?>
                    <?php while ($row = $publications_res->fetch_assoc()): ?>
                        <article class="publication-card bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
                            <div
                                class="h-48 bg-gradient-to-br from-<?php echo $row['gradient_from'] ?? 'navy-800'; ?> to-<?php echo $row['gradient_to'] ?? 'navy-900'; ?> relative overflow-hidden">
                                <?php if (!empty($row['cover_image'])): ?>
                                    <div class="absolute inset-0 opacity-20"
                                        style="background-image: url('<?php echo fe_asset($row['cover_image']); ?>'); background-size: cover; background-position: center;">
                                    </div>
                                <?php endif; ?>
                                <div class="absolute inset-0 flex items-center justify-center">
                                    <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <span
                                    class="absolute top-4 left-4 px-3 py-1 bg-<?php echo $row['badge_bg'] ?? 'gold-500'; ?> text-<?php echo $row['badge_text_color'] ?? 'navy-900'; ?> text-xs font-bold rounded uppercase">
                                    <?php
                                    $cat_map = [
                                        'policy_paper' => ['en' => 'Policy Paper', 'so' => 'Warbixin Siyaasadeed'],
                                        'working_paper' => ['en' => 'Working Paper', 'so' => 'Warbixin Shaqo'],
                                        'annual_report' => ['en' => 'Annual Report', 'so' => 'Warbixin Sannadeed']
                                    ];
                                    echo $cat_map[$row['category']][$lang] ?? ($row['category'] ?? 'Publication');
                                    ?>
                                </span>
                            </div>
                            <div class="p-6">
                                <h3 class="text-lg font-semibold text-navy-900 mb-3">
                                    <?php echo e(get_text($row, 'title')); ?>
                                </h3>
                                <div class="text-navy-600 text-sm mb-4 leading-relaxed line-clamp-3 rich-text">
                                    <?php echo get_text($row, 'description'); ?>
                                </div>
                                <?php if (!empty($row['file_path'])): ?>
                                    <a href="ifmg_admin/<?php echo e($row['file_path']); ?>" target="_blank"
                                        class="inline-flex items-center gap-2 text-teal-600 font-semibold text-sm hover:gap-3 transition-all">
                                        <span data-translate="pub_download">Download PDF</span>
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                        </svg>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="col-span-full text-center py-12">
                        <p class="text-navy-500">No publications found.</p>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>