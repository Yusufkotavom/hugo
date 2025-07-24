<?php
/**
 * Template Name: Temoakte Flowbite Pro Demo
 * 
 * This template demonstrates Flowbite Pro components integrated with Temoakte system
 * 
 * @package Blocksy_Child_Temoakte
 */

get_header('temoakte-flowbite'); ?>

<main id="primary" class="site-main bg-white">
    
    <!-- Hero Section with Flowbite Pro -->
    <section class="bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800">
        <div class="py-16 lg:py-24">
            <div class="temoakte-content">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl lg:text-6xl">
                        Temoakte + Flowbite Pro
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-blue-100 max-w-3xl mx-auto">
                        Kombinasi sempurna antara sistem custom Temoakte dengan komponen modern Flowbite Pro dan Tailwind CSS untuk pengalaman pengembangan yang luar biasa.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6 flex-wrap">
                        <a href="#components" class="rounded-lg bg-white px-6 py-3 text-base font-semibold text-blue-600 shadow-sm hover:bg-blue-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white transition-all duration-200">
                            Lihat Komponen
                        </a>
                        <a href="#portfolio" class="text-base font-semibold leading-6 text-white hover:text-blue-100 transition-colors duration-200">
                            Portfolio →
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Feature Cards with Flowbite Pro -->
    <section id="components" class="py-16 bg-gray-50">
        <div class="temoakte-content">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 sm:text-4xl">Fitur Utama</h2>
                <p class="mt-4 text-lg text-gray-600">Integrasi sempurna dengan teknologi modern</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Feature Card 1 -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 p-6 border border-gray-100">
                    <div class="flex items-center justify-center w-12 h-12 bg-blue-100 rounded-lg mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Custom Post Types</h3>
                    <p class="text-gray-600">Portfolio, Services, dan Testimonials dengan meta fields lengkap untuk manajemen konten yang mudah.</p>
                </div>

                <!-- Feature Card 2 -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 p-6 border border-gray-100">
                    <div class="flex items-center justify-center w-12 h-12 bg-purple-100 rounded-lg mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Tailwind CSS</h3>
                    <p class="text-gray-600">Utility-first CSS framework untuk styling yang cepat dan konsisten dengan kustomisasi penuh.</p>
                </div>

                <!-- Feature Card 3 -->
                <div class="bg-white rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 p-6 border border-gray-100">
                    <div class="flex items-center justify-center w-12 h-12 bg-green-100 rounded-lg mb-4">
                        <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">Flowbite Pro</h3>
                    <p class="text-gray-600">Komponen UI yang siap pakai dengan interaktivitas JavaScript untuk pengalaman pengguna yang superior.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Flowbite Pro Alert Component -->
    <div class="temoakte-content my-8">
        <div class="flex items-center p-4 mb-4 text-sm text-blue-800 border border-blue-300 rounded-lg bg-blue-50" role="alert">
            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
            </svg>
            <span class="sr-only">Info</span>
            <div>
                <span class="font-medium">Info:</span> Semua komponen di halaman ini menggunakan Flowbite Pro dan Tailwind CSS yang sudah terintegrasi dengan sistem Temoakte.
            </div>
        </div>
    </div>

    <!-- Flowbite Pro Tabs Component -->
    <section class="py-16">
        <div class="temoakte-content">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Showcase Komponen</h2>
            
            <div class="mb-4 border-b border-gray-200">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="portfolio-tab" data-tabs-target="#portfolio-content" type="button" role="tab" aria-controls="portfolio" aria-selected="false">Portfolio</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="services-tab" data-tabs-target="#services-content" type="button" role="tab" aria-controls="services" aria-selected="false">Services</button>
                    </li>
                    <li class="mr-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="testimonials-tab" data-tabs-target="#testimonials-content" type="button" role="tab" aria-controls="testimonials" aria-selected="false">Testimonials</button>
                    </li>
                    <li role="presentation">
                        <button class="inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300" id="contact-tab" data-tabs-target="#contact-content" type="button" role="tab" aria-controls="contact" aria-selected="false">Contact</button>
                    </li>
                </ul>
            </div>

            <div id="default-tab-content">
                <!-- Portfolio Tab -->
                <div class="hidden p-4 rounded-lg bg-gray-50" id="portfolio-content" role="tabpanel" aria-labelledby="portfolio-tab">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Portfolio Temoakte</h3>
                    <?php echo do_shortcode('[temoakte_portfolio limit="6" columns="3"]'); ?>
                </div>

                <!-- Services Tab -->
                <div class="hidden p-4 rounded-lg bg-gray-50" id="services-content" role="tabpanel" aria-labelledby="services-tab">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Layanan Kami</h3>
                    <?php echo do_shortcode('[temoakte_services limit="6" columns="3"]'); ?>
                </div>

                <!-- Testimonials Tab -->
                <div class="hidden p-4 rounded-lg bg-gray-50" id="testimonials-content" role="tabpanel" aria-labelledby="testimonials-tab">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Testimoni Klien</h3>
                    <?php echo do_shortcode('[temoakte_testimonials limit="3" columns="3"]'); ?>
                </div>

                <!-- Contact Tab -->
                <div class="hidden p-4 rounded-lg bg-gray-50" id="contact-content" role="tabpanel" aria-labelledby="contact-tab">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Hubungi Kami</h3>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                        <div>
                            <?php echo do_shortcode('[temoakte_contact_form title="Kirim Pesan" button_text="Kirim Pesan"]'); ?>
                        </div>
                        <div class="bg-white p-6 rounded-lg shadow-lg">
                            <h4 class="text-lg font-semibold text-gray-900 mb-4">Informasi Kontak</h4>
                            <div class="space-y-3">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>hello@temoakte.com</span>
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <span>+62 123 456 789</span>
                                </div>
                                <div class="flex items-start">
                                    <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    <span>Jakarta, Indonesia</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Flowbite Pro Carousel Component -->
    <section class="py-16 bg-gray-50">
        <div class="temoakte-content">
            <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Galeri Proyek</h2>
            
            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center">
                            <div class="text-center text-white">
                                <h3 class="text-2xl font-bold mb-2">Proyek Web Development</h3>
                                <p class="text-lg">Custom WordPress themes dengan teknologi modern</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-gradient-to-r from-green-400 to-blue-500 flex items-center justify-center">
                            <div class="text-center text-white">
                                <h3 class="text-2xl font-bold mb-2">E-commerce Solutions</h3>
                                <p class="text-lg">Toko online dengan fitur lengkap dan modern</p>
                            </div>
                        </div>
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <div class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 bg-gradient-to-r from-purple-400 to-pink-500 flex items-center justify-center">
                            <div class="text-center text-white">
                                <h3 class="text-2xl font-bold mb-2">Mobile App Development</h3>
                                <p class="text-lg">Aplikasi mobile dengan UI/UX yang menarik</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                </div>
                
                <!-- Slider controls -->
                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 group-hover:bg-white/50 group-focus:ring-4 group-focus:ring-white group-focus:outline-none">
                        <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
    </section>

    <!-- Statistics Section with Counter Animation -->
    <section class="py-16 bg-white">
        <div class="temoakte-content">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Statistik Kami</h2>
                <p class="text-lg text-gray-600">Pencapaian yang membanggakan dalam pengembangan web</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-2" data-counter="150">0</div>
                    <div class="text-gray-600">Proyek Selesai</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-2" data-counter="75">0</div>
                    <div class="text-gray-600">Klien Puas</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-2" data-counter="5">0</div>
                    <div class="text-gray-600">Tahun Pengalaman</div>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-blue-600 mb-2" data-counter="24">0</div>
                    <div class="text-gray-600">Jam Support</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action with Flowbite Pro -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600">
        <div class="temoakte-content">
            <div class="text-center">
                <h2 class="text-3xl font-bold text-white mb-4">Siap Memulai Proyek Anda?</h2>
                <p class="text-xl text-blue-100 mb-8 max-w-2xl mx-auto">
                    Mari bekerja sama untuk menciptakan sesuatu yang luar biasa dengan teknologi terdepan
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <button type="button" class="text-blue-600 bg-white hover:bg-blue-50 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-8 py-4 transition-all duration-200">
                        Mulai Proyek
                    </button>
                    <button type="button" class="text-white border-2 border-white hover:bg-white hover:text-blue-600 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-lg px-8 py-4 transition-all duration-200">
                        Konsultasi Gratis
                    </button>
                </div>
            </div>
        </div>
    </section>

</main><!-- #main -->

<script>
// Counter Animation
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('[data-counter]');
    const speed = 2000; // Animation duration in milliseconds

    const animateCounter = (counter) => {
        const target = +counter.getAttribute('data-counter');
        const count = +counter.innerText;
        const increment = target / (speed / 16); // 60fps

        if (count < target) {
            counter.innerText = Math.ceil(count + increment);
            setTimeout(() => animateCounter(counter), 16);
        } else {
            counter.innerText = target;
        }
    };

    // Intersection Observer for counters
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    });

    counters.forEach(counter => {
        observer.observe(counter);
    });
});
</script>

<?php get_footer('temoakte'); ?>