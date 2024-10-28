<!-- WORDPRESS TEMPLATE FOR FRONT PAGE -->
<?php 

get_header();

$postId = get_the_ID();

$homepagePostID = 327;


// featured products
$featured_args = array(
    'post_type'      => 'product',
    'posts_per_page' => -1, // Retrieves all products
    'meta_query'     => array(
        array(
            'key'     => 'featured', // Adjust this to your actual meta key
            'value'   => 'yes', // Check for 'yes' within the serialized/advanced custom field data
            'compare' => 'LIKE', // Use 'LIKE' to search within serialized/advanced data
        )
    )
);

$featured_products = new WP_Query( $featured_args );

// eco products
$eco_args = array(
    'post_type'      => 'product',
    'posts_per_page' => -1, // Retrieves all products
    'meta_query'     => array(
        array(
            'key'     => 'eco_friendly', // Adjust this to your actual meta key
            'value'   => 'yes', // Check for 'yes' within the serialized/advanced custom field data
            'compare' => 'LIKE', // Use 'LIKE' to search within serialized/advanced data
        )
    )
);

$eco_products = new WP_Query( $eco_args );

?>


<main class="front-page">

    <section class="front-page__banner">
        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/home-header.svg"
            class="front-page__banner-watermark" alt="Venus Banner - Watermark" />
        <div class="front-page__banner-content container">
            <div class="front-page__banner-content-left">
                <h1>Let's talk <span class="display-one">packaging</span></h1>
                <h3>Your packaging solution starts here</h3>
                <div class="front-page__banner-content-left-search">
                    <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                        <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="searchinput"
                            placeholder="Search products">
                    </form>
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/arrow5.svg" />
                </div>
            </div>
            <div class="front-page__banner-content-right">
                <img src="http://venuspacking.previewsite.com.au/wp-content/uploads/2024/05/Venus-Packaging_homepage_Tape_OCT23_transparent.png"
                    alt="Header Image" />
            </div>
        </div>
        <section class="front-page__banner-cards container">
            <div class="front-page__banner-cards-card blue one">
                <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Rectangle-2932.png"
                    alt="Header Image" class="front-page__banner-cards-card-bg one" />
                <header class="front-page__banner-cards-card-header">
                    <h4>Packaging Products</h4>
                    <div>
                        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/home-header-icons2.svg"
                            alt="Venus Service Pages - Icon" />
                    </div>
                </header>
                <a href="/product-category/packaging-products">
                    <button class="button orange">View Catalogue</button>
                </a>
            </div>
            <div class="front-page__banner-cards-card blue two">
                <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/05/Technical-Service.jpg"
                    alt="Header Image" class="front-page__banner-cards-card-bg two" />
                <header class="front-page__banner-cards-card-header">
                    <h4>Technical Service</h4>
                    <div>
                        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/home-header-icons1.svg"
                            alt="Venus Service Pages - Icon" />
                    </div>
                </header>
                <a href="/service-spare-parts">
                    <button class="button orange">Learn More</button>
                </a>
            </div>
            <div class="front-page__banner-cards-card blue three">
                <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Totalcover-Netwrap-1.png"
                    alt="Header Image" class="front-page__banner-cards-card-bg three" />
                <header class="front-page__banner-cards-card-header">
                    <h4>Crop Packaging</h4>
                    <div>
                        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/home-header-icons3.svg"
                            alt="Venus Service Pages - Icon" />
                    </div>
                </header>
                <a href="/product-category/packaging-products/crop-packaging">
                    <button class="button orange">View Catalogue</button>
                </a>
            </div>
            <div class="front-page__banner-cards-card orange four">
                <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/VHIB-III-6-002-1.png"
                    alt="Header Image" class="front-page__banner-cards-card-bg four" />
                <header class="front-page__banner-cards-card-header">
                    <h4>Heat Sealers</h4>
                    <div>
                        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/home-header-icons4.svg"
                            alt="Venus Service Pages - Icon" />
                    </div>
                </header>
                <a href="/product-category/machinery/heat-sealers">
                    <button class="button light-blue">View Catalogue</button>
                </a>
            </div>
        </section>
    </section>

    <div class="container">
        <section class="front-page__slider ">

            <header>
                <h2>Shop our Brands</h2>
            </header>

            <div class="splide" style="width: 90%; margin: auto;"
                data-splide='{"type":"loop", "perPage":4, "arrows":true, "pagination":false, "gap": "", "padding": "1rem", "drag": "free", "snap": true }'>
                <div class="splide__track">
                    <div class="splide__list">
                        <a href="/product-category/brand/venhart" class="splide__slide">
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/venhart-logo.jpg"
                                alt="Logo for venus brands" class="splide__slide-logo" />
                        </a>
                        <a href="/product-category/brand/venet" class="splide__slide">
                            <img src="http://venuspacking.previewsite.com.au/wp-content/uploads/2016/06/venetlogo.png"
                                alt="Logo for venus brands" class="splide__slide-logo" />
                        </a>
                        <a href="/product-category/brand/venus" class="splide__slide">
                            <img src="http://venuspacking.previewsite.com.au/wp-content/uploads/2016/06/venuslogo.png"
                                alt="Logo for venus brands" class="splide__slide-logo" />
                        </a>
                        <a href="/product-category/brand/venus-power" class="splide__slide">
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/venuspower-logo.jpg"
                                alt="Logo for venus brands" class="splide__slide-logo" />
                        </a>
                        <a href="/product-category/brand/total-cover" class="splide__slide">
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/totalcover-log-gold-1.png"
                                alt="Logo for venus brands" class="splide__slide-logo" />
                        </a>
                        <a href="/product-category/brand/power-stretch" class="splide__slide">
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/powerstretch-logo.jpg"
                                alt="Logo for venus brands" class="splide__slide-logo" />
                        </a>
                        <a class="splide__slide">
                            <img src="http://venuspacking.previewsite.com.au/wp-content/uploads/2016/06/vencutterslogo.png"
                                alt="Logo for venus brands" class="splide__slide-logo" />
                        </a>
                        <a class="splide__slide">
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/05/logo-RIPACK-300dpi.jpg"
                                alt="Logo for venus brands" class="splide__slide-logo" />
                        </a>
                        <a class="splide__slide">
                            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/05/audion-logo-1.png"
                                alt="Logo for venus brands" class="splide__slide-logo" />
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="container">
        <section class="front-page__industry">

            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/home-background-industry.svg"
                alt="Venus Packing - Watermark" class="front-page__industry-watermark" />

            <header>
                <h2>Shop by Industry</h2>
            </header>

            <div class="front-page__industry-cards">
                <a class="front-page__industry-cards-card  one" href="/product-category/industry/food-packaging">
                    <div></div>
                    <h3>Food Packaging Supplies</h3>
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Rectangle-1.png"
                        alt="Industry Image" />
                </a>
                <a class="front-page__industry-cards-card two" href="/product-category/industry/industrial-packaging">
                    <div></div>
                    <h3>Warehouse & Distribution Supplies</h3>
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Rectangle-1-1.png"
                        alt="Industry Image" />
                </a>
                <a class="front-page__industry-cards-card three" href="/product-category/industry/medical-packaging">
                    <div></div>
                    <h3>Medical Packaging Supplies</h3>
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Rectangle-1-2.png"
                        alt="Industry Image" />
                </a>
                <a class="front-page__industry-cards-card four" href="/product-category/industry/retail-packaging">
                    <div></div>
                    <h3>Online and in-store Retail Packaging Supplies</h3>
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Rectangle-1-4.png"
                        alt="Industry Image" />
                </a>
                <a class="front-page__industry-cards-card five"
                    href="/product-category/industry/warehouse-distribution">
                    <div></div>
                    <h3>Industrial Packaging Supplies</h3>
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Rectangle-1-3.png"
                        alt="Industry Image" />
                </a>

            </div>
        </section>
    </div>

    <div class="container">
        <section class="front-page__choose">

            <header>
                <h2>Why choose us?</h2>
            </header>

            <div class="front-page__choose-cards">
                <div class="front-page__choose-cards-card one">
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/why-choose-us-icon4.svg"
                        alt="Venus Services - Icon" />
                    <h4>Talk to an Expert</h4>
                    <p>65 years + of experience in the Australian Packaging Market. We know packaging and we are only a
                        phone call away for assistance and support.</p>
                </div>
                <div class="front-page__choose-cards-card one">
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/why-choose-us-icon2.svg"
                        alt="Venus Services - Icon" />
                    <h4>Five Star Service, Every Time</h4>
                    <p>Our in-house service team ensures your machine operates smoothly from setup to spare parts,
                        providing friendly and efficient assistance at every step.</p>
                </div>
                <div class="front-page__choose-cards-card one">
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/why-choose-us-icon1.svg"
                        alt="Venus Services - Icon" />
                    <h4>Embrace Sustainability</h4>
                    <p>Join us in building a greener future with our expanding line of recycled and recyclable products,
                        designed for a more sustainable world.</p>
                </div>
                <div class="front-page__choose-cards-card one">
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/why-choose-us-icon3.svg"
                        alt="Venus Services - Icon" />
                    <h4>Proudly Australian Owned</h4>
                    <p>Since 1959, we've been proudly Australian owned and operated, committed to delivering quality
                        products and reliable service to our customers nationwide.</p>
                </div>
            </div>

            <footer>
                <a href="/about">
                    <button class="button orange">Learn More</button>
                </a>
            </footer>

        </section>
    </div>

    <section class="front-page__eco">
        <img src="http://venuspacking.previewsite.com.au/wp-content/uploads/2024/05/Eco-range-background.svg"
            class="front-page__eco-watermark" />
        <div class="container">
            <header class="front-page__eco-header">

                <h2>View our</h2>
                <span class="display-one">Eco
                    Range</span>
            </header>

            <div class="front-page__eco-main">

                <div class="front-page__eco-main-left">
                    <div class="front-page__eco-main-left-content">
                        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/05/ECO-Range-Logo.svg"
                            alt="Eco Range - Logo" />
                        <p>From tapes to twine, we are committed to providing sustainable solutions that reduce
                            environmental impact without compromising on quality or performance. Join us in our mission
                            to help create a greener future.</p>
                        <a href=""><button class="button">View All</button></a>
                    </div>
                </div>
                <div class="front-page__eco-main-right">
                    <div class="splide" style="width: 100%; margin: auto;"
                        data-splide='{"type":"loop", "perPage": 3, "arrows":true, "pagination":false, "gap": "20px", "padding": "", "drag": "free", "snap": true }'>
                        <div class="splide__track">
                            <div class="splide__list">

                                <?php 
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

                            echo '<div class="splide__slide">';
                            get_template_part('template-parts/product-card', null, array('image' => $product_image_url, 'title' => $product_title, 'description' => $product_description, 'link' => $product_link, 'featured' => $featured, 'logo' => $logo, 'sale' => $on_sale, 'stock' => $stock_quantity, 'product' => $product)); 
                            echo '</div>';
                            
                            endwhile;
                            ?>

                                <?php
                    // If no products found
                    else:
                ?>
                                <h2 class="display-two"><?php _e('No products found', 'textdomain'); ?></h2>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>



    <div class="container">
        <section class="front-page__featured">

            <header>
                <h2>Featured Products</h2>
            </header>

            <div class="splide" style="width: 100%; margin: auto; height: 620px;"
                data-splide='{"type":"loop", "perPage": 4, "arrows":true, "pagination":false, "gap": "20px", "padding": "", "drag": "free", "snap": true }'>
                <div class="splide__track">
                    <div class="splide__list">

                        <?php 
                    if ($featured_products->have_posts()) :
                    ?>
                        <?php
                        // Start the loop.
                            while ($featured_products->have_posts()) : $featured_products->the_post();

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

                            echo '<div class="splide__slide">';
                            get_template_part('template-parts/product-card', null, array('image' => $product_image_url, 'title' => $product_title, 'description' => $product_description, 'link' => $product_link, 'featured' => $featured, 'logo' => $logo, 'sale' => $on_sale, 'stock' => $stock_quantity, 'product' => $product)); 
                            echo '</div>';
                            
                            endwhile;
                            ?>

                        <?php
                    // If no products found
                    else:
                ?>
                        <h2 class="display-two"><?php _e('No products found', 'textdomain'); ?></h2>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
    </div>

    </section>
    </div>

    <div class="container">
        <section class="front-page__win">
            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Promo-Banner-masked.svg"
                alt="Venus - Watermark" class="front-page__win-watermark" />
            <div class="front-page__win-left">
                <span class="display-two">
                    Win a Village Gold Class Voucher
                </span>
                <span class="intro-text">New shipment has just arrived of our popular Venus Food Wrap Dispenser. If you
                    purchase
                    one or more of these
                    by June 30th 2024 you will go into the draw to win a Village Gold Class Experience Voucher valued at
                    $175. Be quick!</span>
                <footer>
                    <a href="http://venuspacking.previewsite.com.au/product/food-wrap-dispenser-vh451-2/">
                        <button class="button">Shop Now</button>
                    </a>
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/arrow4.svg"
                        alt="Arrow Icon" />
                </footer>
            </div>
            <div class="front-page__win-right">
                <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/05/VH451.png"
                    alt="Photo of venus food wrap" />
            </div>
        </section>
    </div>

    <div class="container">
        <section class="front-page__service">
            <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Spare-parts.svg"
                alt="Venus - Watermark" class="front-page__service-watermark" />
            <div class="front-page__service-left">
                <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/spare-parts.png"
                    alt="Photo of venus food wrap" />
            </div>
            <div class="front-page__service-right">
                <span class="display-two">
                    Servicing & Spare Parts
                </span>
                <span class="intro-text">Our friendly in-house service team is here to ensure your machine is up and
                    running smoothly. From set up to servicing and spare parts, our experienced service team has you
                    covered!</span>
                <footer>
                    <a href="/service-spare-parts"><button class="button light-blue">Learn more</button></a>
                    <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/arrow3.svg"
                        alt="Arrow Icon" />
                </footer>

            </div>
        </section>
    </div>

</main>

<?php get_footer(); ?>