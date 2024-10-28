<?php

// product fields
$title = $args['title'];
$description = $args['description'];
$short_description = wp_trim_words($description, 12, '...');
$image_url = $args['image'];
$link = $args['link'];
$stock = $args['stock'];
// 
$product = $args['product'];
$is_featured = get_field('featured', $product->get_ID());
$is_eco = get_field('eco_friendly', $product->get_ID());
$is_new = get_field('new', $product->get_ID());
$is_sale = get_field('on_sale', $product->get_ID());
$is_low = get_field('low_stock', $product->get_ID());

// custom fields
$logo = $args['logo'];

?>

<div class="product-card">
    <a class="product-card__link" href="<?php echo $link ?>"></a>
    <img src="<?php echo $image_url ?>" alt="Product Image" class="product-card__img" />
    <div class="product-card__badges">
        <!-- LOW STOCK -->
        <?php if ( $is_low): ?>
        <div class="product-card__badges-badge low">
            <h5>Low Stock</h5>
        </div>
        <?php endif; ?>
        <!-- ON SALE -->
        <?php if ( $is_sale): ?>
        <div class="product-card__badges-badge sale">
            <h5>Sale</h5>
        </div>
        <?php endif; ?>

        <?php if ( $is_eco ): ?>
        <div class="product-card__badges-badge eco">
            <h5>Eco</h5>
        </div>
        <?php endif; ?>
        <?php if ( $is_new ): ?>
        <div class="product-card__badges-badge new">
            <h5>New</h5>
        </div>
        <?php endif; ?>
    </div>

    <div class="product-card__featured">
        <?php if($logo) : ?>
        <img src="<?php echo $logo ?>" alt="Product Image - Brand Logo" class="product-card__featured-logo" />
        <?php endif; ?>
        <?php if ( $is_featured): ?>
        <div class="product-card__featured-badge featured">
            <h5>Featured</h5>
        </div>
        <?php endif; ?>
    </div>


    <h4 class="product-card__title"><?php echo $title?></h4>
    <footer>
        <p class="product-card__description"><?php echo $short_description ?></p>
        <a href="<?php echo $link ?>" class="product-card__button"><button class="button orange">View</button></a>
    </footer>
</div>