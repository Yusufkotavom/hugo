<?php
/**
 * Temoakte Ready-Made Theme Functions
 * Uses local app.css and app.js assets with placeholder content
 */

/**
 * Enqueue local assets (app.css and app.js)
 */
function temoakte_enqueue_ready_assets() {
    // Enqueue your app.css (contains Tailwind CSS v4 + Flowbite + custom styles)
    wp_enqueue_style('temoakte-app-css', 
        get_stylesheet_directory_uri() . '/assets/css/app.css', 
        array(), 
        filemtime(get_stylesheet_directory() . '/assets/css/app.css')
    );
    
    // Enqueue parent theme style
    wp_enqueue_style('blocksy-parent-style', 
        get_template_directory_uri() . '/style.css', 
        array('temoakte-app-css')
    );
    
    // Enqueue child theme style (any additional overrides)
    wp_enqueue_style('blocksy-child-style', 
        get_stylesheet_directory_uri() . '/style.css',
        array('blocksy-parent-style'),
        wp_get_theme()->get('Version')
    );
    
    // Enqueue your app.js (contains Flowbite + custom components)
    wp_enqueue_script('temoakte-app-js',
        get_stylesheet_directory_uri() . '/assets/js/app.js',
        array(),
        filemtime(get_stylesheet_directory() . '/assets/js/app.js'),
        true
    );
    
    // Minimal AJAX for contact forms
    wp_localize_script('temoakte-app-js', 'temoakte_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('temoakte_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'temoakte_enqueue_ready_assets');

/**
 * Theme setup
 */
function temoakte_ready_theme_setup() {
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array('search-form', 'comment-form', 'gallery', 'caption'));
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    
    // Register navigation menus
    register_nav_menus(array(
        'primary' => 'Primary Menu',
        'footer' => 'Footer Menu',
    ));
}
add_action('after_setup_theme', 'temoakte_ready_theme_setup');

/**
 * Register widget areas
 */
function temoakte_ready_widgets_init() {
    register_sidebar(array(
        'name' => 'Footer 1',
        'id' => 'footer-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title text-lg font-semibold mb-4 text-white">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'Footer 2',
        'id' => 'footer-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title text-lg font-semibold mb-4 text-white">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => 'Footer 3',
        'id' => 'footer-3',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title text-lg font-semibold mb-4 text-white">',
        'after_title' => '</h3>',
    ));
}
add_action('widgets_init', 'temoakte_ready_widgets_init');

/**
 * Simple shortcodes with placeholder content
 */
function temoakte_hero_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => 'Welcome to Temoakte',
        'subtitle' => 'Beautiful, Fast WordPress Theme',
        'button_text' => 'Get Started',
        'button_url' => '#'
    ), $atts);

    ob_start();
    ?>
    <section class="bg-gradient-to-br from-primary-600 to-primary-800 text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-5xl font-bold mb-6">
                <?php echo esc_html($atts['title']); ?>
            </h1>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                <?php echo esc_html($atts['subtitle']); ?>
            </p>
            <a href="<?php echo esc_url($atts['button_url']); ?>" 
               class="inline-flex items-center px-8 py-4 bg-white text-primary-600 font-semibold rounded-lg hover:bg-gray-100 transition-colors">
                <?php echo esc_html($atts['button_text']); ?>
            </a>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('temoakte_hero', 'temoakte_hero_shortcode');

/**
 * Features grid shortcode
 */
function temoakte_features_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => 'Our Features'
    ), $atts);

    ob_start();
    ?>
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900 dark:text-white">
                <?php echo esc_html($atts['title']); ?>
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">Lightning Fast</h3>
                    <p class="text-gray-600 dark:text-gray-300">Optimized for speed with local assets and smart caching.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">Mobile First</h3>
                    <p class="text-gray-600 dark:text-gray-300">Responsive design that looks great on all devices.</p>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">Easy to Use</h3>
                    <p class="text-gray-600 dark:text-gray-300">Simple shortcodes and customizable components.</p>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('temoakte_features', 'temoakte_features_shortcode');

/**
 * Contact form shortcode
 */
function temoakte_contact_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => 'Contact Us'
    ), $atts);

    ob_start();
    ?>
    <section class="py-16">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900 dark:text-white">
                <?php echo esc_html($atts['title']); ?>
            </h2>
            
            <div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-lg">
                <form id="temoakte-contact-form" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Name</label>
                            <input type="text" id="name" name="name" required 
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Email</label>
                            <input type="email" id="email" name="email" required 
                                   class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                        </div>
                    </div>
                    
                    <div>
                        <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Subject</label>
                        <input type="text" id="subject" name="subject" 
                               class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white">
                    </div>
                    
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Message</label>
                        <textarea id="message" name="message" rows="5" required 
                                  class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:text-white"></textarea>
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors">
                        Send Message
                    </button>
                </form>
                
                <div id="contact-response" class="mt-4 hidden"></div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('temoakte_contact', 'temoakte_contact_shortcode');

/**
 * Handle contact form submission
 */
function temoakte_handle_contact_form() {
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

    $to = get_option('admin_email');
    $email_subject = $subject ?: 'New Contact Form Submission';
    $email_message = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    
    if (wp_mail($to, $email_subject, $email_message, array('Reply-To: ' . $email))) {
        wp_send_json_success('Message sent successfully!');
    } else {
        wp_send_json_error('Failed to send message. Please try again.');
    }
}
add_action('wp_ajax_temoakte_contact_form', 'temoakte_handle_contact_form');
add_action('wp_ajax_nopriv_temoakte_contact_form', 'temoakte_handle_contact_form');

/**
 * Testimonials shortcode
 */
function temoakte_testimonials_shortcode($atts) {
    ob_start();
    ?>
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900 dark:text-white">
                What Our Clients Say
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/60x60" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white">John Doe</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">CEO, Tech Corp</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">"Amazing theme with great performance. Highly recommended!"</p>
                    <div class="flex mt-4">
                        <span class="text-yellow-400">★★★★★</span>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/60x60" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white">Jane Smith</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Designer, Creative Agency</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">"Beautiful design and easy to customize. Love it!"</p>
                    <div class="flex mt-4">
                        <span class="text-yellow-400">★★★★★</span>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <div class="flex items-center mb-4">
                        <img src="https://via.placeholder.com/60x60" alt="Client" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <h4 class="font-semibold text-gray-900 dark:text-white">Mike Johnson</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Developer, StartupXYZ</p>
                        </div>
                    </div>
                    <p class="text-gray-600 dark:text-gray-300">"Fast loading and great code quality. Perfect for our needs."</p>
                    <div class="flex mt-4">
                        <span class="text-yellow-400">★★★★★</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('temoakte_testimonials', 'temoakte_testimonials_shortcode');

/**
 * Stats/counter shortcode
 */
function temoakte_stats_shortcode($atts) {
    ob_start();
    ?>
    <section class="py-16 bg-primary-600 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold mb-2" data-counter="150">0</div>
                    <div class="text-primary-200">Projects Completed</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2" data-counter="50">0</div>
                    <div class="text-primary-200">Happy Clients</div>
                </div>
                <div class="text-4xl font-bold mb-2" data-counter="99">0</div>
                    <div class="text-primary-200">Page Speed Score</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2" data-counter="24">0</div>
                    <div class="text-primary-200">Hours Support</div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('temoakte_stats', 'temoakte_stats_shortcode');