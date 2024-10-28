<?php
get_header();

// FUNCTIONS
function get_sorted_term_names($term_ids) {
    $term_names = array();
    foreach ($term_ids as $term_id) {
        $term = get_term_by('id', $term_id, 'product_cat');
        if ($term) {
            $term_names[$term->name] = $term_id;
        }
    }
    ksort($term_names);
    return $term_names;
}

function get_direct_child_terms($parent_term_id, $taxonomy) {
    $child_terms = get_terms(array(
        'taxonomy' => $taxonomy,
        'parent' => $parent_term_id, // specify the parent term ID
        'hide_empty' => false, // Set to true if you want to hide empty terms
    ));

    return $child_terms;
}

// MEGA MENU CODE
$polybags_slug = 'poly-bags-netting';
$tapes_slug = 'tapes-ties-glues';
$strapping_slug = 'strapping-stapling';
$wrapping_slug = 'wrapping';
$packaging_slug = 'packing-labelling';
$heat_slug = 'heat-sealers';
$baler_slug = 'baler-twines';
$netwrap_slug = 'fodder-totalcover-netwrap';
$silage_pit_slug = 'silage-pit-covers';
$silage_slug = 'silage-stretch-film';
$strapping_machine_slug ='strapping-machines';
$pallet_machine_slug ='pallet-wrapping-machines';
$carton_machine_slug ='carton-sealers';
$shrink_machine_slug ='venusuni-shrink-wrapping-machines';

$polybags_id = get_term_by('slug', $polybags_slug, 'product_cat')->term_id;
$tapes_id = get_term_by('slug', $tapes_slug, 'product_cat')->term_id;
$strapping_id = get_term_by('slug', $strapping_slug, 'product_cat')->term_id;
$wrapping_id = get_term_by('slug', $wrapping_slug, 'product_cat')->term_id;
$packaging_id = get_term_by('slug', $packaging_slug, 'product_cat')->term_id;
$heat_id = get_term_by('slug', $heat_slug, 'product_cat')->term_id;
// 
$baler_id = get_term_by('slug', $baler_slug, 'product_cat')->term_id;
$netwrap_id = get_term_by('slug', $netwrap_slug, 'product_cat')->term_id;
$silage_pit_id = get_term_by('slug', $silage_pit_slug, 'product_cat')->term_id;
$silage_id = get_term_by('slug', $silage_slug, 'product_cat')->term_id;
// 
$strapping_machine_id = get_term_by('slug', $strapping_machine_slug, 'product_cat')->term_id;
$pallet_machine_id = get_term_by('slug', $pallet_machine_slug, 'product_cat')->term_id;
$carton_machine_id = get_term_by('slug', $carton_machine_slug, 'product_cat')->term_id;
$shrink_machine_id = get_term_by('slug', $shrink_machine_slug, 'product_cat')->term_id;


$polybags_child_categories = get_term_children($polybags_id, 'product_cat');
$tapes_child_categories = get_term_children($tapes_id, 'product_cat');
$strapping_child_categories = get_term_children($strapping_id, 'product_cat');
$wrapping_child_categories = get_term_children($wrapping_id, 'product_cat');
$packaging_child_categories = get_term_children($packaging_id, 'product_cat');
$heat_child_categories = get_term_children($heat_id, 'product_cat');
// 
$baler_child_categories = get_term_children($baler_id, 'product_cat');
$netwrap_child_categories = get_term_children($netwrap_id, 'product_cat');
$silage_pit_child_categories = get_term_children($silage_pit_id, 'product_cat');
$silage_child_categories = get_term_children($silage_id, 'product_cat');
// 
$strapping_machine_child_categories = get_term_children($strapping_machine_id, 'product_cat');
$pallet_machine_child_categories = get_term_children($pallet_machine_id, 'product_cat');
$carton_machine_child_categories = get_term_children($carton_machine_id, 'product_cat');
$shrink_machine_child_categories = get_term_children($shrink_machine_id, 'product_cat');

$polybags_child_categories = get_direct_child_terms($polybags_id, 'product_cat');
$tapes_child_categories = get_direct_child_terms($tapes_id, 'product_cat');
$strapping_child_categories = get_direct_child_terms($strapping_id, 'product_cat');
$wrapping_child_categories = get_direct_child_terms($wrapping_id, 'product_cat');
$packaging_child_categories = get_direct_child_terms($packaging_id, 'product_cat');
$heat_child_categories = get_direct_child_terms($heat_id, 'product_cat');
// 
$baler_child_categories = get_direct_child_terms($baler_id, 'product_cat');
$netwrap_child_categories = get_direct_child_terms($netwrap_id, 'product_cat');
$silage_pit_child_categories = get_direct_child_terms($silage_pit_id, 'product_cat');
$silage_child_categories = get_direct_child_terms($silage_id, 'product_cat');

usort($polybags_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
usort($tapes_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
usort($strapping_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
usort($wrapping_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
usort($packaging_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
usort($heat_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
// 
usort($baler_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
usort($netwrap_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
usort($silage_pit_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
usort($silage_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
// 
usort($strapping_machine_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
usort($carton_machine_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
usort($pallet_machine_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});
usort($shrink_machine_child_categories, function($a, $b) {
    return strcmp($a->name, $b->name);
});


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="geo.placename" content="555 Church St, Richmond VIC 3121, Australia" />
    <meta name="geo.position" content="-37.8301330;144.9979700" />
    <meta name="geo.region" content="AU-Victoria" />
    <meta name="ICBM" content="-37.8301330, 144.9979700" />
    <meta name="msvalidate.01" content="E9C204C51B50F42C56D3A7E17DD6F9D3" />
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right');?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">

    <!-- jQuery (necessary for Fancybox) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Fancybox JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>


    <!-- Google Tag Manager -->
    <script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NXJFPQ');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google Tag Manager -->
    <script async="" src="//www.gstatic.com/call-tracking/call-tracking_9.js" nonce=""></script>
    <script type="text/javascript" async="" src="https://www.gstatic.com/wcm/loader.js"></script>
    <script type="text/javascript" async=""
        src="https://www.googletagmanager.com/gtag/destination?id=AW-947425719&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" async=""
        src="https://www.googletagmanager.com/gtag/destination?id=AW-947425719&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script type="text/javascript" async=""
        src="https://www.googletagmanager.com/gtag/js?id=G-YEF60QST7J&amp;l=dataLayer&amp;cx=c"></script>
    <script type="text/javascript" async=""
        src="https://www.gstatic.com/recaptcha/releases/8k85QBI-qzxmenDv318AZH30/recaptcha__en.js"
        crossorigin="anonymous" integrity="sha384-YaLdSXMqm9CEKTpOkSnpu5vAhzVfmtaskI7GboiAj0dVtvfpzmGU1XBINZ7hs6ET">
    </script>

    <script>
    $(document).ready(function() {
        $("[data-fancybox='gallery']").fancybox({
            loop: true
        });
    });
    </script>

    <?php wp_head(); ?>
</head>

<body>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXJFPQ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->


    <div class="menu">
        <div class="container">
            <div class="menu__inner">
                <div class="menu__inner-badges">
                    <a href="/product-category/packaging-products/" class="menu__inner-badges-badge blue">
                        <h5>Packaging Products</h5>
                    </a>
                    <a href="/product-category/machinery/" class="menu__inner-badges-badge orange">
                        <h5>Heat Sealer Shop</h5>
                    </a>
                    <a href="/product-category/crop-packaging/" class="menu__inner-badges-badge blue">
                        <h5>Crop/Agriculture</h5>
                    </a>
                    <a href="/eco-products/" class="menu__inner-badges-badge blue">
                        <h5>Venhart Eco Products</h5>
                    </a>
                    <a href="/service-spare-parts/" class="menu__inner-badges-badge blue">
                        <h5>Service & Spare Parts</h5>
                    </a>
                </div>
                <a href="/">Home</a>
                <a href="/about/">About</a>
                <a href="/blogs/">News & Tips</a>
                <a href="/contact/">Contact</a>
                <form role="search" method="get" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
                    <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="searchinput"
                        placeholder="Search products" autocomplete="off">
                    <button type="submit" id="searchsubmit">
                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/Search.svg" alt="Search Icon" />
                    </button>
                </form>
            </div>
        </div>
    </div>


    <a href="/contact/" class="fixed__contact">
        <img src="https://oraco.com.au/wp-content/uploads/2024/05/Artboard-2.svg" />
    </a>
    <a href="/product-category/machinery/heat-sealers/" class="fixed__shop">
        <img src="https://oraco.com.au/wp-content/uploads/2024/05/Artboard-3.svg" />
    </a>


    <?php echo do_shortcode('[brb_collection id=10956]'); ?>

    <header class="header">

        <div class="header__container">
            <div class="header__container-top container">
                <div class="header__container-top-menu desktop-only-flex">
                    <a href="/">Home</a>
                    <a href="/abou/">About</a>
                    <a href="/blogs/">News & Tips</a>
                    <a href="/contact/">Contact</a>
                </div>
                <button class="button orange">(03) 9428 1652</button>
            </div>
            <div class="header__container-bottom">
                <div class="container">
                    <a href="/" class="header-logo-container">
                        <img src="https://venuspack.com.au/wp-content/uploads/2024/04/Isolation_Mode-1.svg"
                            alt="Venus Packaging Logo" class="header__container-bottom-img" />
                    </a>
                    <div class="header__container-bottom-right">
                        <ul class="header__links">
                            <label for="close-btn" class="header__btn close-btn"><i class="fas fa-times"></i></label>
                            <li class="header__links-mega">
                                <a href="/product-category/packaging-products/"
                                    class="link desktop-item header__links-mega-accordion">
                                    <input type="checkbox" id="showMega">
                                    <div>
                                        <label for="showMega" class="mobile-item">Packaging &
                                            Products</label>
                                        <img src="https://criticalinfo.com.au/wp-content/uploads/2024/02/shape.svg" />
                                    </div>
                                    <span class="mask">
                                        <div class="link-container">
                                            <span class="link-title1 title">Packaging & Products</span>
                                            <span class="link-title2 title">Packaging & Products</span>
                                        </div>
                                    </span>
                                </a>
                                <div class="header__box">
                                    <div class="container">
                                        <div class="header__box-content">
                                            <!-- COLUMN ONE -->
                                            <div class="header__box-content-column one">
                                                <header>
                                                    <span id="packing-menu-title-col-1">Packaging & Machinery</span>
                                                </header>
                                                <div class="header__box-content-column-main">
                                                    <a href="/product-category/packaging-products/"
                                                        class="header__box-content-column-main-card"
                                                        id="packaging-products-parent-c1">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Packaging.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Packaging Products</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                    <a href="/product-category/machinery/"
                                                        class="header__box-content-column-main-card"
                                                        id="machinery-products-parent-c1">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Machinery.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Machinery</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- COLUMN TWO -->
                                            <div class="header__box-content-column two">
                                                <header>
                                                    <span id="packing-menu-title-col-2">Packaging Products</span>
                                                </header>
                                                <div class="header__box-content-column-main"
                                                    id="packaging-products-parent-c2">
                                                    <a href="/product-category/packaging-products/poly-bags-netting/"
                                                        class="header__box-content-column-main-card"
                                                        id="polybags-product-parent">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Packaging-Poly-Bags-Netting.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Polybags + Netting</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                    <a href="/product-category/packaging-products/tapes-ties-glues/"
                                                        class="header__box-content-column-main-card"
                                                        id="tapes-product-parent">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Packaging-Tapes.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Tapes, Ties + Glues</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                    <a href="/product-category/packaging-products/strapping-stapling/"
                                                        class="header__box-content-column-main-card"
                                                        id="strapping-product-parent">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Packaging-Strap.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Strapping + Stapling</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                    <a href="/product-category/packaging-products/wrapping/"
                                                        class="header__box-content-column-main-card"
                                                        id="wrapping-product-parent">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Packaging-Wrap.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Wrapping</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                    <a href="/product-category/packaging-products/packing-labelling/"
                                                        class="header__box-content-column-main-card"
                                                        id="packaging-product-parent">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Packaging-Labelling.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Packing + Labelling</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="header__box-content-column-main"
                                                    id="machinery-products-parent-c2">
                                                    <a href="/product-category/machinery/heat-sealers/"
                                                        class="header__box-content-column-main-card"
                                                        id="machinery-product-parent">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Machinery.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Heat Sealers</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                    <a href="/product-category/packaging-products/strapping/strapping-stapling/strapping-machines/"
                                                        class="header__box-content-column-main-card"
                                                        id="strapping-machine-product-parent">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Packaging-Strap.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Strapping Machines</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                    <a href="/product-category/packaging-products/wrapping/pallet-wrapping-machines/"
                                                        class="header__box-content-column-main-card"
                                                        id="pallet-machine-product-parent">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Pallet.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Pallet Wrappers</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                    <a href="/product-category/packaging-products/tapes-ties-glues/carton-sealers/"
                                                        class="header__box-content-column-main-card"
                                                        id="carton-machine-product-parent">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Carton.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Carton Sealers</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                    <a href="/product-category/packaging-products/wrapping/venusuni-shrink-wrapping-machines/"
                                                        class="header__box-content-column-main-card"
                                                        id="shrink-machine-product-parent">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icons_CROP_Stretch.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Shrink Wrappers</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                </div>

                                            </div>
                                            <!-- COLUMN THREE -->
                                            <div class="header__box-content-column three">
                                                <header>
                                                    <span id="packing-menu-title-col-3">Product Category</span>
                                                </header>
                                                <div id="polybags-products-list">
                                                    <?php
                                                    foreach ($polybags_child_categories as $polybags_child_category) {
                                                        // Ensure $polybags_child_category is a WP_Term object
                                                        if ($polybags_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $polybags_child_category_id = $polybags_child_category->term_id;
                                                            $polybags_child_category_name = $polybags_child_category->name;
                                                            $polybags_child_category_slug = $polybags_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $polybags_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/packaging-products/poly-bags-netting/' . $polybags_child_category_slug . '/">' . $polybags_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                ?>
                                                </div>
                                                <div id="tapes-products-list">
                                                    <?php
                                                    foreach ($tapes_child_categories as $tapes_child_category) {
                                                        // Ensure $tapes_child_category is a WP_Term object
                                                        if ($tapes_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $tapes_child_category_id = $tapes_child_category->term_id;
                                                            $tapes_child_category_name = $tapes_child_category->name;
                                                            $tapes_child_category_slug = $tapes_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $tapes_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/packaging-products/tapes-ties-glues/' . $tapes_child_category_slug . '/">' . $tapes_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';

                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                ?>
                                                </div>
                                                <div id="strapping-products-list">
                                                    <?php
                                                    foreach ($strapping_child_categories as $strapping_child_category) {
                                                        // Ensure $strapping_child_category is a WP_Term object
                                                        if ($strapping_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $strapping_child_category_id = $strapping_child_category->term_id;
                                                            $strapping_child_category_name = $strapping_child_category->name;
                                                            $strapping_child_category_slug = $strapping_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $strapping_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                            echo '<a href="/product-category/packaging-products/strapping-stapling/' . $strapping_child_category_slug . '/">' . $strapping_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                ?>
                                                </div>
                                                <div id="wrapping-products-list">
                                                    <?php
                                                    foreach ($wrapping_child_categories as $wrapping_child_category) {
                                                        // Ensure $wrapping_child_category is a WP_Term object
                                                        if ($wrapping_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $wrapping_child_category_id = $wrapping_child_category->term_id;
                                                            $wrapping_child_category_name = $wrapping_child_category->name;
                                                            $wrapping_child_category_slug = $wrapping_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $wrapping_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/packaging-products/wrapping/' . $wrapping_child_category_slug . '/">' . $wrapping_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                ?>
                                                </div>
                                                <div id="packaging-products-list">
                                                    <?php
                                                    foreach ($packaging_child_categories as $packaging_child_category) {
                                                        // Ensure $packaging_child_category is a WP_Term object
                                                        if ($packaging_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $packaging_child_category_id = $packaging_child_category->term_id;
                                                            $packaging_child_category_name = $packaging_child_category->name;
                                                            $packaging_child_category_slug = $packaging_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $packaging_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/packaging-products/packaging-labelling/' . $packaging_child_category_slug . '/">' . $packaging_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                ?>
                                                </div>
                                                <div id="heat-products-list">
                                                    <?php
                                                    foreach ($heat_child_categories as $heat_child_category) {
                                                        // Ensure $heat_child_category is a WP_Term object
                                                        if ($heat_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $heat_child_category_id = $heat_child_category->term_id;
                                                            $heat_child_category_name = $heat_child_category->name;
                                                            $heat_child_category_slug = $heat_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $heat_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/machinery/heat-sealers/' . $heat_child_category_slug . '/">' . $heat_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                ?>
                                                </div>
                                                <div id="strapping-machine-products-list">
                                                    <?php
                                                    if (count($strapping_machine_child_categories) == 0) {
                                                    ?>
                                                    <a
                                                        href="/product-category/packaging-products/strapping/strapping-stapling/strapping-machines/">View
                                                        All</a>
                                                    <?php
                                                    } else {
                                                    foreach ($strapping_machine_child_categories as $strapping_machine_child_category) {
                                                        // Ensure $strapping_machine_child_category is a WP_Term object
                                                        if ($strapping_machine_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $strapping_machine_child_category_id = $strapping_machine_child_category->term_id;
                                                            $strapping_machine_child_category_name = $strapping_machine_child_category->name;
                                                            $strapping_machine_child_category_slug = $strapping_machine_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $strapping_machine_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/packaging-products/strapping/strapping-stapling/strapping-machines/' . $strapping_machine_child_category_slug . '/">' . $strapping_machine_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                }
                                                ?>
                                                </div>
                                                <div id="pallet-machine-products-list">
                                                    <?php
                                                    if (count($pallet_machine_child_categories) == 0) {
                                                    ?>
                                                    <a
                                                        href="/product-category/packaging-products/wrapping/pallet-wrapping-machines/">View
                                                        All</a>
                                                    <?php
                                                    } else {
                                                    foreach ($pallet_machine_child_categories as $pallet_machine_child_category) {
                                                        // Ensure $pallet_machine_child_category is a WP_Term object
                                                        if ($pallet_machine_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $pallet_machine_child_category_id = $pallet_machine_child_category->term_id;
                                                            $pallet_machine_child_category_name = $pallet_machine_child_category->name;
                                                            $pallet_machine_child_category_slug = $pallet_machine_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $pallet_machine_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/packaging-products/wrapping/pallet-wrapping-machines/' . $pallet_machine_child_category_slug . '/">' . $pallet_machine_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                }
                                                ?>
                                                </div>
                                                <div id="carton-machine-products-list">
                                                    <?php
                                                    if (count($carton_machine_child_categories) == 0) {
                                                    ?>
                                                    <a
                                                        href="/product-category/packaging-products/tapes-ties-glues/carton-sealers/">View
                                                        All</a>
                                                    <?php
                                                    } else {
                                                    foreach ($carton_machine_child_categories as $carton_machine_child_category) {
                                                        // Ensure $carton_machine_child_category is a WP_Term object
                                                        if ($carton_machine_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $carton_machine_child_category_id = $carton_machine_child_category->term_id;
                                                            $carton_machine_child_category_name = $carton_machine_child_category->name;
                                                            $carton_machine_child_category_slug = $carton_machine_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $carton_machine_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/packaging-products/tapes-ties-glues/carton-sealers/' . $carton_machine_child_category_slug . '/">' . $carton_machine_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                }
                                                ?>
                                                </div>
                                                <div id="shrink-machine-products-list">
                                                    <?php
                                                    if (count($netwrap_child_categories) == 0) {
                                                    ?>
                                                    <a
                                                        href="/product-category/packaging-products/wrapping/venusuni-shrink-wrapping-machines/">View
                                                        All</a>
                                                    <?php
                                                    } else {
                                                    foreach ($shrink_machine_child_categories as $shrink_machine_child_category) {
                                                        // Ensure $shrink_machine_child_category is a WP_Term object
                                                        if ($shrink_machine_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $shrink_machine_child_category_id = $shrink_machine_child_category->term_id;
                                                            $shrink_machine_child_category_name = $shrink_machine_child_category->name;
                                                            $shrink_machine_child_category_slug = $shrink_machine_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $shrink_machine_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/packaging-products/wrapping/venusuni-shrink-wrapping-machines/' . $shrink_machine_child_category_slug . '/">' . $shrink_machine_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                }
                                                ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="header__links-mega">
                                <a href="/product-category/crop-packaging/"
                                    class="link desktop-item header__links-mega-accordion">
                                    <input type="checkbox" id="showMega">
                                    <div>
                                        <label for="showMega" class="mobile-item">Crop Packaging</label>
                                        <img src="https://criticalinfo.com.au/wp-content/uploads/2024/02/shape.svg" />
                                    </div>
                                    <span class="mask">
                                        <div class="link-container">
                                            <span class="link-title1 title">Crop Packaging</span>
                                            <span class="link-title2 title">Crop Packaging</span>
                                        </div>
                                    </span>
                                </a>
                                <div class="header__box">
                                    <div class="container">
                                        <div class="header__box-content">
                                            <!-- COLUMN ONE -->
                                            <div class="header__box-content-column one">
                                                <header>
                                                    <span id="packing-menu-title-col-1">Crop Packaging</span>
                                                </header>
                                                <div class="header__box-content-column-main">
                                                    <a href="/product-category/crop-packaging/"
                                                        class="header__box-content-column-main-card">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Packaging.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Crop Packaging</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- COLUMN TWO -->
                                            <div class="header__box-content-column two">
                                                <header>
                                                    <span id="packing-menu-title-col-2">Crop Packaging</span>
                                                </header>
                                                <div class="header__box-content-column-main">
                                                    <a href="/product-category/packaging-products/tapes-ties-glues/baler-twines/"
                                                        class="header__box-content-column-main-card"
                                                        id="baler-products-parent-c1">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icons_CROP-Twine.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Venus Baler Twines</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                    <a href="/product-category/packaging-products/wrapping/fodder-totalcover-netwrap/"
                                                        class="header__box-content-column-main-card"
                                                        id="netwrap-products-parent-c1">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icon_Packaging.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Totalcover Netwrap</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                    <a href="/product-category/packaging-products/wrapping/silage-stretch-film/"
                                                        class="header__box-content-column-main-card"
                                                        id="silage-products-parent-c1">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icons_CROP_Stretch.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Silage Stretch Film</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                    <a href="/product-category/packaging-products/wrapping/silage-pit-covers/"
                                                        class="header__box-content-column-main-card"
                                                        id="pit-products-parent-c1">
                                                        <img src="https://venuspack.com.au/wp-content/uploads/2024/05/CAT_Icons_CROP_Silage.svg"
                                                            alt="Icon"
                                                            class="header__box-content-column-main-card-icon" />
                                                        <div class="header__box-content-column-main-card-content">
                                                            <span class="footer-menu">Silage Pit Covers</span>
                                                            <img src="https://venuspack.com.au/wp-content/uploads/2024/04/chevron.png"
                                                                alt="Chevron"
                                                                class="header__box-content-column-main-card-chevron" />
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- COLUMN THREE -->
                                            <div class="header__box-content-column three">
                                                <header>
                                                    <span id="crop-menu-title-col-3">Product Category</span>
                                                </header>
                                                <div id="baler-products-list">
                                                    <?php
                                                    if (count($baler_child_categories) == 0) {
                                                    ?>
                                                    <a
                                                        href="/product-category/packaging-products/tapes-ties-glues/baler-twines/">View
                                                        All</a>
                                                    <?php
                                                    } else {
                                                    foreach ($baler_child_categories as $baler_child_category) {
                                                        // Ensure $polybags_child_category is a WP_Term object
                                                        if ($baler_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $baler_child_category_id = $baler_child_category->term_id;
                                                            $baler_child_category_name = $baler_child_category->name;
                                                            $baler_child_category_slug = $baler_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $baler_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/packaging-products/tapes-ties-glues/baler-twines/' . $baler_child_category_slug . '/">' . $baler_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                }
                                                ?>
                                                </div>
                                                <div id="netwrap-products-list">
                                                    <?php
                                                    if (count($netwrap_child_categories) == 0) {
                                                    ?>
                                                    <a
                                                        href="/product-category/packaging-products/wrapping/fodder-totalcover-netwrap/">View
                                                        All</a>
                                                    <?php
                                                    } else {
                                                    foreach ($netwrap_child_categories as $netwrap_child_category) {
                                                        // Ensure $netwrap_child_category is a WP_Term object
                                                        if ($netwrap_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $netwrap_child_category_id = $netwrap_child_category->term_id;
                                                            $netwrap_child_category_name = $netwrap_child_category->name;
                                                            $netwrap_child_category_slug = $netwrap_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $netwrap_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/packaging-products/wrapping/fodder-totalcover-netwrap/' . $netwrap_child_category_slug . '/">' . $netwrap_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                }
                                                ?>
                                                </div>
                                                <div id="silage-pit-products-list">
                                                    <?php
                                                    if (count($netwrap_child_categories) == 0) {
                                                    ?>
                                                    <a
                                                        href="/product-category/packaging-products/wrapping/silage-pit-covers/">View
                                                        All</a>
                                                    <?php
                                                    } else {
                                                    foreach ($silage_pit_child_categories as $silage_pit_child_category) {
                                                        // Ensure $silage_pit_child_category is a WP_Term object
                                                        if ($silage_pit_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $silage_pit_child_category_id = $silage_pit_child_category->term_id;
                                                            $silage_pit_child_category_name = $silage_pit_child_category->name;
                                                            $silage_pit_child_category_slug = $silage_pit_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $silage_pit_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/packaging-products/wrapping/silage-pit-covers/' . $silage_pit_child_category_slug . '/">' . $silage_pit_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                }
                                                ?>
                                                </div>
                                                <div id="silage-products-list">
                                                    <?php
                                                    if (count($netwrap_child_categories) == 0) {
                                                    ?>
                                                    <a
                                                        href="/product-category/packaging-products/wrapping/silage-stretch-film/">View
                                                        All</a>
                                                    <?php
                                                    } else {
                                                    foreach ($silage_child_categories as $silage_child_category) {
                                                        // Ensure $silage_child_category is a WP_Term object
                                                        if ($silage_child_category instanceof WP_Term) {
                                                            // Access properties of the WP_Term object
                                                            $silage_child_category_id = $silage_child_category->term_id;
                                                            $silage_child_category_name = $silage_child_category->name;
                                                            $silage_child_category_slug = $silage_child_category->slug;
                                                    
                                                            // Query to count the number of products associated with the child category
                                                            $args = array(
                                                                'post_type' => 'product',
                                                                'posts_per_page' => -1, // -1 for all posts
                                                                'tax_query' => array(
                                                                    array(
                                                                        'taxonomy' => 'product_cat',
                                                                        'field' => 'term_id',
                                                                        'terms' => $silage_child_category_id,
                                                                    )
                                                                )
                                                            );
                                                    
                                                            $products_query = new WP_Query($args);
                                                            $product_count = $products_query->post_count;
                                                    
                                                            // Output the child category name and the number of products associated with it
                                                            if ($product_count > 0) {
                                                                echo '<a href="/product-category/packaging-products/wrapping/silage-stretch-film/' . $silage_child_category_slug . '/">' . $silage_child_category_name . ' ' . '(' . $product_count . ')' . '</a>';
                                                            }
                                                        } else {
                                                            // Handle unexpected data, if any
                                                            echo 'Unexpected data encountered.';
                                                        }
                                                    }
                                                }
                                                ?>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="/eco-products/" class="header-menu-text">
                                    Eco Products
                                </a>
                            </li>
                            <li>
                                <a href="/service-spare-parts/" class="header-menu-text">
                                    Service & Spare Parts
                                </a>
                            </li>
                        </ul>
                        <ul class="header__links search">
                            <label for="close-btn" class="header__btn close-btn"><i class="fas fa-times"></i></label>
                            <li class="header__links-mega">
                                <a class="link desktop-item header__links-mega-accordion search-hover">
                                    <input type="checkbox" id="showMega">
                                    <div>
                                        <label for="showMega" class="mobile-item">Search</label>

                                    </div>
                                    <span class="mask">
                                        <div class="link-container">
                                            <span class="link-title1 title search-flex">Search <img
                                                    src="https://venuspack.com.au/wp-content/uploads/2024/05/Search.svg"
                                                    alt="Search Icon"
                                                    class="header__container-bottom-right-search" /></span>
                                            <span class="link-title2 title search-flex" style="height: 20px;">Search
                                                <img src="https://venuspack.com.au/wp-content/uploads/2024/05/Search.svg"
                                                    alt="Search Icon"
                                                    class="header__container-bottom-right-search" /></span>
                                        </div>
                                    </span>
                                </a>
                                <div class="header__box">
                                    <div class="container">
                                        <div class="header__box-content search">

                                            <form role="search" method="get" id="searchform"
                                                action="<?php echo esc_url(home_url('/')); ?>">
                                                <input type="text" value="<?php echo get_search_query(); ?>" name="s"
                                                    id="searchinput" placeholder="Search products" autocomplete="off">
                                                <button type="submit" id="searchsubmit">
                                                    <img src="https://venuspack.com.au/wp-content/uploads/2024/05/Search.svg"
                                                        alt="Search Icon" />
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <a href="/cart/" class="header-cart">
                            <img src="https://venuspack.com.au/wp-content/uploads/2024/05/shopping-cart.svg"
                                alt="Search Icon" class="header__container-bottom-right-cart" id="header-cart" />
                        </a>
                        <div class="hamburger">
                            <div class="hamburger__icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>