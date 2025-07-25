<?php
/**
 * Temoakte Child Theme Functions - Optimized for Speed
 * Local assets, minimal dependencies, fast loading
 */

/**
 * Enqueue local assets for maximum speed
 */
function temoakte_enqueue_optimized_styles() {
    // Load local Tailwind CSS (minified)
    wp_enqueue_style('temoakte-tailwind', 
        get_stylesheet_directory_uri() . '/assets/css/tailwind.min.css', 
        array(), 
        filemtime(get_stylesheet_directory() . '/assets/css/tailwind.min.css')
    );
    
    // Load local Flowbite CSS (minified)
    wp_enqueue_style('temoakte-flowbite', 
        get_stylesheet_directory_uri() . '/assets/css/flowbite.min.css', 
        array('temoakte-tailwind'), 
        filemtime(get_stylesheet_directory() . '/assets/css/flowbite.min.css')
    );
    
    // Load Temoakte theme styles
    wp_enqueue_style('temoakte-theme', 
        get_stylesheet_directory_uri() . '/assets/css/temoakte-theme.css', 
        array('temoakte-flowbite'), 
        filemtime(get_stylesheet_directory() . '/assets/css/temoakte-theme.css')
    );
    
    // Parent theme (load after our styles)
    wp_enqueue_style('blocksy-parent-style', 
        get_template_directory_uri() . '/style.css', 
        array('temoakte-theme')
    );
    
    // Child theme style (final overrides)
    wp_enqueue_style('blocksy-child-style', 
        get_stylesheet_directory_uri() . '/style.css',
        array('blocksy-parent-style'),
        wp_get_theme()->get('Version')
    );
}
add_action('wp_enqueue_scripts', 'temoakte_enqueue_optimized_styles');

/**
 * Enqueue optimized JavaScript
 */
function temoakte_enqueue_optimized_scripts() {
    // Load local Flowbite JS (defer for performance)
    wp_enqueue_script('temoakte-flowbite-js',
        get_stylesheet_directory_uri() . '/assets/js/flowbite.min.js',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/js/flowbite.min.js'),
        true
    );
    
    // Add defer attribute for non-critical JS
    add_filter('script_loader_tag', function($tag, $handle) {
        if ($handle === 'temoakte-flowbite-js') {
            return str_replace(' src', ' defer src', $tag);
        }
        return $tag;
    }, 10, 2);
    
    // Load optimized custom scripts
    wp_enqueue_script('temoakte-optimized-js',
        get_stylesheet_directory_uri() . '/assets/js/temoakte-optimized.js',
        array('temoakte-flowbite-js'),
        filemtime(get_stylesheet_directory() . '/assets/js/temoakte-optimized.js'),
        true
    );
    
    // Minimal AJAX for contact form only
    wp_localize_script('temoakte-optimized-js', 'temoakte_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('temoakte_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'temoakte_enqueue_optimized_scripts');

/**
 * Optimize WordPress for speed
 */
function temoakte_optimize_wordpress() {
    // Remove unnecessary WordPress scripts/styles
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    
    // Remove emoji scripts (not needed for static-like sites)
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    
    // Disable embeds for faster loading
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'wp_oembed_add_host_js');
}
add_action('init', 'temoakte_optimize_wordpress');

/**
 * Critical CSS inlining for above-the-fold content
 */
function temoakte_inline_critical_css() {
    ?>
    <style id="temoakte-critical-css">
        /* Critical CSS for immediate rendering */
        body { 
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif; 
            margin: 0; 
            line-height: 1.6; 
        }
        .temoakte-content { 
            max-width: 80rem; 
            margin: 0 auto; 
            padding: 0 1rem; 
        }
        .temoakte-btn { 
            display: inline-flex; 
            align-items: center; 
            justify-content: center; 
            padding: 0.75rem 1.5rem; 
            font-weight: 500; 
            border-radius: 0.5rem; 
            transition: all 0.2s; 
            text-decoration: none;
        }
        .temoakte-btn-primary { 
            background-color: #3b82f6; 
            color: white; 
        }
        .temoakte-btn-primary:hover { 
            background-color: #2563eb; 
        }
        .temoakte-card { 
            background-color: white; 
            border-radius: 0.75rem; 
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); 
            padding: 1.5rem; 
            transition: all 0.3s; 
        }
        .temoakte-grid { 
            display: grid; 
            gap: 1.5rem; 
        }
        @media (min-width: 768px) { 
            .temoakte-grid-2 { grid-template-columns: repeat(2, 1fr); } 
            .temoakte-grid-3 { grid-template-columns: repeat(3, 1fr); } 
        }
        @media (min-width: 1024px) { 
            .temoakte-grid-4 { grid-template-columns: repeat(4, 1fr); } 
        }
        .hidden { display: none; }
        .block { display: block; }
        .flex { display: flex; }
        .text-center { text-align: center; }
        .mb-4 { margin-bottom: 1rem; }
        .mt-4 { margin-top: 1rem; }
        .p-6 { padding: 1.5rem; }
        .bg-white { background-color: #ffffff; }
        .text-gray-600 { color: #4b5563; }
        .font-semibold { font-weight: 600; }
        .rounded-lg { border-radius: 0.5rem; }
    </style>
    <?php
}
add_action('wp_head', 'temoakte_inline_critical_css', 1);

/**
 * Preload critical assets
 */
function temoakte_preload_assets() {
    // Preload critical CSS
    echo '<link rel="preload" href="' . get_stylesheet_directory_uri() . '/assets/css/tailwind.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
    echo '<link rel="preload" href="' . get_stylesheet_directory_uri() . '/assets/css/flowbite.min.css" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
    
    // Preload fonts
    echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
    echo '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n";
    echo '<link rel="preload" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" as="style" onload="this.onload=null;this.rel=\'stylesheet\'">' . "\n";
    
    // DNS prefetch for external resources
    echo '<link rel="dns-prefetch" href="//fonts.googleapis.com">' . "\n";
    echo '<link rel="dns-prefetch" href="//fonts.gstatic.com">' . "\n";
}
add_action('wp_head', 'temoakte_preload_assets', 1);

/**
 * Fast custom post types registration
 */
function temoakte_register_fast_post_types() {
    // Portfolio (minimal args for speed)
    register_post_type('portfolio', array(
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'portfolio'),
        'show_in_rest' => false, // Disable if not using Gutenberg
        'menu_icon' => 'dashicons-portfolio'
    ));

    // Services
    register_post_type('services', array(
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'services'),
        'show_in_rest' => false,
        'menu_icon' => 'dashicons-admin-tools'
    ));

    // Testimonials
    register_post_type('testimonials', array(
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'rewrite' => array('slug' => 'testimonials'),
        'show_in_rest' => false,
        'menu_icon' => 'dashicons-format-quote'
    ));
}
add_action('init', 'temoakte_register_fast_post_types');

/**
 * Fast shortcodes for static-like performance
 */
function temoakte_fast_portfolio_shortcode($atts) {
    $atts = shortcode_atts(array(
        'limit' => 6,
        'columns' => 3
    ), $atts);

    // Use transients for caching
    $cache_key = 'temoakte_portfolio_' . md5(serialize($atts));
    $output = get_transient($cache_key);
    
    if ($output === false) {
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page' => intval($atts['limit']),
            'post_status' => 'publish',
            'no_found_rows' => true, // Skip pagination queries
            'update_post_meta_cache' => false // Skip meta cache if not needed
        );

        $portfolio_query = new WP_Query($args);
        
        if (!$portfolio_query->have_posts()) {
            return '<div class="temoakte-content text-center p-6"><p class="text-gray-600">No portfolio items found.</p></div>';
        }

        $output = '<div class="temoakte-portfolio-section"><div class="temoakte-content"><div class="temoakte-grid temoakte-grid-' . intval($atts['columns']) . '">';
        
        while ($portfolio_query->have_posts()) {
            $portfolio_query->the_post();
            
            $output .= '<div class="temoakte-card hover:shadow-xl transform hover:-translate-y-1">';
            
            if (has_post_thumbnail()) {
                $output .= '<div class="mb-4">';
                $output .= get_the_post_thumbnail(get_the_ID(), 'medium', array(
                    'class' => 'w-full h-48 object-cover rounded-lg',
                    'loading' => 'lazy'
                ));
                $output .= '</div>';
            }
            
            $output .= '<h3 class="text-xl font-semibold mb-2">' . get_the_title() . '</h3>';
            $output .= '<p class="text-gray-600 mb-4">' . wp_trim_words(get_the_excerpt(), 20) . '</p>';
            $output .= '<a href="' . get_permalink() . '" class="temoakte-btn temoakte-btn-primary">View Project</a>';
            $output .= '</div>';
        }
        
        $output .= '</div></div></div>';
        
        wp_reset_postdata();
        
        // Cache for 1 hour
        set_transient($cache_key, $output, HOUR_IN_SECONDS);
    }
    
    return $output;
}
add_shortcode('temoakte_portfolio', 'temoakte_fast_portfolio_shortcode');

/**
 * Fast services shortcode
 */
function temoakte_fast_services_shortcode($atts) {
    $atts = shortcode_atts(array(
        'limit' => 6,
        'columns' => 3
    ), $atts);

    $cache_key = 'temoakte_services_' . md5(serialize($atts));
    $output = get_transient($cache_key);
    
    if ($output === false) {
        $args = array(
            'post_type' => 'services',
            'posts_per_page' => intval($atts['limit']),
            'post_status' => 'publish',
            'no_found_rows' => true,
            'update_post_meta_cache' => false
        );

        $services_query = new WP_Query($args);
        
        if (!$services_query->have_posts()) {
            return '<div class="temoakte-content text-center p-6"><p class="text-gray-600">No services found.</p></div>';
        }

        $output = '<div class="temoakte-services-section"><div class="temoakte-content"><div class="temoakte-grid temoakte-grid-' . intval($atts['columns']) . '">';
        
        while ($services_query->have_posts()) {
            $services_query->the_post();
            
            $output .= '<div class="temoakte-card text-center hover:shadow-xl transform hover:-translate-y-1">';
            $output .= '<h3 class="text-xl font-semibold mb-2">' . get_the_title() . '</h3>';
            $output .= '<p class="text-gray-600 mb-4">' . wp_trim_words(get_the_excerpt(), 15) . '</p>';
            $output .= '<a href="' . get_permalink() . '" class="temoakte-btn temoakte-btn-primary">Learn More</a>';
            $output .= '</div>';
        }
        
        $output .= '</div></div></div>';
        
        wp_reset_postdata();
        
        // Cache for 1 hour
        set_transient($cache_key, $output, HOUR_IN_SECONDS);
    }
    
    return $output;
}
add_shortcode('temoakte_services', 'temoakte_fast_services_shortcode');

/**
 * Minimal contact form
 */
function temoakte_fast_contact_form_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => 'Contact Us'
    ), $atts);

    ob_start();
    ?>
    <div class="temoakte-contact-section">
        <div class="temoakte-content">
            <div class="max-w-2xl mx-auto">
                <div class="temoakte-card">
                    <h3 class="text-2xl font-semibold mb-6 text-center"><?php echo esc_html($atts['title']); ?></h3>
                    
                    <form id="temoakte-fast-contact" class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <input type="text" name="name" placeholder="Name *" required class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none">
                            <input type="email" name="email" placeholder="Email *" required class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none">
                        </div>
                        <input type="text" name="subject" placeholder="Subject" class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none">
                        <textarea name="message" placeholder="Message *" required rows="5" class="w-full p-3 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline-none"></textarea>
                        <button type="submit" class="temoakte-btn temoakte-btn-primary w-full">Send Message</button>
                    </form>
                    
                    <div id="contact-response" class="mt-4 hidden"></div>
                </div>
            </div>
        </div>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('temoakte_contact_form', 'temoakte_fast_contact_form_shortcode');

/**
 * Handle contact form AJAX
 */
function temoakte_handle_fast_contact_form() {
    if (!wp_verify_nonce($_POST['nonce'], 'temoakte_nonce')) {
        wp_die('Security check failed');
    }

    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);
    $subject = sanitize_text_field($_POST['subject']);
    $message = sanitize_textarea_field($_POST['message']);

    if (empty($name) || empty($email) || empty($message)) {
        wp_send_json_error('Please fill in all required fields.');
    }

    if (!is_email($email)) {
        wp_send_json_error('Please enter a valid email address.');
    }

    // Send email
    $to = get_option('admin_email');
    $email_subject = $subject ?: 'New Contact Form Submission';
    $email_message = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    
    if (wp_mail($to, $email_subject, $email_message, array('Reply-To: ' . $email))) {
        wp_send_json_success('Message sent successfully!');
    } else {
        wp_send_json_error('Failed to send message. Please try again.');
    }
}
add_action('wp_ajax_temoakte_contact', 'temoakte_handle_fast_contact_form');
add_action('wp_ajax_nopriv_temoakte_contact', 'temoakte_handle_fast_contact_form');

/**
 * Theme support for fast loading
 */
function temoakte_fast_theme_support() {
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption'));
    add_theme_support('title-tag');
    
    // Optimized image sizes
    add_image_size('temoakte-thumb', 400, 300, true);
    add_image_size('temoakte-card', 350, 250, true);
}
add_action('after_setup_theme', 'temoakte_fast_theme_support');

/**
 * Clear cache when posts are updated
 */
function temoakte_clear_cache($post_id) {
    $post_type = get_post_type($post_id);
    if (in_array($post_type, array('portfolio', 'services', 'testimonials'))) {
        // Clear related transients
        global $wpdb;
        $wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_temoakte_%'");
    }
}
add_action('save_post', 'temoakte_clear_cache');

/**
 * Add performance headers
 */
function temoakte_performance_headers() {
    if (!is_admin()) {
        header('X-Content-Type-Options: nosniff');
        header('X-Frame-Options: SAMEORIGIN');
        header('X-XSS-Protection: 1; mode=block');
    }
}
add_action('send_headers', 'temoakte_performance_headers');