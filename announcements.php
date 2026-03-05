<?php include 'includes/header.php'; ?>

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
                    <!-- Announcement 1 -->
                    <div
                        class="bg-white rounded-2xl p-8 shadow-sm border-l-4 border-gold-500 hover:shadow-md transition-shadow">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                            <div class="flex-1">
                                <span class="text-sm font-medium text-teal-600 mb-2 block"
                                    data-translate="announce1_date">January 20, 2026</span>
                                <h3 class="text-xl font-bold text-navy-900 mb-3" data-translate="announce1_title">2026
                                    Public
                                    Financial Management Capacity Program - Applications Open</h3>
                                <p class="text-navy-600" data-translate="announce1_desc">IFMG invites applications from
                                    eligible
                                    candidates for the 2026 PFM Capacity Development Program.</p>
                            </div>
                            <!-- Removed Apply Now button as apply.php is being deleted -->
                        </div>
                    </div>

                    <!-- Announcement 2 -->
                    <div
                        class="bg-white rounded-2xl p-8 shadow-sm border-l-4 border-teal-500 hover:shadow-md transition-shadow">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                            <div class="flex-1">
                                <span class="text-sm font-medium text-teal-600 mb-2 block"
                                    data-translate="announce2_date">January 10, 2026</span>
                                <h3 class="text-xl font-bold text-navy-900 mb-3" data-translate="announce2_title">Policy
                                    Research Grant Competition 2026</h3>
                                <p class="text-navy-600" data-translate="announce2_desc">Call for research proposals on
                                    public
                                    financial management and governance themes.</p>
                            </div>
                            <button class="btn-secondary" data-translate="announce_open">Open</button>
                        </div>
                    </div>

                    <!-- Announcement 3 -->
                    <div
                        class="bg-white rounded-2xl p-8 shadow-sm border-l-4 border-emerald-500 hover:shadow-md transition-shadow">
                        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-6">
                            <div class="flex-1">
                                <span class="text-sm font-medium text-teal-600 mb-2 block"
                                    data-translate="announce3_date">December 15, 2025</span>
                                <h3 class="text-xl font-bold text-navy-900 mb-3" data-translate="announce3_title">Annual
                                    Report
                                    2024 Published</h3>
                                <p class="text-navy-600" data-translate="announce3_desc">The IFMG Annual Report for
                                    fiscal year
                                    2024 is now available for download.</p>
                            </div>
                            <button class="btn-secondary" data-translate="announce_download">Download</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>