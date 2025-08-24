<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'temoakte'); ?></a>

    <header id="masthead" class="site-header temoakte-header">
        <nav class="temoakte-nav" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'temoakte'); ?>">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <h1 class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="temoakte-logo" rel="home">
                            <?php bloginfo('name'); ?>
                        </a>
                    </h1>
                    <?php
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) {
                        ?>
                        <p class="site-description"><?php echo $description; ?></p>
                        <?php
                    }
                }
                ?>
            </div><!-- .site-branding -->

            <div class="temoakte-menu-container">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'menu_class'     => 'temoakte-menu',
                    'container'      => false,
                    'fallback_cb'    => 'wp_page_menu',
                ));
                ?>
                
                <!-- Mobile Menu Toggle -->
                <button class="temoakte-menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                    <span class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
                    <span class="screen-reader-text"><?php esc_html_e('Main Menu', 'temoakte'); ?></span>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div class="temoakte-mobile-menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'mobile-menu',
                    'menu_class'     => 'temoakte-mobile-menu-list',
                    'container'      => false,
                    'fallback_cb'    => 'wp_page_menu',
                ));
                ?>
            </div>
        </nav><!-- .temoakte-nav -->

        <!-- Search Form -->
        <?php if (get_theme_mod('temoakte_show_search', true)) : ?>
        <div class="temoakte-search-form">
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <label>
                    <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'temoakte'); ?></span>
                    <input type="search" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'temoakte'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
                </label>
                <button type="submit">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="11" cy="11" r="8" stroke="currentcolor" stroke-width="2"/>
                        <path d="m21 21-4.35-4.35" stroke="currentcolor" stroke-width="2"/>
                    </svg>
                    <span class="screen-reader-text"><?php echo _x('Search', 'submit button', 'temoakte'); ?></span>
                </button>
            </form>
            <div class="temoakte-search-results"></div>
        </div>
        <?php endif; ?>

        <!-- Call to Action Button -->
        <?php 
        $cta_text = get_theme_mod('temoakte_cta_text', '');
        $cta_url = get_theme_mod('temoakte_cta_url', '');
        if ($cta_text && $cta_url) :
        ?>
        <div class="temoakte-header-cta">
            <a href="<?php echo esc_url($cta_url); ?>" class="temoakte-btn temoakte-btn-primary">
                <?php echo esc_html($cta_text); ?>
            </a>
        </div>
        <?php endif; ?>
    </header><!-- #masthead -->

    <!-- Hero Section for Homepage -->
    <?php if (is_front_page() && get_theme_mod('temoakte_show_hero', true)) : ?>
    <section class="temoakte-hero">
        <div class="temoakte-hero-content">
            <div class="temoakte-content">
                <h1 class="temoakte-hero-title">
                    <?php echo esc_html(get_theme_mod('temoakte_hero_title', get_bloginfo('name'))); ?>
                </h1>
                <p class="temoakte-hero-description">
                    <?php echo esc_html(get_theme_mod('temoakte_hero_description', get_bloginfo('description'))); ?>
                </p>
                
                <?php 
                $hero_button_text = get_theme_mod('temoakte_hero_button_text', '');
                $hero_button_url = get_theme_mod('temoakte_hero_button_url', '');
                if ($hero_button_text && $hero_button_url) :
                ?>
                <div class="temoakte-hero-actions">
                    <a href="<?php echo esc_url($hero_button_url); ?>" class="temoakte-btn temoakte-btn-primary temoakte-btn-large">
                        <?php echo esc_html($hero_button_text); ?>
                    </a>
                    
                    <?php 
                    $hero_secondary_button_text = get_theme_mod('temoakte_hero_secondary_button_text', '');
                    $hero_secondary_button_url = get_theme_mod('temoakte_hero_secondary_button_url', '');
                    if ($hero_secondary_button_text && $hero_secondary_button_url) :
                    ?>
                    <a href="<?php echo esc_url($hero_secondary_button_url); ?>" class="temoakte-btn temoakte-btn-secondary temoakte-btn-large">
                        <?php echo esc_html($hero_secondary_button_text); ?>
                    </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <?php 
        $hero_image = get_theme_mod('temoakte_hero_image', '');
        if ($hero_image) :
        ?>
        <div class="temoakte-hero-image">
            <img src="<?php echo esc_url($hero_image); ?>" alt="<?php echo esc_attr(get_theme_mod('temoakte_hero_title', get_bloginfo('name'))); ?>">
        </div>
        <?php endif; ?>
    </section>
    <?php endif; ?>

    <!-- Breadcrumbs -->
    <?php if (!is_front_page() && get_theme_mod('temoakte_show_breadcrumbs', true)) : ?>
    <div class="temoakte-breadcrumbs">
        <div class="temoakte-content">
            <nav aria-label="<?php esc_attr_e('Breadcrumb', 'temoakte'); ?>">
                <ol class="breadcrumb">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'temoakte'); ?></a></li>
                    
                    <?php if (is_category()) : ?>
                        <li aria-current="page"><?php single_cat_title(); ?></li>
                    <?php elseif (is_tag()) : ?>
                        <li aria-current="page"><?php single_tag_title(); ?></li>
                    <?php elseif (is_author()) : ?>
                        <li aria-current="page"><?php printf(__('Author: %s', 'temoakte'), get_the_author()); ?></li>
                    <?php elseif (is_date()) : ?>
                        <li aria-current="page"><?php the_archive_title(); ?></li>
                    <?php elseif (is_search()) : ?>
                        <li aria-current="page"><?php printf(__('Search Results for: %s', 'temoakte'), get_search_query()); ?></li>
                    <?php elseif (is_404()) : ?>
                        <li aria-current="page"><?php esc_html_e('404 Error', 'temoakte'); ?></li>
                    <?php elseif (is_single()) : ?>
                        <?php 
                        $categories = get_the_category();
                        if ($categories) :
                            foreach ($categories as $category) :
                        ?>
                        <li><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>"><?php echo esc_html($category->name); ?></a></li>
                        <?php 
                            break; // Only show first category
                            endforeach;
                        endif;
                        ?>
                        <li aria-current="page"><?php the_title(); ?></li>
                    <?php elseif (is_page()) : ?>
                        <?php
                        $parent_id = wp_get_post_parent_id(get_the_ID());
                        if ($parent_id) :
                            $parent = get_post($parent_id);
                        ?>
                        <li><a href="<?php echo esc_url(get_permalink($parent)); ?>"><?php echo esc_html($parent->post_title); ?></a></li>
                        <?php endif; ?>
                        <li aria-current="page"><?php the_title(); ?></li>
                    <?php else : ?>
                        <li aria-current="page"><?php the_archive_title(); ?></li>
                    <?php endif; ?>
                </ol>
            </nav>
        </div>
    </div>
    <?php endif; ?>

    <div id="content" class="site-content">
        <div class="temoakte-content"><?php // Opening div closed in footer ?>