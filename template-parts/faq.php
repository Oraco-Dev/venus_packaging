<?php

$postID = $args['postId']

?>
<section class="faq">
    <h2 class="faq-title">COMMON QUESTIONS</h2>
    <?php get_template_part('template-parts/accordion', null, array('postId' => $postID)) ?>
</section>