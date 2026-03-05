<?php $current_page = 'capacity-building';
include 'includes/header.php'; ?>

<main class="pt-20">
    <div class="bg-navy-900 py-16 text-white">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4" data-translate="nav_capacity">Capacity Development</h1>
            <div class="flex gap-2 text-navy-200 text-sm">
                <a href="index" class="hover:text-gold-500">Home</a>
                <span>/</span>
                <a href="index#workstreams" class="hover:text-gold-500" data-translate="nav_workstreams">Workstreams</a>
                <span>/</span>
                <span class="text-white" data-translate="nav_capacity">Capacity Development</span>
            </div>
        </div>
    </div>

    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-4 gap-12">
            <aside class="lg:col-span-1">
                <div class="sticky top-28">
                    <h3 class="font-bold text-navy-900 mb-6 uppercase tracking-wider text-xs">Programs</h3>
                    <nav class="sidebar-nav">
                        <a href="capacity-building" class="sidebar-link active" data-translate="nav_training">Training
                            and capacity building</a>
                        <a href="certification" class="sidebar-link"
                            data-translate="nav_certification">Certification</a>
                        <a href="research" class="sidebar-link" data-translate="nav_research">Research and
                            innovation</a>
                        <a href="policy" class="sidebar-link" data-translate="nav_policy">Policy & advisory</a>
                    </nav>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                    data-translate="work_label">What We Do</span>
                <h2 class="text-3xl font-bold text-navy-900 mb-6" data-translate="work1_title">Capacity Development</h2>
                <div class="section-divider mb-8"></div>
                <p class="text-navy-600 text-lg leading-relaxed mb-8" data-translate="work1_desc">
                    We design and implement training programs to strengthen public financial management systems across
                    government institutions.
                </p>

                <div class="grid md:grid-cols-2 gap-8 mb-12">
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 rounded-xl bg-teal-500/10 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-navy-900 mb-3">PFM Training Programs</h3>
                        <p class="text-navy-600">Structured courses on budgeting, accounting, procurement, and fiscal
                            reporting for public sector officials.</p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 rounded-xl bg-gold-500/10 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-gold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-navy-900 mb-3">Institutional Strengthening</h3>
                        <p class="text-navy-600">Tailored support to ministries and agencies to improve systems,
                            processes, and internal controls.</p>
                    </div>
                </div>

                <div class="bg-navy-50 rounded-2xl p-8 border border-navy-100">
                    <h3 class="text-xl font-semibold text-navy-900 mb-4">Programs & Initiatives</h3>
                    <ul class="space-y-3 text-navy-600">
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            Public Financial Management Capacity Program</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            Budget Execution & Treasury Management</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-teal-500"></span>
                            Procurement & Contract Management</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-teal-500"></span> Audit
                            & Internal Control</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>