<?php
require_once 'includes/db.php';
$announcements_res = $mysqli->query("SELECT * FROM announcements ORDER BY published_date DESC");
include 'includes/header.php';
?>

<main class="pt-20">
    <div class="bg-navy-900 py-16 text-white">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4" data-translate="announcements_title">Announcements</h1>
            <div class="flex gap-2 text-navy-200 text-sm">
                <a href="index" class="hover:text-gold-500">Home</a>
                <span>/</span>
                <span class="text-white">Announcements</span>
            </div>
        </div>
    </div>

    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-4 gap-12">
            <aside class="lg:col-span-1">
                <div class="sticky top-28">
                    <h3 class="font-bold text-navy-900 mb-6 uppercase tracking-wider text-xs">Events Menu</h3>
                    <nav class="sidebar-nav">
                        <a href="announcements" class="sidebar-link active"
                            data-translate="nav_announcements">Announcements</a>
                        <a href="media" class="sidebar-link" data-translate="nav_news_media">News and media</a>
                        <a href="events" class="sidebar-link" data-translate="nav_events">Events</a>
                    </nav>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <div class="space-y-6">
                    <?php if ($announcements_res && $announcements_res->num_rows > 0): ?>
                        <?php while ($row = $announcements_res->fetch_assoc()): ?>
                            <div
                                class="bg-white rounded-2xl p-8 shadow-sm border-l-4 border-<?php echo ($row['type'] === 'Announcement' ? 'gold-500' : ($row['type'] === 'Grant' ? 'teal-500' : 'emerald-500')); ?> hover:shadow-md transition-shadow">
                                <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                                    <div class="flex-1">
                                        <span class="text-sm font-medium text-teal-600 mb-2 block">
                                            <?php echo date('F j, Y', strtotime($row['date'])); ?>
                                        </span>
                                        <h3 class="text-xl font-bold text-navy-900 mb-3">
                                            <?php echo e(get_text($row, 'title')); ?>
                                        </h3>
                                        <div class="text-navy-600 rich-text">
                                                      <?php echo get_text($row, 'content'); ?>
                                        </div>
                                    </div>
                                    <?php if (!empty($row['file_path'])): ?>
                                        <a href="ifmg_admin/<?php echo e($row['file_path']); ?>" target="_blank"
                                            class="btn-secondary whitespace-nowrap">
                                            Download
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <p class="text-center text-navy-500 py-12">No announcements found.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>