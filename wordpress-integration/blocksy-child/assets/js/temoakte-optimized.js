/*!
 * Temoakte Optimized JS - Fast Loading for Static-like Performance
 * Minimal dependencies, maximum speed
 */

(function() {
    'use strict';

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initTemoakte);
    } else {
        initTemoakte();
    }

    function initTemoakte() {
        // Initialize core components
        initFastContactForm();
        initFlowbiteComponents();
        initPerformanceOptimizations();
        
        // Lazy load non-critical features
        setTimeout(() => {
            initEnhancements();
        }, 100);
    }

    /**
     * Fast contact form with minimal overhead
     */
    function initFastContactForm() {
        const contactForm = document.getElementById('temoakte-fast-contact');
        if (!contactForm) return;

        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const responseDiv = document.getElementById('contact-response');
            
            // Show loading state
            const originalText = submitBtn.textContent;
            submitBtn.textContent = 'Sending...';
            submitBtn.disabled = true;
            
            // Prepare AJAX data
            const data = {
                action: 'temoakte_contact',
                name: formData.get('name'),
                email: formData.get('email'),
                subject: formData.get('subject'),
                message: formData.get('message'),
                nonce: temoakte_ajax.nonce
            };

            // Send via fetch for better performance
            fetch(temoakte_ajax.ajax_url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(data)
            })
            .then(response => response.json())
            .then(result => {
                responseDiv.className = 'mt-4 p-3 rounded-lg ' + 
                    (result.success ? 'bg-green-50 text-green-800 border border-green-200' : 'bg-red-50 text-red-800 border border-red-200');
                responseDiv.textContent = result.data;
                responseDiv.classList.remove('hidden');
                
                if (result.success) {
                    contactForm.reset();
                }
            })
            .catch(error => {
                responseDiv.className = 'mt-4 p-3 rounded-lg bg-red-50 text-red-800 border border-red-200';
                responseDiv.textContent = 'Network error. Please try again.';
                responseDiv.classList.remove('hidden');
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
        });
    }

    /**
     * Initialize essential Flowbite components
     */
    function initFlowbiteComponents() {
        // Initialize Flowbite if available
        if (window.Flowbite && typeof window.Flowbite.init === 'function') {
            window.Flowbite.init();
        }

        // Manual modal initialization for better control
        initModals();
        initDrawers();
        initDropdowns();
    }

    /**
     * Fast modal implementation
     */
    function initModals() {
        const modalTriggers = document.querySelectorAll('[data-modal-target]');
        const modalHiders = document.querySelectorAll('[data-modal-hide]');
        
        modalTriggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-modal-target');
                const modal = document.querySelector(targetId);
                if (modal) showModal(modal);
            });
        });

        modalHiders.forEach(hider => {
            hider.addEventListener('click', function(e) {
                e.preventDefault();
                const modal = this.closest('[id*="modal"]');
                if (modal) hideModal(modal);
            });
        });

        // Close modal on backdrop click
        document.addEventListener('click', function(e) {
            if (e.target.hasAttribute('data-modal-backdrop')) {
                const modal = e.target.querySelector('[id*="modal"]') || 
                             e.target.closest('[id*="modal"]');
                if (modal) hideModal(modal);
            }
        });
    }

    function showModal(modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
        
        // Focus management
        const focusableElements = modal.querySelectorAll('button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])');
        if (focusableElements.length > 0) {
            focusableElements[0].focus();
        }
    }

    function hideModal(modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    /**
     * Fast drawer implementation
     */
    function initDrawers() {
        const drawerTriggers = document.querySelectorAll('[data-drawer-target]');
        const drawerHiders = document.querySelectorAll('[data-drawer-hide]');
        
        drawerTriggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-drawer-target');
                const drawer = document.querySelector(targetId);
                if (drawer) showDrawer(drawer);
            });
        });

        drawerHiders.forEach(hider => {
            hider.addEventListener('click', function(e) {
                e.preventDefault();
                const drawer = this.closest('[id*="drawer"]');
                if (drawer) hideDrawer(drawer);
            });
        });
    }

    function showDrawer(drawer) {
        drawer.classList.remove('-translate-x-full');
        drawer.classList.add('translate-x-0');
        document.body.style.overflow = 'hidden';
    }

    function hideDrawer(drawer) {
        drawer.classList.add('-translate-x-full');
        drawer.classList.remove('translate-x-0');
        document.body.style.overflow = '';
    }

    /**
     * Fast dropdown implementation
     */
    function initDropdowns() {
        const dropdownTriggers = document.querySelectorAll('[data-dropdown-toggle]');
        
        dropdownTriggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-dropdown-toggle');
                const dropdown = document.querySelector(targetId);
                if (dropdown) toggleDropdown(dropdown);
            });
        });

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            const openDropdowns = document.querySelectorAll('.dropdown-menu:not(.hidden)');
            openDropdowns.forEach(dropdown => {
                if (!dropdown.contains(e.target) && !e.target.hasAttribute('data-dropdown-toggle')) {
                    dropdown.classList.add('hidden');
                }
            });
        });
    }

    function toggleDropdown(dropdown) {
        dropdown.classList.toggle('hidden');
    }

    /**
     * Performance optimizations
     */
    function initPerformanceOptimizations() {
        // Lazy load images
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            imageObserver.unobserve(img);
                        }
                    }
                });
            });

            document.querySelectorAll('img[data-src]').forEach(img => {
                imageObserver.observe(img);
            });
        }

        // Preload critical resources on hover
        const criticalLinks = document.querySelectorAll('a[href*="/portfolio"], a[href*="/services"], a[href*="/contact"]');
        criticalLinks.forEach(link => {
            link.addEventListener('mouseenter', function() {
                const href = this.getAttribute('href');
                if (href && !document.querySelector(`link[rel="prefetch"][href="${href}"]`)) {
                    const prefetchLink = document.createElement('link');
                    prefetchLink.rel = 'prefetch';
                    prefetchLink.href = href;
                    document.head.appendChild(prefetchLink);
                }
            }, { once: true });
        });
    }

    /**
     * Non-critical enhancements
     */
    function initEnhancements() {
        // Smooth scroll for anchor links
        const anchorLinks = document.querySelectorAll('a[href^="#"]');
        anchorLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);
                if (targetElement) {
                    e.preventDefault();
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Intersection Observer for animations
        if ('IntersectionObserver' in window) {
            const animationObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                        animationObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            document.querySelectorAll('.temoakte-card, .animate-on-scroll').forEach(el => {
                animationObserver.observe(el);
            });
        }

        // Back to top button
        const backToTop = document.createElement('button');
        backToTop.innerHTML = '↑';
        backToTop.className = 'fixed bottom-6 right-6 bg-blue-600 text-white w-12 h-12 rounded-full shadow-lg hover:bg-blue-700 transition-all duration-300 opacity-0 pointer-events-none z-50';
        backToTop.setAttribute('aria-label', 'Back to top');
        document.body.appendChild(backToTop);

        let ticking = false;
        window.addEventListener('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(function() {
                    const scrolled = window.pageYOffset;
                    if (scrolled > 300) {
                        backToTop.classList.remove('opacity-0', 'pointer-events-none');
                    } else {
                        backToTop.classList.add('opacity-0', 'pointer-events-none');
                    }
                    ticking = false;
                });
                ticking = true;
            }
        });

        backToTop.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Form enhancements
        const formInputs = document.querySelectorAll('input, textarea, select');
        formInputs.forEach(input => {
            // Add focus/blur effects
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('focused');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('focused');
                if (this.value) {
                    this.parentElement.classList.add('has-value');
                } else {
                    this.parentElement.classList.remove('has-value');
                }
            });
        });
    }

    /**
     * Utility functions
     */
    window.temoakteUtils = {
        showAlert: function(message, type = 'info') {
            const alert = document.createElement('div');
            alert.className = `fixed top-4 right-4 p-4 rounded-lg shadow-lg z-50 ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                type === 'warning' ? 'bg-yellow-500 text-black' :
                'bg-blue-500 text-white'
            }`;
            alert.textContent = message;
            document.body.appendChild(alert);

            // Auto-remove after 3 seconds
            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.parentNode.removeChild(alert);
                    }
                }, 300);
            }, 3000);
        },

        debounce: function(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        },

        throttle: function(func, limit) {
            let inThrottle;
            return function() {
                const args = arguments;
                const context = this;
                if (!inThrottle) {
                    func.apply(context, args);
                    inThrottle = true;
                    setTimeout(() => inThrottle = false, limit);
                }
            };
        }
    };

    // Global error handling
    window.addEventListener('error', function(e) {
        console.warn('Temoakte: Non-critical error caught:', e.error);
    });

    // Page visibility API for performance
    if ('visibilityState' in document) {
        document.addEventListener('visibilitychange', function() {
            if (document.visibilityState === 'visible') {
                // Page became visible - resume any paused activities
                console.log('Temoakte: Page visible');
            } else {
                // Page hidden - pause non-essential activities
                console.log('Temoakte: Page hidden');
            }
        });
    }

})();