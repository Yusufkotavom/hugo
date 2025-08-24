/**
 * Temoakte Custom JavaScript with Flowbite Pro Integration
 * 
 * @package Blocksy_Child_Temoakte
 * @version 1.0.0
 */

(function($) {
    'use strict';
    
    // Document ready
    $(document).ready(function() {
        
        // Initialize all components
        initTemoakteComponents();
        initFlowbiteIntegration();
        initContactForm();
        initAnimations();
        initPortfolioFilter();
        initScrollEffects();
        initCounterAnimations();
        
    });
    
    /**
     * Initialize Temoakte Components
     */
    function initTemoakteComponents() {
        console.log('Temoakte + Flowbite Pro Integration Loaded');
        
        // Add custom classes to Flowbite components
        $('.temoakte-card').addClass('hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1');
        $('.temoakte-btn').addClass('transition-all duration-200 transform hover:scale-105');
        
        // Initialize custom tooltips
        $('[data-tooltip]').each(function() {
            const $this = $(this);
            const text = $this.data('tooltip');
            
            $this.hover(
                function() {
                    const $tooltip = $('<div class="absolute z-50 bg-gray-900 text-white text-sm px-2 py-1 rounded shadow-lg pointer-events-none">' + text + '</div>');
                    $('body').append($tooltip);
                    
                    const offset = $this.offset();
                    $tooltip.css({
                        top: offset.top - $tooltip.outerHeight() - 8,
                        left: offset.left + ($this.outerWidth() / 2) - ($tooltip.outerWidth() / 2)
                    });
                },
                function() {
                    $('.tooltip-temp').remove();
                }
            );
        });
    }
    
    /**
     * Initialize Flowbite Integration
     */
    function initFlowbiteIntegration() {
        // Ensure Flowbite is loaded
        if (typeof window.Flowbite !== 'undefined') {
            // Initialize Flowbite components
            window.Flowbite.init();
            
            // Custom Flowbite event handlers
            document.addEventListener('flowbite.modal.show', function(e) {
                console.log('Modal opened:', e.target.id);
            });
            
            document.addEventListener('flowbite.dropdown.show', function(e) {
                console.log('Dropdown opened:', e.target.id);
            });
        }
        
        // Custom drawer handling for mobile menu
        const mobileMenuDrawer = document.getElementById('mobile-menu');
        if (mobileMenuDrawer) {
            // Close mobile menu when clicking menu items
            mobileMenuDrawer.addEventListener('click', function(e) {
                if (e.target.tagName === 'A') {
                    // Close the drawer
                    const closeBtn = mobileMenuDrawer.querySelector('[data-drawer-hide="mobile-menu"]');
                    if (closeBtn) {
                        closeBtn.click();
                    }
                }
            });
        }
    }
    
    /**
     * Enhanced Contact Form with Flowbite styling
     */
    function initContactForm() {
        $('#temoakte-contact-form').on('submit', function(e) {
            e.preventDefault();
            
            var form = $(this);
            var submitBtn = form.find('button[type="submit"]');
            var messages = $('#temoakte-form-messages');
            var originalText = submitBtn.text();
            
            // Validate form with Flowbite styling
            if (!validateFormWithFlowbite(form)) {
                return false;
            }
            
            // Add loading state with Flowbite styling
            submitBtn.prop('disabled', true)
                     .html('<svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Mengirim...');
            
            messages.empty();
            
            // Prepare data
            var formData = {
                action: 'temoakte_contact_form',
                temoakte_name: form.find('#temoakte_name').val(),
                temoakte_email: form.find('#temoakte_email').val(),
                temoakte_subject: form.find('#temoakte_subject').val(),
                temoakte_message: form.find('#temoakte_message').val(),
                temoakte_contact_nonce_field: form.find('[name="temoakte_contact_nonce_field"]').val()
            };
            
            // Send AJAX request
            $.ajax({
                url: temoakte_ajax.ajax_url,
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (response.success) {
                        // Show success alert with Flowbite styling
                        messages.html(`
                            <div class="flex items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div><span class="font-medium">Berhasil!</span> ${response.data}</div>
                            </div>
                        `);
                        form[0].reset();
                        
                        // Remove error classes
                        form.find('.border-red-500').removeClass('border-red-500');
                    } else {
                        // Show error alert
                        messages.html(`
                            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Error</span>
                                <div><span class="font-medium">Error!</span> ${response.data}</div>
                            </div>
                        `);
                    }
                },
                error: function() {
                    messages.html(`
                        <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-300 rounded-lg bg-red-50" role="alert">
                            <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                            </svg>
                            <span class="sr-only">Error</span>
                            <div><span class="font-medium">Error!</span> Terjadi kesalahan. Silakan coba lagi.</div>
                        </div>
                    `);
                },
                complete: function() {
                    submitBtn.prop('disabled', false).html(originalText);
                }
            });
        });
    }
    
    /**
     * Validate Form with Flowbite Styling
     */
    function validateFormWithFlowbite(form) {
        var isValid = true;
        var requiredFields = form.find('[required]');
        
        requiredFields.each(function() {
            var field = $(this);
            var value = field.val().trim();
            
            // Remove previous error styling
            field.removeClass('border-red-500 bg-red-50');
            
            if (value === '') {
                field.addClass('border-red-500 bg-red-50');
                isValid = false;
            }
            
            // Email validation
            if (field.attr('type') === 'email' && value !== '') {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    field.addClass('border-red-500 bg-red-50');
                    isValid = false;
                }
            }
        });
        
        return isValid;
    }
    
    /**
     * Enhanced Animations with Intersection Observer
     */
    function initAnimations() {
        // Create intersection observer for animations
        if ('IntersectionObserver' in window) {
            const animationObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('opacity-100', 'translate-y-0');
                        entry.target.classList.remove('opacity-0', 'translate-y-8');
                        animationObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });
            
            // Observe elements with animation class
            document.querySelectorAll('.animate-on-scroll').forEach(el => {
                el.classList.add('opacity-0', 'translate-y-8', 'transition-all', 'duration-700');
                animationObserver.observe(el);
            });
        }
        
        // Add animation classes to cards
        $('.temoakte-card').addClass('animate-on-scroll');
        
        // Hover effects with Tailwind classes
        $('.temoakte-card').hover(
            function() {
                $(this).addClass('shadow-2xl -translate-y-2');
            },
            function() {
                $(this).removeClass('shadow-2xl -translate-y-2');
            }
        );
    }
    
    /**
     * Portfolio Filter with Flowbite styling
     */
    function initPortfolioFilter() {
        var filterButtons = $('.temoakte-portfolio-filter button');
        var portfolioItems = $('.temoakte-portfolio-item');
        
        if (filterButtons.length === 0) return;
        
        filterButtons.on('click', function() {
            var button = $(this);
            var filter = button.data('filter');
            
            // Update active button with Tailwind classes
            filterButtons.removeClass('bg-blue-600 text-white').addClass('text-gray-500 hover:text-gray-700');
            button.removeClass('text-gray-500 hover:text-gray-700').addClass('bg-blue-600 text-white');
            
            // Filter portfolio items with smooth transitions
            portfolioItems.each(function() {
                var item = $(this);
                var category = item.data('category');
                
                if (filter === 'all' || category === filter) {
                    item.removeClass('opacity-0 scale-95').addClass('opacity-100 scale-100');
                    item.show();
                } else {
                    item.removeClass('opacity-100 scale-100').addClass('opacity-0 scale-95');
                    setTimeout(function() {
                        if (item.hasClass('opacity-0')) {
                            item.hide();
                        }
                    }, 300);
                }
            });
        });
    }
    
    /**
     * Enhanced Scroll Effects
     */
    function initScrollEffects() {
        var header = $('.site-header');
        var scrollTop = 0;
        
        $(window).on('scroll', function() {
            scrollTop = $(this).scrollTop();
            
            // Add/remove scroll class to header with backdrop blur
            if (scrollTop > 100) {
                header.addClass('backdrop-blur-md bg-white/95 shadow-sm');
            } else {
                header.removeClass('backdrop-blur-md bg-white/95 shadow-sm');
            }
            
            // Parallax effect for hero sections
            $('.bg-gradient-to-r').each(function() {
                var hero = $(this);
                var rate = scrollTop * -0.5;
                hero.css('transform', 'translate3d(0, ' + rate + 'px, 0)');
            });
        });
        
        // Smooth scroll for anchor links
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800, 'easeInOutCubic');
            }
        });
    }
    
    /**
     * Counter Animations
     */
    function initCounterAnimations() {
        const counters = document.querySelectorAll('[data-counter]');
        
        if (counters.length === 0) return;
        
        const animateCounter = (counter) => {
            const target = parseInt(counter.getAttribute('data-counter'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;
            
            const timer = setInterval(() => {
                current += step;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                counter.textContent = Math.floor(current);
            }, 16);
        };
        
        // Intersection Observer for counters
        if ('IntersectionObserver' in window) {
            const counterObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animateCounter(entry.target);
                        counterObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });
            
            counters.forEach(counter => {
                counterObserver.observe(counter);
            });
        }
    }
    
    /**
     * Advanced Search with Flowbite Modal
     */
    function initAdvancedSearch() {
        const searchModal = document.getElementById('search-modal');
        const searchInput = document.getElementById('search-input');
        
        if (!searchModal || !searchInput) return;
        
        // Focus on input when modal opens
        searchModal.addEventListener('shown.bs.modal', function() {
            searchInput.focus();
        });
        
        // Live search functionality
        let searchTimeout;
        searchInput.addEventListener('input', function() {
            const query = this.value.trim();
            
            clearTimeout(searchTimeout);
            
            if (query.length > 2) {
                searchTimeout = setTimeout(() => {
                    performLiveSearch(query);
                }, 300);
            }
        });
    }
    
    /**
     * Perform Live Search
     */
    function performLiveSearch(query) {
        $.ajax({
            url: temoakte_ajax.ajax_url,
            type: 'POST',
            data: {
                action: 'temoakte_live_search',
                query: query,
                nonce: temoakte_ajax.nonce
            },
            success: function(response) {
                if (response.success && response.data) {
                    displaySearchResults(response.data);
                }
            }
        });
    }
    
    /**
     * Display Search Results
     */
    function displaySearchResults(results) {
        const resultsContainer = $('#search-results');
        if (resultsContainer.length === 0) return;
        
        let html = '<div class="mt-4 space-y-2">';
        
        results.forEach(result => {
            html += `
                <div class="p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                    <a href="${result.url}" class="block">
                        <h4 class="font-medium text-gray-900">${result.title}</h4>
                        <p class="text-sm text-gray-600 mt-1">${result.excerpt}</p>
                    </a>
                </div>
            `;
        });
        
        html += '</div>';
        resultsContainer.html(html);
    }
    
    /**
     * Toast Notifications with Flowbite styling
     */
    window.temoakteToast = function(message, type = 'info') {
        const toast = $(`
            <div class="fixed bottom-4 right-4 z-50 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow transition-all duration-300 transform translate-x-full" role="alert">
                <div class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-${type === 'success' ? 'green' : type === 'error' ? 'red' : 'blue'}-500 bg-${type === 'success' ? 'green' : type === 'error' ? 'red' : 'blue'}-100 rounded-lg">
                    ${type === 'success' ? 
                        '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>' :
                        type === 'error' ?
                        '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>' :
                        '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>'
                    }
                </div>
                <div class="ml-3 text-sm font-normal">${message}</div>
                <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8" data-dismiss-target="#toast" aria-label="Close">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
        `);
        
        $('body').append(toast);
        
        // Animate in
        setTimeout(() => {
            toast.removeClass('translate-x-full');
        }, 100);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            toast.addClass('translate-x-full opacity-0');
            setTimeout(() => {
                toast.remove();
            }, 300);
        }, 5000);
        
        // Close button functionality
        toast.find('[data-dismiss-target]').on('click', function() {
            toast.addClass('translate-x-full opacity-0');
            setTimeout(() => {
                toast.remove();
            }, 300);
        });
    };
    
    // Initialize additional components on window load
    $(window).on('load', function() {
        initAdvancedSearch();
        
        // Show welcome toast
        setTimeout(() => {
            window.temoakteToast('Selamat datang di Temoakte + Flowbite Pro!', 'success');
        }, 1000);
    });
    
})(jQuery);