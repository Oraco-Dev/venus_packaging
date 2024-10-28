<?php
$date = $args['date'];
$link = $args['link'];
$title = $args['title'];
$image_url = $args['imageUrl'];
$all_categories = $args['allCategories'];
$all_categories_json = json_decode($all_categories);
$isEvent = $args['isEvent'];
$eventTime = $args['eventTime'];

$categoryClasses = 'blog-card__category';

if ($isEvent) {
    $categoryClasses .= ' event';
}

?>

<a href="<?php echo $link ?>" class="blog-card" data-category='<?php echo $all_categories ?>'>
    <div class="blog-card__categories">
        <?php
        foreach ($all_categories_json as $category) {
            echo '<div class="' . $categoryClasses . '"><span>' . $category . '</span></div>';
        }
        ?>
    </div>

    <div class="blog-card__image-container">
        <?php if($image_url): ?>
        <img src="<?php echo esc_url($image_url) ?>" class="blog-card__img" />
        <?php else: ?>
        <img src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Printex6-min.jpg" class="blog-card__img" />
        <?php endif; ?>
        <div class="blog-card__overlay"></div> <!-- Overlay for the image -->
    </div>
    <div class="blog-card__meta">
        <span class="blog-card__meta-date">
            <?php echo $date ?>
        </span>
        <h4 class="blog-card__meta-title">
            <?php echo $title ?>
        </h4>
        <span class="blog-card__meta-btn">Read More <span><img
                    src="https://venuspacking.previewsite.com.au/wp-content/uploads/2024/05/right-arrow-svgrepo-com-1.svg"
                    class="blog-card__meta-img" /></span></span>
    </div>
</a>