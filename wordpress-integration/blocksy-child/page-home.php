<?php
/**
 * Template Name: Temoakte Home
 * Ready-made home page with placeholder content
 */

get_header(); ?>

<main>
    <!-- Hero Section -->
    <?php echo do_shortcode('[temoakte_hero title="Welcome to Temoakte" subtitle="Modern WordPress Theme with Tailwind CSS v4 & Flowbite Pro" button_text="Get Started Today" button_url="#features"]'); ?>

    <!-- Features Section -->
    <div id="features">
        <?php echo do_shortcode('[temoakte_features title="Why Choose Temoakte?"]'); ?>
    </div>

    <!-- Stats Section -->
    <?php echo do_shortcode('[temoakte_stats]'); ?>

    <!-- Testimonials Section -->
    <?php echo do_shortcode('[temoakte_testimonials]'); ?>

    <!-- Call to Action Section -->
    <section class="py-16 bg-white dark:bg-gray-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-3xl font-bold mb-6 text-gray-900 dark:text-white">
                Ready to Get Started?
            </h2>
            <p class="text-xl mb-8 text-gray-600 dark:text-gray-300">
                Join thousands of users who trust Temoakte for their WordPress websites
            </p>
            <div class="space-x-4">
                <a href="#contact" class="inline-flex items-center px-8 py-4 bg-primary-600 hover:bg-primary-700 text-white font-semibold rounded-lg transition-colors">
                    Contact Us Now
                </a>
                <a href="#" class="inline-flex items-center px-8 py-4 bg-transparent border-2 border-primary-600 text-primary-600 hover:bg-primary-600 hover:text-white font-semibold rounded-lg transition-colors">
                    View Documentation
                </a>
            </div>
        </div>
    </section>

    <!-- Latest Blog Posts -->
    <section class="py-16 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-900 dark:text-white">
                Latest News & Updates
            </h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                $recent_posts = wp_get_recent_posts(array(
                    'numberposts' => 3,
                    'post_status' => 'publish'
                ));
                
                if ($recent_posts) {
                    foreach ($recent_posts as $post) {
                        setup_postdata($GLOBALS['post'] =& $post);
                        ?>
                        <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <?php if (has_post_thumbnail($post['ID'])) : ?>
                                <div class="aspect-w-16 aspect-h-9">
                                    <?php echo get_the_post_thumbnail($post['ID'], 'medium', array('class' => 'w-full h-48 object-cover')); ?>
                                </div>
                            <?php else : ?>
                                <div class="w-full h-48 bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                    <span class="text-gray-400 dark:text-gray-500">No Image</span>
                                </div>
                            <?php endif; ?>
                            
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">
                                    <a href="<?php echo get_permalink($post['ID']); ?>" class="hover:text-primary-600 dark:hover:text-primary-400">
                                        <?php echo esc_html($post['post_title']); ?>
                                    </a>
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">
                                    <?php echo wp_trim_words($post['post_content'], 20); ?>
                                </p>
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    <span><?php echo date('M j, Y', strtotime($post['post_date'])); ?></span>
                                </div>
                            </div>
                        </article>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    // Placeholder content if no posts
                    for ($i = 1; $i <= 3; $i++) {
                        ?>
                        <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                            <div class="w-full h-48 bg-gradient-to-br from-primary-400 to-primary-600 flex items-center justify-center">
                                <span class="text-white text-2xl font-bold">Post <?php echo $i; ?></span>
                            </div>
                            <div class="p-6">
                                <h3 class="text-xl font-semibold mb-3 text-gray-900 dark:text-white">
                                    Sample Blog Post Title <?php echo $i; ?>
                                </h3>
                                <p class="text-gray-600 dark:text-gray-300 mb-4">
                                    This is a sample blog post excerpt. Replace with your actual content when you start blogging.
                                </p>
                                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400">
                                    <span><?php echo date('M j, Y'); ?></span>
                                </div>
                            </div>
                        </article>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>