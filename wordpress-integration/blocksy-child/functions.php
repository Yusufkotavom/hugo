<?php
/**
 * Blocksy Child Theme - Temoakte Custom System Integration with Tailwind CSS & Flowbite Pro
 * 
 * @package Blocksy_Child_Temoakte
 * @version 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Enqueue parent and child theme styles with Tailwind CSS and Flowbite Pro
 */
function temoakte_enqueue_styles() {
    // Enqueue Tailwind CSS
    wp_enqueue_style('tailwindcss', 'https://cdn.tailwindcss.com', array(), '3.4.0');
    
    // Enqueue Flowbite Pro CSS
    wp_enqueue_style('flowbite-pro-css', 'https://flowbite.s3.amazonaws.com/pro/dist/css/flowbite.min.css', array('tailwindcss'), '2.2.0');
    
    // Enqueue parent theme style
    wp_enqueue_style('blocksy-parent-style', get_template_directory_uri() . '/style.css', array('flowbite-pro-css'));
    
    // Enqueue child theme style (Temoakte custom styles on top of Tailwind)
    wp_enqueue_style('blocksy-child-style', 
        get_stylesheet_directory_uri() . '/style.css',
        array('blocksy-parent-style', 'tailwindcss', 'flowbite-pro-css'),
        wp_get_theme()->get('Version')
    );
    
    // Enqueue Tailwind Config for customization
    wp_add_inline_script('tailwindcss', '
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        temoakte: {
                            primary: "#3b82f6",
                            secondary: "#1e40af",
                            accent: "#f59e0b",
                            text: "#1f2937",
                            bg: "#ffffff",
                            border: "#e5e7eb"
                        }
                    },
                    fontFamily: {
                        temoakte: ["Inter", "sans-serif"]
                    }
                }
            }
        }
    ');
    
    // Enqueue Flowbite Pro JavaScript
    wp_enqueue_script('flowbite-pro-js',
        'https://flowbite.s3.amazonaws.com/pro/dist/js/flowbite.min.js',
        array('jquery'),
        '2.2.0',
        true
    );
    
    // Enqueue Temoakte custom scripts
    wp_enqueue_script('temoakte-custom-js',
        get_stylesheet_directory_uri() . '/js/temoakte-custom.js',
        array('jquery', 'flowbite-pro-js'),
        wp_get_theme()->get('Version'),
        true
    );
    
    // Localize script for AJAX
    wp_localize_script('temoakte-custom-js', 'temoakte_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('temoakte_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'temoakte_enqueue_styles');

/**
 * Register Temoakte Custom Post Types
 */
function temoakte_register_post_types() {
    
    // Portfolio Post Type
    register_post_type('temoakte_portfolio', array(
        'labels' => array(
            'name' => __('Portfolio', 'temoakte'),
            'singular_name' => __('Portfolio Item', 'temoakte'),
            'menu_name' => __('Portfolio', 'temoakte'),
            'add_new' => __('Add New', 'temoakte'),
            'add_new_item' => __('Add New Portfolio Item', 'temoakte'),
            'edit_item' => __('Edit Portfolio Item', 'temoakte'),
            'new_item' => __('New Portfolio Item', 'temoakte'),
            'view_item' => __('View Portfolio Item', 'temoakte'),
            'search_items' => __('Search Portfolio', 'temoakte'),
            'not_found' => __('No portfolio items found', 'temoakte'),
            'not_found_in_trash' => __('No portfolio items found in trash', 'temoakte')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'portfolio'),
        'show_in_rest' => true
    ));
    
    // Services Post Type
    register_post_type('temoakte_services', array(
        'labels' => array(
            'name' => __('Services', 'temoakte'),
            'singular_name' => __('Service', 'temoakte'),
            'menu_name' => __('Services', 'temoakte'),
            'add_new' => __('Add New', 'temoakte'),
            'add_new_item' => __('Add New Service', 'temoakte'),
            'edit_item' => __('Edit Service', 'temoakte'),
            'new_item' => __('New Service', 'temoakte'),
            'view_item' => __('View Service', 'temoakte'),
            'search_items' => __('Search Services', 'temoakte'),
            'not_found' => __('No services found', 'temoakte'),
            'not_found_in_trash' => __('No services found in trash', 'temoakte')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-admin-tools',
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'rewrite' => array('slug' => 'services'),
        'show_in_rest' => true
    ));
    
    // Testimonials Post Type
    register_post_type('temoakte_testimonials', array(
        'labels' => array(
            'name' => __('Testimonials', 'temoakte'),
            'singular_name' => __('Testimonial', 'temoakte'),
            'menu_name' => __('Testimonials', 'temoakte'),
            'add_new' => __('Add New', 'temoakte'),
            'add_new_item' => __('Add New Testimonial', 'temoakte'),
            'edit_item' => __('Edit Testimonial', 'temoakte'),
            'new_item' => __('New Testimonial', 'temoakte'),
            'view_item' => __('View Testimonial', 'temoakte'),
            'search_items' => __('Search Testimonials', 'temoakte'),
            'not_found' => __('No testimonials found', 'temoakte'),
            'not_found_in_trash' => __('No testimonials found in trash', 'temoakte')
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'rewrite' => array('slug' => 'testimonials'),
        'show_in_rest' => true
    ));
}
add_action('init', 'temoakte_register_post_types');

/**
 * Register Temoakte Custom Taxonomies
 */
function temoakte_register_taxonomies() {
    
    // Portfolio Categories
    register_taxonomy('portfolio_category', 'temoakte_portfolio', array(
        'labels' => array(
            'name' => __('Portfolio Categories', 'temoakte'),
            'singular_name' => __('Portfolio Category', 'temoakte'),
            'menu_name' => __('Categories', 'temoakte'),
        ),
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'portfolio-category')
    ));
    
    // Service Categories
    register_taxonomy('service_category', 'temoakte_services', array(
        'labels' => array(
            'name' => __('Service Categories', 'temoakte'),
            'singular_name' => __('Service Category', 'temoakte'),
            'menu_name' => __('Categories', 'temoakte'),
        ),
        'hierarchical' => true,
        'public' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'service-category')
    ));
}
add_action('init', 'temoakte_register_taxonomies');

/**
 * Add Temoakte Custom Fields Support
 */
function temoakte_add_meta_boxes() {
    
    // Portfolio Meta Box
    add_meta_box(
        'temoakte_portfolio_meta',
        __('Portfolio Details', 'temoakte'),
        'temoakte_portfolio_meta_callback',
        'temoakte_portfolio',
        'normal',
        'high'
    );
    
    // Services Meta Box
    add_meta_box(
        'temoakte_services_meta',
        __('Service Details', 'temoakte'),
        'temoakte_services_meta_callback',
        'temoakte_services',
        'normal',
        'high'
    );
    
    // Testimonials Meta Box
    add_meta_box(
        'temoakte_testimonials_meta',
        __('Testimonial Details', 'temoakte'),
        'temoakte_testimonials_meta_callback',
        'temoakte_testimonials',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'temoakte_add_meta_boxes');

/**
 * Portfolio Meta Box Callback
 */
function temoakte_portfolio_meta_callback($post) {
    wp_nonce_field('temoakte_portfolio_meta_nonce', 'temoakte_portfolio_meta_nonce_field');
    
    $project_url = get_post_meta($post->ID, '_temoakte_project_url', true);
    $client_name = get_post_meta($post->ID, '_temoakte_client_name', true);
    $project_date = get_post_meta($post->ID, '_temoakte_project_date', true);
    $technologies = get_post_meta($post->ID, '_temoakte_technologies', true);
    
    echo '<table class="form-table">';
    echo '<tr><th scope="row"><label for="temoakte_project_url">' . __('Project URL', 'temoakte') . '</label></th>';
    echo '<td><input type="url" id="temoakte_project_url" name="temoakte_project_url" value="' . esc_attr($project_url) . '" style="width: 100%;" /></td></tr>';
    
    echo '<tr><th scope="row"><label for="temoakte_client_name">' . __('Client Name', 'temoakte') . '</label></th>';
    echo '<td><input type="text" id="temoakte_client_name" name="temoakte_client_name" value="' . esc_attr($client_name) . '" style="width: 100%;" /></td></tr>';
    
    echo '<tr><th scope="row"><label for="temoakte_project_date">' . __('Project Date', 'temoakte') . '</label></th>';
    echo '<td><input type="date" id="temoakte_project_date" name="temoakte_project_date" value="' . esc_attr($project_date) . '" style="width: 100%;" /></td></tr>';
    
    echo '<tr><th scope="row"><label for="temoakte_technologies">' . __('Technologies Used', 'temoakte') . '</label></th>';
    echo '<td><textarea id="temoakte_technologies" name="temoakte_technologies" rows="3" style="width: 100%;">' . esc_textarea($technologies) . '</textarea></td></tr>';
    echo '</table>';
}

/**
 * Services Meta Box Callback
 */
function temoakte_services_meta_callback($post) {
    wp_nonce_field('temoakte_services_meta_nonce', 'temoakte_services_meta_nonce_field');
    
    $service_price = get_post_meta($post->ID, '_temoakte_service_price', true);
    $service_duration = get_post_meta($post->ID, '_temoakte_service_duration', true);
    $service_features = get_post_meta($post->ID, '_temoakte_service_features', true);
    
    echo '<table class="form-table">';
    echo '<tr><th scope="row"><label for="temoakte_service_price">' . __('Service Price', 'temoakte') . '</label></th>';
    echo '<td><input type="text" id="temoakte_service_price" name="temoakte_service_price" value="' . esc_attr($service_price) . '" style="width: 100%;" /></td></tr>';
    
    echo '<tr><th scope="row"><label for="temoakte_service_duration">' . __('Service Duration', 'temoakte') . '</label></th>';
    echo '<td><input type="text" id="temoakte_service_duration" name="temoakte_service_duration" value="' . esc_attr($service_duration) . '" style="width: 100%;" /></td></tr>';
    
    echo '<tr><th scope="row"><label for="temoakte_service_features">' . __('Service Features', 'temoakte') . '</label></th>';
    echo '<td><textarea id="temoakte_service_features" name="temoakte_service_features" rows="5" style="width: 100%;">' . esc_textarea($service_features) . '</textarea>';
    echo '<p class="description">' . __('Enter one feature per line', 'temoakte') . '</p></td></tr>';
    echo '</table>';
}

/**
 * Testimonials Meta Box Callback
 */
function temoakte_testimonials_meta_callback($post) {
    wp_nonce_field('temoakte_testimonials_meta_nonce', 'temoakte_testimonials_meta_nonce_field');
    
    $client_name = get_post_meta($post->ID, '_temoakte_client_name', true);
    $client_position = get_post_meta($post->ID, '_temoakte_client_position', true);
    $client_company = get_post_meta($post->ID, '_temoakte_client_company', true);
    $rating = get_post_meta($post->ID, '_temoakte_rating', true);
    
    echo '<table class="form-table">';
    echo '<tr><th scope="row"><label for="temoakte_client_name">' . __('Client Name', 'temoakte') . '</label></th>';
    echo '<td><input type="text" id="temoakte_client_name" name="temoakte_client_name" value="' . esc_attr($client_name) . '" style="width: 100%;" /></td></tr>';
    
    echo '<tr><th scope="row"><label for="temoakte_client_position">' . __('Client Position', 'temoakte') . '</label></th>';
    echo '<td><input type="text" id="temoakte_client_position" name="temoakte_client_position" value="' . esc_attr($client_position) . '" style="width: 100%;" /></td></tr>';
    
    echo '<tr><th scope="row"><label for="temoakte_client_company">' . __('Client Company', 'temoakte') . '</label></th>';
    echo '<td><input type="text" id="temoakte_client_company" name="temoakte_client_company" value="' . esc_attr($client_company) . '" style="width: 100%;" /></td></tr>';
    
    echo '<tr><th scope="row"><label for="temoakte_rating">' . __('Rating (1-5)', 'temoakte') . '</label></th>';
    echo '<td><select id="temoakte_rating" name="temoakte_rating">';
    for ($i = 1; $i <= 5; $i++) {
        echo '<option value="' . $i . '"' . selected($rating, $i, false) . '>' . $i . ' Star' . ($i > 1 ? 's' : '') . '</option>';
    }
    echo '</select></td></tr>';
    echo '</table>';
}

/**
 * Save Meta Box Data
 */
function temoakte_save_meta_boxes($post_id) {
    // Portfolio Meta
    if (isset($_POST['temoakte_portfolio_meta_nonce_field']) && wp_verify_nonce($_POST['temoakte_portfolio_meta_nonce_field'], 'temoakte_portfolio_meta_nonce')) {
        if (isset($_POST['temoakte_project_url'])) {
            update_post_meta($post_id, '_temoakte_project_url', sanitize_url($_POST['temoakte_project_url']));
        }
        if (isset($_POST['temoakte_client_name'])) {
            update_post_meta($post_id, '_temoakte_client_name', sanitize_text_field($_POST['temoakte_client_name']));
        }
        if (isset($_POST['temoakte_project_date'])) {
            update_post_meta($post_id, '_temoakte_project_date', sanitize_text_field($_POST['temoakte_project_date']));
        }
        if (isset($_POST['temoakte_technologies'])) {
            update_post_meta($post_id, '_temoakte_technologies', sanitize_textarea_field($_POST['temoakte_technologies']));
        }
    }
    
    // Services Meta
    if (isset($_POST['temoakte_services_meta_nonce_field']) && wp_verify_nonce($_POST['temoakte_services_meta_nonce_field'], 'temoakte_services_meta_nonce')) {
        if (isset($_POST['temoakte_service_price'])) {
            update_post_meta($post_id, '_temoakte_service_price', sanitize_text_field($_POST['temoakte_service_price']));
        }
        if (isset($_POST['temoakte_service_duration'])) {
            update_post_meta($post_id, '_temoakte_service_duration', sanitize_text_field($_POST['temoakte_service_duration']));
        }
        if (isset($_POST['temoakte_service_features'])) {
            update_post_meta($post_id, '_temoakte_service_features', sanitize_textarea_field($_POST['temoakte_service_features']));
        }
    }
    
    // Testimonials Meta
    if (isset($_POST['temoakte_testimonials_meta_nonce_field']) && wp_verify_nonce($_POST['temoakte_testimonials_meta_nonce_field'], 'temoakte_testimonials_meta_nonce')) {
        if (isset($_POST['temoakte_client_name'])) {
            update_post_meta($post_id, '_temoakte_client_name', sanitize_text_field($_POST['temoakte_client_name']));
        }
        if (isset($_POST['temoakte_client_position'])) {
            update_post_meta($post_id, '_temoakte_client_position', sanitize_text_field($_POST['temoakte_client_position']));
        }
        if (isset($_POST['temoakte_client_company'])) {
            update_post_meta($post_id, '_temoakte_client_company', sanitize_text_field($_POST['temoakte_client_company']));
        }
        if (isset($_POST['temoakte_rating'])) {
            update_post_meta($post_id, '_temoakte_rating', intval($_POST['temoakte_rating']));
        }
    }
}
add_action('save_post', 'temoakte_save_meta_boxes');

/**
 * Register Temoakte Shortcodes
 */
function temoakte_register_shortcodes() {
    add_shortcode('temoakte_portfolio', 'temoakte_portfolio_shortcode');
    add_shortcode('temoakte_services', 'temoakte_services_shortcode');
    add_shortcode('temoakte_testimonials', 'temoakte_testimonials_shortcode');
    add_shortcode('temoakte_contact_form', 'temoakte_contact_form_shortcode');
}
add_action('init', 'temoakte_register_shortcodes');

/**
 * Portfolio Shortcode
 */
function temoakte_portfolio_shortcode($atts) {
    $atts = shortcode_atts(array(
        'limit' => 6,
        'category' => '',
        'columns' => 3
    ), $atts);
    
    $args = array(
        'post_type' => 'temoakte_portfolio',
        'posts_per_page' => intval($atts['limit']),
        'post_status' => 'publish'
    );
    
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'portfolio_category',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }
    
    $portfolio_query = new WP_Query($args);
    
    if (!$portfolio_query->have_posts()) {
        return '<p>' . __('No portfolio items found.', 'temoakte') . '</p>';
    }
    
    $output = '<div class="temoakte-portfolio-grid temoakte-grid temoakte-grid-' . intval($atts['columns']) . '">';
    
    while ($portfolio_query->have_posts()) {
        $portfolio_query->the_post();
        $project_url = get_post_meta(get_the_ID(), '_temoakte_project_url', true);
        $client_name = get_post_meta(get_the_ID(), '_temoakte_client_name', true);
        
        $output .= '<div class="temoakte-portfolio-item temoakte-card">';
        if (has_post_thumbnail()) {
            $output .= '<div class="temoakte-portfolio-image">';
            $output .= get_the_post_thumbnail(get_the_ID(), 'medium', array('class' => 'temoakte-post-image'));
            $output .= '</div>';
        }
        $output .= '<div class="temoakte-portfolio-content">';
        $output .= '<h3 class="temoakte-portfolio-title">' . get_the_title() . '</h3>';
        $output .= '<div class="temoakte-portfolio-excerpt">' . get_the_excerpt() . '</div>';
        if ($client_name) {
            $output .= '<p class="temoakte-portfolio-client"><strong>' . __('Client:', 'temoakte') . '</strong> ' . esc_html($client_name) . '</p>';
        }
        if ($project_url) {
            $output .= '<a href="' . esc_url($project_url) . '" class="temoakte-btn temoakte-btn-primary" target="_blank">' . __('View Project', 'temoakte') . '</a>';
        }
        $output .= '</div></div>';
    }
    
    $output .= '</div>';
    
    wp_reset_postdata();
    return $output;
}

/**
 * Services Shortcode
 */
function temoakte_services_shortcode($atts) {
    $atts = shortcode_atts(array(
        'limit' => 6,
        'category' => '',
        'columns' => 3
    ), $atts);
    
    $args = array(
        'post_type' => 'temoakte_services',
        'posts_per_page' => intval($atts['limit']),
        'post_status' => 'publish'
    );
    
    if (!empty($atts['category'])) {
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'service_category',
                'field' => 'slug',
                'terms' => $atts['category']
            )
        );
    }
    
    $services_query = new WP_Query($args);
    
    if (!$services_query->have_posts()) {
        return '<p>' . __('No services found.', 'temoakte') . '</p>';
    }
    
    $output = '<div class="temoakte-services-grid temoakte-grid temoakte-grid-' . intval($atts['columns']) . '">';
    
    while ($services_query->have_posts()) {
        $services_query->the_post();
        $service_price = get_post_meta(get_the_ID(), '_temoakte_service_price', true);
        $service_duration = get_post_meta(get_the_ID(), '_temoakte_service_duration', true);
        
        $output .= '<div class="temoakte-service-item temoakte-card">';
        if (has_post_thumbnail()) {
            $output .= '<div class="temoakte-service-image">';
            $output .= get_the_post_thumbnail(get_the_ID(), 'medium', array('class' => 'temoakte-post-image'));
            $output .= '</div>';
        }
        $output .= '<div class="temoakte-service-content">';
        $output .= '<h3 class="temoakte-service-title">' . get_the_title() . '</h3>';
        $output .= '<div class="temoakte-service-excerpt">' . get_the_excerpt() . '</div>';
        if ($service_price) {
            $output .= '<p class="temoakte-service-price"><strong>' . __('Price:', 'temoakte') . '</strong> ' . esc_html($service_price) . '</p>';
        }
        if ($service_duration) {
            $output .= '<p class="temoakte-service-duration"><strong>' . __('Duration:', 'temoakte') . '</strong> ' . esc_html($service_duration) . '</p>';
        }
        $output .= '<a href="' . get_permalink() . '" class="temoakte-btn temoakte-btn-primary">' . __('Learn More', 'temoakte') . '</a>';
        $output .= '</div></div>';
    }
    
    $output .= '</div>';
    
    wp_reset_postdata();
    return $output;
}

/**
 * Testimonials Shortcode
 */
function temoakte_testimonials_shortcode($atts) {
    $atts = shortcode_atts(array(
        'limit' => 3,
        'columns' => 3
    ), $atts);
    
    $args = array(
        'post_type' => 'temoakte_testimonials',
        'posts_per_page' => intval($atts['limit']),
        'post_status' => 'publish'
    );
    
    $testimonials_query = new WP_Query($args);
    
    if (!$testimonials_query->have_posts()) {
        return '<p>' . __('No testimonials found.', 'temoakte') . '</p>';
    }
    
    $output = '<div class="temoakte-testimonials-grid temoakte-grid temoakte-grid-' . intval($atts['columns']) . '">';
    
    while ($testimonials_query->have_posts()) {
        $testimonials_query->the_post();
        $client_name = get_post_meta(get_the_ID(), '_temoakte_client_name', true);
        $client_position = get_post_meta(get_the_ID(), '_temoakte_client_position', true);
        $client_company = get_post_meta(get_the_ID(), '_temoakte_client_company', true);
        $rating = get_post_meta(get_the_ID(), '_temoakte_rating', true);
        
        $output .= '<div class="temoakte-testimonial-item temoakte-card">';
        $output .= '<div class="temoakte-testimonial-content">';
        $output .= '<div class="temoakte-testimonial-text">' . get_the_content() . '</div>';
        if ($rating) {
            $output .= '<div class="temoakte-testimonial-rating">';
            for ($i = 1; $i <= 5; $i++) {
                $output .= '<span class="star' . ($i <= $rating ? ' filled' : '') . '">★</span>';
            }
            $output .= '</div>';
        }
        $output .= '<div class="temoakte-testimonial-author">';
        if ($client_name) {
            $output .= '<h4>' . esc_html($client_name) . '</h4>';
        }
        if ($client_position || $client_company) {
            $output .= '<p>';
            if ($client_position) {
                $output .= esc_html($client_position);
            }
            if ($client_position && $client_company) {
                $output .= ' at ';
            }
            if ($client_company) {
                $output .= esc_html($client_company);
            }
            $output .= '</p>';
        }
        $output .= '</div></div></div>';
    }
    
    $output .= '</div>';
    
    wp_reset_postdata();
    return $output;
}

/**
 * Contact Form Shortcode
 */
function temoakte_contact_form_shortcode($atts) {
    $atts = shortcode_atts(array(
        'title' => __('Contact Us', 'temoakte'),
        'button_text' => __('Send Message', 'temoakte')
    ), $atts);
    
    $output = '<div class="temoakte-contact-form">';
    $output .= '<h3>' . esc_html($atts['title']) . '</h3>';
    $output .= '<form id="temoakte-contact-form" class="temoakte-form">';
    $output .= wp_nonce_field('temoakte_contact_nonce', 'temoakte_contact_nonce_field', true, false);
    $output .= '<div class="temoakte-form-row">';
    $output .= '<div class="temoakte-form-group">';
    $output .= '<label for="temoakte_name">' . __('Name', 'temoakte') . ' *</label>';
    $output .= '<input type="text" id="temoakte_name" name="temoakte_name" required>';
    $output .= '</div>';
    $output .= '<div class="temoakte-form-group">';
    $output .= '<label for="temoakte_email">' . __('Email', 'temoakte') . ' *</label>';
    $output .= '<input type="email" id="temoakte_email" name="temoakte_email" required>';
    $output .= '</div>';
    $output .= '</div>';
    $output .= '<div class="temoakte-form-group">';
    $output .= '<label for="temoakte_subject">' . __('Subject', 'temoakte') . '</label>';
    $output .= '<input type="text" id="temoakte_subject" name="temoakte_subject">';
    $output .= '</div>';
    $output .= '<div class="temoakte-form-group">';
    $output .= '<label for="temoakte_message">' . __('Message', 'temoakte') . ' *</label>';
    $output .= '<textarea id="temoakte_message" name="temoakte_message" rows="5" required></textarea>';
    $output .= '</div>';
    $output .= '<div class="temoakte-form-group">';
    $output .= '<button type="submit" class="temoakte-btn temoakte-btn-primary">' . esc_html($atts['button_text']) . '</button>';
    $output .= '</div>';
    $output .= '<div id="temoakte-form-messages"></div>';
    $output .= '</form>';
    $output .= '</div>';
    
    return $output;
}

/**
 * Handle Contact Form Submission
 */
function temoakte_handle_contact_form() {
    if (!wp_verify_nonce($_POST['temoakte_contact_nonce_field'], 'temoakte_contact_nonce')) {
        wp_die(__('Security check failed', 'temoakte'));
    }
    
    $name = sanitize_text_field($_POST['temoakte_name']);
    $email = sanitize_email($_POST['temoakte_email']);
    $subject = sanitize_text_field($_POST['temoakte_subject']);
    $message = sanitize_textarea_field($_POST['temoakte_message']);
    
    $admin_email = get_option('admin_email');
    $site_name = get_bloginfo('name');
    
    $email_subject = '[' . $site_name . '] ' . ($subject ? $subject : __('New Contact Form Submission', 'temoakte'));
    $email_message = sprintf(
        __("New contact form submission from %s:\n\nName: %s\nEmail: %s\nSubject: %s\n\nMessage:\n%s", 'temoakte'),
        $site_name,
        $name,
        $email,
        $subject,
        $message
    );
    
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );
    
    if (wp_mail($admin_email, $email_subject, $email_message, $headers)) {
        wp_send_json_success(__('Message sent successfully!', 'temoakte'));
    } else {
        wp_send_json_error(__('Failed to send message. Please try again.', 'temoakte'));
    }
}
add_action('wp_ajax_temoakte_contact_form', 'temoakte_handle_contact_form');
add_action('wp_ajax_nopriv_temoakte_contact_form', 'temoakte_handle_contact_form');

/**
 * Add Theme Support
 */
function temoakte_theme_support() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('custom-header');
    add_theme_support('custom-background');
    add_theme_support('html5', array('search-form', 'comment-form', 'comment-list', 'gallery', 'caption'));
}
add_action('after_setup_theme', 'temoakte_theme_support');

/**
 * Register Widget Areas
 */
function temoakte_widgets_init() {
    register_sidebar(array(
        'name' => __('Temoakte Sidebar', 'temoakte'),
        'id' => 'temoakte-sidebar',
        'description' => __('Add widgets here to appear in your sidebar.', 'temoakte'),
        'before_widget' => '<section id="%1$s" class="widget %2$s temoakte-widget">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title temoakte-widget-title">',
        'after_title' => '</h3>',
    ));
    
    register_sidebar(array(
        'name' => __('Temoakte Footer 1', 'temoakte'),
        'id' => 'temoakte-footer-1',
        'description' => __('Add widgets here to appear in the first footer column.', 'temoakte'),
        'before_widget' => '<section id="%1$s" class="widget %2$s temoakte-footer-widget">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title temoakte-footer-widget-title">',
        'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
        'name' => __('Temoakte Footer 2', 'temoakte'),
        'id' => 'temoakte-footer-2',
        'description' => __('Add widgets here to appear in the second footer column.', 'temoakte'),
        'before_widget' => '<section id="%1$s" class="widget %2$s temoakte-footer-widget">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title temoakte-footer-widget-title">',
        'after_title' => '</h4>',
    ));
    
    register_sidebar(array(
        'name' => __('Temoakte Footer 3', 'temoakte'),
        'id' => 'temoakte-footer-3',
        'description' => __('Add widgets here to appear in the third footer column.', 'temoakte'),
        'before_widget' => '<section id="%1$s" class="widget %2$s temoakte-footer-widget">',
        'after_widget' => '</section>',
        'before_title' => '<h4 class="widget-title temoakte-footer-widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'temoakte_widgets_init');

/**
 * Customizer Settings
 */
function temoakte_customize_register($wp_customize) {
    
    // Temoakte Settings Section
    $wp_customize->add_section('temoakte_settings', array(
        'title' => __('Temoakte Settings', 'temoakte'),
        'priority' => 30,
    ));
    
    // Primary Color
    $wp_customize->add_setting('temoakte_primary_color', array(
        'default' => '#3b82f6',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'temoakte_primary_color', array(
        'label' => __('Primary Color', 'temoakte'),
        'section' => 'temoakte_settings',
        'settings' => 'temoakte_primary_color',
    )));
    
    // Secondary Color
    $wp_customize->add_setting('temoakte_secondary_color', array(
        'default' => '#1e40af',
        'sanitize_callback' => 'sanitize_hex_color',
    ));
    
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'temoakte_secondary_color', array(
        'label' => __('Secondary Color', 'temoakte'),
        'section' => 'temoakte_settings',
        'settings' => 'temoakte_secondary_color',
    )));
    
    // Footer Text
    $wp_customize->add_setting('temoakte_footer_text', array(
        'default' => __('© 2024 Temoakte. All rights reserved.', 'temoakte'),
        'sanitize_callback' => 'sanitize_text_field',
    ));
    
    $wp_customize->add_control('temoakte_footer_text', array(
        'label' => __('Footer Text', 'temoakte'),
        'section' => 'temoakte_settings',
        'type' => 'text',
    ));
}
add_action('customize_register', 'temoakte_customize_register');

/**
 * Custom CSS Output
 */
function temoakte_custom_css() {
    $primary_color = get_theme_mod('temoakte_primary_color', '#3b82f6');
    $secondary_color = get_theme_mod('temoakte_secondary_color', '#1e40af');
    
    echo '<style type="text/css">';
    echo ':root {';
    echo '--temoakte-primary: ' . esc_attr($primary_color) . ';';
    echo '--temoakte-secondary: ' . esc_attr($secondary_color) . ';';
    echo '}';
    echo '</style>';
}
add_action('wp_head', 'temoakte_custom_css');