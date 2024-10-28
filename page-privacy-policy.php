<?php get_header();


?>


<main class="privacy-page">

    <section class="privacy">
        <div class="container">
            <div class="privacy__inner">
                <div class="privacy__row">
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