<?php $current_page = 'research';
include 'includes/header.php'; ?>

<main class="pt-20">
    <div class="bg-navy-900 py-16 text-white">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4" data-translate="research_title">Research & Innovation</h1>
            <div class="flex gap-2 text-navy-200 text-sm">
                <a href="index" class="hover:text-gold-500">Home</a>
                <span>/</span>
                <span class="text-navy-200" data-translate="nav_programs">Programs</span>
                <span>/</span>
                <span class="text-white" data-translate="nav_research">Research and innovation</span>
            </div>
        </div>
    </div>

    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-4 gap-12">
            <aside class="lg:col-span-1">
                <div class="sticky top-28">
                    <h3 class="font-bold text-navy-900 mb-6 uppercase tracking-wider text-xs">Programs</h3>
                    <nav class="sidebar-nav">
                        <a href="capacity-building" class="sidebar-link" data-translate="nav_training">Training and
                            capacity building</a>
                        <a href="certification" class="sidebar-link"
                            data-translate="nav_certification">Certification</a>
                        <a href="research" class="sidebar-link active" data-translate="nav_research">Research and
                            innovation</a>
                        <a href="policy" class="sidebar-link" data-translate="nav_policy">Policy & advisory</a>
                    </nav>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                    data-translate="research_label">Future Thinking</span>
                <h2 class="text-3xl font-bold text-navy-900 mb-6" data-translate="research_title">Research & Innovation
                </h2>
                <div class="section-divider mb-8"></div>
                <p class="text-navy-600 text-lg leading-relaxed mb-8" data-translate="research_desc">
                    IFMG is committed to driving innovation in public financial management through evidence-based
                    research and the exploration of new governance models for the digital age.
                </p>

                <div class="grid md:grid-cols-2 gap-8 mb-12">
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 rounded-xl bg-teal-500/10 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-navy-900 mb-3">IFMG Research Lab</h3>
                        <p class="text-navy-600">Our dedicated lab for prototyping digital governance tools and
                            analyzing Big Data for fiscal transparency.</p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 rounded-xl bg-emerald-500/10 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-navy-900 mb-3">Innovation Grants</h3>
                        <p class="text-navy-600">Supporting external researchers and startups developing breakthrough
                            solutions for public sector integrity.</p>
                    </div>
                </div>

                <div class="bg-navy-50 rounded-2xl p-8 border border-navy-100">
                    <h3 class="text-xl font-semibold text-navy-900 mb-4">Core Research Priorities</h3>
                    <ul class="space-y-3 text-navy-600">
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            Blockchain for budget reconciliation.</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            AI-assisted auditing and risk detection.</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            Citizen-centric fiscal participatory models.</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            Sustainable financing and Green PFM.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>