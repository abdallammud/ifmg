<?php
require_once 'includes/db.php';
$board_res = $mysqli->query("SELECT * FROM org_structure WHERE level = 'board'  ORDER BY sort_order ASC");
$director_res = $mysqli->query("SELECT * FROM org_structure WHERE level = 'director'  LIMIT 1");
$dept_res = $mysqli->query("SELECT * FROM org_structure WHERE level = 'department'  ORDER BY sort_order ASC");
include 'includes/header.php';
?>

<main class="pt-20">
    <div class="bg-navy-900 py-16 text-white">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4" data-translate="structure_title">Institutional Structure</h1>
            <div class="flex gap-2 text-navy-200 text-sm">
                <a href="index" class="hover:text-gold-500" data-translate="nav_home">Home</a>
                <span>/</span>
                <a href="about" class="hover:text-gold-500" data-translate="nav_about">About Us</a>
                <span>/</span>
                <span class="text-white" data-translate="nav_structure">Structure</span>
            </div>
        </div>
    </div>

    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-4 gap-12">
            <aside class="lg:col-span-1">
                <div class="sticky top-28">
                    <h3 class="font-bold text-navy-900 mb-6 uppercase tracking-wider text-xs">Section Menu</h3>
                    <nav class="sidebar-nav">
                        <a href="about" class="sidebar-link" data-translate="nav_history">History</a>
                        <a href="vision-mission" class="sidebar-link" data-translate="nav_vision_mission">Vision /
                            Mission</a>
                        <a href="structure" class="sidebar-link active" data-translate="nav_structure">Structure and
                            governance</a>
                        <a href="contact" class="sidebar-link" data-translate="nav_contact">Contact Us</a>
                    </nav>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <div class="text-left mb-12">
                    <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                        data-translate="structure_label">Organization</span>
                    <h2 class="text-3xl font-bold text-navy-900 mb-4" data-translate="structure_title">Institutional
                        Structure</h2>
                    <div class="section-divider"></div>
                </div>

                <div class="max-w-2xl mx-auto py-12">
                    <!-- Board -->
                    <div class="text-center mb-8 space-y-4">
                        <?php if ($director_res && $director_res->num_rows > 0): ?>
                            <?php while ($row = $director_res->fetch_assoc()): ?>
                                <div class="inline-block bg-navy-900 text-white px-8 py-4 rounded-xl shadow-lg m-2">
                                    <h3 class="font-semibold"><?php echo e(get_text($row, 'title')); ?></h3>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <div class="inline-block bg-navy-900 text-white px-8 py-4 rounded-xl shadow-lg">
                                <h3 class="font-semibold" data-translate="structure_director">Executive Director</h3>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Connector -->
                    <div class="w-0.5 h-8 bg-gray-200 mx-auto"></div>

                    <!-- Executive Director -->
                    <div class="text-center mb-8">
                        <?php if ($director_res && $director_res->num_rows > 0): ?>
                            <?php $dir = $director_res->fetch_assoc(); ?>
                            <div class="inline-block bg-teal-600 text-white px-8 py-4 rounded-xl shadow-lg">
                                <h3 class="font-semibold"><?php echo e(get_text($dir, 'title')); ?></h3>
                            </div>
                        <?php else: ?>
                            <div class="inline-block bg-teal-600 text-white px-8 py-4 rounded-xl shadow-lg">
                                <h3 class="font-semibold" data-translate="structure_director">Executive Director</h3>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Connector -->
                    <div class="w-0.5 h-8 bg-gray-200 mx-auto"></div>

                    <!-- Departments -->
                    <div class="grid grid-cols-2 gap-6">
                        <?php if ($dept_res && $dept_res->num_rows > 0): ?>
                            <?php while ($row = $dept_res->fetch_assoc()): ?>
                                <div
                                    class="bg-[#F5F7FA] p-8 rounded-xl text-center border border-gray-100 shadow-sm hover:shadow-md transition-all">
                                    <div class="mb-4 text-<?php echo e($row['icon_color'] ?? 'teal-600'); ?>">
                                        <?php if (!empty($row['icon_svg'])): ?>
                                            <?php echo $row['icon_svg']; ?>
                                        <?php else: ?>
                                            <svg class="w-10 h-10 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                            </svg>
                                        <?php endif; ?>
                                    </div>
                                    <h4 class="font-bold text-navy-900"><?php echo e(get_text($row, 'title')); ?></h4>
                                </div>
                            <?php endwhile; ?>
                        <?php else: ?>
                            <div
                                class="bg-[#F5F7FA] p-8 rounded-xl text-center border border-gray-100 shadow-sm hover:shadow-md transition-all">
                                <svg class="w-10 h-10 mx-auto mb-4 text-teal-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                </svg>
                                <h4 class="font-bold text-navy-900" data-translate="structure_dept1">Research & Policy</h4>
                            </div>
                            <!-- ... other fallback depts ... -->
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>