<?php
/*
Template Name: Eco Products Archive
*/

// eco products
$eco_args = array(
    'post_type'      => 'product',
    'posts_per_page' => 15, // Display 15 products per page
    'paged'          => max(1, get_query_var('paged')), // Pagination
    'meta_query'     => array(
        array(
            'key'     => 'eco_friendly', // Adjust this to your actual meta key
            'value'   => 'yes', // Check for 'yes' within the serialized/advanced custom field data
            'compare' => 'LIKE', // Use 'LIKE' to search within serialized/advanced data
        )
    ),
    'orderby' => 'date', // Order by date
    'order' => 'DESC', // Descending order (most recent first)
);

$eco_products = new WP_Query( $eco_args );



get_header(); 

?>


<main class="productar-page">
    <input type="hidden" id="current-category-slug" value="<?php echo $category_name; ?>">
    <section class="productar-page__banner">
        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Spare-parts.svg"
            class="productar-page__banner-watermark" alt="Venus Banner - Watermark" />
        <div class="productar-page__banner-content container">
            <div class="productar-page__banner-content-left">
                <h1 class="display-two">Eco Products</h1>
                <!-- <div class="category-description">
                    <?php echo term_description(); ?>
                </div> -->
            </div>
        </div>
    </section>


    <div class="container">

        <div class="productar-page__content-main">
            <header class="productar-page__content-main-header">
                <div><?php woocommerce_breadcrumb(); ?></div>
                <!-- <div>ADD FILTER HERE</div> -->
            </header>

            <div class="productar-page__content-main-container">
                <div class="productar-page__content-main-container-left">
                    <div class="productar-page__content-main-container-left-industry">
                        <h4>Industry</h4>
                        <?php           

                            // Get child categories from 'industry' parent
                            $industry_category = get_terms(array(
                            'taxonomy' => 'product_cat',
                            'slug'     => 'industry',
                            'hide_empty' => false, // Include categories even if they have no products assigned
                                ));
                            
                            if (!empty($industry_category)) {
                                    // Get child categories of the parent category
                                    $child_categories = get_terms(array(
                                        'taxonomy' => 'product_cat',
                                        'parent'   => $industry_category[0]->term_id,
                            ));}

                                echo '<form>';
                                    foreach ($child_categories as $child_category) {
                                        echo '<label class="productar-page__content-main-container-left-industry-label"><input class="productar-page__content-main-container-left-industry-input filter-eco-product-archive-checkbox" type="checkbox" name="category[]" value="' . $child_category->name . '"> ' . '<span class="footer-text">' . $child_category->name . '</span>' . '</label><br>';
                                    }
                                echo '</form>';
                            ?>
                    </div>

                    <!-- BRAND FILTER - REMOVED -->

                    <!-- <div class="productar-page__content-main-container-left-brand">
                            <h4>Brand</h4>
                            <?php           
                            // Get child categories from 'brand' parent
                            $brand_category = get_terms(array(
                            'taxonomy' => 'product_cat',
                            'slug'     => 'brand',
                            'hide_empty' => false, // Include categories even if they have no products assigned
                                ));

                            if (!empty($brand_category)) {
                                    // Get child categories of the parent category
                                    $child_categories = get_terms(array(
                                        'taxonomy' => 'product_cat',
                                        'parent'   => $brand_category[0]->term_id,
                            ));}

                                echo '<form>';
                                    foreach ($child_categories as $child_category) {
                                        echo '<label class="productar-page__content-main-container-left-industry-label"><input class="productar-page__content-main-container-left-brand-input filter-product-archive-checkbox" type="checkbox" name="category[]" value="' . $child_category->name . '"> ' . '<span class="footer-text">' . $child_category->name . '</span>' . '</label><br>';
                                    }
                                echo '</form>';
                            ?>
                        </div> -->

                    <!-- END BRAND FILTER - REMOVED -->

                    <div class="productar-page__content-main-container-left-help">
                        <h3>Need help?</h3>
                        <p>Call us now to enquire about any of our products and speak to our friendly team.</p>
                        <a href="tel:0394281652"><button class="button">Call us: (03) 9428 1652</button></a>
                    </div>
                </div>
                <div id="product-list-container-eco" class="productar-page__content-main-container-right"><?php
        
        // Check if there are any products found
         if ($eco_products->have_posts()) :
             ?>




                    <?php
                        // Start the loop.
                            while ($eco_products->have_posts()) : $eco_products->the_post();

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
                          
                            endwhile;

                              // Pagination links
                            
                            ?>
                </div>

                <?php
                        // If no products found
                        else :
                        ?>
                <h2 class="display-two"><?php _e('No products found', 'textdomain'); ?></h2>
                <?php endif; ?>
            </div>

            <?php
    echo '<div class="product__grid-pagination">';
    echo paginate_links(array(
        'total' => $eco_products->max_num_pages,
        'current' => max(1, get_query_var('paged')),
        'prev_text' => '&laquo;',
        'next_text' => '&raquo;',
    ));
    echo '</div>';
                ?>
        </div>
    </div>



    <div class="container">
        <section class="about-page__explore">

            <header class="about-page__explore-header">
                <h2>Explore Our Solutions</h2>
            </header>

            <section class="about-page__explore-cards container">
                <div class="about-page__explore-cards-card blue">
                    <header class="about-page__explore-cards-card-header">
                        <h4>Packaging Products</h4>
                        <div>
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/home-header-icons2.svg"
                                alt="Venus Service Pages - Icon" />
                        </div>
                    </header>
                    <button class="button orange">View Catalogue</button>
                </div>
                <div class="about-page__explore-cards-card blue">
                    <header class="about-page__explore-cards-card-header">
                        <h4>Technical Service</h4>
                        <div>
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/home-header-icons1.svg"
                                alt="Venus Service Pages - Icon" />
                        </div>
                    </header>
                    <button class="button orange">Learn More</button>
                </div>
                <div class="about-page__explore-cards-card blue">
                    <header class="about-page__explore-cards-card-header">
                        <h4>Crop Packaging</h4>
                        <div>
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/home-header-icons3.svg"
                                alt="Venus Service Pages - Icon" />
                        </div>
                    </header>
                    <button class="button orange">View Catalogue</button>
                </div>
                <div class="about-page__explore-cards-card orange">
                    <header class="about-page__explore-cards-card-header">
                        <h4>Heat Sealer Shop</h4>
                        <div>
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/home-header-icons4.svg"
                                alt="Venus Service Pages - Icon" />
                        </div>
                    </header>
                    <button class="button light-blue">Shop Now</button>
                </div>
            </section>
        </section>


    </div>

</main>

<script>
function toggleContent() {
    let trimmedContent = document.getElementById('trimmed-content');
    let fullContent = document.getElementById('full-content');

    if (trimmedContent && fullContent) {
        if (trimmedContent.style.display !== 'none') {
            trimmedContent.style.display = 'none';
            fullContent.style.display = 'block';
        } else {
            trimmedContent.style.display = 'block';
            fullContent.style.display = 'none';
        }
    }
}
</script>

<?php
get_footer();