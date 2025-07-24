<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <!-- Google Fonts - Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class('font-temoakte bg-gray-50'); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site min-h-screen">
    <a class="skip-link screen-reader-text sr-only focus:not-sr-only focus:absolute focus:top-0 focus:left-0 bg-blue-600 text-white p-4 z-50" href="#primary">
        <?php esc_html_e('Skip to content', 'temoakte'); ?>
    </a>

    <!-- Flowbite Pro Navigation -->
    <header id="masthead" class="site-header bg-white border-b border-gray-200 sticky top-0 z-40">
        <nav class="temoakte-content">
            <div class="flex justify-between items-center py-4">
                
                <!-- Logo/Brand -->
                <div class="flex items-center">
                    <?php if (has_custom_logo()) : ?>
                        <div class="flex-shrink-0">
                            <?php the_custom_logo(); ?>
                        </div>
                    <?php else : ?>
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-lg">T</span>
                            </div>
                            <div>
                                <h1 class="text-xl font-bold text-gray-900">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                                        <?php bloginfo('name'); ?>
                                    </a>
                                </h1>
                                <?php 
                                $description = get_bloginfo('description', 'display');
                                if ($description || is_customize_preview()) :
                                ?>
                                <p class="text-sm text-gray-500"><?php echo $description; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

                <!-- Desktop Navigation Menu -->
                <div class="hidden lg:flex items-center space-x-8">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_class'     => 'flex space-x-8',
                        'container'      => false,
                        'fallback_cb'    => false,
                        'walker'         => new Temoakte_Tailwind_Walker_Nav_Menu(),
                    ));
                    ?>
                </div>

                <!-- Right Side Actions -->
                <div class="flex items-center space-x-4">
                    
                    <!-- Search Toggle -->
                    <button type="button" 
                            class="p-2 text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg"
                            data-modal-target="search-modal" 
                            data-modal-toggle="search-modal">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                        <span class="sr-only"><?php esc_html_e('Search', 'temoakte'); ?></span>
                    </button>

                    <!-- CTA Button -->
                    <?php 
                    $cta_text = get_theme_mod('temoakte_cta_text', __('Get Started', 'temoakte'));
                    $cta_url = get_theme_mod('temoakte_cta_url', '/contact');
                    ?>
                    <a href="<?php echo esc_url($cta_url); ?>" 
                       class="hidden sm:inline-flex items-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <?php echo esc_html($cta_text); ?>
                    </a>

                    <!-- Mobile Menu Toggle -->
                    <button type="button" 
                            class="lg:hidden p-2 text-gray-500 hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 rounded-lg"
                            data-drawer-target="mobile-menu" 
                            data-drawer-toggle="mobile-menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                        <span class="sr-only"><?php esc_html_e('Open main menu', 'temoakte'); ?></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>

    <!-- Mobile Menu Drawer (Flowbite Pro) -->
    <div id="mobile-menu" 
         class="fixed top-0 left-0 z-50 w-80 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white border-r border-gray-200"
         tabindex="-1">
        
        <div class="flex items-center justify-between mb-6">
            <h5 class="text-lg font-semibold text-gray-900"><?php bloginfo('name'); ?></h5>
            <button type="button" 
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 inline-flex items-center"
                    data-drawer-hide="mobile-menu">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only"><?php esc_html_e('Close menu', 'temoakte'); ?></span>
            </button>
        </div>

        <div class="space-y-2">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class'     => 'space-y-2',
                'container'      => false,
                'fallback_cb'    => false,
                'walker'         => new Temoakte_Mobile_Walker_Nav_Menu(),
            ));
            ?>
        </div>

        <div class="mt-6 pt-6 border-t border-gray-200">
            <a href="<?php echo esc_url($cta_url); ?>" 
               class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <?php echo esc_html($cta_text); ?>
            </a>
        </div>
    </div>

    <!-- Search Modal (Flowbite Pro) -->
    <div id="search-modal" 
         tabindex="-1" 
         class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full mx-auto">
            <div class="relative bg-white rounded-lg shadow">
                
                <div class="flex items-center justify-between p-4 border-b border-gray-200 rounded-t">
                    <h3 class="text-xl font-semibold text-gray-900">
                        <?php esc_html_e('Search', 'temoakte'); ?>
                    </h3>
                    <button type="button" 
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center"
                            data-modal-hide="search-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only"><?php esc_html_e('Close modal', 'temoakte'); ?></span>
                    </button>
                </div>

                <div class="p-6">
                    <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="space-y-4">
                        <div>
                            <label for="search-input" class="block mb-2 text-sm font-medium text-gray-900">
                                <?php esc_html_e('Search for content', 'temoakte'); ?>
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="search" 
                                       id="search-input" 
                                       name="s"
                                       value="<?php echo get_search_query(); ?>"
                                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" 
                                       placeholder="<?php esc_attr_e('Search articles, projects, services...', 'temoakte'); ?>"
                                       required>
                            </div>
                        </div>
                        
                        <div class="flex items-center space-x-2">
                            <button type="submit" 
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                                <?php esc_html_e('Search', 'temoakte'); ?>
                            </button>
                            <button type="button" 
                                    data-modal-hide="search-modal"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10">
                                <?php esc_html_e('Cancel', 'temoakte'); ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero Section with Flowbite Pro styling -->
    <?php if (is_front_page() && get_theme_mod('temoakte_show_hero', true)) : ?>
    <section class="bg-gradient-to-r from-blue-600 via-purple-600 to-blue-800">
        <div class="temoakte-content">
            <div class="py-16 lg:py-24">
                <div class="text-center">
                    <h1 class="text-4xl font-bold tracking-tight text-white sm:text-5xl lg:text-6xl">
                        <?php echo esc_html(get_theme_mod('temoakte_hero_title', get_bloginfo('name'))); ?>
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-blue-100 max-w-3xl mx-auto">
                        <?php echo esc_html(get_theme_mod('temoakte_hero_description', get_bloginfo('description'))); ?>
                    </p>
                    
                    <?php 
                    $hero_button_text = get_theme_mod('temoakte_hero_button_text', __('Get Started', 'temoakte'));
                    $hero_button_url = get_theme_mod('temoakte_hero_button_url', '/contact');
                    $hero_secondary_button_text = get_theme_mod('temoakte_hero_secondary_button_text', __('Learn More', 'temoakte'));
                    $hero_secondary_button_url = get_theme_mod('temoakte_hero_secondary_button_url', '/about');
                    
                    if ($hero_button_text && $hero_button_url) :
                    ?>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="<?php echo esc_url($hero_button_url); ?>" 
                           class="rounded-lg bg-white px-6 py-3 text-base font-semibold text-blue-600 shadow-sm hover:bg-blue-50 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white transition-all duration-200">
                            <?php echo esc_html($hero_button_text); ?>
                        </a>
                        
                        <?php if ($hero_secondary_button_text && $hero_secondary_button_url) : ?>
                        <a href="<?php echo esc_url($hero_secondary_button_url); ?>" 
                           class="text-base font-semibold leading-6 text-white hover:text-blue-100 transition-colors duration-200">
                            <?php echo esc_html($hero_secondary_button_text); ?>
                            <span aria-hidden="true">→</span>
                        </a>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <!-- Breadcrumbs with Flowbite Pro styling -->
    <?php if (!is_front_page() && get_theme_mod('temoakte_show_breadcrumbs', true)) : ?>
    <nav class="bg-gray-50 border-b border-gray-200" aria-label="<?php esc_attr_e('Breadcrumb', 'temoakte'); ?>">
        <div class="temoakte-content">
            <ol class="inline-flex items-center space-x-1 md:space-x-3 py-4">
                <li class="inline-flex items-center">
                    <a href="<?php echo esc_url(home_url('/')); ?>" 
                       class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                        <svg class="w-3 h-3 mr-2.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                        </svg>
                        <?php esc_html_e('Home', 'temoakte'); ?>
                    </a>
                </li>
                
                <?php if (is_single() || is_page()) : ?>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2"><?php the_title(); ?></span>
                    </div>
                </li>
                <?php elseif (is_category() || is_tag() || is_archive()) : ?>
                <li>
                    <div class="flex items-center">
                        <svg class="w-3 h-3 text-gray-400 mx-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2"><?php the_archive_title(); ?></span>
                    </div>
                </li>
                <?php endif; ?>
            </ol>
        </div>
    </nav>
    <?php endif; ?>

    <div id="content" class="site-content">
        <div class="temoakte-content"><?php // Opening div closed in footer ?>

<?php
/**
 * Custom Walker for Tailwind CSS Navigation Menu
 */
class Temoakte_Tailwind_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        
        $active_class = in_array('current-menu-item', $classes) ? ' text-blue-600' : ' text-gray-700 hover:text-blue-600';
        
        $output .= '<li class="' . esc_attr($class_names) . '">';
        
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        
        $item_output = '<a class="font-medium transition-colors duration-200' . $active_class . '"' . $attributes . '>';
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= '</a>';
        
        $output .= $item_output;
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Custom Walker for Mobile Navigation Menu
 */
class Temoakte_Mobile_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;
        
        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        
        $active_class = in_array('current-menu-item', $classes) ? ' bg-blue-50 text-blue-600' : ' text-gray-700 hover:bg-gray-100';
        
        $output .= '<div class="' . esc_attr($class_names) . '">';
        
        $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
        $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
        $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
        $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
        
        $item_output = '<a class="block px-3 py-2 rounded-lg font-medium transition-colors duration-200' . $active_class . '"' . $attributes . '>';
        $item_output .= apply_filters('the_title', $item->title, $item->ID);
        $item_output .= '</a>';
        
        $output .= $item_output;
    }
    
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</div>\n";
    }
}
?>