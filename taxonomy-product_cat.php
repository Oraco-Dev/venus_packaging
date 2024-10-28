<?php
/*
Template Name: Custom Product Archive
*/

// Get the current category name from the URL
$category_name = get_query_var('product_cat');
$category = get_term_by('slug', $category_name, 'product_cat');
if ($category && !empty($category->term_id)) {
    // Get immediate child categories
    $child_categories = get_terms(array(
        'taxonomy' => 'product_cat',
        'parent' => $category->term_id,
        'hide_empty' => false, // Show even if they have no products
));
}

// Get the top level category
// Function to get the top-level parent category
function get_top_level_parent_category($category_id) {
    $category = get_term($category_id, 'product_cat'); // Assuming 'product_cat' is your taxonomy
    while ($category->parent != 0) {
        $category = get_term($category->parent, 'product_cat');
    }
    return $category;
}

// Get the top-level parent category
$top_level_parent_category = get_top_level_parent_category($category->term_id);
$top_level_parent_category_name = strtolower($top_level_parent_category->name); // Convert to lowercase

$current_category = get_queried_object();
$category_description = '';

// Get the WooCommerce product category description
if ($current_category && !empty($current_category->term_id)) {
    $category_description = get_term_meta($current_category->term_id, 'description', true);
    // Apply wpautop to format the description
    $category_description = wpautop($category_description);
}
// Print the category description

$trimmedContent = wp_trim_words($category_description, 500, null); // Ensure consistent length
$showReadMoreContent = strlen($category_description) > 500; // Check against consistent length

$truncated_description = substr($category_description, 0, 500);
// Strip any remaining HTML tags from the truncated description
$stripped_description = strip_tags($truncated_description, '<h1><h2><h3><h4><h5><h6><p><span><b><strong><a>');


// Query products based on the current category
// NOTES - ADD PAGINATION - FIND @ ELYSIUM BLOGS
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
    'post_type' => 'product', // WooCommerce products
    'posts_per_page' => 15,
    'paged' => $paged, // Pagination parameter
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat', // Product category taxonomy
            'field' => 'slug',
            'terms' => $category_name,
            'include_children' => false, // Exclude products from child categories
        ),
    ), 
    'orderby' => 'date', // Order by date
    'order' => 'DESC', // Descending order (most recent first)
);

$query = new WP_Query($args);

$total_products = $query->found_posts;
$products_per_page = 15;
$total_pages = ceil($total_products / $products_per_page);



get_header(); 

?>


<main class="productar-page">
    <input type="hidden" id="current-category-slug" value="<?php echo $category_name; ?>">
    <section class="productar-page__banner">
        <img src="https://venuspack.com.au/wp-content/uploads/2024/04/Spare-parts.svg"
            class="productar-page__banner-watermark" alt="Venus Banner - Watermark" />
        <div class="productar-page__banner-content container">
            <div class="productar-page__banner-content-left">
                <h1 class="display-two"><?php echo single_cat_title('', false); ?></h1>
                <!-- <div class="category-description">
                    <?php echo term_description(); ?>
                </div> -->
            </div>
        </div>
    </section>


    <div class="container">


        <section class="productar-page__content">

            <?php if($category_description != ''): ?>
            <div class="productar-page__content-description">
                <?php
                  
                  echo '<div id="trimmed-content" style="display: ' . ($showReadMoreContent ? 'block' : 'none') . ';">';
                  echo '<span class="read-button">' . $stripped_description . ($showReadMoreContent ? '...' : '') . '</span>';
                  if ($showReadMoreContent) {
                      echo '<span id="read-more-content" class="read-more" onclick="toggleContent(\'\')"><button class="button light-blue"><b>Read More</b></button></span>';
                  }
                  echo '</p>';
                  echo '</div>';
                  
                  echo '<div id="full-content" style="display: ' . ($showReadMoreContent ? 'none' : 'block') . ';">';
                  echo '<p>' . $category_description . '</p>';
                  if ($showReadMoreContent) {
                      echo '<p class="read-button"><span id="read-less-content" class="read-less" onclick="toggleContent(\'\')"><button class="button light-blue"><b>Read Less</b></button></span></p>';
                  }
                  echo '</div>';
         
     
            ?>
            </div>
            <?php endif; ?>

            <!-- IF CATEGORY HAS A PARENT AND IS NOT MACHINERY -->
            <?php
                if (!$category->parent && $category_name !== 'machinery' && $child_categories) :
            ?>
            <header class="productar-page__content-cards">
                <?php
          
            foreach ($child_categories as $child_category) {
                $icon_image_id = get_term_meta($child_category->term_id, 'product_category_icon', true);
                if ($icon_image_id) {   
                    $icon_image_url = wp_get_attachment_image_src($icon_image_id, 'full')[0];
                }
                if ($child_category->count > 0) {
                    ?>
                <?php if ($category_name === 'packaging-products') : ?>
                <a href="<?php echo get_term_link($child_category); ?>" class="productar-page__content-cards-card">
                    <img src="<?php echo esc_url($icon_image_url); ?>"
                        alt="<?php echo $child_category->name; ?> - Icon" />
                    <h5><?php echo $child_category->name; ?></h5>
                </a>
                <?php endif; ?>
                <?php } ?>
                <?php } ?>
            </header>
            <?php endif; ?>
            <!-- END OF CATEGORY HAS A PARENT AND IS NOT MACHINERY -->


            <!-- IF CATEGORY IS MACHINERY -->
            <?php
                if ($category_name == 'machinery') :
            ?>
            <header class="productar-page__content-cards">

                <a href="/product-category/machinery/heat-sealers" class="productar-page__content-cards-card">
                    <img src="http://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Machinery.svg"
                        alt="Heat Sealer - Icon" />
                    <h5>Heat Sealers</h5>
                </a>
                <a href="/product-category/packaging-products/strapping/strapping-stapling/strapping-machines/"
                    class="productar-page__content-cards-card">
                    <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Packaging-Strap.svg"
                        alt="Strapping Machines - Icon" />
                    <h5>Strapping Machines</h5>
                </a>
                <a href="/product-category/packaging-products/wrapping/pallet-wrapping-machines/"
                    class="productar-page__content-cards-card">
                    <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Pallet.svg"
                        alt="Heat Sealer - Icon" />
                    <h5>Pallet Wrappers</h5>
                </a>
                <a href="/product-category/packaging-products/tapes-ties-glues/carton-sealers/"
                    class="productar-page__content-cards-card">
                    <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Carton.svg"
                        alt="Heat Sealer - Icon" />
                    <h5>Carton Sealers</h5>
                </a>
                <a href="/product-category/packaging-products/wrapping/venusuni-shrink-wrapping-machines/"
                    class="productar-page__content-cards-card">
                    <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icons_CROP_Stretch.svg"
                        alt="Heat Sealer - Icon" />
                    <h5>Shrink Wrappers</h5>
                </a>

            </header>
            <?php endif; ?>
            <!-- END OF IS MACHINERY -->

            <!-- IF CATEGORY HAS A PARENT AND PARENT CATEGORY IS MACHINERY OR PACKAGING PRODUCTS -->
            <?php if($category->parent && $top_level_parent_category_name == 'machinery' || $category->parent && $top_level_parent_category_name == 'packaging products') : ?>
            <div class="productar-page__content-main-cards">
                <?php           
                            // Get child categories from 'industry' parent
                            foreach ($child_categories as $child_category) {
                                if ($child_category->count > 0) {
                                    $category_link = get_term_link($child_category);
                                    $category_image = z_taxonomy_image_url($child_category->term_id); // Retrieve category image URL using Categories Images plugin
                        
                                    echo '<a href="' . $category_link . '" class="productar-page__content-main-cards-card">';
                                    // if ($category_image) {
                                    //     echo '<img src="' . $category_image . '" alt="' . $child_category->name . '" class="category-image" />';
                                    // }
                                    echo '<h5>' . $child_category->name . '</h5>';
                                    echo '</a>';
                                }
                            }
                ?>
            </div>
            <?php endif; ?>
            <!-- END OF IF CATEGORY HAS A PARENT AND PARENT CATEGORY IS MACHINERY OR PACKAGING PRODUCTS -->

            <div class="productar-page__content-main">
                <header class="productar-page__content-main-header">
                    <div><?php woocommerce_breadcrumb(); ?></div>
                    <!-- <div>ADD FILTER HERE</div> -->
                </header>

                <div class="productar-page__content-main-container">
                    <div class="productar-page__content-main-container-left">

                        <?php if ($child_categories): ?>
                        <div class="productar-page__content-main-container-left-grandchild">
                            <h4>Product Category</h4>
                            <?php           
                            // Get child categories from 'industry' parent
                            foreach ($child_categories as $child_category) {

                                if ($child_category->count > 0) {
                                    $category_link = get_term_link($child_category);
                            
                                    echo '<form>';
                                    echo '<label class="productar-page__content-main-container-left-category-label"><input class="productar-page__content-main-container-left-category-input filter-product-archive-checkbox" type="checkbox" name="category[]" value="' . $child_category->name . '"> ' . '<span class="footer-text">' . $child_category->name . '</span>' . '</label><br>';
                                    echo '</form>';
                                }
                            }
                            ?>
                        </div>
                        <?php endif; ?>

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
                                        echo '<label class="productar-page__content-main-container-left-industry-label"><input class="productar-page__content-main-container-left-industry-input filter-product-archive-checkbox" type="checkbox" name="category[]" value="' . $child_category->name . '"> ' . '<span class="footer-text">' . $child_category->name . '</span>' . '</label><br>';
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
                    <div id="product-list-container" class="productar-page__content-main-container-right">
                        <?php
        
        // Check if there are any products found
         if ($query->have_posts()) :
             ?>




                        <?php
                        // Start the loop.
                            while ($query->have_posts()) : $query->the_post();

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

                            echo 'PRODUCTS PER PAGE';
                            echo '<br/>';
                            echo $products_per_page;
                            echo '<br/>';
                            echo '<br/>';
                            echo 'TOTAL PRODUCTS';
                            echo '<br/>';
                            echo $total_products;
                            echo '<br/>';
                            echo '<br/>';
                            echo 'TOTAL PAGES';
                            echo '<br/>';
                            echo $total_pages;

                            echo '<div class="product__grid-pagination">';
                            echo paginate_links(array(
                                'total' => $total_pages,
                                'current' => max(1, get_query_var('paged')),
                                'prev_text' => '&laquo;',
                                'next_text' => '&raquo;',
                            ));
                            echo '</div>';

                            ?>
                    </div>
                    <?php
                        // If no products found
                        else :
                        ?>
                    <h2 class="display-two"><?php _e('No products found', 'textdomain'); ?></h2>
                    <?php endif; ?>
                </div>
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
                            <img src="http://venuspack.com.au/wp-content/uploads/2024/04/home-header-icons2.svg"
                                alt="Venus Service Pages - Icon" />
                        </div>
                    </header>
                    <a href="/product-category/packaging-products">
                        <button class="button orange">View Catalogue</button>
                    </a>
                </div>
                <div class="about-page__explore-cards-card blue">
                    <header class="about-page__explore-cards-card-header">
                        <h4>Technical Service</h4>
                        <div>
                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/home-header-icons1.svg"
                                alt="Venus Service Pages - Icon" />
                        </div>
                    </header>
                    <a href="/service-spare-parts">
                        <button class="button orange">Learn More</button>
                    </a>
                </div>
                <div class="about-page__explore-cards-card blue">
                    <header class="about-page__explore-cards-card-header">
                        <h4>Crop Packaging</h4>
                        <div>
                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/home-header-icons3.svg"
                                alt="Venus Service Pages - Icon" />
                        </div>
                    </header>
                    <a href="/product-category/packaging-products/crop-packaging">
                        <button class="button orange">View Catalogue</button>
                    </a>
                </div>
                <div class="about-page__explore-cards-card orange">
                    <header class="about-page__explore-cards-card-header">
                        <h4>Heat Sealer Shop</h4>
                        <div>
                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/home-header-icons4.svg"
                                alt="Venus Service Pages - Icon" />
                        </div>
                    </header>
                    <a href="/product-category/machinery/heat-sealers">
                        <button class="button light-blue">Shop Now</button>
                    </a>
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