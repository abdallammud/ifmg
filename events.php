<?php
require_once 'includes/db.php';
$events_res = $mysqli->query("SELECT * FROM events WHERE is_active = 1 ORDER BY event_date ASC");
$current_page = 'events';
include 'includes/header.php';
?>

<main class="pt-20">
    <div class="bg-navy-900 py-16 text-white">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4" data-translate="events_title">Upcoming Events</h1>
            <div class="flex gap-2 text-navy-200 text-sm">
                <a href="index" class="hover:text-gold-500">Home</a>
                <span>/</span>
                <span class="text-navy-200" data-translate="nav_events_menu">Events</span>
                <span>/</span>
                <span class="text-white" data-translate="nav_events">Events</span>
            </div>
        </div>
    </div>

    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-4 gap-12">
            <aside class="lg:col-span-1">
                <div class="sticky top-28">
                    <h3 class="font-bold text-navy-900 mb-6 uppercase tracking-wider text-xs">Events Menu</h3>
                    <nav class="sidebar-nav">
                        <a href="announcements" class="sidebar-link"
                            data-translate="nav_announcements">Announcements</a>
                        <a href="media" class="sidebar-link" data-translate="nav_news_media">News and media</a>
                        <a href="events" class="sidebar-link active" data-translate="nav_events">Events</a>
                    </nav>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                    data-translate="events_label">Stay Connected</span>
                <h2 class="text-3xl font-bold text-navy-900 mb-6" data-translate="events_calendar_title">Event Calendar
                </h2>
                <div class="section-divider mb-8"></div>

                <div class="space-y-8">
                    <?php if ($events_res && $events_res->num_rows > 0): ?>
                        <?php while ($ev = $events_res->fetch_assoc()): ?>
                            <?php
                            $ts = strtotime($ev['event_date']);
                            $day = date('d', $ts);
                            $month = date('F', $ts);
                            $year = date('Y', $ts);
                            $bg_class = $ev['color_scheme'] === 'gold-500' ? 'bg-gold-500 text-navy-900' : 'bg-navy-900 text-white';
                            $label_bg = $ev['event_type'] === 'workshop' ? 'bg-teal-100 text-teal-700' : 'bg-navy-100 text-navy-700';
                            ?>
                            <div
                                class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 flex flex-col md:flex-row hover:shadow-md transition-shadow">
                                <div
                                    class="md:w-1/3 <?php echo $bg_class; ?> p-8 flex flex-col items-center justify-center text-center">
                                    <span
                                        class="text-xs uppercase tracking-widest <?php echo $ev['color_scheme'] === 'gold-500' ? 'text-navy-900/60' : 'text-navy-200'; ?> mb-2"><?php echo $month; ?></span>
                                    <span class="text-5xl font-bold mb-2"><?php echo $day; ?></span>
                                    <span class="text-sm font-medium"><?php echo $year; ?></span>
                                </div>
                                <div class="p-8 flex-1">
                                    <div class="flex items-center gap-2 mb-3">
                                        <span
                                            class="px-3 py-1 <?php echo $label_bg; ?> text-xs font-bold rounded-full uppercase"><?php echo e($ev['event_type']); ?></span>
                                        <span class="text-navy-400 text-sm flex items-center gap-1">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <?php echo date('h:i A', strtotime($ev['start_time'])); ?> -
                                            <?php echo date('h:i A', strtotime($ev['end_time'])); ?>
                                        </span>
                                    </div>
                                    <h3 class="text-xl font-bold text-navy-900 mb-4"><?php echo e(get_text($ev, 'title')); ?>
                                    </h3>
                                    <div class="text-navy-600 mb-6 line-clamp-2 rich-text">
                                        <?php echo get_text($ev, 'description'); ?></div>
                                    <?php if (!empty($ev['registration_link'])): ?>
                                        <a href="<?php echo e($ev['registration_link']); ?>" class="btn-secondary text-sm py-2 px-6"
                                            target="_blank">Register Now</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <div class="text-center py-12 bg-white rounded-2xl border border-gray-100 text-navy-400">
                            <svg class="w-16 h-16 mx-auto mb-4 text-gray-200" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <p>No upcoming events at the moment. Please check back later.</p>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="mt-12 p-8 bg-navy-50 rounded-2xl border border-dotted border-navy-200 text-center">
                    <p class="text-navy-600">Interested in hosting an event with IFMG? <a href="contact"
                            class="text-teal-600 font-bold hover:underline">Contact our events team</a>.</p>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>