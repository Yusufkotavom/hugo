/**
 * Temoakte Custom JavaScript
 * 
 * @package Blocksy_Child_Temoakte
 * @version 1.0.0
 */

(function($) {
    'use strict';
    
    // Document ready
    $(document).ready(function() {
        
        // Initialize all components
        initContactForm();
        initAnimations();
        initPortfolioFilter();
        initMobileMenu();
        initScrollEffects();
        initLazyLoading();
        
    });
    
    /**
     * Initialize Contact Form
     */
    function initContactForm() {
        $('#temoakte-contact-form').on('submit', function(e) {
            e.preventDefault();
            
            var form = $(this);
            var submitBtn = form.find('button[type="submit"]');
            var messages = $('#temoakte-form-messages');
            var originalText = submitBtn.text();
            
            // Validate form
            if (!validateForm(form)) {
                return false;
            }
            
            // Disable submit button and show loading
            submitBtn.prop('disabled', true).text('Sending...');
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
                        messages.html('<div class="temoakte-message temoakte-success">' + response.data + '</div>');
                        form[0].reset();
                    } else {
                        messages.html('<div class="temoakte-message temoakte-error">' + response.data + '</div>');
                    }
                },
                error: function() {
                    messages.html('<div class="temoakte-message temoakte-error">Something went wrong. Please try again.</div>');
                },
                complete: function() {
                    submitBtn.prop('disabled', false).text(originalText);
                }
            });
        });
    }
    
    /**
     * Validate Contact Form
     */
    function validateForm(form) {
        var isValid = true;
        var requiredFields = form.find('[required]');
        
        requiredFields.each(function() {
            var field = $(this);
            var value = field.val().trim();
            
            // Remove previous error styling
            field.removeClass('temoakte-error');
            
            if (value === '') {
                field.addClass('temoakte-error');
                isValid = false;
            }
            
            // Email validation
            if (field.attr('type') === 'email' && value !== '') {
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(value)) {
                    field.addClass('temoakte-error');
                    isValid = false;
                }
            }
        });
        
        return isValid;
    }
    
    /**
     * Initialize Animations
     */
    function initAnimations() {
        // Fade in animation for cards
        $('.temoakte-card').each(function(index) {
            var card = $(this);
            setTimeout(function() {
                card.addClass('temoakte-fade-in');
            }, index * 100);
        });
        
        // Hover effects for portfolio items
        $('.temoakte-portfolio-item').hover(
            function() {
                $(this).addClass('temoakte-hover');
            },
            function() {
                $(this).removeClass('temoakte-hover');
            }
        );
        
        // Button hover animations
        $('.temoakte-btn').hover(
            function() {
                $(this).addClass('temoakte-btn-hover');
            },
            function() {
                $(this).removeClass('temoakte-btn-hover');
            }
        );
    }
    
    /**
     * Initialize Portfolio Filter
     */
    function initPortfolioFilter() {
        var filterButtons = $('.temoakte-portfolio-filter button');
        var portfolioItems = $('.temoakte-portfolio-item');
        
        if (filterButtons.length === 0) return;
        
        filterButtons.on('click', function() {
            var button = $(this);
            var filter = button.data('filter');
            
            // Update active button
            filterButtons.removeClass('active');
            button.addClass('active');
            
            // Filter portfolio items
            portfolioItems.each(function() {
                var item = $(this);
                var category = item.data('category');
                
                if (filter === 'all' || category === filter) {
                    item.fadeIn(300).addClass('temoakte-visible');
                } else {
                    item.fadeOut(300).removeClass('temoakte-visible');
                }
            });
        });
    }
    
    /**
     * Initialize Mobile Menu
     */
    function initMobileMenu() {
        var menuToggle = $('.temoakte-menu-toggle');
        var mobileMenu = $('.temoakte-mobile-menu');
        
        if (menuToggle.length === 0) return;
        
        menuToggle.on('click', function() {
            $(this).toggleClass('active');
            mobileMenu.toggleClass('active');
            $('body').toggleClass('menu-open');
        });
        
        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.temoakte-nav').length) {
                menuToggle.removeClass('active');
                mobileMenu.removeClass('active');
                $('body').removeClass('menu-open');
            }
        });
        
        // Close menu when window is resized to desktop
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                menuToggle.removeClass('active');
                mobileMenu.removeClass('active');
                $('body').removeClass('menu-open');
            }
        });
    }
    
    /**
     * Initialize Scroll Effects
     */
    function initScrollEffects() {
        var header = $('.temoakte-header');
        var scrollTop = 0;
        
        $(window).on('scroll', function() {
            scrollTop = $(this).scrollTop();
            
            // Add/remove scroll class to header
            if (scrollTop > 100) {
                header.addClass('temoakte-scrolled');
            } else {
                header.removeClass('temoakte-scrolled');
            }
            
            // Parallax effect for hero sections
            $('.temoakte-hero').each(function() {
                var hero = $(this);
                var offset = scrollTop * 0.5;
                hero.css('transform', 'translateY(' + offset + 'px)');
            });
        });
        
        // Smooth scroll for anchor links
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            
            if (target.length) {
                e.preventDefault();
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800);
            }
        });
    }
    
    /**
     * Initialize Lazy Loading
     */
    function initLazyLoading() {
        var lazyImages = $('.temoakte-lazy');
        
        if (lazyImages.length === 0) return;
        
        // Intersection Observer for lazy loading
        if ('IntersectionObserver' in window) {
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('temoakte-lazy');
                        img.classList.add('temoakte-loaded');
                        observer.unobserve(img);
                    }
                });
            });
            
            lazyImages.each(function() {
                imageObserver.observe(this);
            });
        } else {
            // Fallback for older browsers
            lazyImages.each(function() {
                var img = $(this);
                img.attr('src', img.data('src'));
                img.removeClass('temoakte-lazy').addClass('temoakte-loaded');
            });
        }
    }
    
    /**
     * Testimonials Slider
     */
    function initTestimonialsSlider() {
        var slider = $('.temoakte-testimonials-slider');
        
        if (slider.length === 0) return;
        
        var currentSlide = 0;
        var slides = slider.find('.temoakte-testimonial-item');
        var totalSlides = slides.length;
        
        if (totalSlides <= 1) return;
        
        // Create navigation dots
        var dotsContainer = $('<div class="temoakte-slider-dots"></div>');
        for (var i = 0; i < totalSlides; i++) {
            dotsContainer.append('<button class="temoakte-dot" data-slide="' + i + '"></button>');
        }
        slider.append(dotsContainer);
        
        var dots = dotsContainer.find('.temoakte-dot');
        
        // Show first slide and activate first dot
        slides.eq(0).addClass('active');
        dots.eq(0).addClass('active');
        
        // Next/Prev buttons
        slider.append('<button class="temoakte-slider-prev">‹</button>');
        slider.append('<button class="temoakte-slider-next">›</button>');
        
        var prevBtn = slider.find('.temoakte-slider-prev');
        var nextBtn = slider.find('.temoakte-slider-next');
        
        function showSlide(index) {
            slides.removeClass('active');
            dots.removeClass('active');
            
            slides.eq(index).addClass('active');
            dots.eq(index).addClass('active');
            
            currentSlide = index;
        }
        
        function nextSlide() {
            var next = (currentSlide + 1) % totalSlides;
            showSlide(next);
        }
        
        function prevSlide() {
            var prev = (currentSlide - 1 + totalSlides) % totalSlides;
            showSlide(prev);
        }
        
        // Event listeners
        nextBtn.on('click', nextSlide);
        prevBtn.on('click', prevSlide);
        
        dots.on('click', function() {
            var slideIndex = parseInt($(this).data('slide'));
            showSlide(slideIndex);
        });
        
        // Auto-play
        setInterval(nextSlide, 5000);
    }
    
    /**
     * Initialize Counters
     */
    function initCounters() {
        $('.temoakte-counter').each(function() {
            var counter = $(this);
            var target = parseInt(counter.data('target'));
            var duration = parseInt(counter.data('duration')) || 2000;
            var current = 0;
            var increment = target / (duration / 16);
            
            var timer = setInterval(function() {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                counter.text(Math.floor(current));
            }, 16);
        });
    }
    
    /**
     * Initialize Tabs
     */
    function initTabs() {
        $('.temoakte-tabs').each(function() {
            var tabsContainer = $(this);
            var tabButtons = tabsContainer.find('.temoakte-tab-button');
            var tabPanes = tabsContainer.find('.temoakte-tab-pane');
            
            tabButtons.on('click', function() {
                var button = $(this);
                var target = button.data('tab');
                
                // Update active button
                tabButtons.removeClass('active');
                button.addClass('active');
                
                // Update active pane
                tabPanes.removeClass('active');
                tabsContainer.find('#' + target).addClass('active');
            });
        });
    }
    
    /**
     * Initialize Tooltips
     */
    function initTooltips() {
        $('.temoakte-tooltip').hover(
            function() {
                var tooltip = $(this);
                var text = tooltip.data('tooltip');
                var tooltipEl = $('<div class="temoakte-tooltip-text">' + text + '</div>');
                
                tooltip.append(tooltipEl);
                
                // Position tooltip
                var offset = tooltip.offset();
                var tooltipWidth = tooltipEl.outerWidth();
                var tooltipHeight = tooltipEl.outerHeight();
                
                tooltipEl.css({
                    top: -tooltipHeight - 10,
                    left: (tooltip.outerWidth() - tooltipWidth) / 2
                });
            },
            function() {
                $(this).find('.temoakte-tooltip-text').remove();
            }
        );
    }
    
    /**
     * Initialize Search
     */
    function initSearch() {
        var searchForm = $('.temoakte-search-form');
        var searchInput = searchForm.find('input[type="search"]');
        var searchResults = $('.temoakte-search-results');
        
        if (searchInput.length === 0) return;
        
        var searchTimeout;
        
        searchInput.on('input', function() {
            var query = $(this).val().trim();
            
            clearTimeout(searchTimeout);
            
            if (query.length < 3) {
                searchResults.empty().hide();
                return;
            }
            
            searchTimeout = setTimeout(function() {
                performSearch(query);
            }, 300);
        });
        
        function performSearch(query) {
            $.ajax({
                url: temoakte_ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'temoakte_search',
                    query: query,
                    nonce: temoakte_ajax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        searchResults.html(response.data).show();
                    } else {
                        searchResults.html('<p>No results found.</p>').show();
                    }
                },
                error: function() {
                    searchResults.html('<p>Search failed. Please try again.</p>').show();
                }
            });
        }
        
        // Hide search results when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.temoakte-search-form, .temoakte-search-results').length) {
                searchResults.hide();
            }
        });
    }
    
    /**
     * Initialize Modal
     */
    function initModal() {
        var modalTriggers = $('.temoakte-modal-trigger');
        var modals = $('.temoakte-modal');
        var modalClose = $('.temoakte-modal-close');
        
        modalTriggers.on('click', function(e) {
            e.preventDefault();
            var target = $(this).data('modal');
            $('#' + target).addClass('active');
            $('body').addClass('modal-open');
        });
        
        modalClose.on('click', function() {
            modals.removeClass('active');
            $('body').removeClass('modal-open');
        });
        
        // Close modal when clicking outside
        modals.on('click', function(e) {
            if ($(e.target).hasClass('temoakte-modal')) {
                $(this).removeClass('active');
                $('body').removeClass('modal-open');
            }
        });
        
        // Close modal with ESC key
        $(document).on('keydown', function(e) {
            if (e.keyCode === 27) {
                modals.removeClass('active');
                $('body').removeClass('modal-open');
            }
        });
    }
    
    // Initialize additional components
    $(window).on('load', function() {
        initTestimonialsSlider();
        initCounters();
        initTabs();
        initTooltips();
        initSearch();
        initModal();
    });
    
})(jQuery);

/**
 * Vanilla JavaScript utilities (no jQuery dependency)
 */
document.addEventListener('DOMContentLoaded', function() {
    
    // Utility function to add class with animation
    function animateIn(element, className = 'temoakte-animate-in') {
        element.classList.add(className);
    }
    
    // Intersection Observer for scroll animations
    if ('IntersectionObserver' in window) {
        const animateElements = document.querySelectorAll('.temoakte-animate');
        
        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    animateIn(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animateElements.forEach(function(element) {
            observer.observe(element);
        });
    }
    
    // Copy to clipboard functionality
    const copyButtons = document.querySelectorAll('.temoakte-copy');
    copyButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const text = this.dataset.copy;
            navigator.clipboard.writeText(text).then(function() {
                button.textContent = 'Copied!';
                setTimeout(function() {
                    button.textContent = 'Copy';
                }, 2000);
            });
        });
    });
    
    // Print functionality
    const printButtons = document.querySelectorAll('.temoakte-print');
    printButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            window.print();
        });
    });
    
    // Share functionality
    const shareButtons = document.querySelectorAll('.temoakte-share');
    shareButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const url = this.dataset.url || window.location.href;
            const title = this.dataset.title || document.title;
            
            if (navigator.share) {
                navigator.share({
                    title: title,
                    url: url
                });
            } else {
                // Fallback: copy to clipboard
                navigator.clipboard.writeText(url);
                button.textContent = 'Link copied!';
                setTimeout(function() {
                    button.textContent = 'Share';
                }, 2000);
            }
        });
    });
});