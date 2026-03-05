<?php include 'includes/header.php'; ?>

<main class="pt-20">
    <div class="bg-navy-900 py-16 text-white"
        style="background-image: url('https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=1920&q=80'); background-size: cover; background-position: center; background-blend-mode: overlay;">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4" data-translate="media_title">Media Center</h1>
            <div class="flex gap-2 text-navy-200 text-sm">
                <a href="index" class="hover:text-gold-500">Home</a>
                <span>/</span>
                <span class="text-white">Media</span>
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
                        <a href="media" class="sidebar-link active" data-translate="nav_news_media">News and media</a>
                        <a href="events" class="sidebar-link" data-translate="nav_events">Events</a>
                    </nav>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <div class="text-left mb-16">
                    <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                        data-translate="media_label">News & Updates</span>
                    <h2 class="text-3xl font-bold text-navy-900 mb-4" data-translate="media_title">Latest from Media
                        Center</h2>
                    <div class="section-divider"></div>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Media Card 1 -->
                    <article
                        class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 group hover:shadow-xl transition-all">
                        <div class="aspect-video relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1517048676732-d65bc937f952?w=600&q=80"
                                alt="News"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity">
                            </div>
                        </div>
                        <div class="p-8">
                            <div class="flex items-center gap-3 text-sm text-muted mb-4">
                                <span class="font-medium text-teal-600" data-translate="media_date1">January 15,
                                    2026</span>
                            </div>
                            <h3 class="text-xl font-bold text-navy-900 mb-3 group-hover:text-teal-600 transition-colors"
                                data-translate="media1_title">IFMG Hosts Financial Reform Workshop</h3>
                            <p class="text-navy-600 text-sm mb-6 leading-relaxed line-clamp-3"
                                data-translate="media1_desc">A
                                comprehensive workshop bringing together stakeholders to discuss fiscal reform
                                strategies.</p>
                            <a href="#"
                                class="inline-flex items-center gap-2 text-navy-900 font-bold text-sm hover:text-teal-600 transition-colors">
                                <span data-translate="media_read">Read More</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </article>

                    <!-- Media Card 2 -->
                    <article
                        class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 group hover:shadow-xl transition-all">
                        <div class="aspect-video relative overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=600&q=80" alt="News"
                                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                        </div>
                        <div class="p-8">
                            <div class="flex items-center gap-3 text-sm text-muted mb-4">
                                <span class="font-medium text-teal-600" data-translate="media_date2">December 28,
                                    2025</span>
                            </div>
                            <h3 class="text-xl font-bold text-navy-900 mb-3 group-hover:text-teal-600 transition-colors"
                                data-translate="media2_title">Policy Dialogue on Budget Transparency</h3>
                            <p class="text-navy-600 text-sm mb-6 leading-relaxed line-clamp-3"
                                data-translate="media2_desc">
                                Expert panel discussion on enhancing budget transparency and citizen participation.</p>
                            <a href="#"
                                class="inline-flex items-center gap-2 text-navy-900 font-bold text-sm hover:text-teal-600 transition-colors">
                                <span data-translate="media_read">Read More</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>