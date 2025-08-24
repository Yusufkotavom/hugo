/*!
 * Temoakte Simple JS - WordPress Compatible
 * Essential functionality extracted from app.js without webpack bundle
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
        initThemeToggle();
        initStickyNavbar();
        initContactForm();
        initCounters();
        initSmoothScroll();
        initFlowbiteComponents();
    }

    /**
     * Dark/Light Mode Toggle (from your app.js)
     */
    function initThemeToggle() {
        const themeToggleDarkIcon = document.getElementById('themeToggleDarkIcon');
        const themeToggleLightIcon = document.getElementById('themeToggleLightIcon');
        const themeToggleBtn = document.getElementById('themeToggle');

        if (!themeToggleBtn) return;

        // Set initial state
        if (localStorage.getItem('color-theme') === 'dark' || 
            (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
            if (themeToggleLightIcon) themeToggleLightIcon.classList.remove('hidden');
            if (themeToggleDarkIcon) themeToggleDarkIcon.classList.add('hidden');
        } else {
            document.documentElement.classList.remove('dark');
            if (themeToggleDarkIcon) themeToggleDarkIcon.classList.remove('hidden');
            if (themeToggleLightIcon) themeToggleLightIcon.classList.add('hidden');
        }

        // Toggle functionality
        themeToggleBtn.addEventListener('click', function() {
            // Toggle icons
            if (themeToggleDarkIcon) themeToggleDarkIcon.classList.toggle('hidden');
            if (themeToggleLightIcon) themeToggleLightIcon.classList.toggle('hidden');

            // Toggle theme
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

            // Dispatch custom event
            document.dispatchEvent(new Event('dark-mode'));
        });
    }

    /**
     * Sticky Navbar (from your app.js)
     */
    function initStickyNavbar() {
        const navbar = document.querySelector("#mainNavbar");
        if (!navbar) return;

        function toggleStickyNavbar() {
            if (window.scrollY > 0) {
                navbar.setAttribute('data-sticky', 'true');
            } else {
                navbar.setAttribute('data-sticky', 'false');
            }
        }

        toggleStickyNavbar();
        window.addEventListener("scroll", toggleStickyNavbar);
    }

    /**
     * Contact Form Handler
     */
    function initContactForm() {
        const contactForm = document.getElementById('temoakte-contact-form');
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
                action: 'temoakte_contact_form',
                name: formData.get('name'),
                email: formData.get('email'),
                subject: formData.get('subject'),
                message: formData.get('message'),
                nonce: window.temoakte_ajax ? window.temoakte_ajax.nonce : ''
            };

            // Send via fetch
            fetch(window.temoakte_ajax ? window.temoakte_ajax.ajax_url : '/wp-admin/admin-ajax.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams(data)
            })
            .then(response => response.json())
            .then(result => {
                if (responseDiv) {
                    responseDiv.className = 'mt-4 p-4 rounded-lg ' + 
                        (result.success ? 'bg-green-50 text-green-800 border border-green-200' : 'bg-red-50 text-red-800 border border-red-200');
                    responseDiv.textContent = result.data;
                    responseDiv.classList.remove('hidden');
                }
                
                if (result.success) {
                    contactForm.reset();
                }
            })
            .catch(error => {
                if (responseDiv) {
                    responseDiv.className = 'mt-4 p-4 rounded-lg bg-red-50 text-red-800 border border-red-200';
                    responseDiv.textContent = 'Network error. Please try again.';
                    responseDiv.classList.remove('hidden');
                }
            })
            .finally(() => {
                submitBtn.textContent = originalText;
                submitBtn.disabled = false;
            });
        });
    }

    /**
     * Animated Counters
     */
    function initCounters() {
        const counters = document.querySelectorAll('[data-counter]');
        if (counters.length === 0) return;

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-counter'));
                    const duration = 2000;
                    const step = target / (duration / 16);
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

    /**
     * Smooth Scroll for Anchor Links
     */
    function initSmoothScroll() {
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
    }

    /**
     * Basic Flowbite Components
     */
    function initFlowbiteComponents() {
        // Modals
        initModals();
        // Dropdowns
        initDropdowns();
        // Mobile Menu Toggle
        initMobileMenu();
    }

    function initModals() {
        // Modal triggers
        const modalTriggers = document.querySelectorAll('[data-modal-target], [data-modal-toggle]');
        modalTriggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-modal-target') || this.getAttribute('data-modal-toggle');
                const modal = document.querySelector(targetId);
                if (modal) {
                    showModal(modal);
                }
            });
        });

        // Modal close buttons
        const modalHiders = document.querySelectorAll('[data-modal-hide]');
        modalHiders.forEach(hider => {
            hider.addEventListener('click', function(e) {
                e.preventDefault();
                const modal = this.closest('[role="dialog"], .modal, [id*="modal"]');
                if (modal) {
                    hideModal(modal);
                }
            });
        });

        // Close on backdrop click
        document.addEventListener('click', function(e) {
            if (e.target.hasAttribute('data-modal-backdrop')) {
                const modal = e.target.querySelector('[role="dialog"], .modal, [id*="modal"]');
                if (modal) {
                    hideModal(modal);
                }
            }
        });
    }

    function showModal(modal) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
        document.body.style.overflow = 'hidden';
    }

    function hideModal(modal) {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
        document.body.style.overflow = '';
    }

    function initDropdowns() {
        const dropdownTriggers = document.querySelectorAll('[data-dropdown-toggle]');
        
        dropdownTriggers.forEach(trigger => {
            trigger.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('data-dropdown-toggle');
                const dropdown = document.querySelector(targetId);
                if (dropdown) {
                    dropdown.classList.toggle('hidden');
                }
            });
        });

        // Close dropdowns on outside click
        document.addEventListener('click', function(e) {
            if (!e.target.hasAttribute('data-dropdown-toggle')) {
                const openDropdowns = document.querySelectorAll('[data-dropdown-toggle] + *:not(.hidden)');
                openDropdowns.forEach(dropdown => {
                    dropdown.classList.add('hidden');
                });
            }
        });
    }

    function initMobileMenu() {
        const mobileToggle = document.querySelector('[data-collapse-toggle]');
        if (!mobileToggle) return;

        mobileToggle.addEventListener('click', function() {
            const targetId = this.getAttribute('data-collapse-toggle');
            const mobileMenu = document.querySelector(targetId);
            if (mobileMenu) {
                mobileMenu.classList.toggle('hidden');
            }
        });
    }

    // Global utilities
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

            setTimeout(() => {
                alert.style.opacity = '0';
                setTimeout(() => {
                    if (alert.parentNode) {
                        alert.parentNode.removeChild(alert);
                    }
                }, 300);
            }, 3000);
        }
    };

    // Handle global errors gracefully
    window.addEventListener('error', function(e) {
        console.warn('Temoakte: Non-critical error caught:', e.error);
    });

})();