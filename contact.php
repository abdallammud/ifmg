<?php $current_page = 'contact'; include 'includes/header.php'; ?>

<main class="pt-20">
    <div class="bg-navy-900 py-16 text-white">
        <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-bold mb-4" data-translate="nav_contact">Contact Us</h1>
            <div class="flex gap-2 text-navy-200 text-sm">
                <a href="index" class="hover:text-gold-500">Home</a>
                <span>/</span>
                <span class="text-white" data-translate="nav_contact">Contact Us</span>
            </div>
        </div>
    </div>

    <div class="max-w-[1300px] mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid lg:grid-cols-3 gap-12">
            <!-- Contact Info -->
            <div class="lg:col-span-1 space-y-8">
                <div>
                    <span class="inline-block text-teal-600 font-semibold text-sm uppercase tracking-widest mb-4" data-translate="footer_contact">Contact</span>
                    <h2 class="text-2xl font-bold text-navy-900 mb-6">Get in Touch</h2>
                    <div class="section-divider mb-8"></div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-teal-500/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-navy-900 mb-1">Email</h4>
                            <a href="mailto:info@ifmg.gov.so" class="text-navy-600 hover:text-teal-600 transition-colors">info@ifmg.gov.so</a>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-gold-500/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-gold-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-navy-900 mb-1">Phone</h4>
                            <span class="text-navy-600">+252 XXX XXX</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
                    <div class="flex items-start gap-4">
                        <div class="w-12 h-12 rounded-xl bg-emerald-500/10 flex items-center justify-center flex-shrink-0">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-navy-900 mb-1" data-translate="footer_location">Location</h4>
                            <span class="text-navy-600">Mogadishu, Somalia</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-8 lg:p-10">
                    <h2 class="text-2xl font-bold text-navy-900 mb-2">Send a Message</h2>
                    <p class="text-navy-600 mb-8">We will respond as soon as possible.</p>
                    <form class="space-y-6" id="contactForm">
                        <div class="grid sm:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-navy-900 mb-2">Your Name</label>
                                <input type="text" id="name" name="name" required class="form-input" placeholder="Full name">
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-navy-900 mb-2">Email</label>
                                <input type="email" id="email" name="email" required class="form-input" placeholder="you@example.com">
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-navy-900 mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" class="form-input" placeholder="Subject">
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-navy-900 mb-2">Message</label>
                            <textarea id="message" name="message" rows="5" required class="form-input resize-none" placeholder="Your message..."></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full sm:w-auto">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>
