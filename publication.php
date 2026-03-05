<?php $current_page = 'publication'; include 'includes/header.php'; ?>

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
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy-900 mb-4" data-translate="pub_title">Recent Publications</h2>
                <div class="section-divider mx-auto"></div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <article class="publication-card bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
                    <div class="h-48 bg-gradient-to-br from-navy-800 to-navy-900 relative overflow-hidden">
                        <div class="absolute inset-0 opacity-20"
                            style="background-image: url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=400&q=80'); background-size: cover; background-position: center;"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="absolute top-4 left-4 px-3 py-1 bg-gold-500 text-navy-900 text-xs font-bold rounded uppercase" data-translate="pub_cat_policy">Policy Paper</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-navy-900 mb-3" data-translate="pub1_title">Fiscal Reform Strategy 2025</h3>
                        <p class="text-navy-600 text-sm mb-4 leading-relaxed" data-translate="pub1_desc">A comprehensive analysis of fiscal policy reforms aimed at strengthening revenue mobilization and public expenditure management.</p>
                        <button class="inline-flex items-center gap-2 text-teal-600 font-semibold text-sm hover:gap-3 transition-all">
                            <span data-translate="pub_download">Download PDF</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                        </button>
                    </div>
                </article>

                <article class="publication-card bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
                    <div class="h-48 bg-gradient-to-br from-teal-700 to-teal-800 relative overflow-hidden">
                        <div class="absolute inset-0 opacity-20"
                            style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&q=80'); background-size: cover; background-position: center;"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="absolute top-4 left-4 px-3 py-1 bg-white text-teal-700 text-xs font-bold rounded uppercase" data-translate="pub_cat_working">Working Paper</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-navy-900 mb-3" data-translate="pub2_title">Public Sector Budget Transparency</h3>
                        <p class="text-navy-600 text-sm mb-4 leading-relaxed" data-translate="pub2_desc">Examining mechanisms for enhancing budget transparency and citizen engagement in public financial management processes.</p>
                        <button class="inline-flex items-center gap-2 text-teal-600 font-semibold text-sm hover:gap-3 transition-all">
                            <span data-translate="pub_download">Download PDF</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                        </button>
                    </div>
                </article>

                <article class="publication-card bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
                    <div class="h-48 bg-gradient-to-br from-emerald-600 to-emerald-700 relative overflow-hidden">
                        <div class="absolute inset-0 opacity-20"
                            style="background-image: url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=400&q=80'); background-size: cover; background-position: center;"></div>
                        <div class="absolute inset-0 flex items-center justify-center">
                            <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="absolute top-4 left-4 px-3 py-1 bg-gold-500 text-navy-900 text-xs font-bold rounded uppercase" data-translate="pub_cat_annual">Annual Report</span>
                    </div>
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-navy-900 mb-3" data-translate="pub3_title">Annual Report 2024</h3>
                        <p class="text-navy-600 text-sm mb-4 leading-relaxed" data-translate="pub3_desc">A comprehensive overview of IFMG's activities, achievements, and impact throughout the fiscal year 2024.</p>
                        <button class="inline-flex items-center gap-2 text-teal-600 font-semibold text-sm hover:gap-3 transition-all">
                            <span data-translate="pub_download">Download PDF</span>
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" /></svg>
                        </button>
                    </div>
                </article>
            </div>
        </div>
    </section>
</main>

<?php include 'includes/footer.php'; ?>
