<?php get_header(); ?>

<main class="container py-5">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <article class="mb-5">
                <h1 class="display-4 text-primary mb-3"><?php echo get_the_title(); ?></h1>
                <p class="text-muted mb-4"><?php echo get_the_date(); ?></p>
                <div class="content">
                    <?php the_content(); ?>
                </div>
            </article>
            <?php
        }
    } else {
        echo '<p class="text-center text-danger">No posts to display.</p>';
    }
    ?>
</main>

<?php get_footer(); ?>
