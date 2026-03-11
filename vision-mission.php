<?php
require_once 'includes/db.php';
$current_page = 'vision-mission';
$page_res = $mysqli->query("SELECT * FROM pages WHERE slug = 'vision-mission' LIMIT 1");
$page_data = $page_res->fetch_assoc();

// Fetch Vision & Mission details
$vm_res = $mysqli->query("SELECT * FROM vision_mission LIMIT 1");
$vm = $vm_res->fetch_assoc();

// Fetch Core Values
$cv_res = $mysqli->query("SELECT * FROM core_values ORDER BY sort_order ASC");
$core_values = $cv_res->fetch_all(MYSQLI_ASSOC);

include 'includes/header.php';
?>

<main class="pt-20">
    <!-- Breadcrumbs/Page Header -->
    <div class="bg-navy-900 py-16 text-white">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4" data-translate="vision_mission_title">Vision & Mission</h1>
            <div class="flex gap-2 text-navy-200 text-sm">
                <a href="index" class="hover:text-gold-500">Home</a>
                <span>/</span>
                <span class="text-white">Vision & Mission</span>
            </div>
        </div>
    </div>

    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-4 gap-12">
            <!-- Sidebar Submenu -->
            <aside class="lg:col-span-1">
                <div class="sticky top-28">
                    <h3 class="font-bold text-navy-900 mb-6 uppercase tracking-wider text-xs">Section Menu</h3>
                    <nav class="sidebar-nav">
                        <a href="about" class="sidebar-link" data-translate="nav_history">History</a>
                        <a href="vision-mission" class="sidebar-link active" data-translate="nav_vision_mission">Vision
                            / Mission</a>
                        <a href="structure" class="sidebar-link" data-translate="nav_structure">Structure and
                            governance</a>
                        <a href="contact" class="sidebar-link" data-translate="nav_contact">Contact Us</a>
                    </nav>
                </div>
            </aside>

            <!-- Main Content -->
            <div class="lg:col-span-3">
                <div class="prose prose-lg max-w-none">
                    <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                        data-translate="vision_mission_label">Our Purpose</span>
                    <h2 class="text-3xl font-bold text-navy-900 mb-6"><?php echo e(get_text($page_data, 'title')); ?>
                    </h2>

                    <div class="text-navy-600 text-lg leading-relaxed mb-8 rich-text">
                        <?php echo get_text($page_data, 'content'); ?>
                    </div>

                    <div class="space-y-12 my-12">
                        <div class="space-y-12 my-12">
                            <?php if ($vm): ?>
                                <div class="p-8 bg-navy-50 rounded-2xl border border-navy-100">
                                    <div
                                        class="w-12 h-12 bg-teal-500 rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-teal-200">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M13 10V3L4 14h7v7l9-11h-7z" />
                                        </svg>
                                    </div>
                                    <h4 class="text-2xl font-bold text-navy-900 mb-4" data-translate="about_mission_title">
                                        Our Mission</h4>
                                    <p class="text-navy-600 text-lg leading-relaxed rich-text">
                                        <?php echo get_text($vm, 'mission'); ?>
                                    </p>
                                </div>

                                <div class="p-8 bg-navy-50 rounded-2xl border border-navy-100">
                                    <div
                                        class="w-12 h-12 bg-gold-500 rounded-xl flex items-center justify-center mb-6 shadow-lg shadow-gold-200">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                    <h4 class="text-2xl font-bold text-navy-900 mb-4" data-translate="about_vision_title">
                                        Our Vision</h4>
                                    <p class="text-navy-600 text-lg leading-relaxed rich-text">
                                        <?php echo get_text($vm, 'vision'); ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

                    <h3 class="text-2xl font-bold text-navy-900 mb-6" data-translate="values_title">Our Core Values</h3>
                    <div class="grid sm:grid-cols-2 gap-8 mt-4">
                        <?php foreach ($core_values as $val): ?>
                            <div class="flex gap-4">
                                <div
                                    class="flex-shrink-0 w-6 h-6 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                                <div>
                                    <h5 class="font-bold text-navy-900"><?php echo e(get_text($val, 'title')); ?></h5>
                                    <div class="text-sm text-navy-600 rich-text">
                                        <?php echo get_text($val, 'description'); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>