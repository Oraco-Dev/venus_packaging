<?php


// theme setup
function theme_setup()
{
  // enable featured images
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');

// register menus
function theme_register_menus()
{
  register_nav_menus(
    array(
      'hamburger-menu' => 'Hamburger Menu',
      // Replace 'primary-menu' with your menu location slug and 'Primary Menu' with the menu name.
    )
  );
}

add_action('after_setup_theme', 'theme_register_menus');
add_action( 'after_setup_theme', function() {
  add_theme_support( 'woocommerce' );
} );

// register webpack compiled js and css with theme
function enqueue_webpack_scripts()
{

  $cssFilePath = glob(get_template_directory() . '/css/build/main.min.*.css');
  $cssFileURI = get_template_directory_uri() . '/css/build/' . basename($cssFilePath[0]);
  wp_enqueue_style('main_css', $cssFileURI);

  $jsFilePath = glob(get_template_directory() . '/js/build/main.min.*.js');
  $jsFileURI = get_template_directory_uri() . '/js/build/' . basename($jsFilePath[0]);
  wp_enqueue_script('main_js', $jsFileURI, null, null, true);

   // Localize the script with new data
   wp_localize_script('main_js', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_webpack_scripts');

function my_theme_enqueue_scripts() {
  // Enqueue your script
  wp_enqueue_script('filter-archive-products-script', get_template_directory_uri() . '/js/src/new/filterArchiveProducts.js', array('jquery'), null, true);
  wp_enqueue_script('filter-blogs-script', get_template_directory_uri() . '/js/src/new/filterArchiveProducts.js', array('jquery'), null, true);

  // Localize the script with new data
  wp_localize_script('filter-archive-products-script', 'ajax_object', array('ajaxurl' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_scripts');


// allow svgs
function enable_svg_upload($mime_types)
{
  $mime_types['svg'] = 'image/svg+xml';
  return $mime_types;
}
add_filter('upload_mimes', 'enable_svg_upload');

// allow svgs
function display_svg_in_admin($response, $attachment, $meta)
{
  if ($response['mime'] === 'image/svg+xml') {
    $response['sizes']['thumbnail'] = [
      'url' => $response['url'],
      'width' => $response['width'],
      'height' => $response['height'],
    ];
  }
  return $response;
}
add_filter('wp_prepare_attachment_for_js', 'display_svg_in_admin', 10, 3);

add_action('wp_ajax_filter_products', 'filter_products');
add_action('wp_ajax_nopriv_filter_products', 'filter_products');
add_action('wp_ajax_filter_eco_products', 'filter_eco_products');
add_action('wp_ajax_nopriv_filter_eco_products', 'filter_eco_products');

function filter_eco_products() {
    // Get the selected categories from the POST data
    $selectedCategories = isset($_POST['categories']) ? json_decode(stripslashes($_POST['categories'])) : array();

    // Get the current category from the POST data
    $currentCategory = isset($_POST['current_category']) ? $_POST['current_category'] : '';

    // Construct the tax query
    $tax_query = array();

    // Include current category in tax query
    if ($currentCategory) {
        $tax_query[] = array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $currentCategory,
        );
    }

    // Additional tax query for selected categories
    if (!empty($selectedCategories)) {
        foreach ($selectedCategories as $cat) {
            $tax_query[] = array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $cat,
                'operator' => 'IN',
            );
        }
    }

    // Query arguments
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => $tax_query,
        'meta_query'     => array(
            array(
                'key'     => 'eco_friendly', // Adjust this to your actual meta key
                'value'   => 'yes', // Check for 'yes' within the serialized/advanced custom field data
                'compare' => 'LIKE', // Use 'LIKE' to search within serialized/advanced data
            )
            ),
    );

    // Run the query
    $query = new WP_Query($args);

    // Output the filtered products
    if ($query->have_posts()) :
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
               
        // Output your product information here (e.g., title, image, etc.)
        // For example:
  

        get_template_part('template-parts/product-card', null, array('image' => $product_image_url, 'title' => $product_title, 'description' => $product_description, 'link' => $product_link, 'featured' => $featured, 'logo' => $logo, 'sale' => $on_sale, 'stock' => $stock_quantity, 'product' => $product)); 
        endwhile;
    else :
        echo '<h2 class="display-two">No products found</h2>';
    endif;

    wp_die(); // Terminate script properly
}

function filter_products() {
    // Get the selected categories from the POST data
    $selectedCategories = isset($_POST['categories']) ? json_decode(stripslashes($_POST['categories'])) : array();

    // Get the current category from the POST data
    $currentCategory = isset($_POST['current_category']) ? $_POST['current_category'] : '';

    // Construct the tax query
    $tax_query = array();

    // Include current category in tax query
    if ($currentCategory) {
        $tax_query[] = array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => $currentCategory,
        );
    }

    // Additional tax query for selected categories
    if (!empty($selectedCategories)) {
        foreach ($selectedCategories as $cat) {
            $tax_query[] = array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'terms' => $cat,
                'operator' => 'IN',
            );
        }
    }

    // Query arguments
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
        'tax_query' => $tax_query,
    );

    // Run the query
    $query = new WP_Query($args);

    // Output the filtered products
    if ($query->have_posts()) :
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
               
        // Output your product information here (e.g., title, image, etc.)
        // For example:
  

        get_template_part('template-parts/product-card', null, array('image' => $product_image_url, 'title' => $product_title, 'description' => $product_description, 'link' => $product_link, 'featured' => $featured, 'logo' => $logo, 'sale' => $on_sale, 'stock' => $stock_quantity, 'product' => $product)); 
        endwhile;
    else :
        echo '<h2 class="display-two">No products found</h2>';
    endif;

    wp_die(); // Terminate script properly
}

add_filter( 'woocommerce_locate_template', 'custom_override_cart_template', 10, 3 );

function custom_override_cart_template( $template, $template_name, $template_path ) {
    if ( is_cart() ) {
        $template = get_stylesheet_directory() . '/cart.php';
    }
    return $template;
}

function custom_modify_breadcrumbs($crumbs, $breadcrumb) {
    global $post;
    global $product;

   
    if (is_singular('product')) {
    // Check if breadcrumbs are not empty
    if (!empty($crumbs)) {
        // Check if the primary category of the product is "machinery" or "packaging-products"
        $categories = wp_get_post_terms($post->ID, 'product_cat');
        foreach ($categories as $category) {
            if ($category->slug === 'machinery' || $category->slug === 'packaging-products') {
                // Add breadcrumb for "Home"
                $home_crumb = array(
                    esc_html__('Home', 'textdomain'),
                    home_url('/')
                );
                $crumbs = array($home_crumb);

                // Add breadcrumb for primary category
                $category_crumb = array(
                    esc_html($category->name),
                    get_term_link($category)
                );
                $crumbs[] = $category_crumb;

                // Collect assigned categories recursively
                $child_crumbs = collect_assigned_categories($category->term_id, $post->ID);
                foreach ($child_crumbs as $child_crumb) {
                    // Ensure each breadcrumb item is a link
                    $crumbs[] = array(
                        esc_html($child_crumb[0]),
                        esc_url($child_crumb[1])
                    );
                }

                                // If there are no child categories left, set the last breadcrumb as the product name
               
                    // Get the product name
                    $product_name = get_the_title($post->ID);
                    // Add breadcrumb for the product name
                    $product_crumb = array(
                        esc_html($product_name),
                        get_permalink($post->ID)
                    );
                    $crumbs[] = $product_crumb;

                break;
            }
        }
    }
}

    return $crumbs;
}


// Recursive function to collect assigned categories
function collect_assigned_categories($parent_id, $product_id) {
  $child_crumbs = array();

  $child_categories = get_terms(array(
      'taxonomy' => 'product_cat',
      'parent' => $parent_id,
      'hide_empty' => false,
  ));

  foreach ($child_categories as $child_category) {
      // Check if the category is assigned to the product or any of its descendants
      if (has_term($child_category->term_id, 'product_cat', $product_id)) {
          $child_crumb = array(
              esc_html($child_category->name),
              get_term_link($child_category)
          );
          $child_crumbs[] = $child_crumb;

          // Recursively collect assigned child categories
          $grandchild_crumbs = collect_assigned_categories($child_category->term_id, $product_id);
          $child_crumbs = array_merge($child_crumbs, $grandchild_crumbs);
      }
  }

  return $child_crumbs;
}

// Add the filter to modify the breadcrumbs
add_filter('woocommerce_get_breadcrumb', 'custom_modify_breadcrumbs', 10, 2);


// Change text on WooCommerce checkout page
add_filter('woocommerce_checkout_terms_and_conditions_text', 'change_checkout_terms_text');