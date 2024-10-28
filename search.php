<?php
/**
 * Template Name: Custom Search Template
 */

get_header(); ?>

<main class="search-page">
    <div class="container">
        <?php
    // Modify the main query to include only products and search in the product title
    function custom_search_query($query)
    {
        if ($query->is_search && $query->is_main_query()) {
            // Exclude posts and pages
            $query->set('post_type', array('product'));
            // Exclude posts and pages from the search results
            $query->set('post_status', 'publish');
            // Search in product title only
            // $query->set('title', get_search_query());
            // Set the maximum number of products per page
            $query->set('posts_per_page', -1); // Set to -1 for unlimited
        }
    }
    add_action('pre_get_posts', 'custom_search_query');
    ?>

        <?php if (have_posts()) : ?>
        <header class="page-header">
            <h2 class="page-title">
                <?php printf(esc_html__('Search Results for: %s', 'your-theme'), '<span>' . get_search_query() . '</span>'); ?>
            </h2>
        </header><!-- .page-header -->

        <div class="search-page__grid">
            <?php while (have_posts()) : the_post(); ?>
            <?php if (get_post_type() === 'product') : ?>
            <?php

                            $product = wc_get_product(get_the_ID());
                            // product fields
                            $product_id = get_the_ID();
                            $product_image_url = get_the_post_thumbnail_url($product_id, 'full');
                            $product_title = get_the_title();
                            $product_description = get_the_excerpt();
                            $product_link = get_permalink($product_id);

                            // custom fields
                            $featured = get_field('featured', $product_id);
                            $on_sale = get_field('on_sale', $product_id);
                            $logo = get_field('logo', $product_id); // Get only the URL

                            // Get stock quantity
                            $product = wc_get_product($product_id);
                            $stock_quantity = $product->get_stock_quantity();   

                            get_template_part('template-parts/product-card', null, array('image' => $product_image_url, 'title' => $product_title, 'description' => $product_description, 'link' => $product_link, 'featured' => $featured, 'logo' => $logo, 'sale' => $on_sale, 'stock' => $stock_quantity, 'product' => $product)); 
            ?>
            <?php endif; ?>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <?php
            global $wp_query;
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages
            ));
        ?>
        </div>

        <?php else : ?>
        <p><?php esc_html_e('No results found.', 'your-theme'); ?></p>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>