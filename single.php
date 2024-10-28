<?php get_header();


$postId = get_the_ID();
$title = get_the_title($postId);
$content = get_the_content($postId);
$formattedContent = wpautop($content);
$postDate = get_the_time('jS F Y', $postId);
$featured_image_url = get_the_post_thumbnail_url($postId);

$categories = wp_get_post_categories( get_the_ID() );

$relatedPosts = new WP_Query(
    array(
        // 'post__not_in' => array($postId),
        'post_type'      => 'post',
        'posts_per_page' => 3,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'category__in'   => $categories, // Only get posts from the same category
        'post__not_in' => array($postId),
    )
);

?>

<main class="single-post">
    <img src="http://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/Clip-path-group.svg" class="single-post__watermark"
        alt="Venus Logo - Watermark" />
    <div class="container">
        <div class="single-post__header">
            <a href="/blogs">
                <img src="http://venuspacking.previewsite.com.au/wp-content/uploads/2024/04/back.png" alt="Back Arrow"
                    class="single-post__header-back">
                <span class="intro-text">Back to blog</span>
            </a>
            <h1><?php echo $title ?></h1>
        </div>
    </div>

    <div class="container">
        <section class="single-post__content">
            <div class="single-post__content-header">
                <div class="single-post__content-header-meta">
                    <span class="intro-text"><?php echo $postDate ?></span>
                </div>
                <img src="<?php echo $featured_image_url ?>" />
            </div>
            <?php echo $formattedContent ?>
        </section>
    </div>

    <div class="container">
        <section class="single-post__recent">
            <div class="single-post__recent-header">
                <h4>Recent posts:</h4>
            </div>
            <div class="single-post__recent-grid">
                <?php
                   if ($relatedPosts->have_posts()) {
                    while ($relatedPosts->have_posts()) {
                        $relatedPosts->the_post();
                        $post_id = get_the_ID();
                        $link = get_permalink();
                        $title = get_the_title();
                        $excerpt = get_the_excerpt();
                        $featured_image_url = get_the_post_thumbnail_url(get_the_ID());
                        // Retrieve the categories assigned to the current post
                        $categories = get_the_category($post_id);
                        $date = get_the_date();


                        // Create an array to store category names
                        $categoryNames = array();

                        // Loops over array and adds categories to array.
                        if ($categories) {
                            foreach ($categories as $category) {
                                $categoryNames[] = $category->name;
                            }
                        }

                        // Converts array to json
                        $categoriesArray = json_encode($categoryNames);

                        get_template_part('template-parts/blog-card', null, array('link' => $link, 'title' => $title, 'imageUrl' => $featured_image_url, 'allCategories' => $categoriesArray,  'isEvent' => false, 'date' => $date, 'eventTime' => ''));
                    }
                } else {
                    "<h4> Oops, there doesn't seem to be any blogs right now.";
                }
            ?>
            </div>
        </section>
    </div>

</main>

<?php get_footer(); ?>