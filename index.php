<?php
require_once 'includes/db.php';

// Fetch Hero Slides
$hero_res = $mysqli->query("SELECT * FROM hero_slides WHERE is_active = 1 ORDER BY sort_order ASC");
$hero_slides = $hero_res->fetch_all(MYSQLI_ASSOC);

// Fetch Latest Announcement
$ann_res = $mysqli->query("SELECT * FROM announcement_strip WHERE is_active = 1 LIMIT 1");
$active_ann = $ann_res->fetch_assoc();

// Fetch Partners
$partners_res = $mysqli->query("SELECT * FROM partners WHERE is_active = 1 ORDER BY sort_order ASC");
$partners = $partners_res->fetch_all(MYSQLI_ASSOC);

include 'includes/header.php';
?>

<!-- Hero Carousel -->
<section id="home" class="relative h-screen min-h-[600px] max-h-[900px] overflow-hidden">
    <div id="carousel" class="relative w-full h-full">
        <?php foreach ($hero_slides as $index => $slide): ?>
            <div class="carousel-slide <?php echo $index === 0 ? 'active' : ''; ?>">
                <div class="absolute inset-0 bg-gradient-to-r from-navy-950 via-navy-900/95 to-navy-800/90"></div>
                <div class="absolute inset-0"
                    style="background-image: url('<?php echo fe_asset($slide['bg_image']); ?>'); background-size: cover; background-position: center; mix-blend-mode: overlay; opacity: 0.4;">
                </div>
                <div class="relative h-full flex items-center">
                    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="max-w-3xl">
                            <div class="section-divider mb-6"></div>
                            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                                <?php echo e(get_text($slide, 'title')); ?>
                            </h1>
                            <div class="text-xl text-white/80 mb-8 font-light rich-text">
                                <?php echo get_text($slide, 'subtitle'); ?>
                            </div>
                            <a href="<?php echo e($slide['cta_link']); ?>" class="btn-primary inline-block">
                                <?php echo e(get_text($slide, 'cta_text')); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Carousel Controls -->
    <?php if (count($hero_slides) > 1): ?>
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex items-center gap-4 z-10">
            <button id="prevSlide"
                class="w-12 h-12 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white hover:bg-white/20 transition-all flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </button>
            <div id="carouselDots" class="flex gap-2">
                <?php foreach ($hero_slides as $i => $s): ?>
                    <button
                        class="carousel-dot w-3 h-3 rounded-full bg-white/50 transition-all <?php echo $i === 0 ? 'active' : ''; ?>"
                        data-slide="<?php echo $i; ?>"></button>
                <?php endforeach; ?>
            </div>
            <button id="nextSlide"
                class="w-12 h-12 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white hover:bg-white/20 transition-all flex items-center justify-center">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </button>
        </div>
    <?php endif; ?>
</section>

<!-- Announcement Strip -->
<?php if ($active_ann): ?>
    <section class="relative bg-white border-l-4 border-gold-500 shadow-lg">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 py-5">
            <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4">
                <div class="flex items-center gap-3">
                    <span
                        class="inline-flex items-center gap-2 px-3 py-1 bg-gold-500/10 text-gold-600 rounded-full text-sm font-semibold">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                        </svg>
                        <span><?php echo e($lang === 'so' ? 'Ogeysiiskii Ugu Dambeeyay' : 'Latest Announcement'); ?></span>
                    </span>
                </div>
                <div class="flex-1 text-navy-800 font-medium rich-text"><?php echo get_text($active_ann, 'text'); ?></div>
                <a href="<?php echo e($active_ann['link']); ?>" class="btn-secondary text-sm whitespace-nowrap">
                    <?php echo e(get_text($active_ann, 'btn_text')); ?>
                </a>
            </div>
        </div>
    </section>
<?php endif; ?>

<!-- Publications Section -->
<?php
$pub_res = $mysqli->query("SELECT * FROM publications WHERE is_active = 1 ORDER BY is_featured DESC, published_date DESC LIMIT 3");
$publications = $pub_res->fetch_all(MYSQLI_ASSOC);
?>
<section id="publications" class="py-20 lg:py-28 pattern-bg">
    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                data-translate="pub_label">Knowledge Hub</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy-900 mb-4" data-translate="pub_title">
                Recent Publications</h2>
            <div class="section-divider mx-auto"></div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($publications as $pub): ?>
                <article class="publication-card bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
                    <div
                        class="h-48 bg-gradient-to-br from-<?php echo $pub['gradient_from']; ?> to-<?php echo $pub['gradient_to']; ?> relative overflow-hidden">
                        <div class="absolute inset-0 opacity-20"
                            style="background-image: url('<?php echo fe_asset($pub['cover_image']); ?>'); background-size: cover; background-position: center;">
                        </div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span
                            class="absolute top-4 left-4 px-3 py-1 bg-<?php echo $pub['badge_bg']; ?> text-<?php echo $pub['badge_text_color']; ?> text-xs font-bold rounded uppercase">
                            <?php
                            $cat_map = [
                                'policy_paper' => ['en' => 'Policy Paper', 'so' => 'Warbixin Siyaasadeed'],
                                'working_paper' => ['en' => 'Working Paper', 'so' => 'Warbixin Shaqo'],
                                'annual_report' => ['en' => 'Annual Report', 'so' => 'Warbixin Sannadeed']
                            ];
                            echo $cat_map[$pub['category']][$lang] ?? $pub['category'];
                            ?>
                        </span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-navy-900 mb-3"><?php echo e(get_text($pub, 'title')); ?></h3>
                        <div class="text-navy-600 text-sm mb-4 leading-relaxed line-clamp-3 rich-text">
                            <?php echo get_text($pub, 'description'); ?>
                        </div>
                        <a href="<?php echo fe_asset($pub['pdf_file']); ?>" target="_blank"
                            class="inline-flex items-center gap-2 text-teal-600 font-semibold text-sm hover:gap-3 transition-all">
                            <span data-translate="pub_download">Download PDF</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                            </svg>
                        </a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Workstreams Section -->
<?php
$prog_res = $mysqli->query("SELECT * FROM programs WHERE is_active = 1 ORDER BY sort_order ASC LIMIT 3");
$programs = $prog_res->fetch_all(MYSQLI_ASSOC);
?>
<section id="workstreams" class="py-20 lg:py-28 bg-white overflow-hidden">
    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <div class="max-w-2xl mx-auto">
                <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                    data-translate="work_label">What We Do</span>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy-900 mb-4" data-translate="work_title">
                    Our Workstreams</h2>
                <div class="section-divider mx-auto"></div>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-8 lg:gap-8">
            <?php foreach ($programs as $prog): ?>
                <div class="workstream-card group p-8 bg-[#F8FAFC] rounded-[2rem] text-center flex flex-col items-center">
                    <div
                        class="w-16 h-16 rounded-2xl bg-<?php echo $prog['icon_bg_color']; ?> flex items-center justify-center text-<?php echo $prog['icon_color']; ?> mb-8 group-hover:scale-110 transition-transform duration-500">
                        <?php echo $prog['icon_svg']; ?>
                    </div>
                    <h3 class="text-xl font-bold text-navy-900 mb-4 group-hover:text-teal-600 transition-colors">
                        <?php echo e(get_text($prog, 'title')); ?>
                    </h3>
                    <div class="text-navy-600 mb-8 leading-relaxed text-sm rich-text">
                        <?php echo get_text($prog, 'short_desc'); ?>
                    </div>
                    <a href="<?php echo e($prog['slug']); ?>"
                        class="mt-auto inline-flex items-center gap-2 text-navy-900 font-bold text-xs tracking-wide uppercase group-hover:gap-3 transition-all">
                        <span>Explore More</span>
                        <svg class="w-4 h-4 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Executive Director Message -->
<?php
$dir_res = $mysqli->query("SELECT * FROM director_message WHERE is_active = 1 LIMIT 1");
$director = $dir_res->fetch_assoc();
?>
<?php if ($director): ?>
    <section id="director" class="py-20 lg:py-28 bg-[#0B2E4F] relative overflow-hidden">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center">
                <!-- Left: Image & Quote -->
                <div class="relative">
                    <!-- Director's Portrait -->
                    <div
                        class="aspect-[4/5] bg-navy-800/50 rounded-2xl border border-white/10 flex items-center justify-center relative overflow-hidden">
                        <?php if (!empty($director['photo'])): ?>
                            <img src="<?php echo fe_asset($director['photo']); ?>"
                                alt="<?php echo e(get_text($director, 'name')); ?>"
                                class="absolute inset-0 w-full h-full object-cover">
                        <?php else: ?>
                            <svg class="w-32 h-32 text-white/10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        <?php endif; ?>
                    </div>

                    <!-- Quote Box -->
                    <div
                        class="absolute -bottom-8 left-4 lg:-left-8 bg-[#C9A227] text-navy-900 p-6 sm:p-8 rounded-2xl shadow-2xl max-w-[280px] sm:max-w-xs transition-transform hover:scale-105 duration-300 z-20">
                        <svg class="w-8 h-8 sm:w-10 sm:h-10 mb-4 opacity-40" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                        </svg>
                        <p class="text-xs sm:text-sm font-semibold italic leading-relaxed" data-translate="director_quote">
                            <?php echo e(get_text($director, 'quote')); ?>
                        </p>
                    </div>
                </div>

                <!-- Right: Content -->
                <div class="lg:pl-8">
                    <span class="inline-block text-[#C9A227] font-semibold text-sm uppercase tracking-widest mb-4"
                        data-translate="director_label">
                        Director's Message
                    </span>
                    <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4" data-translate="director_name">
                        <?php echo e(get_text($director, 'name')); ?>
                    </h2>
                    <p class="text-[#C9A227] font-medium text-lg mb-8" data-translate="director_title">
                        <?php echo e(get_text($director, 'title')); ?>
                    </p>

                    <div class="w-20 h-1 bg-gradient-to-r from-[#C9A227] to-[#D4B23A] rounded mb-10"></div>

                    <div class="text-lg text-white/80 leading-relaxed mb-10 space-y-4 rich-text"
                        data-translate="director_message">
                        <?php echo get_text($director, 'message'); ?>
                    </div>

                    <button
                        class="btn-secondary text-white border-white/20 hover:bg-white hover:text-navy-900 hover:border-white transition-all duration-300"
                        data-translate="director_btn">
                        Read Full Message
                    </button>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
<!-- Partners Section -->
<section id="partners" class="py-20 lg:py-28 bg-[#F5F7FA]">
    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                data-translate="partners_label">Collaboration</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy-900 mb-4" data-translate="partners_title">
                Strategic Partners</h2>
            <div class="section-divider mx-auto"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($partners as $ptr): ?>
                <div
                    class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col items-center justify-center min-h-[140px] hover:shadow-lg transition-all group">
                    <?php if (!empty($ptr['logo'])): ?>
                        <img src="<?php echo fe_asset($ptr['logo']); ?>" alt="<?php echo e($ptr['name']); ?>"
                            class="h-12 w-auto object-contain grayscale group-hover:grayscale-0 transition-all"
                            onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <?php endif; ?>
                    <div
                        class="<?php echo !empty($ptr['logo']) ? 'hidden' : ''; ?> w-14 h-14 rounded-full bg-navy-100 flex items-center justify-center text-navy-700 font-bold text-lg">
                        <?php echo e($ptr['abbreviation'] ?? substr($ptr['name'], 0, 1)); ?>
                    </div>
                    <p class="text-navy-600 text-sm font-medium mt-2"><?php echo e($ptr['name']); ?></p>
                    <?php if (!empty($ptr['website_url'])): ?>
                        <a href="<?php echo e($ptr['website_url']); ?>" target="_blank"
                            class="mt-2 text-xs text-teal-600 hover:underline">Visit Website</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
            <?php if (empty($partners)): ?>
                <div class="col-span-full text-center py-12 text-navy-400">No active partners listed.</div>
            <?php endif; ?>
        </div>
    </div>
    </div>
</section>

<!-- Subscribe Section -->
<section class="py-20 lg:py-28 pattern-bg">
    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl shadow-xl p-8 lg:p-16 border border-gray-100 max-w-4xl mx-auto text-center">
            <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                data-translate="subscribe_label">Newsletter</span>
            <h2 class="text-3xl sm:text-4xl font-bold text-navy-900 mb-4" data-translate="subscribe_title">Stay
                Informed</h2>
            <p class="text-navy-600 mb-8 max-w-xl mx-auto" data-translate="subscribe_text">Subscribe to receive
                updates on policy papers, research, and institutional announcements.</p>

            <form id="subscribeForm" class="flex flex-col sm:flex-row gap-4 max-w-lg mx-auto">
                <input type="email" placeholder="Enter your email address" class="form-input flex-1" required
                    data-translate-placeholder="subscribe_placeholder">
                <button type="submit" class="btn-primary whitespace-nowrap"
                    data-translate="subscribe_btn">Subscribe</button>
            </form>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>