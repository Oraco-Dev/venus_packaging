<?php

get_header();


global $product;

$product_id = $product->get_ID();

// product images
$main_product_id = $product->get_image_id(); // Get the main image ID
$main_product_image_url = wp_get_attachment_image_url($main_product_id, 'full'); // Get the image URL
$gallery_product_ids = $product->get_gallery_image_ids();

// product fields
$logo = get_field('logo', $product_id);
$product_title = get_the_title();
$product_description = get_post_field('post_content', $product_id);
$product_price = $product->get_price();
$is_featured = get_field('featured', $product_id);
$is_eco = get_field('eco_friendly', $product_id);
$is_new = get_field('new', $product_id);
$is_low = get_field('low_stock', $product_id);
$pdf_url = get_field('pdf', $product_id);
$is_sale = get_field('on_sale', $product_id);

$video_url = get_field('video_url', $product_id);
$embed_url = str_replace("watch?v=", "embed/", $video_url);

$list_features = get_field('list_of_features', $product_id);
$features_array = explode("\n", $list_features);
$features_array = array_filter(array_map('trim', $features_array), 'strlen');
// accordion fields
$accordion_title_1 = get_post_meta($product_id, 'accordiontitle1', true);
$accordion_content_1 = get_post_meta($product_id, 'accordioncontent1', true);
$accordion_title_2 = get_post_meta($product_id, 'accordiontitle2', true);
$accordion_content_2 = get_post_meta($product_id, 'accordioncontent2', true);
$accordion_title_3 = get_post_meta($product_id, 'accordiontitle3', true);
$accordion_content_3 = get_post_meta($product_id, 'accordioncontent3', true);

// Get the category IDs of the current product
$categories = wp_get_post_terms($product_id, 'product_cat', array('fields' => 'ids'));

// Get the IDs of the parent categories
$parent_categories = array();
foreach ($categories as $category_id) {
$ancestors = get_ancestors($category_id, 'product_cat');
if (!empty($ancestors)) {
// Add the direct parent category to the list of parent categories
$parent_categories[] = end($ancestors);
}
}

// Exclude products assigned to parent categories
$category_ids_to_include = array_diff($categories, $parent_categories);
// Query for the 4 most recent products in the lowest level category
$related_products_query = new WP_Query( array(
'post_type' => 'product',
'post_status' => 'publish',
'posts_per_page' => 4,
'tax_query' => array(
array(
'taxonomy' => 'product_cat',
'field' => 'id',
'terms' => $category_ids_to_include,
),
),
'orderby' => 'date',
'order' => 'DESC',
'post__not_in' => array($product_id),
));

$crosssell_ids = get_post_meta($product_id, '_crosssell_ids', true);

if (!empty($crosssell_ids)) {
    $crosssell_args = array(
        'post_type' => 'product',
        'post_status' => 'publish',
        'post__in' => $crosssell_ids
    );
}

$crosssell_query = new WP_Query($crosssell_args);
?>



<main class="product-page">

    <div class="product-page__overlay"></div>
    <div class="product-page__modal">
        <div class="product-page__modal-header">
            <h3>Enquire</h3>
            <div class="close-product-modal">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </div>
        <?php echo do_shortcode('[gravityform id="3" title="false" ajax="true"]') ?>
    </div>

    <div class="product-page-video__overlay"></div>
    <div class="product-page-video__modal">
        <div class="product-page-video__modal-header">
            <!-- <h3>Enquire</h3> -->
            <div class="close-product-video-modal">
                <div class="leftright"></div>
                <div class="rightleft"></div>
            </div>
        </div>

        <div
            style="margin-top: 32px; display: flex; align-items: center; justify-content: center; width: 100%; height: 100%;">
            <?php echo $embed_url ?>
        </div>

    </div>

    <div class="container">
        <header class="product-page__header">
            <div><?php woocommerce_breadcrumb(); ?></div>
        </header>
    </div>



    <div class="container">
        <section class="product-page__content">
            <div class="product-page__content-left">
                <h1 class="mobile-only"><?php echo $product_title ?></h1>
                <a href="<?php echo esc_url($main_product_image_url); ?>" data-fancybox="gallery"
                    data-caption="Product Image - <?php echo esc_attr($product->get_name()); ?>">
                    <img class="product-page__content-left-img" src="<?php echo esc_url($main_product_image_url); ?>"
                        alt="Product Image - <?php echo esc_attr($product->get_name()); ?>" />
                </a>
                <div class="product-page__content-left-gallery">
                    <?php 
        foreach ($gallery_product_ids as $gallery_id) {
            $gallery_image_url = wp_get_attachment_image_url($gallery_id, 'full'); // Get each gallery image URL
            echo '<a href="' . esc_url($gallery_image_url) . '" data-fancybox="gallery" data-caption="Product Image - ' . esc_attr($product->get_name()) . '">';
            echo '<img src="' . esc_url($gallery_image_url) . '" alt="' . esc_attr($product->get_name()) . '">';
            echo '</a>';
        } ?>
                </div>
            </div>

            <div class="product-page__content-right">
                <div class="product-page__content-right-logo">
                    <div class="product-page__content-right-logo">
                        <?php if($logo): ?>
                        <img src="<?php echo $logo ?>" alt="Product - Logo"
                            class="product-page__content-right-logo-img" />
                        <?php endif; ?>
                    </div>
                    <div class="product-page__content-right-logo-badges">
                        <!-- LOW STOCK -->
                        <?php if ( $is_low): ?>
                        <div class="product-page__content-right-logo-badges-badge low">
                            <h5>Low Stock</h5>
                        </div>
                        <?php endif; ?>
                        <!-- ON SALE -->
                        <?php if ( $is_sale): ?>
                        <div class="product-page__content-right-logo-badges-badge sale">
                            <h5>Sale</h5>
                        </div>
                        <?php endif; ?>
                        <?php if ( $is_featured): ?>
                        <div class="product-page__content-right-logo-badges-badge featured">
                            <h5>Featured</h5>
                        </div>
                        <?php endif; ?>
                        <?php if ( $is_eco ): ?>
                        <div class="product-page__content-right-logo-badges-badge eco">
                            <h5>Eco</h5>
                        </div>
                        <?php endif; ?>
                        <?php if ( $is_new ): ?>
                        <div class="product-page__content-right-logo-badges-badge new">
                            <h5>New</h5>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <h1 class="desktop-only"><?php echo $product_title ?></h1>
                <div class="product-page__content-right-hr"></div>
                <?php if($product_description): ?>
                <h4>Product description</h4>
                <p><?php echo $product_description ?></p>
                <div class="product-page__content-right-hr"></div>
                <?php endif; ?>
                <?php
                if (!empty($features_array)): ?>
                <h4>Features:</h4>
                <ul>
                    <?php foreach ($features_array as $feature): ?>
                    <li><?php echo htmlspecialchars($feature); ?></li>
                    <?php endforeach; ?>
                </ul>
                <div class="product-page__content-right-hr"></div>
                <?php endif; ?>
                <!-- WORKING ON 17/6/24 -->
                <div class="product-page__content-right-links">
                    <?php if(isset($pdf_url) && $pdf_url): ?>
                    <a href="<?php echo $pdf_url ?>" target="_blank" download><button class="button light-blue">Download
                            Product
                            Guide</button></a>

                    <?php endif; ?>
                    <?php if($video_url): ?>
                    <a id="product-video-form-button"><button class="button orange">Product Video</button></a>
                    <?php endif; ?>

                </div>
                <?php if ($pdf_url || $video_url): ?>
                <div class="product-page__content-right-hr"></div>
                <? endif; ?>

                <a id="product-form-button"><button class="button orange">Enquire</button></a>
                <div class="product-page__content-right-hr"></div>


                <!-- WOOCOMMERCE SECTION -->
                <!-- IF PRODUCT IS NORMAL AND HAS PRICE -->
                <?php if ($product->get_price() > 0 && !$product->is_type('variable')) : ?>
                <form class="cart" action="<?php echo esc_url(wc_get_cart_url()); ?>" method="post"
                    enctype='multipart/form-data'>
                    <div class="product-submit-container">
                        <h3><?php echo '$' . $product_price; ?></h3>
                    </div>
                    <div>
                        <span class="normal-product-quantity">Quantity</span>
                        <?php
                    // woocommerce_quantity_input function outside of the conditional block
                    woocommerce_quantity_input(array(
                        'min_value'   => apply_filters('woocommerce_quantity_input_min', 1, $product),
                        'max_value'   => apply_filters('woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product),
                    ));
                    ?>
                    </div>
                    <button type="submit"
                        class="single_add_to_cart_button button alt orange"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>
                    <?php
                    // Output hidden input fields for adding to cart
                    echo '<input type="hidden" name="add-to-cart" value="' . esc_attr($product_id) . '" />';
                    ?>
                </form>
                <?php endif; ?>

                <!-- IF PRODUCT IS VARIABLE AND HAS PRICE -->
                <?php
                if ($product->get_price() > 0 && $product->is_type('variable')) {
                    // echo '<span class="price">' . $product->get_price_html() . '</span>';

                    // Display variations dropdown
                    woocommerce_variable_add_to_cart();
                }
                ?>
            </div>
        </section>
    </div>

    <?php if (!empty($accordion_title_1) && !empty($accordion_content_1)) : ?>
    <div class="container">
        <section class="product-page__accordion">
            <?php get_template_part('template-parts/accordion', null, array('postId' => $product_id, 'headColour' => '')) ?>
        </section>
    </div>
    <?php endif; ?>

    <div class="container">
        <div class="product-page__related">
            <h3>Related Products</h3>
            <div class="product-page__related-products">
                <?php if ($crosssell_query->post_count > 0): ?>
                <?php 
                    if ($crosssell_query->have_posts()) :
                ?>
                <?php
                        // Start the loop.
                            while ($crosssell_query->have_posts()) : $crosssell_query->the_post();
                            
                            $product = wc_get_product(get_the_ID());
                            // product fields
                            $product_id = get_the_ID();
                            $product_image_url = get_the_post_thumbnail_url($product_id, 'full');
                            $product_title = get_the_title();
                            $product_description = get_the_excerpt();
                            $product_link = get_permalink($product_id);

                            // Get the WC_Product object
                            $product = wc_get_product($product_id);

                            // custom fields
                            $featured = get_field('featured', $product_id);
                            $on_sale = get_field('on_sale', $product_id);
                            $logo = get_field('logo', $product_id); // Get only the URL

                            // Get stock quantity
                            $product = wc_get_product($product_id);
                            $stock_quantity = $product->get_stock_quantity();

                            get_template_part('template-parts/product-card', null, array('image' => $product_image_url, 'title' => $product_title, 'description' => $product_description, 'link' => $product_link, 'featured' => $featured, 'logo' => $logo, 'sale' => $on_sale, 'stock' => $stock_quantity, 'product' => $product)); 
                          
                            endwhile;
                            ?>
            </div>
            <?php
                    // If no products found
                    else:
                ?>
            <h2 class="display-two"><?php _e('No products found', 'textdomain'); ?></h2>
            <?php endif;
            wp_reset_postdata();
            ?>
            <?php endif; ?>
            <?php if ($crosssell_query->post_count == 0): ?>
            <?php 
                    if ($related_products_query->have_posts()) :
                ?>
            <?php
                        // Start the loop.
                            while ($related_products_query->have_posts()) : $related_products_query->the_post();
                            
                            $product = wc_get_product(get_the_ID());
                            // product fields
                            $product_id = get_the_ID();
                            $product_image_url = get_the_post_thumbnail_url($product_id, 'full');
                            $product_title = get_the_title();
                            $product_description = get_the_excerpt();
                            $product_link = get_permalink($product_id);

                            // Get the WC_Product object
                            $product = wc_get_product($product_id);

                            // custom fields
                            $featured = get_field('featured', $product_id);
                            $on_sale = get_field('on_sale', $product_id);
                            $logo = get_field('logo', $product_id); // Get only the URL

                            // Get stock quantity
                            $product = wc_get_product($product_id);
                            $stock_quantity = $product->get_stock_quantity();

                            get_template_part('template-parts/product-card', null, array('image' => $product_image_url, 'title' => $product_title, 'description' => $product_description, 'link' => $product_link, 'featured' => $featured, 'logo' => $logo, 'sale' => $on_sale, 'stock' => $stock_quantity, 'product' => $product)); 
                          
                            endwhile;
                            ?>
        </div>
        <?php
                    // If no products found
                    else:
                ?>
        <h2 class="display-two"><?php _e('No products found', 'textdomain'); ?></h2>
        <?php endif;
            wp_reset_postdata();
            ?>
        <?php endif; ?>
    </div>
    </div>
    </div>

</main>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Function to extract product name from URL
    function extractProductNameFromUrl() {
        // Get the current URL path
        var currentPath = window.location.pathname;

        // Remove leading and trailing slashes
        currentPath = currentPath.replace(/^\/+|\/+$/g, '');

        // Split the path by slashes
        var pathSegments = currentPath.split('/');

        // The product name is the last segment of the path
        var productName = pathSegments.pop();

        // Replace dashes with spaces if needed
        productName = productName.replace(/-/g, ' ');

        return productName;
    }

    // Function to populate input field with product name
    function populateProductNameField() {
        // Find the input field in the form by its ID or any other selector
        var productNameField = document.querySelector(
            '#input_3_1'
        ); // Replace '#input_3_1' with the actual ID or any other selector of your input field

        // Populate the input field with the product name from the URL
        if (productNameField) {
            productNameField.value = extractProductNameFromUrl();
            productNameField.readOnly = true;
        }
    }

    // Populate the input field when the page loads
    populateProductNameField();
});

document.addEventListener('DOMContentLoaded', function() {

    var addToCartForms = document.querySelectorAll('form.cart');

    addToCartForms.forEach(function(form) {
        form.addEventListener('submit', function(event) {
            // Prevent the default form submission
            event.preventDefault();

            // Submit the form
            var formData = new FormData(form);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', form.action);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Redirect to the cart page after successful submission
                    window.location.href = '<?php echo wc_get_cart_url(); ?>';
                } else {
                    // Handle error
                    console.error('Error:', xhr.statusText);
                }
            };
            xhr.onerror = function() {
                // Handle network errors
                console.error('Network Error');
            };
            xhr.send(new URLSearchParams(formData).toString());
        });
    });
});
</script>

<?php
get_footer();