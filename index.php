<?php
// Director image: use file named "Dr Yonis" in images folder (e.g. Dr-Yonis.jpg or Dr Yonis.jpg)
$director_img = 'images/Dr-Yonis.jpg';
if (!file_exists($director_img) && file_exists('images/Dr Yonis.jpg'))
    $director_img = 'images/Dr Yonis.jpg';
elseif (!file_exists($director_img) && file_exists('images/Dr-Yonis.png'))
    $director_img = 'images/Dr-Yonis.png';
include 'includes/header.php';
?>

<!-- Hero Carousel -->
<section id="home" class="relative h-screen min-h-[600px] max-h-[900px] overflow-hidden">
    <!-- Slides -->
    <div id="carousel" class="relative w-full h-full">
        <!-- Slide 1 -->
        <div class="carousel-slide active">
            <div class="absolute inset-0 bg-gradient-to-r from-navy-950 via-navy-900/95 to-navy-800/90"></div>
            <div class="absolute inset-0"
                style="background-image: url('https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=1920&q=80'); background-size: cover; background-position: center; mix-blend-mode: overlay; opacity: 0.4;">
            </div>
            <div class="relative h-full flex items-center">
                <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-3xl">
                        <div class="section-divider mb-6"></div>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight"
                            data-translate="hero_title1">Strengthening Financial Governance for Sustainable
                            Development</h1>
                        <p class="text-xl text-white/80 mb-8 font-light" data-translate="hero_subtitle1">Advancing
                            institutional excellence, policy innovation, and economic integrity in Somalia.</p>
                        <a href="index#workstreams" class="btn-primary inline-block" data-translate="hero_cta">Explore
                            Our Work</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 2 -->
        <div class="carousel-slide">
            <div class="absolute inset-0 bg-gradient-to-r from-navy-950 via-navy-900/95 to-navy-800/90"></div>
            <div class="absolute inset-0"
                style="background-image: url('https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?w=1920&q=80'); background-size: cover; background-position: center; mix-blend-mode: overlay; opacity: 0.4;">
            </div>
            <div class="relative h-full flex items-center">
                <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-3xl">
                        <div class="section-divider mb-6"></div>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight"
                            data-translate="hero_title2">Evidence-Based Policy & Capacity Development</h1>
                        <p class="text-xl text-white/80 mb-8 font-light" data-translate="hero_subtitle2">Driving
                            reform through research, collaboration, and knowledge sharing.</p>
                        <a href="index#workstreams" class="btn-primary inline-block" data-translate="hero_cta">Explore
                            Our Work</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Slide 3 -->
        <div class="carousel-slide">
            <div class="absolute inset-0 bg-gradient-to-r from-navy-950 via-navy-900/95 to-navy-800/90"></div>
            <div class="absolute inset-0"
                style="background-image: url('https://images.unsplash.com/photo-1521737711867-e3b97375f902?w=1920&q=80'); background-size: cover; background-position: center; mix-blend-mode: overlay; opacity: 0.4;">
            </div>
            <div class="relative h-full flex items-center">
                <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 w-full">
                    <div class="max-w-3xl">
                        <div class="section-divider mb-6"></div>
                        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight"
                            data-translate="hero_title3">Partnering for Good Governance</h1>
                        <p class="text-xl text-white/80 mb-8 font-light" data-translate="hero_subtitle3">Building
                            networks that strengthen transparency and accountability.</p>
                        <a href="index#workstreams" class="btn-primary inline-block" data-translate="hero_cta">Explore
                            Our Work</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Carousel Controls -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex items-center gap-4 z-10">
        <button id="prevSlide"
            class="w-12 h-12 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white hover:bg-white/20 transition-all flex items-center justify-center"
            aria-label="Previous slide">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </button>
        <div id="carouselDots" class="flex gap-2">
            <button class="carousel-dot w-3 h-3 rounded-full bg-white/50 transition-all active" data-slide="0"
                aria-label="Go to slide 1"></button>
            <button class="carousel-dot w-3 h-3 rounded-full bg-white/50 transition-all" data-slide="1"
                aria-label="Go to slide 2"></button>
            <button class="carousel-dot w-3 h-3 rounded-full bg-white/50 transition-all" data-slide="2"
                aria-label="Go to slide 3"></button>
        </div>
        <button id="nextSlide"
            class="w-12 h-12 rounded-full bg-white/10 backdrop-blur-sm border border-white/20 text-white hover:bg-white/20 transition-all flex items-center justify-center"
            aria-label="Next slide">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </button>
    </div>

    <!-- Scroll Indicator -->
    <div class="absolute bottom-8 right-8 hidden lg:flex flex-col items-center gap-2 text-white/60">
        <span class="text-xs uppercase tracking-widest rotate-90 origin-center translate-y-8">Scroll</span>
        <div class="w-px h-16 bg-gradient-to-b from-white/40 to-transparent"></div>
    </div>
</section>

<!-- Announcement Strip -->
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
                    <span data-translate="announcement_label">Latest Announcement</span>
                </span>
            </div>
            <p class="flex-1 text-navy-800 font-medium" data-translate="announcement_text">IFMG invites applications
                for the 2026 Public Financial Management Capacity Program.</p>
            <a href="announcements" class="btn-secondary text-sm whitespace-nowrap"
                data-translate="announcement_btn">View Announcement</a>
        </div>
    </div>
</section>

<!-- Publications Section -->
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
            <!-- Publication Card 1 -->
            <article class="publication-card bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
                <div class="h-48 bg-gradient-to-br from-navy-800 to-navy-900 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-20"
                        style="background-image: url('https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?w=400&q=80'); background-size: cover; background-position: center;">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <span
                        class="absolute top-4 left-4 px-3 py-1 bg-gold-500 text-navy-900 text-xs font-bold rounded uppercase"
                        data-translate="pub_cat_policy">Policy Paper</span>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-navy-900 mb-3" data-translate="pub1_title">Fiscal Reform
                        Strategy 2025</h3>
                    <p class="text-navy-600 text-sm mb-4 leading-relaxed" data-translate="pub1_desc">A comprehensive
                        analysis of fiscal policy reforms aimed at strengthening revenue mobilization and public
                        expenditure management.</p>
                    <button
                        class="inline-flex items-center gap-2 text-teal-600 font-semibold text-sm hover:gap-3 transition-all">
                        <span data-translate="pub_download">Download PDF</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </button>
                </div>
            </article>

            <!-- Publication Card 2 -->
            <article class="publication-card bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
                <div class="h-48 bg-gradient-to-br from-teal-700 to-teal-800 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-20"
                        style="background-image: url('https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=400&q=80'); background-size: cover; background-position: center;">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <span
                        class="absolute top-4 left-4 px-3 py-1 bg-white text-teal-700 text-xs font-bold rounded uppercase"
                        data-translate="pub_cat_working">Working Paper</span>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-navy-900 mb-3" data-translate="pub2_title">Public Sector
                        Budget Transparency</h3>
                    <p class="text-navy-600 text-sm mb-4 leading-relaxed" data-translate="pub2_desc">Examining
                        mechanisms for enhancing budget transparency and citizen engagement in public financial
                        management processes.</p>
                    <button
                        class="inline-flex items-center gap-2 text-teal-600 font-semibold text-sm hover:gap-3 transition-all">
                        <span data-translate="pub_download">Download PDF</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </button>
                </div>
            </article>

            <!-- Publication Card 3 -->
            <article class="publication-card bg-white rounded-xl overflow-hidden shadow-sm border border-gray-100">
                <div class="h-48 bg-gradient-to-br from-emerald-600 to-emerald-700 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-20"
                        style="background-image: url('https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=400&q=80'); background-size: cover; background-position: center;">
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <svg class="w-16 h-16 text-white/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                    </div>
                    <span
                        class="absolute top-4 left-4 px-3 py-1 bg-gold-500 text-navy-900 text-xs font-bold rounded uppercase"
                        data-translate="pub_cat_annual">Annual Report</span>
                </div>
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-navy-900 mb-3" data-translate="pub3_title">Annual Report
                        2024</h3>
                    <p class="text-navy-600 text-sm mb-4 leading-relaxed" data-translate="pub3_desc">A comprehensive
                        overview of IFMG's activities, achievements, and impact throughout the fiscal year 2024.</p>
                    <button
                        class="inline-flex items-center gap-2 text-teal-600 font-semibold text-sm hover:gap-3 transition-all">
                        <span data-translate="pub_download">Download PDF</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                    </button>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Workstreams Section -->
<section id="workstreams" class="py-20 lg:py-28 bg-white">
    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                data-translate="work_label">Programs</span>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-navy-900 mb-4" data-translate="work_title">
                Our Programs</h2>
            <div class="section-divider mx-auto"></div>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Workstream 1 -->
            <a href="capacity-building"
                class="group p-8 bg-[#F5F7FA] rounded-2xl hover:bg-navy-900 transition-all duration-500">
                <div
                    class="w-16 h-16 rounded-xl bg-teal-500/10 group-hover:bg-teal-500 flex items-center justify-center mb-6 transition-all duration-500">
                    <svg class="w-8 h-8 text-teal-600 group-hover:text-white transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-navy-900 group-hover:text-white mb-4 transition-colors"
                    data-translate="nav_training">Training and capacity building</h3>
                <p class="text-navy-600 group-hover:text-white/80 transition-colors text-sm leading-relaxed"
                    data-translate="work1_desc">Strengthening public financial management systems across government
                    institutions through specialized training.</p>
            </a>
            <!-- Workstream 2 -->
            <a href="certification"
                class="group p-8 bg-[#F5F7FA] rounded-2xl hover:bg-navy-900 transition-all duration-500">
                <div
                    class="w-16 h-16 rounded-xl bg-gold-500/10 group-hover:bg-gold-500 flex items-center justify-center mb-6 transition-all duration-500">
                    <svg class="w-8 h-8 text-gold-600 group-hover:text-navy-900 transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-navy-900 group-hover:text-white mb-4 transition-colors"
                    data-translate="nav_certification">Certification</h3>
                <p class="text-navy-600 group-hover:text-white/80 transition-colors text-sm leading-relaxed"
                    data-translate="cert_desc_short">Providing internationally recognized certification programs to
                    standardize professional practices.</p>
            </a>
            <!-- Workstream 3 -->
            <a href="research" class="group p-8 bg-[#F5F7FA] rounded-2xl hover:bg-navy-900 transition-all duration-500">
                <div
                    class="w-16 h-16 rounded-xl bg-emerald-500/10 group-hover:bg-emerald-500 flex items-center justify-center mb-6 transition-all duration-500">
                    <svg class="w-8 h-8 text-emerald-600 group-hover:text-white transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-navy-900 group-hover:text-white mb-4 transition-colors"
                    data-translate="nav_research">Research and innovation</h3>
                <p class="text-navy-600 group-hover:text-white/80 transition-colors text-sm leading-relaxed"
                    data-translate="work2_desc">Evidence-based research to inform fiscal policy and governance reforms
                    for national development.</p>
            </a>
            <!-- Workstream 4 -->
            <a href="policy" class="group p-8 bg-[#F5F7FA] rounded-2xl hover:bg-navy-900 transition-all duration-500">
                <div
                    class="w-16 h-16 rounded-xl bg-teal-500/10 group-hover:bg-teal-500 flex items-center justify-center mb-6 transition-all duration-500">
                    <svg class="w-8 h-8 text-teal-600 group-hover:text-white transition-colors" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold text-navy-900 group-hover:text-white mb-4 transition-colors"
                    data-translate="nav_policy">Policy & advisory</h3>
                <p class="text-navy-600 group-hover:text-white/80 transition-colors text-sm leading-relaxed"
                    data-translate="work3_desc">Facilitating dialogue and providing strategic advisory to strengthen
                    collaboration and integrity.</p>
            </a>
        </div>
    </div>
</section>

<!-- Executive Director Message -->
<section class="py-20 lg:py-28 bg-navy-900 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10"
        style="background-image: url('https://images.unsplash.com/photo-1557804506-669a67965ba0?w=1920&q=80'); background-size: cover; background-position: center;">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-navy-900 via-navy-900/95 to-navy-900/90"></div>

    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 relative">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-20 items-center">
            <!-- Director Image (Dr Yonis from images folder) -->
            <div class="relative">
                <div
                    class="relative aspect-[4/5] max-w-md mx-auto lg:mx-0 rounded-2xl overflow-hidden shadow-2xl ring-2 ring-white/10">
                    <img src="<?php echo htmlspecialchars($director_img); ?>"
                        alt="Dr. Yonis Ali Ahmed - Executive Director" class="w-full h-full object-cover object-top"
                        onerror="this.onerror=null; this.style.display='none'; this.nextElementSibling.classList.remove('hidden');">
                    <div
                        class="hidden absolute inset-0 w-full h-full bg-gradient-to-br from-navy-700 to-navy-800 flex items-center justify-center">
                        <svg class="w-32 h-32 text-white/20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                </div>
                <div
                    class="absolute -bottom-6 -right-6 lg:right-auto lg:-left-6 bg-gold-500 text-navy-900 p-6 rounded-xl shadow-xl max-w-xs">
                    <svg class="w-10 h-10 mb-3 opacity-50" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z" />
                    </svg>
                    <p class="text-sm font-medium italic" data-translate="director_quote">Leadership through
                        integrity and innovation.</p>
                </div>
            </div>

            <!-- Message Content -->
            <div>
                <span class="inline-block text-gold-500 font-semibold text-sm uppercase tracking-widest mb-3"
                    data-translate="director_label">Director's Message</span>
                <h2 class="text-3xl sm:text-4xl font-bold text-white mb-6" data-translate="director_name">Dr. Yonis
                    Ali Ahmed</h2>
                <p class="text-gold-500 font-medium mb-6" data-translate="director_title">Executive Director</p>
                <div class="w-20 h-1 bg-gradient-to-r from-gold-500 to-gold-600 rounded mb-8"></div>
                <blockquote class="text-lg text-white/80 leading-relaxed mb-8" data-translate="director_message">
                    The Institute of Financial Management and Good Governance is committed to strengthening
                    institutional integrity, financial discipline, and evidence-based policy development. Through
                    collaboration, research, and capacity-building, we aim to contribute to sustainable national
                    development and improved public sector performance.
                </blockquote>
                <button class="btn-secondary text-white border-white/30 hover:bg-white hover:text-navy-900"
                    data-translate="director_btn">Read Full Message</button>
            </div>
        </div>
    </div>
</section>

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
            <div
                class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col items-center justify-center min-h-[140px] hover:shadow-lg transition-all group">
                <img src="https://www.imf.org/-/media/Images/IMF/logo/IMF-logo-eng-sep2019-update.ashx" alt="IMF"
                    class="h-12 w-auto object-contain grayscale group-hover:grayscale-0 transition-all"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <span class="text-navy-700 font-semibold text-sm hidden">IMF</span>
                <p class="text-navy-600 text-sm font-medium mt-2">International Monetary Fund</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col items-center justify-center min-h-[140px] hover:shadow-lg transition-all group">
                <img src="https://www.undp.org/sites/g/files/zskgke326/files/migration/cn/UNDP-Logo-Blue.png" alt="UNDP"
                    class="h-12 w-auto object-contain grayscale group-hover:grayscale-0 transition-all"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <span class="text-navy-700 font-semibold text-sm hidden">UNDP</span>
                <p class="text-navy-600 text-sm font-medium mt-2">UNDP</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col items-center justify-center min-h-[140px] hover:shadow-lg transition-all group">
                <img src="https://www.worldbank.org/content/dam/wbr/logo/logo-wb-en.svg" alt="World Bank"
                    class="h-10 w-auto object-contain grayscale group-hover:grayscale-0 transition-all"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <span class="text-navy-700 font-semibold text-sm hidden">World Bank</span>
                <p class="text-navy-600 text-sm font-medium mt-2">World Bank</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col items-center justify-center min-h-[140px] hover:shadow-lg transition-all group">
                <div
                    class="w-14 h-14 rounded-full bg-navy-100 flex items-center justify-center text-navy-700 font-bold text-lg">
                    CBS</div>
                <p class="text-navy-600 text-sm font-medium mt-2">Central Bank of Somalia</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col items-center justify-center min-h-[140px] hover:shadow-lg transition-all group">
                <img src="https://www.afdb.org/templates/afdb/images/logo/afdb-logo-en.svg" alt="AfDB"
                    class="h-11 w-auto object-contain grayscale group-hover:grayscale-0 transition-all"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <span class="text-navy-700 font-semibold text-sm hidden">AfDB</span>
                <p class="text-navy-600 text-sm font-medium mt-2">African Development Bank</p>
            </div>
            <div
                class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex flex-col items-center justify-center min-h-[140px] hover:shadow-lg transition-all group">
                <img src="https://europa.eu/european-union/sites/default/files/logo_eu_en.svg" alt="European Union"
                    class="h-10 w-auto object-contain grayscale group-hover:grayscale-0 transition-all"
                    onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                <span class="text-navy-700 font-semibold text-sm hidden">EU</span>
                <p class="text-navy-600 text-sm font-medium mt-2">European Union</p>
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