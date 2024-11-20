<?php get_header(); ?>

<main>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            echo '<h1>' . get_the_title() . '</h1>';
            echo '<p>' . get_the_date() . '</p>';
            the_content();
        }
    }
    ?>
</main>

<?php get_footer(); ?>
