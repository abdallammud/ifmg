<?php $current_page = 'policy';
include 'includes/header.php'; ?>

<main class="pt-20">
    <div class="bg-navy-900 py-16 text-white">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4" data-translate="nav_policy">Policy & Research Analysis</h1>
            <div class="flex gap-2 text-navy-200 text-sm">
                <a href="index" class="hover:text-gold-500">Home</a>
                <span>/</span>
                <a href="index#workstreams" class="hover:text-gold-500" data-translate="nav_workstreams">Workstreams</a>
                <span>/</span>
                <span class="text-white" data-translate="nav_policy">Policy & Research Analysis</span>
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
                        <a href="research" class="sidebar-link" data-translate="nav_research">Research and
                            innovation</a>
                        <a href="policy" class="sidebar-link active" data-translate="nav_policy">Policy & advisory</a>
                    </nav>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                    data-translate="work_label">What We Do</span>
                <h2 class="text-3xl font-bold text-navy-900 mb-6" data-translate="work2_title">Policy & Research
                    Analysis</h2>
                <div class="section-divider mb-8"></div>
                <p class="text-navy-600 text-lg leading-relaxed mb-8" data-translate="work2_desc">
                    We conduct evidence-based research to inform fiscal policy and governance reforms for sustainable
                    national development.
                </p>

                <div class="grid md:grid-cols-2 gap-8 mb-12">
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 rounded-xl bg-emerald-500/10 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-navy-900 mb-3">Fiscal Policy Research</h3>
                        <p class="text-navy-600">Analysis of revenue, expenditure, debt, and macroeconomic trends to
                            support policy decisions.</p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 rounded-xl bg-navy-500/10 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-navy-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-navy-900 mb-3">Policy Papers & Briefs</h3>
                        <p class="text-navy-600">Rigorous studies and recommendations on PFM, governance, and
                            institutional reform.</p>
                    </div>
                </div>

                <div class="bg-navy-50 rounded-2xl p-8 border border-navy-100">
                    <h3 class="text-xl font-semibold text-navy-900 mb-4">Research Areas</h3>
                    <ul class="space-y-3 text-navy-600">
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Revenue mobilization and tax policy</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Public expenditure and budget transparency</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Debt sustainability and management</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Governance and anti-corruption</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>