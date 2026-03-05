<?php $current_page = 'certification';
include 'includes/header.php'; ?>

<main class="pt-20">
    <div class="bg-navy-900 py-16 text-white">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4" data-translate="certification_title">Certification Programs</h1>
            <div class="flex gap-2 text-navy-200 text-sm">
                <a href="index" class="hover:text-gold-500">Home</a>
                <span>/</span>
                <span class="text-navy-200" data-translate="nav_programs">Programs</span>
                <span>/</span>
                <span class="text-white" data-translate="nav_certification">Certification</span>
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
                        <a href="certification" class="sidebar-link active"
                            data-translate="nav_certification">Certification</a>
                        <a href="research" class="sidebar-link" data-translate="nav_research">Research and
                            innovation</a>
                        <a href="policy" class="sidebar-link" data-translate="nav_policy">Policy & advisory</a>
                    </nav>
                </div>
            </aside>

            <div class="lg:col-span-3">
                <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-3"
                    data-translate="cert_label">Professional Standards</span>
                <h2 class="text-3xl font-bold text-navy-900 mb-6" data-translate="cert_title">Certification Programs
                </h2>
                <div class="section-divider mb-8"></div>
                <p class="text-navy-600 text-lg leading-relaxed mb-8" data-translate="cert_desc">
                    IFMG provides internationally recognized certification programs designed to standardize professional
                    practices in public financial management and governance.
                </p>

                <div class="grid md:grid-cols-2 gap-8 mb-12">
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 rounded-xl bg-gold-500/10 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-gold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-navy-900 mb-3">PFM Specialist Certification</h3>
                        <p class="text-navy-600">Advanced certification for professionals specializing in public sector
                            accounting, auditing, and financial reporting.</p>
                    </div>
                    <div class="bg-white p-8 rounded-2xl shadow-sm border border-gray-100">
                        <div class="w-14 h-14 rounded-xl bg-navy-500/10 flex items-center justify-center mb-6">
                            <svg class="w-7 h-7 text-navy-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                        </div>
                        <h3 class="text-xl font-semibold text-navy-900 mb-3">Governance & Ethics Certificate</h3>
                        <p class="text-navy-600">A rigorous program focusing on institutional integrity, ethical
                            leadership, and anti-corruption frameworks.</p>
                    </div>
                </div>

                <div class="bg-navy-50 rounded-2xl p-8 border border-navy-100">
                    <h3 class="text-xl font-semibold text-navy-900 mb-4">Why Get Certified?</h3>
                    <ul class="space-y-3 text-navy-600">
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-gold-500"></span>
                            Enhance your professional credibility and marketability.</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-gold-500"></span>
                            Master internationally recognized PFM standards.</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-gold-500"></span> Join
                            a network of certified governance professionals.</li>
                        <li class="flex items-center gap-2"><span class="w-2 h-2 rounded-full bg-gold-500"></span>
                            Contribute to institutional excellence in the public sector.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>