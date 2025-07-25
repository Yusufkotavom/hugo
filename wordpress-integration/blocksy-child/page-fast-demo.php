<?php
/**
 * Template Name: Fast Temoakte Demo
 * High-performance static-like page with local assets
 */

get_header(); ?>

<div class="temoakte-fast-page">
    <!-- Hero Section - Above the fold, critical CSS inlined -->
    <section class="bg-gradient-to-br from-blue-600 to-blue-800 text-white py-20">
        <div class="temoakte-content text-center">
            <h1 class="text-5xl font-bold mb-6 animate-on-scroll">
                Fast Temoakte Demo
            </h1>
            <p class="text-xl mb-8 max-w-2xl mx-auto animate-on-scroll">
                Experience lightning-fast WordPress with local Tailwind CSS and Flowbite Pro integration
            </p>
            <div class="space-x-4 animate-on-scroll">
                <button data-modal-target="demo-modal" data-modal-toggle="demo-modal" 
                        class="temoakte-btn temoakte-btn-primary temoakte-btn-large bg-white text-blue-600 hover:bg-gray-100">
                    View Demo Modal
                </button>
                <button data-drawer-target="demo-drawer" 
                        class="temoakte-btn temoakte-btn-primary temoakte-btn-large bg-transparent border-2 border-white hover:bg-white hover:text-blue-600">
                    Open Drawer
                </button>
            </div>
        </div>
    </section>

    <!-- Features Grid - Static content for speed -->
    <section class="py-16 bg-gray-50">
        <div class="temoakte-content">
            <h2 class="text-3xl font-bold text-center mb-12 animate-on-scroll">
                Performance Features
            </h2>
            
            <div class="temoakte-grid temoakte-grid-3">
                <div class="temoakte-card text-center animate-on-scroll">
                    <div class="text-4xl mb-4">⚡</div>
                    <h3 class="text-xl font-semibold mb-3">Local Assets</h3>
                    <p class="text-gray-600">All CSS and JS loaded locally for maximum speed and reliability</p>
                </div>
                
                <div class="temoakte-card text-center animate-on-scroll">
                    <div class="text-4xl mb-4">🚀</div>
                    <h3 class="text-xl font-semibold mb-3">Critical CSS</h3>
                    <p class="text-gray-600">Above-the-fold styles inlined for instant rendering</p>
                </div>
                
                <div class="temoakte-card text-center animate-on-scroll">
                    <div class="text-4xl mb-4">📱</div>
                    <h3 class="text-xl font-semibold mb-3">Mobile First</h3>
                    <p class="text-gray-600">Optimized for all devices with responsive design</p>
                </div>
                
                <div class="temoakte-card text-center animate-on-scroll">
                    <div class="text-4xl mb-4">💾</div>
                    <h3 class="text-xl font-semibold mb-3">Smart Caching</h3>
                    <p class="text-gray-600">Intelligent caching for static-like performance</p>
                </div>
                
                <div class="temoakte-card text-center animate-on-scroll">
                    <div class="text-4xl mb-4">🎨</div>
                    <h3 class="text-xl font-semibold mb-3">Flowbite Pro</h3>
                    <p class="text-gray-600">Beautiful UI components ready to use</p>
                </div>
                
                <div class="temoakte-card text-center animate-on-scroll">
                    <div class="text-4xl mb-4">⚙️</div>
                    <h3 class="text-xl font-semibold mb-3">Tailwind CSS</h3>
                    <p class="text-gray-600">Utility-first CSS framework for rapid development</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section - Cached for performance -->
    <section class="py-16">
        <div class="temoakte-content">
            <h2 class="text-3xl font-bold text-center mb-12 animate-on-scroll">
                Portfolio Showcase
            </h2>
            
            <?php echo do_shortcode('[temoakte_portfolio limit="6" columns="3"]'); ?>
        </div>
    </section>

    <!-- Services Section - Cached for performance -->
    <section class="py-16 bg-gray-50">
        <div class="temoakte-content">
            <h2 class="text-3xl font-bold text-center mb-12 animate-on-scroll">
                Our Services
            </h2>
            
            <?php echo do_shortcode('[temoakte_services limit="6" columns="3"]'); ?>
        </div>
    </section>

    <!-- Contact Form Section -->
    <section class="py-16">
        <div class="temoakte-content">
            <h2 class="text-3xl font-bold text-center mb-12 animate-on-scroll">
                Get In Touch
            </h2>
            
            <?php echo do_shortcode('[temoakte_contact_form title="Contact Us Today"]'); ?>
        </div>
    </section>

    <!-- Stats Section with Animation -->
    <section class="py-16 bg-blue-600 text-white">
        <div class="temoakte-content">
            <div class="temoakte-grid temoakte-grid-4 text-center">
                <div class="animate-on-scroll">
                    <div class="text-4xl font-bold mb-2" data-counter="100">0</div>
                    <div class="text-blue-200">Projects Completed</div>
                </div>
                <div class="animate-on-scroll">
                    <div class="text-4xl font-bold mb-2" data-counter="50">0</div>
                    <div class="text-blue-200">Happy Clients</div>
                </div>
                <div class="animate-on-scroll">
                    <div class="text-4xl font-bold mb-2" data-counter="99">0</div>
                    <div class="text-blue-200">Page Speed Score</div>
                </div>
                <div class="animate-on-scroll">
                    <div class="text-4xl font-bold mb-2" data-counter="24">0</div>
                    <div class="text-blue-200">Hours Support</div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Demo Modal -->
<div id="demo-modal" tabindex="-1" aria-hidden="true" 
     class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full mx-auto">
        <div class="relative bg-white rounded-lg shadow">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t">
                <h3 class="text-xl font-semibold text-gray-900">
                    Temoakte Demo Modal
                </h3>
                <button type="button" data-modal-hide="demo-modal" 
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500">
                    This is a fast-loading modal using Flowbite Pro components with local assets. 
                    No external dependencies, maximum performance!
                </p>
                <div class="grid grid-cols-2 gap-4">
                    <div class="p-4 bg-blue-50 rounded-lg">
                        <h4 class="font-semibold text-blue-900">Local Loading</h4>
                        <p class="text-sm text-blue-700">All assets loaded from your server</p>
                    </div>
                    <div class="p-4 bg-green-50 rounded-lg">
                        <h4 class="font-semibold text-green-900">Fast Rendering</h4>
                        <p class="text-sm text-green-700">Critical CSS inlined for speed</p>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b">
                <button data-modal-hide="demo-modal" type="button" 
                        class="temoakte-btn temoakte-btn-primary">
                    Perfect!
                </button>
                <button data-modal-hide="demo-modal" type="button" 
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Demo Drawer -->
<div id="demo-drawer" 
     class="fixed top-0 left-0 z-50 w-80 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white border-r border-gray-200" 
     tabindex="-1" aria-labelledby="drawer-label">
    <h5 id="drawer-label" class="text-base font-semibold text-gray-500 uppercase">
        Navigation Menu
    </h5>
    <button type="button" data-drawer-hide="demo-drawer" 
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 right-2.5 inline-flex items-center justify-center">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
        </svg>
    </button>
    
    <div class="py-4 overflow-y-auto">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <span class="ml-3">Home</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <span class="ml-3">Portfolio</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <span class="ml-3">Services</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <span class="ml-3">About</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-100">
                    <span class="ml-3">Contact</span>
                </a>
            </li>
        </ul>
        
        <div class="mt-6 p-4 bg-blue-50 rounded-lg">
            <h6 class="text-sm font-semibold text-blue-900 mb-2">Fast Loading</h6>
            <p class="text-xs text-blue-700">This drawer opens instantly with local assets and optimized JavaScript.</p>
        </div>
    </div>
</div>

<!-- Counter Animation Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Counter animation
    function animateCounters() {
        const counters = document.querySelectorAll('[data-counter]');
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-counter'));
                    const duration = 2000; // 2 seconds
                    const step = target / (duration / 16); // 60 FPS
                    let current = 0;
                    
                    const timer = setInterval(() => {
                        current += step;
                        if (current >= target) {
                            counter.textContent = target;
                            clearInterval(timer);
                        } else {
                            counter.textContent = Math.floor(current);
                        }
                    }, 16);
                    
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => observer.observe(counter));
    }
    
    animateCounters();
});
</script>

<style>
/* Animation styles for smooth entrance */
.animate-on-scroll {
    opacity: 0;
    transform: translateY(30px);
    transition: all 0.6s ease-out;
}

.animate-on-scroll.animate-in {
    opacity: 1;
    transform: translateY(0);
}

/* Performance optimizations */
.temoakte-card {
    will-change: transform;
}

.temoakte-card:hover {
    transform: translateY(-8px);
}

/* Preload hover states */
.temoakte-btn:hover {
    transform: translateY(-2px);
}
</style>

<?php get_footer(); ?>