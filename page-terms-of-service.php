<?php get_header();


?>


<main class="terms-page">

    <section class="terms">
        <div class="container">
            <div class="terms__inner">
                <div class="terms__row">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            the_content();
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>